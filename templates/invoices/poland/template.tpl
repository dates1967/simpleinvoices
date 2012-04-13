<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="{$css|urlsafe}" media="all">
<title>{$preference.pref_inv_wording|htmlsafe} {$LANG.number_short}: {$invoice.index_id|htmlsafe}</title>
</head>
<body>
<div id="container">

<table width="100%" align="center">
<tr>
	<td align="left">
	<table>
	<!-- Biller section - start -->
	<tr>
	<td colspan="3">{$LANG.biller|htmlsafe} : </td>
	</tr> 	
	<tr>
	<td colspan="3"> <b>{$biller.name|htmlsafe}</b></td>
	</tr> 
	{if $biller.street_address != null }
	<tr>
		<td class='' align=left colspan="3">{$biller.street_address|htmlsafe}</td>
	</tr>
	{/if}
	{if $biller.city != null }
	<tr>
		<td class='' align=left colspan="3">{$biller.zip_code|htmlsafe} {$biller.city|htmlsafe}</td>
	</tr>
	{/if}
	{if $biller.state != null }
	<tr>
		<td class='' align=left colspan="3">{$biller.state|htmlsafe} {$biller.country|htmlsafe}</td>
	</tr>
	{/if}
	{if $biller.phone_short != null }
	<tr>
		<td class='' align=left colspan="3">{$LANG.phone_short|htmlsafe}: {$biller.phone} </td>
	</tr>
	{/if}
	{if $biller.fax != null }
	<tr>
		<td class='' align=left colspan="3">{$LANG.fax|htmlsafe}: {$biller.fax} </td>
	</tr>
	{/if}
	{if $biller.mobile != null }
	<tr>
		<td class='' align=left colspan="3">{$LANG.mobile|htmlsafe}: {$biller.mobile} </td>
	</tr>
	{/if}
	{if $biller.email != null }
	<tr>
		<td class='' align=left colspan="3">{$LANG.email|htmlsafe}: {$biller.email} </td>
	</tr>
	{/if}
	{if $biller.custom_field1 != null }
	<tr>
		<td class='' align=left colspan="3">{$customFieldLabels.biller_cf1}: {$biller.custom_field1} </td>
	</tr>
	{/if}
	{if $biller.custom_field2 != null }
	<tr>
		<td class='' align=left colspan="3">{$customFieldLabels.biller_cf2}: {$biller.custom_field2} </td>
	</tr>
	{/if}
	{if $biller.scustom_field3 != null }
	<tr>
		<td class='' align=left colspan="3">{$customFieldLabels.biller_cf3}: {$biller.custom_field3} </td>
	</tr>
	{/if}
	{if $biller.custom_field4 != null }	
	<tr>
		<td class='' align=left colspan="3">{$customFieldLabels.biller_cf4}: {$biller.custom_field4} </td>
	</tr>
	{/if}
	</table>

	<!-- Biller section - end -->
</td>
<td algin="right">
	<table>
		<tr><td><img src="{$logo|urlsafe}" border="0" hspace="0" align="right"></td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>{$LANG.date}: {$invoice.date}</td></tr>
		<tr><td> {$customFieldLabels.invoice_cf2}: {$invoice.custom_field2} </td></tr>
		<tr><td> Miejscowość: {$biller.city|htmlsafe}</td></tr>
	</table>
</td>
</tr>


</table>


<!- POczatek fakury numer-->
<table width="100%" align="center">
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td></tr>
		<tr>
			<td align="center" ><span class="font1">{$preference.pref_inv_heading|htmlsafe} {$LANG.number_short} :  {$invoice.index_id} </span><td>
		</tr>
		<tr>
			<td align="center" ><span class="font2">{$customFieldLabels.invoice_cf1}  </span></td>
		</tr>		
		<tr>
			<td  class="">&nbsp;</td>
		</tr>
		<tr>
			<td  class="">&nbsp;</td>
		</tr>

</table>

<table class="left">

	<!-- Customer section - start -->
	<tr>
			<td ><b>{$LANG.customer}:</b></td>
			<td  colspan="3">{$customer.name|htmlsafe}</td>
	</tr>

        {if $customer.attention != null }
    <tr>
            <td class=''>{$LANG.attention_short}:</td>
			<td align=left class='' colspan="3" >{$customer.attention|htmlsafe}</td>
                </tr>
       {/if}
        {if $customer.street_address != null }
    <tr >
            <td class=''>{$LANG.address}:</td>
			<td class='' align=left colspan="3">{$customer.street_address|htmlsafe}</td>
    </tr>   
        {/if}
        {if $customer.street_address2 != null}
                {if $customer.street_address == null}
    <tr>
            <td class=''>{$LANG.address}:</td>
			<td class='' align=left colspan="3">{$customer.street_address2|htmlsafe}</td>
    </tr>   
                {/if}
                {if $customer.street_address != null}
    <tr>
			<td class=''></td>
			<td class='' align=left colspan="3">{$customer.street_address2|htmlsafe}</td>
    </tr>   
                {/if}
        {/if}
		
		{merge_address field1=$customer.city field2=$customer.state field3=$customer.zip_code street1=$customer.street_address street2=$customer.street_addtess2 class1="" class2="" colspan="3"}

         {if $customer.country != null}
    <tr>
            <td class=''></td>
			<td class='' colspan="3">{$customer.country|htmlsafe}</td>
    </tr>
        {/if}

	{print_if_not_null label=$LANG.phone_short field=$customer.phone class1='' class2='t' colspan="3"}
	{print_if_not_null label=$LANG.fax field=$customer.fax class1='' class2='' colspan="3"}
	{print_if_not_null label=$LANG.mobile_short field=$customer.mobile_phone class1='' class2='' colspan="3"}
	{print_if_not_null label=$LANG.email field=$customer.email class1='' class2='' colspan="3"}
	
	{print_if_not_null label=$customFieldLabels.customer_cf1 field=$customer.custom_field1 class1='' class2='' colspan="3"}
	{print_if_not_null label=$customFieldLabels.customer_cf2 field=$customer.custom_field2 class1='' class2='' colspan="3"}
	{print_if_not_null label=$customFieldLabels.customer_cf3 field=$customer.custom_field3 class1='' class2='' colspan="3"}
	{print_if_not_null label=$customFieldLabels.customer_cf4 field=$customer.custom_field4 class1='' class2='' colspan="3"}

		<tr>
			<td class="" colspan="4"></td>
		</tr>
	</table>

	<!-- Customer section - end -->
<!--Invoice Items section start-->
<br/>
<br/>
<table class="leftItems" width="100%">


					<tr>
				<th><b>{$LANG.quantity_short}</b></th>
				<th align="left"><b>{$LANG.item}</b></th>
				<th align="right"><b>{$LANG.Unit_Cost}</b></th>
				<th align="right"><b>{$LANG.tax_rate}</b></th>
				<th align="right"><b>{$LANG.tax}</b></th>
				<th align="right"><b>{$LANG.Price}</b></th>
			</tr>
			
				{foreach from=$invoiceItems item=invoiceItem}

			<tr  >
				<td class="">{$invoiceItem.quantity|siLocal_number_trim}</td>
				<td class="" >{$invoiceItem.product.description|htmlsafe}</td>
				<td class="" align="right">{$preference.pref_currency_sign|htmlsafe}{$invoiceItem.unit_price|siLocal_number}</td>
				<td class="" align="right">{$invoiceItem.tax[0]|siLocal_number_clean}%</td>
				<td class="" align="right">{$preference.pref_currency_sign|htmlsafe}{$invoiceItem.tax_amount|siLocal_number}</td>
				<td class="" align="right">{$preference.pref_currency_sign|htmlsafe}{$invoiceItem.gross_total|siLocal_number}</td>
			</tr>
			{if $invoiceItem.description != null}
			<tr class="">
				<td class=""></td>
				<td class="" colspan="5">{$LANG.description}: {$invoiceItem.description|htmlsafe}</td>
			</tr>
			{/if}
			
            <tr class="tbl1-bottom">
                <td class=""></td>
				<td class="" colspan="5">
					<table width="100%">
						<tr>

					{inv_itemised_cf label=$customFieldLabels.product_cf1 field=$invoiceItem.product.custom_field1}
					{do_tr number=1 class="blank-class"}
					{inv_itemised_cf label=$customFieldLabels.product_cf2 field=$invoiceItem.product.custom_field2}
					{do_tr number=2 class="blank-class"}
					{inv_itemised_cf label=$customFieldLabels.product_cf3 field=$invoiceItem.product.custom_field3}
					{do_tr number=3 class="blank-class"}
					{inv_itemised_cf label=$customFieldLabels.product_cf4 field=$invoiceItem.product.custom_field4}
					{do_tr number=4 class="blank-class"}
 
						</tr>
					</table>
                </td>
            </tr>
             	{/foreach}

	<tr class="">
		<td class="" colspan="6" ><br /></td>
	</tr>

<!--     tax section - start -->


     {if $invoice_number_of_taxes > 0}
	<tr>
        <td colspan="2"></td>
		<td colspan="3" align="right">{$LANG.sub_total}&nbsp;</td>
		<td colspan="1" align="right">
		{$preference.pref_currency_sign|htmlsafe}{$invoice.gross|siLocal_number}</td>
    </tr>
    {/if}

<!--Podatek caly	-->
	<tr class=''>
	<td colspan="2"></td>
		<td colspan="3" align="right">{$LANG.tax_total}</td>
		<td colspan="1" align="right"><u>{$preference.pref_currency_sign|htmlsafe}{$invoice.total_tax|siLocal_number}</u></td>
	</tr>
<!--Kwota brutto-->
	<tr class="">
		<td class="" colspan="2"></td>
		<td class="" align="right" colspan="3"><b>{$preference.pref_inv_wording|htmlsafe} {$LANG.amount}</b></td>
		<td  class="" align="right"><span class="double_underline" >{$preference.pref_currency_sign|htmlsafe}{$invoice.total|siLocal_number}</span></td>
	</tr>
	<tr>
		<td colspan="6"><br /><br /></td>
	</tr>
	
    {* tax section - end *}
<!-- invoice details section - end -->

</table>
</table>
<div id="footer">
	<!-- Summary - start -->

	<table class="">
		<tr>
				<td class="tbl1-top" >{$LANG.total}: </td>
				<td class="tbl1-top" align="right" colspan="3">{$preference.pref_currency_sign|htmlsafe}{$invoice.total|siLocal_number}</td>
		</tr>
		<tr>
				<td class="">{$LANG.paid}:</td>
				<td class="" align="right" colspan="3" >{$preference.pref_currency_sign|htmlsafe}{$invoice.paid|siLocal_number}</td>
		</tr>
		<tr>
				<td nowrap class="">{$LANG.owing}:</td>
				<td class="" align="right" colspan="3" >{$preference.pref_currency_sign|htmlsafe}{$invoice.owing|siLocal_number}</td>
		</tr>
		<tr>
				<td class="">{$preference.pref_inv_payment_line1_name|htmlsafe} </td>
				<td class="" align="right" colspan="3">{$preference.pref_inv_payment_line1_value|htmlsafe}</td>
		</tr>
	</table>

	<!-- Summary - end -->

</div>

<br/>
<br/>
<br/>
<br/>
<!--Podpisy-->

<table width="100%" align="center">
	<tr>
		<td width="10%"></td><td align="left">         _____________________  </td><td align="right">  _______________________       </td><td width="10%"></td>
	</tr>
	<tr>
		<td width="10%"></td><td align="left">             podpis odbiorcy  </td><td align="right">podpis i pięczeć wystawcy       </td><td width="10%"></td>
	</tr>
</table>

<br/>
<br/>
<br/>

<table  width="100%" align="center"  style="vertical-align: bottom">
	<tr align="center" >
		<td ><span style="font-size: 6pt" ">Invoice made by SimpleInvoices customized by Cricket Software<span></td>
	</tr>

</table>
</div>
</body>
</html>
