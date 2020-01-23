<?php
include "../../../../koneksi.php";

$id = isset($_GET['id']) ? $_GET['id'] : '';;


$query = mysql_query("delete from visimisi where id='$id'");
if ($query) {
echo "<script>alert('DATA BERHASIL DIHAPUS');
document.location.href='../../../fitur/pilihan/visimisi.php'</script>\n";
} else {
echo "<script>alert('DATA GAGAL DIHAPUS');
document.location.href='../../../fitur/pilihan/visimisi.php'</script>\n";
}
?>