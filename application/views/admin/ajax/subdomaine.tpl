{if $active eq '0'}
<td><table><tr><td>
    <label class="bg-label">Domaine de compétences:</label>
</td>
</tr>
<tr><td><label><input type="checkbox" id="checkall" alt="Sélectionner Tout"/> Sélectionner tous</label></td></tr>                    
{foreach from=$domaines item=domaine}  
    <tr><td>
            <label><input class="checkall" type="checkbox" name="domaines[]" value="{$domaine->getId()}">{$domaine->getTitre()}</label>
        </td></tr>
 {/foreach}
  
</table>
</td>
{literal}
<script type="text/javascript">
    $('#checkall').click(function(e){
        if($(this).is(':checked')){
            $('.checkall').each(function(e){
             
                $(this).attr('checked', true);
                });
         }else{
             $('.checkall').each(function(e){
             
                $(this).attr('checked', false);
                });
         }
        
    });
    </script>
    {/literal}
    {else if $active eq '1'}
        <td><table width='100%'><tr><td width='50%'>{$serviceName}</td><td>
                        {foreach $domainesName as $value}
                            {$value}<br/>
                         {/foreach}
                    </td>
                </tr>
            </table>
        </td>
        {/if}