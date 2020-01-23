<?php

//include ('db.php');

if(isset($_POST['waktu'])){

isset($_POST['id']) ? $id = $_POST['id'] : $id = '';
	
	$waktu= $_POST['waktu'];
	
	$query1 = "SELECT * FROM sistem_kerja WHERE id='".$id."'";
	$query2 = "UPDATE sistem_kerja SET waktu='".$waktu."' WHERE id='".$id."'";

	$result1 = mysql_query($query1) or die(mysql_error());
	$result2 = mysql_query($query2) or die(mysql_error());

	//Ambil data sebelum update
	$rows=mysql_fetch_array($result1);
	$waktu_awal = $rows['waktu'];
	//Catat aktivitas User
		$ket = "update data";
		$data_awal = "<p>: ".$waktu_awal."</p>";
		$data_akhir = "<p>: ".$waktu."</p>";
		$modul = "sistem_kerja";
		simpan_history($_SESSION['nama'],$modul,$data_awal,$data_akhir,$_SERVER['HTTP_REFERER'],$ket);

	mysql_close();

	if ($result2) {
	$st='1';
	$_SESSION['pesan'] = '<p><div class="alert alert-success">Data Berhasil Di Rubah</b> </b></div></p>';
	} 
}

include ('sistemkerja_data_view.php');
?>