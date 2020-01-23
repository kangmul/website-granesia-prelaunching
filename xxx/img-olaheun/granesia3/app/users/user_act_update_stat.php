<?php
//include ('db.php');

$no = $_GET['no'];
$status_sekarang = $_GET['stat'];

if($status_sekarang == 'aktif')
	$status_baru = 'nonaktif';
if($status_sekarang == 'nonaktif')
	$status_baru = 'aktif';
	
$query = "UPDATE user SET status='$status_baru' WHERE no='$no'";
$result = mysql_query($query) or die(mysql_error());

$query = "SELECT * FROM user WHERE no='$no'";

$status_user ='';
$result = mysql_query($query) or die(mysql_error());
while($rows=mysql_fetch_array($result)){
	$status_user = $rows['status'];
}
mysql_close();

if ($status_user == 'aktif'){
		$_SESSION['pesan'] = '<p><div class="alert alert-success"><b>Data User berhasil diaktifkan</b> </b></div></p>';
		$st = '1';
		include('user_form_view.php');
	} else if ($status_user == 'nonaktif'){
		$_SESSION['pesan'] = '<p><div class="alert alert-success"><b>Data User berhasil dinonaktifkan</b> </b></div></p>';
		$st = '1';
		include('user_form_view.php');
	}
?>