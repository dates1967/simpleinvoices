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
	 {$LANG.save_product_success}
	<br>
	<br>
{else}
	<br>
	 {$LANG.save_product_failure}
	<br>
	<br>
{/if}

{if $smarty.post.cancel == null }
	<META HTTP-EQUIV=REFRESH CONTENT=2;URL=index.php?module=enrollment&view=manage>
{else}
	<META HTTP-EQUIV=REFRESH CONTENT=0;URL=index.php?module=enrollment&view=manage>
{/if}
