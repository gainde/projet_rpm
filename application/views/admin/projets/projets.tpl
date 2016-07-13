 
<p> Liste des Projets</p>
<div class="container">
<a href="creer_projet" class="btn btn-large btn-info" title="Creer un projet"><i class="glyphicon glyphicon-plus"></i> &nbsp; Créer projet</a>
<button id="delete" class="btn btn-large btn-info" title="Supprimer un projet"><i class="glyphicon glyphicon-remove"></i> &nbsp;Supprimer</button>
</div>

<div class="clearfix"></div><br />

<div class="container">
    <div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title">Liste des projets</h3>
				  </div>
                                    <div class="panel-body" >
<form id="projet-list" action="" method="post" enctype="multipart/form-data">
    <table id="myTable" width="100%" data-toggle="table" border="1" class="table table-bordered table-responsive">
 	<thead>
    	<th ><input type="checkbox" id="checkall" alt="Sélectionner Tout"/></th>
        <th >Nom</th>
        <th >Date de création</th>
        <th >Date de fin</th>
        <th >Statut</th>
        <th colspan="2" align="center">Actions</th>
    </thead>
 
{foreach from=$projets item=projet}
     <tr>
	<td><input class="checkall" name="check[]" type="checkbox" id="checkall" value="{$projet->getId()}"/></td>
	<td>{$projet->getTitre()}</td>
        <td>{$projet->getDate_creation()|date_format:"%Y-%m-%d"}</td>
        <td>{$projet->getDate_fin()}</td>
        <td>{if $projet->getStatut() eq '1'}
                <span class="label label-success">Actif</span>
            {elseif $projet->getStatut() eq '0'}
                <span class="label label-warning">Inactif</span>
            {elseif $projet->getStatut() eq '-1'}
            <span class="label label-danger">Supprimé</span>
            {/if}</td>
	<td align="center"><a class="edit ml10" href="editer_projet/{$projet->getId()}" title="Éditer">
               <i class="glyphicon glyphicon-edit"></i>
            </a>
            &nbsp;
            <a class="edit ml10" href="afficher_projet/{$projet->getId()}" title="Afficher">
               <i class="glyphicon glyphicon-eye-open"></i>
            </a>
            &nbsp;
            <a class="remove ml10" href="supprimer_projet/{$projet->getId()}" title="Suprimer">
               <i class="glyphicon glyphicon-remove"></i>
            </a>
               &nbsp;
            <a class="remove ml10" href="lier_projet_service/{$projet->getId()}" title="Lier le projet avec un service">
               <i class="glyphicon glyphicon-paperclip"></i>
            </a>
        </td>
    </tr>
 {/foreach}
</table>
</form>
 </div>
 </div>
</div>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
{literal}
   
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script type="text/javascript">
    $('#checkall').click(function(e){
        if($(this).is(':checked')){
            $('.checkall').each(function(e){
             
                $(this).attr('checked', true);
                });
         }else{
             $('.checkall').each(function(e){
             
                $(this).attr('checked', false);
                });
         }
        
    });
        $('#delete').click(function(e){
            var stop = false;
            $('.checkall').each(function(e){
                if($(this).is(':checked')){
                    stop = true;
                }
            });
            if(stop){
                $('#projet-list').submit();
            }else{
                alert("Veuillez selectionner un item.");
            }
            
        });
        $(document).ready(function(){
    $('#myTable').DataTable();
});
        </script>
    {/literal}