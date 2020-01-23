<?php

/**
 * Created by PhpStorm.
 * User: iy2
 * Date: 8/28/2015
 * Time: 9:28 AM
 */
class Pesan
{
    function pesan_success($text)
    {
        $_SESSION['pesan'] = '<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">x</button>
							<h5 class="alert-heading">' . $text . ' !</h5>
				</div>';
    }

    function pesan_danger($text)
    {
        $_SESSION['pesan'] = '<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert">x</button>
							<h5 class="alert-heading">' . $text . ' !</h5>
				</div>';
    }

    function pesan_info($text)
    {
        $_SESSION['pesan'] = '<div class="alert alert-info">
							<button type="button" class="close" data-dismiss="alert">x</button>
							<h5 class="alert-heading">' . $text . ' !</h5>
				</div>';
    }

    function pesan_warning($text)
    {
        $_SESSION['pesan'] = '<div class="alert alert-warning">
							<button type="button" class="close" data-dismiss="alert">x</button>
							<h5 class="alert-heading">' . $text . ' !</h5>
				</div>';
    }

    function pesan_tampil()
    {
        if (isset($_SESSION['pesan'])) {
            echo $_SESSION['pesan'];
            unset($_SESSION['pesan']);
        }
    }

    function label_success($text)
    {
        return '<p class="alert alert-success">
							<h5 class="alert-heading">' . $text . ' !</h5>
				</p>';
    }

    function label_danger($text)
    {
        return '<p class="alert alert-danger">
							<h5 class="alert-heading">' . $text . ' !</h5>
				</p>';
    }

    function label_info($text)
    {
        return '<p class="alert alert-info">
							<h5 class="alert-heading">' . $text . ' !</h5>
				</p>';
    }

    function label_warning($text)
    {
        return '<p class="alert alert-warning">
							<h5 class="alert-heading">' . $text . ' !</h5>
				</p>';
    }

}