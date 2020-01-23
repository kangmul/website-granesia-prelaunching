<?php
$root = dirname(__FILE__);
/**
 * Created by PhpStorm.
 * User: iy2
 * Date: 8/25/2015
 * Time: 9:45 PM
 */

/**
 * require fungsi_standar_yy
 * Pemanggilan Kerangka
 * --------------------------------------------------------
 */
define('ROOT', PATH . 'fungsi_standar_yy');
require_once ROOT . '/path.php';
/**
 * akhir pemaggilan fungsi standar YY
 * ========================================================
 */

/**
 * Index Pertama Aplkasi
 * ----------------------------------------------------------
 */
$modul_index = 'view';
/**
 * Path url Module
 */
isset ($_GET['modul']) ? $modul = $_GET['modul'] : $modul = $modul_index;
$page = explode('/', $modul);
if (count($page) == '1')
    $page[1] = "index";
/**
 * ============================================================
 */
?>
