<?php
//include ('db.php');

$id = isset($_GET['id']) ? $_GET['id'] : null;

//$query1 = "SELECT * FROM tkjp  WHERE status = 'aktif' AND tkjp.index='$index'";
$query2 = "UPDATE tunjangan SET hps = '1' WHERE tunjangan.id='$id'";

//$result1 = mysql_query($query1) or die(mysql_error());
$result2 = mysql_query($query2) or die(mysql_error());

//Ambil data sebelum update
	//$nm_lengkap = '';
//	while($rows=mysql_fetch_array($result1)){
	//	$nm_lengkap = $rows['nm_lengkap'];
	//}

///Catat aktivitas User
		//$ket = "Ganti Status PJP";
		//$data_awal = "";
		//$data_akhir = "Nama PJP : ".$nm_lengkap;
		//$modul = "PJP";
		//simpan_history($_SESSION['nama'],$modul,$data_awal,$data_akhir,$_SERVER['HTTP_REFERER'],$ket);

mysql_close();
$_SESSION['pesan'] = '<p><div class="alert alert-success"><b>Data Tunjangan Karyawan Berhasil Dihapus</b> </b></div></p>';
		$st = '1';
		include('gaji_karyawan_tunjangan_form_view.php');
		

?>