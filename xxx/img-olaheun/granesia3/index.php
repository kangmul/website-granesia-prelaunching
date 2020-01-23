<?php 
//error_reporting(E_ALL ^ E_NOTICE);
include ('log.php');
include ('acl.php');
include ('config_ajax.php');
session_start();
//menentukan base url
$base_url = 'http://'.$_SERVER['HTTP_HOST'].''; 
//file default
isset ($_GET['file']) ? $file = $_GET['file'] : $file = 'home';

/**
 * Setting PATH Aplikasi
 * --------------------------------------------------
 */
define('PATH', ''); //Definisi Lokasi Direktori Index.php
require_once PATH . 'path.php';
//$fungsi->template->Heading(); //Memanggil CSS
//define('VIEW', PATH . 'app/'); //Definisi Lokasi Direktori tiap Modul ada di modul mana

/**
 * Akhir
 * ==================================================
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>SISTEM KEPEGAWAIAN</title>
	<link href='img/granesia_logo.jpg' rel='SHORTCUT ICON'/>
	
	<link href="asset/css/bootstrap.min.css" rel="stylesheet">
	<link href="asset/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="asset/css/style.css" rel="stylesheet">
	<link rel="shortcut icon" href="<?php echo $base_url;?>asset/img/favicon.png">
	<link href="asset/css/dropzone.css" type="text/css" rel="stylesheet" /> 
	<link rel="stylesheet" href="asset/js/base/jquery.ui.all.css">
	<link rel="stylesheet" href="asset/js/gaya.css" type="text/css">
	<link rel="stylesheet" href="asset/DataTables-1.10.9/media/css/dataTables.bootstrap.css" type="text/css">
	<!--<link rel="stylesheet" href="plugins/bootstrap-3.3.6-dist/css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="plugins/bootstrap-3.3.6-dist/css/bootstrap.theme.css" type="text/css">
	<link rel="stylesheet" href="plugins/DataTables-1.10.9/media/css/dataTables.bootstrap.css" type="text/css">
	<link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.css" type="text/css">
	<link rel="stylesheet" href="plugins/datepicker/css/datepicker.css" type="text/css">
	<link rel="stylesheet" href="plugins/select2-3.5.4/select2.css" type="text/css">
	<link rel="stylesheet" href="plugins/select2-3.5.4/select2-bootstrap.css" type="text/css">
	<link rel="stylesheet" href="plugins/costum.css" type="text/css">-->
	
	
	<script type="text/javascript" src="asset/js/jquery.min.js"></script>
	<script type="text/javascript" src="asset/js/jquery.min.js"></script>
	<script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="asset/js/scripts.js"></script>
	<script type="text/javascript" src="asset/js/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="asset/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="asset/jquery.min.js"></script>
	<script type="text/javascript" src="asset/js/notifikasi.js"></script>
	<script type="text/javascript" src="asset/js/dropzone.min.js"></script>
	<script type="text/javascript" src="asset/js/ui/jquery.ui.core.js"></script>
	<script type="text/javascript" src="asset/js/ui/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="asset/js/ui/jquery.ui.button.js"></script>
	<script type="text/javascript" src="asset/js/ui/jquery.ui.position.js"></script>
	<script type="text/javascript" src="asset/js/ui/jquery.ui.menu.js"></script>
	<script type="text/javascript" src="asset/js/ui/jquery.ui.autocomplete.js"></script>
	<script type="text/javascript" src="asset/js/ui/jquery.ui.menu.js"></script>
	<script type="text/javascript" src="asset/js/ui/jquery.ui.tooltip.js"></script>
	<script type="text/javascript" src="asset/js/dable/Dable.js"></script>
	<script type="text/javascript" src="asset/DataTables-1.10.9/media/js/dataTables.bootstrap.js"></script>
	<script type="text/javascript" src="asset/DataTables-1.10.9/media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="asset/datatables1.js"></script>
	<script type="text/javascript" src="asset/script.js"></script>
	<!--<script type="text/javascript" src="plugins/datatables1.js"></script>
	<script type="text/javascript" src="plugins/angular-js/AngularJS.js"></script>
	<script type="text/javascript" src="plugins/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="plugins/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
	<script type="text/javascript" src="plugins/DataTables-1.10.9/media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="plugins/DataTables-1.10.9/media/js/dataTables.bootstrap.js"></script>
	<script type="text/javascript" src="plugins/datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="plugins/getNumber/jquery.number.js"></script>
	<script type="text/javascript" src="plugins/tanggal_datepicker.js"></script>
	<script type="text/javascript" src="plugins/select2-3.5.4/select2.js"></script>
	<script type="text/javascript" src="plugins/search-box.js"></script>
	<script type="text/javascript" src="plugins/datatables1.js"></script>
	<script type="text/javascript" src="plugins/getNumber.js"></script>-->
	
	
</head>
<body>

    <?php include ('nav.php'); ?>
<div id="container">
	
	<?php 
	isset($_GET['tab'])? $tab =$_GET['tab'] : $tab=''; ?>
	<div class="container-fluid">
	<div class="row-fluid">
			<div class="span12">
				
			</div>
		</div>
		</div>
		
		<div class="row-fluid">
			<div class="span12">
				<ul class="nav nav-tabs">
				<?php if(isset($_SESSION['role_id'])){?>
					<?php if(check_user("index","nav_karyawan",$_SESSION['index'],$_SESSION['role_id']) == TRUE){?>
					<li <?php echo $tab=='datakaryawan'?'class="active"':'';?>><a href="?tab=datakaryawan&file=datakaryawan"><i class="icon-list"></i> Data Karyawan</a></li>
					<?php }?>
					<?php if(check_user("index","nav_gaji",$_SESSION['index'],$_SESSION['role_id']) == TRUE){?>
					<li <?php echo $tab=='datagaji'?'class="active"':'';?>><a href="?tab=datagaji&file=datagaji"><i class="icon-list"></i> Data Gaji Karyawan</a></li>
					<?php }?>
					<?php if(check_user("index","nav_data",$_SESSION['index'],$_SESSION['role_id']) == TRUE){?>
					<li <?php echo $tab=='datatabel'?'class="active"':'';?>><a href="?tab=datatabel&file=datatabel"><i class=" icon-wrench"></i> Master Data Karyawan</a></li>
					<?php }?>
					<?php if(check_user("index","nav_data_gaji",$_SESSION['index'],$_SESSION['role_id']) == TRUE){?>
					<li <?php echo $tab=='datatabelgaji'?'class="active"':'';?>><a href="?tab=datatabelgaji&file=datatabelgaji"><i class=" icon-wrench"></i> Master Data Gaji</a></li>
					<?php }?>
					<?php if(check_user("index","nav_user",$_SESSION['index'],$_SESSION['role_id']) == TRUE){?>
					<li <?php echo $tab=='datausers'?'class="active"':'';?>><a href="?tab=datausers&file=datausers"><i class="icon-user"></i> Manage User</a></li>
					<?php }?>
					<?php if(check_user("index","nav_history",$_SESSION['index'],$_SESSION['role_id']) == TRUE){?>
					<!--<li <?php echo $tab=='datahistory'?'class="active"':'';?>><a href="?tab=datahistory&file=datahistory"><i class="icon-list-alt"></i> History</a></li>
					<?php }?>
					<?php if(check_user("index","nav_ppjp",$_SESSION['index'],$_SESSION['role_id']) == TRUE){?>
					<li <?php echo $tab=='daftarppjp'?'class="active"':'';?>><a href="?tab=daftarppjp&file=daftarppjp"><i class="icon-book"></i> Daftar PPJP</a></li>-->
					<?php }?>
				<?php }?>
				</ul>
			</div>
		</div>
	
	  
	<div id="content">  
		<?php 	
			//menampilkan pesan setelah berhasil login		
			if(isset($_SESSION['pesan'])){echo $_SESSION['pesan']; unset($_SESSION['pesan']);}
			//cek apakah ada file yang dituju pada direktori app jika tidak ada tampilkan pesan error	
			isset($_GET['folder']) ? $folder = $_GET['folder'] : $folder=''; 
			
			//$file = $_GET['file'];
			
			if(file_exists('app/'.$folder.'/'.$file.'.php')){
				include ('app/'.$folder.'/'.$file.'.php'); 
			}else{
				echo '<div class="well">Error : Aplikasi tidak menemukan adanya file <b>'.$file.'.php </b> pada direktori <b>app/..</b></div>';
			}
		?>
	</div>
	<?php include('footer.php'); ?>
</div>
</body>
</html>
