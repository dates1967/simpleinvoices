{if $vendors == null}
	<P><em>There are no vendors to display.</em></p>
{else}


<h3>Manage Vendors :: <a href="index.php?module=vendors&view=add">Add Vendor</a></h3>
<hr />

<table align="center" id="rico_vendor" class="ricoLiveGrid manage">
<colgroup>
<col style='width:10%;' />
<!-- <col style='width:5%;' /> -->
<col style='width:25%;' />
<col style='width:15%;' />
<col style='width:15%;' />
<col style='width:15%;' />
</colgroup>
<thead>
<tr class="sortHeader">
<th class="noFilter sortable">{$LANG.actions}</th>
<!-- <th class="index_table sortable">Vendor ID</th> -->
<th class="index_table sortable">Vendor Name</th>
<th class="index_table sortable">Total</th>
<th class="index_table sortable">Owing</th>
<th class="index_table sortable">Enabled</th>
</tr>
</thead>

{foreach from=$vendors item=vendor}
	<tr class="index_table">
		<td class="index_table">
			<a class="index_table" href="index.php?module=vendors&view=details&submit={$vendor.id}&action=view">view</a> :: <a class="index_table" href="index.php?module=vendors&view=details&submit={$vendor.id}&action=edit">edit</a>
		</td>
<!-- 	<td class="index_table">{$vendor.id}</td> -->
	<td class="index_table">{$vendor.name}</td>
	<td class="index_table">{$vendor.total}</td>
	<td class="index_table">{$vendor.owing}</td>
	<td class="index_table">{$vendor.enabled}</td>
	</tr>
{/foreach}
	</table>
{/if}
