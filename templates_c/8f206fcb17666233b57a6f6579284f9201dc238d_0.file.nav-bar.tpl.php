<?php /* Smarty version 3.1.27, created on 2015-11-08 23:49:59
         compiled from "C:\xampp\htdocs\MVC\application\views\nav-bar.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:12697563fd197bf14c0_26442007%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f206fcb17666233b57a6f6579284f9201dc238d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MVC\\application\\views\\nav-bar.tpl',
      1 => 1446958199,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12697563fd197bf14c0_26442007',
  'variables' => 
  array (
    'ROOT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_563fd197bfc6f3_94740686',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_563fd197bfc6f3_94740686')) {
function content_563fd197bfc6f3_94740686 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '12697563fd197bf14c0_26442007';
?>
<!-- TOPNAV
================================================== -->
<div class="header_top"><!--header_top-->
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        Réseaux des Professionnels Mourides (RPM)
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="pull-right">
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><!--/header_top-->




<!-- NAVBAR
================================================== -->
<div class="navbar-wrapper">
    <div class="container">

        <div class="navbar navbar navbar-static-top" role="navigation">
            <div class="container">
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT']->value;?>
accueil/">Accueil</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT']->value;?>
register/">Devenir membre</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT']->value;?>
pourquoi/">Pourquoi devenir membre</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT']->value;?>
statut/">Projets/Réalisations</a></li>

                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT']->value;?>
actualites/">Actualités</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT']->value;?>
apropos/">A propos de RPM</a></li>
                        <li><a href="#">Forum</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT']->value;?>
contact/">Nous joindre</a></li>
                        <li><button id='modal-launcher' class="btn btn-primary btn-lg" data-toggle="modal" data-target="#login-modal">Log In</button></li>

                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
<?php }
}
?>