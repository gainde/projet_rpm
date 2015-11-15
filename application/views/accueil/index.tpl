<div class="">
    <img src="{$ROOT}ressources/images/banniere.jpg" class="banniere"/>
</div>
	<div class="sidebar-globe">
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
				  <div class="panel-body">
					 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a vulputate arcu. Fusce egestas finibus urna, eu tristique metus sollicitudin id. Aenean urna urna, lobortis eget neque vel, luctus mattis urna. Nullam luctus laoreet erat, id efficitur orci venenatis a. Cras maximus velit sed bibendum congue. Ut ornare luctus pellentesque. Integer maximus lacinia rutrum.

In lacus purus, pulvinar eget augue et, auctor volutpat massa. Morbi hendrerit rhoncus nisi vel placerat. 
				  </div>
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6" id="slider" >{include file='../slide.tpl'}</div>
		</div><!--row-->
		<div class="row">
			<blockquote>
			  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
			  <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
			</blockquote>
		</div> <!--row-->
		</div><!--col-->
		
	</div><!--container-->
	
	<script class="secret-source">
        jQuery(document).ready(function($) {

          $('#banner-fade').bjqs({
            //height      : 300,
            width       : 500,
            responsive  : true
          });

        });
      </script>
	


