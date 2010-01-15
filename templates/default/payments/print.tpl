<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="./templates/invoices/default/style.css" media="all">
<title>{$preference.pref_inv_wording} {$LANG.number_short}: {$invoice.id}</title>
</head>
<body>
<br />
<div id="container">
	<div id="header">
	</div>

<div id="container">
	<div id="header">
	</div>

	<table width="100%" align="center">
		<tr>
			<td colspan="5"><img src="{$logo}" border="0" hspace="0" align="left"></td>
			<th align="right"><span class="font1">Receipt for {$LANG.payment_id} {$payment.id|escape:html}</span></th>
		</tr>
		<tr>
			<td colspan="6" class="tbl1-top">&nbsp;</td>
		</tr>
	</table>
	
    <table class="right">
	<!-- Customer section - start -->
	<tr>
			<td class="tbl1-bottom col1" ><b>{$LANG.customer}:</b></td>
			<td class="tbl1-bottom col1" colspan="3">{$customer.name}</td>
	</tr>

        {if $customer.attention != null }
    <tr>
            <td class=''>{$LANG.attention_short}:</td>
			<td align=left class='' colspan="3" >{$customer.attention}</td>
                </tr>
       {/if}
        {if $customer.street_address != null }
    <tr >
            <td class=''>{$LANG.address}:</td>
			<td class='' align=left colspan="3">{$customer.street_address}</td>
    </tr>   
        {/if}
        {if $customer.street_address2 != null}
                {if $customer.street_address == null}
    <tr>
            <td class=''>{$LANG.address}:</td>
			<td class='' align=left colspan="3">{$customer.street_address2}</td>
    </tr>   
                {/if}
                {if $customer.street_address != null}
    <tr>
			<td class=''></td>
			<td class='' align=left colspan="3">{$customer.street_address2}</td>
    </tr>   
                {/if}
        {/if}
		
		{merge_address field1=$customer.city field2=$customer.state field3=$customer.zip_code street1=$customer.street_address street2=$customer.street_addtess2 class1="" class2="" colspan="3"}

         {if $customer.country != null}
    <tr>
            <td class=''></td>
			<td class='' colspan="3">{$customer.country}</td>
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
	<table class="left">

    <!-- Biller section - start -->
        <tr>
                <td class="tbl1-bottom col1" border=1 cellpadding=2 cellspacing=1><b>{$LANG.biller}:</b></td>
				<td class="col1 tbl1-bottom" border=1 cellpadding=2 cellspacing=1 colspan="3">{$biller.name}</td>
        </tr> 

        {if $biller.street_address != null}
		<tr>
                <td class=''>{$LANG.address}:</td>
				<td class='' align=left colspan="3">{$biller.street_address}</td>
		</tr>
        {/if}
        {if $biller.street_address2 != null }
			{if $biller.street_address == null }
		<tr>
                <td class=''>{$LANG.address}:</td>
				<td class='' align=left colspan="3">{$biller.street_address2}</td>
		</tr>   
			{/if}
			{if $biller.street_address != null }
		<tr>
                <td class=''></td>
				<td class='' align=left colspan="3">{$biller.street_address2}</td>
        </tr>   
			{/if}
        {/if}

		{merge_address field1=$biller.city field2=$biller.state field3=$biller.zip_code street1=$biller.street_address street2=$biller.street_address2 class1="" class2="" colspan="3"}

		{if $biller.country != null }
		<tr>
				<td class=''></td>
				<td class='' colspan="3">{$biller.country}</td>
		</tr>
       	{/if}

	{print_if_not_null label=$LANG.phone_short field=$biller.phone class1='' class2='' colspan="3"}
	{print_if_not_null label=$LANG.fax field=$biller.fax class1='' class2='' colspan="3"}
	{print_if_not_null label=$LANG.mobile_short field=$biller.mobile_phone class1='' class2='' colspan="3"}
	{print_if_not_null label=$LANG.email field=$biller.email class1='' class2='' colspan="3"}
	
	{print_if_not_null label=$customFieldLabels.biller_cf1 field=$biller.custom_field1 class1='' class2='' colspan="3"}
	{print_if_not_null label=$customFieldLabels.biller_cf2 field=$biller.custom_field2 class1='' class2='' colspan="3"}
	{print_if_not_null label=$customFieldLabels.biller_cf3 field=$biller.custom_field3 class1='' class2='' colspan="3"}
	{print_if_not_null label=$customFieldLabels.biller_cf4 field=$biller.custom_field4 class1='' class2='' colspan="3"}

		<tr>
				<td class="" colspan="4"> </td>
		</tr>

	<!-- Biller section - end -->
    </table>


	<table class="left" width="100%">
		<tr>
			<td colspan="6"><br /></td>
		</tr>

					<tr>
				<td class="tbl1-bottom col1"><b>{$LANG.payment_id}</b></td>
				<td class="tbl1-bottom col1" colspan="3"><b>{$preference.pref_description} {$LANG.id}</b></td>
				<td class="tbl1-bottom col1" align="right"><b>{$LANG.amount}</b></td>
				<td class="tbl1-bottom col1" align="right"><b>{$LANG.date_upper}</b></td>
				<td class="tbl1-bottom col1" align="right"><b>{$LANG.payment_type}</b></td>
			</tr>
			

			<tr class="" >
				<td class="">{$payment.id|escape:html}</td>
				<td class="" colspan="3">{$payment.ac_inv_id|escape:html}</td>
				<td class="" align="right">{$preference.pref_currency_sign}{$payment.ac_amount|siLocal_number}</td>
				<td class="" align="right">{$payment.date|escape:html}</td>
				<td class="" align="right">{$paymentType.pt_description|escape:html}</td>
			</tr>
		<tr>
			<td colspan="6"><br /></td>
		</tr>
		<tr>
			<td colspan="6"><br /></td>
		</tr>
        {if $payment.ac_notes != ""}
        <tr>
                <td class='tbl1-bottom col1'>{$LANG.notes}:</td><td></td>
        </tr>
        {/if}

</table>
    <table>
        <tr>
                <td colspan="2">{$payment.ac_notes}</td>
        </tr>
</table>