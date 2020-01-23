<?php
	// koneksi database -------------------------------------------->
	//include('db.php');
	if(isset($st)){
		include ('config.php');
	}
	//<--------------------------------------------------------------
	empty( $file ) ? header('location:../../index.php') :
	'' ;

	if(isset($_SESSION['role_id'])){
		?>

<? if($_SESSION['role_id']=='1'){?>
		<div class="row-fluid">
			<div class="span2">
				<?php  include "app/menutabel.php"; ?>
			</div><!--/span-->
			<div class="span9">
				<h3> Halaman Link Terkait </h3>
					<!-- <legend>
						CRUD PHP & Bootstrap
					</legend> -->
					<!-- MENAMBAHKAN FORM UNTUK PENCARIAN BERDASARKAN username -->
					
					<!-- END OF FORM PENCARIAN -->
					<!-- MENAMBAHKAN KONFIRMASI JIKA UPDATE DATA BERHASIL -->
					<?php

					if(isset($_SESSION['pesan'])){
						echo $_SESSION['pesan'];
						unset($_SESSION['pesan']);
					}

					?>
				<!-- END OF KONFIRMASI UPDATE DATA -->
				<table class="table table-condensed table-bordered">
					<tr class="success">
							<td>NO</td>
						<td>URL</td>
						<td>NAMA LINK</td>
						<td>AKSI</td>
					</tr>
					<?php
							$batas=5;
							isset($_GET['halaman'])?$halaman=$_GET['halaman']:$halaman='';
							$posisi=null;

							if(empty($halaman)){
								$posisi=0;
								$halaman=1;
							} else {
								$posisi=($halaman-1)* $batas;
							}

							$query="SELECT * FROM link_terkait ORDER BY id_link LIMIT $posisi,$batas";
							$query_page="SELECT id_link FROM link_terkait";

							if(isset($_POST['id_link'])){
								$nm_perusahaan=$_POST['id_link'];
								$query="SELECT * FROM link_terkait WHERE id_link LIKE '%$id_link%'";
								$query_page="SELECT id_link FROM link_terkait WHERE id_link LIKE '%$id_link%'";
							}

							$result=mysql_query($query) or die(mysql_error());
							$no=0;
							//proses menampilkan data
							while($rows=mysql_fetch_array($result)){
								?>
					<tr class="info">
						<!-- <td><?php  echo $no++; ?></td> -->
						<td><?php  echo $no+$posisi; ?></td>
						<!--<td><?php  echo $rows['id_link']; ?></td>-->
						<td><?php  echo $rows['tag_link']; ?></td>
						<td><?php  echo $rows['nama_link']; ?></td>
						<td>
							<div class="btn-group">
							
							<a href="index.php?tab=datatabel&folder=link_terkait&file=linkterkait_form_update&id_link=<?php  echo $rows['id_link']; ?>" class="btn-small btn btn-warning">
								<i class="icon icon-pencil"></i> Update</a>
							<a href="index.php?tab=datatabel&folder=link_terkait&file=linkterkait_act_delete&id_link=<?php  echo $rows['id_link']; ?>"
								onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn-small btn btn-danger">
								<i class="icon icon-trash"></i> Delete</a>
							</div>
						</td>
					</tr>
								<?php
				 } ?>
					<tr class="info">
						
						<td></td>
						<td colspan="4"><a href="index.php?tab=datatabel&folder=link_terkait&file=linkterkait_form_insert" class="btn-small btn  btn-success"><i class="icon icon-plus"></i> Add</a></td>
					</tr>
				</table>
			
					<?php
					$result_page = mysql_query($query_page);
					$jmldata = mysql_num_rows($result_page);
					$jmlhalaman = ceil($jmldata / $batas);
					echo "<div class='pagination'><ul>";
					for($i=1;$i<=$jmlhalaman;$i++) echo "<li> <a href=$_SERVER[PHP_SELF]?folder=$folder&file=$file&halaman=$i>$i</a></li>";
					?>
					</ul>
					</div>
					
				<!-- MENAMPILKAN JUMLAH DATA -->
				<div class="well">
				<?php
					echo "Jumlah Data : $jmldata"; ?>
				</div>
				<!-- END OF MENAMPILKAN JUMLAH DATA -->
			</div>
		</div>
		

  <?}  
else{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu superadmin </div>';
}	?>

<?php
	} else {
		echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
	}
?>