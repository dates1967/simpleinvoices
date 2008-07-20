<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

# Deal with op and add some basic sanity checking

$op = !empty( $_POST['op'] ) ? addslashes( $_POST['op'] ) : NULL;


#insert product
$saved = false;

if (  $op === 'insert_todo' ) {
	
	function insertSubject() {

	global $auth_session;
		
		$sql = "INSERT INTO ".TB_PREFIX."todo
					(
						person_id,
						date,
						description,
						note
					)
					VALUES 
					(
						'$auth_session->user_id',
						'$_POST[date_year]-$_POST[date_month]-$_POST[date_day]',
						'$_POST[description]',
						'$_POST[note]'
					)
				";
		
		return mysqlQuery($sql);
		
	}
	if( insertSubject() ) {
 		$saved = true;
 	}
}

if ($op === 'edit_todo' ) {

	function editSubject() {
		
	global $auth_session;
		$sql = "UPDATE ".TB_PREFIX."todo
					SET
						person_id = '$auth_session->user_id',
						date = '$_POST[date_year]-$_POST[date_month]-$_POST[date_day]',
						description = '$_POST[description]',
						note = '$_POST[note]'
					WHERE
						id = '$_GET[id]'
						
				";
		
		return mysqlQuery($sql);
		
	}
	if( editSubject() ) {
 		$saved = true;
 	}
}


$refresh_total = isset($refresh_total) ? $refresh_total : '&nbsp';


$pageActive = "todo";
$smarty->assign('pageActive', $pageActive);
$smarty->assign('saved',$saved);
//$smarty -> assign('display_block',$display_block); 
//$smarty -> assign('refresh_total',$refresh_total); 

?>
