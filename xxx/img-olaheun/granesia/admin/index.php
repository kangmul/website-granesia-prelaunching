<?php
session_start();
$base_url = 'http://'.$_SERVER['HTTP_HOST'].''; 

isset ($_GET['f']) ? $f = $_GET['f'] : $f = 'admin';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Granesia Administrator</title>
	<link href='../img/logo/granesia_logo.png' rel='SHORTCUT ICON'/>
	
	<!-- JQUERY DAN CSS BOOTSTRAP -->
	<link href="../plugins/bootstrap/asset/css/bootstrap.min.css" rel="stylesheet">
	<link href="../plugins/bootstrap/asset/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="../plugins/bootstrap/asset/css/bootstrap-theme.min.css" rel="stylesheet">
	
	
	<script type="text/javascript" src="../plugins/bootstrap/asset/js/jquery.min.js"></script>
	
	
	<link href='../plugins/fullcalendar/fullcalendar.css' rel='stylesheet' />
<link href='../plugins/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='../plugins/fullcalendar/lib/moment.min.js'></script>
<script src='../plugins/fullcalendar/lib/jquery.min.js'></script>
<script src='../plugins/fullcalendar/fullcalendar.min.js'></script>


	<script type="text/javascript" src="../plugins/bootstrap/asset/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="../plugins/bootstrap/asset/js/bootstrap.min.js"></script>					
	
	
		<script type="text/javascript" src="../plugins/highchart/highcharts.js"></script>
		<script type="text/javascript" src="../plugins/highchart/highcharts-more.js"></script>
	<script type="text/javascript" src="../plugins/highchart/modules/exporting.js"></script>
	
	<!-- JQUERY DAN CSS DATA TABLE -->
	<link rel="stylesheet" type="text/css" href="../plugins/DataTables/dataTables.bootstrap.css">
	<script type="text/javascript" language="javascript" src="../plugins/DataTables/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="../plugins/DataTables/dataTables.bootstrap.js"></script>
		
		
	
	
	<!-- JQUERY DAN CSS UNTUK CHART -->
	
	<link rel="stylesheet" href="../plugins/morris/morris.css">
    <script src="../plugins/jquery.knob.js"></script>
    <script src="../plugins/raphael-min.js"></script>
    <script src="../plugins/morris/morris.min.js"></script>
	
	
	
	
	
	
	
</head>
<body>
<?php 
	$t = isset($_GET['t']) ? $_GET['t'] : null;
	?>
	
<div class="container-fluid">	
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php" style="padding: 15px 0px 0px 100px;"><strong>ADMINISTRATOR GRANESIA</strong></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	
	  
	  <?php if (isset($_SESSION['level'])=='1'){?>
					<?php if (isset($_SESSION['username'])){?>
		
		<ul class="nav navbar-nav navbar-right">
			<li><a class="dropdown-toggle" href="#"><i class="glyphicon glyphicon-user"></i>&nbsp;<?php echo $_SESSION['username'];?></a></li>
			<li class="dropdown">
				<a class="btn dropdown-toggle" data-target="#" data-toggle="dropdown" href="#"><span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="index.php?fol=users&f=admin_profil"><i class="glyphicon glyphicon-user"></i> View Profile</a></li>
						<li><a href="index.php?fol=users&f=admin_form_update"><i class="glyphicon glyphicon-pencil"></i> Edit Profile</a></li>
						<li class="divider"></li>
						<li><a href="logout.php"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
					</ul>
			</li>
			<a href="#top" class="glyphicon glyphicon-arrow-up pull-right"></a>

		</ul>
					
		<?php } }?>
	

</nav>
</div><!-- /.container-fluid -->	
</br>
</br>
</br>
<div class="container-fluid">
<div class="panel panel-danger">
<div class="panel-body">

			<?php 


		
		
		
	
		 if (isset($_SESSION['level'])){
		if (isset($_SESSION['level'])=='1'){
			
			
			$p = isset($_GET['p']) ? $_GET['p'] : null;
			$f = isset($_GET['f']) ? $_GET['f'] : null;
			
			if(file_exists('app/'.$p.'/'.$f.'.php')){
				include ('app/'.$p.'/'.$f.'.php');
			}
			else {
			include('app/admin.php'); 
			}
		}
		if (isset($_SESSION['level'])!='1'){
			die("hh");
		}
		}
		else
		{
		 include('app/home.php');
		}
		
		?>
		
	
	</div>
	</div>
	</div>
	

</body>

<?php include('footer.php'); ?>
</html>
