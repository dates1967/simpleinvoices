<?php
/*
* Script: invoice.php
* 	invoice page
*
* Authors:
*	 Justin Kelly, Nicolas Ruflin
*
* Last edited:
* 	 2007-07-19
*
* License:
*	 GPL v2 or above
*
* Website:
* 	http://www.simpleinvoices.org
 */
//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

$SI_PRODUCTS = new SimpleInvoices_Db_Table_Products();
$SI_SYSTEM_DEFAULTS = new SimpleInvoices_Db_Table_SystemDefaults();
$SI_CUSTOMERS = new SimpleInvoices_Db_Table_Customers();
$SI_TAX = new SimpleInvoices_Db_Table_Tax();
$SI_BILLER = new SimpleInvoices_Db_Table_Biller();
$SI_PREFERENCES = new SimpleInvoices_Db_Table_Preferences();

$billers = $SI_BILLER->fetchAllActive();
$customers = $SI_CUSTOMERS->fetchAllActive();
$taxes = $SI_TAX->fetchAllActive();
$products = $SI_PRODUCTS->findActive();
$preferences = $SI_PREFERENCES->fetchAllActive();
$defaults = $SI_SYSTEM_DEFAULTS->fetchAll();


$defaultBiller = $SI_BILLER->getDefault();
$defaultCustomerID = (isset($_GET['customer_id'])) ? $_GET['customer_id'] : $SI_CUSTOMERS->getDefault();
$defaultTax = $SI_TAX->getDefault();
$defaultPreference = $SI_PREFERENCES->getDefault();

if (!empty( $_GET['get_num_line_items'] )) {
	$dynamic_line_items = $_GET['get_num_line_items'];
} 
else {
	$dynamic_line_items = $defaults['line_items'] ;
}

for($i=1;$i<=4;$i++) {
	$show_custom_field[$i] = show_custom_field("invoice_cf$i",'',"write",'',"details_screen",'','','');
}


$sql = "select CONCAT(a.id, '-', v.id) as id, CONCAT(a.name, '-',v.value) as display from ".TB_PREFIX."products_attributes a, ".TB_PREFIX."products_values v where a.id = v.attribute_id;";
$sth =  dbQuery($sql);
$matrix = $sth->fetchAll();
$smarty -> assign("matrix", $matrix);

$sql_prod = "select product_id as PID, (select count(product_id) from ".TB_PREFIX."products_matrix where product_id = PID ) as count from ".TB_PREFIX."products_matrix ORDER BY count desc LIMIT 1;";
$sth_prod =  dbQuery($sql_prod);
$number_of_products = $sth_prod->fetchAll();

$smarty -> assign("number_of_attributes", $number_of_products['0']['count']);

$pageActive == "invoices";


$smarty -> assign("billers",$billers);
$smarty -> assign("customers",$customers);
$smarty -> assign("taxes",$taxes);
$smarty -> assign("products",$products);
$smarty -> assign("preferences",$preferences);
$smarty -> assign("dynamic_line_items",$dynamic_line_items);
$smarty -> assign("show_custom_field",$show_custom_field);

$smarty -> assign("defaultCustomerID",$defaultCustomerID);
$smarty -> assign("defaults",$defaults);
$smarty -> assign('pageActive', $pageActive);

?>
