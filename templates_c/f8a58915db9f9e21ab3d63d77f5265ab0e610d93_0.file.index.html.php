<?php /* Smarty version 3.1.27, created on 2015-10-23 19:30:23
         compiled from "C:\wamp\www\MVC\application\views\accueil\index.html" */ ?>
<?php
/*%%SmartyHeaderCode:22842562a8acf806826_22531815%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f8a58915db9f9e21ab3d63d77f5265ab0e610d93' => 
    array (
      0 => 'C:\\wamp\\www\\MVC\\application\\views\\accueil\\index.html',
      1 => 1445628616,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22842562a8acf806826_22531815',
  'variables' => 
  array (
    'titre' => 0,
    'description' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_562a8acf89cb78_61927542',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_562a8acf89cb78_61927542')) {
function content_562a8acf89cb78_61927542 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '22842562a8acf806826_22531815';
?>
<h1><?php echo $_smarty_tpl->tpl_vars['titre']->value;?>
</h1>
<p><?php echo $_smarty_tpl->tpl_vars['description']->value;?>
</p>

coucou dedans<?php }
}
?>