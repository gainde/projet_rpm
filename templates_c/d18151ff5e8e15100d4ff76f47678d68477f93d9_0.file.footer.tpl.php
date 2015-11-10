<?php /* Smarty version 3.1.27, created on 2015-11-10 03:18:59
         compiled from "C:\wamp\www\projet_rpm\application\views\footer.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2588156415413444683_89397990%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd18151ff5e8e15100d4ff76f47678d68477f93d9' => 
    array (
      0 => 'C:\\wamp\\www\\projet_rpm\\application\\views\\footer.tpl',
      1 => 1447121530,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2588156415413444683_89397990',
  'variables' => 
  array (
    'ROOT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56415413454088_60838964',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56415413454088_60838964')) {
function content_56415413454088_60838964 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2588156415413444683_89397990';
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
<?php 
   // including a php script directly from the template.
   include(WEBAPPROOT.'views/login-register/modal_login.php');
}
}
?>