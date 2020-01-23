<?php
include "../../../../koneksi.php";

$Judul    = $_POST['Judul'];
$ket    = $_POST['ket'];

$query = mysql_query("UPDATE resensi SET Judul='$Judul',
                                        ket='$ket' 
                                        where id='$_GET[id]'");
if ($query) {
echo "<script>alert('DATA BERHASIL DISIMPAN');
document.location.href='../../../fitur/pilihan/resensi.php'</script>\n";
} else {
echo "<script>alert('DATA GAGAL DISIMPAN');
document.location.href='../../../fitur/pilihan/resensi.php'</script>\n";
}
?>