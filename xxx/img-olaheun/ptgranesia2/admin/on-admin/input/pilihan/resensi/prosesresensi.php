<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "ptgranesia";
// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
// variabel untuk menerima data dari file inpu.php
$Judul=$_POST['Judul'];
$ket=$_POST['ket'];

// Kode atau Script sql untuk input data ke database
$sql="insert into resensi (Judul,ket) values ('$Judul','$ket')";
$hasil=mysql_query($sql);
// Validasi 
if($hasil){
echo "<script>alert('SUKSES MENAMBAHKAN DATA');
document.location.href='../../../fitur/pilihan/resensi.php'</script>\n";
} else {
echo "<script>alert('GAGAL MENAMBAHKAN DATA');
document.location.href='../../../fitur/pilihan/resensi.php'</script>\n";
}
?>  
