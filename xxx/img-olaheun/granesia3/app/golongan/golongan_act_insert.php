<?php
//include('db.php');

/*if(isset($_POST['lokasi'])){
	$lokasi = $_POST['lokasi'];
	
	$query_validasi = "SELECT * FROM lokasi_kerja WHERE lokasi='".$lokasi."'";
	$result_validasi = mysql_query($query_validasi);

	$query_validasi_final = mysql_fetch_array($result_validasi);
	echo $query_validasi_final['lokasi'];

	if ($query_validasi_final['lokasi']!="") {
	echo "<script>alert('Data sudah ada!');
			location.href='index.php?folder=$folder&file=lokasi_form_insert';
			</script>";
			
	} else if ($query_validasi_final['lokasi']=="") {*/
	$nama_gol = $_POST['nama_gol'];
	$jenis_gol = $_POST['jenis_gol'];
	$gapok = $_POST['gapok'];
	$query = "INSERT INTO t_golongan
	(nama_gol,jenis_gol,gapok) VALUES('".$nama_gol."','".$jenis_gol."','".$gapok."')";
	$result = mysql_query($query);
	
	///Catat aktivitas User
	/*	$ket = "insert data";
		$data_awal = "";
		$data_akhir = "Lokasi : ".$lokasi;
		$modul = "lokasi_kerja";
		simpan_history($_SESSION['nama'],$modul,$data_awal,$data_akhir,$_SERVER['HTTP_REFERER'],$ket);

	//header('Location:user_form_insert.php?konfirmasi=1');

	//header ('Location:index.php'):''; */
	$_SESSION['pesan'] = '<p><div class="alert alert-success">Data Berhasil Di Simpan</b> </b></div></p>';
//}

//}
include ('golongan_data_view.php');
?>