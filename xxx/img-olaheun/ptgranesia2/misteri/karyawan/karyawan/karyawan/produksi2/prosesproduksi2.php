<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "ptgranesia";
// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
// variabel untuk menerima data dari file inpu.php
$foto=$_POST['foto'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$awal=$_POST['awal'];
$status=$_POST['status'];

// Kode atau Script sql untuk input data ke database
$sql="insert into produksi2 (foto,nama,alamat,awal,status) values ('$foto','$nama','$alamat','$awal','$status')";
$hasil=mysql_query($sql);
// Validasi 
if($hasil){
echo "<script>alert('SUKSES MENAMBAHKAN DATA');
document.location.href='../../../fitur/karyawan/produksi2/list.php'</script>\n";
} else {
echo "<script>alert('GAGAL MENAMBAHKAN DATA');
document.location.href='../../../fitur/karyawan/produksi2/list.php'</script>\n";
}
?>
