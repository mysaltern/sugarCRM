<?php /* Smarty version 2.6.11, created on 2020-12-24 17:59:35
         compiled from themes/default/tpls/_colorFontPicker.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_getimagepath', 'themes/default/tpls/_colorFontPicker.tpl', 84, false),)), $this); ?>
<?php if ($this->_tpl_vars['AUTHENTICATED']): ?>
<div id="colorPicker">
    <span>|</span>
    <span id="themepickerLinkSpan">
        <?php echo $this->_tpl_vars['APP']['LBL_THEME_PICKER']; ?>

    </span>
</div>

<div id="themepickerDialog" style="display:none;">
    <div class="hd">
        <?php echo $this->_tpl_vars['APP']['LBL_THEME_PICKER']; ?>

    </div>	
    <div id="stylepicker" class="edit view">
        <form id="themepickerDialogForm" name="themepickerDialogForm" method="POST"
                class='themePicker' action="<?php echo $_SERVER['REQUEST_URI']; ?>
">
            <table width='100%' border='0' cellpadding='0' cellspacing='1'>
            <tr>
                <td scope="row"><?php echo $this->_tpl_vars['APP']['LBL_THEME']; ?>
</td>
                <td>
                    <select name="usertheme" id="usertheme">
                    <?php echo $this->_tpl_vars['selectThemeOptions']; ?>

                    </select>
                </td>
           </tr>
            <?php if ($this->_tpl_vars['currentTheme_groupedTabscompat']): ?>
            <?php ob_start(); ?>&nbsp;<?php echo $this->_tpl_vars['USERS_MOD']['LBL_NAVIGATION_PARADIGM_DESCRIPTION']; ?>
<i><?php echo $this->_tpl_vars['USERS_MOD']['LBL_SUPPORTED_THEME_ONLY']; ?>
</i><?php $this->_smarty_vars['capture']['SMARTY_NAVIGATION_PARADIGM_DESC'] = ob_get_contents(); ob_end_clean(); ?>
            <tr>
                <td scope="row"><?php echo $this->_tpl_vars['USERS_MOD']['LBL_NAVIGATION_PARADIGM']; ?>
:</td>
                <td>
                    <select name="userthemegrouptabs" id='userthemegrouptabs'>
                        <?php echo $this->_tpl_vars['NAVADIGMS']; ?>

                    </select>
                </td>
            </tr>
            <?php endif; ?>
            <?php if (count ( $this->_tpl_vars['currentTheme_colors'] ) > 1 || count ( $this->_tpl_vars['currentTheme_fonts'] ) > 1): ?>
            <tr>
            <td colspan="2"><hr /></td>
            </tr>
            <?php endif; ?>
           <?php if (count ( $this->_tpl_vars['currentTheme_colors'] ) > 1): ?>
           <tr>
                <td colspan="2">
                    <input type="hidden" name="usercolor" id="usercolor" value="">
                    <ul id="color_menu">
                    <?php $_from = $this->_tpl_vars['currentTheme_colors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['theme_colors'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['theme_colors']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['color']):
        $this->_foreach['theme_colors']['iteration']++;
?>
                    <?php ob_start(); ?>colors.<?php echo $this->_tpl_vars['color']; ?>
.icon.gif<?php $this->_smarty_vars['capture']['themeColorIcon'] = ob_get_contents();  $this->assign('colorIcon', ob_get_contents());ob_end_clean(); ?>
                    <li style="background: url(<?php echo smarty_function_sugar_getimagepath(array('file' => $this->_tpl_vars['colorIcon']), $this);?>
) no-repeat center;" onclick="SUGAR.themes.changeColor('<?php echo $this->_tpl_vars['color']; ?>
');"></li>
                    <?php endforeach; endif; unset($_from); ?>
                    </ul>
                </td>
           </tr>
           <?php endif; ?>
           <?php if (count ( $this->_tpl_vars['currentTheme_fonts'] ) > 1): ?>
           <tr>
                <td colspan="2">
                    <input type="hidden" name="userfont" id="userfont" value="">
                    <ul id="font_menu">
                    <?php $_from = $this->_tpl_vars['currentTheme_fonts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['theme_fonts'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['theme_fonts']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['font']):
        $this->_foreach['theme_fonts']['iteration']++;
?>
                    <?php ob_start(); ?>fonts.<?php echo $this->_tpl_vars['font']; ?>
.icon.gif<?php $this->_smarty_vars['capture']['themeFontIcon'] = ob_get_contents();  $this->assign('fontIcon', ob_get_contents());ob_end_clean(); ?>
                    <li style="background: url(<?php echo smarty_function_sugar_getimagepath(array('file' => $this->_tpl_vars['fontIcon']), $this);?>
) no-repeat center;" onclick="SUGAR.themes.changeFont('<?php echo $this->_tpl_vars['font']; ?>
');"></li>
                    <?php endforeach; endif; unset($_from); ?>
                    </ul>
                </td>
            </tr>
            <?php endif; ?>
            </table>
        </form>
    </div>
</div>
<?php endif; ?>