function change_state(si_product,row_number)
{
	$('#gmail_loading').show();
	$.ajax({
		type: 'GET',
		url: './extensions/gene/modules/invoices/invoice_product_ajax.php?id='+si_product,
		data: "id: "+si_product,
		success: function(data){
			$('#gmail_loading').hide();
			/*$('#state').html(data);*/
			$("#state"+row_number).attr("value",data);
		}
	});
}
