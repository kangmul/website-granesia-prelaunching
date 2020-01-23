<?php
include 'koneksi.php';
$nama=$_POST['id'];
$email=$_POST['ket'];
$query=mysql_query("insert into award (id,ket) value ('$id','$ket')");
 
include "index.php";
 
?>