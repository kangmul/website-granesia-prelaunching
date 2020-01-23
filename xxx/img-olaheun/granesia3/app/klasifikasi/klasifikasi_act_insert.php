<?php
//include('db.php');

if(isset($_POST['klasifikasi'])){
	$klasifikasi = $_POST['klasifikasi'];

	$query_validasi = "SELECT * FROM klasifikasi WHERE klasifikasi='".$klasifikasi."'";
	$result_validasi = mysql_query($query_validasi);

	$query_validasi_final = mysql_fetch_array($result_validasi);
	echo $query_validasi_final['klasifikasi'];

	if ($query_validasi_final['klasifikasi']!="") {
	echo "<script>alert('Data sudah ada!');
			location.href='index.php?folder=$folder&file=klasifikasi_form_insert';
			</script>";
			
	} else if ($query_validasi_final['klasifikasi']=="") {

	$query = "INSERT INTO klasifikasi(klasifikasi) VALUES('".$klasifikasi."')";
	$result = mysql_query($query);
	
	///Catat aktivitas User
		$ket = "insert data";
		$data_awal = "";
		$data_akhir = "klasifikasi : ".$klasifikasi;
		$modul = "klasifikasi";
		simpan_history($_SESSION['nama'],$modul,$data_awal,$data_akhir,$_SERVER['HTTP_REFERER'],$ket);

	//header('Location:user_form_insert.php?konfirmasi=1');

	//header ('Location:index.php'):''; 
	$_SESSION['pesan'] = '<p><div class="alert alert-success">Data Berhasil Di Simpan</b> </b></div></p>';

	}
}

include ('klasifikasi_form_insert.php');
?>