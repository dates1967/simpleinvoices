<form name="frmpost" action="index.php?module=customers&view=save&submit={$smarty.get.submit}" method="POST">

<b>{$LANG.customer} :: <a href="index.php?module=customers&view=details&submit={$customer.id}&action=edit">{$LANG.edit}</a>
</b>
<hr></hr>
<div style="margin: 0 50px">
<table style="float:left;border:0px solid red">
	<tr>
		<td class="my_details_screen">{$LANG.customer} {$LANG.id}</td>
		<td>{$customer.customer_short_id}</td>
	</tr>
	<tr>
		<td class="my_details_screen">{$LANG.customer_name}</td>
		<td>{$customer.name}</td>
	</tr>
	<tr>
		<td class="my_details_screen">{$LANG.attention_short}</td>
		<td>{$customer.attention}</td>
	</tr>
	<tr>
		<td class="my_details_screen">{$LANG.enabled}</td>
		<td>{$customer.wording_for_enabled}</td>
	</tr>
	<tr>
		<td class="my_details_screen">{$LANG.phone}</td>
		<td>{$customer.phone}</td>
	</tr>
	<tr>
		<td class="my_details_screen">{$LANG.mobile_phone}</td>
		<td>{$customer.mobile_phone}</td>
	</tr>
	<tr>
		<td class="my_details_screen">{$LANG.fax}</td>
		<td>{$customer.fax}</td>
	</tr>
	<tr>
		<td class="my_details_screen">{$LANG.email}</td>
		<td>{$customer.email}</td>
	</tr>
	<tr>
		<td class="my_details_screen">Website</td>
		<td>{$customer.website}</td>
	</tr>
</table>

<table class="summary">
	<tr>
		<td colspan="2" class="header">{$LANG.summary_of_accounts}</td>
	</tr>
	<tr>
		<td class="my_details_screen">{$LANG.total_invoices}</td>
		<td class="subtotal">{$stuff.total_format}</td>
	</tr>
	<tr>
		<td class="my_details_screen">{$LANG.total_paid}</td>
		<td class="subtotal">{$stuff.paid_format}</td>
	</tr>
	<tr>
		<td class="my_details_screen">{$LANG.total_owing}</td>
		<td class="subtotal total">{$stuff.owing}</td>
	</tr>

</table>
<p class="separator"></p>
<table style="float:left;width:50%">
	<tr>
		<td class="shipping_header">Billing Address</td>
		<td class="tbl_right"></td>
	</tr>
	<tr>
		<td class="my_details_screen">{$LANG.street}</td>
		<td >{$customer.street_address}</td>
	</tr>
	<tr>
		<td class="my_details_screen">{$LANG.street2}</td>
		<td>{$customer.street_address2}</td>
	</tr>
	<tr>
		<td class="my_details_screen">{$LANG.city}</td>
		<td>{$customer.city}</td>
	</tr>
	<tr>
		<td class="my_details_screen">{$LANG.zip}</td>
		<td>{$customer.zip_code}</td>
	</tr>
	<tr>
		<td class="my_details_screen">{$LANG.state}</td>
		<td>{$customer.state}</td>
	</tr>
	<tr>
		<td class="my_details_screen">{$LANG.country}</td>
		<td>{$customer.country}</td>
	</tr>

</table>
<table style="float:right;width:50%">
	<tr>
		<td class="shipping_header">Shipping Address</td>
		<td class="tbl_right"></td>
	</tr>
	<tr>
		<td class="my_details_screen">{$LANG.street}</td>
		<td >{$customer.shipping_address}</td>
	</tr>
	<tr>
		<td class="my_details_screen">{$LANG.street2}</td>
		<td>{$customer.shipping_address2}</td>
	</tr>
	<tr>
		<td class="my_details_screen">{$LANG.city}</td>
		<td>{$customer.shipping_city}</td>
	</tr>
	<tr>
		<td class="my_details_screen">{$LANG.zip}</td>
		<td>{$customer.shipping_zip_code}</td>
	</tr>
	<tr>
		<td class="my_details_screen">{$LANG.state}</td>
		<td>{$customer.shipping_state}</td>
	</tr>
	<tr>
		<td class="my_details_screen">{$LANG.country}</td>
		<td>{$customer.shipping_country}</td>
	</tr>

</table>
<p class="separator"></p>

<div id="container-1">
	<ul class="anchors">
		<li><a href="#section-1">{$LANG.customer} {$LANG.invoice_listings}</a></li>
		<li><a href="#section-2">{$LANG.notes}</a></li>
	</ul>
	<div id="section-1" class="fragment">
		<h4><u>{$LANG.invoice_listings}</u></h4>
		<p >
		<table width="100%" align="center">
			<tr class="sortHeader">

				<th class="sortable">{$LANG.id}</th>
				<th class="sortable">{$LANG.total}</th>
				<th class="sortable">{$LANG.owing}</th>
				<th class="sortable">{$LANG.date_created}</th>

			</tr>

			{foreach from=$invoices item=invoice}

			<tr class="index_table">
				<td class="details_screen">{$invoice.id}</td>
				<td class="details_screen">{$invoice.total}</td>
				<td class="details_screen">{$invoice.owing}</td>
				<td class="details_screen">{$invoice.date}</td>
			</tr>

			{/foreach}
		</table>
		</p>
	</div>
	<div id="section-2" class="fragment">
		<h4><u>{$LANG.customer} {$LANG.notes}</u></h4>
		<p>
			<div id="left">
				{$customer.notes}
			</div>
		</p>
	</div>
</div>
</div>

<hr></hr>
<a href="index.php?module=customers&view=details&submit={$customer.id}&action=edit">{$LANG.edit}</a>

{if $smarty.get.action== 'edit' }

<div id="top"><b>{$LANG.customer_edit}</b></div>
<hr></hr>
<table align="center">
	<tr>
		<td class="details_screen">{$LANG.customer} {$LANG.id}</td>
		<td>{$customer.id}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.customer_name}</td>
		<td><input type="text" name="name" value="{$customer.name}" size="25" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.attention_short} <a href="docs.php?t=help&p=customer_contact" rel="gb_page_center[450, 450]" ><img src="./images/common/help-small.png"></img></a>
		</td>
		<td><input type="text" name="attention" value="{$customer.attention}" size="25" /></td>
	</tr>
		<tr>
		<td class="details_screen">Customer ID</td>
		<td><input type=text name="customer_short_id" value="{$customer.customer_short_id}" size=25></td>
	</tr>
	<!-- Billing Address -->
	<tr>
		<td colspan="1" class="details_screen" style="font-weight:bold;font-size:small;padding-left:20px">
			Billing Address
		</td><td></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.street}</td>
		<td><input type="text" name="street_address" value="{$customer.street_address}" size="25" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.street2} <a href="docs.php?t=help&p=street2" rel="gb_page_center[450, 450]" ><img src="./images/common/help-small.png"></img></a>
		</td>
		<td><input type="text" name="street_address2" value="{$customer.street_address2}" size="25" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.city}</td>
		<td><input type="text" name="city" value="{$customer.city}" size="25" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.zip}</td>
		<td><input type="text" name="zip_code" value="{$customer.zip_code}" size="25" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.state}</td>
		<td><input type="text" name="state" value="{$customer.state}" size="25" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.country}</td>
		<td><input type="text" name="country" value="{$customer.country}" size="25" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.phone}</td>
		<td><input type="text" name="phone" value="{$customer.phone}" size="25" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.mobile_phone}</td>
		<td><input type="text" name="mobile_phone" value="{$customer.mobile_phone}" size="25" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.fax}</td>
		<td><input type="text" name="fax" value="{$customer.fax}" size="25" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.email}</td>
		<td><input type="text" name="email" value="{$customer.email}" size="25" /></td>
	</tr>
	<tr>
		<td class="details_screen">Website</td>
		<td><input type="text" name="website" value="{$customer.website}" size="25" /></td>
	</tr>

<!-- Shipping Address -->
	<tr>
		<td colspan="1" class="details_screen" style="font-weight:bold;font-size:small;padding-left:20px">
			Shipping Address
		</td><td></td>
	</tr>
	<tr>
		<td class="details_screen">Street Address <span class="shipping">(shipping)</span></td>
		<td><input type=text name="shipping_address" value="{$customer.shipping_address}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">Street Address 2 <span class="shipping">(shipping)</span></td>
		<td><input type=text name="shipping_address2" value="{$customer.shipping_address2}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">City <span class="shipping">(shipping)</span></td>
		<td><input type=text name="shipping_city" value="{$customer.shipping_city}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">State <span class="shipping">(shipping)</span></td>
		<td><input type=text name="shipping_state" value="{$customer.shipping_state}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.zip} <span class="shipping">(shipping)</span></td>
		<td><input type=text name="shipping_zip_code" value="{$customer.shipping_zip_code}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.country} <span class="shipping">(shipping)</span></td>
		<td><input type=text name="shipping_country" value="{$customer.shipping_country}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.phone} <span class="shipping">(shipping)</span></td>
		<td><input type=text name="shipping_phone" value="{$customer.shipping_phone}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.fax} <span class="shipping">(shipping)</span></td>
		<td><input type=text name="shipping_fax" value="{$customer.shipping_fax}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.email} <span class="shipping">(shipping)</span></td>
		<td><input type=text name="shipping_email" value="{$customer.shipping_email}" size=25></td>
	</tr>

	<tr>
		<td class="details_screen">{$LANG.notes}</td>
		<td><textarea name="notes" rows="8" cols="50">{$customer.notes}</textarea></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.enabled}</td>
		<td>
			{html_options name=enabled options=$enabled selected=$customer.enabled}
		</td>
	</tr>
</table>


<hr></hr>
<input type="submit" name="cancel" value="{$LANG.cancel}" />
<input type="submit" name="save_customer" value="{$LANG.save_customer}" />
<input type="hidden" name="op" value="edit_customer" />


</form>
{/if}
