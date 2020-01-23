<?php
//include ('db.php');

// $username = $_GET['username'];

$id_lembur = isset($_GET['id_lembur']) ? $_GET['id_lembur'] : null;
//atau:
//$page = isset($_GET['page']) ? $_GET['page'] : false;
//atau bisa juga dengan:
//$page = isset($_GET['page']) ? $_GET['page'] : "";

$query = "SELECT * FROM t_lembur WHERE id_lembur='".$id_lembur."'";
$result = mysql_query($query) or die(mysql_error());
$data = mysql_fetch_array($result) or die(mysql_error());

empty( $file ) ? header('location:../../index.php') : '' ;
	if(isset($_SESSION['role_id'])){?>

<?php if(($_SESSION['role_id']=='1')||($_SESSION['role_id']=='3')){?>

		<div class="row-fluid">
			<div class="span2">
				<?php include "app/menutabel2.php";?>
			</div><!--/span-->
			<div class="span9">
				<a class="btn btn-success" href="index.php?tab=datatabelgaji&folder=lembur&file=lembur_data_view"> <i class="icon icon-arrow-left"></i> Back</a>

					<h3>Update Lokasi Kerja</h3>

				<form action="index.php?tab=datatabelgaji&folder=lembur&file=lembur_act_update" method="post" id="form_update" name="form_update">
					<input type="hidden" name="id_lembur" value="<?php echo $id_lembur; ?>" />

					<div class="control-group">
						<label for="password">Nama Lembur : </label>
						<div class="controls">
							<input value="<?php echo $data['nm_lembur']; ?>" type="text" name="nm_lembur" placeholder="Nama Lembur"  required />
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
}	?>           

<?php 
}else{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
}

?>