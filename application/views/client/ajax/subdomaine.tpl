{if $field eq '0'}
<td>
    <label class="bg-label">Domaine de compétence:</label>
</td>
<td>
   <select name="domaine" id="domaines">                    
{foreach from=$domaines item=domaine}  
    <option value="{$domaine->getId()}">{$domaine->getTitre()}</option>   
 {/foreach}
  </select>
 </td>
 {else if $domaines->getTitre() eq 'Divers'}
     <td>
        <label class="bg-label">Entrer un domaine:</label>
    </td>
    <td>
        <input type="text" name="divers" placeholder='Entrer un domaine'/>
    </td>
 {/if}