{*
/*
* Script: manage.tpl
* 	Biller manage template
*
*
* License:
*	 GPL v3 or above
*/
*}
	<table class="buttons" align="center">
    <tr>
        <td>
            <a href="./index.php?module=billers&amp;view=add" class="positive">
                <img src="{$baseUrl}images/famfam/add.png" alt="" />
                {$LANG.add_new_biller}
            </a>

        </td>
    </tr>
 </table>
 
{if $number_of_rows.count == 0}

	<br />
	<br />
	<span class="welcome">{$LANG.no_billers}</span>
	<br />
	<br />
	<br />
	<br />
	
{else}

	<br />
	<table id="manageGrid" style="display:none"></table>
	{include file="$smarty_embed_path/sys/modules/billers/manage.js.php" LANG=$LANG}

{/if}
