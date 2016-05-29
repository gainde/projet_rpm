<script src='{$ROOT}ressources/js/tinymce/tinymce.min.js'></script>
<script src="{$ROOT}ressources/js/tinymce/jquery.tinymce.min.js"></script>
<script type="text/javascript">
  
tinymce.init({
  selector: 'textarea',
  width:800,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
  ],
  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  content_css: [
    '../ressources/css/style.css'
  ]
}); 
</script>
<div class="container">
<form method="post" enctype="multipart/form-data">
    <div class="input-group input-group-lg">
        <label class="bg-label">Nom :</label>
	<input type="text" name="name" class="form-control" placeholder="Nom du projet" value="{$projet->getTitre()}">
        <input type="text" name="id" class="hidden" placeholder="Nom du projet" value="{$projet->getId()}">
    </div>
    <div class="input-group input-group-lg pull-right">
        <label for="from" class="bg-label">Date :</label>
        <input type="text" id="from" name="from" value="{$projet->getDate_creation()|date_format:"%Y-%m-%d"}">
        <label for="to"> à </label>
        <input type="text" id="to" name="to" value="{$projet->getDate_fin()}">
    </div>
     <div class="input-group input-group-lg">
        <label class="bg-label">Image :</label>
        <input name="imgp" type="file" id="upload-file">
        <label class="bg-label">Nom de l'image:</label>
        <input type="text" name="nameimg" class="form-control" placeholder="Nom de l'image" value="{$projet->getImage()}">
        <div id="destination" class="size-image"><img src="{if $SITEURL eq ''}http://rp2m.com/{/if}ressources/images/projets/{$projet->getUrl()}">
            &nbsp;&nbsp;<input class="hidden" type='text' name='url' value='{$projet->getUrl()}'/></div>
    </div>
     <div class="input-group input-group-lg">
        <label class="bg-label">Description :</label>
	<textarea rows="4" id="mytextareaAccueil" name="description">{$projet->getDescription()}</textarea>
     </div>
     <div class="input-group input-group-lg">
	<label class="bg-label">Contenu :</label>
	<textarea id="mytextareaAccueil" name="contenu">{$projet->getContenu()}</textarea>
      </div>
      <div class="input-group input-group-lg">
          {assign var='checked' value="checked"}
          {if $projet->getStatut() neq '1'}
               {assign var='checked' value=""}
            {/if}
        <label class="bg-label"><input type="radio" name="state" value="1" {$checked}>&nbsp;Actif</label>&nbsp;&nbsp;
        {assign var='checked' value="checked"}
          {if $projet->getStatut() neq '0'}
               {assign var='checked' value=""}
            {/if}
	 <label class="bg-label"><input type="radio" name="state" value="0" {$checked}>&nbsp;Inactif</label>&nbsp;&nbsp;
         {assign var='checked' value="checked"}
          {if $projet->getStatut() neq '-1'}
               {assign var='checked' value=""}
            {/if}
          <label class="bg-label"><input type="radio" name="state" value="-1" {$checked}>&nbsp;Supprimé</label>
      </div>
    <br>
    <a href="{$ROOT}admin/projets" class="btn btn-large btn-info"><i class="glyphicon glyphicon-arrow-left"></i> &nbsp; Retour</a>&nbsp;&nbsp;
    <a href="#" class="btn btn-large btn-info" id="send"><i class="glyphicon glyphicon-floppy-save"></i> &nbsp; Enregistrer</a>
    <button type="submit" class="hidden">Envoyer</button>
</form>
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
{literal}
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
   <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script type="text/javascript">

    $('#send').click(function(){
        $('form').submit();
    });
    
  
    $( "#from" ).datepicker({
      dateFormat: "yy-mm-dd",
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#to" ).datepicker({
      dateFormat: "yy-mm-dd",
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
    //upload file
   document.getElementById('upload-file').addEventListener('change', function() {
	var file;
	var destination = document.getElementById('destination');
	destination.innerHTML = '';

	// Looping in case they uploaded multiple files
	for(var x = 0, xlen = this.files.length; x < xlen; x++) {
		file = this.files[x];
		if(file.type.indexOf('image') != -1) { // Very primitive "validation"

			var reader = new FileReader();

			reader.onload = function(e) {
				var img = new Image();
				img.src = e.target.result; // File contents here

				destination.appendChild(img);
			};
			
			reader.readAsDataURL(file);
		}
	}
});
</script>
{/literal}