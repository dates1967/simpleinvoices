// shorthand for $(document).ready(main())
$(main);

function main() {
	try {
		set_focus();
		var lineas = new Lines();
		var num_lines = eval(get_num_lines()) + 1;
		for(i=0;i<num_lines;i++){
			lineas.addLine(i);
			var qty = eval($("#i_quantity"+i).attr("value"));
			var price = eval($("#i_unit_cost"+i).attr("value"));
			$("#i_amount"+i).html((qty*price).toFixed(2));
			update_totals();
		}
		lineas.addLine(eval(get_num_lines())+1);

		//lineas.debug();
		lineas.refresh();


		var lin = $("tr[@id^=line_]").length;

		var url = "./helper.php";
		var product = new Array();

		$("select[@id^=select_products]").change(function(){
			var line = eval($(this).attr("num"));
			var id = $(this).attr("value");

			lineas.addLine(line + 1);
			lineas.refresh();

			if (product[line]) {
				product[line].update();
			} else {
				product[line] = new Product(url, id);
				product[line].line = line;
				product[line].update();
			}
		});

		manage_changes();
	}
	catch(e) {
		alert(e);
	}
}

function set_focus(){
	$("#select_products0")[0].focus();
}

function Line(num){
	this.line = num;
	this.properties = {
		product_id: $("#select_products" + this.line).val()
	};
}

Line.prototype.debug = function() {
	alert("Line: " + this.line + "\nProduct_id: " + this.properties.product_id);
}

function Lines(){
	this.max_num_lines = 22;
	this.lines = [];
	this.current_line=this.lines.length;
}

Lines.prototype.addLine = function(num) {
	var num = eval(num);
	line = new Line(num);
	this.lines[num] = line;
}

Lines.prototype.getLine = function(num) {
	return this.lines[num];
}

// Muestra solamente las lineas modificadas + 1 linea en blanco
Lines.prototype.refresh = function() {
	$("tr[@id^=line_]").lt(this.lines.length).css({display: ""});
	$("tr[@id^=line_]").gt(this.lines.length - 1).css({display: "none"});
	//this.debug();
}

Lines.prototype.debug = function(num) {
	alert("Max lines: " + this.max_num_lines + "\nCurrent line: " + this.lines.length + "\n");
}

function get_num_lines(){
// 	var lineasTotales = $("select/option[@selected=1][@value]").each();
// 	alert("LineasTotales: " + lineasTotales);
	var line = 0;
	$("select/option[@selected][@value]").each(function(){
 		line = $(this).parent().attr("num");
		//alert("Linea: " + line);
	});
	return line;
}

function manage_changes(){

	$("[@id^=i_quantity]").change(function(){
		var line = eval($(this).attr("num"));
		//TODO 	2.1) Agregar validacion aca: el eval falla si entran letras
		//		en lugar de numeros (bad data), dice que xx is not defined (busca
		// 		una variable con ese nombre si no encuentra un numero)
		//		Usar eso para validacion en tiempo real de datos.
		var qty = eval($(this).attr("value"));
		var price = eval($("#i_unit_cost"+line).attr("value"));
		$("#i_amount" + line).html((qty*price).toFixed(2));
		update_totals();
	});

	$("[@id^=i_unit_cost]").change(function(){
		var line = eval($(this).attr("num"));
		//TODO 2.2) Agregar validacion aca:
		// 		 	Idem 2.1
		var price = eval($(this).attr("value"));
		var qty = eval($("#i_quantity"+line).attr("value"));
		$(this).attr("value", price.toFixed(2));
		$("#i_amount" + line).html((qty*price).toFixed(2));
		update_totals();
	});
	$("#freight").change(function(){
		var value = $(this).val();
		$(this).attr("value", eval(value).toFixed(2));
		update_totals();
	});
}

function flush(){
	$("select[@id^=select_products]").each(function(){
		$(this).attr("value", "");
	});
	$("[@id^=description]").each(function(){
		$(this).html("");
	});
	$("[@id^=i_quantity]").each(function(){
		$(this).attr("value", 0);
	});
	$("[@id^=i_unit_cost]").each(function(){
		$(this).attr("value", "0.00");
	});
	$("[@id^=i_amount]").each(function(){
		$(this).html("0.00");
	});
	$("#freight").attr("value", "0.00");
	$("#subtotal").html("0.00");
	$("#tax").html("0.00");
	$("#total").html("0.00");
}

function update_totals(){
	var total = 0;
	$("[@id^=i_amount]").each(function(){
		total += eval($(this).html());
	});
	$("#subtotal").html(total.toFixed(2));
	total += eval($("#tax").html());
	total += eval($("#freight").val());
	$("#total").html(total.toFixed(2));
	var qty = 0;
	$("[@id^=i_quantity]").each(function(){
		qty += eval($(this).val());
	});
	$("#total_qty").html(qty.toFixed(0));
}
// Constructor for Product Class
function Product(sourceURL, id){
	this.sourceURL 	= sourceURL;
	this.sourceType = "xml";
	this.id 		= id;
	this.desc 		= "my des";
	this.line		= 0;
	this.price 		= "";
	this.reference  = "";
	this.properties = new Array(); // Should get populated by ajax
}

Product.prototype.update = function() {
	var instance = this;
	$.getJSON(instance.sourceURL, { handler: 'json', callback: 'get_product_details', params: instance.id }, function(json) {
		var line = instance.line;
		$("#description"+line).html(json.description);
		//TODO 3.1) Convertir esto en un text input
		$("#hidden_description"+line).attr({value: json.description});
		$("#i_unit_cost"+line).attr({value: json.last_unit_cost});
	});
}
