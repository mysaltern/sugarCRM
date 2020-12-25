<?php /* Smarty version 2.6.11, created on 2020-12-24 17:59:34
         compiled from themes/default/tpls/_leftFormHiddenLastViewed.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_link', 'themes/default/tpls/_leftFormHiddenLastViewed.tpl', 45, false),)), $this); ?>
<?php if ($this->_tpl_vars['LEFT_FORM_LAST_VIEWED']): ?>
<div id="hiddenLastView" class="leftList">
    <h3><span><?php echo $this->_tpl_vars['APP']['LBL_LAST_VIEWED']; ?>
</span></h3>
    <ul onmouseover="hiliteItem(this,'no');">
    <?php $_from = $this->_tpl_vars['recentRecords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lastViewed'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lastViewed']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['lastViewed']['iteration']++;
?>
    <li>
        <a title="<?php echo $this->_tpl_vars['item']['item_summary']; ?>
 [<?php echo $this->_tpl_vars['APP']['LBL_ALT_HOT_KEY'];  echo $this->_foreach['lastViewed']['iteration']; ?>
]" 
            accessKey="<?php echo $this->_foreach['lastViewed']['iteration']; ?>
" 
            href="<?php echo smarty_function_sugar_link(array('module' => $this->_tpl_vars['item']['module_name'],'action' => 'DetailView','record' => $this->_tpl_vars['item']['item_id'],'link_only' => 1), $this);?>
">
            <?php echo $this->_tpl_vars['item']['image']; ?>
&nbsp;<span><?php echo $this->_tpl_vars['item']['item_summary']; ?>
</span>
        </a>
    </li>
    <?php endforeach; else: ?>
    <?php echo $this->_tpl_vars['APP']['NTC_NO_ITEMS_DISPLAY']; ?>

    <?php endif; unset($_from); ?>
    </ul>
</div>
<?php endif; ?>