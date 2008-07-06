{if $enrollments == null }
	<P><em>{$LANG.no_products}</em></p>
{else}


<h3>Manage Enrollments :: <a href="index.php?module=enrollment&view=add">Add New Enrollment</a></h3>

 <hr />
{if $smarty.get.action == "search"}

Teacherss filtered by 
	{if $smarty.get.id != ""}Teacher ID = {$smarty.get.id}{/if}
	{if $smarty.get.first_name != ""}First Name like '{$smarty.get.first_name}'{/if}
	{if $smarty.get.middle_name != ""}Middle Name like '{$smarty.get.middle_name}'{/if}
	{if $smarty.get.last_name != ""}Last Name like '{$smarty.get.last_name}'{/if}
 <a href="index.php?module=teacher&view=manage">Clear filer</a> :: <a href="index.php?module=teacher&view=search">Search again</a>
<br>
<hr />
{/if}


<table align="center" class="ricoLiveGrid" id="rico_teacher">
<colgroup>
	<col style='width:10%;' />
	<col style='width:15%;' />
	<col style='width:5%;' />
	<col style='width:15%;' />
	<col style='width:20%;' />
	<col style='width:10%;' />
	<col style='width:10%;' />
	<col style='width:15%;' />
</colgroup>
<thead>
	<tr class="sortHeader">
		<th class="noFilter sortable">Action</th>
		<th class="index_table sortable">Student</th>
		<th class="index_table sortable">Course ID</th>
		<th class="index_table sortable">Course branch</th>
		<th class="index_table sortable">Course name</th>
		<th class="index_table sortable">Course subject</th>
		<th class="index_table sortable">Course status</th>
		<th class="index_table sortable">Date of first lesson</th>
	</tr>
</thead>

{foreach from=$enrollments item=courses}

	<tr class="index_table">
		<td class="details_screen">
			<a href="index.php?module=enrollment&view=details&action=view&id={$courses.enrollment_id}">View</a> ::
			<a href="index.php?module=enrollment&view=details&action=edit&id={$courses.enrollment_id}">Edit</a>
		</td>
		<td class="details_screen">
			{$courses.last_name}, {$courses.first_name} {$courses.middle_name}
		</td>
		<td class="details_screen">
			<a href="index.php?module=enrollment&view=detail&action=view&id={$courses.id}">{$courses.id}</a>
		</td>
		<td class="details_screen">
			{$courses.branch_name}
		</td>
		<td class="details_screen">
			{$courses.course_name}
		</td>
		<td class="details_screen">
			{$courses.subject_name}
		</td>
		<td class="details_screen">
			{$courses.status}
		</td>
		<td class="details_screen">
			{$courses.start_date}
		</td>
	</tr>
	
	
{/foreach}

	</table>
{/if}
