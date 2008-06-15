{if $subjects == null }
	<P><em>{$LANG.no_products}</em></p>
{else}


<h3>Manage Subjects :: <a href="index.php?module=subject&view=add">Add New Subject</a></h3>

 <hr />

<table align="center" class="ricoLiveGrid" id="rico_subject">
<colgroup>
	<col style='width:10%;' />
	<col style='width:10%;' />
	<col style='width:80%;' />
</colgroup>
<thead>
<tr class="sortHeader">
	<th class="noFilter sortable">{$LANG.actions}</th>
	<th class="index_table sortable">ID</th>
	<th class="index_table sortable">Subject name</th>
</tr>
</thead>

{foreach from=$subjects item=subject}
	<tr class="index_table">
	<td class="index_table">
	<a class="index_table"
	 href="index.php?module=subject&view=details&id={$subject.id}&action=view">{$LANG.view}</a> ::
	<a class="index_table"
	 href="index.php?module=subject&view=details&id={$subject.id}&action=edit">{$LANG.edit}</a> </td>
	<td class="index_table">{$subject.id}</td>
	<td class="index_table">{$subject.name}</td>
	</tr>

{/foreach}

	</table>
{/if}
