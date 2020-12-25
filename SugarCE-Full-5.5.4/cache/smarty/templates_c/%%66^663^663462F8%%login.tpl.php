<?php /* Smarty version 2.6.11, created on 2020-12-24 18:09:02
         compiled from modules/Users/login.tpl */ ?>
<!--
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

 ********************************************************************************/
-->
<link rel='stylesheet' type="text/css" href='modules/Users/login.css'>
<script type='text/javascript'>
var LBL_LOGIN_SUBMIT = '<?php echo $this->_tpl_vars['MOD']['LBL_LOGIN_SUBMIT']; ?>
';
var LBL_REQUEST_SUBMIT = '<?php echo $this->_tpl_vars['MOD']['LBL_REQUEST_SUBMIT']; ?>
';
</script>
<!--[if IE 6]>
<?php echo '
<script type=\'text/javascript\'>
if ( !SUGAR.themes.theme_ie6compat && ( !';  echo $this->_tpl_vars['theme_changed'];  echo ' || !Get_Cookie(\'ie6compatcheck\') ) ) {
    alert(\'';  echo $this->_tpl_vars['MOD']['LBL_IE6COMPAT_CHECK'];  echo '\');
    Set_Cookie(\'ie6compatcheck\',\'true\',365,\'/\',\'\',\'\');
    location.href = location.href+\'&ck_login_theme_20=SugarIE6&usertheme=SugarIE6\';
}
YAHOO.util.Event.onDOMReady(function()
{
    document.getElementById(\'login_theme\').onchange = function()
    {
        if ( !(YAHOO.env.ua.ie > 5 && YAHOO.env.ua.ie < 7) || SUGAR.themes.hasIE6compat(this.value) )
		    document.getElementById(\'login_theme\').value = this.value;    
        else {
            alert(\'';  echo $this->_tpl_vars['MOD']['LBL_THEME_PICKER_IE6COMPAT_CHECK'];  echo '\');
            document.getElementById(\'login_theme\').value = \'SugarIE6\';
        }
    }
});
</script>
'; ?>

<![endif]-->										
<table cellpadding="0" align="center" width="100%" cellspacing="0" border="0">
	<tr>
		<td>
			<table cellpadding="0"  cellspacing="0" border="0" align="center" width='350px'>
				<tr>
					<td style="padding-bottom: 10px;" ><b><?php echo $this->_tpl_vars['MOD']['LBL_LOGIN_WELCOME_TO']; ?>
</b><br>
						<IMG src="include/images/sugar_md.png" alt="Sugar" width="340" height="25">
					</td>
				</tr>
				<tr>
					<td align="center">
						<div class="edit view login">
							<form action="index.php" method="post" name="DetailView" id="form" onsubmit="return document.getElementById('cant_login').value == ''">
								<table cellpadding="0" cellspacing="2" border="0" align="center" width="100%">
									<?php if ($this->_tpl_vars['LOGIN_ERROR'] != ''): ?>
									<tr>
										<td scope="row" colspan="2"><span class="error"><?php echo $this->_tpl_vars['LOGIN_ERROR']; ?>
</span></td>
						    	<?php if ($this->_tpl_vars['WAITING_ERROR'] != ''): ?>
							        <tr>
							            <td scope="row" colspan="2"><span class="error"><?php echo $this->_tpl_vars['WAITING_ERROR']; ?>
</span></td>
									</tr>
								<?php endif; ?>
									</tr>
								<?php else: ?>
									<tr>
										<td scope="row" width='1%'></td>
										<td scope="row"><span id='post_error' class="error"></span></td>
									</tr>
								<?php endif; ?>
									<tr>
										<td scope="row" colspan="2" width="100%" style="font-size: 12px; padding-bottom: 5px; font-weight: normal;"><?php echo $this->_tpl_vars['APP']['NTC_LOGIN_MESSAGE']; ?>

										<input type="hidden" name="module" value="Users">
										<input type="hidden" name="action" value="Authenticate">
										<input type="hidden" name="return_module" value="Users">
										<input type="hidden" name="return_action" value="Login">
										<input type="hidden" id="cant_login" name="cant_login" value="">
										<input type="hidden" name="login_module" value="<?php echo $this->_tpl_vars['LOGIN_MODULE']; ?>
">
										<input type="hidden" name="login_action" value="<?php echo $this->_tpl_vars['LOGIN_ACTION']; ?>
">
										<input type="hidden" name="login_record" value="<?php echo $this->_tpl_vars['LOGIN_RECORD']; ?>
">
										</td>
									</tr>
									<tr>
										<td scope="row" width="30%"><?php echo $this->_tpl_vars['MOD']['LBL_USER_NAME']; ?>
:</td>
										<td width="70%"><input type="text" size='35' tabindex="1" id="user_name" name="user_name"  value='<?php echo $this->_tpl_vars['LOGIN_USER_NAME']; ?>
'</td>
									</tr>
									<tr>
										<td scope="row"><?php echo $this->_tpl_vars['MOD']['LBL_PASSWORD']; ?>
:</td>
										<td width="30%"><input type="password" size='26' tabindex="2" id="user_password" name="user_password" value=''</td>
									</tr>
									<tr>
										<td colspan="2" class="login_more"><div  style="cursor: hand; cursor: pointer; display:<?php echo $this->_tpl_vars['LOGIN_DISPLAY']; ?>
" onclick='toggleDisplay("more");'><IMG src="index.php?entryPoint=getImage&themeName='+SUGAR.themes.theme_name+'&imageName=advanced_search.gif" border="0" alt="Hide Options" id="more_options">&nbsp;<a href='javascript:void(0)'><?php echo $this->_tpl_vars['MOD']['LBL_LOGIN_OPTIONS']; ?>
</a></div>
											<div id='more' style='display: none'>
												<table cellpadding="0" cellspacing="2" border="0" align="center" width="100%">
													<tr>
														<td scope="row" width="30%"><?php echo $this->_tpl_vars['MOD']['LBL_THEME']; ?>
</td>
														<td width="70%"><select style='width: 152px' name='login_theme' id='login_theme'><?php echo $this->_tpl_vars['SELECT_THEME']; ?>
</select></td>
														</tr>
													<tr>
														<td scope="row"><?php echo $this->_tpl_vars['MOD']['LBL_LANGUAGE']; ?>
</td>
														<td><select style='width: 152px' name='login_language'><?php echo $this->_tpl_vars['SELECT_LANGUAGE']; ?>
</select></td>
													</tr>
												</table>
											</div>
										</td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td><input title="<?php echo $this->_tpl_vars['MOD']['LBL_LOGIN_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['MOD']['LBL_LOGIN_BUTTON_TITLE']; ?>
" class="button" type="submit" tabindex="3" id="login_button" name="Login" value="<?php echo $this->_tpl_vars['MOD']['LBL_LOGIN_BUTTON_LABEL']; ?>
"><br>&nbsp;</td>		
									</tr>
								</table>
							</form>
							<form action="index.php" method="post" name="fp_form" id="fp_form" >
								<table cellpadding="0" cellspacing="2" border="0" align="center" width="100%">
									<tr>
										<td colspan="2" class="login_more">
										<div  style="cursor: hand; cursor: pointer; display:<?php echo $this->_tpl_vars['DISPLAY_FORGOT_PASSWORD_FEATURE']; ?>
;" onclick='toggleDisplay("forgot_password_dialog");'>
											<IMG src="index.php?entryPoint=getImage&themeName='+SUGAR.themes.theme_name+'&imageName=advanced_search.gif" border="0" alt="Hide Options" id="forgot_password_dialog_options">
											<a href='javascript:void(0)'><?php echo $this->_tpl_vars['MOD']['LBL_LOGIN_FORGOT_PASSWORD']; ?>
</a>
										</div>
											<div id="forgot_password_dialog" style="display:none" > 
												<input type="hidden" name="entryPoint" value="GeneratePassword">
												<table cellpadding="0" cellspacing="2" border="0" align="center" width="100%" >
													<tr>
														<td colspan="2">
															<div id="generate_success" class='error' style="display:inline;"> </div>
														</td>
													</tr>
													<tr>
														<td scope="row" width="30%"><?php echo $this->_tpl_vars['MOD']['LBL_USER_NAME']; ?>
:</td>
														<td width="70%"><input type="text" size='26' id="fp_user_name" name="fp_user_name"  value='<?php echo $this->_tpl_vars['LOGIN_USER_NAME']; ?>
'</td>
													</tr>
													<tr>
											            <td scope="row" width="30%"><?php echo $this->_tpl_vars['MOD']['LBL_EMAIL']; ?>
:</td>
											            <td width="70%"><input type="text" size='26' id="fp_user_mail" name="fp_user_mail"  value='' ></td>
											     	</tr>
													<?php echo $this->_tpl_vars['CAPTCHA']; ?>

													<tr>
													    <td scope="row" width="30%"><div id='wait_pwd_generation'></div></td>
														<td width="70%"><input title="Email Temp Password" class="button" type="button" style="display:inline" onclick="validateAndSubmit(); return document.getElementById('cant_login').value == ''" id="generate_pwd_button" name="fp_login" value="<?php echo $this->_tpl_vars['MOD']['LBL_LOGIN_SUBMIT']; ?>
"></td>		
													</tr>
												</table>
											</div>
										</td>
									</tr>
								</table>
							</form>
						</div>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<br>
<br>