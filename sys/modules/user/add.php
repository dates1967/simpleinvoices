<?php

/*
* Script: add.php
* 	Billers add page
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

checkLogin();

//get user roles
$roles = user::getUserRoles();

if (isset($_POST['email'])) {
    if ($_POST['email'] != "") {
	    require_once ($include_dir . "sys/modules/user/save.php");
    }
}

if (isset($save)) {
    $smarty->assign('save', $save);    
} else {
    $smarty->assign('save', '');    
}

$smarty->assign('roles', $roles);

$smarty -> assign('pageActive', 'user');
$smarty -> assign('subPageActive', 'user_add');
$smarty -> assign('active_tab', '#people');
