<div style="margin-bottom: 40px;"></div>
</div>  

 <nav class="container bg-footer">
 <div class="">
 <div class="col-lg-4 socials-margin">
 	<a href="https://developers.facebook.com/docs/plugins/" target="_blank" class="btn-socials"><img src="{$ROOT}ressources/images/logo-fb.png" alt="facebook"/></a>
   <a href="https://twitter.com/intent/favorite" target="_blank" class="btn-socials"> <img src="{$ROOT}ressources/images/logo-tw.png" alt="twitter"/></a>
   <a href="http://www.linkedin.com/shareArticle?mini=true&url=www.cafe-touba.com&title=Café Touba Canada&summary=Venez découvrir nos services&source=Cafe-touba" target="_blank" class="btn-socials"> <img src="{$ROOT}ressources/images/logo-in.png" alt="linkedin"/></a>
   	
 </div>
   <div class="row">
    <table width="100%" style="margin-top:50px">
        <tr><td align="left"><a class="color-white padding-20" href='{$ROOT}accueil' title="Réseau des Professionels Mourides">Accueil</a></td><td align="center">  
  </td></tr>
        <tr><td align="left" colspan="2"><a class="color-white padding-20" href="{$ROOT}pourquoi/" title="Pourquoi devenir membre">P D M</a></td></tr>
        <tr><td align="left" colspan="2"><a class="color-white padding-20" href='{$ROOT}statut/projets/' title="Projets">Projets</a></td></tr>
        <tr><td align="left" colspan="2"><a class="color-white padding-20" href="{$ROOT}actualites/" title="Actualités">Actualités</a></td></tr>
        <tr><td align="left" colspan="2"><a class="color-white padding-20" href='{$ROOT}apropos/' title="Réseau des Professionels Mourides">RPM</a></td></tr>
        <tr><td align="left" colspan="2"><a class="color-white padding-20" href='{$ROOT}contact/' title="Contactez nous">Contact</a></td></tr>
        <tr><td align="right" colspan="2" class="padding-20 color-white"> © Copyright 2015 -  
          {$smarty.now|date_format:'%Y'} RPM. Tous droits réservés.</td></tr>
    </table>
   </div>
  </div>
 </nav>
<script>
$(".btn-socials>img").mouseover(function(){
	$(".btn-socials").css("margin-left","0px");
	$(this).parent().next("a").css("margin-left","37px");
});
$(".btn-socials>img").mouseout(function(){
	$(".btn-socials").css("margin-left","0px");
});
</script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="{$ROOT}ressources/js/carousel.js"></script>
    <script src="{$ROOT}ressources/js/bootstrap.min.js"></script>
    <script src="{$ROOT}ressources/js/login_init.js"></script>
{include file=$modal_tpl}
</body>
</html>