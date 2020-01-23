<?php
//include ('db.php');

$id_link = isset($_GET['id_link']) ? $_GET['id_link'] : null;

$query = "SELECT * FROM link_terkait WHERE id_link  ='".$id_link."'";
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
				<a class="btn btn-success" href="index.php?tab=datatabel&folder=link_terkait&file=linkterkait_data_view"> <i class="icon icon-arrow-left"></i> Back</a>

					<h3>Update Link Terkait</h3>
					<br />

				<form action="index.php?folder=link_terkait&file=linkterkait_act_update" method="post" id="form_update" name="form_update">
					<input type="hidden" name="id_link" value="<?php echo $id_link; ?>" />

					<div class="control-group">
						<label> Link URL : </label>
						<div class="controls">
							<input value="<?php echo $data['tag_link']; ?>" type="text" name="tag_link" placeholder="URL" class="required" maxlength="200"/>
						</div>
						<label> Nama Link : </label>
						<div class="controls">
							<input value="<?php echo $data['nama_link']; ?>" type="text" name="nama_link" id="nama_link" placeholder="Nama Link" class="required" maxlength="200"/>
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