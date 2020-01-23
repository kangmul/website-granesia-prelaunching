<?php
include "config.php";

$pesan = mysql_query("SELECT * FROM history WHERE  status_baca='N'");
$j = mysql_num_rows($pesan);

if($j>0){
    echo $j;
}
?>
