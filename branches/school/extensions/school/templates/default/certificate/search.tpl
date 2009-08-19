{*
/*
* Script: add_invoice_item.tpl
* 	 Add new item to an existing invoice 
*
* Authors:
*	 Nicolas Ruflin
*
* Last edited:
* 	 2007-07-18
*
* License:
*	 GPL v2 or above
*
* Website:
*	http://www.simpleinvoices.org
*/
*}
{if $smarty.post.submit != null}
	<META HTTP-EQUIV=REFRESH CONTENT=1;URL=index.php?module=certificate&view=manage&action=search&id={$id}&student_id={$student_id}&course_id={$course_id}>
	<br><br>
		Searching certificates ...
	<br><br>
{else}
<div id="top"><h3>Search Invoices</h3></div>
 <hr />
<form name="add_invoice_item" action="#" method="post">
	<table align="center">
			<tr>
				<td class="details_screen">
					Certificate ID
				</td>
				<td>
					<input type=text name="id" size="5">
				</td>
			</tr>
			<tr>
				<td class="details_screen">Student</td>
				<td>
				<select name="student_id">
					<option value=""></option>
				{foreach from=$student item=student_row}
					<option {if $student_row.id == "1"} selected {/if} value="{$student_row.id}">{$student_row.name}, {$student_row.first_name}</option>
				{/foreach}
				</select>
				</td>
			</tr>
			<tr>
				<td class="details_screen">Course</td>
				<td>
				<select name="course_id">
					<option value=""></option>
				{foreach from=$course item=course_row}
					<option {if $course_row.id == "1"} selected {/if} value="{$course_row.id}">{$course_row.description}</option>
				{/foreach}
				</select>
				</td>
			</tr>
</table>
<hr />
<div style="text-align:center;">
	<input type="submit" name="submit" value="Search">
</div>
</form>
{/if}
