<form name="frmpost" action="index.php?module=vendors&view=save&submit={$smarty.get.submit}" method="post">

{if $smarty.get.action== 'view' }

<a href="index.php?module=vendors&view=manage">back</a>
<b> :: Vendor Details :: </b>
<a href="index.php?module=vendors&view=details&submit={$vendor.id}&action=edit">{$LANG.edit}</a>
<hr></hr>

<div style="margin: 0 50px">
<table style="float:left;border:0px solid red">
	<tr>
		<td class="my_details_screen">Vendor Name</td>
		<td>{$vendor.name}</td>
	</tr>
	<tr>
		<td class="my_details_screen">Contact</td>
		<td>{$vendor.contact}</td>
	</tr>
	<tr>
		<td class="my_details_screen">{$LANG.phone}</td>
		<td>{$vendor.phone}</td>
	</tr>
	<tr>
		<td class="my_details_screen">{$LANG.mobile_phone}</td>
		<td>{$vendor.mobile_phone}</td>
	</tr>
	<tr>
		<td class="my_details_screen">{$LANG.fax}</td>
		<td>{$vendor.fax}</td>
	</tr>
	<tr>
		<td class="my_details_screen">{$LANG.email}</td>
		<td>{$vendor.email}</td>
	</tr>
	<tr>
		<td class="my_details_screen">Website</td>
		<td>{$vendor.website}</td>
	</tr>
	<tr>
		<td class="my_details_screen">{$LANG.enabled}</td>
		<td>{$vendor.wording_for_enabled}</td>
	</tr>
</table>

<table class="summary">
	<tr>
		<td colspan="2" class="header">{$LANG.summary_of_accounts}</td>
	</tr>
	<tr>
		<td class="my_details_screen">Credit</td>
		<td class="subtotal">{$stuff.credit}</td>
	</tr>
	<tr>
		<td class="my_details_screen">Debit</td>
		<td class="subtotal">{$stuff.debit}</td>
	</tr>
	<tr>
		<td class="my_details_screen">Balance</td>
		<td class="subtotal total">{$stuff.balance}</td>
	</tr>

</table>
<p class="separator"></p>
<table style="float:left;width:50%">
	<tr>
		<td class="shipping_header">Address</td>
		<td class="tbl_right"></td>
	</tr>
	<tr>
		<td class="my_details_screen">Street Address</td>
		<td >{$vendor.street_address}</td>
	</tr>
	<tr>
		<td class="my_details_screen">{$LANG.street2}</td>
		<td>{$vendor.street_address2}</td>
	</tr>
	<tr>
		<td class="my_details_screen">{$LANG.city}</td>
		<td>{$vendor.city}</td>
	</tr>
	<tr>
		<td class="my_details_screen">{$LANG.zip}</td>
		<td>{$vendor.zip_code}</td>
	</tr>
	<tr>
		<td class="my_details_screen">{$LANG.state}</td>
		<td>{$vendor.state}</td>
	</tr>
	<tr>
		<td class="my_details_screen">{$LANG.country}</td>
		<td>{$vendor.country}</td>
	</tr>
</table>
<p class="separator"></p>

<div id="container-1">
	<ul class="anchors">
		<li><a href="#section-1">{$LANG.vendor} {$LANG.invoice_listings}</a></li>
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
		<h4><u>{$LANG.vendor} {$LANG.notes}</u></h4>
		<p>
			<div id="left">
				{$vendor.notes}
			</div>
		</p>
	</div>
</div>

</div>
<hr></hr>
<a href="index.php?module=vendors&view=details&submit={$vendor.id}&action=edit">{$LANG.edit}</a>
{/if}


{* EDIT SECTION *}

{if $smarty.get.action== 'edit' }

<div id="top"><b>:: Vendor Details ::</b></div>
<hr></hr>
<table align="center">
	<tr>
		<td class="details_screen">Vendor ID</td>
		<td>{$vendor.id}</td>
	</tr>
	<tr>
		<td class="details_screen">Vendor Name</td>
		<td><input type="text" name="name" value="{$vendor.name}" size="25" /></td>
	</tr>
	<tr>
		<td class="details_screen">Contact</td>
		<td><input type="text" name="attention" value="{$vendor.attention}" size="25" /></td>
	</tr>

	<!-- Billing Address -->
	<tr>
		<td colspan="1" class="details_screen" style="font-weight:bold;font-size:small;padding-left:20px">
			Address
		</td><td></td>
	</tr>
	<tr>
		<td class="details_screen">Street Address</td>
		<td><input type="text" name="street_address" value="{$vendor.street_address}" size="25" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.street2}</td>
		<td><input type="text" name="street_address2" value="{$vendor.street_address2}" size="25" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.city}</td>
		<td><input type="text" name="city" value="{$vendor.city}" size="25" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.zip}</td>
		<td><input type="text" name="zip_code" value="{$vendor.zip_code}" size="25" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.state}</td>
		<td><input type="text" name="state" value="{$vendor.state}" size="25" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.country}</td>
		<td><input type="text" name="country" value="{$vendor.country}" size="25" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.phone}</td>
		<td><input type="text" name="phone" value="{$vendor.phone}" size="25" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.mobile_phone}</td>
		<td><input type="text" name="mobile_phone" value="{$vendor.mobile_phone}" size="25" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.fax}</td>
		<td><input type="text" name="fax" value="{$vendor.fax}" size="25" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.email}</td>
		<td><input type="text" name="email" value="{$vendor.email}" size="25" /></td>
	</tr>
	<tr>
		<td class="details_screen">Website</td>
		<td><input type="text" name="website" value="{$vendor.website}" size="25" /></td>
	</tr>

	<tr>
		<td class="details_screen">{$LANG.notes}</td>
		<td><textarea name="notes" rows="8" cols="50">{$vendor.notes}</textarea></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.enabled}</td>
		<td>
			{html_options name=enabled options=$enabled selected=$vendor.enabled}
		</td>
	</tr>
</table>


<hr></hr>
<input type="submit" name="cancel" value="{$LANG.cancel}" />
<input type="submit" name="save_vendor" value="Save" />
<input type="hidden" name="op" value="edit_vendor" />


</form>
{/if}
