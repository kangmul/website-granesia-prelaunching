<?php
	//include('db.php');
	include ('config.php');
	// koneksi database -------------------------------------------->
	//<--------------------------------------------------------------
	empty( $file ) ? header('location:../../index.php') :
	'' ;

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
						<?php
							$index = isset($_GET['index']) ? $_GET['index'] : null;
							//$klasifikasi = isset($_GET['klasifikasi']) ? $_GET['klasifikasi'] : null;
							
							
							$query="SELECT *
											FROM tkjp
											LEFT JOIN klasifikasi ON tkjp.id_klasifikasi = klasifikasi.id_klasifikasi
											
											WHERE tkjp.index = '".$index."'";
											 
								$query_page="SELECT *
											FROM tkjp
											LEFT JOIN klasifikasi ON tkjp.id_klasifikasi = klasifikasi.id_klasifikasi
											WHERE tkjp.index = '".$index."'";
							
							
							
							$result=mysql_query($query) or die(mysql_error());
							while($rows=mysql_fetch_array($result)){
							?>
				          
				    <table class="table table-striped table-bordered">
                      <tr class="info">
					  <td colspan="5"><h4><center>Data Pribadi</center></h4></td>
					  <tr>
                             <td rowspan="24">
                               <div align="center">
                                 <?php
									if(empty($rows['foto'])){
											echo "<img src=app/karyawan/karyawan_foto/noimage.jpg width=200 height=300 class=img-rounded>";
										}
										else{
											echo "<img src=app/karyawan/karyawan_foto/$rows[foto] width=200 height=300 class=img-rounded>";
										}
								?>
                                 </div>						</td>
                      </tr>
					  <tr>
                        <!-- <?php echo $no++; ?> -->
                        <td colspan="4"><center>Profil Karyawan</center></td>
                        
                      </tr>
                      
                      <tr>
                        <td>Nama</td>
                        <td><?php echo $rows['nm_lengkap']; ?></td>
						<td>No Induk Karyawan</td>
                        <td><?php echo $rows['nik']; ?></td>
                      </tr>
                      <tr>
                        <td>Tempat, Tgl Lahir</td>
                        <td><?php echo $rows['tmp_lahir'].",".$rows['tgl_lahir']; ?></td>
                        <td>No Ktp</td>
                        <td><?php echo $rows['no_ktp']; ?></td>
                      </tr>
                      <tr>
					  
                        <td rowspan="2">Alamat </td>
                        <td rowspan="2"><?php echo $rows['alamat']; ?></td>
                        <td>No Npwp</td>
						<td><?php echo $rows['no_npwp']; ?></td>
                      </tr>
                      <tr>
                                               <td>No Jamsostek</td>
                        <td><?php echo $rows['no_jamsostek']; ?></td>
                      </tr>
                      <tr>
                        <td>Status Pekerjaan</td>
                         <td><?php echo $rows['klasifikasi']; ?></td>
                        <td>No Rek Payrol</td>
                        <td><?php echo $rows['no_rek_payroll']; ?></td>
                      </tr>
					  <tr>
                        <td>Pendidikan Terakhir</td>
                         <td><?php echo $rows['no_rek_payroll']; ?></td>
                        <td>Awal Kerja</td>
                        <td><?php echo $rows['tmt'];?></td>
                      </tr>
					   <tr>
                        <?php
							}
						?>
						
                        <td colspan="6"><center>Riwayat Pendidikan</center></td>
                       
                      </tr>
                      <tr>
					  <td colspan="6">Pendidikan Formal : </td>
                      </tr>
                      <tr>
					  <td>Tahun </td>
                       <td>Detail Pendidikan Formal </td>
                       <td colspan="2" >Action </td>
                      </tr>
					  <?php 
					  
					  $index = isset($_GET['index']) ? $_GET['index'] : null;
							
							
							$query=mysql_query("SELECT *
											FROM pendidikan
											LEFT JOIN tkjp ON tkjp.index = pendidikan.id_karyawan 
											WHERE pendidikan.id_karyawan = '".$index."'");
											
							
											
						//$result=mysql_query($query);
					  if(mysql_num_rows($query)==0){?>
					  <tr>
						<td colspan='6'>*Tidak Ada Data*</td>
						</tr>
					<?php } 
						else {
						while($rows=mysql_fetch_array($query)){?>
					  <tr>
					 <td><?php echo $rows['t_pdk']; ?></td>
					 <td><?php echo $rows['d_pdk']; ?></td>
                        <td colspan="2" >[ <a href="index.php?tab=datakaryawan&folder=karyawan
								&file=karyawan_form_update_pendidikan&index=<?php echo $index;?>
								&idp=<?php echo $rows['idp']; ?>" >edit</a> | 
						<a href="index.php?tab=datakaryawan&folder=karyawan
								&file=pendidikan_act_delete&index=<?php echo $index;?>
								&idp=<?php echo $rows['idp']; ?>" 
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
											
											var url = "app/karyawan/karyawan_form_insert_pendidikan.php?index=<?php echo $_GET['index']; ?>";
											$("#myModalLabel").html("Tambah Pendidikan");
								
											$.post(url, {index: index } ,function(data) {
											// tampilkan detailAyat.php ke dalam <div class="modal-body"></div>
											$(".modal-body").html(data).show();
											});
										});
									
									</script>
					<tr>
						<td colspan="6">Pendidikan Non Formal : </td>
					</tr>
					<tr>
					  <td>Tahun </td>
                       <td>Detail Pendidikan Non Formal </td>
                       <td colspan="2" >Action </td>
                      </tr>
					 <?php 
					  
					  $index = isset($_GET['index']) ? $_GET['index'] : null;
							
							
							$query=mysql_query("SELECT *
											FROM pdk_non_formal
											LEFT JOIN tkjp ON tkjp.index = pdk_non_formal.id_karyawan 
											WHERE pdk_non_formal.id_karyawan = '".$index."'");
											
							
											
						//$result=mysql_query($query);
					  if(mysql_num_rows($query)==0){?>
					  <tr>
						<td colspan='6'>*Tidak Ada Data*</td>
						</tr>
					<?php } 
						else {
						while($rows=mysql_fetch_array($query)){?>
					  <tr>
					 <td><?php echo $rows['t_pdk_non']; ?></td>
					 <td><?php echo $rows['d_pdk_non']; ?></td>
                        <td colspan="2" >[ <a href="index.php?tab=datakaryawan&folder=karyawan
								&file=karyawan_form_update_pendidikan_non_formal&index=<?php echo $index;?>
								&idp_non=<?php echo $rows['idp_non']; ?>" >edit</a> | 
						<a href="index.php?tab=datakaryawan&folder=karyawan
								&file=non_pendidikan_act_delete&index=<?php echo $index;?>
								&idp_non=<?php echo $rows['idp_non']; ?>" 
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
											
											var url = "app/karyawan/karyawan_form_update_pendidikan_non_formal.php?index=<?php echo $_GET['index']; ?>";
											$("#myModalLabel").html("Edit Data Pendidikan Non Formal");
								
											$.post(url, {index: index } ,function(data) {
											// tampilkan detailAyat.php ke dalam <div class="modal-body"></div>
											$(".modal-body").html(data).show();
											});
										});
										
										$(document).on( "click", '.tambah-data-non',function(e) {
											//idAlat = 0;
											var index = $(this).data('index');
											
											var url = "app/karyawan/karyawan_form_insert_pendidikan_non_formal.php?index=<?php echo $_GET['index']; ?>";
											$("#myModalLabel").html("Tambah Pendidikan Non Formal");
								
											$.post(url, {index: index } ,function(data) {
											// tampilkan detailAyat.php ke dalam <div class="modal-body"></div>
											$(".modal-body").html(data).show();
											});
										});
									
									</script>
					  
					  
					  
					  
                      </tr>
                    </table>

					    
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
	} 
	else {
		echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
	}
?>



