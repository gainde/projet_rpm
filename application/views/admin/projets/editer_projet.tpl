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
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css'
  ]
});
</script>
<div class="container">
<form method="post">
    <div class="input-group input-group-lg">
        <label class="bg-label">Nom :</label>
	<input type="text" name="name" class="form-control" placeholder="Nom du projet" value="{$projet->getTitre()}">
        <input type="text" name="id" class="hidden" placeholder="Nom du projet" value="{$projet->getId()}">
    </div>
    <div class="input-group input-group-lg pull-right">
        <label for="from" class="bg-label">Date :</label>
        <input type="text" id="from" name="from" value="{$projet->getDate_creation()}">
        <label for="to"> à </label>
        <input type="text" id="to" name="to" value="{$projet->getDate_fin()}">
    </div>
     <div class="input-group input-group-lg">
        <label class="bg-label">Description :</label>
	<textarea rows="4" id="mytextareaAccueil" name="description">value="{$projet->getDescription()}"</textarea>
     </div>
     <div class="input-group input-group-lg">
	<label class="bg-label">Contenu :</label>
	<textarea id="mytextareaAccueil" name="contenu">value="{$projet->getContenu()}"</textarea>
      </div>
    <br>
    <a href="projets" class="btn btn-large btn-info"><i class="glyphicon glyphicon-arrow-left"></i> &nbsp; Retour</a>&nbsp;&nbsp;
    <a href="#" class="btn btn-large btn-info" id="send"><i class="glyphicon glyphicon-floppy-save"></i> &nbsp; Enregistrer</a>
    <button type="submit" class="hidden">Envoyer</button>
</form>
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
   <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script type="text/javascript">

    $('#send').click(function(){
        $('form').submit();
    });
    
  
    $( "#from" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#to" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
   
</script>