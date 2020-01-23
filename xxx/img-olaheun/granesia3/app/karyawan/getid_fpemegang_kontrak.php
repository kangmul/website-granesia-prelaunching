<?php
include ('../../config.php');

$kode = $_GET['kode'];
$sql2=mysql_query("SELECT id_fpemegang_kontrak FROM no_po WHERE id_no_po = '$kode'");
while ($row=mysql_fetch_array($sql2)){
    echo $row['id_fpemegang_kontrak'];
}

?>
