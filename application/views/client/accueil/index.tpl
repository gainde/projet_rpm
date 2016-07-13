<div class="">
   {* <img src="{$ROOT}ressources/images/banniere.jpg" class="banniere"/>*}
    {include file='../slide.tpl'}
</div>
	<div class="sidebar-globe" style="margin-top: 5px">
		<div id="sidebar-wrapper" class="col-lg-3 col-sm-3 col-md-3 panel panel-default">
			{include file='../sidebar.tpl'}
		</div>
		
                <div class="col-lg-9 col-sm-9 col-md-9">
		<div class="row">
			<div class="col-lg-6 col-sm-6 col-md-6">
				<div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title">Vision</h3>
				  </div>
                                    <div class="panel-body size-pane-accueil">
					<p style="overflow: hidden; height:159px">Chers musulmans, chers talibés,  
Nous vous présentons nos meilleures salutations,et nos remerciements. 
Avant toute chose, rappelons des paroles de Serigne A.Ahad Mbacké sur notre guide Serigne Touba - 
Que Dieu l’agrée. Nous avons que lui comme guide. Toute sa vie, il l’a consacré à Dieu et s’est conformé aux 
prescriptions divines derrière le Prophète Muhammed (PSL). À partir de là, il s’engage à fond dans la voix de Dieu jusqu’à obtenir
toutes les bénédictions du Prophète (PSL) et les largesses du Très-Haut. Alors vous 
devez comprendre que tout ce que nous entreprenons ne peut que nous servir, car il a déjà reçu les faveurs du Bon Dieu. (...).
S’il a prêché en incitant au travail sur le chantier de Dieu, c’est pour montrer que le Seigneur va assister quiconque
s’investit dans ses œuvres. </p>
                                        <p><a href="{$ROOT}apropos" title='A propos de RPM'>Lire la suite ...</a></p>
				  </div>
				</div>
			</div>
                        
                                  <div class="col-lg-6 col-sm-6 col-md-6" id="slider" style="padding-right:15px" ><div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title">Citation</h3>
				  </div>
                                    <div class="panel-body size-pane-accueil">
                                        <div id="sup" style="overflow: hidden; height:201px">
                                            <span id="up" class="glyphicon glyphicon-chevron-up btn"></span>
                                            <div id="inf">
                                                <div>
                                                    <p>Si vous donnez vos biens par la grâce de Dieu, vous verrez toujours quelqu’un prêt à vous rendre la même chose par la grâce de Dieu.</p> 
                                                    <cite>Serigne Touba</cite>
                                                </div>
                                                <div>
                                                    
                                                    <p>Si vous n’êtes pas prêt à offrir vos biens par la grâce de Dieu, vous aurez fait le tour du monde sans rencontrer quelqu’un disposé à le faire pour vous.</p> 
                                                    <cite>Serigne Touba</cite>
                                                </div>
                            
                                                <div>
                                                    <p>La prodigalité du Seigneur envers Serigne Touba peut être comparée à un récipient bien rempli et qui déborde. C’est ce qui déborde du récipient que nous voyons sur terre. Le contenu reste intact  et nous sera révélé dans l’au-delà.</p> 
                                                    <cite>Serigne Abdoul Ahad</cite>
                                                </div>
                                            </div>
                                            <span id="down" class="glyphicon glyphicon-chevron-down btn"></span>
                                        </div>
                                        </div>
                            </div>
                                    </div>
		</div><!--row-->
		<div class="row">
			<blockquote>
			  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
			  <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
			</blockquote>
		</div> <!--row-->
		</div><!--col-->
                
	</div><!--container-->

            <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
             <script src="{$ROOT}ressources/js/slide.show.js"></script>
	<script >
        
        // JavaScript Document


var slidev = new SlideShowVertical('#up','#down','#inf','#sup');
slidev.run();
slidev.setPeriode(30000);
slidev.setInterFab(setInterval(function(){ slidev.slideRun();}, slidev.getPeriode()));
$('#sup').mouseout(function(){
    slidev.setInterFab(setInterval(function(){ slide.slideRun();}, slidev.getPeriode()));
});
var slide = new SlideShow('#up1','#down1','#inf1','#sup1');
slide.setPeriode(10000);
slide.run();

slide.setInterFab(setInterval(function(){ slide.slideRun();}, slide.getPeriode()));
$('#sup1').mouseout(function(){
    slide.setInterFab(setInterval(function(){ slide.slideRun();}, slide.getPeriode()));
});
height_div = $('#sup1').width();

$('#control').css('width',height_div);
$('#sup1').change(function(){
    height_div = $('#sup1').width();

$('#control').css('width',height_div);
});
 $(window).resize(function() {
   if(screen.width == window.innerWidth){
       height_div = $('#sup1').width();

        $('#control').css('width',height_div);
   } else if(screen.width > window.innerWidth){
        height_div = $('#sup1').width();

        $('#control').css('width',height_div);
   } else {
        height_div = $('#sup1').width();

        $('#control').css('width',height_div);
   }
});
      </script>
	


