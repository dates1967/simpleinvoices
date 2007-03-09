<?php 
include("./include/include_main.php"); 

//stop the direct browsing to this file - let index.php handle which files get displayed
if (!defined("BROWSE")) {
   echo "You Cannot Access This Script Directly, Have a Nice Day.";
   exit();
}

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="text/javascript" src="./src/include/js/ibox.js"></script>
<link rel="stylesheet" href="./src/include/css/ibox.css" type="text/css"  media="screen"/>

</head>
<body>
<b>Debtors - Amount owing per Customer</b>
<hr></hr>
<div id="container">

<?php
   // include the PHPReports classes on the PHP path! configure your path here
   include "src/reports/PHPReportMaker.php";
   include "config/config.php";

   $sSQL = "

SELECT
        si_customers.c_id as ID,
        si_customers.c_name as Customer,
        (select sum(inv_it_total) from si_invoice_items,si_invoices where  si_invoice_items.inv_it_invoice_id = si_invoices.inv_id and si_invoices.inv_customer_id = ID) as Total,
        (select IF ( isnull(sum(ac_amount)), '0', sum(ac_amount)) from si_account_payments,si_invoices where si_account_payments.ac_inv_id = si_invoices.inv_id and si_invoices.inv_customer_id = ID) as Paid,
        (select (Total - Paid)) as Owing

FROM
        si_customers,si_invoices,si_invoice_items
WHERE
        si_invoice_items.inv_it_invoice_id = si_invoices.inv_id and si_invoices.inv_customer_id = c_id
GROUP BY
        Owing DESC;


   ";	
   $oRpt = new PHPReportMaker();

   $oRpt->setXML("src/reports/xml/report_debtors_owing_by_customer.xml");
   $oRpt->setUser("$db_user");
   $oRpt->setPassword("$db_password");
   $oRpt->setConnection("$db_host");
   $oRpt->setDatabaseInterface("mysql");
   $oRpt->setSQL($sSQL);
   $oRpt->setDatabase("$db_name");
   $oRpt->run();
?>
	

</div>
<div id="footer"></div>
<hr></hr>
<a href="./documentation/info_pages/reports_xsl.html" rel="ibox&height=400"><font color="red">Did you get an "OOOOPS, THERE'S AN ERROR HERE." error?</font></a>
