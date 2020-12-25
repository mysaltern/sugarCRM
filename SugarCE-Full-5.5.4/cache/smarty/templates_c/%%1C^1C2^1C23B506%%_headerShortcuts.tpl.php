<?php /* Smarty version 2.6.11, created on 2020-12-24 17:59:37
         compiled from themes/default/tpls/_headerShortcuts.tpl */ ?>
<?php if (! $this->_tpl_vars['LEFT_FORM_SHORTCUTS']): ?>
<div id="shortcuts" class="headerList">
    <b style="white-space:nowrap;"><?php echo $this->_tpl_vars['APP']['LBL_SHORTCUTS']; ?>
:&nbsp;&nbsp;</b>
    <span>
    <?php $_from = $this->_tpl_vars['SHORTCUT_MENU']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
    <span style="white-space:nowrap;">
        <a href="<?php echo $this->_tpl_vars['item']['URL']; ?>
"><?php echo $this->_tpl_vars['item']['IMAGE']; ?>
&nbsp;<span><?php echo $this->_tpl_vars['item']['LABEL']; ?>
</span></a>
    </span>
    <?php endforeach; endif; unset($_from); ?>
    </span>
</div>
<?php endif; ?>