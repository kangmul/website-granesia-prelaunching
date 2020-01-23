<?php

//include ('db.php');

if(isset($_POST['nm_pekerjaan'])){
	$id_pekerjaan = $_POST['id_pekerjaan'];
	$nm_pekerjaan= $_POST['nm_pekerjaan'];
	
	$query1 = "SELECT * FROM pekerjaan WHERE id_pekerjaan='".$id_pekerjaan."'";
	$query2 = "UPDATE pekerjaan SET nm_pekerjaan='".$nm_pekerjaan."' WHERE id_pekerjaan='".$id_pekerjaan."'";

	$result1 = mysql_query($query1) or die(mysql_error());
	$result2 = mysql_query($query2) or die(mysql_error());
	
	//Ambil data sebelum update
	$rows=mysql_fetch_array($result1);
	$pekerjaan_awal = $rows['nm_pekerjaan'];
	//Catat aktivitas User
		$ket = "update data";
		$data_awal = "<p>: ".$pekerjaan_awal."</p>";
		$data_akhir = "<p>: ".$nm_pekerjaan."</p>";
		$modul = "pekerjaan";
		simpan_history($_SESSION['nama'],$modul,$data_awal,$data_akhir,$_SERVER['HTTP_REFERER'],$ket);
	
	mysql_close();
	if($nm_pekerjaan !=''){
	$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil dirubah</b> </b></div></p>';
	}
$st = '1';
include ('pekerjaan_data_view.php');
}


?>