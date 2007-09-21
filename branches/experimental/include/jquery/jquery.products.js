$(main);

function main() {
	try {

		var product	 = new Product();
		$.ajax({
			type: "GET",
			url: "./auto_helper.php",
			async: false,
			dataType: "json",
			data: "ask=all_products",
			success: function(result){
				product.fill(result);
			}
		});

		$("#reference").autocomplete(product.references, {
			autoFill: true,
			matchContains: true,
			minChars: 0
		});
		$("#reference").result(function(event, reference, formatted) {
			if(reference){
				product.setReference(reference)
				product.update();
			}
		});

		product.manageChanges();
		$("#form").validate({
			rules: {
				reference: {
					required: true,
					minLength: 2
				},
				description: {
					required: true,
					minLength: 2
				}
			},
			focusCleanup: true,
			errorPlacement: function(error, element) {
				error.appendTo( element.parent("td").next("td") );
			}
		});
		/* EDIT Support */
		var mode = $("#mode").val();
		if(mode == 'edit'){
			var reference = $("#reference").val();
			product.setReference(reference);
			/* closure */
			var functRef = callLater(product);
			setTimeout(functRef, 500);
		} else if(mode == 'add'){
			flush();
		}
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
function flush(){
	$(":text").attr("value", '');
}
/* CLOSURE */
function callLater(param){
	return (function(){
		param.update();
	});
}
/* Product Data Structure */
function Product() {
	this.reference 	= "";
	this.id			= "";
	this.type		= "";
	this.cost		= "";
	this.us_retail	= "";
	this.priceA		= "";
	this.priceB		= "";
	this.priceC		= "";
	this.priceD		= "";
	this.description	= "";
	this.notes		= "";
	this.data	= null;
	this.references = [];
}
Product.prototype.fill = function(result) {
	this.data = result;
	for(i=0;i<this.data.length;i++){
		this.references.push(this.data[i]['reference']);
	}
}
Product.prototype.set = function(what, value){
	for(var property in this){
		if(what == property){
			this[property] = value;
		}
	}
}
Product.prototype.setReference = function(reference) {
	this.reference = reference;
}
Product.prototype.update = function(){
	if(this.reference){
		for(var i in this.data){
			if(this.data[i]['reference'] == this.reference){
				this.set("id", this.data[i]['id']);
				this.set("description", this.data[i]['description']);
				this.set("priceA", this.data[i]['price_level_a']);
				this.set("priceB", this.data[i]['price_level_b']);
				this.set("priceC", this.data[i]['price_level_c']);
				this.set("priceD", this.data[i]['price_level_d']);
				this.set("cost", this.data[i]['last_unit_cost']);
				this.set("us_retail", this.data[i]['us_retail']);
				this.set("type", this.data[i]['type']);
				this.set("notes", this.data[i]['notes']);
				break;
			}
		}
		this.show();
	}
}
Product.prototype.show = function(){
	$("#type").attr("value", this.type);
	$("#last_unit_cost").attr("value", this.cost);
	$("#us_retail").attr("value", this.us_retail);
	$("#price_level_A").attr("value", this.priceA);
	$("#price_level_B").attr("value", this.priceB);
	$("#price_level_C").attr("value", this.priceC);
	$("#price_level_D").attr("value", this.priceD);
	$("#id").attr("value", this.id);
	var mce0 = tinyMCE.getInstanceById('mce_editor_0');
	if(mce0){
		mce0.setHTML(this.description);
		var mce1 = tinyMCE.getInstanceById('mce_editor_1');
		mce1.setHTML(this.notes);
	} else {
		console.log("not yet :(");

	}
}
Product.prototype.validate = function(){
	var actualReference = $("#reference").val();
	if(this.reference != actualReference){
		$("#id").attr("value", '');
	}
}
Product.prototype.manageChanges = function(){
	var instance = this;
	$("#type").change(function(){

	});
	$("#description").change(function(){

	});
	$("#price_level_A").change(function(){

	});
	$("#price_level_B").change(function(){

	});
	$("#price_level_C").change(function(){

	});
	$("#price_level_D").change(function(){

	});
	$("#last_unit_cost").change(function(){

	});
	$("#us_retail").change(function(){

	});
	$("#notes").change(function(){

	});
	$("#enabled").change(function(){

	});
	$("#submit").click(function(){
		instance.validate();
	});
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