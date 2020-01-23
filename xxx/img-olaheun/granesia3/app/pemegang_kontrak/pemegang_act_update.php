<?php

//include ('db.php');

if(isset($_POST['fungsi'])){
	isset($_POST['id']) ? $id = $_POST['id'] : $id = '';
	isset($_POST['fungsi']) ? $fungsi = $_POST['fungsi'] : $fungsi = '';
	
	$query1 = "SELECT * FROM fpemegang_kontrak WHERE id='".$id."'";
	$query2 = "UPDATE fpemegang_kontrak SET fungsi='$fungsi' WHERE id='".$id."'";

	$result1 = mysql_query($query1) or die(mysql_error());
	$result2 = mysql_query($query2) or die(mysql_error());
		
	//Ambil data sebelum update
		$rows=mysql_fetch_array($result1);
		$pemegang_kontrak = $rows['fungsi'];
		
		//Catat aktivitas User
			$ket = "update data";
			$data_awal = "<p>: ".$pemegang_kontrak."</p>";
			$data_akhir = "<p>: ".$fungsi."</p>";
			$modul = "pemegang_kontrak";
			simpan_history($_SESSION['nama'],$modul,$data_awal,$data_akhir,$_SERVER['HTTP_REFERER'],$ket);
	mysql_close();

	if ($result2) {

	$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil dirubah</b> </b></div></p>';
		
	} 
}
$st = '1';
include ('pemegang_kontrak_data_view.php');
?>