<b>Product Details ::
<a href="index.php?module=products&view=edit&submit={$product.id}">{$LANG.edit}</a></b>

<hr></hr>

<table align="center">
<tr>
	<td class="details_screen">Reference</td>
	<td>{$product.reference}</td>
</tr>
<tr>
	<td class="details_screen">Item Type</td>
	<td>{$product.type}</td>
</tr>
<tr>
	<td class="details_screen">Last Unit Cost</td>
	<td>{$product.last_unit_cost}</td>
</tr>
<tr>
	<td class="details_screen">Retail Price</td>
	<td>{$product.us_retail}</td>
</tr>
<tr>
	<td class="details_screen">Price Level A</td>
	<td>{$product.price_level_a}</td>
</tr>
<tr>
	<td class="details_screen">Price Level B</td>
	<td>{$product.price_level_b}</td>
</tr>
<tr>
	<td class="details_screen">Price Level C</td>
	<td>{$product.price_level_c}</td>
</tr>
<tr>
	<td class="details_screen">Price Level D</td>
	<td>{$product.price_level_d}</td>
</tr>
<tr>
	<td class="details_screen">{$LANG.product_description}</td>
	<td>{$product.description}</td>
</tr>
<tr>
	<td class="details_screen">{$LANG.notes}</td><td>{$product.notes}</td>
</tr>
<tr>
	<td class="details_screen">{$LANG.product_enabled}</td>
	<td>{$product.enabled}</td>
</tr>
</table>

<hr></hr>
<a href="index.php?module=products&view=edit&submit={$product.id}">{$LANG.edit}</a>
