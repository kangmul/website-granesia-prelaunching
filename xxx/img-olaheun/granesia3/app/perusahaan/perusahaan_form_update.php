<?php
//include ('db.php');

// $username = $_GET['username'];

$id_perusahaan = isset($_GET['id_perusahaan']) ? $_GET['id_perusahaan'] : null;
//atau:
//$page = isset($_GET['page']) ? $_GET['page'] : false;
//atau bisa juga dengan:
//$page = isset($_GET['page']) ? $_GET['page'] : "";

$query = "SELECT * FROM perusahaan WHERE id_perusahaan='".$id_perusahaan."'";
$result = mysql_query($query) or die(mysql_error());
$data = mysql_fetch_array($result) or die(mysql_error());

empty( $file ) ? header('location:../../index.php') : '' ;
	if(isset($_SESSION['role_id'])){?>
	
<? if(($_SESSION['role_id']=='1')||($_SESSION['role_id']=='2')){?>

		<div class="row-fluid">
			<div class="span2">
				<?php include "app/menutabel.php";?>
			</div><!--/span-->
			
			<div class="span9">
				<a class="btn btn-success" href="index.php?tab=datatabel&folder=perusahaan&file=perusahaan_data_view"> <i class="icon icon-arrow-left"></i> Back</a>

				<h3>Update PPJP</h3>

				<form action="index.php?tab=datatabel&folder=perusahaan&file=perusahaan_act_update" method="post" id="form_update" name="form_update">
					<input type="hidden" name="id_perusahaan" value="<?php echo $id_perusahaan; ?>" />

					<div class="control-group">
						
						<div class="controls">
							Nama Perusahaan: </br>
							<input value="<?php echo $data['nm_perusahaan']; ?>" class="input-block-level" style=" width:400px;" type="text" name="nm_perusahaan" placeholder="Nama Perusahaan"  required/></br>
							No Kontak: </br>
							<input value="<?php echo $data['no_telepon']; ?>" class="input-block-level" style=" width:200px;" type="text" name="no_telepon"  placeholder="No Telepon"  required/>
							<input value="<?php echo $data['fax']; ?>" class="input-block-level" style=" width:200px;" type="text" name="fax"  placeholder="Fax"  required/>
							<input value="<?php echo $data['no_hp']; ?>" class="input-block-level" style=" width:200px;" type="text" name="no_hp"  placeholder="No HP"  required/></br>
							Email: </br>
							<input value="<?php echo $data['email']; ?>" class="input-block-level" style=" width:300px;" type="text" name="email"  placeholder="Email"  required/></br>
							Alamat: </br>
							<input value="<?php echo $data['alamat']; ?>" class="input-block-level" style=" width:400px;" type="text" name="alamat"  placeholder="Jalan"  required/>
							<input value="<?php echo $data['kota']; ?>" class="input-block-level" style=" width:200px;" type="text" name="kota"  placeholder="Kota"  required/>
							<input value="<?php echo $data['kode_pos']; ?>" class="input-block-level" style=" width:200px;" type="text" name="kode_pos"  placeholder="Kode Pos"  required/>
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