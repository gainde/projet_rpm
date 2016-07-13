{if $field eq '0'}
<td>
    <label class="bg-label">Domaine de compétences:</label>
</td>
<td>
   <select class='form-control' name="domaine" id="domaines">                    
{foreach from=$domaines item=domaine}  
    <option value="{$domaine->getId()}">{$domaine->getTitre()}</option>   
 {/foreach}
  </select>
 </td>
 {else if $domaines->getTitre() eq 'Divers'}
     <td>
        <label class="bg-label">Domaine de compétences:</label>
    </td>
    <td>
        <input id="domaines" class='form-control' type="text" name="divers" placeholder='Entrer un domaine'/>
    </td>
 {/if}