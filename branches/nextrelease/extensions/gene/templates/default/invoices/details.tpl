{*
/*
* Script: details.tpl
* 	 Invoice details template
*
* Authors:
*	 Justin Kelly, Nicolas Ruflin
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
<b>You are editing {$preference.pref_inv_wording} {$invoice.id}</b>

 <hr></hr>
<div id="gmail_loading" class="gmailLoader" style="float:right; display: none;">
        	<img src="images/common/gmail-loader.gif" alt="Loading ..."/> Loading ...
</div>

<form name="frmpost" action="index.php?module=invoices&view=save" method="post">

	<table align=center>
	<tr>
		<td colspan=6 align=center></td>
	</tr>
        <tr>
		<td class='details_screen'>{$preference.pref_inv_wording} {$LANG.number_short}</td><td><input type=hidden name="invoice_id" value={$invoice.id}  size=15>{$invoice.id}</td>
	</tr>
	<tr>
	        <td class="details_screen">{$LANG.date_formatted}</td>
        	<td><input type="text" class="date-picker" name="date" id="date1" value='{$invoice.calc_date}'></input></td>
	</tr>
	<tr>
		<td class='details_screen'>{$LANG.biller}</td><td>
			
		{if $billers == null }
			<p><em>{$LANG.no_billers}</em></p>
		{else}
			<select name="biller_id">
			{foreach from=$billers item=biller}
				<option {if $biller.id == $invoice.biller_id} selected {/if} value="{$biller.id}">{$biller.name}</option>
			{/foreach}
			</select>
		{/if}
					
		</td>
	</tr>
	<tr>
		<td class='details_screen'>{$LANG.customer}</td><td>
		
			{if $customers == null}
	        <p><em>{$LANG.no_customers}</em></p>
		
			{else}
			
			<select name="customer_id">
			{foreach from=$customers item=customer}
				<option {if $customer.id == $invoice.customer_id} selected {/if} value="{$customer.id}">{$customer.name}</option>
			{/foreach}
			</select>
		
			{/if}
		
		</td>
	</tr>


{if $invoice.type_id == 1 }
	        <tr>
        	        <td colspan=6 class='details_screen'>{$LANG.description}</td>
	        </tr>
	        <tr>
			<td colspan=6 ><textarea input type="text" name="description0" rows=10 cols=70 WRAP=nowrap>{$invoiceItems.0.description}</textarea></td>
        	</tr>

	 {$customFields.1}
	 {$customFields.2}
	 {$customFields.3}
	 {$customFields.4}
{*
	 {showCustomFields categorieId="4" itemId=$smarty.get.invoice}
*}
	
		        <tr>       	         
			<td class='details_screen'>{$LANG.gross_total}</td><td><input type="text" name="unit_price" value="{$invoiceItems.0.unit_price}" size=10 />
			<input type="hidden" name="quantity0" value="1">
			<input type="hidden" name="id0" value="{$invoiceItems.0.id}">
			<input type="hidden" name="products0" value="{$invoiceItems.0.product_id}">
			
			</td>
			
		</tr>
		<tr>

{/if}

{if $invoice.type_id == 2 || $invoice.type_id == 3 }

		{*Pref ID 1 = Invoices ID 5 = PO  *}
		<tr>
		<td colspan=6>
		<table>
		<tr>
        	        <td class='details_screen'>{$LANG.quantity_short}</td><td class='details_screen'>{$LANG.description}</td>
	     {if $invoice.preference_id == 1 }
			<td class='details_screen'> 
				Unit Price		
	        </td>
		{/if}

        {if $invoice.preference_id == 5}
			<td class='details_screen'> 
				Unit Cost		
			</td>
        {/if}
	        </tr>
	
{foreach key=line from=$invoiceItems item=invoiceItem name=line_item_number}
		
		
	        <tr>
			<td><input type="text" id='quantity{$line}' name='quantity{$line}' value='{$invoiceItem.quantity}' size="10">
			<input type="hidden" name='id{$line}' value='{$invoiceItem.id}' size="10"> </td>
			
	                <td>
	                
	                {if $products == null }
	<p><em>{$LANG.no_products}</em></p>
{else}
        {if $invoice.preference_id == 1}
			<select id="country" name="products{$line}" onchange="invoice_product_change_price($(this).val(), {$line}, jQuery('#quantity{$line}').val() );" >
			{foreach from=$products item=product}
				<option {if $product.id == $invoiceItem.product_id} selected {/if} value="{$product.id}">{$product.description}</option>
			{/foreach}
			</select>
		{/if}
        {if $invoice.preference_id == 5}
			<select id="country" name="products{$line}" onchange="invoice_product_change_cost($(this).val(), {$line}, jQuery('#quantity{$line}').val() );" >
			{foreach from=$products item=product}
				<option {if $product.id == $invoiceItem.product_id} selected {/if} value="{$product.id}">{$product.description}</option>
			{/foreach}
			</select>
		{/if}
{/if}

	                
	                
	        </td>
		
        {if $invoice.preference_id == 1}
				<td>
					<input id="unit_price{$line}" name="unit_price{$line}" size="7" value="{$invoiceItem.unit_price}"></input>
				{*
					 -- <input type=text name="unit_cost{$smarty.section.line.index}" size="5"></td>
				*}
				</td>		
		{/if}
        {if $invoice.preference_id == 5}
				<td>
					<input id="unit_cost{$line}" name="unit_cost{$line}" size="7" value="{$invoiceItem.unit_cost}"></input>
				{*
					 -- <input type=text name="unit_cost{$smarty.section.line.index}" size="5"></td>
				*}
				</td>		
		{/if}

	        </tr>
{/foreach}

	<tr>
		<td colspan=3>
			<a href="./index.php?module=invoices&view=add_invoice_item&invoice={$invoice.id}&type={$invoice.type_id}&tax_id={$invoiceItems.0.tax_id}"><img src="./images/common/famfamAdd.png"></img>{$LANG.add_invoice_item}</a>
		</td>
	</tr>

	 {$customFields.1}
	 {$customFields.2}
	 {$customFields.3}
	 {$customFields.4}
{*
	 	 {showCustomFields categorieId="4" itemId=$smarty.get.invoice}
*}
			<tr>
				<td colspan=6 class='details_screen'>{$LANG.note}:</td>
			</tr>
			<tr>
	             <td colspan=6 ><textarea input type=text name="note" rows=10 cols=70 WRAP=nowrap>{$invoice.note}</textarea></td>
			</tr>
			

	{/if}
	
	
	<tr>
		<td class='details_screen'>{$LANG.tax}</td>
		<td>
	                         
	                         	
{if $taxes == null }
	<p><em>{$LANG.no_taxes}</em></p>
{else}
	<select name="tax_id">
	{foreach from=$taxes item=tax}
		<option {if $tax.tax_id == $invoiceItems.0.tax_id} selected {/if} value="{$tax.tax_id}">{$tax.tax_description}</option>
	{/foreach}
	</select>
{/if}


	</td>
	</tr>
	<td class='details_screen'>{$LANG.inv_pref}</td><td>


{if $preferences == null }
	<p><em>{$LANG.no_preferences}</em></p>
{else}
	<select name="preference_id">
	{foreach from=$preferences item=preference}
		<option {if $preference.pref_id == $invoice.preference_id} selected {/if} value="{$preference.pref_id}">{$preference.pref_description}</option>
	{/foreach}
	</select>
{/if}
	                         
	                         </td>
	                </tr>

	


        </table>
	<!-- addition close table tag to close invoice itemised/consulting if it has a note -->
	</table>

<hr></hr>
	<input type="hidden" name="action" value="edit">
	<input type="hidden" name="type" value="{$invoice.type_id}";

	<input type="button" value='Cancel'onCLick='history.back()'>
	<input type="submit" name="submit" value="{$LANG.save}">
	<input type="hidden" name="max_items" value="{$lines}">
</form>
