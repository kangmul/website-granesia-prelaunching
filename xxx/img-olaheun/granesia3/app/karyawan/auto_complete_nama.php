<?php
 $mysql_server = 'localhost';
$mysql_login = 'root';
$mysql_password = '';
$mysql_database = 'test';

mysql_connect($mysql_server, $mysql_login, $mysql_password);
mysql_select_db($mysql_database);

$req = "SELECT tkjp.nm_lengkap,tkjp.index "
	."FROM tkjp "
	."WHERE tkjp.nm_lengkap LIKE '".$_REQUEST['term']."%' "; 

$query = mysql_query($req);

while($row = mysql_fetch_array($query))
{
	$results[] = array('label' => $row['nm_lengkap']);
}

echo json_encode($results);

?>