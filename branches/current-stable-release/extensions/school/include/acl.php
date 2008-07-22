<?php


$acl = new Zend_Acl();

$acl->addRole(new Zend_Acl_Role('student'));
$acl->addRole(new Zend_Acl_Role('branch_administrator'));
$acl->addRole(new Zend_Acl_Role('administrator'));
$acl->addRole(new Zend_Acl_Role('teacher'));

$acl->add(new Zend_Acl_Resource('auth'));
$acl->add(new Zend_Acl_Resource('customers'));
$acl->add(new Zend_Acl_Resource('invoices'));
$acl->add(new Zend_Acl_Resource('course'));
$acl->add(new Zend_Acl_Resource('billers'));
$acl->add(new Zend_Acl_Resource('products'));
$acl->add(new Zend_Acl_Resource('enrollment'));
$acl->add(new Zend_Acl_Resource('payments'));
$acl->add(new Zend_Acl_Resource('reports'));
$acl->add(new Zend_Acl_Resource('teacher'));
$acl->add(new Zend_Acl_Resource('certificate'));
$acl->add(new Zend_Acl_Resource('todo'));
$acl->add(new Zend_Acl_Resource('system_defaults'));
$acl->add(new Zend_Acl_Resource('custom_fields'));
$acl->add(new Zend_Acl_Resource('subject'));
$acl->add(new Zend_Acl_Resource('user'));
$acl->add(new Zend_Acl_Resource('tax_rates'));
$acl->add(new Zend_Acl_Resource('preferences'));
$acl->add(new Zend_Acl_Resource('payment_types'));
$acl->add(new Zend_Acl_Resource('branch'));

/* alternatively, the above could be written:
$acl->allow('guest', null, 'view');
//*/

// Staff inherits view privilege from guest, but also needs additional privileges
//$acl->allow('student', null, array('customers'));
//$acl->deny('student');

// everyone see auth page
$acl->allow(null,'auth');

//students only see student page
$acl->allow('student', 'customers', 'view');

// Editor inherits view, edit, submit, and revise privileges from staff,
// but also needs additional privileges
$acl->allow('branch_administrator');

// Administrator inherits nothing, but is allowed all privileges
$acl->allow('administrator');
?>
