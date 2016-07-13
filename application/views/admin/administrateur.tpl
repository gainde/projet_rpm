<p> liste des administrateurs</p>
<div class="container">
    {if $success['success'] eq '0'}<label class="alert alert-danger">Ce courriel n'existe pas!</label>
                                                                                              {/if}
<form action="" method="post"><div class="col-lg-3" ><input size="10" type="text" class="form-control" name="email" placeholder='email@ddd.com'/>
    </div><div class="col-lg-4" ><button type='submit' class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Ajouter </button></div>
    </form>
</div>

<div class="clearfix"></div><br />

<div class="container">
    <div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title">Administrateur</h3>
				  </div>
                                    <div class="panel-body" >
<table id="example" width="100%" data-toggle="table" border="1" class="table table-bordered table-responsive">
 	<thead>
    	<th ></th>
        <th >Nom</th>
        <th >Prenom</th>
        <th >Email</th>
        <th >Telephone</th>
        <th colspan="2" align="center">Actions</th>
    </thead>
    {assign var='index' value=0}
 {foreach from=$membres item=membre}
     {assign var='index' value=$index+1}
     <tr>
	<td>{$index}</td>
	<td>{$membre->getNom()}</td>
        <td>{$membre->getPrenom()}</td>
        <td>{$membre->getEmail()}</td>
        <td>{$membre->getTelephone()}</td>
        <td align="center">
            <a class="edit ml10" href="{$ROOT}admin/admin/supprimer_admin/{$membre->getId()}" title="Suprimer">
               <i class="glyphicon glyphicon-remove"></i>
            </a>
        </td>
    </tr>
 {/foreach}
</table>
                                    </div></div>
</div>
<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
