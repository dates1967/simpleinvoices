{*
/*
* Script: manage.tpl
* 	 Payments manage template
*
*
* Last edited:
* 	 2008-09-01
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
            <a href="./index.php?module=payments&amp;view=process&amp;op=pay_invoice" class="positive">
                <img src="./images/famfam/add.png" alt=""/>
                {$LANG.process_payment}
            </a>

        </td>
    </tr>
	</table>

{if $payments == null}
	<br />
	<br />
	<span class="welcome">{$LANG.no_payments}</span>
	<br />
	<br />

{else}

 
	{if $smarty.get.id }
	<table class="buttons" align="center">
    <tr>
        <td>
<h3>{$LANG.payments_filtered} {$smarty.get.id|escape:html} &nbsp;</h3>
        </td>
        <td>
            <a href="./index.php?module=payments&amp;view=process&amp;id={$_GET.id}&amp;op=pay_selected_invoice" class="positive">
                <img src="./images/famfam/money.png" alt=""/>
                {$LANG.payments_filtered_invoice}
            </a>

        </td>
    </tr>
	</table>
	{elseif $smarty.get.c_id }
<h3>{$LANG.payments_filtered_customer} '{$customer.name|escape:html}'</h3>
	{else}

	{/if}

	<br />
	<table id="manageGrid" style="display:none"></table>
	{include file='../modules/payments/manage.js.php' get=$smarty.get}

{/if}
<br />
<div style="text-align:center;">
<a class="cluetip" href="#"	rel="docs.php?t=help&amp;p=wheres_the_edit_button" title="{$LANG.wheres_the_edit_button}"><img src="./images/common/help-small.png" alt="" /> Wheres the Edit button?</a>
</div>
