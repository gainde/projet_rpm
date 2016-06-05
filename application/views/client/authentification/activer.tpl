<div class="">
    <div id="sidebar-wrapper" class="col-lg-3 col-sm-3 col-md-3 panel panel-default">
            {include file='../sidebar.tpl'}
    </div>
    <div class="col-lg-9 col-sm-9 col-md-9">
        <h1 class="page-heading nospace">Activation de compte</h1>
        <br>
        <div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title">Information</h3>
				  </div>
                                    <div class="panel-body" >
        {if $active}
            <p>Votre compte a été activé avec succés. Veuillez vous connecter ! <a href="{$ROOT}authentification/connecter/">se connecter</a></p>
            {else}
                <p>Vous avez déjà activé votre compte ou un problème est survenu ! Veuillez vous connecter ou reprendre la procédure d'activation de compte.</p>
        {/if}
                                    </div>
        </div>
    </div>
</div>
