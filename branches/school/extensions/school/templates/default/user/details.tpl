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
		<td class="details_screen">Name</td>
		<td>{$user.name}, {$user.first_name} {$user.middle_name}</td>
	</tr>
	<tr>
		<td class="details_screen">User Name</td>
		<td>{$user.username}</td>
	</tr>
	<tr>
		<td class="details_screen">Password</td>
		<td><i>User password is not displayed</i></td>
	</tr>
	<tr>
		<td class="details_screen">User Type</td>
		<td>{$user.person_type_description}</td>
	</tr>
	<tr>
		<td class="details_screen">User Group</td>
		<td>
			{$role_selected.0.name}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Branch</td>
		<td>
			{$branch_selected.0.name}
		</td>
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
		<td class="details_screen">Name</td>
		<td>{$user.name}, {$user.first_name} {$user.middle_name}</td>
	</tr>
	<tr>
		<td class="details_screen">User Name</td>
		<td><input type="text" name="username" size="50" value="{$user.username}" /></td>
	</tr>
	<tr>
		<td class="details_screen">Password</td>
		<td><input type="text" name="password_field" size="50"/></td>
	</tr>
	<tr>
		<td class="details_screen">User Type</td>
		<td>
			<select name="person_type">
			{foreach from=$person_type key=pid item=ptype}
				<option  {if $pid == $user.person_type} selected {/if}  value="{$pid}">{$ptype}</option>
			{/foreach}
			</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">User Group</td>
		<td>
			<select name="user_group">
			{foreach from=$role item=role_row}
				<option {if $role_row.id == $user.user_group} selected {/if} value="{$role_row.id}">{$role_row.name}</option>
			{/foreach}
			</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Branch</td>
		<td>
			<select name="branch_id">
			{foreach from=$branch item=branch_row}
				<option  {if $branch_row.id == $user.branch_id} selected {/if} value="{$branch_row.id}">{$branch_row.name}</option>
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
