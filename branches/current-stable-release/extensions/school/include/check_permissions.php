<?php

$auth_session = new Zend_Session_Namespace('Zend_Auth');

//print_r($_SESSION);

$checkPermission = $acl->isAllowed($auth_session->role_name, $module, $_GET['action']) ?  "allowed" : "denied"; // allowed
//echo $module." :: ".$_GET['action'];
$checkPermission == "denied" ? exit($LANG['denied_page']) :"" ;
?>
