<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

$SI_PRODUCTS = new SimpleInvoices_Db_Table_Products();
$number_of_rows = $SI_PRODUCTS->getCount();

$smarty -> assign("number_of_rows",$number_of_rows);

$pageActive = "products";
$smarty->assign('pageActive', $pageActive);

$page = empty($_GET['page'])? "1" :$_GET['page'] ;
$page_prev = ($page =="1") ? "1" : $page-1 ;
$page_next =  $page+1 ;
//$xml_file = './extensions/text_ui/modules/invoices/xml.php';
$url=getURL();
$xml_file = $url.'/index.php?module=products&view=xml&page='.$page;
$xml = simplexml_load_file($xml_file);

$smarty -> assign('xml', $xml);
$smarty -> assign('page', $page);
$smarty -> assign('page_prev', $page_prev);
$smarty -> assign('page_next', $page_next);

?>
