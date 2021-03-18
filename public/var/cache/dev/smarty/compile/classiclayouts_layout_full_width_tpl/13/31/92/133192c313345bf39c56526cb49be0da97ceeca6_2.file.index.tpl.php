<?php
/* Smarty version 3.1.34-dev-7, created on 2021-03-16 09:14:37
  from '/home/beata/PhpstormProjects/pdp/public/themes/classic/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6050af3de1b192_51376837',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '133192c313345bf39c56526cb49be0da97ceeca6' => 
    array (
      0 => '/home/beata/PhpstormProjects/pdp/public/themes/classic/templates/index.tpl',
      1 => 1614747497,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6050af3de1b192_51376837 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_856025626050af3de196d2_33440458', 'page_content_container');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'page.tpl');
}
/* {block 'page_content_top'} */
class Block_20046634496050af3de19b85_08731504 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_content_top'} */
/* {block 'hook_home'} */
class Block_20990931236050af3de1a470_09159139 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <?php echo $_smarty_tpl->tpl_vars['HOOK_HOME']->value;?>

          <?php
}
}
/* {/block 'hook_home'} */
/* {block 'page_content'} */
class Block_10227741696050af3de1a170_47875288 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20990931236050af3de1a470_09159139', 'hook_home', $this->tplIndex);
?>

        <?php
}
}
/* {/block 'page_content'} */
/* {block 'page_content_container'} */
class Block_856025626050af3de196d2_33440458 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_content_container' => 
  array (
    0 => 'Block_856025626050af3de196d2_33440458',
  ),
  'page_content_top' => 
  array (
    0 => 'Block_20046634496050af3de19b85_08731504',
  ),
  'page_content' => 
  array (
    0 => 'Block_10227741696050af3de1a170_47875288',
  ),
  'hook_home' => 
  array (
    0 => 'Block_20990931236050af3de1a470_09159139',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <section id="content" class="page-home">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20046634496050af3de19b85_08731504', 'page_content_top', $this->tplIndex);
?>


        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10227741696050af3de1a170_47875288', 'page_content', $this->tplIndex);
?>

      </section>
    <?php
}
}
/* {/block 'page_content_container'} */
}
