<p> Liste des pages</p>
<div class="container">

</div>

<div class="clearfix"></div><br />

<div class="container">
    <div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title">Liste des pages</h3>
				  </div>
                                    <div class="panel-body" >
<form id="projet-list" action="" method="post" enctype="multipart/form-data">
<table width="100%" data-toggle="table" border="1" class="table table-bordered table-responsive">
 	<thead>
    	<th >Numéro</th>
        <th >Nom</th>
        <th align="center">Action</th>
    </thead>
{foreach from=$allpages item=page}
	<td>{$page->getId_page()}</td>
	<td>{$page->getTitre()}</td>
       
	<td align="center"><a class="edit ml10" href="{$page->getTitre()}" title="Éditer">
               <i class="glyphicon glyphicon-edit"></i>
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
        </script>
    {/literal}
