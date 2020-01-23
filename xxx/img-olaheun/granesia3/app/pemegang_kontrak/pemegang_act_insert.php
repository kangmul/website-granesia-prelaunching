<?php
//include('db.php');

if(isset($_POST['pemegang'])){
	isset($_POST['pemegang']) ? $pemegang = $_POST['pemegang'] : $pemegang = '';
	
	$query_validasi = "SELECT * FROM fpemegang_kontrak WHERE fungsi='".$pemegang."'";
	$result_validasi = mysql_query($query_validasi);

	$query_validasi_final = mysql_fetch_array($result_validasi);

	if ($query_validasi_final['pemegang']!="") {
	echo "<script>alert('Data sudah ada!');
			</script>";
			
	} else if ($query_validasi_final['pemegang']=="") {

		$query = "INSERT INTO fpemegang_kontrak 
		(id,fungsi) VALUES('','".$pemegang."')";
		$result = mysql_query($query);
		
		///Catat aktivitas User
		$ket = "insert data";
		$data_awal = "";
		$data_akhir = "pemegang kontrak : ".$pemegang;
		$modul = "pemegang kontrak";
		simpan_history($_SESSION['nama'],$modul,$data_awal,$data_akhir,$_SERVER['HTTP_REFERER'],$ket);

		$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil disimpan</b> </b></div></p>';
	}

}
$st = '1';
include ('pemegang_form_insert.php');
?>