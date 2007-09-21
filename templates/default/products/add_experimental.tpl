{* if customer is updated or saved.*}

{if $smarty.post.description != "" && $smarty.post.submit != null }
{$refresh_total}

<br />
<br />
{$display_block}
<br />
<br />

{else}
{* if  name was inserted *}
	{if $smarty.post.submit !=null}
		<div class="validation_alert"><img src="./images/common/important.png"</img>
		You must enter a description for the product</div>
		<hr />
	{/if}
<form name="frmpost" id="form" class="cmxform" ACTION="index.php?module=products&view=save" METHOD="POST">

<div id="top"><h3>{$LANG.product_to_add}</h3></div>
 <hr />



<ul>
	<legend>{$LANG.product_to_add}</legend>
 	<li>
		<label for="reference">Reference</label>
		<input type="text" name="reference" id="reference" />
	</li>
	<li>
		<label for="type">Type</label>
		<input type="text" name="type" id="type" />
	</li>
	<li>
		<label for="last_unit_cost">Unit Cost</label>
		<input type="text" name="last_unit_cost" id="last_unit_cost" />
	</li>
	<li>
		<label for="us_retail">US Retail Price</label>
		<input type="text" name="us_retail" id="us_retail" />
	</li>
	<li>
		<label for="price_level_A">Price Level A</label>
		<input type="text" name="price_level_A" id="price_level_A" />
	</li>
	<li>
		<label for="price_level_B">Price Level B</label>
		<input type="text" name="price_level_B" id="price_level_B" />
	</li>
	<li>
		<label for="price_level_C">Price Level C</label>
		<input type="text" name="price_level_C" id="price_level_C" />
	</li>
	<li>
		<label for="price_level_D">Price Level D</label>
		<input type="text" name="price_level_D" id="price_level_D" />
	</li>
	<li>
		<label for="description">Description</label>
		<textarea name="description" id="description" rows="4" cols="50"></textarea>
	</li>
	<li>
		<label for="notes">Notes</label>
		<textarea name="notes" id="notes" rows="4" cols="50"></textarea>
	</li>
	<li>
		<label for="enabled">Enabled</label>
		<select id="enabled" name="enabled">
			<option value="0" label="Disabled">Disabled</option>
			<option selected="selected" value="1" label="Enabled">Enabled</option>
		</select>
	</li>
	<li>
		<input class="submit" type="reset" id="reset" name="reset" value="Clear">
		<input class="submit" type="submit" id="submit" name="submit" value="Submit"/>
	</li>
	<input type="hidden" name="id" id="id">
</ul>

</form>

{/if}
