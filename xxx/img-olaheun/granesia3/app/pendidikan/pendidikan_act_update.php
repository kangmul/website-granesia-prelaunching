<?php
//include ('db.php');

if(isset($_POST['pend_akhir'])){
	isset($_POST['id_pendidikan']) ? $id_pendidikan = $_POST['id_pendidikan'] : $id_pendidikan = '';
	
	$pend_akhir= $_POST['pend_akhir'];
	
	//$query1 = "SELECT * FROM lokasi_kerja WHERE id_pendidikan='".$id_pendidikan."'";
	$query2 = "UPDATE tb_pend_akhir SET pend_akhir='".$pend_akhir."' WHERE id_pendidikan='".$id_pendidikan."'";

	//$result1 = mysql_query($query1) or die(mysql_error());
	$result2 = mysql_query($query2) or die(mysql_error());

	//Ambil data sebelum update
	//$rows=mysql_fetch_array($result1);
	//$lokasi_awal = $rows['lokasi'];
	//Catat aktivitas User
		//$ket = "update data";
		//$data_awal = "<p>: ".$lokasi_awal."</p>";
		//$data_akhir = "<p>: ".$lokasi."</p>";
		//$modul = "lokasi_kerja";
		//simpan_history($_SESSION['nama'],$modul,$data_awal,$data_akhir,$_SERVER['HTTP_REFERER'],$ket);

	mysql_close();
	if ($result2) {
		$_SESSION['pesan'] = '<p><div class="alert alert-success">Data Berhasil Di Rubah</b> </b></div></p>';
	$st='1';
	include ('pendidikan_akhir_data_view.php');
	}
}
?>