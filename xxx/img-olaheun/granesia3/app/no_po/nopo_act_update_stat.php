<?php
//include ('db.php');

$id_no_po = $_GET['id_no_po'];
$status_sekarang = $_GET['stat'];

	
$query = "UPDATE no_po SET status_nopo='aktif' WHERE no_po.id_no_po='$id_no_po'";
$query2 = "UPDATE tkjp SET status = 'aktif' WHERE id_no_po='$id_no_po'" ;


$result = mysql_query($query) or die(mysql_error());
$result2 = mysql_query($query2) or die(mysql_error());

mysql_close();

$_SESSION['pesan'] = '<p><div class="alert alert-success"><b>Data No PO Berhasil Diaktifkan</b> </b></div></p>';
		$st = '1';
		include('nopo_data_view.php');

?>