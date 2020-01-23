<?php
	include('db.php');
	

	function simpan_history($user="",$modul="",$data_awal="",$data_akhir="",$link="",$ket=""){
		$create_date = date('Y-m-d');
		$query_log = "INSERT INTO history(id_his,create_date,user,modul,data_awal,data_akhir,link,ket,status_baca) VALUES('','$create_date','$user','$modul','$data_awal','$data_akhir','$link','$ket','N')";
		
		mysql_query($query_log);
	}
?>