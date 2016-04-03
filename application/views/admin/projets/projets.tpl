<p> Liste des Projets</p>
<div class="container">
<a href="creer_projet" class="btn btn-large btn-info" title="Creer un projet"><i class="glyphicon glyphicon-plus"></i> &nbsp; Créer projet</a>
</div>

<div class="clearfix"></div><br />

<div class="container">
<form id="module" action="" method="post" enctype="multipart/form-data">
<table width="100%" data-toggle="table" border="1" class="table table-bordered table-responsive">
 	<thead>
    	<th ><input type="checkbox" id="checkall" alt="Sélectionner Tout"/></th>
        <th >Nom</th>
        <th >Date de création</th>
        <th >Date de fin</th>
        <th colspan="2" align="center">Actions</th>
    </thead>
 
{foreach from=$projets item=projet}
     <tr>
	<td><input class="checkall" name="check[]" type="checkbox" id="checkall" value="{$projet->getId()}"/></td>
	<td>{$projet->getTitre()}</td>
        <td>{$projet->getDate_creation()}</td>
        <td>{$projet->getDate_fin()}</td>
	<td align="center"><a class="edit ml10" href="editer_projet/{$projet->getId()}" title="Éditer">
               <i class="glyphicon glyphicon-edit"></i>
            </a>
        </td>
        <td align="center">
            <a class="edit ml10" href="afficher_projet/{$projet->getId()}" title="Afficher">
               <i class="glyphicon glyphicon-eye-open"></i>
            </a>
        </td>
        <td align="center">
            <a class="edit ml10" href="#" title="Suprimer">
               <i class="glyphicon glyphicon-remove"></i>
            </a>
        </td>
    </tr>
 {/foreach}
</table>
</form>
</div>
