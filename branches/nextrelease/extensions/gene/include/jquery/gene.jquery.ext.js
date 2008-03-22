function invoice_product_change_price(si_product,row_number, quantity)
{
	$('#gmail_loading').show();
	$.ajax({
		type: 'GET',
		url: './extensions/gene/modules/invoices/invoice_product_ajax.php?id='+si_product,
		data: "id: "+si_product,
		success: function(data){
			$('#gmail_loading').hide();
			/*$('#state').html(data);*/
			if ( (quantity.length==0) || (quantity.value==null) ) 
			{	
				$("#quantity"+row_number).attr("value","1");
			}
			$("#unit_price"+row_number).attr("value",data);
		}
	});
}

function invoice_product_change_cost(si_product,row_number,quantity)
{
	$('#gmail_loading').show();
	$.ajax({
		type: 'GET',
		url: './extensions/gene/modules/invoices/purchase_order_product_ajax.php?id='+si_product,
		data: "id: "+si_product,
		success: function(data){
			$('#gmail_loading').hide();
			/*$('#state').html(data);*/
			if ( (quantity.length==0) || (quantity.value==null) ) 
			{	
				$("#quantity"+row_number).attr("value","1");
			}

			/*$("#quantity"+row_number).attr("value","1");*/

			$("#unit_cost"+row_number).attr("value",data);
		}
	});
}
