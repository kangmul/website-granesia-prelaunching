<?php
//include ('db.php');

//if(isset($_GET['id_lokasi'])){
	isset($_GET['id_merital']) ? $id_merital = $_GET['id_merital'] : $id_merital = '';
	
	//$query1 = "SELECT * FROM lokasi_kerja WHERE id_lokasi='".$id_lokasi."'";
	$query2 = "DELETE FROM t_merital WHERE id_merital='".$id_merital."'";

	//$result1 = mysql_query($query1) or die(mysql_error());
	$result2 = mysql_query($query2) or die(mysql_error());
	
	//Ambil data sebelum update
	//$rows=mysql_fetch_array($result1);
	//$lokasi_awal = $rows['lokasi'];
	//Catat aktivitas User
		//$ket = "delete data";
		//$data_awal = "<p>: ".$lokasi_awal."</p>";
		//$data_akhir = "";
		//$modul = "lokasi_kerja";
		//simpan_history($_SESSION['nama'],$modul,$data_awal,$data_akhir,$_SERVER['HTTP_REFERER'],$ket);

	mysql_close();
	if ($result2) {
		$_SESSION['pesan'] = '<p><div class="alert alert-success">Data Berhasil Di Hapus</b> </b></div></p>';
	$st='1';
	include ('merital_data_view.php');
	}
//}


?>