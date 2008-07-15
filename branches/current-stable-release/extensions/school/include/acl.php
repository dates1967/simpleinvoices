<?php


$acl = new Zend_Acl();

$acl->addRole(new Zend_Acl_Role('student'));
$acl->addRole(new Zend_Acl_Role('branch_administrator'));
$acl->addRole(new Zend_Acl_Role('administrator'));

$acl->add(new Zend_Acl_Resource('customers'));

/* alternatively, the above could be written:
$acl->allow('guest', null, 'view');
//*/

// Staff inherits view privilege from guest, but also needs additional privileges
//$acl->allow('student', null, array('customers'));
//$acl->deny('student');

$acl->allow('student', 'customers', 'view');

// Editor inherits view, edit, submit, and revise privileges from staff,
// but also needs additional privileges
$acl->allow('branch_administrator');

// Administrator inherits nothing, but is allowed all privileges
$acl->allow('administrator');
?>
