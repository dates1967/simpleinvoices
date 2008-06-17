<form name="frmpost"
	action="index.php?module=subject&view=save&id={$smarty.get.id}"
	method="post">


{if $smarty.get.action== 'view' }

	<b>Subject ::
	<a href="index.php?module=subject&view=details&id={$subject.id}&action=edit">{$LANG.edit}</a></b>
	
 	<hr></hr>

	<table align="center">
	<tr>
		<td class="details_screen">Subject ID</td><td>{$subject.id}</td>
	</tr>
	<tr>
		<td class="details_screen">Subject Name</td>
		<td>{$subject.name}</td>
	</tr>
	</table>

<hr></hr>
<a href="index.php?module=subject&view=details&id={$subject.id}&action=edit">{$LANG.edit}</a>
{/if}


{if $smarty.get.action== 'edit' }

	<b>Edit Subject</b>
	<hr></hr>

	<table align="center">
	<tr>
		<td class="details_screen">Subject ID</td><td>{$subject.id}</td>
	</tr>
	<tr>
		<td class="details_screen">Subject Name</td>
		<td><input type="text" name="name" size="50" value="{$subject.name}" /></td>
	</tr>
	</table>
{/if} 
{if $smarty.get.action== 'edit' }
	<hr></hr>
		<input type="submit" name="cancel" value="{$LANG.cancel}" /> 
		<input type="submit" name="save_subject" value="Save Subject" /> 
		<input type="hidden" name="op" value="edit_subject" /> 
	{/if}
</form>
