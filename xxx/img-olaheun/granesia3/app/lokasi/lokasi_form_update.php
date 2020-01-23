<?php
//include ('db.php');

// $username = $_GET['username'];

$id_lks_kerja = isset($_GET['id_lks_kerja']) ? $_GET['id_lks_kerja'] : null;
//atau:
//$page = isset($_GET['page']) ? $_GET['page'] : false;
//atau bisa juga dengan:
//$page = isset($_GET['page']) ? $_GET['page'] : "";

$query = "SELECT * FROM lokasi_kerja WHERE id_lks_kerja='".$id_lks_kerja."'";
$result = mysql_query($query) or die(mysql_error());
$data = mysql_fetch_array($result) or die(mysql_error());

empty( $file ) ? header('location:../../index.php') : '' ;
	if(isset($_SESSION['role_id'])){?>

<?php if(($_SESSION['role_id']=='1')||($_SESSION['role_id']=='2')){?>

		<div class="row-fluid">
			<div class="span2">
				<?php include "app/menutabel.php";?>
			</div><!--/span-->
			<div class="span9">
				<a class="btn btn-success" href="index.php?tab=datatabel&folder=lokasi&file=lokasi_kerja_data_view"> <i class="icon icon-arrow-left"></i> Back</a>

					<h3>Update Lokasi Kerja</h3>

				<form action="index.php?tab=datatabel&folder=lokasi&file=lokasi_act_update" method="post" id="form_update" name="form_update">
					<input type="hidden" name="id_lks_kerja" value="<?php echo $id_lks_kerja; ?>" />

					<div class="control-group">
						<label for="password">Fungsi Lokasi Kerja : </label>
						<div class="controls">
							<input value="<?php echo $data['lokasi']; ?>" type="text" name="lokasi" placeholder="lokasi kerja"  required />
						</div>
						</div>

					<?php
					if(isset($_SESSION['pesan'])){echo $_SESSION['pesan']; unset($_SESSION['pesan']);}

					?>

					<div class="control-group">
						<button type="submit" value="update" class="btn btn-primary">
							<i class="icon icon-pencil"></i> Update
						</button>
					</div>
				</form>
			</div>
		</div>
 
<?php
}else{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu superadmin </div>';
}
}else{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
}
?>