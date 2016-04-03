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
  ],
  setup : function(ed) {
                  ed.on('keyup', function(e) {
                    if(ed.getContent() == '' || ed.getContent() == null){
                        $('#'+ed.id).parent('div').children(".tmp").remove();
                        $('#'+ed.id).parent('div').append('<span class="tmp glyphicon glyphicon-remove-circle alert-danger"></span>')
                    }else{
                        $('#'+ed.id).parent('div').children(".tmp").remove();
                        $('#'+ed.id).parent('div').append('<span class="tmp glyphicon glyphicon-ok-circle  alert-success"></span>') 
                    }
                  });
            }
});
</script>
<div class="container">
<form method="post" enctype="multipart/form-data">
    <div class="input-group input-group-lg">
        <label class="bg-label">Nom *:</label>
	<input class='required' type="text" name="name" class="form-control" placeholder="Nom du projet">
    </div>
    <div class="input-group input-group-lg pull-right">
        <label for="from" class="bg-label">Date *:</label>
        <input class='required' type="text" id="from" name="from" >
        <label for="to"> à </label>
        <input class='required' type="text" id="to" name="to">
    </div>
    <div class="input-group input-group-lg">
        <label class="bg-label">Image :</label>
        <input name="imgp" type="file" id="upload-file"  placeholder="Image du projet">
        <label class="bg-label">Nom de l'image:</label>
	<input type="text" name="nameimg" class="form-control" placeholder="Nom de l'image">
        <div id="destination" class="size-image"></div>
    </div>
     <div class="input-group input-group-lg">
        <label class="bg-label">Description *:</label>
	<textarea  rows="4" id="mytextareaAccueil1" name="description"></textarea>
     </div>
     <div class="input-group input-group-lg">
	<label class="bg-label">Contenu *:</label>
	<textarea  id="mytextareaAccueil2" name="contenu"></textarea>
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
$('.required').on('change',function(e){
            if($(this).val()){
               $(this).parent('div').children(".tmp").remove();
               $(this).parent('div').append('<span class="tmp glyphicon glyphicon-ok-circle  alert-success"></span>') 
            }else{
                $(this).parent('div').children(".tmp").remove();
                $(this).parent('div').append('<span class="tmp glyphicon glyphicon-remove-circle alert-danger"></span>') 
            }
        });
$('.required').on('keyup',function(e){
            if($(this).val()){
               $(this).parent('div').children(".tmp").remove();
               $(this).parent('div').append('<span class="tmp glyphicon glyphicon-ok-circle  alert-success"></span>') 
            }else{
                $(this).parent('div').children(".tmp").remove();
                $(this).parent('div').append('<span class="tmp glyphicon glyphicon-remove-circle alert-danger"></span>') 
            }
        });
    $('#send').click(function(){
        if(tinymce.get('mytextareaAccueil1').getContent()=='' || tinymce.get('mytextareaAccueil1').getContent()==null){
            alert(" Veuillez remplir tous les champs obligatoires: *")
           return false; 
        }
        if(tinymce.get('mytextareaAccueil2').getContent()=='' || tinymce.get('mytextareaAccueil2').getContent()==null){
            alert(" Veuillez remplir tous les champs obligatoires: *")
            return false; 
        }    
    $('.required').each(function(e){
        if($(this).val()){
              
            }else{
                 alert(" Veuillez remplir tous les champs obligatoires: *")
                return false;
            }
        });
        
        $('form').submit();
    });
    
  //date picker
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