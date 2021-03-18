<?php
/* Smarty version 3.1.34-dev-7, created on 2021-03-05 03:34:46
  from '/media/andras/HD710 PRO/Presta/pdp/public/admin041uurtnw/themes/new-theme/template/components/layout/confirmation_messages.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6041ed2616c546_03697373',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f3580388793c5f071dfc762c7ea8980084b0a4bd' => 
    array (
      0 => '/media/andras/HD710 PRO/Presta/pdp/public/admin041uurtnw/themes/new-theme/template/components/layout/confirmation_messages.tpl',
      1 => 1614747490,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6041ed2616c546_03697373 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['confirmations']->value) && count($_smarty_tpl->tpl_vars['confirmations']->value) && $_smarty_tpl->tpl_vars['confirmations']->value) {?>
  <div class="bootstrap">
    <div class="alert alert-success" style="display:block;">
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['confirmations']->value, 'conf');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['conf']->value) {
?>
        <?php echo $_smarty_tpl->tpl_vars['conf']->value;?>

      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
  </div>
<?php }
}
}
