$(main);

function main() {
	try {
		flush();
// 		select_bill_to();
// 		select_ship_to();
		var invoice = new Invoice();
		$.ajax({
			type: "GET",
			url: "./auto_helper.php",
			async: false,
			dataType: "json",
			data: "ask=customers",
			success: function(data){
				invoice.addCustomers(data);
			}
		});
		$("#select_company").autocomplete(invoice.customers, {
			autoFill: true,
			matchContains: true,
			minChars: 0
		});
		$("#select_company").result(function(event, data, formatted) {
			if(data){
				invoice.updateAddress();
			}
		});
		$.ajax({
			type: "GET",
			url: "./auto_helper.php",
			async: false,
			dataType: "json",
			data: "ask=products",
			success: function(data){
				invoice.addData(data);
			}
		});

		$("#ref0").autocomplete(invoice.references);
		$("#ref0").result(function(event, data, formatted) {
			if(data){
				invoice.updateRow(0, data);
				$("#desc0").focus();
			}
		});
		invoice.getRow(0).flush();
		$("#ref0").focus();

		/* QUANTITY */
		var regexp = /^\d+\.?\d*$/;
		$("#qty0").change(function() {
			if($(this).val() == ''){
				invoice.getRow(0).setQty(0);
			} else if(regexp.test($(this).val())) {
				// regexp match
				invoice.getRow(0).setQty($(this).val());
				invoice.getRow(0).update();
			} else {
				// not a number
				alert("Not a Number");
			}
			invoice.updateTotals();
		});
		/* PRICE */
		var floatRegexp = /^\d+\.?\d*$/;
		$("#price0").change(function(){
			if($(this).val() == ''){
				invoice.getRow(0).setPrice(0);
			} else if(floatRegexp.test($(this).val())) {
				// regexp match
				invoice.getRow(0).setPrice($(this).val());
				invoice.getRow(0).update();
			} else {
				// not a decimal number
				alert("Not a Decimal Number");
			}
			invoice.updateTotals();
		});

		invoice.generalChanges();

	}
	catch(e) {
		alert(e);
	}
}
function mydebug (obj) {
// 	console.log("Debugging: " + obj);
	var str = "";
	for (var property in obj) {
// 		console.log("Property: " + property);
		str += "Property: " + property + "\n";
	}
	alert(str);
}
/**
 *	Nuevo Sistema con Autocomplete
 */
function set_focus(num){
	$("#ref"+num).focus();
}
function flush(){
	var number = $("#invoice_number").val();
	var date = $("#date1").val();
	$(":text").attr("value", '');
	$("#invoice_number").attr("value", number);
	$("#date1").attr("value", date);
	$("#freight").attr("value", "0.00");
	$("#tax]").attr("value", "0.00");
	$("input[@name=taxes]").removeAttr("checked");
}
/* Row Structure */
function Row(num){
	this.row = num;
	this.qty = 0;	/* only useful for editing invoices */
	this.reference = "";
	this.id = "";
	this.description = "";
	this.price = 0.00;
	this.amount = 0.00;
}
Row.prototype.setReference = function(reference){
	this.reference = reference;
}
Row.prototype.setDescription = function(description){
	this.description = description;
}
Row.prototype.setPrice = function(price){
	this.price = parseFloat(price);
}
Row.prototype.setQty = function(qty){
	this.qty = parseInt(qty);
}
Row.prototype.setId = function(id){
	this.id = parseInt(id);
}
Row.prototype.update = function(){
	$("#id" + this.row).attr("value", this.id);
	$("#desc" + this.row).attr("value", this.description);
	$("#qty" + this.row).attr("value", this.qty.toFixed(0));
	$("#price" + this.row).attr("value", this.price.toFixed(2));
	this.amount = parseInt(this.qty) * parseFloat(this.price);
	$("#amount" + this.row).html(this.amount.toFixed(2));
}
Row.prototype.flush = function(){
	$("#id" + this.row).attr('value', '');
	$("#desc" + this.row).attr('value', '');
	$("#qty" + this.row).attr('value', '0');
	$("#price" + this.row).attr('value', '0.00');
	$("#amount" + this.row).html('0.00');
}

/* Global Data Structure */
function Invoice(){
	this.datas = {};
	this.references = [];
	this.customers = null;
	this.addTaxes = false;
	this.taxRate = 0.07;
	this.rows = [];
	this.addRow(0);
}
Invoice.prototype.addData = function(data) {
	this.datas = data;
	for(i=0;i<this.datas.length;i++){
		this.references.push(this.datas[i]['reference']);
	}
}
Invoice.prototype.getReferences = function() {
	return this.references;
}
Invoice.prototype.addRow = function(num) {
	this.rows[parseInt(num)] = new Row(parseInt(num));
}
Invoice.prototype.getRow = function(num) {
	return this.rows[parseInt(num)];
}
Invoice.prototype.appendRow = function() {
	var row = this.rows.length;
	var standardRow = "<tr id='line" + row + "'> "
+ "<td class='reference'><input type='text' id='ref" + row + "' /><input type='hidden' name='id" + row + "' id='id" + row + "' /></td>"
+ "<td class='description'><input type='text' id='desc" + row + "' name='desc" + row + "' /></td>"
+ "<td class='qty'>"
+ "<input type='text' id='qty" + row + "' name='qty" + row + "' num='" + row + "' value='0' /></td>"
+ "<td class='unit_price'>"
+ "<input type='text' id='price" + row + "' name='price" + row + "' num='" + row + "' value='0.00' /></td>"
+ "<td class='amount' id='amount" + row + "'>0.00</td>"
+ "</tr>";
	this.addRow(row);
	$("#rows").append(standardRow);
	this.setupRow(row);
}
Invoice.prototype.setupRow = function(row) {
	var instance = this;
	/* REFERENCE */
	$("#ref" + row).autocomplete(instance.references);
	$("#ref" + row).result(function(event, data, formatted) {
		if(data){
			instance.updateRow(row, data);
			instance.manageChanges();
		}
	});
	/* DESCRIPTION */
	var myFocus = (parseInt(row) == 0) ? 0 : (parseInt(row) -1);
	$("#desc" + myFocus).focus();
	/* QUANTITY */
	var intRegexp = /^\d+$/;
	$("#qty"+row).change(function(){
		if($(this).val() == ''){
			if(!instance.isLastRow(row)){
				instance.getRow(row).setQty(0);
			}
		} else if(intRegexp.test($(this).val())) {
			// regexp match
			instance.getRow(row).setQty($(this).val());
			instance.getRow(row).update();
		} else {
			// not a number
			alert("Not a Number");
		}
		instance.updateTotals();
	});
	/* PRICE */
	var floatRegexp = /^\d+\.?\d*$/;
	$("#price"+row).change(function(){
		if($(this).val() == ''){
			if(!instance.isLastRow(row)){
				instance.getRow(row).setPrice(0);
			}
		} else if(floatRegexp.test($(this).val())) {
			// regexp match
			instance.getRow(row).setPrice($(this).val());
			instance.getRow(row).update();
		} else {
			// not a decimal number
			alert("Not a Decimal Number");
		}
		instance.updateTotals();
	});
}
Invoice.prototype.updateRow = function(num, reference){
	var last = parseInt(this.rows.length) -1;
	var row = this.getRow(num);
	if(reference){
		row.setReference(reference);
		for(var i in this.datas){
			if(this.datas[i]['reference'] == reference){
				row.setId(this.datas[i]['id']);
				row.setDescription(this.datas[i]['description']);
				row.setPrice(this.datas[i]['price_level_a']);
			}
		}
		row.update();
		if(this.isLastRow(num)) {
			this.appendRow();
		}
	} else {
		// never reached, updateRow called by autocomplete result method
		// (user selected something from the autocomplete thing)
	}
	//alert("Row: " + num + "\nReference: " + reference + "\nPrice: " + row.price);
}
Invoice.prototype.isLastRow = function(rowNum) {
	var num = parseInt(this.rows.length) -1;
	if(parseInt(rowNum) == num){
		return true;
	} else {
		return false;
	}
}
Invoice.prototype.manageChanges = function() {
	instance = this;
	var inputs = $("input[@id^=ref]");
	inputs.change(function() {
		if($(this).val() == ''){
			var myindex = inputs.index(this);
			if(!instance.isLastRow(myindex)){
				instance.getRow(myindex).flush();
			}
		}
	});
}
Invoice.prototype.updateTotals = function() {
	var total = 0;
	var tax = 0;
	$("[@id^=amount]").each(function(){
		total += parseFloat($(this).html());
	});
	if(this.addTaxes){
		tax = parseFloat(total * this.taxRate);
		$("#tax").html(tax.toFixed(2));
	} else {
		$("#tax").html("0.00");
	}
	$("#subtotal").html(total.toFixed(2));
	total += tax;
	total += parseFloat($("#freight").val());
	$("#total").html(total.toFixed(2));
	var qty = 0;
	$("[@id^=qty]").each(function(){
		qty += parseFloat($(this).val());
	});
	$("#total_qty").html(qty.toFixed(0));
}
Invoice.prototype.generalChanges = function() {
	var instance = this;
	$("#freight").change(function(){
		var value = $(this).val();
		$(this).attr("value", parseFloat(value).toFixed(2));
		instance.updateTotals();
	});
	$("#taxes").toggle(function(){
		instance.addTaxes = true;
		instance.updateTotals();
		$(this).attr("src", 'images/svg/check-on.png');
		$("#tax_id").attr("value", "1");
	}, function(){
		instance.addTaxes = false;
		instance.updateTotals();
		$(this).attr("src", 'images/svg/check-off.png');
		$("#tax_id").attr("value", "0");
	});
	$("#select_company").change(function(){
		instance.updateAddress();
	});
}
/* Customer Data Handling */
Invoice.prototype.addCustomers = function(data) {
	this.customers = data;
}
/**
 *	End nuevo sistema
 */

Invoice.prototype.updateAddress = function(){
	var url = "./auto_helper.php";
	var customer = $("#select_company").attr("value");
	if (customer){
		$.getJSON(url, { ask: 'customer', name: customer }, function(json) {
			$("#bill_to_name").html(json.name);
			$("#bill_to_address").html(json.street_address?json.street_address:'');
			if (json.street_address2){
				$("#bill_to_address2").html(json.street_address2);
			} else {
				$("#bill_to_address2").parent().css({display: "none"});
			}
			$("#bill_to_city").html(json.compound);
			$("#bill_to_phone").html(json.phone?json.phone:'');
			$("#bill_to_fax").html(json.fax?json.fax:'');
			$("#bill_to_email").html(json.email?json.email:'');
			$("#shipping_name").attr("value", json.shipping_name?json.shipping_name:json.name);
			$("#shipping_address").attr("value", json.shipping_address?json.shipping_address:json.street_address);
			if (json.shipping_address2){
				$("#shipping_address2").attr("value", json.shipping_address2);
			} else {
				$("#shipping_address2").parent().parent().css({display: "none"});
			}
			$("#shipping_compound").attr("value", json.shipping_compound?json.shipping_compound:json.compound);
			$("#shipping_phone").attr("value", json.shipping_phone?json.shipping_phone:json.phone);
			$("#shipping_fax").attr("value", json.shipping_fax?json.shipping_fax:json.fax);
			$("#shipping_email").attr("value", json.shipping_email?json.shipping_email:json.email);
			$("#company_id").attr("value", json.id);
		});
		var shipping_info = {shipping_name: $("shipping_name").val(),
			shipping_address: $("#shipping_address").val(),
			shipping_address2: $("#shipping_address2").val(),
			shipping_compound: $("#shipping_compound").val(),
			shipping_phone: $("#shipping_phone").val(),
			shipping_fax: $("#shipping_fax").val(),
			shipping_email: $("#shipping_email").val()
		};
		console.log(shipping_info);
// 		var shipping_info_encoded = shipping_info.toJSON();
// 		alert("Shipping: " + shipping_info_encoded);
	}
}

Invoice.prototype.select_ship_to = function(){
	var url = "./auto_helper.php";
	var ship_id = $("#select_ship_to").attr("value");
	if (ship_id){
		$.getJSON(url, { ask: 'client', id: ship_id }, function(json) {

			$("#ship_to_address").html(json.shipping_address?json.shipping_address:'');
			if (json.street_address2){
				$("#ship_to_address2").html(json.shipping_address2);
			} else {
				$("#ship_to_address2").parent().css({display: "none"});
			}
			$("#ship_to_city").html(json.compound?json.compound:'');
			$("#ship_to_phone").html(json.shipping_phone?json.shipping_phone:'');
			$("#ship_to_fax").html(json.shipping_fax?json.shipping_fax:'');
			$("#ship_to_email").html(json.shipping_email?json.shipping_email:'');
		});
	}
}