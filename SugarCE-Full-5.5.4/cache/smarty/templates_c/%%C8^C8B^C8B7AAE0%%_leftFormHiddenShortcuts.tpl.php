<?php /* Smarty version 2.6.11, created on 2020-12-24 17:59:34
         compiled from themes/default/tpls/_leftFormHiddenShortcuts.tpl */ ?>
<?php if ($this->_tpl_vars['LEFT_FORM_SHORTCUTS']): ?>
<div id="hiddenShortcuts" class="leftList">
    <h3><span><?php echo $this->_tpl_vars['APP']['LBL_SHORTCUTS']; ?>
</span></h3>
    <ul onmouseover="hiliteItem(this,'no');">
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