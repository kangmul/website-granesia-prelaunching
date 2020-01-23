<?php
//include ('db.php');

$id = isset($_GET['id']) ? $_GET['id'] : null;

$query = "SELECT * FROM fpemegang_kontrak WHERE id='".$id."'";
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
				<a class="btn btn-success" href="index.php?tab=datatabel&folder=pemegang_kontrak&file=pemegang_kontrak_data_view"> <i class="icon icon-arrow-left"></i> Back</a>
				<h3>Update Pemegang Kontrak</h3>
				<form action="index.php?tab=datatabel&folder=pemegang_kontrak&file=pemegang_act_update" method="post" id="form_update" name="form_update">
					<input type="hidden" name="id" value="<?php echo $id; ?>" />

					<div class="control-group">
						<label for="password">Fungsi Pemegang Kontrak : </label>
						<div class="controls">
							<input value="<?php echo $data['fungsi']; ?>" type="text=" name="fungsi" placeholder="fungsi pemegang kontrak"  required/>
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