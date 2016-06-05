<div class="">
    <div id="sidebar-wrapper" class="col-lg-3 col-sm-3 col-md-3 panel panel-default">
            {include file='../sidebar.tpl'}
    </div>
    <div class="col-lg-9 col-sm-9 col-md-9">
        <h1 class="page-heading nospace">Connection</h1>
        <br>
  
   
            <div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title">Veuillez vous authentifier ou vous inscrire</h3>
				  </div>
                                    <div class="panel-body" >
                
                                        <table class='table-register'><thead><tr><th width='60%'></th><th width='10%'></th><th></th></tr></thead>
                                            <tr><td align='center'>
                    <form id="login" action="" method="post">
                        
                            <input type="hidden" name="action" value="user_login">
                            <input type="hidden" name="module" value="login">
                            <div class="form-group">
                                <input type="text" name="username" id="username" placeholder="Entrez votre nom d'utilisateur" value="" class="form-control login-field">
                                <i class="fa fa-user login-field-icon"></i>
                            </div>

                            <div class="form-group">
                                <input type="password" name="password" id="login-pass" placeholder="Password" value="" class="form-control login-field">
                                <i class="fa fa-lock login-field-icon"></i>
                            </div>

                            <input href="#" class="btn btn-success modal-login-btn" id="submit" type="submit" value="Connecter">
                            
                            <a href="{$ROOT}authentification/initialiser/" class="login-link text-center">Mot de passe perdu</a>
                       
                    </form>
                </td>
                <td align='center' class="border-left-login"><span id='center-line'> OU </span></td>
                    <td align='center'>
                       <a href="{$ROOT}authentification/inscription/" >Nouveau utilisateur</a>
           
                    </td></tr></table>																												
                </div>
            </div>
        </div>

               
</div>
      
   
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
{literal}
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
   <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>   
   <script type="text/javascript">
    //$('#subdomaine').hide();
 $('#mod').click();
 $('#closeOverlay').click(function(){
     
 });
</script>
{/literal}