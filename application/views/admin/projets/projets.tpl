<script src='{$ROOT}ressources/js/tinymce/tinymce.min.js'></script>
<script src="{$ROOT}ressources/js/tinymce/jquery.tinymce.min.js"></script>
<script type="text/javascript">

tinymce.init({
  selector: 'textarea',
  height: 500,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
  ],
  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  content_css: [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css'
  ]
});
</script>
<p> liste des projets</p>
<form id="module" action="" method="post" enctype="multipart/form-data">
    <div class="col-lg-12 col-md-12 col-sm-12"><a class="" href="#" title="Creer un projet"><button type="button">Nouveau projet</button></a><a class="btn-size" href="#" title="Supprimer les projets"><button type="button">Supprimer projet</button></a></div>
<table width="100%" data-toggle="table" border="1">
 	<thead>
    	<th width="10%" align="center"><input type="checkbox" id="checkall" alt="Sélectionner Tout"/></th>
        <th width="30%" align="center">Nom</th>
        <th width="20%" align="center">Date de création</th>
        <th width="20%" align="center">Date de fin</th>
        <th width="20%" align="center">Option</th>
    </thead>
 {foreach from=$projets item=projet}
     <tr>
	<td><input class="checkall" name="check[]" type="checkbox" id="checkall" value="{$projet->getId()}"/></td>
	<td>{$projet->getTitre()}</td>
        <td>{$projet->getDate_creation()}</td>
        <td>{$projet->getDate_fin()}</td>
	<td><a class="edit ml10" href="#" title="Éditer">
               <i class="glyphicon glyphicon-edit"></i>
            </a>
            <a class="edit ml10" href="#" title="Afficher">
               <i class="glyphicon glyphicon-eye-open"></i>
            </a>
            <a class="edit ml10" href="#" title="Suprimer">
               <i class="glyphicon glyphicon-remove"></i>
            </a>
        </td>
	</tr>
 {/foreach}
</table>
<form method="post">
 
	<label for="male">Accueil</label>
	<textarea id="mytextareaAccueil" name="accueil"></textarea>
</form>