
<p> liste des Membres</p>
<div class="container">
<a href="add_membre" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Add Records</a>
</div>

<div class="clearfix"></div><br />

<div class="container">
<table width="100%" data-toggle="table" border="1" class="table table-bordered table-responsive">
 	<thead>
    	<th ><input type="checkbox" id="checkall" alt="Sélectionner Tout"/></th>
        <th >Nom</th>
        <th >Prenom</th>
        <th >Email</th>
        <th >Telephone</th>
        <th colspan="2" align="center">Actions</th>
    </thead>
 {foreach from=$membres item=membre}
     <tr>
	<td><input class="checkall" name="check[]" type="checkbox" id="checkall" value="{$membre->getId()}"/></td>
	<td>{$membre->getNom()}</td>
        <td>{$membre->getPrenom()}</td>
        <td>{$membre->getEmail()}</td>
        <td>{$membre->getTelephone()}</td>
	<td align="center"><a class="edit ml10" href="#" title="Éditer">
               <i class="glyphicon glyphicon-edit"></i>
            </a>
        </td>
        <td align="center">
            <a class="edit ml10" href="#" title="Afficher">
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
</div>
