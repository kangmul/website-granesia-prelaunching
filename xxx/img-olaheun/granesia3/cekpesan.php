<?php
include "config.php";

$pesan = mysql_query("SELECT * FROM history WHERE  status_baca='N' ORDER BY create_date DESC");
$pesan2 = mysql_query("SELECT * FROM history WHERE  status_baca='N'");
$j = mysql_num_rows($pesan);
$j2 = mysql_num_rows($pesan2);

if($j>0){
    echo $j2;
}
?>
