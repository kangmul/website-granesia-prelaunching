<?php
//include ('db.php');
$id_gallery = isset($_GET['id_gallery']) ? $_GET['id_gallery'] : null;

$query = "SELECT * FROM tools_gallery WHERE id_gallery='".$id_gallery."'";
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
				<a class="btn btn-success" href="index.php?tab=datatabel&folder=slide_show&file=slide_show_view"> <i class="icon icon-arrow-left"></i> Back</a>

				<h3>Update Slide Show</h3>

				<form action="index.php?tab=datatabel&folder=slide_show&file=slideshow_act_update" method="post" id="form_update" name="form_update" enctype="multipart/form-data">
					<input type="hidden" name="id_gallery" value="<?php echo $data['id_gallery']; ?>" />
					<input type="hidden" name="gambar_before" value="<?php echo $data['gambar']; ?>" />
					

					<div class="control-group">
						
						                           <tr>
                            <td><label>Gambar : </label></td>
                            <td>
							<?php
									if(empty($data['gambar'])){
											echo "<img src=app/slide_show/images/noimage.jpg width=55 height=55 class=img-rounded>";
										}
										else{
											echo "<img src=app/slide_show/images/$data[gambar] width=150 height=150 class=img-rounded>";
										}
								?> 
								<input  type="FILE" name="gambar" id="gambar"  value="<?php echo $data['gambar'];?>"  />
								</td>
                          </tr>

						  
                          </tr>
						  <tr>
                            <td><label>Keterangan : </label></td>
                            <td>
								<input type="text" name="keterangan" id="keterangan" value="<?php echo $data['keterangan'];?>" />							</td>
                          </tr>
					
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