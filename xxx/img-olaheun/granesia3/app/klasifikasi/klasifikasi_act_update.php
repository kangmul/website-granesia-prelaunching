<?php

//include ('db.php');

if(isset($_POST['klasifikasi'])){
	isset($_POST['id_klasifikasi']) ? $id_klasifikasi = $_POST['id_klasifikasi'] : $id_klasifikasi = '';
	
	$klasifikasi= $_POST['klasifikasi'];
	
	$query1 = "SELECT * FROM klasifikasi WHERE id_klasifikasi='".$id_klasifikasi."'";
	$query2 = "UPDATE klasifikasi SET klasifikasi='".$klasifikasi."' WHERE id_klasifikasi='".$id_klasifikasi."'";

	$result1 = mysql_query($query1) or die(mysql_error());
	$result2 = mysql_query($query2) or die(mysql_error());
	
	//Ambil data sebelum update
	$rows=mysql_fetch_array($result1);
	$klasifikasi_awal = $rows['klasifikasi'];
	//Catat aktivitas User
		$ket = "update data";
		$data_awal = "<p>: ".$klasifikasi_awal."</p>";
		$data_akhir = "<p>: ".$klasifikasi."</p>";
		$modul = "klasifikasi";
		simpan_history($_SESSION['nama'],$modul,$data_awal,$data_akhir,$_SERVER['HTTP_REFERER'],$ket);

	mysql_close();
	if ($result2) {
		$_SESSION['pesan'] = '<p><div class="alert alert-success">Data Berhasil Di Rubah</b> </b></div></p>';
	$st='1';
	include ('klasifikasi_data_view.php');
	}
}
?>