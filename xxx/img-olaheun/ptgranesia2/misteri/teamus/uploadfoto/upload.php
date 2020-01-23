<?php
//koneksi ke MySQL
$koneksi = mysqli_connect("localhost","root","");
mysqli_select_db($koneksi, "test");

$keterangan = $_POST['keterangan'];
$folder = "gambar";
$tmp_name = $_FILES["file_foto"]["tmp_name"];
$name = $folder."/".$_FILES["file_foto"]["name"];

//kode untuk upload ke folder gambar
move_uploaded_file($tmp_name, $name);

//masukkan datanya ke database
$input = mysqli_query($koneksi, "INSERT INTO galeri VALUES(null,'$keterangan','$name')");

if($input){
    //jika berhasil kita redirect ke halaman untuk menampilkan foto
    header("location: tampil.php");
}else{
    echo "gagal";
}
?>
