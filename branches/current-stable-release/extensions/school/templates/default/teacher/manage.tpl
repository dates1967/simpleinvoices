{if $teachers == null }
	<P><em>{$LANG.no_products}</em></p>
{else}


<h3>Manage Teachers :: <a href="index.php?module=teacher&view=add">Add New Teacher</a></h3>

 <hr />
{if $smarty.get.action == "search"}

Teacherss filtered by 
	{if $smarty.get.id != ""}Teacher ID = {$smarty.get.id}{/if}
	{if $smarty.get.first_name != ""}First Name like '{$smarty.get.first_name}'{/if}
	{if $smarty.get.middle_name != ""}Middle Name like '{$smarty.get.middle_name}'{/if}
	{if $smarty.get.last_name != ""}Last Name like '{$smarty.get.last_name}'{/if}
	{if $smarty.get.branch_id != ""}Branch ID = '{$smarty.get.branch_id}'{/if}
 <a href="index.php?module=teacher&view=manage">Clear filer</a> :: <a href="index.php?module=teacher&view=search">Search again</a>
<br>
<hr />
{/if}


<table align="center" class="ricoLiveGrid" id="rico_teacher">
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
	<th class="index_table sortable">ID</th>
	<th class="index_table sortable">Teacher name</th>
	<th class="index_table sortable">Branch</th>
	<th class="noFilter index_table sortable">{$LANG.enabled}</th>
</tr>
</thead>

{foreach from=$teachers item=teacher}
	<tr class="index_table">
	<td class="index_table">
	<a class="index_table"
	 href="index.php?module=teacher&view=details&id={$teacher.id}&action=view">{$LANG.view}</a> ::
	<a class="index_table"
	 href="index.php?module=teacher&view=details&id={$teacher.id}&action=edit">{$LANG.edit}</a> </td>
	<td class="index_table">{$teacher.id}</td>
	<td class="index_table">{$teacher.name}, {$teacher.middle_name} {$teacher.first_name}</td>
	<td class="index_table">{$teacher.branch}</td>
	<td class="index_table">{$teacher.enabled}</td>
	</tr>

{/foreach}

	</table>
{/if}
