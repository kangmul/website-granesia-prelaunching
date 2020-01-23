<?php
//include ('db.php');

// $username = $_GET['username'];

$id_pekerjaan = isset($_GET['id_pekerjaan']) ? $_GET['id_pekerjaan'] : null;
//atau:
//$page = isset($_GET['page']) ? $_GET['page'] : false;
//atau bisa juga dengan:
//$page = isset($_GET['page']) ? $_GET['page'] : "";

$query = "SELECT * FROM pekerjaan WHERE id_pekerjaan='".$id_pekerjaan."'";
$result = mysql_query($query) or die(mysql_error());
$data = mysql_fetch_array($result) or die(mysql_error());

empty( $file ) ? header('location:../../index.php') : '' ;
	if(isset($_SESSION['role_id'])){?>

<? if($_SESSION['role_id']=='1'){?>

		<div class="row-fluid">
			<div class="span2">
				<?php include "app/menutabel.php";?>
			</div><!--/span-->
			<div class="span9">
				<a class="btn btn-success" href="index.php?tab=datatabel&folder=pekerjaan&file=pekerjaan_data_view"> <i class="icon icon-arrow-left"></i> Back</a>

				<h3>Input Pekerjaan</h3>

				<form action="index.php?tab=datatabel&folder=pekerjaan&file=pekerjaan_act_update" method="post" id="form_update" name="form_update">
					<input type="hidden" name="id_pekerjaan" value="<?php echo $id_pekerjaan; ?>" />

					<div class="control-group">
						<label for="password">Update Master Pekerjaan : </label>
						<div class="controls">
							<input value="<?php echo $data['nm_pekerjaan']; ?>" type="text=" name="nm_pekerjaan" placeholder="Masukan Pekerjaan"  required/>
						</div>
					</div>

					<?
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
   <?}  
else{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu superadmin </div>';
}	?>         

<?php 
}else{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
}
?>