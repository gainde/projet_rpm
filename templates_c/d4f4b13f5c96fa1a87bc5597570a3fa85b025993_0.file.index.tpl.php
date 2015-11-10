<?php /* Smarty version 3.1.27, created on 2015-11-10 03:18:59
         compiled from "C:\wamp\www\projet_rpm\application\views\accueil\index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2625856415413408e56_95830045%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4f4b13f5c96fa1a87bc5597570a3fa85b025993' => 
    array (
      0 => 'C:\\wamp\\www\\projet_rpm\\application\\views\\accueil\\index.tpl',
      1 => 1447034358,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2625856415413408e56_95830045',
  'variables' => 
  array (
    'ROOT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56415413421284_70529401',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56415413421284_70529401')) {
function content_56415413421284_70529401 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2625856415413408e56_95830045';
?>
<div class="container">
    <img src="<?php echo $_smarty_tpl->tpl_vars['ROOT']->value;?>
ressources/images/banniere.jpg" class="banniere"/>
</div>
	<div class="container">
		<div id="sidebar-wrapper" class="col-lg-3 col-sm-3 col-md-3 panel panel-default">
			<?php echo $_smarty_tpl->getSubTemplate ('../sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

		</div>
		
		<div class="col-lg-9 col-sm-9 col-md-9">
		<div class="row">
			<div class="col-lg-6 col-sm-6 col-md-6">
				<div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title">Vision</h3>
				  </div>
				  <div class="panel-body">
					 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a vulputate arcu. Fusce egestas finibus urna, eu tristique metus sollicitudin id. Aenean urna urna, lobortis eget neque vel, luctus mattis urna. Nullam luctus laoreet erat, id efficitur orci venenatis a. Cras maximus velit sed bibendum congue. Ut ornare luctus pellentesque. Integer maximus lacinia rutrum.

In lacus purus, pulvinar eget augue et, auctor volutpat massa. Morbi hendrerit rhoncus nisi vel placerat. 
				  </div>
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6" id="slider" ><?php echo $_smarty_tpl->getSubTemplate ('../slide.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>
</div>
		</div><!--row-->
		<div class="row">
			<blockquote>
			  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
			  <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
			</blockquote>
		</div> <!--row-->
		</div><!--col-->
		
	</div><!--container-->
	
	<?php echo '<script'; ?>
 class="secret-source">
        jQuery(document).ready(function($) {

          $('#banner-fade').bjqs({
            //height      : 300,
            width       : 500,
            responsive  : true
          });

        });
      <?php echo '</script'; ?>
>
	


<?php }
}
?>