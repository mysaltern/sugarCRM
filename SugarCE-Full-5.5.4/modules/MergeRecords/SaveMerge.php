<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * SugarCRM is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2010 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/
/*********************************************************************************
 * Description:  TODO: To be written.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/


$focus = new MergeRecord();
$focus->load_merge_bean($_REQUEST['merge_module'], true, $_REQUEST['record']);

foreach($focus->merge_bean->column_fields as $field)
{
	if(isset($_POST[$field]))
	{
		$value = $_POST[$field];
		$focus->merge_bean->$field = $value;
	}elseif (isset($focus->merge_bean->field_name_map[$field]['type']) && $focus->merge_bean->field_name_map[$field]['type'] == 'bool'  ) {
		$focus->merge_bean->$field = 0;
	}
}

foreach($focus->merge_bean->additional_column_fields as $field)
{
	if(isset($_POST[$field]))
	{
		$value = $_POST[$field];
		$focus->merge_bean->$field = $value;
	}
}

global $check_notify;

$_REQUEST['useEmailWidget'] = true;
$focus->merge_bean->save($check_notify);
unset($_REQUEST['useEmailWidget']);

$return_id = $focus->merge_bean->id;
$return_module = $focus->merge_module;
$return_action = 'DetailView';

//handle realated data.

$linked_fields=$focus->merge_bean->get_linked_fields();

$exclude = explode(',', $_REQUEST['merged_links']);

if (is_array($_POST['merged_ids'])) {
    foreach ($_POST['merged_ids'] as $id) {
        require_once ($focus->merge_bean_file_path);
        $mergesource = new $focus->merge_bean_class();
        $mergesource->retrieve($id);        
        //kbrill Bug #13826
        foreach ($linked_fields as $name => $properties) {
        	if ($properties['name']=='modified_user_link' || in_array($properties['name'], $exclude))
        	{
        		continue;
        	}
            if (isset($properties['duplicate_merge'])) {
                if ($properties['duplicate_merge']=='disabled' or 
                    $properties['duplicate_merge']=='false' or
                    $properties['name']=='assigned_user_link') {
                    continue;
                }
            }
            if ($name == 'accounts' && $focus->merge_bean->module_dir == 'Opportunities')
            	continue;
            	
            	
            if ($mergesource->load_relationship($name)) {
                //check to see if loaded relationship is with email address
                $relName=$mergesource->$name->getRelatedModuleName();
                if (!empty($relName) and strtolower($relName)=='emailaddresses'){
                    //handle email address merge
                    handleEmailMerge($focus,$name,$mergesource->$name->get());   
                }else{
                    $data=$mergesource->$name->get();
                    if (is_array($data)) {
                        if ($focus->merge_bean->load_relationship($name) ) {
                            foreach ($data as $related_id) {
                                //add to primary bean
                                $focus->merge_bean->$name->add($related_id);
                            }   
                        }
                    }
                }
            }
        }
        //END Bug #13826
        //delete the child bean, this action will cascade into related data too.
        $mergesource->mark_deleted($mergesource->id);
    }
}
$GLOBALS['log']->debug("Merged record with id of ".$return_id);

header("Location: index.php?action=$return_action&module=$return_module&record=$return_id");


//This function will compare the email addresses to be merged and only add the email id's
//of the email addresses that are not duplicates.
//$focus - Merge Bean
//$name - name of relationship (email_addresses)
//$data - array of email id's that will be merged into existing bean.
function handleEmailMerge($focus,$name,$data){
    $mrgArray = array();
    //get the email id's to merge
    $existingData=$data;

    //make sure id's to merge exist and are in array format

    //get the existing email id's 
    $focus->merge_bean->load_relationship($name);
    $exData=$focus->merge_bean->$name->get();

    if (!is_array($existingData) || empty($existingData)) {
        return ;
    }
        //query email and retrieve existing email address 
        $exEmailQuery = 'Select id, email_address from email_addresses where id in (';
            $first = true;
            foreach($exData as $id){
                if($first){
                    $exEmailQuery .= " '$id' ";
                    $first = false;
                }else{
                    $exEmailQuery .= ", '$id' ";
                    $first = false;
                }
            }
        $exEmailQuery .= ')';

        $exResult = $focus->merge_bean->db->query($exEmailQuery);
        while(($row=$focus->merge_bean->db->fetchByAssoc($exResult))!= null) {
            $existingEmails[$row['id']]=$row['email_address'];
        }


        //query email and retrieve email address to be linked.
        $newEmailQuery = 'Select id, email_address from email_addresses where id in (';
            $first = true;
            foreach($existingData as $id){
                if($first){
                    $newEmailQuery .= " '$id' ";
                    $first = false;
                }else{
                    $newEmailQuery .= ", '$id' ";
                    $first = false;
                }        
            }
        $newEmailQuery .= ')';
        
        $newResult = $focus->merge_bean->db->query($newEmailQuery);
        while(($row=$focus->merge_bean->db->fetchByAssoc($newResult))!= null) {
            $newEmails[$row['id']]=$row['email_address'];
        }

        //compare the two arrays and remove duplicates
        foreach($newEmails as $k=>$n){
            if(!in_array($n,$existingEmails)){
                $mrgArray[$k] = $n;
            }   
        }

        //add email id's.
        foreach ($mrgArray as $related_id=>$related_val) {
            //add to primary bean
            $focus->merge_bean->$name->add($related_id);
        }   
}
?>