<div class="">
    <div id="sidebar-wrapper" class="col-lg-3 col-sm-3 col-md-3 panel panel-default">
            {include file='../sidebar.tpl'}
    </div>
    <div class="col-lg-9 col-sm-9 col-md-9">
        {include file="../breadcrumb.tpl"}
        <h1 class="page-heading nospace">Profil</h1>
        <br>
         
             <div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title">Information</h3>
				  </div>
                                    <div class="panel-body" >
            <table class="table-register" cellspacing="10" cellcollapse="none" width='100%'>
                <thead><tr><th width="40%"></th><th width="60%"></th></tr></thead>
                <tr>
                    <td><strong>{$User->getPrenom()} {$User->getNom()}</strong><br/>
                        Email : {$User->getEmail()}<br/>
                        Tel : {$User->getTelephone()}<br/>
                    </td>
                    <td>{if $adresse->getNumero()} {$adresse->getNumero()}, {/if}{$adresse->getRue()}<br/>
                        {$adresse->getCode_postale()} {$adresse->getVille()}<br/>
                        {if $adresse->getProvince()}{$adresse->getProvince()} - {/if}{$adresse->getPays()}<br/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
            <a href="{$ROOT}authentification/modifier_profil/{$User->getId()}" class="btn btn-primary pull-right  btnNext" id="send" style="margin: 10px 0;"><i class="glyphicon glyphicon-edit"></i> &nbsp; Modifier</a>
                </td>
                </tr>
            </table>
      
                                    </div>
            </div>
   
      </div>
</div>
