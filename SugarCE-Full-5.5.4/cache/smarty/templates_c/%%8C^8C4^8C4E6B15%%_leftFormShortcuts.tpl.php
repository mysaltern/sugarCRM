<?php /* Smarty version 2.6.11, created on 2020-12-24 17:59:38
         compiled from themes/default/tpls/_leftFormShortcuts.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_getimagepath', 'themes/default/tpls/_leftFormShortcuts.tpl', 39, false),)), $this); ?>
<?php if ($this->_tpl_vars['LEFT_FORM_SHORTCUTS']): ?>
<div id="shortcuts" class="leftList">
    <img id="shortcuts_img" alt="<?php echo $this->_tpl_vars['APP']['LBL_HIDE']; ?>
" align="right" src="<?php echo smarty_function_sugar_getimagepath(array('file' => 'hide_submenu_shortcuts.gif'), $this);?>
" />
    <img id="shortcuts_img_1" alt="<?php echo $this->_tpl_vars['APP']['LBL_SHOW']; ?>
" align="right" src="<?php echo smarty_function_sugar_getimagepath(array('file' => 'show_submenu_shortcuts.gif'), $this);?>
" />
    <h3><span><?php echo $this->_tpl_vars['APP']['LBL_SHORTCUTS']; ?>
</span></h3>
    <ul id="ul_shortcuts">
	<?php $_from = $this->_tpl_vars['SHORTCUT_MENU']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
    <li>
        <a href="<?php echo $this->_tpl_vars['item']['URL']; ?>
"><?php echo $this->_tpl_vars['item']['IMAGE']; ?>
&nbsp;<span><?php echo $this->_tpl_vars['item']['LABEL']; ?>
</span></a>
    </li>
    <?php endforeach; endif; unset($_from); ?>
    </ul>
</div>
<?php endif; ?>