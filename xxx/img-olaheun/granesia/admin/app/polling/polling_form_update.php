<?php
include ('db.php');

$id_tanya = isset($_GET['id_tanya']) ? $_GET['id_tanya'] : null;

$query = "SELECT * FROM pertanyaan WHERE id_tanya='".$id_tanya."'";
$result = mysql_query($query) or die(mysql_error());
$data = mysql_fetch_array($result) or die(mysql_error());

empty( $f ) ? header('location:../../index.php') : '' ;
	include "app/admin.php";
	
if($_SESSION['level']=='1'){?>

<div class="col-sm-10 main">
			<h3 class="page-header"><label>Halaman Update Polling</label></h3>

				<a class="btn btn-success" href="index.php?t=data&p=polling&f=polling_form_view"> <i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>

				<h3>Update Pertanyaan</h3>

				<div class="panel panel-info">
		 <div class="panel-body">
				<form action="index.php?t=data&p=polling&f=polling_act_update" method="post" id="form_update" name="form_update">
					<input type="hidden" name="id_tanya" value="<?php echo $data['id_tanya']; ?>" />
					

					<div class="control-group">
						
						<tr>
                            <td><label>Id_Pertanyaan : </label></td></br>
                            <td>
								<input type="text" name="id_tanya"  class="form-control" style=" width:400px;" 
								id="id_tanya" value="<?php echo $data['id_tanya'];?>" required/>							</td>
                          </tr>
						  
						  <tr>
                            <td><label>Pertanyaan : </label></td></br>
                            <td>
								<input type="text" name="pertanyaan"  class="form-control" style=" width:400px;" 
								id="pertanyaan" value="<?php echo $data['pertanyaan'];?>" required/>							</td>
                          </tr>
							
						<tr></br>
                            <td><label>Jawaban 1 : </label></td></br>
                            <td>
								<input type="text" name="jawab_1"  class="form-control" style=" width:400px;" 
								id="jawab_1" value="<?php echo $data['jawab_1'];?>" required/>							</td>
                          </tr>
						  
						  <tr></br>
                            <td><label>Jawaban 2 : </label></td></br>
                            <td>
								<input type="text" name="jawab_2"  class="form-control" style=" width:400px;" 
								id="jawab_2" value="<?php echo $data['jawab_2'];?>" required/>							</td>
                          </tr>
						  
						  <tr></br>
                            <td><label>Jawaban 3 : </label></td></br>
                            <td>
								<input type="text" name="jawab_3"  class="form-control" style=" width:400px;" 
								id="jawab_3" value="<?php echo $data['jawab_3'];?>" required/>							</td>
                          </tr>
						  
						  <tr></br>
                            <td><label>Jawaban 4 : </label></td></br>
                            <td>
								<input type="text" name="jawab_4"  class="form-control" style=" width:400px;" 
								id="jawab_4" value="<?php echo $data['jawab_4'];?>" required/>							</td>
                          </tr>
						  
					</div>

					<?
					if(isset($_SESSION['pesan'])){echo $_SESSION['pesan']; unset($_SESSION['pesan']);}

					?>
</br>
					<div class="control-group">
						<button type="submit" value="update" class="btn btn-primary">
							<i class="glyphicon glyphicon-saved"></i> Update
						</button>
					
					</div>
						</br>
				</form>
			</div>
			</div>
			</div>
		</div>
 

  <?php }  
else {
		echo '<div class="alert alert-error"> Maaf Anda anda tidak punya akses </div>';
	}
?>