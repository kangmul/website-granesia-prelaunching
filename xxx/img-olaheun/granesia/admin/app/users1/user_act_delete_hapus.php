<?php
include ('db.php');

$uid = isset($_GET['uid']) ? $_GET['uid'] : null;
//$no = $_GET['no'];

$query = "DELETE FROM user WHERE uid='".$uid."'";
$result = mysql_query($query) or die(mysql_error());

	mysql_close();
	if($uid !=''){
	$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil dihapus</b> </b></div></p>';
	}
	$st = '1';
	include ('view_user.php');
?>