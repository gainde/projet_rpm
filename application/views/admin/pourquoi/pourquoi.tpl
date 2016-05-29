<script src='{$ROOT}ressources/js/tinymce/tinymce.min.js'></script>
<script src="{$ROOT}ressources/js/tinymce/jquery.tinymce.min.js"></script>
<script type="text/javascript">
  
tinymce.init({
  selector: 'textarea',
  width:800,
  height:500,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
  ],
  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  content_css: [
    '../ressources/css/style.css'
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
{assign var='content' value=""}
{foreach from=$pourquoi item=pour}
    {assign var='content' value=$pour->getContenu()}
{/foreach}
<div class="container">
<form method="post" enctype="multipart/form-data">
<div class="input-group input-group-lg">
	<label class="bg-label">Contenu *:</label>
	<textarea  id="mytextareaPourquoi" name="contenu">{$content}</textarea>
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
        if(tinymce.get('mytextareaPourquoi').getContent()==''){
            alert(" Veuillez remplir tous les champs obligatoires: *")
           return false; 
        }  
        $('form').submit();
    });
        </script>
{/literal}
