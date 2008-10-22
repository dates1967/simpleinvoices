{if $certificate == null }
	<P><em>There are no certificates in the database.  Please add one</em></p>
{else}


<h3>Manage Certificates 

{if $role_name == "administrator"} :: <a href="index.php?module=certificate&view=add">Add New Certificate</a>{/if}
</h3>

 <hr />
{if $smarty.get.action == "search"}

Certificates filtered by 
	{if $smarty.get.id != ""}Certificate ID like '{$smarty.get.id}'{/if}
	{if $smarty.get.student_id != ""}Student = '{$student_sel.0.name}, {$student_sel.0.first_name}'{/if}
	{if $smarty.get.course_id != ""}Course =  '{$course_sel.0.description}'{/if}
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
	{if $role_name == "administrator"} 
	<a class="index_table"
	 href="index.php?module=certificate&view=print&id={$cert.id}">{$LANG.Print}</a> ::
	{/if}
	<a class="index_table"
	 href="index.php?module=certificate&view=details&id={$cert.id}&action=view">{$LANG.view}</a>
	{if $role_name == "administrator"} 
		:: <a class="index_table"
		 href="index.php?module=certificate&view=details&id={$cert.id}&action=edit">{$LANG.edit}</a>
	{/if}
 </td>
	<td class="index_table">{$cert.id}</td>
	<td class="index_table">{$cert.branch}</td>
	<td class="index_table">{$cert.name}, {$cert.first_name}</td>
	<td class="index_table">{$cert.date}</td>
	<td class="index_table">{$cert.course}</td>
	</tr>

{/foreach}

	</table>
{/if}
