<?php
//include ('db.php');

if(isset($_POST['fkerja'])){

	//MENANGKAP VARIABLE FIELD DITABLE YANG DIKIRIM DENGAN METHODE POST
	$fkerja = $_POST['fkerja'];
	
	$query_validasi = "SELECT * FROM fungsi_kerja WHERE fkerja='".$fkerja."'";
	$result_validasi = mysql_query($query_validasi);

	$query_validasi_final = mysql_fetch_array($result_validasi);

	if ($query_validasi_final['fkerja']!="") {
	echo "<script>alert('Data sudah ada!');
			</script>";
			
	} else if ($query_validasi_final['fkerja']=="") {

	$query = "INSERT INTO fungsi_kerja 
	(fkerja) VALUES('".$fkerja."')";
	$result = mysql_query($query);
	
	$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil disimpan</b> </b></div></p>';
	
	///Catat aktivitas User
		$ket = "insert data";
		$data_awal = "";
		$data_akhir = "fungsi kerja : ".$fkerja;
		$modul = "fungsi kerja";
		simpan_history($_SESSION['nama'],$modul,$data_awal,$data_akhir,$_SERVER['HTTP_REFERER'],$ket);

	}
}
include ('fkerja_form_insert.php');
?>