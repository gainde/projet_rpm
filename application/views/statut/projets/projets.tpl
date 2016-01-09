
<div class="">
    <div id="sidebar-wrapper" class="col-lg-3 col-sm-3 col-md-3 panel panel-default">
        {include file='../../sidebar.tpl'}
    </div>

    <div class="col-lg-9 col-sm-9 col-md-9">
        <div class="panel">
            <div class="panel-body">

                <!--/stories-->
                {foreach from=$projets item=projet}

                    <div class="row">    
                        <br>
                        <div class="col-md-2 col-sm-3 text-center">
                            <a class="story-img" href="#"><img src="{$projet->getImage()}" style="width:100px;height:100px" class="img-circle"></a>
                        </div>
                        <div class="col-md-10 col-sm-9">
                            <h3>{$projet->getTitre()}</h3>
                            <div class="row">
                                <div class="col-xs-9">
                                    {$projet->getDescription()}
                                    <p class="lead"><button class="btn btn-default">Read More</button></p>
                                    <span class="list-inline">Date création :{$projet->getDate_creation()}</span>
                                </div>
                                <div class="col-xs-3"></div>
                            </div>
                            <br><br>
                        </div>
                    </div>
                    <hr>

                {/foreach}
                <!--/stories-->


                <a href="#" class="btn btn-primary pull-right btnNext">Plus <i class="glyphicon glyphicon-chevron-right"></i></a>

            </div> <!--/panel-body-->
        </div>

    </div>
</div>
<div class="clearfix" style="height:40px"></div>

