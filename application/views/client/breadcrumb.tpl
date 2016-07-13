<div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    {nocache}
                    <li><i class="fa fa-home"></i><a href="{$SITEURL}"> Accueil</a></li>
                    {assign var='inc' value=0}
                     {foreach from=$uri item=url}
                        {if $inc == 0}
                     <li><i class=""></i><a href="{$ROOT}{$home}/{$url}">{$url}</a></li>
                     {/if}
                        {assign var='inc' value=1}
                    {/foreach}
                    {/nocache}
                </ol>
            </div>
        </div>
