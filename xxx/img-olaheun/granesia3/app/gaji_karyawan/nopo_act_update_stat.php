<?php
//include ('db.php');

$id_no_po = $_GET['id_no_po'];

	
$query = "UPDATE no_po SET status_nopo = 'aktif' WHERE no_po.id_no_po='$id_no_po'";
$result = mysql_query($query) or die(mysql_error());

//$query = "SELECT * FROM tkjp WHERE index='$index'";

$status_nopo ='';
//$result = mysql_query($query) or die(mysql_error());
while($rows=mysql_fetch_array($result)){
	$status_nopo = $rows['status_nopo'];
}
mysql_close();


		$_SESSION['pesan'] = '<p><div class="alert alert-success"><b>Data No PO Berhasil Diaktifkan Kembali</b> </b></div></p>';
		$st = '1';
		include('nopo_history_data_view.php');
	
	
?>