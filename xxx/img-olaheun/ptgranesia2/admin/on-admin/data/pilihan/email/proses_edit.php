<?php
include "../../../../koneksi.php";

$nama    = $_POST['nama'];
$email    = $_POST['email'];
$pesan   = $_POST['pesan'];

$query = mysql_query("UPDATE email SET nama='$nama',
                                        email='$email',
                                        pesan='$pesan' 
                                        where id='$_GET[id]'");
if ($query) {
echo "<script>alert('DATA BERHASIL DISIMPAN');
document.location.href='../../../fitur/pilihan/email.php'</script>\n";
} else {
echo "<script>alert('DATA GAGAL DISIMPAN');
document.location.href='../../../fitur/pilihan/email.php'</script>\n";
}
?>