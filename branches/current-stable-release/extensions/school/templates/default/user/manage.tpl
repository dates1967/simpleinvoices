{if $users == null }
	<P><em>{$LANG.no_products}</em></p>
{else}


<h3>Manage Users :: <a href="index.php?module=user&view=add">Add New User</a></h3>

 <hr />

<table align="center" class="ricoLiveGrid" id="rico_user">
<colgroup>
	<col style='width:10%;' />
	<col style='width:10%;' />
	<col style='width:30%;' />
	<col style='width:30%;' />
	<col style='width:20%;' />
</colgroup>
<thead>
<tr class="sortHeader">
	<th class="noFilter sortable">{$LANG.actions}</th>
	<th class="index_table sortable">User ID</th>
	<th class="index_table sortable">User Name</th>
	<th class="index_table sortable">Name</th>
	<th class="index_table sortable">User Type</th>
</tr>
</thead>

{foreach from=$users item=user}
	<tr class="index_table">
	<td class="index_table">
	<a class="index_table"
	 href="index.php?module=user&view=details&id={$user.id}&action=view">{$LANG.view}</a> ::
	<a class="index_table"
	 href="index.php?module=user&view=details&id={$user.id}&action=edit">{$LANG.edit}</a> </td>
	<td class="index_table">{$user.id}</td>
	<td class="index_table">{$user.username}</td>
	<td class="index_table">{$user.name}, {$user.first_name} {$user.middle_name}</td>
	<td class="index_table">{$user.person_type}</td>
	</tr>

{/foreach}

	</table>
{/if}
