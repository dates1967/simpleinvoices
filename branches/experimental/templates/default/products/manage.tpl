{if $products == null }
	<P><em>{$LANG.no_products}</em></p>
{else}


<h3>{$LANG.manage_products} :: <a href="index.php?module=products&view=add">{$LANG.add_new_product}</a></h3>

 <hr />

<table align="center" class="ricoLiveGrid" id="rico_product">
<colgroup>
	<col style='width:10%;' />
	<col style='width:10%;' />
	<col style='width:10%;' />
	<col style='width:50%;' />
	<col style='width:10%;' />
	<col style='width:10%;' />
</colgroup>
<thead>
<tr class="sortHeader">
	<th class="noFilter sortable">{$LANG.actions}</th>
	<th class="index_table sortable">Reference</th>
	<th class="index_table sortable">Type</th>
	<th class="index_table sortable">{$LANG.product_description}</th>
	<th class="index_table sortable">Cost</th>
	<th class="noFilter index_table sortable">{$LANG.enabled}</th>
</tr>
</thead>

{foreach from=$products item=product}
	<tr class="index_table">
		<td class="index_table">
			<a class="index_table" href="index.php?module=products&view=details&submit={$product.id}">{$LANG.view}</a> ::
			<a class="index_table" href="index.php?module=products&view=edit&submit={$product.id}">{$LANG.edit}</a>
		</td>
		<td class="index_table">{$product.reference}</td>
		<td class="index_table">{$product.type}</td>
		<td class="index_table">{$product.description}</td>
		<td class="index_table">{$product.last_unit_cost}</td>
		<td class="index_table">{$product.enabled}</td>
	</tr>

{/foreach}

	</table>
{/if}
