{*
/*
* Script: save.tpl
* 	Biller save template
*
* License:
*	 GPL v3
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
	<META HTTP-EQUIV=REFRESH CONTENT=2;URL=index.php?module=user&view=manage>
{else}
	<META HTTP-EQUIV=REFRESH CONTENT=0;URL=index.php?module=user&view=manage>
{/if}
