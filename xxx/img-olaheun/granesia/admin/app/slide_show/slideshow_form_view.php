<?php
include ('../../db.php');
echo "ID :".$_POST['id']."</br>";
$id = isset($_POST['id']) ? $_POST['id'] : null;
			 			
$query="SELECT * FROM tools_gallery WHERE id='".$id."'";
echo $query;	
$result=mysql_query($query) or die(mysql_error());
	
		//echo $result;						//proses menampilkan data
$rows=mysql_fetch_array($result)


?>
					  <!--Sidebar content -->
					<div class="panel panel-info">
					
					<img src="admin/app/slide_show/files/<?php echo $rows['gambar'];?>" width="60" height="60" title="<?php echo $rows['keterangan'];?>" > </img>
					<?php echo $rows['isi_berita'];  ?>
						
						
					</div>
					
		