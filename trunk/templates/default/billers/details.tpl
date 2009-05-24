{*
* Script: details.tpl
* 	Biller details template
*
* Last edited:
* 	 2008-08-25
*
* License:
*	 GPL v3 or above
*}
<form name="frmpost" action="index.php?module=billers&amp;view=save&amp;id={$smarty.get.id}" method="post" id="frmpost" onSubmit="return checkForm(this);">


{if $smarty.get.action== 'view' }

{*
<b>{$LANG.biller} :: <a	href="index.php?module=billers&amp;view=details&amp;id={$biller.id}&amp;action=edit">{$LANG.edit}</a></b>
*}
<br />
<table align="center">
	<tr>
		<td class="details_screen">{$LANG.biller_name}</td>
		<td>{$biller.name}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.street}</td>
		<td>{$biller.street_address}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.street2}
		<a
			class="cluetip"
			rel="index.php?module=documentation&amp;view=view&amp;page=help_street2"
			href="#"
			title="{$LANG.street2}"
		>
		<img src="./images/common/help-small.png" alt="" />
		</a>
		</td>
		<td>{$biller.street_address2}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.city}</td>
		<td>{$biller.city}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.zip}</td>
		<td>{$biller.zip_code}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.state}</td>
		<td>{$biller.state}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.country}</td>
		<td>{$biller.country}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.mobile_phone}</td>
		<td>{$biller.mobile_phone}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.phone}</td>
		<td>{$biller.phone}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.fax}</td>
		<td>{$biller.fax}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.email}</td>
		<td>{$biller.email}</td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.biller_cf1}
		<a
			class="cluetip"
			rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields"
			href="#"
			title="{$LANG.Custom_Fields}"
		>
		<img src="./images/common/help-small.png" alt="" />
		</a>
		</td>
		<td>{$biller.custom_field1}</td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.biller_cf2} 
		<a
			class="cluetip"
			rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields"
			href="#"
			title="{$LANG.Custom_Fields}"
		>
		<img src="./images/common/help-small.png" alt="" />
		</a>
		</td>
		<td>{$biller.custom_field2}</td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.biller_cf3} 
		<a
			class="cluetip"
			rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields"
			href="#"
			title="{$LANG.Custom_Fields}"
		>
		<img src="./images/common/help-small.png" alt="" />
		</a>
		</td>
		<td>{$biller.custom_field3}</td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.biller_cf4}
		<a
			class="cluetip"
			rel="index.php?module=documentation&amp;view=view&amp;page=help_custom_fields"
			href="#"
			title="{$LANG.Custom_Fields}"
		>
		<img src="./images/common/help-small.png" alt="" />
		</a>
		</td>
		<td>{$biller.custom_field4}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.logo_file} 
		<a
			class="cluetip"
			href="#"
			rel="index.php?module=documentation&amp;view=view&amp;page=help_insert_biller_text"
			title="{$LANG.Logo_File}"
		>
		<img src="./images/common/help-small.png" alt="" />
		</a>
		</td>
		<td>{$biller.logo}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.invoice_footer}</td>
		<td>{$biller.footer}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.notes}</td>
		<td>{$biller.notes}</td>
	</tr>
	{*
		{showCustomFields categorieId="1" itemId=$smarty.get.id }
	*}
	<tr>
		<td class="details_screen">{$LANG.enabled}</td>
		<td>{$biller.wording_for_enabled}</td>
	</tr>
</table>
{/if}


{if $smarty.get.action== 'view' }
	<br />
	<table class="buttons" align="center">
		<tr>
			<td>
				<a href="./index.php?module=billers&amp;view=details&amp;action=edit&amp;id={$biller.id}" class="positive">
					<img src="./images/famfam/report_edit.png" alt=""/>
					{$LANG.edit}
				</a>

			</td>
		</tr>
	</table>
{/if}


{if $smarty.get.action== 'edit' }
<br />
<table align="center">
	<tr>
		<td class="details_screen">{$LANG.biller_name} 
		<a 
			class="cluetip"
			href="#"
			rel="docs.php?t=help&amp;p=required_field"
			title="{$LANG.Required_Field}"
		>
		<img src="./images/common/required-small.png" alt="" />
		</a>
		</td>
		<td><input type="text" name="name" value="{$biller.name|regex_replace:"/[\\\]/":""}" size="50" id="name" class="required" onblur="checkField(this);" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.street}</td>
		<td><input type="text" name="street_address" value="{$biller.street_address}" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.street2}
		<a
			class="cluetip"
			href="#"
			rel="docs.php?t=help&amp;p=street2"
			title="{$LANG.street2}"
		> 
		<img src="./images/common/help-small.png" alt="" />
		</a>
		</td>
		<td><input type="text" name="street_address2" value="{$biller.street_address2}" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.city}</td>
		<td><input type="text" name="city" value="{$biller.city}" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.zip}</td>
		<td><input type="text" name="zip_code" value="{$biller.zip_code}" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.state}</td>
		<td><input type="text" name="state" value="{$biller.state}" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.country}</td>
		<td><input type="text" name="country" value="{$biller.country}" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.mobile_phone}</td>
		<td><input type="text" name="mobile_phone" value="{$biller.mobile_phone}" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.phone}</td>
		<td><input type="text" name="phone" value="{$biller.phone}" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.fax}</td>
		<td><input type="text" name="fax" value="{$biller.fax}" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.email}</td>
		<td><input type="text" name="email" value="{$biller.email}" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.biller_cf1}
		<a
			class="cluetip"
			href="#"
			rel="docs.php?t=help&amp;p=custom_fields"
			title="{$LANG.Custom_Fields}"
		> 
		<img src="./images/common/help-small.png" alt="" />
		</a>
		</td>
		<td><input type="text" name="custom_field1" value="{$biller.custom_field1}" size="50"</td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.biller_cf2}
		<a
			class="cluetip"
			href="#"
			rel="docs.php?t=help&amp;p=custom_fields"
			title="{$LANG.Custom_Fields}"
		> 
		<img src="./images/common/help-small.png" alt="" />
		</a>
		</td>
		<td><input type="text" name="custom_field2" value="{$biller.custom_field2}" size="50"</td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.biller_cf3}
		<a
			class="cluetip"
			href="#"
			rel="docs.php?t=help&amp;p=custom_fields"
			title="{$LANG.Custom_Fields}"
		> 
		<img src="./images/common/help-small.png" alt="" />
		</a>
		</td>
		<td><input type="text" name="custom_field3" value="{$biller.custom_field3}" size="50"</td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.biller_cf4}
		<a
			class="cluetip"
			href="#"
			rel="docs.php?t=help&p=custom_fields"
			title="{$LANG.Custom_Fields}"
		> 
		<img src="./images/common/help-small.png" alt="" />
		</a>
		</td>
		<td><input type="text" name="custom_field4" value="{$biller.custom_field4}" size="50"</td>
	</tr>
	<tr>
		<td class="details_screen">
		{$LANG.logo_file}
		<a
			class="cluetip"
			href="#"
			rel="docs.php?t=help&p=insert_biller_text"
			title="{$LANG.Logo_File}"
		>
		<img src="./images/common/help-small.png" alt="" />
		</a>
		</td>
		<td>
			{html_options name=logo output=$files values=$files selected=$biller.logo }
		</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.invoice_footer}</td>
		<td><textarea  name="footer" class="editor" rows="4" cols="50">{$biller.footer|unescape}</textarea></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.notes}</td>
		<td><textarea  name="notes"class="editor" rows="8" cols="50">{$biller.notes|unescape}</textarea></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.enabled}</td>
		<td>
		{html_options name=enabled options=$enabled selected=$biller.enabled}
		</td>
	</tr>
	{*
		{showCustomFields categorieId="1" itemId=$smarty.get.id}
	*}

</table>
{/if} 
{if $smarty.get.action== 'edit' }
<br />
	<table class="buttons" align="center">
    <tr>
        <td>
            <button type="submit" class="positive" name="save_biller" value="{$LANG.save_biller}">
                <img class="button_img" src="./images/common/tick.png" alt="" /> 
                {$LANG.save}
            </button>

            <input type="hidden" name="op" value="edit_biller">
   			<input type="hidden" name="categorie" value="1" />

            <a href="./index.php?module=billers&amp;view=manage" class="negative">
                <img src="./images/common/cross.png" alt="" />
                {$LANG.cancel}
            </a>
    
        </td>
    </tr>
	</table>
	{/if}
</form>
