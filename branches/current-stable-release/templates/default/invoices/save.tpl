{*
/*
* Script: save.tpl
* 	Biller save template
*
* Authors:
*	 Justin Kelly, Nicolas Ruflin
*
* Last edited:
* 	 2007-07-18
*
* License:
*	 GPL v2 or above
*/
*}

{if $saved == true }
	<br>
	 {$LANG.save_invoice_success}
	<br>
	<br>
{else}
	<br>
	 {$LANG.save_invoice_failure}
	<br>
	<br>
{/if}

<META HTTP-EQUIV=REFRESH CONTENT=2;URL=index.php?module=invoices&view=quick_view&invoice={$invoice_id}&type={$type}>