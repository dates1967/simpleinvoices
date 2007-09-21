<?php

require_once("./modules/include/js/lgplus/php/chklang.php");
require_once("./modules/include/js/lgplus/php/settings.php");
require_once('./include/jqpie-0.3/php/jQPie.php');
include('./include/include_auth.php');
include_once('./config/config.php');

// # Section PEAR::MDB2 setup
// 	require_once 'MDB2.php';
// 	function handle_pear_error ($error_obj){
// 		print '<pre><b>PEAR-Error</b><br />';
// 		echo $error_obj->getMessage().': '.$error_obj->getUserinfo();
// 		print '</pre>';
// 	}
// 	PEAR::setErrorHandling(PEAR_ERROR_CALLBACK, 'handle_pear_error');
// 	$dsn = "$db_type://$db_user:$db_pass@$db_host/$db_name";
// 	$mdb2 =& MDB2::factory($dsn);
// 	#$mdb2 =& MDB2::singleton($dsn);
// 	if (PEAR::isError($mdb2)) { die (__LINE__.$mdb2->getMessage());}
// 	$mdb2->setFetchMode(MDB2_FETCHMODE_ASSOC);
// # End Section PEAR::MDB2 setup
//
// # Include the new database query functions:
// require_once('./include/db/db_functions.php');

ob_start();
include_once("./lang/$language.inc.php");
ob_end_clean();

$conn = mysql_connect("$db_host","$db_user","$db_password");
if (!$conn) {
	die('<br>
		===========================================<br>
		Simple Invoices database connection problem<br>
		===========================================<br>
		Could not connect to the Simple Invoices database<br><br>
		Please refer to the following Mysql error for for to fix this: <b>ERROR :' . mysql_error() . '</b><br><br>
		If this is an Access denied error please make sure that the db_host, db_name, db_user, and db_password in config/config.php are correct
		<br>
		===========================================<br>
		');
}

$test_db_selection = mysql_select_db("$db_name",$conn);

if (!$test_db_selection) {
	die('<br>
		===========================================<br>
		Simple Invoices database selection problem<br>
		===========================================<br>
		Could not connect to the Simple Invoices database<br><br>
		Please make sure that the database name($db_name) in config/config.php is correct
		<br>
		===========================================<br>
		');
}
mysql_select_db("$db_name",$conn);


include_once('./include/functions.php');

include_once("./include/validation.php");

if($query_files = dir_files(SIX_QUERY_DIR)){
	foreach($query_files as $file){
		include_once("$file");
	}
}

?>
