<?php
//include ('db.php');

$index = $_GET['index'];

	
$query = "UPDATE tkjp SET status = 'aktif' WHERE tkjp.index='$index'";
$result = mysql_query($query) or die(mysql_error());

//$query = "SELECT * FROM tkjp WHERE index='$index'";

$status ='';
//$result = mysql_query($query) or die(mysql_error());
while($rows=mysql_fetch_array($result)){
	$status = $rows['status'];
}
mysql_close();


		$_SESSION['pesan'] = '<p><div class="alert alert-success"><b>Data Pekerja Berhasil Diaktifkan Kembali</b> </b></div></p>';
		$st = '1';
		include('karyawan_history_data_view.php');
	
	
?>