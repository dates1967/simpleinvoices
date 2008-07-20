<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

# Deal with op and add some basic sanity checking

$op = !empty( $_POST['op'] ) ? addslashes( $_POST['op'] ) : NULL;


#insert product
$saved = false;

if (  $op === 'insert_user' ) {
	
	function insertUser() {
		
		$sql = "INSERT INTO ".TB_PREFIX."customers
					(
						id,
						username,
						password,
						person_type,
						user_group,
						place_of_registration
					)
					VALUES 
					(
						null,
						'$_POST[username]',
						MD5('$_POST[password_field]'),
						'$_POST[person_type]',
						'$_POST[user_group]',
						'$_POST[user_branch]'
					)
				";
		
		return mysqlQuery($sql);
		
	}
	if( insertUser() ) {
 		$saved = true;
 	}
}

if ($op === 'edit_user' ) {

	function editUser() {
		
	empty($_POST[password_field]) ? $password = "" :  $password = "password = MD5('".$_POST[password_field]."'),"  ;

		$sql = "UPDATE ".TB_PREFIX."customers
					SET
						username
						=
						'$_POST[username]',
						$password
						person_type
						=
						'$_POST[person_type]',
						user_group
						=
						'$_POST[user_group]',
						place_of_registration
						=
						'$_POST[user_branch]'
					WHERE
						id
						=
						'$_GET[id]'
						
				";
		
		return mysqlQuery($sql);
		
	}
	if( editUser() ) {
 		$saved = true;
 	}
}


$refresh_total = isset($refresh_total) ? $refresh_total : '&nbsp';


$pageActive = "options";
$smarty->assign('pageActive', $pageActive);
$smarty->assign('saved',$saved);
//$smarty -> assign('display_block',$display_block); 
//$smarty -> assign('refresh_total',$refresh_total); 

?>
