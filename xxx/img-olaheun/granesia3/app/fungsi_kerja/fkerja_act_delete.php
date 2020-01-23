<?php
//include ('db.php');
isset($_GET['id_fkerja']) ? $id_fkerja = $_GET['id_fkerja'] : $id_fkerja ='';

$query1 = "SELECT * FROM fungsi_kerja WHERE id_fkerja='$id_fkerja'";
$query2 = "DELETE FROM fungsi_kerja WHERE id_fkerja='$id_fkerja'";

$result1 = mysql_query($query1) or die(mysql_error());
$result2 = mysql_query($query2) or die(mysql_error());

//Ambil data sebelum update
	$rows=mysql_fetch_array($result1);
	$fkerja = $rows['fkerja'];
	//Catat aktivitas User
		$ket = "update data";
		$data_awal = "<p>: ".$fkerja."</p>";
		$data_akhir = " ";
		$modul = "Fungsi Kerja";
		simpan_history($_SESSION['nama'],$modul,$data_awal,$data_akhir,$_SERVER['HTTP_REFERER'],$ket);

mysql_close();
if($id_fkerja != ''){
	$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil dihapus</b> </b></div></p>';
}
$st = '';
include('fkerja_form_view.php');


?>