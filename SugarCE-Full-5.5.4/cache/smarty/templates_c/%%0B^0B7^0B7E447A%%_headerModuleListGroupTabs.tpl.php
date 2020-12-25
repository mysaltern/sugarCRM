<?php /* Smarty version 2.6.11, created on 2020-12-24 17:59:36
         compiled from themes/default/tpls/_headerModuleListGroupTabs.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_link', 'themes/default/tpls/_headerModuleListGroupTabs.tpl', 46, false),)), $this); ?>
<div id="moduleList">
<ul>
    <li class="noBorder">&nbsp;</li>
    <?php $this->assign('groupSelected', false); ?>
    <?php $_from = $this->_tpl_vars['groupTabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['groupList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['groupList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['group'] => $this->_tpl_vars['modules']):
        $this->_foreach['groupList']['iteration']++;
?>
    <?php ob_start(); ?>parentTab=<?php echo $this->_tpl_vars['group'];  $this->_smarty_vars['capture']['extraparams'] = ob_get_contents();  $this->assign('extraparams', ob_get_contents());ob_end_clean(); ?>
    <?php if (( ( $this->_tpl_vars['parentTab'] == $this->_tpl_vars['group'] || ( ! $this->_tpl_vars['parentTab'] && in_array ( $this->_tpl_vars['MODULE_TAB'] , $this->_tpl_vars['modules']['modules'] ) ) ) && ! $this->_tpl_vars['groupSelected'] ) || ( ($this->_foreach['groupList']['iteration']-1) == 0 && $this->_tpl_vars['defaultFirst'] )): ?>
    <li class="noBorder">
        <span class="currentTabLeft">&nbsp;</span><span class="currentTab">
            <a href="<?php echo smarty_function_sugar_link(array('module' => $this->_tpl_vars['modules']['modules']['0'],'data' => $this->_tpl_vars['modules']['modules']['0'],'link_only' => 1,'extraparams' => $this->_tpl_vars['extraparams']), $this);?>
"
                id="grouptab_<?php echo ($this->_foreach['groupList']['iteration']-1); ?>
"><?php echo $this->_tpl_vars['group']; ?>
</a>
        </span><span class="currentTabRight">&nbsp;</span>
        <?php $this->assign('groupSelected', true); ?>
    <?php else: ?>
    <li>
        <span class="notCurrentTabLeft">&nbsp;</span><span class="notCurrentTab">
        <a href="<?php echo smarty_function_sugar_link(array('module' => $this->_tpl_vars['modules']['modules']['0'],'data' => $this->_tpl_vars['modules']['modules']['0'],'link_only' => 1,'extraparams' => $this->_tpl_vars['extraparams']), $this);?>
" 
            id="grouptab_<?php echo ($this->_foreach['groupList']['iteration']-1); ?>
"><?php echo $this->_tpl_vars['group']; ?>
</a>
        </span><span class="notCurrentTabRight">&nbsp;</span>
    <?php endif; ?>
    </li>
    <?php endforeach; endif; unset($_from); ?>
</ul>
</div>
<div class="clear"></div>
<div id="subModuleList">
    <?php $this->assign('groupSelected', false); ?>
    <?php $_from = $this->_tpl_vars['groupTabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['moduleList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['moduleList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['group'] => $this->_tpl_vars['modules']):
        $this->_foreach['moduleList']['iteration']++;
?>
    <?php ob_start(); ?>parentTab=<?php echo $this->_tpl_vars['group'];  $this->_smarty_vars['capture']['extraparams'] = ob_get_contents();  $this->assign('extraparams', ob_get_contents());ob_end_clean(); ?>
    <span id="moduleLink_<?php echo ($this->_foreach['moduleList']['iteration']-1); ?>
" <?php if (( ( $this->_tpl_vars['parentTab'] == $this->_tpl_vars['group'] || ( ! $this->_tpl_vars['parentTab'] && in_array ( $this->_tpl_vars['MODULE_TAB'] , $this->_tpl_vars['modules']['modules'] ) ) ) && ! $this->_tpl_vars['groupSelected'] ) || ( ($this->_foreach['moduleList']['iteration']-1) == 0 && $this->_tpl_vars['defaultFirst'] )): ?>class="selected" <?php $this->assign('groupSelected', true);  endif; ?>>
    	<ul>
	        <?php $_from = $this->_tpl_vars['modules']['modules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['module']):
?>
	        <li>
	        	<?php ob_start(); ?>moduleTab_<?php echo ($this->_foreach['moduleList']['iteration']-1); ?>
_<?php echo $this->_tpl_vars['module'];  $this->_smarty_vars['capture']['moduleTabId'] = ob_get_contents();  $this->assign('moduleTabId', ob_get_contents());ob_end_clean(); ?>
	        	<?php echo smarty_function_sugar_link(array('id' => $this->_tpl_vars['moduleTabId'],'module' => $this->_tpl_vars['module'],'data' => $this->_tpl_vars['module']), $this);?>

	        </li>
	        <?php endforeach; endif; unset($_from); ?>
	        <?php if ($this->_tpl_vars['subMoreModules'][$this->_tpl_vars['group']]['modules']): ?>
	        <li class="subTabMore">
	        	<a>>></a>      
		        <ul class="cssmenu">
		        <?php $_from = $this->_tpl_vars['subMoreModules'][$this->_tpl_vars['group']]['modules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['submodule']):
?>
					<li>
						<a href="<?php echo smarty_function_sugar_link(array('module' => $this->_tpl_vars['submodule'],'link_only' => 1,'extraparams' => $this->_tpl_vars['extraparams']), $this);?>
"><?php echo $this->_tpl_vars['submodule']; ?>

						</a>
					</li>
		        <?php endforeach; endif; unset($_from); ?>
		        </ul> 
	        </li>
	        <?php endif; ?>	        
        </ul>
    </span>
    <?php endforeach; endif; unset($_from); ?>    
</div>
