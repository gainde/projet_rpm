	<div class="container">
		<div id="sidebar-wrapper" class="col-lg-3 col-sm-3 col-md-3 panel panel-default">
			{include file='../sidebar.tpl'}
		</div>
		
		<div class="col-lg-9 col-sm-9 col-md-9">
          <h1 class="page-heading nospace">Contact</h1>
		  <br>
		  <form name="contact" action="{$ROOT}contact/processcontact/" method="post">
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

