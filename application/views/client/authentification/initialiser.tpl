<div class="">
    <div id="sidebar-wrapper" class="col-lg-3 col-sm-3 col-md-3 panel panel-default">
            {include file='../sidebar.tpl'}
    </div>
    <div class="col-lg-9 col-sm-9 col-md-9">
        <h1 class="page-heading nospace">Réinitialiser votre mot de passe</h1>
        <br>
        {if $init neq '0'}
        <div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title">Information</h3>
				  </div>
                                    <div class="panel-body" >
                                        {/if}
        {if $init eq '1'}
            <p>Votre mot de passe a été réinitialisé avec succés. Veuillez vous reconnecter!</p>
            {elseif $init eq '-1'}
                 <p>Votre mot de passe n'a pas été réinitialisé. Un problème est survenu ! Veuillez reprendre la procédure d'activation de compte.</p>
            {else}
                {if $init neq '0'}
            </div>
            </div>{/if}
                <form method="post" enctype="multipart/form-data">
            <table class="table-register" cellspacing="10" cellcollapse="none">
                <thead><tr><th width="30%"></th><th width="80%"></th></tr></thead>
                <tr>
                    <td>
                        <label class="bg-label">Email *:</label>
                     </td>
                    <td>
                        <input class='required form-control' type="text" name="mail" placeholder="Email">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="bg-label">Mot de passe *:</label>
                    </td>
                    <td>
                        
                        <input id='password' class='required form-control' type="password" name="password" placeholder="Mot de passe ">
                    </td>
                </tr>
                <tr>
                 <td>
                      <label class="bg-label">Confirmer mot de passe *:</label>
                </td>
                <td>
                    <input id='passwordc' class='required form-control' type="password" name="passwordc" placeholder="Confirmer mot de passe">
                </td>
              </tr>
               <tr>
                <td colspan="2">
            <a href="#" class="btn btn-primary pull-right  btnNext" id="send" style="margin: 10px 0;"><i class="glyphicon glyphicon-send"></i> &nbsp; Envoyer</a>
                        <button type="submit" class="hidden">Envoyer</button>	
                </td>
                </tr>
            </table>
        </form>
            {/if}
    </div>
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
{literal}
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
   <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>                   
   <script type="text/javascript">
       
         $('#send').click(function(){
              var stop = true;
            $('.required').each(function(e){
                if($(this).val()){
              
                }else{
                 alert(" Veuillez remplir tous les champs obligatoires: *")
                 stop = false;
                return false;
                }
            });
            if($('#password').val() != $('#passwordc').val()){
                alert(" Les mots de passe ne sont pas identiques! Veuillez confirmer le mot de passe.")
                stop = false;
                return false;
            }
            if(stop){
                $('form').submit();
            }
         });
    </script>
    
{/literal}