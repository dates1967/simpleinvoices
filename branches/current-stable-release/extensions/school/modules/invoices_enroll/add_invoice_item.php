<?php
/*
* Script: add_invoice_item.php
* 	add new invoice item in edit page
*
* Authors:
*	 Nicolas Ruflin
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



if(isset($_POST['submit'])) {
	school_invoice::insertInvoiceItem($_POST['invoice_id'],$_POST['quantity'],$_POST['product'],$_POST['tax_id'],$_POST['description'], $_POST['customer_id'],$_POST['start_reason_id'],"1","");
}

else {
	$products = getActiveProducts();
	$smarty -> assign("products",$products);

	/*Get student ID*/
	$sql ="select customer_id from ".TB_PREFIX."invoices where id = ".$_GET['invoice']."";
	$result_sql = mysqlQuery($sql);
	$result = mysql_fetch_array($result_sql);

}

$type = $_GET[type];
$pageActive = "invoices";
$smarty->assign('pageActive', $pageActive);
$smarty -> assign("type",$type);
$smarty -> assign("student_id",$result['customer_id']);

/*Start reason*/
$sql_start = "select * from ".TB_PREFIX."course_start_reason"; 
$start_sql = sql2array($sql_start);
$smarty -> assign('start_reasons',$start_sql);

?>
