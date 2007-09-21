<form name="invoiceForm" id="invoiceForm" action="index.php?module={$module}&view=save" method=POST>

<input type="hidden" id="module" name="module" value="{$module}" />

<div id="messageBox1">
Errors detected!
</div>

<table class="header">
	<tr>
		<td class="module {$module}">Module :: {$module|capitalize}</td>
		<td class="view">New Invoice</td>
		<td class="action">
			<input style="float:right" type=submit class="submit" name="submit" value="{$LANG.save_invoice}">
		</td>
	</tr>
</table>
<hr style="clear:both" />

<!-- Header -->

<div class="invoice_standard">
	<table class="invoice_header_left">
		<tr>
			<td class="my_details_screen">{$LANG.biller_name}</td>
			<td>Genlu LLC</td>
		</tr>
		<tr>
			<td class="my_details_screen">{$LANG.company_name}</td>
			<td>
				<input type="text" id="select_company" name="select_company" data="required:true" />
				<input type="hidden" id="company_id" name="company_id" value="" />
			</td>
		</tr>
	</table>

{* $default_invoice_number *}

	<table class="invoice_header_right">
		<tr>
			<td class="my_details_screen">Invoice #</td>
			<td>
				<input type="text" id="invoice_number" name="invoice_number" data="required:true" value="{$data.number}" />
			</td>
		</tr>
		{if $module == 'purchases'}
			<tr>
				<td class="my_details_screen">Vendor Invoice #</td>
				<td>
					<input type="text" id="vendor_invoice_number" name="vendor_invoice_number" value="{$data.vendor_number}" />
				</td>
			</tr>
		{/if}
		<tr>
			<td class="details_screen">{$LANG.date_formatted}</td>
			<td><input type="text" class="calendar" data="required:true, date:true" name="date" id="date1" value='{$smarty.now|date_format:"%m/%d/%Y"}' /></td>
		</tr>
	</table>

	<p class="separator"></p>

<!-- Bill To: -->
	<table class="billto">
		<tr>
			<td class="shipping_header" colspan="2">Bill To:</td>
		</tr>
		<tr>
			<td class="col1">{$LANG.company_name}:</td>
			<td id="bill_to_name" class="col2"><br /></td>
		</tr>
		<tr>
			<td class="col1">Address:</td>
			<td id="bill_to_address" class="col2"></td>
		</tr>
		<tr>
			<td class="col1"><br /></td>
			<td id="bill_to_address2" class="col2"></td>
		</tr>
		<tr>
			<td class="col1"><br /></td>
			<td id="bill_to_city" class="col2"></td>
		</tr>
		<tr>
			<td class="col1">Phone:</td>
			<td id="bill_to_phone" class="col2"></td>
		</tr>
		<tr>
			<td class="col1">Fax:</td>
			<td id="bill_to_fax" class="col2"></td>
		</tr>
		<tr>
			<td class="col1">Email:</td>
			<td id="bill_to_email" class="col2"></td>
		</tr>
	</table>

<!-- Ship To: -->
	<table class="shipto">
		<tr>
			<td class="shipping_header" colspan="2">Ship To:</td>
		</tr>
		<tr>
			<td class="col1">Contact Name:</td>
			<td><input type="text" name="shipping_name" id="shipping_name" /></td>
		</tr>
		<tr>
			<td class="col1">Address:</td>
			<td><input type="text" name="shipping_address" id="shipping_address" /></td>
		</tr>
		<tr>
			<td class="col1"><br /></td>
			<td><input type="text" name="shipping_address2" id="shipping_address2" /></td>
		</tr>
		<tr>
			<td class="col1"><br /></td>
			<td><input type="text" name="shipping_compound" id="shipping_compound" /></td>
		</tr>
		<tr>
			<td class="col1">Phone:</td>
			<td><input type="text" name="shipping_phone" id="shipping_phone" /></td>
		</tr>
		<tr>
			<td class="col1">Fax:</td>
			<td><input type="text" name="shipping_fax" id="shipping_fax" /></td>
		</tr>
		<tr>
			<td class="col1">Email:</td>
			<td><input type="text" name="shipping_email" id="shipping_email" /></td>
		</tr>
		<input type="hidden" id="shipping_info" name="shipping_info" value="" />
	</table>

	<p class="separator"></p>
	<table class="terms">
		<tr>
			<td class="col1 bold">Shipping Method:</td>
			<td class="col2">
				<input type="text" name="shipping_method" id="shipping_method" data="required:true" value="" />
			</td>
			<td class="col1 bold">Invoice Terms:</td>
			<td class="col2">
				<input type="text" id="terms" name="terms" value="COD" data="required:true" />
			</td>
		</tr>
	</table>
	<p class="separator"></p>
</div>

<div class="invoice_standard">
<div id="messageBox2"><ul></ul></div>
<p class="blank_separator"></p>
	<!-- Lines -->
	<table class="invoice_header_center" id="rows">
		<tr class="black">
			<td class="remove">&nbsp</td>
			<td class="reference">Reference</td>
			<td class="description">Description</td>
			<td class="qty">Qty</td>
			<td class="unit_price">Unit Price</td>
			<td class="amount">Amount</td>
		</tr>
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

<p class="separator"></p>

<table class="notes">
	<tr>
		<td colspan="2" class="bold bigger padded">{$LANG.notes}</td>
	</tr>
	<tr>
		<td colspan="2" style="padding-left: 5px">
			<textarea input type=text name="note" rows=5 cols=70 WRAP=nowrap></textarea>
		</td>
	</tr>
</table>

<table class="taxes">
	<tr>
		<td class="bold bigger padded">Apply Taxes?</td>
		<td>
			<img src="images/svg/check-off.png" name="taxes" id="taxes" />
			<input type="hidden" name="tax_id" id="tax_id" value="" />
		</td>
	</tr>
</table>
<p class="blank_separator"></p>
</div>
<hr />
<div style="text-align:center;">
	<input type=hidden name="max_items" value="{$smarty.section.line.index}">
	<input type=submit class="submit" name="submit" value="{$LANG.save_invoice}">
	<input type=hidden name="invoice_style" value="insert_invoice_itemised">
</div>
</form>
