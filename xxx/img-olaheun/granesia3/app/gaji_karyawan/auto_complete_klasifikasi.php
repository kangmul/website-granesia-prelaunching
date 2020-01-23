<?php
 $mysql_server = 'localhost';
$mysql_login = 'root';
$mysql_password = '';
$mysql_database = 'test';

mysql_connect($mysql_server, $mysql_login, $mysql_password);
mysql_select_db($mysql_database);

$req = "SELECT klasifikasi.id_klasifikasi,klasifikasi.klasifikasi "
	."FROM klasifikasi "
	."WHERE klasifikasi.klasifikasi LIKE '".$_REQUEST['term']."%' "; 

$query = mysql_query($req);

while($row = mysql_fetch_array($query))
{
	$results[] = array('label' => $row['klasifikasi'],'value' => $row['id_klasifikasi']);
}

echo json_encode($results);

?>