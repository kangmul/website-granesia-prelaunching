<?php
//include ('db.php');
//MENANGKAP VARIABLE FIELD DITABLE YANG DIKIRIM DENGAN METHODE POST

$password1 = $_POST['password1'];
$password2 = $_POST['password2'];

$password = '';
if($password1 == $password2){
	$password = md5($password1);

	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$role_id = $_POST['role_id'];
	$jabatan = $_POST['jabatan'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	//$level = $_POST['level'];
	$email = $_POST['email'];
	$alamat = $_POST['alamat'];
	$no_kontak = $_POST['no_kontak'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$tempat_lahir = $_POST['tempat_lahir'];
	
	isset($_POST['level']) ? $level = $_POST['level'] : $level ='';

	$status= $_POST['status']; 

	if(!$_FILES['foto']['error']){

		$jenis_foto=$_FILES['foto']['type'];
		$tmp_name=$_FILES['foto']['tmp_name'];
		$nama_foto=$username.'_'.$_FILES['foto']['name'];

		define ('SITE_ROOT', realpath(dirname(__FILE__)));

		move_uploaded_file($tmp_name, SITE_ROOT."\user_foto\\".$nama_foto);
	}else{
		$nama_foto = 'noimage.jpg';
	}


	$created_by = $_SESSION['nama'];
	$tanggal= date('Y-m-d'); 
								
	$query_validasi = "SELECT * FROM user WHERE username='".$username."' AND password = '".$password."'";

	$result_validasi = mysql_query($query_validasi);

	$query_validasi_final = mysql_fetch_array($result_validasi);

	if ($query_validasi_final['username']!="" && $query_validasi_final['password']!="") {

	echo "<script>alert('User sudah ada!');
			location.href='index.php?folder=$folder&file=user_form_insert';
			</script>";
			
	} else if ($query_validasi_final['username']=="" && $query_validasi_final['password']=="") {

	$query = "INSERT INTO user (no,username,password,nama,role_id,jabatan,email,alamat,no_kontak,tgl_lahir,tempat_lahir,oleh,tanggal,foto,status) 
	VALUES ('','".$username."','".$password."','".$nama."','".$role_id."','".$jabatan."','".$email."',
	'".$alamat."','".$no_kontak."','".$tgl_lahir."','".$tempat_lahir."',
	'".$created_by."','".$tanggal."','".$nama_foto."','".$status."')";

	$result = mysql_query($query);

	$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil disimpan</b> </b></div></p>';
	$st = '1';
	include ('user_form_view.php');
	}

}else{

	echo "<script>alert('Password yang dimasukan tidak cocok !');
		location.href='index.php?folder=users&file=user_form_insert&pass=tidakcocok';
		</script>";
}
?>