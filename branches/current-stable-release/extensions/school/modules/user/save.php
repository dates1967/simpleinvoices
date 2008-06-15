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
						person_type
					)
					VALUES 
					(
						null,
						'$_POST[username]',
						'$_POST[password]',
						'$_POST[person_type]'
					)
				";
		
		return mysqlQuery($sql);
		
	}
	if( insertUsert() ) {
 		$saved = true;
 	}
}

if ($op === 'edit_user' ) {

	function editUser() {
		
		$sql = "UPDATE ".TB_PREFIX."customers
					SET
						username
						=
						'$_POST[username]',
						password
						=
						'$_POST[password]',
						person_type
						=
						'$_POST[person_type]'
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
