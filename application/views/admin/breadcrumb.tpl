<div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    {nocache}
                    <li><i class="fa fa-home"></i><a href="{$ADMINROOT}">{$home}</a></li>
                     {foreach from=$uri item=url}
                     <li><i class=""></i><a href="{$ADMINROOT}{$url}">{$url}</a></li>
                    {/foreach}
                    {/nocache}
                </ol>
            </div>
        </div>