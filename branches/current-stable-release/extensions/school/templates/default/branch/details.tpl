<form name="frmpost"
	action="index.php?module=branch&view=save&id={$smarty.get.id}"
	method="post">


{if $smarty.get.action== 'view' }

	<b>Branch ::
	<a href="index.php?module=branch&view=details&id={$branch.id}&action=edit">{$LANG.edit}</a></b>
	
 	<hr></hr>

	<table align="center">
	<tr>
		<td class="details_screen">ID</td><td>{$branch.id}</td>
	</tr>
	<tr>
		<td class="details_screen">Branch name</td>
		<td>{$branch.name}</td>
	</tr>
	</table>

<hr></hr>
<a href="index.php?module=branch&view=details&id={$branch.id}&action=edit">{$LANG.edit}</a>
{/if}


{if $smarty.get.action== 'edit' }

	<b>Edit Branch</b>
	<hr></hr>

	<table align="center">
	<tr>
		<td class="details_screen">ID</td><td>{$branch.id}</td>
	</tr>
	<tr>
		<td class="details_screen">Branch name</td>
		<td><input type="text" name="name" size="50" value="{$branch.name}" /></td>
	</tr>
	</table>
{/if} 
{if $smarty.get.action== 'edit' }
	<hr></hr>
		<input type="submit" name="cancel" value="{$LANG.cancel}" /> 
		<input type="submit" name="save_branch" value="Save branch" /> 
		<input type="hidden" name="op" value="edit_branch" /> 
	{/if}
</form>
