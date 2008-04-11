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
			/*if ( (quantity.length==0) || (quantity.value==null) ) */
			if (quantity=="") 
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
			/*if ( (quantity.length==0) || (quantity.value==null) ) */
			if (quantity=="")
			{	
				$("#quantity"+row_number).attr("value","1");
			}

			/*$("#quantity"+row_number).attr("value","1");*/

			$("#unit_cost"+row_number).attr("value",data);
		}
	});
}

function delete_line_item(row_number)
{
	$('.row'+row_number).hide(); 
	$('#quantity'+row_number).attr('value','0');
	$('#delete'+row_number).attr('value','yes');
}

function add_line_item(row_number)
{
/*    $("#line tr:last").clone().append("#line tr:last");*/
    $("#line"+row_number).clone().append("#line"+row_number);
/*    $("#line :last").hide();*/
    /*
    $('#line'+row_number).after('<tr id><td>THIS IS A TEST<td><tr>');
    */
/*    $('#line'+row_number).hide();
    $('#line'+row_number).append('<tr><td>THIS IS A TEST<td><tr>');
  */

}
