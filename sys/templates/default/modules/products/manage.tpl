{*
/*
* Script: manage.tpl
* 	 Products manage template
*
*
* License:
*	 GPL v3 or above
*
* Website:
*	http://www.simpleinvoices.org
*/
*}
<table class="buttons" align="center">
    <tr>
        <td>
            <a href="./index.php?module=products&view=add" class="positive">
                <img src="{$baseUrl}images/famfam/add.png" alt=""/>
                {$LANG.add_new_product}
            </a>

        </td>
    </tr>
</table>

{if $number_of_rows == 0 }

	<br />
	<br />
	<span class="welcome">{$LANG.no_products}</span>
	<br />
	<br />
	<br />
	<br />

{else}
	<br />
	<table id="manageGrid" style="display:none"></table>
	{include file="$smarty_embed_path/sys/modules/products/manage.js.php"}
	
{/if}
