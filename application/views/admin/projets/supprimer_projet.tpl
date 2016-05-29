<div class="container">
<h3> Voulez vous vraiment supprimer ce projet !</h3>
<form method="post">
    <input class="hidden" name="check" type="text" id="checkall" value="{$projet->getId()}">
    <a href="{$ROOT}admin/projets" class="btn btn-large btn-info"><i class="glyphicon glyphicon-arrow-left"></i> &nbsp; Retour</a>&nbsp;&nbsp;
    <a href="#" class="btn btn-large btn-info" id="send"><i class="glyphicon glyphicon-remove"></i> &nbsp; Confirmer</a>
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
   </script>
{/literal}
