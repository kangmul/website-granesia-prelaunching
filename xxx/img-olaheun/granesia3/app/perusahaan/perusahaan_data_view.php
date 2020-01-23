<?php
	//include('db.php');
	// koneksi database -------------------------------------------->
	if(isset($st)){
		include('config.php');
	}
	//<--------------------------------------------------------------
	empty( $file ) ? header('location:../../index.php') :
	'' ;

	if(isset($_SESSION['role_id'])){
		?>

		<? if(($_SESSION['role_id']=='1')||($_SESSION['role_id']=='2')){?>
		<?if(!isset($_POST['nm_perusahaan']) || !isset($_GET['nm_perusahaan'])) $nm_perusahaan = '';?>
		
		<div class="row-fluid">
			<div class="span2">
				<?php  include "app/menutabel.php"; ?>
			</div><!--/span-->
		  <div class="span9">
				<h3> PPJP</h3>
					<!-- <legend>
						CRUD PHP & Bootstrap
					</legend> -->
					<!-- MENAMBAHKAN FORM UNTUK PENCARIAN BERDASARKAN username -->
					<form name="user_form_search" action="" method="post" class="form-search">
						<input type="text" name="nm_perusahaan" placeholder="Masukkan Pencarian"/>
						<a href='index.php?tab=datatabel&folder=perusahaan&file=perusahaan_data_view' class="btn btn-primary" ><i class='icon-list'></i>All</a>
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
                  <td rowspan="2"><div align="center">
                      <p>&nbsp;</p>
                    <p>NO</p>
                  </div></td>
                  <td rowspan="2"><div align="center">
                      <p>&nbsp;</p>
                    <p>NAMA PERUSAHAAN</p>
                  </div></td>
                  <td colspan="3"><div align="center">NOMOR KONTAK </div></td>
                  <td rowspan="2"><div align="center">
                      <p>&nbsp;</p>
                    <p>EMAIL</p>
                  </div></td>
				   <td colspan="3"><div align="center">
                    <p>EMAIL</p></div></td>
                  <td colspan="3" rowspan="2"><div align="center">
                    <p>&nbsp;</p>
                    <p>AKSI</p>
                  </div></td>
                </tr>
                <tr class="success">
                  <td><div align="center">TELEPON</div></td>
                  <td><div align="center">FAX</div></td>
                  <td><div align="center">HP</div></td>
                  <td><div align="center">JALAN</div></td>
                  <td><div align="center">KOTA</div></td>
                  <td><div align="center">KODE POS</div></td>
                </tr>
                <?php
							$batas=10;
							isset($_GET['halaman']) ? $halaman=$_GET['halaman'] : $halaman='';
							$posisi=null;

							if(empty($halaman)){
								$posisi=0;
								$halaman=1;
							} else {
								$posisi=($halaman-1)* $batas;
							}

							$query="SELECT * FROM perusahaan LIMIT $posisi,$batas";
							$query_page="SELECT nm_perusahaan FROM perusahaan";

							//if(isset($_POST['nm_perusahaan'])){
								//$nm_perusahaan=$_POST['nm_perusahaan'];
							if(isset($_POST['nm_perusahaan'])||isset($_GET['nm_perusahaan'])){
							isset ($_POST['nm_perusahaan']) ? $nm_perusahaan = $_POST['nm_perusahaan'] : $nm_perusahaan = $_GET['nm_perusahaan'];
								
								$query="SELECT * FROM perusahaan 
								WHERE nm_perusahaan LIKE '%$nm_perusahaan%' || no_telepon LIKE '%$nm_perusahaan%' ||
								email LIKE '%$nm_perusahaan%' || alamat LIKE '%$nm_perusahaan%'
								LIMIT $posisi,$batas";
								$query_page="SELECT nm_perusahaan FROM perusahaan WHERE nm_perusahaan LIKE '%$nm_perusahaan%' || no_telepon LIKE '%$nm_perusahaan%' ||
								email LIKE '%$nm_perusahaan%' || alamat LIKE '%$nm_perusahaan%'";
							}

							$result=mysql_query($query) or die(mysql_error());
							$no=0;
							//proses menampilkan data
							while($rows=mysql_fetch_array($result)){
								?>
                <tr class="info">
                  <!-- <td><?php  echo $no++; ?></td> -->
                  <td><div align="center">
                      <?php  echo $no+$posisi; ?>
                  </div></td>
                  <!--<td><?php  echo $rows['id_perusahaan']; ?></td>-->
                  <td><?php  echo $rows['nm_perusahaan']; ?></td>
                  <td class="success" ><?php  echo $rows['no_telepon']; ?></td>
                  <td class="success" ><?php  echo $rows['fax']; ?></td>
                  <td class="success" ><?php  echo $rows['no_hp']; ?></td>
                  <td><?php  echo $rows['email']; ?></td>
                  <td class="success" ><?php  echo $rows['alamat']; ?></td>
                  <td class="success" ><?php  echo $rows['kota']; ?></td>
                  <td class="success" ><?php  echo $rows['kode_pos']; ?></td>
                  <td colspan="2"><?php if(check_user("perusahaan","update",$_SESSION['index'],$_SESSION['role_id']) == TRUE){?>
                      <div class="btn-group"> <a href="index.php?tab=datatabel&folder=perusahaan&file=perusahaan_form_update&id_perusahaan=<?php  echo $rows['id_perusahaan']; ?>" class="btn-small btn btn-warning"> <i class="icon icon-pencil"></i>Update</a>
                          <?php }?>
                          <?php if(check_user("perusahaan","delete",$_SESSION['index'],$_SESSION['role_id']) == TRUE){?>
                  <a href="index.php?tab=datatabel&folder=perusahaan&file=perusahaan_act_delete&id_perusahaan=<?php  echo $rows['id_perusahaan']; ?>"
								onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn-small btn btn-danger"> <i class="icon icon-trash"></i>Delete</a> </div>                    <?php }?>                  </td>
                </tr>
                <?php
				 } ?>
                <tr class="info">
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
                  <td colspan="6"><?php if(check_user("perusahaan","insert",$_SESSION['index'],$_SESSION['role_id']) == TRUE){?>
                      <a href="index.php?tab=datatabel&folder=perusahaan&file=perusahaan_form_insert" class="btn  btn-success"><i class="icon icon-plus"></i> Add</a>
                  <?php }?>                  </td>
                </tr>
              </table>
			  <?php
					$result_page = mysql_query($query_page);
					$jmldata = mysql_num_rows($result_page);
					$jmlhalaman = ceil($jmldata / $batas);
					echo "<div class='pagination'><ul>"; 
					if ($halaman > 1) echo  "<li><a href=$_SERVER[PHP_SELF]?tab=$tab&folder=$folder&file=$file&nm_perusahaan=$nm_perusahaan&halaman=".($halaman-1)."'><< Prev</a></li>";

					
					for($i=1;$i<=$jmlhalaman;$i++){
						if ((($i >= $halaman - 3) && ($i <= $halaman + 3)) || ($i == 1) || ($i == $jmlhalaman))
							{
								isset($_GET['showPage']) ? $showPage =$_GET['showPage'] : $showPage='';
								if (($showPage == 1) && ($i != 2))  echo "<li class='disabled'><a href='#'>...</a></li>";
								if (($showPage != ($jmlhalaman - 1)) && ($i == $jmlhalaman))  echo "<li class='disabled'><a href='#'>...</a></li>";
								if ($i == $halaman) echo "<li class='active'><a href='#'>".$i."</a></li>";
									else echo "<li><a href=$_SERVER[PHP_SELF]?tab=$tab&folder=$folder&file=$file&nm_perusahaan=$nm_perusahaan&halaman=".$i."'>".$i."</a></li>";
								$showPage = $i;
							}
					
					}					
					if ($halaman < $jmlhalaman) echo "<li><a href=$_SERVER[PHP_SELF]?tab=$tab&folder=$folder&file=$file&nm_perusahaan=$nm_perusahaan&halaman=".($halaman+1)."'>Next >></a></li>";
				echo "</ul>";?>
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