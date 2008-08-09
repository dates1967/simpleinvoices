{if $certificate == null }
	<P><em>There are no certificates in the database.  Please add one</em></p>
{else}


<h3>Manage Certificates :: <a href="index.php?module=certificate&view=add">Add New Certificate</a></h3>

 <hr />
{if $smarty.get.action == "search"}

Certificates filtered by 
	{if $smarty.get.id != ""}Certificate ID = {$smarty.get.id}{/if}
	{if $smarty.get.name != ""}Certificate Name like '{$smarty.get.name}'{/if}
 <a href="index.php?module=certificate&view=manage">Clear filer</a> :: <a href="index.php?module=certificate&view=search">Search again</a>
<br>
<hr />
{/if}

<table align="center" class="ricoLiveGrid" id="rico_product">
<colgroup>
	<col style='width:10%;' />
	<col style='width:10%;' />
	<col style='width:20%;' />
	<col style='width:30%;' />
	<col style='width:10%;' />
	<col style='width:20%;' />
</colgroup>
<thead>
<tr class="sortHeader">
	<th class="noFilter sortable">{$LANG.actions}</th>
	<th class="index_table sortable">ID</th>
	<th class="index_table sortable">Branch</th>
	<th class="index_table sortable">Student</th>
	<th class="index_table sortable">Date</th>
	<th class="index_table sortable">Course</th>
</tr>
</thead>


{foreach from=$certificate item=cert}
	<tr class="index_table">
	<td class="index_table">
	<a class="index_table"
	 href="index.php?module=certificate&view=details&id={$cert.id}&action=view">{$LANG.view}</a> ::
	<a class="index_table"
	 href="index.php?module=certificate&view=details&id={$cert.id}&action=edit">{$LANG.edit}</a> </td>
	<td class="index_table">{$cert.id}</td>
	<td class="index_table">{$cert.branch}</td>
	<td class="index_table">{$cert.student}</td>
	<td class="index_table">{$cert.date}</td>
	<td class="index_table">{$cert.course}</td>
	</tr>

{/foreach}

	</table>
{/if}
