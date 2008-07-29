{if $module == null }
	<P><em>There are no progress in the database.  Please add one</em></p>
{else}


<h3>Manage Progress :: <a href="index.php?module=progress&view=add">Add New progres</a></h3>

 <hr />
{if $smarty.get.action == "search"}

Progreess filtered by 
	{if $smarty.get.id != ""}Branch ID = {$smarty.get.id}{/if}
	{if $smarty.get.name != ""}Branch Name like '{$smarty.get.name}'{/if}
 <a href="index.php?module=progress&view=manage">Clear filer</a> :: <a href="index.php?module=progress&view=search">Search again</a>
<br>
<hr />
{/if}

<table align="center" class="ricoLiveGrid" id="rico_product">
<colgroup>
	<col style='width:10%;' />
	<col style='width:10%;' />
	<col style='width:10%;' />
	<col style='width:20%;' />
	<col style='width:20%;' />
	<col style='width:20%;' />
	<col style='width:10%;' />
</colgroup>
<thead>
<tr class="sortHeader">
	<th class="noFilter sortable">{$LANG.actions}</th>
	<th class="index_table sortable">ID</th>
	<th class="index_table sortable">Date</th>
	<th class="index_table sortable">Student</th>
	<th class="index_table sortable">Test</th>
	<th class="index_table sortable">Course</th>
	<th class="index_table sortable">Total</th>
</tr>
</thead>


{foreach from=$module item=module_row}
	<tr class="index_table">
	<td class="index_table">
	<a class="index_table"
	 href="index.php?module=progress&view=details&id={$module_row.pgid}&action=view">{$LANG.view}</a> ::
	<a class="index_table"
	 href="index.php?module=progress&view=details&id={$module_row.pgid}&action=edit">{$LANG.edit}</a> </td>
	<td class="index_table">{$module_row.pgid}</td>
	<td class="index_table">{$module_row.date}</td>
	<td class="index_table">{$module_row.last_name}, {$module_row.first_name} {$module_row.middle_name} </td>
	<td class="index_table">{$module_row.test}</td>
	<td class="index_table">{$module_row.course}</td>
	<td class="index_table">{$module_row.total}</td>
	</tr>

{/foreach}

	</table>
{/if}
