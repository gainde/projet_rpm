<?php /* Smarty version 3.1.27, created on 2015-11-09 03:10:08
         compiled from "C:\wamp\www\MVC\application\views\slide.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1162156400080864ab5_91947306%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da4a7979e74588744b8e732a997b15dc711f6594' => 
    array (
      0 => 'C:\\wamp\\www\\MVC\\application\\views\\slide.tpl',
      1 => 1447035003,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1162156400080864ab5_91947306',
  'variables' => 
  array (
    'ROOT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564000808abdc7_94727894',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564000808abdc7_94727894')) {
function content_564000808abdc7_94727894 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1162156400080864ab5_91947306';
?>

      <!--  Outer wrapper for presentation only, this can be anything you like -->
      <div id="banner-fade">

        <!-- start Basic Jquery Slider -->
       <ul class="bjqs">
          <li><img src="<?php echo $_smarty_tpl->tpl_vars['ROOT']->value;?>
ressources/images/touba.jpg" title="Ville de Touba"></li>
          <li><img src="http://placehold.it/500x400" title="Automatically generated caption"></li>
          <li><img src="http://placehold.it/500x400" title="Automatically generated caption"></li>
        </ul>
        <!-- end Basic jQuery Slider -->

      </div>
      <!-- End outer wrapper -->

      
<?php }
}
?>