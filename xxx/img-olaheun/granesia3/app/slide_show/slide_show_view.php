<?php
	// koneksi database -------------------------------------------->
	//include('db.php');
	if(isset($st)){
		include('config.php');
	}
	//<--------------------------------------------------------------
	empty( $file ) ? header('location:../../index.php') :'' ;

	if(isset($_SESSION['role_id'])){
?>

<? if($_SESSION['role_id']=='1'){?>

		<div class="row-fluid">
			<div class="span2">
				<?php  include "app/menutabel.php"; ?>
			</div><!--/span-->
        
			<div class="span9">
				<h3> Halaman Slide Show </h3>
				<!-- <legend>
					CRUD PHP & Bootstrap
				</legend> -->
				<!-- MENAMBAHKAN FORM UNTUK PENCARIAN BERDASARKAN username -->
				<form method="post" class="form-search">
					<input type="text" name="keterangan" placeholder="Masukkan Pencarian"/>
					<a href='index.php?folder=slide_show&file=slide_show_view' class="btn btn-primary" ><i class='icon-list'></i>All</a>
				</form>
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
						<td>GAMBAR</td>
						<td>KETERANGAN</td>
						<td>AKSI</td>
					</tr>
					<?php
							$batas=10;
							isset($_GET['halaman'])?$halaman=$_GET['halaman'] : $halaman='';
							$posisi=null;

							if(empty($halaman)){
								$posisi=0;
								$halaman=1;
							} else {
								$posisi=($halaman-1)* $batas;
							}

							
							$query="SELECT * FROM tools_gallery ORDER BY id_gallery LIMIT $posisi,$batas";
							$query_page="SELECT * FROM tools_gallery ";
								
							if(isset($_POST['keterangan'])){
							$keterangan=$_POST['keterangan'];
							$query="SELECT * FROM tools_gallery WHERE keterangan LIKE '%$keterangan%' ";
								$query_page="SELECT * FROM tools_gallery WHERE keterangan LIKE '%$keterangan%'";

							}

							$result=mysql_query($query) or die(mysql_error());
							$no=0;
							//proses menampilkan data
							while($rows=mysql_fetch_array($result)){
								?>
					<tr class="info">
						<!-- <td><?php  echo $no++; ?></td> -->
						<td><?php  echo $no+$posisi; ?></td>
						<!--<td><?php  echo $rows['id_gallery']; ?></td>-->
						<td><?php
						if(empty($rows['gambar'])){
											echo "Tidak Ada Gambar";
										}
										else{
											echo "<img src=app/slide_show/images/$rows[gambar] width=100 height=100 class=img-rounded>";
										}
						?>
						</td>
						<td><?php  echo $rows['keterangan']; ?></td>
						<td>
							<div class="btn-group">
							
							<a href="index.php?tab=datatabel&folder=slide_show&file=slideshow_form_update&id_gallery=<?php  echo $rows['id_gallery']; ?>" class="btn-small btn btn-warning">
								<i class="icon icon-pencil"></i> Update</a>
							<a href="index.php?folder=slide_show&file=slideshow_act_delete&id_gallery=<?php  echo $rows['id_gallery']; ?>"
								onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn-small btn btn-danger">
								<i class="icon icon-trash"></i> Delete</a>
							</div>
						</td>
					</tr>
								<?php
				 } ?>
					<tr class="info">
						
						<td></td>
						<td></td>
						<td></td>
						<td colspan="4"><a href="index.php?tab=datatabel&folder=slide_show&file=slideshow_form_insert" class="btn  btn-success"><i class="icon icon-plus"></i> Add</a></td>
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