<div class="container">   
     <div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title">Information du projet</h3>
				  </div>
                                    <div class="panel-body" >
    <br>
    <div class="col-md-2 col-sm-3 text-center">
        <a class="story-img" href="#"><img src="{$projet->getUrl()}" style="width:100px;height:100px" class="img-circle"></a>
    </div>
    <div class="col-md-10 col-sm-9">
        <h3>{$projet->getTitre()}</h3>
        <div class="row">
            <div class="col-xs-9">
                {$projet->getContenu()}
                <br/>
                <span class="list-inline">Date création :{$projet->getDate_creation()|date_format:"%Y-%m-%d"}</span>
            </div>
            <div class="col-xs-3"></div>
        </div>
        <br><br>
         <a href="{$ROOT}admin/projets" class="btn btn-large btn-info"><i class="glyphicon glyphicon-arrow-left"></i> &nbsp; Retour</a>&nbsp;&nbsp;
    </div>
                                    </div>
     </div>
</div>