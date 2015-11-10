<?php /* Smarty version 3.1.27, created on 2015-11-08 06:14:14
         compiled from "C:\wamp\www\MVC\application\views\erreur\404.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:28491563ee836466f47_15114689%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2649aaef687c127a17f317cf09c468b0efe68d4e' => 
    array (
      0 => 'C:\\wamp\\www\\MVC\\application\\views\\erreur\\404.tpl',
      1 => 1446963242,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28491563ee836466f47_15114689',
  'variables' => 
  array (
    'ROOT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_563ee8364aa015_23465023',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_563ee8364aa015_23465023')) {
function content_563ee8364aa015_23465023 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '28491563ee836466f47_15114689';
?>
<div class="container">
        <div class="col-lg-6 col-sm-6 col-md-6 col-md-push-3">
            <div class="error-template">
                <div class="erreur404">
                    <h1>
                        Oops!</h1>
                    <h2>
                        404 Page non trouvé</h2>
                    <div class="error-details">
                        Désolé, Il y'a une erreur, page non trouvé!
                    </div>
                </div>
                <div class="error-actions">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['ROOT']->value;?>
accueil/" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                        Page d'accueil </a><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT']->value;?>
contact/" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-envelope"></span> Contact </a>
                </div>
            </div>
        </div>
</div><?php }
}
?>