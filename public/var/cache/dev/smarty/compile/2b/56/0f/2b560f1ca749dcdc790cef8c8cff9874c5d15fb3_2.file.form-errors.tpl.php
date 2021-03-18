<?php
/* Smarty version 3.1.34-dev-7, created on 2021-03-08 09:48:14
  from '/media/andras/HD710 PRO/Presta/pdp/public/themes/classic/templates/_partials/form-errors.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6046392e9aa130_71375308',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2b560f1ca749dcdc790cef8c8cff9874c5d15fb3' => 
    array (
      0 => '/media/andras/HD710 PRO/Presta/pdp/public/themes/classic/templates/_partials/form-errors.tpl',
      1 => 1614747497,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6046392e9aa130_71375308 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
if (count($_smarty_tpl->tpl_vars['errors']->value)) {?>
  <div class="help-block">
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12061287416046392e9a6456_88718286', 'form_errors');
?>

  </div>
<?php }
}
/* {block 'form_errors'} */
class Block_12061287416046392e9a6456_88718286 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'form_errors' => 
  array (
    0 => 'Block_12061287416046392e9a6456_88718286',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <ul>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['errors']->value, 'error');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['error']->value) {
?>
          <li class="alert alert-danger"><?php echo nl2br($_smarty_tpl->tpl_vars['error']->value);?>
</li>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </ul>
    <?php
}
}
/* {/block 'form_errors'} */
}
