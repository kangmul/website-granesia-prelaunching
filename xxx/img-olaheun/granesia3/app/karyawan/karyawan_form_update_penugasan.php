<?php
//include ('../../db.php');
// $username = $_GET['username'];

include ('config.php');
	// koneksi database -------------------------------------------->
	//<--------------------------------------------------------------
	empty( $file ) ? header('location:../../index.php') :
	'' ;

	if(isset($_SESSION['role_id'])){
	
//$index = isset($_GET['index']) ? $_GET['index'] : null;
$id_penugasan = isset($_GET['id_penugasan']) ? $_GET['id_penugasan'] : null;

$query = "SELECT * FROM penugasan WHERE id_penugasan = '".$id_penugasan."'";

$result = mysql_query($query);
$data = mysql_fetch_array($result) or die(mysql_error());

//echo "Nama Karyawan  &nbsp;: &nbsp;".$data['nm_lengkap'];
//<--------------------------------------------------------------


?>
<h3>Update History Penugasan Kekaryawanan</h3>
				    
				     
<a href="index.php?tab=datakaryawan&folder=karyawan&file=relasikerja&index=<?php echo $_GET['index']; ?>" class="btn  btn-success">
<i class="icon icon-arrow-left"></i> Kembali</a>					
						
</br>
</br>
<form action="index.php?tab=datakaryawan&folder=karyawan&file=karyawan_act_update_penugasan&index=<?php echo $_GET['index']; ?>&id_status=<?php echo $data['id_status']; ?>" method="post" id="form_update" name="form_update">
	<table class='tabelform tabpad'>
	<tr>
	<td></td><td></td><td><input type="hidden" name="id_penugasan" value="<?php echo $data['id_penugasan']; ?>" /></td>
	</tr>
	<tr>
	<td>Tahun</td><td>:&nbsp;</td><td><input class="input" name="t_penugasan" type="text" value="<?php echo $data['t_penugasan']; ?>">&nbsp;<span> format: 2000-2006</span></td>
	</tr>
	<tr>
	<td>Detail Pendidikan</td><td>:&nbsp;</td><td><input class="input" name="d_penugasan" type="text" value="<?php echo $data['d_penugasan']; ?>"></td>
	</tr>
	
	
	</table></br>
	<div class="control-group">
							<button type="submit" class="btn btn-primary">
								<i class="icon icon-plus"></i> Update
							</button>
							<button type="reset" class="btn btn-warning">
								<i class="icon icon-refresh"></i> Batal
							</button>
						</div>
	</form>
	
<?php
	} 
	else {
		echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
	}
?>

	