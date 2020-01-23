<?php

/**
 * @author aggha
 * @copyright 2013
 */
$host = "localhost";
$user = "root";
$password = "";
$db = "polling";

$koneksi = mysql_connect($host,$user,$password);
if (!$koneksi) {
    echo "koneksi mysql gagal.";
    echo mysql_error();
}

$pilihdb = mysql_select_db($db);
if (!$pilihdb) {
    echo "gagal memilih database";
    echo mysql_error();
}
?>