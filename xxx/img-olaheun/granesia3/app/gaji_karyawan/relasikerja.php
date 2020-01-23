<?php
	//include('db.php');
	// koneksi database -------------------------------------------->
	//<--------------------------------------------------------------
	empty( $file ) ? header('location:../../index.php') :
	'' ;
	
	$nik = isset($_GET['nik']) ? $_GET['nik'] : null;

	if(isset($_SESSION['role_id'])){
		?>
		<h3>Detail PJP</h3>
		<?php
						include ('menukaryawan.php');
						?>
	<div class="row-fluid">	
		
		  <?php
						if(isset($_SESSION['pesan'])){
							echo $_SESSION['pesan'];
							unset($_SESSION['pesan']);
						}
						?>

<!--						
				      
				        <?php
						
						$index = isset($_GET['index']) ? $_GET['index'] : null;
							
							
							$query="SELECT *
											FROM tkjp
											LEFT JOIN klasifikasi ON tkjp.id_klasifikasi = klasifikasi.id_klasifikasi
											LEFT JOIN fpemegang_kontrak ON tkjp.id_fpemegang_kontrak = fpemegang_kontrak.id
											LEFT JOIN fungsi_kerja ON tkjp.id_fkerja = fungsi_kerja.id_fkerja
											LEFT JOIN field ON tkjp.id_field = field.id_field
											LEFT JOIN lokasi_kerja ON tkjp.id_lks_kerja = lokasi_kerja.id_lokasi
											LEFT JOIN sistem_kerja ON tkjp.id_sistem_kerja = sistem_kerja.id
											LEFT JOIN no_po ON tkjp.id_no_po = no_po.id_no_po
											LEFT JOIN perusahaan ON no_po.id_perusahaan = perusahaan.id_perusahaan
											
											WHERE  tkjp.index ='".$index."'";
											 
								$query_page="SELECT *
											FROM tkjp
											LEFT JOIN klasifikasi ON tkjp.id_klasifikasi = klasifikasi.id_klasifikasi
											LEFT JOIN fpemegang_kontrak ON tkjp.id_fpemegang_kontrak = fpemegang_kontrak.id
											LEFT JOIN fungsi_kerja ON tkjp.id_fkerja = fungsi_kerja.id_fkerja
											LEFT JOIN field ON tkjp.id_field = field.id_field
											LEFT JOIN lokasi_kerja ON tkjp.id_lks_kerja = lokasi_kerja.id_lokasi
											LEFT JOIN sistem_kerja ON tkjp.id_sistem_kerja = sistem_kerja.id
											LEFT JOIN no_po ON tkjp.id_no_po = no_po.id_no_po
											LEFT JOIN perusahaan ON no_po.id_perusahaan = perusahaan.id_perusahaan
											
											WHERE tkjp.index ='".$index."'";
							
							
							
							$result=mysql_query($query) or die(mysql_error());
						
							//proses menampilkan data
							while($rows=mysql_fetch_array($result)){

						?>
				
   <div class="span7">
				   <table class="table table-striped table-bordered">
                    <tr class="info">
					  <td colspan="2"><h4><center>Data Relasi Pekerjaan</center></h4></td>
					  </tr>
					<tr>
                        <td>Field</td>
                        <td><?php echo $rows['nm_field']; ?></td>
                      </tr>
					   <tr>
                        <td>Pemegang kontrak</td>
                        <td><?php echo $rows['fungsi']; ?></td>
                      </tr>
					<tr>
                        <td>Fungsi kerja</td>
                        <td><?php echo $rows['fkerja']; ?></td>
                      </tr>
					 <tr>
                        <td>Lokasi kerja</td>
                        <td><?php echo $rows['lokasi']; ?></td>
                      </tr>
					
                      <tr>
                        <?php echo $no++; ?> 
                        <td>Klasifikasi</td>
                        <td><?php echo $rows['klasifikasi']; ?></td>
                      </tr>
                      <tr>
                        <td>Pekerjaan</td>
                        <td><?php echo $rows['nm_pekerjaan']; ?></td>
                      </tr>
                     <tr>
                        <td>System kerja</td>
                        <td><?php echo $rows['waktu']; ?></td>
                      </tr>
                      <tr>
                        <td>Perusahaan</td>
                        <td><?php echo $rows['nm_perusahaan']; ?></td>
                      </tr>
                      <tr>
                        <td>No po</td>
                        <td><?php echo $rows['no_po']; ?></td>
                      </tr>
                      <tr>
                        <td>Awal Kontrak Kerja</td>
                        <td><?php echo $rows['awal_kontrak']; ?></td>
                      </tr>
                      <tr>
                        <td>Akhir Kontrak Kerja</strong>
                            </p></td>
                        <td><?php echo $rows['ahir_kontrak']; ?></td>
                      </tr>
					  <tr>
                        <td>TMT</strong>
                            </p></td>
                        <td><?php echo $rows['tmt']; ?></td>
                      </tr>
                      <tr>
                        <td>Judul kontrak</td>
                        <td><?php echo $rows['judul_kontrak']; ?></td>
                      </tr>
                    </table>
					</div>
				   </div>
				              <?php
							}
						?>
						-->
				              <!-- END OF MENAMPILKAN JUMLAH DATA -->
							  
					 <table class="table table-striped table-bordered">
                      <tr class="info">
							  <td colspan="6"><center>History Pekerjaan Pegawai</center></td>
                       
                      </tr>
                      <tr>
					  <td colspan="6">Status Kekaryawanan : </td>
                      </tr>
                      <tr>
					  <td>Tahun </td>
                       <td>Detail Status </td>
                       <td colspan="2" >Action </td>
                      </tr>
					  <?php 
					  
					  $index = isset($_GET['index']) ? $_GET['index'] : null;
							
							
							$query=mysql_query("SELECT *
											FROM status_karyawan
											LEFT JOIN tkjp ON tkjp.index = status_karyawan.id_karyawan 
											WHERE status_karyawan.id_karyawan = '".$index."'");
											
							
											
						//$result=mysql_query($query);
					  if(mysql_num_rows($query)==0){?>
					  <tr>
						<td colspan='6'>*Tidak Ada Data*</td>
						</tr>
					<?php } 
						else {
						while($rows=mysql_fetch_array($query)){?>
					  <tr>
					 <td><?php echo $rows['t_status']; ?></td>
					 <td><?php echo $rows['d_status']; ?></td>
                        <td colspan="2" >[ <a href="index.php?tab=datakaryawan&folder=karyawan
								&file=karyawan_form_update_status_kekaryawanan&index=<?php echo $index;?>
								&id_status=<?php echo $rows['id_status']; ?>" >edit</a> | 
						<a href="index.php?tab=datakaryawan&folder=karyawan
								&file=status_kekaryawanan_act_delete&index=<?php echo $index;?>
								&id_status=<?php echo $rows['id_status']; ?>" 
				onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">hapus</a>]</td>
                      </tr>
					  <?php 
					  } }
					  ?>
                      <tr>
						<td colspan="6"><a href="#myModal" data-index="<?php echo $_GET['index']; ?>" class="tambah-data" data-toggle="modal">Tambah Data</a></td>
                      </tr>
					  
					  <script>
										
										
										$(document).on( "click", '.tambah-data',function(e) {
											//idAlat = 0;
											var index = $(this).data('index');
											
											var url = "app/karyawan/karyawan_form_insert_status_kekaryawanan.php?index=<?php echo $_GET['index']; ?>";
											$("#myModalLabel").html("Tambah Status Kekaryawanan");
								
											$.post(url, {index: index } ,function(data) {
											// tampilkan detailAyat.php ke dalam <div class="modal-body"></div>
											$(".modal-body").html(data).show();
											});
										});
									
									</script>
					<tr>
						<td colspan="6">Penugasan / Penempatan : </td>
					</tr>
					<tr>
					  <td>Tahun </td>
                       <td>Detail Penugasan </td>
                       <td colspan="2" >Action </td>
                      </tr>
					 <?php 
					  
					  $index = isset($_GET['index']) ? $_GET['index'] : null;
							
							
							$query=mysql_query("SELECT *
											FROM penugasan
											LEFT JOIN tkjp ON tkjp.index = penugasan.id_karyawan 
											WHERE penugasan.id_karyawan = '".$index."'");
											
							
											
						//$result=mysql_query($query);
					  if(mysql_num_rows($query)==0){?>
					  <tr>
						<td colspan='6'>*Tidak Ada Data*</td>
						</tr>
					<?php } 
						else {
						while($rows=mysql_fetch_array($query)){?>
					  <tr>
					 <td><?php echo $rows['t_penugasan']; ?></td>
					 <td><?php echo $rows['d_penugasan']; ?></td>
                        <td colspan="2" >[ <a href="index.php?tab=datakaryawan&folder=karyawan
								&file=karyawan_form_update_penugasan&index=<?php echo $index;?>
								&id_penugasan=<?php echo $rows['id_penugasan']; ?>" >edit</a> | 
						<a href="index.php?tab=datakaryawan&folder=karyawan
								&file=penugasan_act_delete&index=<?php echo $index;?>
								&id_penugasan=<?php echo $rows['id_penugasan']; ?>" 
				onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">hapus</a>]</td>
                      </tr>
					  <?php 
					  } }
					  ?>
                      <tr>
						<td colspan="6"><a href="#myModal" data-index="<?php echo $_GET['index']; ?>" class="tambah-data-non" data-toggle="modal">Tambah Data</a></td>
                      </tr>
					  
					  <script>
										$(document).on( "click", '.edit-data-non',function(e) {
											//idAlat = 0;
											var index = $(this).data('index');
											
											var url = "app/karyawan/karyawan_form_update_penugasan.php?index=<?php echo $_GET['index']; ?>";
											$("#myModalLabel").html("Edit Data Pendidikan Non Formal");
								
											$.post(url, {index: index } ,function(data) {
											// tampilkan detailAyat.php ke dalam <div class="modal-body"></div>
											$(".modal-body").html(data).show();
											});
										});
										
										$(document).on( "click", '.tambah-data-non',function(e) {
											//idAlat = 0;
											var index = $(this).data('index');
											
											var url = "app/karyawan/karyawan_form_insert_penugasan.php?index=<?php echo $_GET['index']; ?>";
											$("#myModalLabel").html("Tambah History Penugasan Karyawan");
								
											$.post(url, {index: index } ,function(data) {
											// tampilkan detailAyat.php ke dalam <div class="modal-body"></div>
											$(".modal-body").html(data).show();
											});
										});
									
									</script>
      
	   </tr>
                    </table>
	
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



