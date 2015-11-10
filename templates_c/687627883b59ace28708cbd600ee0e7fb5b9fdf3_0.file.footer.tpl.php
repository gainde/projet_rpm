<?php /* Smarty version 3.1.27, created on 2015-11-08 23:49:59
         compiled from "C:\xampp\htdocs\MVC\application\views\footer.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:20053563fd197c27ea5_05333681%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '687627883b59ace28708cbd600ee0e7fb5b9fdf3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MVC\\application\\views\\footer.tpl',
      1 => 1445751247,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20053563fd197c27ea5_05333681',
  'variables' => 
  array (
    'ROOT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_563fd197c2b921_70087684',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_563fd197c2b921_70087684')) {
function content_563fd197c2b921_70087684 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '20053563fd197c27ea5_05333681';
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