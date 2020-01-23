<?php

/**
 * Created by PhpStorm.
 * User: iy2
 * Date: 8/11/2015
 * Time: 11:25 AM
 */
class Database
{
    function connect()
    {
        try {
            $hDB = new PDO('mysql:host=' . hostname . ';dbname=' . database, username, password);
            $hDB->exec("SET CHARACTER SET utf8");
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        if (!$hDB) {
            echo $database . "<br>";
            echo $host . "<br>";
            echo $username . "<br>";
            echo $pwd . "<br>";
            die("Tidak terkoneksi ke server");
            return false;
        }
        return $hDB;
    }
}