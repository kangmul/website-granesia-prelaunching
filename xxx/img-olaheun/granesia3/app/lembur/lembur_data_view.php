<?php 

//include('db.php');
// koneksi database -------------------------------------------->
if(isset($st)){
		include('config.php');
	}
//<--------------------------------------------------------------

empty( $file ) ? header('location:../../index.php') : '' ;
	if(isset($_SESSION['role_id'])){?>

<?php if(($_SESSION['role_id']=='1')||($_SESSION['role_id']=='3')){?>
<?php if(!isset($_POST['nm_lembur']) || !isset($_GET['nm_lembur']))
	$nm_lembur = '';?>
		<div class="row-fluid">
			<div class="span2">
				<?php include "app/menutabel2.php";?>
        
			</div><!--/span-->
			<div class="span9">
				<h3> DAFTAR LEMBUR</h3>
					<!-- <legend>
						CRUD PHP & Bootstrap
					</legend> -->
					<!-- MENAMBAHKAN FORM UNTUK PENCARIAN BERDASARKAN username -->
					<form method="post" class="form-search">
						<input type="text" name="nm_lembur" placeholder="Masukkan Pencarian"/>
						<a href='index.php?tab=datatabelgaji&folder=lembur&file=lembur_data_view' class="btn btn-primary" ><i class='icon-list'></i>All</a>
					</form>
					<!-- END OF FORM PENCARIAN -->
					
				<!-- MENAMBAHKAN KONFIRMASI JIKA UPDATE DATA BERHASIL -->
				<?php
				if(isset($_SESSION['pesan'])){echo $_SESSION['pesan']; unset($_SESSION['pesan']);}

				?>
				<!-- END OF KONFIRMASI UPDATE DATA -->
				 
				<table class="table table-condensed table-bordered">
					<tr class="success">
						<td>NO</td>
						<td>NAMA LEMBUR</td>
						<td>AKSI</td>
					</tr>
					
					<?php
							$batas=10;
							isset($_GET['halaman'])?$halaman=$_GET['halaman'] : $halaman='';
							$posisi=null;
							if(empty($halaman)){
							$posisi=0;
							$halaman=1;
							}else{
							$posisi=($halaman-1)* $batas;
							}

							$query="SELECT * FROM t_lembur  
							ORDER BY nm_lembur LIMIT $posisi,$batas";
							$query_page="SELECT * FROM t_lembur";
							
							//if(isset($_POST['lokasi'])){
								//$lokasi=$_POST['lokasi'];
							if(isset($_POST['nm_lembur'])||isset($_GET['nm_lembur'])){
							isset ($_POST['nm_lembur']) ? $nm_lembur = $_POST['nm_lembur'] : $nm_lembur = $_GET['nm_lembur'];
							
							$query="SELECT * FROM t_lembur 
								WHERE nm_lembur LIKE '%$nm_lembur%' LIMIT $posisi,$batas";
								$query_page="SELECT * FROM t_lembur 
								WHERE nm_lembur LIKE '%$nm_lembur%'";
							}
							$result=mysql_query($query) or die(mysql_error());
							$no=0;
							
							//proses menampilkan data
							while($rows=mysql_fetch_array($result)){

							?>

					<tr class="info">
						<!-- <td><?php echo $no++; ?></td> -->
						<td><?php echo $no+$posisi; ?></td>
						<!--<td><?php echo $rows['id']; ?></td> -->
						<td><?php echo $rows['nm_lembur']; ?></td>
						<td>
							<div class="btn-group">
							<a href="index.php?tab=datatabelgaji&folder=lembur&file=lembur_form_update&id_lembur=<?php echo $rows['id_lembur']; ?>" class="btn-small btn btn-warning">
								<i class="icon icon-pencil"></i> Update</a>
							<a href="index.php?tab=datatabelgaji&folder=lembur&file=lembur_act_delete&id_lembur=<?php echo $rows['id_lembur']; ?>" 
								onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn-small btn btn-danger">
								<i class="icon icon-trash"></i> Delete</a>
						</div>
						</td>
					</tr>
								
								<?php
								}
								?>
					<tr class="info">
						<td></td>
						<td></td>
						<td colspan="4"><a href="index.php?tab=datatabelgaji&folder=lembur&file=lembur_form_insert" class="btn-small btn  btn-success"><i class="icon icon-plus"></i> Add</a></td>
					</tr>
				</table>

					<?php
					
					$result_page = mysql_query($query_page);
					$jmldata = mysql_num_rows($result_page);
					$jmlhalaman = ceil($jmldata / $batas);
					 
					echo "<div class='pagination'><ul>"; 
					if ($halaman > 1) echo  "<li><a href=$_SERVER[PHP_SELF]?tab=$tab&folder=$folder&file=$file&lokasi=$lokasi&halaman=".($halaman-1)."'><< Prev</a></li>";

					
					for($i=1;$i<=$jmlhalaman;$i++){
						if ((($i >= $halaman - 3) && ($i <= $halaman + 3)) || ($i == 1) || ($i == $jmlhalaman))
							{
								isset($_GET['showPage']) ? $showPage =$_GET['showPage'] : $showPage='';
								if (($showPage == 1) && ($i != 2))  echo "<li class='disabled'><a href='#'>...</a></li>";
								if (($showPage != ($jmlhalaman - 1)) && ($i == $jmlhalaman))  echo "<li class='disabled'><a href='#'>...</a></li>";
								if ($i == $halaman) echo "<li class='active'><a href='#'>".$i."</a></li>";
									else echo "<li><a href=$_SERVER[PHP_SELF]?tab=$tab&folder=$folder&file=$file&lokasi=$lokasi&halaman=".$i."'>".$i."</a></li>";
								$showPage = $i;
							}
					
					}					
					if ($halaman < $jmlhalaman) echo "<li><a href=$_SERVER[PHP_SELF]?tab=$tab&folder=$folder&file=$file&lokasi=$lokasi&halaman=".($halaman+1)."'>Next >></a></li>";
				echo "</ul>";
				?>
					</div>

					<!-- MENAMPILKAN JUMLAH DATA -->

				<div class="well">
				<?php	
					echo "Jumlah Data : $jmldata";		
				?>
				</div>
				
					<!-- END OF MENAMPILKAN JUMLAH DATA -->
				
			</div><!--container-->
		</div>
 
  <?php
  }  
else
{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu superadmin </div>';
}	?>           

<?php 
}else
{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
}
?>