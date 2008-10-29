<?php
/*
* Script: details.php
* 	invoice details page
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
#table

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

#get the invoice id
$master_invoice_id = $_GET['invoice'];

$invoice = invoice::getInvoice($master_invoice_id);
$invoiceItems = school_invoice::getInvoiceItems($master_invoice_id);
$customers = customer::getActiveCustomers();
$preference = getPreference($invoice['preference_id']);
$billers = getActiveBillers();
$taxes = getActiveTaxes();
$preferences = getActivePreferences();
$products = getActiveProducts();


for($i=1;$i<=4;$i++) {
	$customFields[$i] = show_custom_field("invoice_cf$i",$invoice["custom_field$i"],"write",'',"details_screen",'','','');
}

$pageActive = "invoices";

$smarty -> assign('pageActive', $pageActive);
$smarty -> assign("invoice",$invoice);
$smarty -> assign("invoiceItems",$invoiceItems);
$smarty -> assign("customers",$customers);
$smarty -> assign("preference",$preference);
$smarty -> assign("billers",$billers);
$smarty -> assign("taxes",$taxes);
$smarty -> assign("preferences",$preferences);
$smarty -> assign("products",$products);
$smarty -> assign("customFields",$customFields);
$smarty -> assign("lines",count($invoiceItems));

/*Place of enrolment function*/
$sql = "select * from ".TB_PREFIX."branch"; 
$branch_sql = sql2array($sql);
$smarty -> assign('branch',$branch_sql);

$sql_branch = "select name from ".TB_PREFIX."branch where id = ".$invoice[branch_id].""; 
$branch_sql = mysql_fetch_object(mysqlQuery($sql_branch));
$smarty -> assign('branch_id',$branch_sql->name);

$smarty -> assign('auth_role_name',$auth_session->role_name);
$smarty -> assign('auth_user_domain',$auth_session->user_domain);

	for ($i = 1; $i <= 10; $i++) 
	{
    	if($i == "1")
		{
			$sql = sprintf('SELECT '.$i.' as row, start_date as start, payment_period_'.$i.'_end as end FROM si_products WHERE id = %d LIMIT 1', $_GET['id']);
		} else { 
		    $sql = sprintf('SELECT  '.$i.' as row,  payment_period_'.$i.'_start as start, payment_period_'.$i.'_end as end FROM si_products WHERE id = %d LIMIT 1', $_GET['id']);
		}
    $states = mysqlQuery($sql);
    $row = mysql_fetch_array($states);
//    $output .= $states_sql;

        	$json[] = array($row['row'] => $row['start']." to ".$row['end']." Period:".$row['row']  );
  //      	$json['end'] =  $row['end'];
   
	}


?>
