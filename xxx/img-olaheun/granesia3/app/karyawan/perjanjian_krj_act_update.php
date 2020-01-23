<?php
//include ('db.php');

$index = $_POST['index'];
isset($_POST['perjanjian_krj']) ? $perjanjian_krj_name = $_POST['perjanjian_krj'] : $perjanjian_krj_name ='';

$pdfDirectory = "\pdf\\";
if(!$_FILES['perjanjian_krj']['error']){
	$perjanjian_krj = basename($_FILES['perjanjian_krj']['name'], ".pdf"); 
	$perjanjian_krj = preg_replace("/[^A-Za-z0-9_-]/", "", $perjanjian_krj).".pdf";
	$rnd=date('Y-m-d');
	if($perjanjian_krj==''){
		$perjanjian_krj = $perjanjian_krj_name;
	}
	else {
		define ('SITE_ROOT', realpath(dirname(__FILE__)));
		$perjanjian_krj=$rnd.'-'.$perjanjian_krj;
		move_uploaded_file($_FILES['perjanjian_krj']['tmp_name'],SITE_ROOT.$pdfDirectory.$perjanjian_krj);
		}	
}

$query = "UPDATE tkjp SET perjanjian_krj= '".$perjanjian_krj."'
	
	WHERE tkjp.index ='".$index."'";
$result = mysql_query($query) or die(mysql_error());
	
if ($result > 0) {
	$_SESSION['pesan'] = '<p><div class="alert alert-success">Data Berhasil Di Update</b> </b></div></p>';

	echo "<script>; 
			location.href='index.php?tab=datakaryawan&folder=karyawan&file=berkas&index=$index';
			</script>";
		
}else{

	echo "<script>; 
			location.href='index.php?tab=datakaryawan&folder=karyawan&file=berkas&index=$index';
			</script>";
}

?>