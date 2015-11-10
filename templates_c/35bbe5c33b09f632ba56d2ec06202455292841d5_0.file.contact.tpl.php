<?php /* Smarty version 3.1.27, created on 2015-11-08 05:19:01
         compiled from "C:\wamp\www\MVC\application\views\contact\contact.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:11280563edb45169cf8_55664568%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35bbe5c33b09f632ba56d2ec06202455292841d5' => 
    array (
      0 => 'C:\\wamp\\www\\MVC\\application\\views\\contact\\contact.tpl',
      1 => 1446959937,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11280563edb45169cf8_55664568',
  'variables' => 
  array (
    'ROOT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_563edb452ab229_49731927',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_563edb452ab229_49731927')) {
function content_563edb452ab229_49731927 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '11280563edb45169cf8_55664568';
?>
	<div class="container">
		<div id="sidebar-wrapper" class="col-lg-3 col-sm-3 col-md-3 panel panel-default">
			<?php echo $_smarty_tpl->getSubTemplate ('../sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

		</div>
		
		<div class="col-lg-9 col-sm-9 col-md-9">
          <h1 class="page-heading nospace">Contact</h1>
		  <br>
		  <form name="contact" action="<?php echo $_smarty_tpl->tpl_vars['ROOT']->value;?>
contact/processcontact/" method="post">
			<div class="input-group input-group-lg">
				<span class="input-group-addon glyphicon glyphicon-user"></span>
					<input type="text" name="name" class="form-control" placeholder="Nom" required>
			</div>
			<br>
			<div class="input-group input-group-lg">
				<span class="input-group-addon glyphicon glyphicon-earphone"></span>
					<input type="text" name="number" class="form-control" placeholder="Telephone">
			</div>
			<br>
			<div class="input-group input-group-lg">
				<span class="input-group-addon">@</span>
					<input type="email" name="email" class="form-control" placeholder="Email" required>
			</div>
			<br>
			<div class="input-group input-group-lg">
				<span class="input-group-addon glyphicon glyphicon-question-sign"></span>
					<textarea class="form-control" name="query" style="height: 100px;" placeHolder="Message" required></textarea>
			</div>
			<br>
				
			<button type="submit" class="pull-right btn-lg btn-primary">Envoyer</button>
				
		  </form>	
        </div>
</div>
<div class="clearfix" style="height:40px"></div>

<?php }
}
?>