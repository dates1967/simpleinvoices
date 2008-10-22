
<table width="100%" align=center>
	<tr>
		<td>
			{$LANG.invoice_id}: {$payment.ac_inv_id}
		</td>
		<td>
			{$LANG.date_upper}: {$payment.date}
		</td>
	</tr>
</table>
<hr/>

<table width="100%" align=center>
	<tr>
		<td class='details_screen'>{$LANG.biller}: {$payment.biller}</td>
	</tr>
	<tr>
		<td class='details_screen'>{$LANG.customer}: {$payment.customer}, {$payment.customer_first_name}, {$payment.customer_middle_name} </td>
	</tr>

</table>
<table width="100%" align=center>

	<tr>
		<td>{$LANG.item}</td>
		<td>{$LANG.description}</td>
		<td>{$LANG.quantity_short}</td>
		<td>????</td>
		<td>{$LANG.unit_price}</td>
		<td>{$LANG.total_taxes}</td>
		<td>{$LANG.total_uppercase}</td>
	</tr>
	<tr>
		<td>{$payment.ac_inv_id}</td>
		<td>{$invoiceItems.0.product.description}</td>
		<td>{$invoiceItems.0.quantity}</td>
		<td>$$$$</td>
		<td>{$invoiceItems.0.unit_price}</td>
		<td>{$invoiceItems.0.tax_amount}</td>
		<td>{$invoiceItems.0.total}</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>{$LANG.total_uppercase}</td>
		<td>{$invoice.total}</td>
	</tr>
	<tr>
	</tr>

</table>
{$LANG.total_services_rendered}<br>
{$invoice_total_ru}
<hr />
<br><br>

{$LANG.biller} 
.................................................
 &nbsp; &nbsp; &nbsp; &nbsp;
{$LANG.customer} 
.................................................
