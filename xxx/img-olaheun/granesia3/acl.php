<?php
include 'config.php';

function check_user($file,$action,$user_id,$role_id){
	$sql = "SELECT 
					COUNT(*) as count 
			FROM 
					acl_to_roles,
					roles,
					acl,
					user
			WHERE
					acl_to_roles.acl_id = acl.id AND
					acl_to_roles.role_id = roles.id AND
					roles.id = user.role_id AND
					user.no = '$user_id' AND
					user.role_id = '$role_id' AND
					acl.file = '$file' AND
					acl.action = '$action'";
	
	
	$result = mysql_query($sql) or die (mysql_error());
	while($rows=mysql_fetch_array($result))
		$jmldata = $rows['count'];

	if($jmldata > 0)
		return TRUE;
	else
		return FALSE;
}

?>