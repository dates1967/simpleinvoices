<form name="frmpost" action="index.php?module=purchases&view=save" method=POST onsubmit="return frmpost_Validator(this)">

<h3>Purchase :: New Invoice</h3>
<hr />

<!-- Header -->

<div class="invoice_standard">
	<table class="invoice_header_left">
		<tr>
			<td class="my_details_screen">Vendor</td>
			{if $vendors == null }
				<td><em>No Vendors</em></td>
			{else}
				<td>
					<select name="select_vendor" id="select_vendor">
					<option value="" selected="selected"></option>
				{foreach from=$vendors item=vendor}
					<option value="{$vendor.id}">{$vendor.name}</option>
				{/foreach}
				</select></td>
			{/if}
		</tr>
		<tr>
			<td class="my_details_screen">Customer</td>
			<td>Genlu LLC</td>
		</tr>

	</table>

{* $default_invoice_number *}

	<table class="invoice_header_right">
		<tr>
			<td class="my_details_screen">Invoice #</td>
			<td>
				<input type="text" id="invoice_number" name="invoice_number" size="13" value="{$number}" />
			</td>
		</tr>
		<tr>
			<td class="details_screen">{$LANG.date_formatted}</td>
			<td><input type="text" class="date-picker" name="select_date" id="date1" value='{$smarty.now|date_format:"%Y-%m-%d"}'></input></td>
		</tr>
	</table>

	<p class="separator"></p>

<!-- Lines -->
<!-- <div class="invoice_standard"> -->

	<table class="invoice_header_center">
		<tr class="black">
			<td class="reference">Reference</td>
			<td class="description">Description</td>
			<td class="qty">Qty</td>
			<td class="unit_price">Cost</td>
			<td class="amount">Amount</td>
		</tr>

	{section name=line start=0 loop=22 step=1}
		<tr id="line_{$smarty.section.line.index}" num="{$smarty.section.line.index}">
			<td>
			{if $products == null }
				<p><em>{$LANG.no_products}</em></p>
			{else}
				<select id="select_products{$smarty.section.line.index}" name="select_products{$smarty.section.line.index}" class="line_reference" num="{$smarty.section.line.index}" tabindex="{$smarty.section.line.index+1}">

					<option value="" selected="selected"></option>
					{foreach from=$products item=product}
						<option value="{$product.id}">{$product.reference}</option>
					{/foreach}
				</select>
			{/if}

			</td>

			<td id="description{$smarty.section.line.index}">Description</td>
			<!-- populated by AJAX -->
			<input type='hidden' name='hidden_description{$smarty.section.line.index}' id='hidden_description{$smarty.section.line.index}' value='Description' />

			<td class="qty">
				<input type=text id="i_quantity{$smarty.section.line.index}" name="i_quantity{$smarty.section.line.index}" num="{$smarty.section.line.index}" size="2" value="0" tabindex="{$smarty.section.line.index+1}" />
			</td>

			<td class="unit_price">
				<input type=text name="i_unit_cost{$smarty.section.line.index}" id="i_unit_cost{$smarty.section.line.index}" size="5" num="{$smarty.section.line.index}" value="0.00" tabindex="{$smarty.section.line.index+1}" />
			</td>

			<td class="amount" id="i_amount{$smarty.section.line.index}">0.00</td>

		</tr>
	{/section}
	</table>

	<p class="separator"></p>

	<!-- Totals -->
	<table class="invoice_totals">
		<tr>
			<td class="total_col1">Subtotal</td>
			<td id="subtotal" class="total_col2">0.00</td>
		</tr>
		<tr>
			<td class="total_col1">Tax</td>
			<td id="tax" class="total_col2">0.00</td>
		</tr>
		<tr>
			<td class="total_col1">Freight</td>
			<td class="total_col2">
				<input type="text" name="freight" id="freight" value="0.00" tabindex="{$smarty.section.line.index+1}" />
			</td>
		</tr>
		<tr>
			<td class="total_col1">TOTAL</td>
			<td id="total" class="total_col2">0.00</td>
		</tr>
	</table>
	<!-- Total Qty -->
	<table class="invoice_total_qty">
		<tr class="null">
			<td><br /></td><td></td>
		</tr>
		<tr class="null">
			<td><br /></td><td></td>
		</tr>
		<tr class="null">
			<td><br /></td><td></td>
		</tr>
		<tr>
			<td class="total_col1">Total Items:</td>
			<td id="total_qty" class="total_col2">0</td>
		</tr>
	</table>
<!-- </div> -->

<p class="separator"></p>

<table align=center>

<tr>
        <td colspan=2 class="details_screen">{$LANG.notes}</td>
</tr>

<tr>
        <td colspan=2><textarea input type=text name="invoice_itemised_note" rows=5 cols=70 WRAP=nowrap></textarea></td>
</tr>

<tr><td class="details_screen">{$LANG.tax}</td><td input type=text name="tax" size=15>

{if $taxes == null }
	<p><em>{$LANG.no_taxes}</em></p>
{else}
	<select name="select_tax">
	{foreach from=$taxes item=tax}
		<option {if $tax.tax_id == $defaults.tax} selected {/if} value="{$tax.tax_id}">{$tax.tax_description}</option>
	{/foreach}
	</select>
{/if}

</td>
</tr>

</table>
<!-- </div> -->
<hr />
<div style="text-align:center;">
	<input type=hidden name="max_items" value="{$smarty.section.line.index}">
	<input type=submit name="submit" value="{$LANG.save_invoice}">
	<input type=hidden name="invoice_style" value="insert_invoice_itemised">
</div>
</form>
