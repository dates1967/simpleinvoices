{if $certificate == null }
	<P><em>There are no certificates in the database.  Please add one</em></p>
{else}


<h3>Manage Certificates :: <a href="index.php?module=certificate&view=add">Add New Certificate</a></h3>

 <hr />

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
	<th class="index_table sortable">Certificate name</th>
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
	<td class="index_table">{$cert.name}</td>
	</tr>

{/foreach}

	</table>
{/if}
