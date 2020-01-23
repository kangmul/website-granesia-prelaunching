<?php
//include ('db.php');

$no = $_POST['no'];

$password = md5($_POST['password_baru']); 


$query = "UPDATE user set password = '".$password."'
	WHERE user.no ='".$no."'";
		
$result = mysql_query($query) or die(mysql_error());
mysql_close();
if ($result > 0) {
$_SESSION['pesan'] = '<p><div class="alert alert-success">Data <b>Berhasil Di Update</b> </b></div></p>';
	$st = '1';
	include('user_form_view.php');
} else {
	$st = '1';
	include('user_form_view.php');
}
?>