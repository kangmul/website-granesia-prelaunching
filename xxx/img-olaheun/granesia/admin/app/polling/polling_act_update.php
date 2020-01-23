<?php
include ('db.php');

isset($_POST['id_tanya']) ? $id_tanya = $_POST['id_tanya'] : $id_tanya ='';
$pertanyaan = $_POST['pertanyaan'];
$jawab_1 = $_POST['jawab_1'];
$jawab_2 = $_POST['jawab_2'];
$jawab_3 = $_POST['jawab_3'];
$jawab_4 = $_POST['jawab_4'];


$query = "UPDATE pertanyaan SET  pertanyaan='".$pertanyaan."',jawab_1='".$jawab_1."',jawab_2='".$jawab_2."',jawab_3='".$jawab_3."',jawab_4='".$jawab_4."'
		WHERE pertanyaan.id_tanya='".$id_tanya."'";
$result = mysql_query($query) or die(mysql_error());

mysql_close();

if ($result) {
$st = '1';
$_SESSION['pesan'] = '<p><div class="alert alert-success">Data berhasil dirubah</b> </b></div></p>';
include ('polling_form_view.php');
}
?>