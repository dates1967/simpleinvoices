<?php
if(!defined('SIX_ROOT')) {
	define('SIX_ROOT', dirname(__FILE__));
};
if(!defined('SIX_LIB_DIR')) {
	define('SIX_LIB_DIR', SIX_ROOT . '/lib');
};

require_once('./auth/auth.php');

$test = new Authentication();
$test->login("german", "2921");
if($test->checkLogged())
	echo "Logged: " . $test->getUser() ."<br />";
?>
