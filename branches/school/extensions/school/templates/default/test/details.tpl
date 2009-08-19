<form name="frmpost"
	action="index.php?module=test&view=save&id={$smarty.get.id}"
	method="post">


{if $smarty.get.action== 'view' }

	<b>Test ::
	<a href="index.php?module=test&view=details&id={$test.id}&action=edit">{$LANG.edit}</a></b>
	
 	<hr></hr>

	<table align="center">
	<tr>
		<td class="details_screen">ID</td><td>{$test.id}</td>
	</tr>
	<tr>
		<td class="details_screen">Test name</td>
		<td>{$test.name}</td>
	</tr>
	</table>

<hr></hr>
<a href="index.php?module=test&view=details&id={$test.id}&action=edit">{$LANG.edit}</a>
{/if}


{if $smarty.get.action== 'edit' }

	<b>Edit Test</b>
	<hr></hr>

	<table align="center">
	<tr>
		<td class="details_screen">ID</td><td>{$test.id}</td>
	</tr>
	<tr>
		<td class="details_screen">Test name</td>
		<td><input type="text" name="name" size="50" value="{$test.name}" /></td>
	</tr>
	</table>
{/if} 
{if $smarty.get.action== 'edit' }
	<hr></hr>
		<input type="submit" name="cancel" value="{$LANG.cancel}" /> 
		<input type="submit" name="save_test" value="Save test" /> 
		<input type="hidden" name="op" value="edit_test" /> 
	{/if}
</form>
