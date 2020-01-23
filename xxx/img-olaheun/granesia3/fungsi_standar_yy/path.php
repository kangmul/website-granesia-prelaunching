<?php
ob_start();
//session_start();
header('Cache-Control: max-age=900');

/**
 * Created by PhpStorm.
 * User: iy2
 * Date: 8/11/2015
 * Time: 11:43 AM
 */

require_once PATH . '/config/database.php';
require_once PATH . '/config/config.php';


function libLoader($class)
{
    $filename = strtolower($class) . '.php';
    $file = ROOT . '/kerangka/' . $filename;
    if (!file_exists($file)) {
        return false;
    }
    require_once $file;
}

spl_autoload_register('libLoader');

class Gabung
{
    function __construct()
    {
        $this->db = new Database();
        $this->template = new Template();
        $this->fungsi = new Fungsi();
        $this->tombol = new Tombol();
        $this->pesan = new Pesan();

    }
}

$fungsi = new Gabung();
$db = $fungsi->db->connect();

?>