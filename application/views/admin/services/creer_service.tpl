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
  toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
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
<div class="container">
<form method="post" enctype="multipart/form-data">
    <div class="input-group input-group-lg">
        <label class="bg-label">Nom *:</label>
	<input class='required form-control' type="text" name="name"  placeholder="Nom du service">
    </div>
     <div class="input-group input-group-lg">
        <label class="bg-label">Description *:</label>
	<textarea  rows="4" id="mytextareaAccueil1" name="description"></textarea>
     </div>
    <div id='domaine'>
       
    </div>
    <br/>
    <br/>
        <a class="btn btn-large btn-success" href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">Ajouter Domaine</a>
         <div id="light" class="white_content">
             <div class="pull-right">
                 <a id="closeOverlay" href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"><span class="glyphicon glyphicon-remove"></span></a>
            </div>
              <div class="input-group input-group-lg">
                <label class="bg-label">Domaine :</label>
                <input id="nameD" type="text" name="domaineD" class="form-control" placeholder="domaine">
             </div>
             <div class="input-group input-group-lg">
                <label class="bg-label">Description *:</label>
                <textarea  rows="4" id="domaine1" name="desc"></textarea>
             </div>
             <br/>
                <button  type="button" class="btn btn-large  btn-success" id='add_domaine'>Ajouter Domaine</button>
             <br/>
        </div>
        <div id="fade" class="black_overlay"></div>
   

    <br/>
    <br/>
    <a href="{$ROOT}admin/services" class="btn btn-large btn-info"><i class="glyphicon glyphicon-arrow-left"></i> &nbsp; Retour</a>&nbsp;&nbsp;
    <a href="#" class="btn btn-large btn-info" id="send"><i class="glyphicon glyphicon-floppy-save"></i> &nbsp; Enregistrer</a>
    <button type="submit" class="hidden">Envoyer</button>
</form>
 </div>   
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
{literal}
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
        var body = tinymce.get('mytextareaAccueil1').getBody();
        text = tinymce.trim(body.innerText || body.textContent);

        if(text.length > 250 ){
            alert(" Votre description dépasse les 250 caractères!")
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
    
var id = 0;
function addInput(){
    id++;
    var content = tinymce.get('domaine1').getContent();
    var nameDomaine = $('#nameD').val();
   if(nameDomaine !='' ){
    return '<div id="'+id+'" class="input-group input-group-lg ">'+
            '<label class="bg-label">Nom de domaine : ' +nameDomaine+' </label>'+
            '<input  type="text" name="domaine[]" class="form-control hidden" placeholder="domaine" value="'+nameDomaine+'"/>&nbsp;'+
            '<span title="Supprimer le domaine" class="glyphicon glyphicon-remove remove_domaine alert-danger" id="'+id+'" Onclick="removeElement('+this.id+')" style="cursor:pointer"></span>'+
            '<div class="input-group input-group-lg">'+
                '<label class="bg-label hidden">Description *:</label>'+
                '<textarea  rows="4" id="domaine1'+id+'" name="descd[]" class="hidden">'+content+'</textarea>'+
             '</div>'+
            '</div>';
   }
}
$('#add_domaine').click(function(e){
    e.preventDefault();
    var $INPUT = addInput();
    $('div#domaine').append($INPUT);
    tinymce.get('domaine1').setContent('');
    $('#nameD').val('');
    $('#closeOverlay').click();
});
function removeElement(id){
    $('#domaine').find('div#'+id).remove();
}
</script>
{/literal}
 