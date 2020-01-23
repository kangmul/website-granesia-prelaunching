<?php
//   konfigurasi database

$server = "localhost";
$username = "root";
$password= "";
$database = "granesia";
$serverPDO= "mysql:host=localhost;database=granesia";

//Koneksi Databse
mysql_connect($server,$username,$password) or die(mysql_error());
mysql_select_db($database) or die(mysql_error());

//Koneksi Cek Loogin
$db = new mysqli ( $server , $username , $password , $database );

//Buat Koneksi Mysql dengan Ajak
try {
 $bdd = new PDO($serverPDO, $username, $password);
 } catch(Exception $e) {
  exit('Unable to connect to database.');
 }
?>
