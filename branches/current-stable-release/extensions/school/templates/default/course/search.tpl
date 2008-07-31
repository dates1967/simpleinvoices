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
	<META HTTP-EQUIV=REFRESH CONTENT=1;URL=index.php?module=course&view=manage&action=search&id={$id}&course_id={$course_id}&branch_id={$branch_id}>
	<br><br>
		Searching courses ...
	<br><br>
{else}
<div id="top"><h3>Search Courses</h3></div>
 <hr />
<form name="add_invoice_item" action="#" method="post">
	<table align="center">
			<tr>
				<td class="details_screen">
					Course ID
				</td>
				<td>
					<input type=text name="id" size="5">
				</td>
			</tr>
			<tr>
				<td class="details_screen">Course</td>
				<td>
					<select name="course_id">
						<option value=""></option>
					{foreach from=$courses item=course}
						<option {if $course.id == "1"} selected {/if} value="{$course.id}">{$course.description}</option>
					{/foreach}
					</select>
				</td>
			</tr>
			<tr>
				<td class="details_screen">Branch</td>
				<td>
					<select name="branch_id">
						<option value=""></option>
					{foreach from=$branches item=branch}
						<option {if $course.id == "1"} selected {/if} value="{$branch.id}">{$branch.name}</option>
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
