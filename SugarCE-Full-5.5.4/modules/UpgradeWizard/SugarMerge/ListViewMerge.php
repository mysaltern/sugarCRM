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

 * Description:  Defines the English language pack for the base application.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

require_once('modules/UpgradeWizard/SugarMerge/EditViewMerge.php');
/**
 * This class is used to merge list view meta data. It subclasses EditView merge and transforms listview meta data into EditView meta data  for the merge and then transforms it back into list view meta data
 *
 */
class ListViewMerge extends EditViewMerge{
	protected $varName = 'listViewDefs';
	protected $viewDefs = 'ListView';
	
/**
	 * Loads the meta data of the original, new, and custom file into the variables originalData, newData, and customData respectively it then transforms them into a structure that EditView Merge would understand
	 *
	 * @param STRING $module - name of the module's files that are to be merged
	 * @param STRING $original_file - path to the file that originally shipped with sugar
	 * @param STRING $new_file - path to the new file that is shipping with the patch 
	 * @param STRING $custom_file - path to the custom file
	 */
	protected function loadData($module, $original_file, $new_file, $custom_file){
		parent::loadData($module, $original_file, $new_file, $custom_file);
		$this->originalData = array($module=>array( $this->viewDefs=>array($this->panelName=>array('DEFAULT'=>$this->originalData[$module]))));
		$this->customData = array($module=>array( $this->viewDefs=>array($this->panelName=>array('DEFAULT'=>$this->customData[$module]))));
		$this->newData = array($module=>array( $this->viewDefs=>array($this->panelName=>array('DEFAULT'=>$this->newData[$module]))));
	
	}
	
	/**
	 * This takes in a  list of panels and returns an associative array of field names to the meta-data of the field as well as the locations of that field
	 * Since ListViews don't have the concept of rows and columns it takes the panel and the row to be the field name
	 * @param ARRAY $panels - this is the 'panel' section of the meta-data for list views all the meta data is one panel since it is just a list of fields
	 * @return ARRAY $fields - an associate array of fields and their meta-data as well as their location
	 */
	protected function getFields($panels, $multiple = true){
		$fields = array();
		$blanks = 0;
		if(!$multiple)$panels = array($panels);
		
		foreach($panels as $panel_id=>$panel){
				
				foreach($panel as $col_id=>$col){
					$field_name = $col_id;
					$fields[$field_name. $panel_id] = array('data'=>$col, 'loc'=>array('row'=>$col_id, 'panel'=>$col_id));
				}
	
				
				
			}
			return $fields;
		}
		
	/**
	 * This builds the array of fields from the merged fields in the appropriate order
	 * when building the panels for a list view the most important thing is order 
	 * so we ensure the fields that came from the custom file keep 
	 * their order then we add any new fields at the end
	 *
	 * @return ARRAY
	 */
	protected function buildPanels(){
		$panels  = array();
		//first only deal with ones that have their location coming from the custom source
		foreach($this->mergedFields as $id =>$field){
			if($field['loc']['source'] == 'custom'){
				$panels[$field['loc']['panel']] = $field['data'];
				unset($this->mergedFields[$id]);
			}
		}
		//now deal with the rest 
		foreach($this->mergedFields as $id =>$field){
				$panels[$field['loc']['panel']] = $field['data'];
		}
		return $panels;
	}
	
	/**
	 * Since all the meta-data is just a list of fields the panel section should be all the meta data
	 *
	 */
	protected function setPanels(){
		$this->newData = $this->buildPanels();
	}
	
	/**
	 * This will save the merged data to a file
	 *
	 * @param STRING $to - path of the file to save it to 
	 * @return BOOLEAN - success or failure of the save
	 */
	public function save($to){
		return write_array_to_file("$this->varName['$this->module']", $this->newData, $to);
	}
}

?>
