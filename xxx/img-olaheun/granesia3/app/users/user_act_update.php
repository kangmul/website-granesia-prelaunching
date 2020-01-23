<?php

include ('db.php');

$id_fkerja = $_POST['id_fkerja'];
$id_field = $_POST['id_field'];
$fkerja = $_POST['fkerja'];

$query = "UPDATE fungsi_kerja SET fkerja='$fkerja',id_field='$id_field'
		WHERE id_fkerja='$id_fkerja'";
$result = mysql_query($query) or die(mysql_error());

mysql_close();


if ($result > 0) {

$_SESSION['pesan'] = '<p><div class="alert alert-success">Data <b>'.$_SESSION['fkerja'].' Berhasil Di Simpan</b> </b></div></p>';

	include('fkerja_form_view.php');
} else {
	include('fkerja_form_view.php');
}
?>