<?php
//include ('db.php');
if(isset($_POST['nm_field'])){

	//MENANGKAP VARIABLE FIELD DITABLE YANG DIKIRIM DENGAN METHODE POST
	$nm_field = $_POST['nm_field'];

	$query_validasi = "SELECT * FROM field WHERE nm_field='".$nm_field."'";
	$result_validasi = mysql_query($query_validasi);

	$query_validasi_final = mysql_fetch_array($result_validasi);

	if ($query_validasi_final['nm_field']!="") {
	echo "<script>alert('Data sudah ada!');
			</script>";
			
	} else if ($query_validasi_final['nm_field']=="") {

	$query = "INSERT INTO field 
	(nm_field) VALUES('".$nm_field."')";
	$result = mysql_query($query);
	
	///Catat aktivitas User
		$ket = "insert data";
		$data_awal = "";
		$data_akhir = "field : ".$nm_field;
		$modul = "field";
		simpan_history($_SESSION['nama'],$modul,$data_awal,$data_akhir,$_SERVER['HTTP_REFERER'],$ket);

	$_SESSION['pesan'] = '<p><div class="alert alert-success">Data  berhasil disimpan</b> </b></div></p>';

	}
}
$st = '1';
include('field_form_insert.php');
?>