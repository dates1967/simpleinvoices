<?php
# Rico livegrid settings
require_once("./modules/include/js/lgplus/php/settings.php");
# jQPie (Ajax) class
require_once('./include/jqpie-0.3/php/jQPie.php');
# js functions: para validar formularios
include_once("./include/validation.php");

include('./include/include_auth.php');
include_once('./config/config.php');

# Section PEAR::MDB2 setup
	require_once 'MDB2.php';
	function handle_pear_error ($error_obj){
		print '<pre><b>PEAR-Error</b><br />';
		echo $error_obj->getMessage().': '.$error_obj->getUserinfo();
		print '</pre>';
	}
	PEAR::setErrorHandling(PEAR_ERROR_CALLBACK, 'handle_pear_error');
	$dsn = "$db_type://$db_user:$db_pass@$db_host/$db_name";
	$mdb2 =& MDB2::factory($dsn);
	#$mdb2 =& MDB2::singleton($dsn);
	if (PEAR::isError($mdb2)) { die (__LINE__.$mdb2->getMessage());}
	$mdb2->setFetchMode(MDB2_FETCHMODE_ASSOC);
# End Section PEAR::MDB2 setup

# Include the new database query functions:
require_once('./include/db/db_functions.php');

# $LANG constants
ob_start();
include_once("./lang/$language.inc.php");
ob_end_clean();

#include_once('./include/functions.php');
?>
