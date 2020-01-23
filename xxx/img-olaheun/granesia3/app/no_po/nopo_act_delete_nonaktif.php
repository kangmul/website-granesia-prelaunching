<?php
include ('db.php');

$id_no_po = isset($_GET['id_no_po']) ? $_GET['id_no_po'] : null;

$query1 = "SELECT * FROM no_po WHERE status_nopo = 'aktif' AND no_po.id_no_po='$id_no_po'";
$query2 = "UPDATE test.no_po SET status_nopo = 'nonaktif' WHERE no_po.id_no_po='$id_no_po'";
$query3 = "UPDATE tkjp SET status = 'tidak aktif' WHERE id_no_po='$id_no_po'";


$result1 = mysql_query($query1) or die(mysql_error());
$result2 = mysql_query($query2) or die(mysql_error());
$result3 = mysql_query($query3) or die(mysql_error());

//Ambil data sebelum update
	$no_po = '';
	while($rows=mysql_fetch_array($result1)){
		$no_po = $rows['no_po'];
	}

///Catat aktivitas User
		$ket = "Ganti Status NO PO";
		$data_awal = "";
		$data_akhir = "NO PO : ".$no_po;
		$modul = "NO PO";
		simpan_history($_SESSION['nama'],$modul,$data_awal,$data_akhir,$_SERVER['HTTP_REFERER'],$ket);

mysql_close();

$_SESSION['pesan'] = '<p><div class="alert alert-success"><b>Data No PO Berhasil Dihapus</b> </b></div></p>';
		$st = '1';
		include('nopo_data_view.php');

?>