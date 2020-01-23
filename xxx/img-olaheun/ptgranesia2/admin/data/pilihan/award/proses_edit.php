<?php
include "../../../../koneksi.php";

$ket    = $_POST['ket'];

$query = mysql_query("UPDATE award SET 
                                        ket='$ket' 
                                        where id='$_GET[id]'");
if ($query) {
echo "<script>alert('DATA BERHASIL DISIMPAN');
document.location.href='../../../fitur/pilihan/award.php'</script>\n";
} else {
echo "<script>alert('DATA GAGAL DISIMPAN');
document.location.href='../../../fitur/pilihan/award.php'</script>\n";
}
?>



