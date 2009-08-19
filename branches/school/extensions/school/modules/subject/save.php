<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

# Deal with op and add some basic sanity checking

$op = !empty( $_POST['op'] ) ? addslashes( $_POST['op'] ) : NULL;


#insert product
$saved = false;

if (  $op === 'insert_subject' ) {
	
	function insertSubject() {
		
		$sql = "INSERT INTO ".TB_PREFIX."subject
					(
						name
					)
					VALUES 
					(
						'$_POST[name]'
					)
				";
		
		return mysqlQuery($sql);
		
	}
	if( insertSubject() ) {
 		$saved = true;
 	}
}

if ($op === 'edit_subject' ) {

	function editSubject() {
		
		$sql = "UPDATE ".TB_PREFIX."subject
					SET
						name
						=
						'$_POST[name]'
					WHERE
						id
						=
						'$_GET[id]'
						
				";
		
		return mysqlQuery($sql);
		
	}
	if( editSubject() ) {
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
