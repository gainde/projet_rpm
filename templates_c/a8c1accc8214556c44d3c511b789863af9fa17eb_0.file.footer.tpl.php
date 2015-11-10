<?php /* Smarty version 3.1.27, created on 2015-10-25 05:34:10
         compiled from "C:\wamp\www\MVC\application\views\footer.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:5518562c69d2ae1dd8_09812556%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a8c1accc8214556c44d3c511b789863af9fa17eb' => 
    array (
      0 => 'C:\\wamp\\www\\MVC\\application\\views\\footer.tpl',
      1 => 1445751247,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5518562c69d2ae1dd8_09812556',
  'variables' => 
  array (
    'ROOT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_562c69d2ba8fe9_29535208',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_562c69d2ba8fe9_29535208')) {
function content_562c69d2ba8fe9_29535208 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '5518562c69d2ae1dd8_09812556';
?>
	<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-1.10.2.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['ROOT']->value;?>
ressources/js/carousel.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['ROOT']->value;?>
ressources/js/bootstrap.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['ROOT']->value;?>
ressources/js/login_init.js"><?php echo '</script'; ?>
>
	</body>
</html>
<?php }
}
?>