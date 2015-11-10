<?php /* Smarty version 3.1.27, created on 2015-11-10 03:18:59
         compiled from "C:\wamp\www\projet_rpm\application\views\slide.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:3184056415413437976_97951689%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '66d4f1829b29e9fef2461579f03e59f7b6bc2b68' => 
    array (
      0 => 'C:\\wamp\\www\\projet_rpm\\application\\views\\slide.tpl',
      1 => 1447035003,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3184056415413437976_97951689',
  'variables' => 
  array (
    'ROOT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5641541343d866_51729091',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5641541343d866_51729091')) {
function content_5641541343d866_51729091 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '3184056415413437976_97951689';
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