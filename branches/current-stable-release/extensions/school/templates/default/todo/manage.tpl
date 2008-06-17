{if $todos == null }
	<P><em>{$LANG.no_products}</em></p>
{else}


<h3>Manage ToDo Items :: <a href="index.php?module=todo&view=add">Add New ToDo Item</a></h3>

 <hr />

<table align="center" class="ricoLiveGrid" id="rico_subject">
<colgroup>
	<col style='width:10%;' />
	<col style='width:10%;' />
	<col style='width:20%;' />
	<col style='width:60%;' />
</colgroup>
<thead>
<tr class="sortHeader">
	<th class="noFilter sortable">{$LANG.actions}</th>
	<th class="index_table sortable">ID</th>
	<th class="index_table sortable">Date</th>
	<th class="index_table sortable">Description</th>
</tr>
</thead>

{foreach from=$todos item=todo}
	<tr class="index_table">
	<td class="index_table">
	<a class="index_table"
	 href="index.php?module=todo&view=details&id={$todo.id}&action=view">{$LANG.view}</a> ::
	<a class="index_table"
	 href="index.php?module=todo&view=details&id={$todo.id}&action=edit">{$LANG.edit}</a> </td>
	<td class="index_table">{$todo.id}</td>
	<td class="index_table">{$todo.date}</td>
	<td class="index_table">{$todo.description}</td>
	</tr>

{/foreach}

	</table>
{/if}
