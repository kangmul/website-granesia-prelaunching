<?php
//include ('db.php');

$no = $_POST['no'];
$role_id = $_POST['role_id'];
	
$query = "UPDATE user SET role_id='$role_id' WHERE no='$no'";
$result = mysql_query($query) or die(mysql_error());
mysql_close();
if ($result > 0){

	$_SESSION['pesan'] = '<p><div class="alert alert-success">Data <b>Data User Berhasil Diperbaharui</b> </b></div></p>';
		$st = '1';
		include('user_form_view.php');
	} else {
	include('user_form_view.php');
	}
?>