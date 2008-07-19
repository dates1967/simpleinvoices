<?php
/*
* Script: manage.php
* 	Manage Invoices page
*
* Authors:
*	 Justin Kelly, Nicolas Ruflin, Ap.Muthu
*
* Last edited:
* 	 2008-01-03
*
* License:
*	 GPL v2 or above
*
* Website:
* 	http://www.simpleinvoices.org
 */

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

/*echo <<<EOD
<title>{$title} :: {$LANG['manage_invoices']}</title>
EOD;*/

echo "Role:".$auth_session->role_name;
if($auth_session->role_name == "branch_administrator")
{
	$limit = " AND iv.branch_id = ".$auth_session->user_domain;
}

if (empty($_GET['action']))
{
	$sql = "SELECT	iv.id, b.name As biller, c.name As customer,  c.first_name as first_name, c.middle_name as middle_name, 
		(CASE	WHEN datediff(now(),iv.date) <= 14 THEN '0-14' 
				WHEN datediff(now(),iv.date) <= 30 THEN '15-30'
				WHEN datediff(now(),iv.date) <= 60 THEN '31-60'
				WHEN datediff(now(),iv.date) <= 60 THEN '61-90'
				ELSE '90+' END ) as overdue,
		iv.type_id,
		pf.pref_inv_wording,
		iv.date,
		@invd:=(SELECT sum( IF(isnull(ivt.total), 0, ivt.total)) 
			FROM ".TB_PREFIX."invoice_items ivt where ivt.invoice_id = iv.id) As invd,
		@apmt:=(SELECT sum( IF(isnull(ap.ac_amount), 0, ap.ac_amount)) 
			FROM ".TB_PREFIX."account_payments ap where ap.ac_inv_id = iv.id) As pmt,
		IF(isnull(@invd), 0, @invd) As total,
		IF(isnull(@apmt), 0, @apmt) As paid_format,
		(select (total - paid_format)) as owing
	FROM ".TB_PREFIX."invoices iv, ".TB_PREFIX."biller b, ".TB_PREFIX."customers c, ".TB_PREFIX."preferences pf
	WHERE iv.customer_id = c.id AND iv.biller_id = b.id AND iv.preference_id = pf.pref_id $limit
	GROUP BY iv.id 
	ORDER BY iv.id DESC";
} else {
	//$search_sql =" AND ";
	if (!empty($_GET['invoice_id'])) {
		$invoice_id = $_GET['invoice_id'];
		$search_sql .= " AND iv.id = $invoice_id ";
	}
	if (!empty($_GET['student_id'])) {
		$student_id = $_GET['student_id'];
		$search_sql .= " AND c.id = $student_id ";
	}
	if (!empty($_GET['biller_id'])) {
		$biller_id = $_GET['biller_id'];
		$search_sql .= " AND b.id = $biller_id ";
	}

	$sql = "SELECT	iv.id, b.name As biller, c.name As customer, c.first_name as customer_first_name, c.middle_name as customer_middle_name, 
		(CASE	WHEN datediff(now(),iv.date) <= 14 THEN '0-14' 
				WHEN datediff(now(),iv.date) <= 30 THEN '15-30'
				WHEN datediff(now(),iv.date) <= 60 THEN '31-60'
				WHEN datediff(now(),iv.date) <= 60 THEN '61-90'
				ELSE '90+' END ) as overdue,
		iv.type_id,
		pf.pref_inv_wording,
		iv.date,
		@invd:=(SELECT sum( IF(isnull(ivt.total), 0, ivt.total)) 
			FROM ".TB_PREFIX."invoice_items ivt where ivt.invoice_id = iv.id) As invd,
		@apmt:=(SELECT sum( IF(isnull(ap.ac_amount), 0, ap.ac_amount)) 
			FROM ".TB_PREFIX."account_payments ap where ap.ac_inv_id = iv.id) As pmt,
		IF(isnull(@invd), 0, @invd) As total,
		IF(isnull(@apmt), 0, @apmt) As paid_format,
		(select (total - paid_format)) as owing
	FROM ".TB_PREFIX."invoices iv, ".TB_PREFIX."biller b, ".TB_PREFIX."customers c, ".TB_PREFIX."preferences pf
	WHERE iv.customer_id = c.id AND iv.biller_id = b.id AND iv.preference_id = pf.pref_id $search_sql $limit
	GROUP BY iv.id 
	ORDER BY iv.id DESC";

}


// $result = mysqlQuery($sql) or die(mysql_error());

$invoices = sql2array($sql);
$defaults = getSystemDefaults();

$numrecs = count($invoices);

for($i = 0; $i < $numrecs; $i++) {
	
// why is this done?
	$invoices[$i]['defaults'] = $defaults;

	$url_for_pdf = "./pdfmaker.php?id=" . $invoices[$i]['id'];

	$invoices[$i]['url_for_pdf'] = $url_for_pdf;

}

$pageActive = "invoices";

$smarty -> assign("invoices",$invoices);
$smarty -> assign("spreadsheet",$spreadsheet);
$smarty -> assign("word_processor",$word_processor);
$smarty -> assign('pageActive', $pageActive);

getRicoLiveGrid("ex1","	{ type:'number', decPlaces:0, ClassName:'alignleft' },,,
	{ type:'number', decPlaces:2, ClassName:'alignleft' },
	{ type:'number', decPlaces:2, ClassName:'alignleft' }");

?>
