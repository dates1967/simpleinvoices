<form name="frmpost"
	action="index.php?module=certificate&view=save&id={$smarty.get.id}"
	method="post">


{if $smarty.get.action== 'view' }

	<b>Certificate ::
	<a href="index.php?module=certificate&view=details&id={$certificate.id}&action=edit">{$LANG.edit}</a></b>
	
 	<hr></hr>

	<table align="center">
	<tr>
		<td class="details_screen">ID</td><td>{$certificate.id}</td>
	</tr>
	<tr>
		<td class="details_screen">Certificate name</td>
		<td>{$certificate.name}</td>
	</tr>
	</table>

<hr></hr>
<a href="index.php?module=certificate&view=details&id={$certificate.id}&action=edit">{$LANG.edit}</a>
{/if}


{if $smarty.get.action== 'edit' }

	<b>{$LANG.certificate_edit}</b>
	<hr></hr>

	<table align="center">
	<tr>
		<td class="details_screen">ID</td><td>{$certificate.id}</td>
	</tr>
	<tr>
		<td class="details_screen">Certificate name</td>
		<td><input type="text" name="name" size="50" value="{$certificate.name}" /></td>
	</tr>
	</table>
{/if} 
{if $smarty.get.action== 'edit' }
	<hr></hr>
		<input type="submit" name="cancel" value="{$LANG.cancel}" /> 
		<input type="submit" name="save_certificate" value="Save Certificate" /> 
		<input type="hidden" name="op" value="edit_certificate" /> 
	{/if}
</form>
