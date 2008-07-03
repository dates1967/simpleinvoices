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
	<META HTTP-EQUIV=REFRESH CONTENT=1;URL=index.php?module=teacher&view=manage&action=search&id={$id}&first_name={$first_name}&middle_name={$middle_name}&last_name={$last_name}>
	<br><br>
		Searching teachers ...
	<br><br>
{else}
<div id="top"><h3>Search Teachers</h3></div>
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
					Fisrt Name
				</td>
				<td>
					<input type=text name="first_name" size="50">
				</td>
			</tr>
			<tr>
				<td class="details_screen">
					Middle Name
				</td>
				<td>
					<input type=text name="middle_name" size="50">
				</td>
			</tr>
			<tr>
				<td class="details_screen">
					Last Name
				</td>
				<td>
					<input type=text name="last_name" size="50">
				</td>
			</tr>
</table>
<hr />
<div style="text-align:center;">
	<input type="submit" name="submit" value="Search">
</div>
</form>
{/if}
