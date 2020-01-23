<?php
include ('../../db.php');
$id = isset($_POST['id']) ? $_POST['id'] : null;
							
$query="SELECT * FROM tabel_data LIMIT 5";
$result=mysql_query($query) or die(mysql_error());

//proses menampilkan data
while($rows=mysql_fetch_array($result)){
?>

					  <!--Sidebar content-->

					
		
					<li><a href="../admin/<?php  echo $rows['url']; ?>"><?php  echo $rows['keterangan']; ?></a></li>
						<?php
							}
						?>
						
						
						
		