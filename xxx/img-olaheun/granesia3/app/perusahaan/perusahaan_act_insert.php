<?php
//include('db.php');

if(isset($_POST['nm_perusahaan'])){
	$nm_perusahaan = $_POST['nm_perusahaan'];
	$no_telepon = $_POST['no_telepon'];
	$fax = $_POST['fax'];
	$no_hp = $_POST['no_hp'];
	$email = $_POST['email'];
	$alamat = $_POST['alamat'];
	$kota = $_POST['kota'];
	$kode_pos = $_POST['kode_pos'];
	$query_validasi = "SELECT * FROM perusahaan WHERE nm_perusahaan='".$nm_perusahaan."'";
	$result_validasi = mysql_query($query_validasi);

	$query_validasi_final = mysql_fetch_array($result_validasi);
	echo $query_validasi_final['nm_perusahaan'];

	if ($query_validasi_final['nm_perusahaan']!="") {
	echo "<script>alert('Data sudah ada!');
			location.href='index.php?folder=$folder&file=perusahaan_form_insert';
			</script>";
			
	} else if ($query_validasi_final['nm_pekerjaan']=="") {

	$query = "INSERT INTO perusahaan 
	(nm_perusahaan,no_telepon,fax,no_hp,email,alamat,kota,kode_pos) VALUES('".$nm_perusahaan."','".$no_telepon."','".$fax."','".$no_hp."','".$email."',
	'".$alamat."','".$kota."','".$kode_pos."')";
	$result = mysql_query($query);
	
	///Catat aktivitas User
		$ket = "insert data";
		$data_awal = "";
		$data_akhir = "perusahaan : ".$nm_perusahaan;
		$modul = "perusahaan";
		simpan_history($_SESSION['nama'],$modul,$data_awal,$data_akhir,$_SERVER['HTTP_REFERER'],$ket);

	//header('Location:user_form_insert.php?konfirmasi=1');

	//header ('Location:index.php'):''; 
	$_SESSION['pesan'] = '<p><div class="alert alert-success">Data Berhasil Di Simpan</b> </b></div></p>';
	}
}

include ('perusahaan_form_insert.php');
?>