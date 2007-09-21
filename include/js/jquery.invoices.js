$(main);

function main() {
	try {
		//flush();
		var invoice = new Invoice();

		var module = $("#module").val();
		// console.log("Module: "+module);
		if(module == 'purchases'){
			invoice.type = 'purchases';
			var ask = 'ask=vendors';
		} else if(module == 'sales'){
			invoice.type = 'sales';
			var ask = 'ask=customers';
		}
		$.ajax({
			type: "GET",
			url: "./auto_helper.php",
			async: false,
			dataType: "json",
			data: ask,
			success: function(data){
				invoice.addCompanys(data);
			}
		});
		$("#select_company").autocomplete(invoice.companys, {
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
		$.ajax({
			type: "GET",
			url: "./auto_helper.php",
			async: false,
			dataType: "json",
			data: "ask=shipping_methods",
			success: function(data){
				invoice.addShippingMethods(data);
			}
		});
		$("#shipping_method").autocomplete(invoice.shipping_methods, {
			autoFill: true,
			matchContains: true,
			minChars: 0
		});
		$("#shipping_method").result(function(event, data, formatted) {
			if(data){
				invoice.updateShippingMethod();
			}
		});

		/* Validation */

		jQuery.validator.addMethod("product", function(value) { 
			if(!value)
				return true;
			for (var i in invoice.references) {
				if(value == invoice.references[i])
					return true;
			}
			return false;	
		}, "Not a valid product. Please add the product first.");

		invoice.validator = $("#invoiceForm").validate({
			event: "keyup",
			errorClass: "invalid",
			errorLabelContainer: $("#messageBox2 > ul"),
			wrapper: "li"
			// debug: true
		});

		/* EDIT Support */
		var mode = $("#mode").val();
		if(mode == 'edit'){
			invoice.updateAddress();
			invoice.getRowsReady();
			var functRef = callLater(invoice);
			setTimeout(functRef, 500);
//             invoice.setupRemoveEvent();
			//invoice.updateTotals();
		} else {
			flush();
			invoice.appendRow();
			$("#ref0").focus();
		}

		invoice.generalChanges();
	}
	catch(e) {
		console.error(e.name+"\n"+e.message+"\n"+e.stack+"\nin: "+e.fileName+"\nat line :"+e.lineNumber);
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
/* CLOSURE */
function callLater(param){
	return (function(){
		param.updateTotals();
// 		param.setupRemoveEvent();
		param.generalChanges();
	});
}
function flush(){
	var number = $("#invoice_number").val();
	var date = $("#date1").val();
//     console.log("Number: " + number);
//     console.log("Date: " + date);
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
Row.prototype.removeMeta = function(){
	$("#desc" + this.row).attr({data: ''});
	$("#qty" + this.row).attr('data', '');
	$("#price" + this.row).attr('data', '');

}
/* Global Data Structure */
function Invoice(){
	this.datas = {};
	this.references = [];
	this.companys = null;
	this.addTaxes = false;
	this.taxRate = 0.07;
	this.shipping_methods = null;
	this.rows = [];
	this.type = ""; /* sales | purchases */
	this.validator = null;
// 	this.addRow(0);
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
	if(row == 0)
		var data = "data='required:true, product:true'";
	else
		var data = "data='product:true'";
	var standardRow = "<tr id='line" + row + "'> "
+ "<td class='remove'>"
+ "<img src='images/svg/remove2.png' id='remove" + row + "' alt='Remove' />"
+ "</td>"
+ "<td class='reference'>"
+ "<input type='text' id='ref" + row + "' name='ref" + row + "' " + data + " /><input type='hidden' name='id" + row + "' id='id" + row + "' /></td>"
+ "<td class='description'><input type='text' data='required:\"#ref" +row+ ":filled\"' id='desc" + row + "' name='desc" + row + "' /></td>"
+ "<td class='qty'>"
+ "<input type='text' id='qty" + row + "' name='qty" + row + "' num='" + row + "' value='' data='required:\"#ref" +row+ ":filled\", digits:true, minValue:1' /></td>"
+ "<td class='unit_price'>"
+ "<input type='text' id='price" + row + "' name='price" + row + "' num='" + row + "' value='' data='required:\"#ref" +row+ ":filled\", number:true, minValue:0.1' /></td>"
+ "<td class='amount' id='amount" + row + "'>0.00</td>"
+ "</tr>";
	this.addRow(row);
	$("#rows").append(standardRow);
	// $("#ref0").attr({data: "required:true,product:true"});
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
			instance.validator.element(this);
		}
	});
	/* DESCRIPTION */
	var myFocus = (parseInt(row) == 0) ? 0 : (parseInt(row) -1);
	$("#desc" + myFocus).focus();
	$("#desc"+row).change(function(){
		instance.validator.element(this);
	});
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
			// alert("Not a Number");
		}
		instance.validator.element(this);
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
		instance.validator.element(this);
	});
	//console.log("SetupRow: "+row);
	instance.validator.refresh();
}
// Invoice.prototype.setupValidation = function(){
	// /* setup validation for static fields */		
	// $("#select_company").attr({data: "required:true"});
	// this.validator.refresh();
	// // console.log(this);
// }
Invoice.prototype.unbindRow = function(row){
	var instance = this;
	$("#ref"+row).unbind();
	$("#desc"+row).unbind();
	$("#qty"+row).unbind();
	$("#price"+row).unbind();
}
Invoice.prototype.bindRow = function(row){
	//     bind - unbind - rebind qty, price, etc. stuff :)
	var instance = this;
	instance.setupRow(row);
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
		// console.log("Updating Row: "+num+"\nLast Row: "+last+"\n----");
		if(this.isLastRow(num)) {
			this.appendRow();
		}
	} else {
		// never reached, updateRow called by autocomplete result method
	}
}
Invoice.prototype.deleteRowsUp = function(row){
	for(i=row; i<this.rows.length;i++){
		delete this.rows[i];
	}
	// we need to reindex the rows array after deleting elements
	var rows = this.rows.filter(function(element, index, array){
		return element;
	});
	this.rows = rows;
//     console.log("Removing row# "+row+"\n"+this.rows.length);
}
Invoice.prototype.remove = function(num) {
	if (window.confirm("Are you sure you want to delete row #"+num+"?")){
		var instance = this;
		$("#line"+num).remove();
		instance.deleteRowsUp(num);

		$("tr[@id^=line]").gt(num-1).each(function(i){
			var oldNum = parseInt(num+i+1);
			var lineNum = parseInt(num+i);
			instance.addRow(lineNum);
			var row = instance.getRow(lineNum);

			$(this).attr("id", "line"+lineNum);
			$("td > img", this).attr("id", "remove"+lineNum);

			$("td > input#ref"+oldNum, this).attr("id", "ref"+lineNum);
			$("td > input#ref"+lineNum, this).attr("name", "ref"+lineNum);
			var ref = $("td > input#ref"+lineNum, this).val();
			row.setReference(ref);

			$("td > input#id"+oldNum, this).attr("id", "id"+lineNum);
			$("td > input#id"+lineNum, this).attr("name", "id"+lineNum);
			var id = $("td > input#id"+lineNum, this).val();
			row.setId(id);

			$("td > input#desc"+oldNum, this).attr("id", "desc"+lineNum);
			$("td > input#desc"+lineNum, this).attr("name", "desc"+lineNum);
			var desc = $("td > input#desc"+lineNum, this).val();
			row.setDescription(desc);

			$("td > input#qty"+oldNum, this).attr("id", "qty"+lineNum);
			$("td > input#qty"+lineNum, this).attr("name", "qty"+lineNum);
			var qty = $("td > input#qty"+lineNum, this).val();
			row.setQty(qty);

			$("td > input#price"+oldNum, this).attr("id", "price"+lineNum);
			$("td > input#price"+lineNum, this).attr("name", "price"+lineNum);
			var price = $("td > input#price"+lineNum, this).val();
			row.setPrice(price);

			$("td#amount"+oldNum, this).attr("id", "amount"+lineNum);
			row.update();
		 // console.log("Changing -> num: "+num+"\ni: "+i+"\nlineNum: "+lineNum);
		});
		instance.setupRemoveEvent();
		instance.updateTotals();
		// console.log("Removed line: "+num);
		// console.log("Rows in Invoice: "+instance);
	}
}
Invoice.prototype.setupRemoveEvent = function(){
	var instance = this;
	$("[@id^=remove]").each(function(i){
		$(this).unbind();
		$(this).bind("click", { inst: instance },function(event){
			// console.log(event.data.inst);
			var re = /remove(\d+)/i;
			var idNum = $(this).attr("id");
			var result = re.exec(idNum);
			var num = parseInt(result[1]);
			// console.log("Num: "+num);
			instance.remove(num);
		});
		instance.unbindRow(i);
		instance.bindRow(i);
	});
	// console.log("entrando en SetupRemoveEvent");
}
Invoice.prototype.isLastRow = function(rowNum) {
	var num = parseInt(this.rows.length) -1;
	if(parseInt(rowNum) == num){
		return true;
	} else {
		return false;
	}
}
Invoice.prototype.getRowsReady = function() {
	/* Used to fill Invoice object with existing data (Editing) */
	var instance = this;
	$("input[@id^=ref]").each(function(i){
		instance.addRow(i);
		instance.setupRow(i);
		var reference = $(this).val();
		var row = instance.getRow(i);
		row.setReference(reference);
		row.setId($("#id"+i).val());
		row.setDescription($("#desc"+i).val());
		row.setQty($("#qty"+i).val());
		row.setPrice($("#price"+i).val());
		row.update();
	});
	this.appendRow();
	this.setupRemoveEvent();
	var num = parseInt(this.rows.length) -1;
	$("#ref"+num).focus();
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
//     console.log("starting ...");
	$("[@id^=amount]").each(function(i){
		var inst = $(this).html();
//         console.log("Iterating -> amount"+i+" ;val: "+inst);
		if(inst){
			total += parseFloat(inst);
		} else {
//             console.log("Breaking at: "+i);
			return false;
		}
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
	/* Quantity */
	var qty = 0;
	$("[@id^=qty]").each(function(){
		if(parseFloat($(this).val()) > 0)
			qty += parseFloat($(this).val());
		// console.log("qty: "+qty);
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
Invoice.prototype.addCompanys = function(data) {
	this.companys = data;
}
Invoice.prototype.addShippingMethods = function(data) {
	this.shipping_methods = data;
}
Invoice.prototype.updateShippingMethod = function() {
	// nothing for now :)
}
Invoice.prototype.updateAddress = function(){
	var url = "./auto_helper.php";
	var company = $("#select_company").attr("value");
	var ask = (this.type == 'sales')?'customer':'vendor';
	if (company){
		$.getJSON(url, { ask: ask, name: company }, function(json) {
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
//         console.log(shipping_info);
// 		var shipping_info_encoded = shipping_info.toJSON();
// 		alert("Shipping: " + shipping_info_encoded);
	}
}
