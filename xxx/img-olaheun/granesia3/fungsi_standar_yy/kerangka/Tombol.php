<?php

/**
 * Created by PhpStorm.
 * User: iy2
 * Date: 8/26/2015
 * Time: 10:53 PM
 */
class Tombol
{

    function __construct()
    {
        $page = 'index';
        if (isset($_GET['modul'])) {
            $page = explode('/', $_GET['modul']);
        }
        $this->page = $page[0];
    }

    function read_update_delete($id)
    {
        $tombol = '<a href="?modul=' . $this->page . '/form&id=' . $id . '" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                        <a href="?modul=' . $this->page . '/detail&id=' . $id . '" class="btn btn-sm btn-info"><i class="fa fa-search"></i></a>
                        <a href="?modul=' . $this->page . '/hapus&id=' . $id . '" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></a>';
        return $tombol;
    }

    function read($id)
    {
        $tombol = '<a href="?modul=' . $this->page . '/detail&id=' . $id . '" class="btn btn-sm btn-info">
        <i class="fa fa-search"></i></a>';
        return $tombol;
    }

    function update($id)
    {
        $tombol = '<a href="?modul=' . $this->page . '/form&id=' . $id . '" class="btn btn-sm btn-warning">
        <i class="fa fa-edit"></i></a>';
        return $tombol;
    }

    function button_umum($btn, $icon, $ket, $url, $id)
    {
        $tombol = '<a href="' . $url . 'id=' . $id . '" class="btn btn-sm btn-' . $btn . '">
        <i class="fa fa-' . $icon . '"></i> ' . $ket . '</a>';
        return $tombol;
    }

    function delete($id)
    {
        $tombol = '<a href="?modul=' . $this->page . '/act&proses=hapus&id=' . $id . '" class="btn btn-sm btn-danger">
        <i class="fa fa-remove"></i></a>';
        return $tombol;
    }

    function delete_sub($page, $id)
    {
        $tombol = '<a href="?modul=' . $page . '/act&proses=hapus&id=' . $id . '" class="btn btn-sm btn-danger">
        <i class="fa fa-remove"></i></a>';
        return $tombol;
    }

    function tambah()
    {
        echo '<a href="?modul=' . $this->page . '/form" class="btn btn-xs btn-primary">
                        <i class="fa fa-plus fa"></i> <label><b>Tambah</b></label></a>';
    }
	
	function tambah1()
    {
        echo '<a href="?modul=form_spb/form" class="btn btn-xs btn-primary">
                        <i class="fa fa-plus fa"></i> <label><b>SPB-NJO</b></label></a>';
    }
	
	function tambah2()
    {
        echo '<a href="?modul=form_spb/form2" class="btn btn-xs btn-primary">
                        <i class="fa fa-plus fa"></i> <label><b>SPB</b></label></a>';
    }
	
	function printexcel($url)
    {
        echo '<a href="'.$url.'" class="btn btn-xs btn-primary">
                        <i class="fa fa-print fa"></i> <label><b>Print Excel</b></label></a>';
    }

    function kembali()
    {
        echo '<a href="javascript:history.back()" class="btn btn-xs btn-success">
                        <label><b>Kembali</b></label></a>';

    }

    function save()
    {
        echo '<div class="btn-group pull-right">
                      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                      <button type="reset" class="btn btn-warning"><i class="fa fa-refresh"></i> Refresh</button>
                       </div>';
    }
}