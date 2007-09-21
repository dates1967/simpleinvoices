{if $saved == true }

<br>
	{$LANG.save_customer_success}
<br>
<br>
{else}
<br>
	 {$error}
<br>
<br>
{/if}

{if $smarty.post.cancel == null }
	<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=index.php?module=vendors&view=manage">
{else}
	<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?module=vendors&view=manage">
{/if}
