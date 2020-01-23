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
try {
	$sql = "INSERT INTO t_pot_karyawan (id_gaji, id_potongan, jumlah, ket) VALUES (:id_gaji,:id_potongan,:jumlah,:ket)";
	$query = $pdo->prepare($sql);
	$query->bindParam(':id_gaji', $_POST['id_gaji'], PDO::PARAM_STR);
	$query->bindParam(':id_potongan', $_POST['id_potongan'], PDO::PARAM_STR);
	$query->bindParam(':jumlah', $_POST['jumlah'], PDO::PARAM_STR);
	$query->bindParam(':ket', $_POST['ket'], PDO::PARAM_STR);
	$query->execute();
} catch (PDOException $e) {
	echo 'PDOException : '.  $e->getMessage();
}

//include('detail-njo-ss.php');
?>
