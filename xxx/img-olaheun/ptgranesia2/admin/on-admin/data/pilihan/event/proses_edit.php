<?php
include "../../../../koneksi.php";

$nama    = $_POST['nama'];
$ket    = $_POST['ket'];

$query = mysql_query("UPDATE event SET nama='$nama',
                                        ket='$ket' 
                                        where id='$_GET[id]'");
if ($query) {
echo "<script>alert('DATA BERHASIL DISIMPAN');
document.location.href='../../../fitur/pilihan/event.php'</script>\n";
} else {
echo "<script>alert('DATA GAGAL DISIMPAN');
document.location.href='../../../fitur/pilihan/event.php'</script>\n";
}
?>