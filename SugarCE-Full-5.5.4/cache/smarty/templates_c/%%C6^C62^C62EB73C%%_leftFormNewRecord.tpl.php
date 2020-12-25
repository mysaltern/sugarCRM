<?php /* Smarty version 2.6.11, created on 2020-12-24 17:59:38
         compiled from themes/default/tpls/_leftFormNewRecord.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_getimagepath', 'themes/default/tpls/_leftFormNewRecord.tpl', 39, false),)), $this); ?>
<?php if (! empty ( $this->_tpl_vars['NEW_RECORD'] )): ?>
<div id="newRecord">
<img id="newrecordicon" alt="<?php echo $this->_tpl_vars['APP']['LBL_HIDE']; ?>
" align="right" src="<?php echo smarty_function_sugar_getimagepath(array('file' => 'hide_submenu_shortcuts.gif'), $this);?>
" />
<img id="newrecordicon_1" alt="<?php echo $this->_tpl_vars['APP']['LBL_SHOW']; ?>
" align="right" src="<?php echo smarty_function_sugar_getimagepath(array('file' => 'show_submenu_shortcuts.gif'), $this);?>
" />
    <?php echo $this->_tpl_vars['NEW_RECORD']; ?>

</div>
<?php endif; ?>