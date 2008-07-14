<?php


$acl = new Zend_Acl();

$acl->addRole(new Zend_Acl_Role('student'));
$acl->addRole(new Zend_Acl_Role('branch_administrator'));
$acl->addRole(new Zend_Acl_Role('administrator'));

// Guest may only view content
$acl->allow($roleGuest, null, 'view');

/* alternatively, the above could be written:
$acl->allow('guest', null, 'view');
//*/

// Staff inherits view privilege from guest, but also needs additional privileges
$acl->allow('student', null, array('customers'));

// Editor inherits view, edit, submit, and revise privileges from staff,
// but also needs additional privileges
$acl->allow('branch_administrator');

// Administrator inherits nothing, but is allowed all privileges
$acl->allow('administrator');
?>
