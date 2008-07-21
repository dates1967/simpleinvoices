{if $module == null }
	<P><em>There are no branches in the database.  Please add one</em></p>
{else}


<h3>Manage Branches :: <a href="index.php?module=branch&view=add">Add New Branch</a></h3>

 <hr />
{if $smarty.get.action == "search"}

Branches filtered by 
	{if $smarty.get.id != ""}Branch ID = {$smarty.get.id}{/if}
	{if $smarty.get.name != ""}Branch Name like '{$smarty.get.name}'{/if}
 <a href="index.php?module=branch&view=manage">Clear filer</a> :: <a href="index.php?module=branch&view=search">Search again</a>
<br>
<hr />
{/if}

<table align="center" class="ricoLiveGrid" id="rico_product">
<colgroup>
	<col style='width:20%;' />
	<col style='width:20%;' />
	<col style='width:60%;' />
</colgroup>
<thead>
<tr class="sortHeader">
	<th class="noFilter sortable">{$LANG.actions}</th>
	<th class="index_table sortable">ID</th>
	<th class="index_table sortable">Branch name</th>
</tr>
</thead>


{foreach from=$module item=module_row}
	<tr class="index_table">
	<td class="index_table">
	<a class="index_table"
	 href="index.php?module=branch&view=details&id={$module_row.id}&action=view">{$LANG.view}</a> ::
	<a class="index_table"
	 href="index.php?module=branch&view=details&id={$module_row.id}&action=edit">{$LANG.edit}</a> </td>
	<td class="index_table">{$module_row.id}</td>
	<td class="index_table">{$module_row.name}</td>
	</tr>

{/foreach}

	</table>
{/if}
