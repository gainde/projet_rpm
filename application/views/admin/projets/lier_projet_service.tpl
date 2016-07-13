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
    url:"http://rp2m.com/admin/ajax/subdomaine/"+val,  
    success:function(data) {
      $('#subdomaine').html(data);
      $('#subdomaine').show();
    }
  });
     }else{
         return false;
     }
 }
 function getSubdomaineName(val,idpro){
   
     $.ajax({
    url:"http://rp2m.com/admin/admin/ajax/subdomaineName/"+val+"/"+idpro,  
    success:function(data) {
      $('#dom-'+val).html(data);
      
    }
  });
     
 }
</script>
{/literal}
<p><h3>Ajout de lien</h3></p>
<div class="container">
     
    <div class="col-lg-3"><form method="post" enctype="multipart/form-data"><div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title">Ajout d'un lien</h3>
				  </div>
                                    <div class="panel-body" ><table><tr><td><input type="hidden" name="projet" value='{$projet->getId()}' /></td></tr>
    <tr>
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
              <tr><td height='10'></td></tr>
      <tr><td><a href="{$ROOT}admin/projets" class="btn btn-large btn-info"><i class="glyphicon glyphicon-arrow-left"></i> &nbsp; Retour</a>&nbsp;&nbsp;
    <a href="#" class="btn btn-large btn-info" id="send"><i class="glyphicon glyphicon-floppy-save"></i> &nbsp; Enregistrer</a>
    <button id="submit1" type="submit" class="hidden">Envoyer</button></td></tr>
      <tr><td></td></tr>
                                        </table></div></div></form>
    </div>
     <div class="col-lg-9">
         <div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title">Liste des projets avec leur lien</h3>
				  </div>
                                    <div class="panel-body">
    <table width='100%'><tr><th width='40%'>Nom du projet</th><th width='60%'>Nom du service</th></tr>
        {assign var='idproj' value=0}
        {foreach $link as $value}
            {if $idproj neq $value->getId_project()}
            {assign var='idproj' value=$value->getId_project()}
            <tr><td>{$projet->getTitre()}</td><td id="dom-{$value->getId_service()}"></td></tr>
            {/if}
            {/foreach}
         
    </table>
                                    </div>
         </div>
     </div>
</div>
{literal}
<script>
 $('#send').click(function(){
     $('#submit1').click();
 });
 {/literal}
     {foreach $link as $value}
         {literal}
          getSubdomaineName({/literal}{$value->getId_service()}{literal},{/literal}{$value->getId_project()}{literal}) 
          {/literal}
         {/foreach}
             {literal}
</script>
{/literal}