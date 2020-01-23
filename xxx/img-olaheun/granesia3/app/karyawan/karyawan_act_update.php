<?php
//include ('db.php');

$index = $_POST['index'];
isset($_POST['nik']) ? $nik = $_POST['nik'] : $nik =''; 

$nm_lengkap = $_POST['nm_lengkap']; 

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
$id_lks_kerja = $_POST['id_lks_kerja']; 
$id_sistem_kerja = $_POST['id_sistem_kerja']; 
$nm_pekerjaan = $_POST['nm_pekerjaan'];
$id_jabatan = $_POST['id_jabatan'];
$id_gol = $_POST['id_gol'];
$id_gapok = $_POST['id_gapok'];
$tmt = $_POST['tmt']; 

$foto_name = $_POST['foto_before']; 
$foto = $_POST['foto_before'];
if(!$_FILES['foto']['error']){
	$fotoDirectory = "\karyawan_foto\\";
	$jenis_foto=$_FILES['foto']['type'];
	$tmp_name=$_FILES['foto']['tmp_name'];
	$foto=$_FILES['foto']['name'];
		$rnd=date('Y-m-d');
	if($foto ==''){
		$foto = $foto_name;
		echo "masuk1</br>";
	}else{
	$foto=$rnd.'-'.$foto;
		define ('SITE_ROOT', realpath(dirname(__FILE__)));
		//imagejpeg(imagecreatefromjpeg($tmp_name, $tmp_name, 50));
		move_uploaded_file($tmp_name, SITE_ROOT.$fotoDirectory.$foto);
	}
}


$query = "UPDATE tkjp SET nik= '".$nik."', nm_lengkap = '".$nm_lengkap."', foto = '".$foto."', no_ktp = '".$no_ktp."', no_npwp = '".$no_npwp."', 
	no_jamsostek = '".$no_jamsostek."',bank_payroll = '".$bank_payroll."', 
	no_rek_payroll = '".$no_rek_payroll."', tmp_lahir = '".$tmp_lahir."', tgl_lahir = '".$tgl_lahir."',	alamat = '".$alamat."',
	id_klasifikasi = '".$id_klasifikasi."',nm_pekerjaan='".$nm_pekerjaan."',id_jabatan='".$id_jabatan."',id_gol='".$id_gol."',id_gapok='".$id_gapok."',
	id_fkerja = '".$id_fkerja."',id_field = '".$id_field."', id_lks_kerja = '".$id_lks_kerja."', id_sistem_kerja = '".$id_sistem_kerja."', 
	tmt = '".$tmt."'
	
	WHERE tkjp.index ='".$index."'";
		
$result = mysql_query($query) or die(mysql_error());

//Catat aktivitas User
		$ket = "Update PJP";
		$data_awal = "--";
		$data_akhir = "PJP dengan nama :".$nm_lengkap." telah dirubah";
		$modul = "PJP";
		simpan_history($_SESSION['nama'],$modul,$data_awal,$data_akhir,$_SERVER['HTTP_REFERER'],$ket);

		
mysql_close();
if ($result > 0) {
$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil dirubah</b> </b></div></p>';


	//echo "location.href='index.php?tab=$tab&folder=$folder&file=berkas&index=$index";
	echo "<script>; 
			location.href='index.php?tab=$tab&folder=$folder&file=profil&index=$index';
			</script>";
} else {
	
	echo "<script>; 
			location.href='index.php?tab=$tab&folder=$folder&file=profil&index=$index';
			</script>";
	}
?>