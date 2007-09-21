<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>{$title}</title>
	<link rel="stylesheet" media="all" type="text/css" href="{$css}" />
</head>
<body>
{section name=page start=0 loop=$pages step=1}
<!-- break control -->
{assign var=page value=$smarty.section.page.index}
{assign var=current_page value=`$page+1`}

<div id="container">
<div id="header">
</div>
	<table width="100%" align="center" class="table_header">
		<tr>
			<td style="vertical-align: top">
				<table>
					<tr><td class="address01"><img src="templates/invoices/logos/logo3.png"></td></tr>
					<tr><td class="address01">Genlu L.L.C</td></tr>
					<tr><td class="address01">Miami - Florida - USA</td></tr>
					<tr><td class="address01">Phone: 786-975-4482</td></tr>
					<tr><td class="address01">genludistributors@gmail.com</td></tr>
				</table>
			</td>
			<td style="vertical-align: top"></td>
			<td style="vertical-align: top">
				<table class="to_right">
					<tr><td colspan="2" class="header01">{$module_wording}</td></tr>
					<tr><td colspan="2" class="header03"># {$invoice.invoice_number}</td></tr>
					{if isset($invoice.vendor_invoice_number)}
					<tr><td colspan="2" class="header03">{$invoice.vendor_invoice_number}</td></tr>
					{/if}
					<tr>
						<td class="address01">Date:</td>
						<td class="address01" style="width:145px">{$invoice.date|date_format}</td></tr>
					<tr>
						<td class="address01">Page:</td>
						<td class="address01" style="width:125px">{$smarty.section.page.index+1}</td></tr>
				</table>
			</td>
		</tr>
	</table>

<p class="separator"></p>
<br />
<!-- Bill To: -->
{if $module == 'sales'}
	<table class="invoice_header_left">
		<tr>
			<td class="header04" colspan="2">SOLD TO:</td>
		</tr>
		<tr>
			<td class="header05" colspan="2">{$company.name}</td>
		</tr>
		<tr>
			<td class="tbl_left">Address:</td>
			<td class="tbl_right">{$company.street_address}</td>
		</tr>
		{if $company.street_address2 != null }
			<tr>
				<td class="tbl_left"></td>
				<td class="tbl_right">{$company.street_address2}</td>
			</tr>
		{/if}
		{merge_address field1=$company.city field2=$company.state field3=$company.zip_code field4=$company.country street1=$company.street_address street2=$company.street_address2 class1="tbl_left" class2="tbl_right" colspan=1}

{print_if_not_null label=$LANG.phone_short field=$company.phone class1='tbl_left' class2='tbl_right' colspan=1}
{print_if_not_null label=$LANG.fax field=$company.fax class1='tbl_left' class2='tbl_right' colspan=1}
{print_if_not_null label=$LANG.mobile_short field=$company.mobile_short class1='tbl_left' class2='tbl_right' colspan=1}
{print_if_not_null label=$LANG.email field=$company.email class1='tbl_left' class2='tbl_right' colspan=1}
	</table>

<!-- Ship To: -->
	<table class="invoice_header_right">
		<tr>
			<td class="header04" colspan="2">SHIP TO:</td>
		</tr>
		<tr>
			<td class="header05" colspan="2">{$company.name}</td>
		</tr>
		{if $company.shipping_address != null}
		<tr>
			<td class="tbl_left" colspan="2">{$company.shipping_address}</td>
		</tr>
		{/if}
		{if $company.shipping_address2 != null }
		<tr>
			<td class="tbl_left" colspan="2">{$company.shipping_address2}</td>
		</tr>
		{/if}
		{merge_address field1=$company.shipping_city field2=$company.shipping_state field3=$company.shipping_zip_code field4=$company.shipping_country street1=$company.shipping_address street2=$company.shipping_address2 class1="tbl_left" class2="tbl_right" colspan=1}

{print_if_not_null label=$LANG.phone_short field=$company.shipping_phone class1='tbl_left' class2='tbl_right' colspan=1}
{print_if_not_null label=$LANG.fax field=$company.shipping_fax class1='tbl_left' class2='tbl_right' colspan=1}
{print_if_not_null label=$LANG.mobile_short field=$company.mobile_short class1='tbl_left' class2='tbl_right' colspan=1}
{print_if_not_null label=$LANG.email field=$company.shipping_email class1='tbl_left' class2='tbl_right' colspan=1}
	</table>
{elseif $module == 'purchases'}
	<!-- Vendor Name: -->
	<table class="invoice_header_left">
			<tr>
				<td class="header04" colspan="2">Vendor Name:</td>
			</tr>
			<tr>
				<td class="header05" colspan="2">{$company.name}</td>
			</tr>
	</table>
	<!-- Ship To: -->
	<table class="invoice_header_right">
		<tr>
			<td class="header04" colspan="2">SHIP TO:</td>
		</tr>
		<tr>
			<td class="header05" colspan="2">Genlu L.L.C.</td>
		</tr>
		<tr>
			<td class="tbl_left" colspan="2">Miami - Florida - USA</td>
		</tr>
		<tr>
			<td class="tbl_left" colspan="2">Phone: 786-975-4482</td>
		</tr>
	</table>
{/if}
<p class="blank_separator"></p>

<!-- Terms & Shipping Info -->
<table class="invoice_header_center">
<tr style="background-color:#F5F5F5">
	<td class="terms_left">Shipping Method:</td><td class="terms1">{$invoice.shipping_method}</td>
	<td class="terms_right">Terms:</td><td class="terms2">{$invoice.terms}</td>
</tr>
</table>

<p class="separator"></p>
<!-- Invoice Lines -->
	<table class="invoice_header_center">
			<tr class="black">
				<td class="reference">Reference</td>
				<td class="description">Description</td>
				<td class="qty">Qty</td>
				<td class="unit_price">Unit Price</td>
				<td class="amount">Amount</td>
			</tr>
		{section name=invoiceItem start=`$page*$max` loop=`$current_page*$max` step=1}
			{assign var=line value=$smarty.section.invoiceItem.index}
			{if isset($invoice_lines.$line.product)}
			<tr>
				<td class="reference">{$invoice_lines.$line.product.reference}</td>
				<td class="description">{$invoice_lines.$line.product.description}</td>
				<td class="qty">{$invoice_lines.$line.quantity}</td>
				<td class="unit_price">{$invoice_lines.$line.price}</td>
				<td class="amount">{$invoice_lines.$line.amount}</td>
			</tr>
			{else}
			<tr>
				<td class="reference">&nbsp</td>
				<td class="description"></td>
				<td class="qty"></td>
				<td class="unit_price"></td>
				<td class="amount"></td>
			</tr>
			{/if}
		{/section}
	</table>
<!-- end of Invoice Lines -->

<p class="blank_separator"></p>
{if $smarty.section.page.last}
	{assign var=subtotal value=$totals.subtotal}
	{assign var=tax value=$totals.tax}
	{assign var=freight value=$totals.freight}
	{assign var=total value=$totals.total}
	{assign var=total_qty value=$totals.total_qty}
{else}
	{assign var=subtotal value='...'}
	{assign var=tax value='...'}
	{assign var=freight value='...'}
	{assign var=total value='...'}
	{assign var=total_qty value='...'}
{/if}
<table class="invoice_totals">
	<tr>
		<td class="total_col1">Subtotal</td>
		<td class="total_col2">{$subtotal}</td>
	</tr>
	<tr>
		<td class="total_col1">Tax</td>
		<td class="total_col2">{$tax}</td>
	</tr>
	<tr>
		<td class="total_col1">Freight</td>
		<td class="total_col2">{$freight}</td>
	</tr>
	<tr>
		<td class="total_col1">TOTAL</td>
		<td class="total_col2" style="font-weight: bold">{$total}</td>
	</tr>
</table>
<!-- Total Qty -->
<table class="invoice_total_qty">
	<tr class="null">
		<td>&nbsp</td><td></td>
	</tr>
	<tr class="null">
		<td>&nbsp</td><td></td>
	</tr>
	<tr class="null">
		<td>&nbsp</td><td></td>
	</tr>
	<tr>
		<td class="total_qty_col1">Total Items:</td>
		<td class="total_qty_col2">{$total_qty}</td>
	</tr>
</table>

<p class="blank_separator"></p>
<p class="separator"></p>
<br />
	{$invoice.display_note}


<div id="footer"></div>

</div>

<p class="pagebreak"></p>
{/section}
</body>
</html>
