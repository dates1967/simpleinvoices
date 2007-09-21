<form name="frmpost" ACTION="index.php?module=customers&view=save" METHOD="POST">
<hr />
{if $edit}
	<div id="top"><h3>Edit Customer</h3></div>
	<input type="hidden" id="mode" value="edit" />
{else}
	<div id="top"><h3>{$LANG.customer_add}</h3></div>
	<input type="hidden" id="mode" value="add" />
{/if}

<table align=center>
	<tr>
		<td class="details_screen">{$LANG.customer_name}</td>
		<td>
			<input type=text name="name" value="{$customer.name}" size=25>
		</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.customer_contact}</td>
		<td><input type=text name="attention" size=25 value="{$customer.attention}"></td>
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
		<td><input type=text name="street_address" value="{$customer.street_address}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.street2} <a
			href="docs.php?t=help&p=street2"
			rel="gb_page_center[450, 450]"><img
			src="./images/common/help-small.png"></img></a></td>
		<td><input type=text name="street_address2" value="{$customer.street_address2}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.city}</td>
		<td><input type=text name="city" value="{$customer.city}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.state}</td>
		<td><input type=text name="state" value="{$customer.state}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.zip}</td>
		<td><input type=text name="zip_code" value="{$customer.zip_code}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.country}</td>
		<td><input type=text name="country" value="{$customer.country}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.phone}</td>
		<td><input type=text name="phone" value="{$customer.phone}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.mobile_phone}</td>
		<td><input type=text name="mobile_phone" value="{$customer.mobile_phone}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.fax}</td>
		<td><input type=text name="fax" value="{$customer.fax}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.email}</td>
		<td><input type=text name="email" value="{$customer.email}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">Website</td>
		<td><input type=text name="website" value="{$customer.website}" size=25></td>
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
		<td><textarea name='notes' rows=8 cols=50>{$customer.notes}</textarea></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.enabled}</td>
		<td>
			{html_options name=enabled options=$enabled selected=1}
		</td>
	</tr>
</table>
<hr />
<div style="text-align:center;">
	<input type=submit class="submit" name="submit" value="{$LANG.insert_customer}">
	<input type="hidden" name="id" id="id" />
</div>
</form>