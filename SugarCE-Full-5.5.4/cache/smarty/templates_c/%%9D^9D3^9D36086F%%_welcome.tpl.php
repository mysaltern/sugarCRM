<?php /* Smarty version 2.6.11, created on 2020-12-24 17:59:35
         compiled from themes/default/tpls/_welcome.tpl */ ?>
<?php if ($this->_tpl_vars['AUTHENTICATED']): ?>
<div id="welcome">
    <?php echo $this->_tpl_vars['APP']['NTC_WELCOME']; ?>
, <strong><?php echo $this->_tpl_vars['CURRENT_USER']; ?>
</strong> [ <a href='<?php echo $this->_tpl_vars['LOGOUT_LINK']; ?>
' class='utilsLink'><?php echo $this->_tpl_vars['LOGOUT_LABEL']; ?>
</a> ]
</div>
<?php endif; ?>