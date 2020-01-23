<?php
include ('../../db.php');
$id = isset($_POST['id']) ? $_POST['id'] : null;
							
$query="SELECT * FROM resensi LIMIT 1";
$result=mysql_query($query) or die(mysql_error());
	
							//proses menampilkan data
while($rows=mysql_fetch_array($result)){

?>

					  <!--Sidebar content-->

					
		<div class="panel panel-info">
			
			 <div class="panel-body">
					<div class="col-lg-12"><div class="col-lg-3"><img src="admin/app/resensi/files/<?php echo $rows['gambar'];?>" width="60" height="90"
				 class="info" name="gambar"></div>
				 
				<div class="col-lg-9"><p>Judul: &nbsp; <?php echo $rows['keterangan'];?></p><?php echo $rows['uraian'];?></div>
						<?php
							}
						?>
						
						
						</br>
					
						
					</div>
					</div>
		