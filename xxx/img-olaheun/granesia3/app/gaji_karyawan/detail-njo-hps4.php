<?php
/**
 * Created by PhpStorm.
 * User: iy2
 * Date: 12/16/2015
 * Time: 8:36 AM
 */
?>
<?php
include ('../../config_ajax.php');
$pdo = connect();
// deleting a member using PDO with try/catch to escape the exceptions
try {
	$sql = "DELETE FROM t_tumtut_karyawan WHERE id = :id";
	$query = $pdo->prepare($sql);
	$query->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
	$query->execute();
} catch (PDOException $e) {
	echo 'PDOException : '.  $e->getMessage();
}
include('detail-njo-ss4.php');
?>
