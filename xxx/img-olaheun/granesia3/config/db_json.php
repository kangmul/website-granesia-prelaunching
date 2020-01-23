<?php
/**
 * Created by PhpStorm.
 * User: iy2
 * Date: 9/8/2015
 * Time: 1:47 PM
 */
include 'database.php';

$hostname = hostname;
$database = database;
$username = username;
$password = password;
$db_json = new PDO('mysql:host=' . $hostname . ';dbname=' . $database, $username, $password);
?>