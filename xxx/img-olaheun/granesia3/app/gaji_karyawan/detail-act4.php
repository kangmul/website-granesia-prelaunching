<?php
/**
 * Created by PhpStorm.
 * User: iy2
 * Date: 12/16/2015
 * Time: 8:36 AM
 */
include ('../../config_ajax.php');
$pdo = connect();
// adding new member using PDO with try/catch to escape the exceptions
	//$x=$_POST['jam_lembur'];
	//$y=$_POST['nilai_lembur'];
	
	//$jumlah = $x * $y;
	//echo $jumlah;
	//die ();

try {
$jam_hadir = $_POST['jam_hadir'];
$nilai_hadir = $_POST['nilai_hadir'];
$jumlah = $jam_hadir * $nilai_hadir;
//echo $jumlah;
	//die ();
	$sql = "INSERT INTO t_tumtut_karyawan (id_gaji, id_tumtut, jam_hadir, nilai_hadir, jumlah, ket) VALUES (:id_gaji,:id_tumtut,:jam_hadir,:nilai_hadir,:jumlah,:ket)";
	$query = $pdo->prepare($sql);
	$query->bindParam(':id_gaji', $_POST['id_gaji'], PDO::PARAM_STR);
	$query->bindParam(':id_tumtut', $_POST['id_tumtut'], PDO::PARAM_STR);
	$query->bindParam(':jam_hadir', $_POST['jam_hadir'], PDO::PARAM_STR);
	$query->bindParam(':nilai_hadir', $_POST['nilai_hadir'], PDO::PARAM_STR);
	$query->bindParam(':jumlah', $jumlah, PDO::PARAM_STR);
	$query->bindParam(':ket', $_POST['ket'], PDO::PARAM_STR);
	$query->execute();
} catch (PDOException $e) {
	echo 'PDOException : '.  $e->getMessage();
}

include('detail-njo-ss4.php');
?>
