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
	<META HTTP-EQUIV=REFRESH CONTENT=1;URL=index.php?module=course&view=manage&action=search&id={$id}&name={$name}>
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
				<td class="details_screen">
					Course name
				</td>
				<td>
					<input type=text name="name" size="50">
                </td>
			</tr>
</table>
<hr />
<div style="text-align:center;">
	<input type="submit" name="submit" value="Search">
</div>
</form>
{/if}
