<?php
//   konfigurasi database
define('server', 'localhost');
define('username', 'root');
define('password', '');
define('database', 'granesia_pegawai');

mysql_connect(server,username,password) or die(mysql_error());
mysql_select_db(database) or die(mysql_error());

$db = new mysqli ( server , username , password , database );


?>
