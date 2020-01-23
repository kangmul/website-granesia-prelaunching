<?php
//include('db.php');

if(isset($_POST['nm_pekerjaan'])){
	$nm_pekerjaan = $_POST['nm_pekerjaan'];

	$query_validasi = "SELECT * FROM pekerjaan WHERE nm_pekerjaan='".$nm_pekerjaan."'";
	$result_validasi = mysql_query($query_validasi);

	$query_validasi_final = mysql_fetch_array($result_validasi);
	echo $query_validasi_final['nm_pekerjaan'];

	if ($query_validasi_final['nm_pekerjaan']!="") {
	echo "<script>alert('Data sudah ada!');
			location.href='index.php?folder=$folder&file=pekerjaan_form_insert';
			</script>";
			
	} else if ($query_validasi_final['nm_pekerjaan']=="") {

	$query = "INSERT INTO pekerjaan 
	(nm_pekerjaan) VALUES('".$nm_pekerjaan."')";
	$result = mysql_query($query);
	
	///Catat aktivitas User
		$ket = "insert data";
		$data_awal = "";
		$data_akhir = "pekerjaan : ".$nm_pekerjaan;
		$modul = "pekerjaan";
		simpan_history($_SESSION['nama'],$modul,$data_awal,$data_akhir,$_SERVER['HTTP_REFERER'],$ket);

	//header('Location:user_form_insert.php?konfirmasi=1');

	//header ('Location:index.php'):''; 
	$_SESSION['pesan'] = '<p><div class="alert alert-success">Data Berhasil Di Simpan</b> </b></div></p>';
	}
}

include ('pekerjaan_form_insert.php');
?>