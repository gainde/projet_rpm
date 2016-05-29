<p> Liste des Services</p>
<div class="container">
<a href="creer_service" class="btn btn-large btn-info" title="Creer un service"><i class="glyphicon glyphicon-plus"></i> &nbsp; Créer </a>
<button id="delete" class="btn btn-large btn-info" title="Supprimer un service"><i class="glyphicon glyphicon-remove"></i> &nbsp;Supprimer</button>
</div>

<div class="clearfix"></div><br />

<div class="container">
<form id="service-list" action="" method="post" enctype="multipart/form-data">
<table width="100%" data-toggle="table" border="1" class="table table-bordered table-responsive">
 	<thead>
    	<th ><input type="checkbox" id="checkall" alt="Sélectionner Tout"/></th>
        <th >Nom</th>
        <th >Domaines</th>
        <th colspan="2" align="center">Actions</th>
    </thead>
 
{foreach from=$services['services'] item=service}
     <tr>
	<td><input class="checkall" name="check[]" type="checkbox" id="checkall" value="{$service->getId()}"/></td>
	<td>{$service->getTitre()}</td>
        <td><table>{foreach from=$service->getDomaine()  item=domaine}
                    <tr><td>{$domaine->getTitre()}</td></tr>
                 
            {/foreach}
        </table>
        </td>
	<td align="center"><a class="edit ml10" href="editer_service/{$service->getId()}" title="Éditer">
               <i class="glyphicon glyphicon-edit"></i>
            </a>
            &nbsp;
            <a class="edit ml10" href="afficher_service/{$service->getId()}" title="Afficher">
               <i class="glyphicon glyphicon-eye-open"></i>
            </a>
            &nbsp;
            <a class="remove ml10" href="supprimer_service/{$service->getId()}" title="Suprimer">
               <i class="glyphicon glyphicon-remove"></i>
            </a>
        </td>
    </tr>
 {/foreach}
</table>
</form>
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
                $('#service-list').submit();
            }else{
                alert("Veuillez selectionner un item.");
            }
            
        });
        </script>
    {/literal}
