<?php

/**
 * @author aggha
 * @copyright 2013
 */
 include "../../../db.php";
$id = $_POST['id'];
$jawab = $_POST['jawaban'];
$cek = mysql_query("select * from hasil where jawab='$jawab';");
if (mysql_num_rows($cek)>0) {
    $query = mysql_query("update hasil set nilai=nilai+1 where jawab='$jawab';");
}
else {
    $query = mysql_query("insert into hasil values('$id','$jawab',1);");
}

if ($query) {
    echo "<script>alert('Terima kasih telah memberikan suara anda');
    window.location=('../../../index.php');</script>";
}
else {
    echo "<script>alert('Gagal memasukan data');
    window.location=('../../../index.php');</script>";
}

?>