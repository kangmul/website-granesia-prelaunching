<?php
//include ('db.php');
//MENANGKAP VARIABLE FIELD DITABLE YANG DIKIRIM DENGAN METHODE POST

//$nm_lengkap = $_POST['nm_lengkap']; 
$index = isset($_POST['index']) ? $_POST['index'] : null;
$id = isset($_POST['id']) ? $id = $_POST['id'] : $_GET['id'];
//$nik = $_POST['nik']; 
//$no_rek_payroll = $_POST['no_rek_payroll']; 
//$jabatan = $_POST['jabatan']; 
//$periode = $_POST['periode']; 
//$gapok = $_POST['gapok']; 
//$sisa_gaji = $_POST['sisa_gaji']; 
$name = $_POST['bulan'];
$tgl_input = $_POST['tgl_input']; 


							
$query = "UPDATE tumtut SET id_karyawan='$index', periode='$name', tgl_input='$tgl_input' WHERE id='$id'"; 
//echo $query;
//die ();

$result = mysql_query($query)or die(mysql_error());

$_SESSION['pesan'] = '<p><div class="alert alert-success">Data <b> Berhasil Di Simpan </b> </b></div></p>';

///Catat aktivitas User
	//	$ket = "insert data";
	//	$data_awal = "";
	//	$data_akhir = "Nama PJP : ".$nm_lengkap;
	//	$modul = "PJP";
	//	simpan_history($_SESSION['nama'],$modul,$data_awal,$data_akhir,$_SERVER['HTTP_REFERER'],$ket);

//$_SESSION['id_tkjp_last'] = mysql_insert_id();

echo "<script>; 
			location.href='index.php?tab=$tab&folder=$folder&file=gaji_karyawan_tumtut_form_view';
			</script>";
//include ('karyawan_form_insert.php');

?>