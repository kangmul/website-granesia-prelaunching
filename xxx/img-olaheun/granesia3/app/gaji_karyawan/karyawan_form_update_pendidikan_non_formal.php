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
$idp_non = isset($_GET['idp_non']) ? $_GET['idp_non'] : null;

$query = "SELECT * FROM pdk_non_formal WHERE idp_non = '".$idp_non."'";

$result = mysql_query($query);
$data = mysql_fetch_array($result) or die(mysql_error());

//echo "Nama Karyawan  &nbsp;: &nbsp;".$data['nm_lengkap'];
//<--------------------------------------------------------------


?>
<h3>Update Pendidikan Non Formal Pegawai</h3>
				    
				     
<a href="index.php?tab=datakaryawan&folder=karyawan&file=profil&index=<?php echo $_GET['index']; ?>" class="btn  btn-success">
<i class="icon icon-arrow-left"></i> Kembali</a>					
						
</br>
</br>
<form action="index.php?tab=datakaryawan&folder=karyawan&file=karyawan_act_update_pendidikan_non_formal&index=<?php echo $_GET['index']; ?>&idp=<?php echo $data['idp_non']; ?>" method="post" id="form_update" name="form_update">
	<table class='tabelform tabpad'>
	<tr>
	<td></td><td></td><td><input type="hidden" name="idp_non" value="<?php echo $data['idp_non']; ?>" /></td>
	</tr>
	<tr>
	<td>Tahun</td><td>:&nbsp;</td><td><input class="input" name="t_pdk_non" type="text" value="<?php echo $data['t_pdk_non']; ?>">&nbsp;<span> format: 2000-2006</span></td>
	</tr>
	<tr>
	<td>Detail Pendidikan Non Formal</td><td>:&nbsp;</td><td><input class="input" name="d_pdk_non" type="text" value="<?php echo $data['d_pdk_non']; ?>"></td>
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

	