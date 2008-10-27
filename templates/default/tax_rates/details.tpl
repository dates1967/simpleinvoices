
<form name="frmpost" action="index.php?module=tax_rates&amp;view=save&amp;id={$smarty.get.id|escape:html}"
 method="post" onsubmit="return frmpost_Validator(this)">


{if $smarty.get.action === 'view' }
        <b>{$LANG.tax_rate} ::
        <a href="index.php?module=tax_rates&amp;view=details&amp;submit={$tax.tax_id|escape:html}&amp;action=edit">{$LANG.edit}</a></b>

	<hr></hr>

	<table align="center">
	<tr>
		<td class="details_screen">{$LANG.tax_rate_id}</td><td>{$tax.tax_id|escape:html}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.description}</td><td>{$tax.tax_description|escape:html}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.tax_percentage}</td><td>{$tax.tax_percentage|escape:html}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.enabled}</td><td>{$tax.enabled|escape:html}</td>
	</tr>
	</table>
	<hr></hr>


<a href='index.php?module=tax_rates&amp;view=details&amp;id={$tax.tax_id|escape:html}&amp;action=edit'>{$LANG.edit}</a>
{/if}

{if $smarty.get.action === 'edit'}



        <b>{$LANG.tax_rate}</b> 

	<hr></hr>

	<table align="center">
	<tr>
		<td class="details_screen">{$LANG.tax_rate_id}</td><td>{$tax.tax_id|escape:html}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.description}</td>
		<td><input type="text" name="tax_description" value="{$tax.tax_description|escape:html}" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.tax_percentage}</td>
		<td><input type="text" name="tax_percentage" value="{$tax.tax_percentage|escape:html}" size="10" />%</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.enabled} </td><td>
		
		<select name="tax_enabled">
<option value="{$tax.tax_enabled|escape:html}" selected style="font-weight: bold">{$tax.enabled|escape:html}</option>
<option value="1">{$LANG.enabled}</option>
<option value="0">{$LANG.disabled}</option>
</select>

</td>
	</tr>
	</table>
	<hr></hr>

<input type="submit" name="cancel" value="{$LANG.cancel}" />
<input type="submit" name="save_tax_rate" value="{$LANG.save_tax_rate}" />
<input type="hidden" name="op" value="edit_tax_rate" />


{/if}


</form>
