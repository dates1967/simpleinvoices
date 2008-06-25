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
	<META HTTP-EQUIV=REFRESH CONTENT=1;URL=index.php?module=invoices&view=manage&action=search&invoice_id={$invoice_id}&student_id={$student_id}&biller_id={$biller_id}>
	<br><br>
		Searching invoices ...
	<br><br>
{else}
<div id="top"><h3>Search Invoices</h3></div>
 <hr />
<form name="add_invoice_item" action="#" method="post">
	<table align="center">
			<tr>
				<td class="details_screen">
					ID
				</td>
				<td>
					<input type=text name="invoice_id" size="5">
				</td>
			</tr>
			<tr>
				<td class="details_screen">
					Student
				</td>
				<td input type=text name="description">
				                
				{if $students == null }
					<p><em>There are no students in the database</em></p>
				{else}
					<select name="student_id">
						<option value=""></option>
					{foreach from=$students item=student}
						<option value="{$student.id}">{$student.name}, {$student.first_name} {$student.middle_name}</option>
					{/foreach}
					</select>
				{/if}
					                				                
                </td>
			</tr>
			<tr>
				<td class="details_screen">
					Biller
				</td>
				<td>
					<select name="biller_id">
						<option value=""></option>
					{foreach from=$billers item=biller}
						<option value="{$biller.id}">{$biller.name}</option>
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
