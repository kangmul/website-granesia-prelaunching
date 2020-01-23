<?php 
// koneksi database -------------------------------------------->
	//include('db.php');
	if(isset($st)){
		include('config.php');
	}
//<--------------------------------------------------------------

empty( $file ) ? header('location:../../index.php') : '' ;
	if(isset($_SESSION['role_id'])){?>

		<div class="row-fluid">
			<div class="span2">
				<?php  include "app/menutabel.php"; ?>
			</div><!--/span-->
			<div class="span9">
				<h3> PJP Tidak Aktif</h3>
					<!-- <legend>
						CRUD PHP & Bootstrap
					</legend> -->
					<!-- MENAMBAHKAN FORM UNTUK PENCARIAN BERDASARKAN username -->
					<form name="user_form_search" action="" method="post" class="form-search">
						<input type="text" name="nm_lengkap" placeholder="Masukkan Pencarian"/>
						<a href='index.php?tab=datatabel&folder=karyawan&file=karyawan_history_data_view' class="btn btn-primary" ><i class='icon-list'></i>All</a>
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
				<table class="table table-striped table-bordered">
					<tr>
						<th width="5px">NO</th>
						<th width="30px">Nama lengkap</th>
						<th width="10px">NO PO</th>
						<th width="20px">status</th>
						<th width="180px">AKSI</th>
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

							$query="SELECT * FROM tkjp LEFT JOIN no_po ON tkjp.id_no_po = no_po.id_no_po
							where status = 'tidak aktif' ORDER BY nm_lengkap LIMIT $posisi,$batas";
							$query_page="SELECT nm_lengkap FROM tkjp where status = 'tidak aktif' ";

							if(isset($_POST['nm_lengkap'])||isset($_GET['nm_lengkap'])){
							isset ($_POST['nm_lengkap']) ? $nm_lengkap = $_POST['nm_lengkap'] : $nm_lengkap = $_GET['nm_lengkap'];
							
								$klasifikasi=$_POST['nm_lengkap'];
								$query="SELECT * FROM tkjp WHERE nm_lengkap LIKE '%$nm_lengkap%' and status = 'tidak aktif' ";
								$query_page="SELECT nm_lengkap FROM tkjp WHERE nm_lengkap LIKE '%$nm_lengkap%' and status = 'tidak aktif' ";
							}

							$result=mysql_query($query) or die(mysql_error());
							$no=0;
							//proses menampilkan data
							while($rows=mysql_fetch_array($result)){
								?>
					<tr>
						<!-- <td><?php  echo $no++; ?></td> -->
						<td><?php  echo $no+$posisi; ?></td>
						<td><?php  echo $rows['nm_lengkap']; ?></td>
						<td><?php  echo $rows['no_po']; ?></td>
						<td><?php  echo $rows['status']; ?></td>
						<td>
						
						
									
								<a href="index.php?tab=datatabel&folder=karyawan&file=karyawan_act_delete_hapus&index=<?php echo $rows['index']; ?>" 
								onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn-small btn btn-danger">
								<i class="icon icon-trash"></i> Delete</a>
								
								<a href="index.php?tab=datatabel&folder=karyawan&file=profil2&index=<?php echo $rows['index']; ?>" 
								class="btn-small btn btn-info">
								<i class="icon icon-search"></i> Detail</a>
								
								<a type="button" href="#myModal" 	data-index="<?php echo $rows['index']; ?>"
																	class="btn btn-warning btn-sm no_po" data-toggle="modal">
                                <i class="icon icon-ok"></i> Aktifkan Kembali</a>
								
								<script>
										$(document).on( "click", '.no_po',function(e) {
											//idAlat = 0;
											var index = $(this).data('index');
											
											var url = "app/karyawan/karyawan_form_update_nopo.php";
											$("#myModalLabel").html("Ganti NO PO");
								
											$.post(url, {index: index } ,function(data) {
											// tampilkan detailAyat.php ke dalam <div class="modal-body"></div>
											$(".modal-body").html(data).show();
											});
										});
								</script>
									
						
						</td>
					</tr>
								<?php } ?>
					
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
		
		
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
	  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
    </div>
  </div>
</div>

<?php
	} else {
		echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
	}
?>