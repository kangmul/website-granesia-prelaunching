<?php
//include('db.php');

if(isset($_POST['waktu'])){
	$waktu = $_POST['waktu'];

	$query_validasi = "SELECT * FROM sistem_kerja WHERE waktu='".$waktu."'";
	$result_validasi = mysql_query($query_validasi);

	$query_validasi_final = mysql_fetch_array($result_validasi);
	echo $query_validasi_final['waktu'];

	if ($query_validasi_final['waktu']!="") {
	echo "<script>alert('Data sudah ada!');
			location.href='index.php?folder=$folder&file=sistemkerja_form_insert';
			</script>";
			
	} else if ($query_validasi_final['waktu']=="") {

	$query = "INSERT INTO sistem_kerja 
	(waktu) VALUES('".$waktu."')";
	$result = mysql_query($query);
	
	///Catat aktivitas User
		$ket = "insert data";
		$data_awal = "";
		$data_akhir = "waktu : ".$waktu;
		$modul = "sistem_kerja";
		simpan_history($_SESSION['nama'],$modul,$data_awal,$data_akhir,$_SERVER['HTTP_REFERER'],$ket);

	//header('Location:user_form_insert.php?konfirmasi=1');

	//header ('Location:index.php'):''; 
	$_SESSION['pesan'] = '<p><div class="alert alert-success">Data Berhasil Di Simpan</b> </b></div></p>';
	}
}

include ('sistemkerja_form_insert.php');
?>