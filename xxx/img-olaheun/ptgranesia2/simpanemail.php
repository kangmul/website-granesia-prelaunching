<?php
include 'koneksi.php';
$nama=$_POST['nama'];
$email=$_POST['email'];
$pesan=$_POST['pesan'];
$query=mysql_query("insert into email (nama,email,pesan) value ('$nama','$email','$pesan')");
 
include "index.php";
 
?>