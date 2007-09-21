<form name="frmpost" id="form" ACTION="index.php?module=products&view=save" METHOD="POST">

{if $edit}
	<div id="top"><h3>Edit Product</h3></div>
	<input type="hidden" id="mode" value="edit" />
{else}
	<div id="top"><h3>{$LANG.product_to_add}</h3></div>
	<input type="hidden" id="mode" value="add" />
{/if}

<hr />

<table class="standard">
	<tr>
		<td><label for="reference">Reference</label></td>
		<td><input type="text" name="reference" id="reference" value="{$product.reference}" /></td>
		<td></td>
	</tr>
	<tr>
		<td><label for="type">Type</label></td>
		<td><input type="text" name="type" id="type" /></td>
		<td></td>
	</tr>
	<tr>
		<td><label for="last_unit_cost">Unit Cost</label></td>
		<td><input type="text" name="last_unit_cost" id="last_unit_cost" /></td>
		<td></td>
	</tr>
	<tr>
		<td><label for="us_retail">US Retail Price</label></td>
		<td><input type="text" name="us_retail" id="us_retail" /></td>
		<td></td>
	</tr>
	<tr>
		<td><label for="price_level_A">Price Level A</label></td>
		<td><input type="text" name="price_level_A" id="price_level_A" /></td>
		<td></td>
	</tr>
	<tr>
		<td><label for="price_level_B">Price Level B</label></td>
		<td><input type="text" name="price_level_B" id="price_level_B" /></td>
		<td></td>
	</tr>
	<tr>
		<td><label for="price_level_C">Price Level C</label></td>
		<td><input type="text" name="price_level_C" id="price_level_C" /></td>
		<td></td>
	</tr>
	<tr>
		<td><label for="price_level_D">Price Level D</label></td>
		<td><input type="text" name="price_level_D" id="price_level_D" /></td>
		<td></td>
	</tr>
	<tr>
		<td><label for="description">Description</label></td>
		<td><textarea name="description" id="description" rows="4" cols="50"></textarea></td>
		<td></td>
	</tr>
	<tr>
		<td><label for="notes">Notes</label></td>
		<td><textarea name="notes" id="notes" rows="4" cols="50"></textarea></td>
		<td></td>
	</tr>
	<tr>
		<td><label for="enabled">Enabled</label></td>
		<td>
			<select id="enabled" name="enabled">
				<option value="0" label="Disabled">Disabled</option>
				<option selected="selected" value="1" label="Enabled">Enabled</option>
			</select>
		</td>
		<td></td>
	</tr>
</table>
<!-- </div> -->
<hr />
<div style="text-align:center;">
	<input class="submit" type="reset" id="reset" name="reset" value="Clear" />
	<input class="submit" type="submit" id="submit" name="submit" value="Submit" />
	<input type="hidden" name="id" id="id" />
</div>
</form>