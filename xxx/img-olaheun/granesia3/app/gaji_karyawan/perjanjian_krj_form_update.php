<?php
//include ('db.php');

$index = isset($_GET['index']) ? $_GET['index'] : null;

$query = "SELECT * FROM tkjp WHERE tkjp.index ='".$index."'";

$result = mysql_query($query) or die(mysql_error());
$data = mysql_fetch_array($result) or die(mysql_error());

empty( $file ) ? header('location:../../index.php') : '' ;
	if(isset($_SESSION['role_id'])){?>

 				<h3>PERJANJIAN KERJA UPDATE</h3>
					
				<?php
				include ('menukaryawan.php');
				?>
			<div class="row-fluid">
				<div class="span7">
					<form action="index.php?tab=datakaryawan&folder=karyawan&file=perjanjian_krj_act_update" method="post" id="form_update" name="form_update" enctype="multipart/form-data">
						<input type="hidden" name="index" value="<?php echo $data['index']; ?>" />
						<table class="table well">
                        
						  <tr>
                            <td>Perjanjian Kerja</td>
                            <td><?php echo $data['perjanjian_krj'];?>
							<input type="file" name="perjanjian_krj" required/>							</td>
                          </tr>
                        </table>
						
						
						
						<?php
						if(isset($_SESSION['pesan'])){
								echo $_SESSION['pesan'];
								unset($_SESSION['pesan']);
							}
						?>
			 	      </p>
				 	            </p>
					 	  <div class="control-group">
							<button type="submit" class="btn btn-primary">
								<i class="icon icon-plus"></i> Update
							</button>
	
						</div>
					</form>
	</div>
	
	<div class="well span4">
				<?php  include "app/no_po/nopo_data_view_bahan.php"; ?>
			</div><!--/span-->
	
	
	</div>
          
<?php 
}else{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
}

?>

