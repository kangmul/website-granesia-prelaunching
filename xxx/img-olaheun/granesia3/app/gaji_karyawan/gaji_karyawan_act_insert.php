<?php
//include ('db.php');
//MENANGKAP VARIABLE FIELD DITABLE YANG DIKIRIM DENGAN METHODE POST

//$nm_lengkap = $_POST['nm_lengkap']; 
//$index = $_POST['index']; 
$id = isset($_POST['id']) ? $id = $_POST['id'] : $_GET['id'];
//$nik = $_POST['nik']; 
//$no_rek_payroll = $_POST['no_rek_payroll']; 
//$jabatan = $_POST['jabatan']; 
$id_gol = $_POST['id_gol']; 
$gapok = $_POST['gapok']; 
$sisa_gaji = $_POST['sisa_gaji']; 
$name = $_POST['bulan'];
$tgl_input = $_POST['tgl_input']; 


							

$query = "UPDATE gaji SET
        golongan='$id_gol'
        ,gapok='$gapok'
        ,sisa_gaji='$sisa_gaji'
        ,tgl_input='$tgl_input'
         WHERE id='$id'"; 
//echo $query;
//die ();

$result = mysql_query($query)or die(mysql_error());

$_SESSION['pesan'] = '<p><div class="alert alert-success">Data <b> Berhasil Di Simpan Dengan Sisa Gaji '.$sisa_gaji.'</b> </b></div></p>';

///Catat aktivitas User
	//	$ket = "insert data";
	//	$data_awal = "";
	//	$data_akhir = "Nama PJP : ".$nm_lengkap;
	//	$modul = "PJP";
	//	simpan_history($_SESSION['nama'],$modul,$data_awal,$data_akhir,$_SERVER['HTTP_REFERER'],$ket);

//$_SESSION['id_tkjp_last'] = mysql_insert_id();

echo "<script>; 
			location.href='index.php?tab=$tab&folder=$folder&file=gaji_karyawan_form_view';
			</script>";
//include ('karyawan_form_insert.php');

?>