	<div class="">
		<div id="sidebar-wrapper" class="col-lg-3 col-sm-3 col-md-3 panel panel-default">
			{include file='../sidebar.tpl'}
		</div>
		
		<div class="col-lg-9 col-sm-9 col-md-9">
          <h1 class="page-heading nospace">Contact</h1>
		  <br>
                  <div class="col-lg-9 col-lg-push-1">
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
					<textarea class="form-control" name="query" style="height: 150px;" placeHolder="Message" required></textarea>
			</div>
			<br>
			<a href="#" class="btn btn-primary pull-right  btnNext" id="send" style="margin: 10px 0;"><i class="glyphicon glyphicon-send"></i> &nbsp; Envoyer</a>
                        <button type="submit" class="hidden">Envoyer</button>	
				
		  </form>
                  </div>
        </div>
</div>
<div class="clearfix" style="height:40px"></div>
{literal}
 <script src="//code.jquery.com/jquery-1.10.2.js"></script>
   <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script type="text/javascript">

    $('#send').click(function(){
    
        $('form').submit();
    });
    
  
</script>
{/literal}
