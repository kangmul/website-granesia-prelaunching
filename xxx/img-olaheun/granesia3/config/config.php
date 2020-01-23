<?php
ob_start();
/**
 * Created by PhpStorm.
 * User: iy2
 * Date: 8/11/2015
 * Time: 1:54 PM
 */
date_default_timezone_set('Asia/Jakarta');
function judul()
{
    return 'FORM NJO - SPB';
}

function css()
{
    $path = array(
        'bootstrap-3.3.6-dist/css/bootstrap.css',
        'bootstrap-3.3.6-dist/css/bootstrap.theme.css',
        'DataTables-1.10.9/media/css/dataTables.bootstrap.css',
        'font-awesome/css/font-awesome.css',
        'datepicker/css/datepicker.css',
        'select2-3.5.4/select2.css',
        'select2-3.5.4/select2-bootstrap.css',
        'costum.css',
    );
    return $path;
}

function script()
{
    $path = array(
        'angular-js/AngularJS.js',
        'jquery-2.1.4.min.js',
        'bootstrap-3.3.6-dist/js/bootstrap.js',
        'DataTables-1.10.9/media/js/jquery.dataTables.js',
        'DataTables-1.10.9/media/js/dataTables.bootstrap.js',
        'datepicker/js/bootstrap-datepicker.js',
        'getNumber/jquery.number.js',
        'tanggal_datepicker.js',
        'select2-3.5.4/select2.js',
        'search-box.js',
        'datatables1.js',
        'getNumber.js',
    );
    return $path;
}

function kelas(){
    $path=array(
        'excel_reader/excel_reader.php',
        'fpdf17/fpdf.php',
    );
    return $path;
}

define('encrypt_method', 'AES-256-CBC');
define('secret_key', 'qwerty');
define('secret_iv', '123456');

define ('apl','granesia2');
