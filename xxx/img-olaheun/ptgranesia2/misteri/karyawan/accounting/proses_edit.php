<?php
include "../../../../koneksi.php";

$foto    = $_POST['foto'];
$nama    = $_POST['nama'];
$alamat    = $_POST['alamat'];
$awal    = $_POST['awal'];
$status    = $_POST['status'];

$query = mysql_query("UPDATE accounting SET foto='$foto',
                                        nama='$nama',
                                        alamat='$alamat', 
                                        awal='$awal',
                                        status='$status'
                                        where id='$_GET[id]'");
if ($query) {
echo "<script>alert('DATA BERHASIL DISIMPAN');
document.location.href='../../../fitur/karyawan/accounting/list.php'</script>\n";
} else {
echo "<script>alert('DATA GAGAL DISIMPAN');
document.location.href='../../../fitur/karyawan/accounting/list.php'</script>\n";
}
?>