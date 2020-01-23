<?php
 $mysql_server = 'localhost';
$mysql_login = 'root';
$mysql_password = '';
$mysql_database = 'test';

mysql_connect($mysql_server, $mysql_login, $mysql_password);
mysql_select_db($mysql_database);

$req = "SELECT tkjp.no_ktp "
	."FROM tkjp "
	."WHERE tkjp.no_ktp LIKE '".$_REQUEST['term']."%' || tkjp.no_jamsostek LIKE '".$_REQUEST['term']."%' "; 

$query = mysql_query($req);

while($row = mysql_fetch_array($query))
{
	$results[] = array('label' => $row['no_ktp']);
}

echo json_encode($results);

?>