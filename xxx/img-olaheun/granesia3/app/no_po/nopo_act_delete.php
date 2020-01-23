<?php
//include ('db.php');

$id_no_po = $_GET['id_no_po'];

$query1 = "SELECT * FROM no_po WHERE id_no_po='".$id_no_po."'";
$query2 = "DELETE FROM no_po WHERE id_no_po='".$id_no_po."'";

$result1 = mysql_query($query1) or die(mysql_error());
$result2 = mysql_query($query2) or die(mysql_error());

//Ambil data sebelum update
	$rows=mysql_fetch_array($result1);
	$no_po = $rows['no_po'];
	//Catat aktivitas User
		$ket = "delete data";
		$data_awal = "<p>: ".$no_po."</p>";
		$data_akhir = " ";
		$modul = "No PO";
		simpan_history($_SESSION['nama'],$modul,$data_awal,$data_akhir,$_SERVER['HTTP_REFERER'],$ket);

mysql_close();

if($id_no_po !=''){
	$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil dihapus</b> </b></div></p>';
}

$st = '1';
include ('nopo_data_view.php');


?>