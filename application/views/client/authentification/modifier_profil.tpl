
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
{literal}
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
   <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>                   
   <script type="text/javascript">
    //$('#subdomaine').hide();
 function getSubdomaine(val){
     if(val != '000'){
  
     $('#subdomaine').hide();
     $.ajax({
    url:"http://rp2m.com/ajax/subdomaine/"+val,  
    success:function(data) {
      $('#subdomaine').html(data);
      $('#subdomaine').show();
      $('#domaines').val('{/literal}{$domaine}{literal}');
    }
  });
     }else{
         return false;
     }
 }

function validate(evt) {
   
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  if(key !== 8){
  key = String.fromCharCode( key );
  var regex = /[0-9]/;
  if( !regex.test(key)) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
  }
}
</script>
{/literal}
<div class="">
    <div id="sidebar-wrapper" class="col-lg-3 col-sm-3 col-md-3 panel panel-default">
            {include file='../sidebar.tpl'}
    </div>
    <div class="col-lg-9 col-sm-9 col-md-9">
        {include file="../breadcrumb.tpl"}
        <h1 class="page-heading nospace">Inscription</h1>
        <br>
       
            <div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title">Information</h3>
				  </div>
                                    <div class="panel-body" >
                                        <form method="post" enctype="multipart/form-data">
            <table class="table-register" cellspacing="10" cellcollapse="none" width='100%'>
                <thead><tr><th width="40%"></th><th width="60%"></th></tr></thead>
                <tr>
                    <td>
                        <label class="bg-label">Prénom *:</label>
                    </td>
                    <td>
                        <input class='hidden' type="text" name="iduser" value="{$User->getId()}" >
                        <input class='required form-control' type="text" name="lastname" value="{$User->getPrenom()}" placeholder="Prénom">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="bg-label">Nom *:</label>
                    </td>
                    <td>
                        <input class='required form-control' type="text" name="name" value="{$User->getNom()}" placeholder="Nom">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="bg-label">Email *:</label>
                     </td>
                    <td>
                        <input class='required form-control' type="text" name="mail" value="{$User->getEmail()}" placeholder="Email">
                    </td>
                </tr>
                
              <tr>
                 <td>
                      <label class="bg-label">Secteur *:</label>
                </td>
                <td>
                    <select class='form-control' name="skills" id="services" onchange="getSubdomaine(this.value)" onclick="getSubdomaine(this.value)">
                        <option value="000">Sélectionner votre secteur</option>
                        {nocache}
                        {foreach from=$services['services'] item=service}
                         <option value="{$service->getId()}">{$service->getTitre()}</option>
                        {/foreach}
                        {/nocache}
                    </select>
                </td>
              </tr>
              <tr id="subdomaine">
                 
              </tr>
              <tr>
                 <td>
                <label class="bg-label">Téléphone:</label>
                </td>
                <td>
                    <input class='form-control' type="text" name="tel" value="{$User->getTelephone()}" placeholder="Téléphone" onkeypress="validate(event)">
                </td>
                </tr>
               <tr>
                <td>
                    <label class="bg-label">Numéro rue:</label>
                    
                  </td>
                <td>
                    <input class='form-control' type="text" name="numberr" value="{$adresse->getNumero()}" placeholder="Numéro rue" onkeypress="validate(event)">
                </td>
                </tr>
               <tr>
                <td>
                    <label class="bg-label">Rue:</label>
                     </td>
                    <td>
                        <input class='form-control' type="text" name="road" value="{$adresse->getRue()}" placeholder="Rue">
                    </td>
                </tr>
                <tr>
                <td>
                    <label class="bg-label">Code postal:</label>
                     </td>
                    <td>
                     <input class='form-control' type="text" name="codep" value="{$adresse->getCode_postale()}" placeholder="Code postal">
                     </td>
                </tr>
                <tr>
                <td>
                    <label class="bg-label">Ville:</label>
                 </td>
                 <td>
                    <input class='form-control' type="text" name="city" value="{$adresse->getVille()}" placeholder="Ville">
                 </td>
                </tr>
                <tr>
                <td>
                    <label class="bg-label">Province:</label>
                 </td>
                 <td>
                    <input class='form-control' type="text" name="province" value="{$adresse->getProvince()}" placeholder="Province">
                 </td>
                </tr>
                <tr>
                <td>
                <label class="bg-label">Pays:</label>
                </td>
                 <td>
                    <input class='form-control' type="text" name="country" value="{$adresse->getPays()}" placeholder="Pays">
                    </td>
                </tr>
                <tr>
                <td colspan="2" align="right">
                    <a style="margin:0 10px 0 0;" href="{$ROOT}authentification/profil/{$User->getId()}" class="btn btn-primary  btnNext" id="send" style="margin: 10px 0;"><i class="glyphicon glyphicon-arrow-left"></i> &nbsp; Annuler</a>
                    <a href="#" class="btn btn-primary btnNext" id="send" style="margin: 10px 0;"><i class="glyphicon glyphicon-send"></i> &nbsp; Envoyer</a>
                        <button type="submit" class="hidden">Envoyer</button>	
                </td>
                </tr>
            </table>
        </form>
                                    </div>
            </div>
      </div>
</div>
{literal}
    <script>
       
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
            
            if(stop){
                $('form').submit();
            }
         });
         $('#services').val('{/literal}{$profession}{literal}');
         $('#services').click();
          
    </script>
    
{/literal}
