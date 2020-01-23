<?php
//include ('db.php');

if(isset($_POST['lokasi'])){
	isset($_POST['id_lks_kerja']) ? $id_lks_kerja = $_POST['id_lks_kerja'] : $id_lks_kerja = '';
	
	$lokasi= $_POST['lokasi'];
	
	$query1 = "SELECT * FROM lokasi_kerja WHERE id_lks_kerja='".$id_lks_kerja."'";
	$query2 = "UPDATE lokasi_kerja SET lokasi='".$lokasi."' WHERE id_lks_kerja='".$id_lks_kerja."'";

	$result1 = mysql_query($query1) or die(mysql_error());
	$result2 = mysql_query($query2) or die(mysql_error());

	//Ambil data sebelum update
	$rows=mysql_fetch_array($result1);
	$lokasi_awal = $rows['lokasi'];
	//Catat aktivitas User
		$ket = "update data";
		$data_awal = "<p>: ".$lokasi_awal."</p>";
		$data_akhir = "<p>: ".$lokasi."</p>";
		$modul = "lokasi_kerja";
		simpan_history($_SESSION['nama'],$modul,$data_awal,$data_akhir,$_SERVER['HTTP_REFERER'],$ket);

	mysql_close();
	if ($result2) {
		$_SESSION['pesan'] = '<p><div class="alert alert-success">Data Berhasil Di Rubah</b> </b></div></p>';
	$st='1';
	include ('lokasi_kerja_data_view.php');
	}
}
?>