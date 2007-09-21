<form name="frmpost" action="index.php?module=sales&view=save&action=update" method="POST">

<input type="hidden" id="module" value="sales" />
<input type="hidden" id="mode" value="edit" />
<input type="hidden" id="invoice_id" name="invoice_id" value="{$data.invoice.id}" />

<table class="header">
	<tr>
		<td class="module">Module :: Sales</td>
		<td class="view">Edit Invoice</td>
		<td class="action">
			<input style="float:right" type=submit class="submit" name="submit" value="Submit Invoice">
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
				<input type="text" id="select_company" value="{$data.company.name}" />
				<input type="hidden" id="company_id" name="company_id" value="" />
			</td>
		</tr>
	</table>

{* $default_invoice_number *}

	<table class="invoice_header_right">
		<tr>
			<td class="my_details_screen">Invoice #</td>
			<td>
				<input type="text" id="invoice_number" name="invoice_number" size="13" value="{$data.number}" />
			</td>
		</tr>
		<tr>
			<td class="details_screen">{$LANG.date_formatted}</td>
			<td><input type="text" class="date-picker" name="date" id="date1" value='{$data.date|date_format:"%Y-%m-%d"}' /></td>
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
				<input type="text" name="shipping_method" id="shipping_method" value="{$data.invoice.shipping_method}" />
			</td>
			<td class="col1 bold">Invoice Terms:</td>
			<td class="col2">
				<input type="text" id="terms" name="terms" value="{$data.invoice.terms}" />
			</td>
		</tr>
	</table>
	<p class="separator"></p>
</div>

<div class="invoice_standard">
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
{foreach name=Lines from=$data.invoice_lines item=line}
	{assign var=index value=$smarty.foreach.Lines.index}
	<tr id="line{$index}">
		<td class="remove">
			<img src="images/svg/remove2.png" id="remove{$index}" alt="Remove" />
		</td>

		<td class="reference">
			<input type="text" name="ref{$index}" id="ref{$index}" value="{$line.product.reference}" />
			<input type="hidden" name="id{$index}" id="id{$index}" value="{$line.product_id}" />
		</td>
		<td class="description">
			<input type="text" name="desc{$index}" id="desc{$index}" value="{$line.description}" /></td>
		<td class="qty">
			<input type="text" id="qty{$index}" name="qty{$index}" value="{$line.quantity}" /></td>
		<td class="unit_price">
			<input type="text" name="price{$index}" id="price{$index}" value="{$line.price}" /></td>
		<td class="amount" id="amount{$index}">0.00</td>
	</tr>
{/foreach}
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
				<input type="text" name="freight" id="freight" value="{$data.invoice.freight}" />
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
			<textarea name="note" id="note" rows="5" cols="70" WRAP="nowrap" value="{$data.invoice.note}"></textarea>
		</td>
	</tr>
</table>

<table class="taxes">
	<tr>
		<td class="bold bigger padded">Apply Taxes?</td>
		<td>
			<img src="images/svg/check-off.png" name="taxes" id="taxes" />
			<input type="hidden" name="tax_id" id="tax_id" value="{$data.invoice.tax_id}" />
		</td>
	</tr>
</table>
<p class="blank_separator"></p>
</div>
<hr />
<div style="text-align:center;">
	<!--<input type=hidden name="max_items" value="">-->
	<input type=submit class="submit" name="submit" value="Submit Invoice">
</div>
</form>
