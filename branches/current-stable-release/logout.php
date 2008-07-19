<?php


/*
* Script: logout.php
* 	Unset the session - ie log the user out
*
* Authors:
*	 Justin Kelly, Nicolas Ruflin
*
* Last edited:
* 	 2007-07-18
*
* License:
*	 GPL v2 or above
*/

// i will keep yelling this
// DON'T FORGET TO START THE SESSION !!!

Zend_Session::start();

	Zend_Session::destroy(true);
	header('Location: login.php');

// now that the user is logged out,
// go to login page
header('Location: login.php');
?> 
