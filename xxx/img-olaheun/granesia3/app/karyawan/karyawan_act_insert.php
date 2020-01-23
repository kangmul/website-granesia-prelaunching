<?php
//include ('db.php');
//MENANGKAP VARIABLE FIELD DITABLE YANG DIKIRIM DENGAN METHODE POST

$nm_lengkap = $_POST['nm_lengkap']; 
$foto_name = $_POST['foto'];
$foto = $_POST['foto'];
if(!$_FILES['foto']['error']){
	$fotoDirectory = "\karyawan_foto\\";
	$jenis_foto=$_FILES['foto']['type'];
	$tmp_name=$_FILES['foto']['tmp_name'];
	
	if($foto == ''){
		$foto = $foto_name;
	}
	else{
		$rnd=date('Y-m-d');
	//$foto=$_FILES['foto']['name'];
	$foto = basename($_FILES['foto']['name'], ".jpg");
	$foto = preg_replace("/[^A-Za-z0-9_-]/", "", $foto).".jpg";
	
		$foto=$rnd.'-'.$foto;
		define ('SITE_ROOT', realpath(dirname(__FILE__)));
		move_uploaded_file($tmp_name, SITE_ROOT.$fotoDirectory.$foto);
		}
}
$nik = $_POST['nik']; 
$no_ktp = $_POST['no_ktp']; 
$no_npwp = $_POST['no_npwp']; 
$no_jamsostek = $_POST['no_jamsostek']; 
$bank_payroll = $_POST['bank_payroll']; 
$no_rek_payroll = $_POST['no_rek_payroll']; 
$tmp_lahir = $_POST['tmp_lahir']; 
$tgl_lahir = $_POST['tgl_lahir']; 
$alamat = $_POST['alamat']; 
$id_klasifikasi = $_POST['id_klasifikasi'];
$id_fkerja = $_POST['id_fkerja']; 
$id_field = $_POST['id_field']; 
$id_jabatan = $_POST['id_jabatan']; 
$id_lks_kerja = $_POST['id_lks_kerja']; 
$id_sistem_kerja = $_POST['id_sistem_kerja']; 
$nm_pekerjaan = $_POST['nm_pekerjaan'];
$tmt = $_POST['tmt']; 
$status= $_POST['status']; 
$created_by = $_SESSION['nama'];
$tanggal_dibuat= date('Y-m-d'); 


							

$query_validasi = "SELECT * FROM tkjp WHERE nik='".$nik."'";

$result_validasi = mysql_query($query_validasi);

$query_validasi_final = mysql_fetch_array($result_validasi);

echo $query_validasi_final['nik'];

if ($query_validasi_final['nik']!="") {
echo "<script>alert('Data NIK sudah ada!');
		location.href='index.php?tab=$tab&folder=$folder&file=karyawan_form_insert';
		</script>";
		
} else if ($query_validasi_final['nik']=="") {

$query = "INSERT INTO tkjp (nik,nm_lengkap,foto,no_ktp,no_npwp,no_jamsostek,bank_payroll,no_rek_payroll,tmp_lahir,tgl_lahir,
alamat,id_klasifikasi,nm_pekerjaan,id_jabatan,id_fkerja,id_field,id_lks_kerja,id_sistem_kerja,
tmt,status,created_by,tanggal_dibuat) 
VALUES ('".$nik."','".$nm_lengkap."','".$foto."','".$no_ktp."','".$no_npwp."','".$no_jamsostek."',
'".$bank_payroll."','".$no_rek_payroll."','".$tmp_lahir."','".$tgl_lahir."',
'".$alamat."','".$id_klasifikasi."','".$nm_pekerjaan."','".$id_jabatan."','".$id_fkerja."','".$id_field."','".$id_lks_kerja."','".$id_sistem_kerja."',
'".$tmt."','".$status."','".$created_by."','".$tanggal_dibuat."');";

//echo $query;
//die();
$result = mysql_query($query)or die(mysql_error());

$_SESSION['pesan'] = '<p><div class="alert alert-success">Data <b>'.$_SESSION['nm_lengkap'].' Berhasil Di Simpan</b> </b></div></p>';

///Catat aktivitas User
		$ket = "insert data";
		$data_awal = "";
		$data_akhir = "Nama PJP : ".$nm_lengkap;
		$modul = "PJP";
		simpan_history($_SESSION['nama'],$modul,$data_awal,$data_akhir,$_SERVER['HTTP_REFERER'],$ket);

$_SESSION['id_tkjp_last'] = mysql_insert_id();

echo "<script>; 
			location.href='index.php?tab=$tab&folder=$folder&file=karyawan_form_upload_sertifikat';
			</script>";
//include ('karyawan_form_insert.php');
}
?>