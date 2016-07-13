	<div class="">
		<div id="sidebar-wrapper" class="col-lg-3 col-sm-3 col-md-3 panel panel-default">
			{include file='../sidebar.tpl'}
		</div>
		
		<div class="col-lg-9 col-sm-9 col-md-9">
          <h1 class="page-heading nospace">Contact</h1>
		  <br>
                  <div class="col-lg-9 col-lg-push-1">
                       <div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title">Information</h3>
				  </div>
                                    <div class="panel-body" >
                                        {if $success eq '1'}
                                            <p> Votre message a été envoyé avec succés à l'équipe de RPM. 
                                                Nous vous répondons bientôt !</p>
                                            {elseif $success eq '-1'}
                                              <p> Une erreur est survenue lors de l'envoie du message. Veuillez réessayer svp !</p>
                                                {/if}
		  <form name="contact"  method="post">
                      <center> <table width="90%">
                       
                    <tr>
                    <td>
                        <label class="bg-label">Nom *:</label>
                    </td>
                    </tr>
                    <tr>
                    <td>
                        <input class='required form-control' type="text" name="name" placeholder="Prénom et nom">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="bg-label">Email *:</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class='required form-control' type="text" name="email" placeholder="Email" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="bg-label">Telephone *:</label>
                     </td>
                </tr>
                <tr>
                    <td>
                        <input class='required form-control' type="email" name="number" placeholder="Telephone" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="bg-label">Message *:</label>
                     </td>
                </tr>
                <tr>
                    <td>
                       <textarea class="form-control" name="query" style="height: 150px;" placeHolder="Message" required></textarea>
                    </td>
                </tr>
                 <tr>
                <td>
                    <a href="#" class="btn btn-primary pull-right  btnNext" id="send" style="margin: 10px 0;"><i class="glyphicon glyphicon-send"></i> &nbsp; Envoyer</a>
                        <button type="submit" class="hidden">Envoyer</button>
                </td>
                 </tr>
                          </table></center>
                 
		  </form>
                                    </div>
                       </div>
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
