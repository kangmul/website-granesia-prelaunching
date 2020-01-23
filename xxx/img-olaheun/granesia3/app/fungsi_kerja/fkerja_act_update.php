<?php
//include ('db.php');

if(isset($_POST['fkerja'])){
	$fungsi_kerja = '';
	$id_fkerja = $_POST['id_fkerja'];
	$fkerja = $_POST['fkerja'];
	
	$query1 = "SELECT * FROM fungsi_kerja WHERE id_fkerja='".$id_fkerja ."'";
	$query2 = "UPDATE fungsi_kerja SET fkerja='$fkerja' WHERE id_fkerja='$id_fkerja'";

	$result1 = mysql_query($query1) or die(mysql_error());
	$result2 = mysql_query($query2) or die(mysql_error());
	
	//Ambil data sebelum update
	while($rows=mysql_fetch_array($result1)){
		$fungsi_kerja = $rows['fkerja'];
	}
	
	//Catat aktivitas User
		$ket = "update data";
		$data_awal = "<p>: ".$fungsi_kerja."</p>";
		$data_akhir = "<p>: ".$fkerja."</p>";
		$modul = "fungsi kerja";
		simpan_history($_SESSION['nama'],$modul,$data_awal,$data_akhir,$_SERVER['HTTP_REFERER'],$ket);

	mysql_close();

	if ($result2) {

	$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil dirubah</b> </b></div></p>';

		
	}
}
$st = '1';
include('fkerja_form_view.php');

?>