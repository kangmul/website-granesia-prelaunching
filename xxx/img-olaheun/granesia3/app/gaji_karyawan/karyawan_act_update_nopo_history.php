<?php

include ('db.php');

$index = isset($_POST['index']) ? $_POST['index'] : null;
$id_no_po = isset($_POST['id_no_po']) ? $_POST['id_no_po'] : null;

	
$query = "UPDATE test.tkjp SET id_no_po = '".$id_no_po."' WHERE tkjp.index ='".$index."'";
$result = mysql_query($query) or die(mysql_error());



$queryaktif = "UPDATE tkjp SET status = 'aktif' WHERE tkjp.index='$index'";
$resultaktif = mysql_query($queryaktif) or die(mysql_error());


mysql_close();
if ($result > 0){

	$_SESSION['pesan'] = '<p><div class="alert alert-success">Data <b>Data NO PO Berhasil Diperbaharui</b> </b></div></p>';

		echo "<script>;
		location.href='index.php?tab=$tab&folder=$folder&file=karyawan_history_data_view';
		</script>";

	} else {
	
		echo "<script>;
		location.href='index.php?tab=$tab&folder=$folder&file=karyawan_history_data_view';
		</script>";
	}
?>