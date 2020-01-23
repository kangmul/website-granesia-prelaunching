<?php
//include('db.php');

if(isset($_POST['pend_akhir'])){
	$pend_akhir = $_POST['pend_akhir'];
	
	//$query_validasi = "SELECT * FROM tb_pend_akhir WHERE pend_akhir='".$pend_akhir."'";
	//$result_validasi = mysql_query($query_validasi);

	//$query_validasi_final = mysql_fetch_array($result_validasi);
//	echo $query_validasi_final['pend_akhir'];

	//if ($query_validasi_final['pend_akhir']!="") {
	//echo "<script>alert('Data sudah ada!');
		//	location.href='index.php?folder=$folder&file=lokasi_form_insert';
			//</script>";
			
//	} else if ($query_validasi_final['pend_akhir']=="") {

	$query = "INSERT INTO tb_pend_akhir
	(pend_akhir) VALUES('".$pend_akhir."')";
	$result = mysql_query($query);

	///Catat aktivitas User
		//$ket = "insert data";
	///	$data_awal = "";
		//$data_akhir = "pend_akhir : ".$pend_akhir;
		//$modul = "pendidikan";
		//simpan_history($_SESSION['nama'],$modul,$data_awal,$data_akhir,$_SERVER['HTTP_REFERER'],$ket);

	//header('Location:user_form_insert.php?konfirmasi=1');

	//header ('Location:index.php'):''; 
	$_SESSION['pesan'] = '<p><div class="alert alert-success">Data Berhasil Di Simpan</b> </b></div></p>';
}


include ('pendidikan_form_insert.php');
?>