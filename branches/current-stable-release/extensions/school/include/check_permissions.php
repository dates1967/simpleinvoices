<?php

$auth_session = new Zend_Session_Namespace('Zend_Auth');

//print_r($_SESSION);

$checkPermission = $acl->isAllowed($auth_session->role_name, $module, $_GET['action']) ?  "allowed" : "denied"; // allowed

//student page check 
if( ($auth_session->role_name =='student') AND ($module == 'customers') AND ($_GET['id'] != $auth_session->user_id) )
{
	$checkPermission = "denied";
}

//certificate page check - only admin allows to add and edit
if( ($auth_session->role_name !='administrator') AND ($module == 'certificate') AND (($view == 'add') OR ($_GET['action'] =="edit"))  )
{
	$checkPermission = "denied";
}
//echo $module." :: ".$_GET['action'];
$checkPermission == "denied" ? exit($LANG['denied_page']) :"" ;
?>
