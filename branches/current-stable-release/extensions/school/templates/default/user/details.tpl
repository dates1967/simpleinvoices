<form name="frmpost"
	action="index.php?module=user&view=save&id={$smarty.get.id}"
	method="post">


{if $smarty.get.action== 'view' }

	<b>User ::
	<a href="index.php?module=user&view=details&id={$user.id}&action=edit">{$LANG.edit}</a></b>
	
 	<hr></hr>

	<table align="center">
	<tr>
		<td class="details_screen">User ID</td><td>{$user.id}</td>
	</tr>
	<tr>
		<td class="details_screen">User Name</td>
		<td>{$user.username}</td>
	</tr>
	<tr>
		<td class="details_screen">User Name</td>
		<td>{$user.password}</td>
	</tr>
	<tr>
		<td class="details_screen">User Type</td>
		<td>{$user.person_type_description}</td>
	</tr>
	</table>

<hr></hr>
<a href="index.php?module=user&view=details&id={$user.id}&action=edit">{$LANG.edit}</a>
{/if}


{if $smarty.get.action== 'edit' }

	<b>Edit User</b>
	<hr></hr>

	<table align="center">
	<tr>
		<td class="details_screen">User ID</td><td>{$user.id}</td>
	</tr>
	<tr>
		<td class="details_screen">User Name</td>
		<td><input type="text" name="username" size="50" value="{$user.username}" /></td>
	</tr>
	<tr>
		<td class="details_screen">Password</td>
		<td><input type="text" name="password" size="50" value="{$user.password}" /></td>
	</tr>
	<tr>
		<td class="details_screen">User Type</td>
		<td>
			<select name="person_type">
				<option selected value="{$user.person_type}">{$user.person_type_description}</option>
			{foreach from=$person_type key=pid item=ptype}
				<option value="{$pid}">{$ptype}</option>
			{/foreach}
			</select>
		</td>
	</tr>
	</table>
{/if} 
{if $smarty.get.action== 'edit' }
	<hr></hr>
		<input type="submit" name="cancel" value="{$LANG.cancel}" /> 
		<input type="submit" name="save_user" value="Save User" /> 
		<input type="hidden" name="op" value="edit_user" /> 
	{/if}
</form>
