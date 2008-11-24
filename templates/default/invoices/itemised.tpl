{*
/*
* Script: itemised.tpl
* 	 Itemised invoice template
*
* License:
*	 GPL v3 or above
*
* Website:
*	http://www.simpleinvoices.org
*/
*}

<form name="frmpost" action="index.php?module=invoices&view=save" method=POST onsubmit="return frmpost_Validator(this)">

<div id="gmail_loading" class="gmailLoader" style="float:right; display: none;">
        	<img src="images/common/gmail-loader.gif" alt="Loading ..."/> Loading ...
</div>

{include file="$path/header.tpl" }

<tr>
	<td class="details_screen">{$LANG.quantity}</td>
	<td class="details_screen">{$LANG.description}</td>
	<td class="details_screen">{$LANG.unit_price}</td>
</tr>


        {section name=line start=0 loop=$dynamic_line_items step=1}

			<tr>
				<td>
					<input type=text  id="quantity{$smarty.section.line.index}" name="quantity{$smarty.section.line.index}" size="5"></td>
				<td>
				                
			{if $products == null }
				<p><em>{$LANG.no_products}</em></p>
			{else}
				<select 
					name="products{$smarty.section.line.index}"
					onchange="invoice_product_change_price($(this).val(), {$smarty.section.line.index}, jQuery('#quantity{$smarty.section.line.index}').val() );"
				>
					<option value=""></option>
				{foreach from=$products item=product}
					<option {if $product.id == $defaults.product} selected {/if} value="{$product.id}">{$product.description}</option>
				{/foreach}
				</select>
			{/if}
				                				                
                </td>
                <td>
					<input id="unit_price{$smarty.section.line.index}" name="unit_price{$smarty.section.line.index}" size="7" value=""></input>
				</td>	
                </tr>

        {/section}
	{$show_custom_field.1}
	{$show_custom_field.2}
	{$show_custom_field.3}
	{$show_custom_field.4}
	{*
		{showCustomFields categorieId="4" itemId=""}
	*}



<tr>
        <td colspan=3 class="details_screen">{$LANG.notes}</td>
</tr>

<tr>
        <td colspan=3>
        	<textarea input type=text class="editor" name="note" rows=5 cols=70 WRAP=nowrap></textarea>
        	
        	</td>
</tr>

<tr><td class="details_screen">{$LANG.tax}</td>
<td>

{if $taxes == null }
	<p><em>{$LANG.no_taxes}</em></p>
{else}
	<select name="tax_id">
	{foreach from=$taxes item=tax}
		<option {if $tax.tax_id == $defaults.tax} selected {/if} value="{$tax.tax_id}">{$tax.tax_description}</option>
	{/foreach}
	</select>
{/if}

</td>
</tr>

<tr>
<td class="details_screen">{$LANG.inv_pref}</td><td input type=text name="preference_id">

{if $preferences == null }
	<p><em>{$LANG.no_preferences}</em></p>
{else}
	<select name="preference_id">
	{foreach from=$preferences item=preference}
		<option {if $preference.pref_id == $defaults.preference} selected {/if} value="{$preference.pref_id}">{$preference.pref_description}</option>
	{/foreach}
	</select>
{/if}

</td>
</tr>	
<tr>
	<td class=""> 
		<a class="cluetip" href="#"	rel="docs.php?t=help&p=invoice_custom_fields" title="{$LANG.want_more_fields}"><img src="./images/common/help-small.png"></img> {$LANG.want_more_fields}</a>
	</td>
</tr>
<!--Add more line items while in an itemeised invoice - Get style - has problems- wipes the current values of the existing rows - not good
<tr>
<td>
<a href="?get_num_line_items=10">Add 5 more line items<a>
</tr>
-->
</table>
<!-- </div> -->
<table class="buttons" align="center">
    <tr>
        <td>
            <button type="submit" class="positive" name="submit" value="{$LANG.save}">
                <img class="button_img" src="./images/common/tick.png" alt=""/> 
                {$LANG.save}
            </button>
            
			<input type=hidden name="max_items" value="{$smarty.section.line.index}">
        	<input type=hidden name="type" value="2">
        	
            <a href="./index.php?module=invoices&view=manage" class="negative">
                <img src="./images/common/cross.png" alt=""/>
                {$LANG.cancel}
            </a>
    
        </td>
    </tr>
 </table>

</form>
