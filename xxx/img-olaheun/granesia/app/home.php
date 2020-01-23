<?php 
include ('db.php');
empty( $f) ? header('location:../index.php') : '' ;?>
 

<section id="featured">
	<!-- start slider -->
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="col-md-9">	
			</br>
			<?php include "slide.php";?>	
			</div>
			
			<div class="col-md-3 text-center">
			</br>
				<div class="panel panel-primary" style="height:420px;">
					<div class="panel-heading"><strong>Tinggalkan Pesan disini</strong></div>
						<div class="panel-body">
							<script language="JavaScript" type="text/javascript">
							function addSmiley(textToAdd){
							  document.formshout.pesan.value += textToAdd;
							  document.formshout.pesan.focus();
							}
							</script>

							<?php
							$qshoutbox=mysql_num_rows(mysql_query("select * from shoutbox"));
							if ($qshoutbox > 0){
							  //echo "<img src='shoutbox.jpg' /><br /><br />";
							  echo "<iframe src='app/chat/shoutbox.php' width=260px height=165px; border=1 solid></iframe></br></br>";
							  echo "<table class=shout width=100%>
									<form name=formshout action=app/chat/simpanshoutbox.php method=POST>
									<tr><td>Nama</td><td> : <input class=shout type=text name=nama size=21></td></tr>
									<tr><td>Website</td><td> : <input class=shout type=text name=website size=21></td></tr>
									<tr><td>Pesan:</td><td>  <textarea class=shout name='pesan' style='width: 100%; height: 100%;'></textarea></td></tr>";
							?>
									<tr><td colspan=2>
									<a onClick="addSmiley(':-)')"><img src='app/chat/smiley/1.gif'></a> 
									<a onClick="addSmiley(':-(')"><img src='app/chat/smiley/2.gif'></a>
									<a onClick="addSmiley(';-)')"><img src='app/chat/smiley/3.gif'></a>
									<a onClick="addSmiley(';-D')"><img src='app/chat/smiley/4.gif'></a>
									<a onClick="addSmiley(';;-)')"><img src='app/chat/smiley/5.gif'></a>
									<a onClick="addSmiley('<:D>')"><img src='app/chat/smiley/6.gif'></a>
									</td></tr>
							<?php
							  echo "<tr><td colspan=2><input class=shout type=submit name=submit value=Kirim><input class=shout type=reset name=reset value=Reset></td></tr>
									</form></table><br />";
							}
							?>
					
						</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section >
</br>				
				
<div class="container-fluid">				
	<div class="row">
		<div class="col-lg-12">
			<div class="col-md-4">
				<div class="panel-primary" style="height:420px;" >
					<div class="panel-heading text-center"><strong>Visi Misi</strong></div>
						<div class="panel-body">	
						<p>Visi dan Misi</p>
						<p>VISI</p>
						<p>Menjadi Perusahaan Percetakan yang terbesar di Jawa Barat dari sisi kualitas, tata kelola, dam pelayanan</p>
						<p>MISI</p>
						<p>1. Menjadi Perusahaan Percetakan yang melayani kebutuhan cetak Pikiran Rakyat Grup.</p>
						<p>2. Menjadi Perusahaan Percetakan & Penerbitan terbaik dari sisi Pelayanan Konsumen dan Kualitas.</p>
						<p>3.  Menjadi perusahaan Percetakan Komersial yang disegani di Bandung, Jawa Barat, & Nasional.</p>
						<a href="index.php?t=visi_misi&f=visi_misi" style="float:right">read more</a>
						</div>
				</div>
			</div>
		
			<div class="col-md-4">
				<div class="panel-primary" style="height:200px;">
					<div class="panel-heading"><strong>Resensi Product </strong><a href="#" style="float:right;color:white;">view all</a></div>
						<div class="panel-body">	
						<?php
							$query="SELECT * FROM resensi LIMIT 1";
							$result=mysql_query($query) or die(mysql_error());
							//proses menampilkan data
							while($rows=mysql_fetch_array($result)){?>
							<div class="col-lg-12">
								<div class="col-lg-3">
									<img src="admin/app/resensi/files/<?php echo $rows['gambar'];?>" width="60" height="90" class="info" name="gambar">
								</div>			 
								<div class="col-lg-9">
									<p>Judul: &nbsp; <?php echo $rows['keterangan'];?></p><?php echo substr($rows['uraian'], 0, 120);?></p>
								</div>
								<a href="#myModal" data-id="<?php echo $rows['id']; ?>" class="resensi" data-toggle="modal" style="float:right">read more</a>
							</div>
							<?php
							}
							?> 
						
								
						</div>	
				</div>
			</div>
		
			<div class="col-md-4">
				<div class="panel-primary" style="height:200px; ">
					<div class="panel-heading text-center"><strong>Event</strong></div>
						<div class="panel-body">
						<?php
							$select=mysql_query("select * from event LIMIT 1");
							while($rows=mysql_fetch_array($select)){?>
								<div class="col-lg-12">
									<div class="col-lg-3">
										<img src="admin/app/event/files/<?php echo $rows['gambar'];?>" width="60" height="90" class="info" name="gambar">
									</div>
									<div class="col-lg-9">"<?php echo $rows['keterangan'];?>"</br><?php echo substr($rows['uraian'], 0, 120);?></div>
									<a href="#myModal" data-id="<?php echo $rows['id']; ?>" class="event" data-toggle="modal" style="float:right">read more</a>
								</div>
							<?php
							}
							?> 
						</div>
				</div>
			</div>		
		
			<div class="col-md-4">
				<div class="panel-primary" style="height:200px; ">
					<div class="panel-heading text-center"><strong>Promo Product</strong></div>
						<div class="panel-body">
						<?php
							$select=mysql_query("select * from promo LIMIT 1");
							while($rows=mysql_fetch_array($select)){?>
								<div class="col-lg-12">
									<div class="col-lg-3">
										<img src="admin/app/promo/files/<?php echo $rows['gambar'];?>" width="60" height="90" class="info" name="gambar">
									</div>
									<div class="col-lg-9">"<?php echo $rows['keterangan'];?>"</br><?php echo substr($rows['uraian'], 0, 90);?></div>
									<a href="#myModal" data-id="<?php echo $rows['id']; ?>" class="promo" data-toggle="modal" style="float:right">read more</a>
								</div>
							<?php
							}
							?> 
						</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="panel-primary" style="height:200px;">
					<div class="panel-heading"><strong>Download Dokument</strong><a href="#myModal" data-id="<?php echo $rows['id']; ?>" class="download" data-toggle="modal" style="float:right;color:white;">view all</a></div>
						<div class="panel-body">	
							<ul>
						 
								<?php
									$query="SELECT * FROM tabel_data LIMIT 5";
										$result=mysql_query($query) or die(mysql_error());
									$no=0;
									//proses menampilkan data
									while($rows=mysql_fetch_array($result)){
										?>
								<li><a href="../admin/<?php  echo $rows['url']; ?>"><?php  echo $rows['keterangan']; ?></a></li>
								<?php }?>
							</ul>
						</div>	
				</div>
			</div>			
		</div>
	
		<div class="col-lg-12">
			<div class="col-md-9">	
				<div class="panel panel-primary" style="height:250px;" >
					<div class="panel-heading text-center"><strong>CLIENT</strong></div>
						<div class="panel-body">
						</br>
						<?php include ('konten_bawah.php'); ?>	
						</div>		
				</div>
			</div>
			<div class="col-md-3">
				<div class="panel-primary" style="height:250px;">
					<div class="panel-heading"><strong>Poling</strong></div>
						<div class="panel-body">
								<ul class="nav nav-pills nav-stacked">
									<?php
										/**
										 * @author aggha
										 * @copyright 2013
										 */
										//include "koneksi.php";
										$query = mysql_query("select * from pertanyaan;");
										echo "<form action='./admin/app/polling/vote.php' method='post'>";
										while ($data=mysql_fetch_array($query)) {
											echo "<input type='hidden' name='id' value='".$data['id_tanya']."'/>";
											echo "<b>".$data['pertanyaan']."</b><br />";
											for ($i=1;$i<=4;$i++) {
												echo "<input type='radio' name='jawaban' value='".$data['jawab_'.$i]."' />".$data['jawab_'.$i]."<br />";
											}
										}
											echo "<input type='submit' value='Vote!'/>";
											echo "<p><a href=./admin/app/polling/grafik.php>LIHAT GRAFIK</a>";
											echo "</form>";
									?>
								</ul>
						</div>
				</div>
			</div>
	
	
			<div class="col-lg-12">
				<div class="panel panel-primary"  style="height:270px;">
					<div class="panel-heading text-center"><strong>GALLERY</strong><a href="index.php?t=about&fol=about&f=gallery" style="float:right; color:white;">view all</a></div>
						<div class="panel-body">
							<div class="row">
								<?php include ('foto.php'); ?>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
</div>
		
								
								<script language="JavaScript" type="text/javascript">
								$(document).on( "click", '.resensi',function(e) {
								//idAlat = 0;
								var id = $(this).data('id');			
								var url = "app/resensi/resensi_form_view.php";
								$("#myModalLabel").html("Detail Resensi");
								$.post(url, {id: id } ,function(data) {
								// tampilkan detailAyat.php ke dalam <div class="modal-body"></div>
								$(".modal-body").html(data).show();
								});
								});
								
								
								$(document).on( "click", '.event',function(e) {
								//idAlat = 0;
								var id = $(this).data('id');							
								var url = "app/event/event_form_view.php";
								$("#myModalLabel").html("Detail Event");			
								$.post(url, {id: id } ,function(data) {
								// tampilkan detailAyat.php ke dalam <div class="modal-body"></div>
								$(".modal-body").html(data).show();
								});
								});
								
								$(document).on( "click", '.promo',function(e) {
								//idAlat = 0;
								var id = $(this).data('id');							
								var url = "app/promo/promo_form_view_modal.php";
								$("#myModalLabel").html("Detail Promo");			
								$.post(url, {id: id } ,function(data) {
								// tampilkan detailAyat.php ke dalam <div class="modal-body"></div>
								$(".modal-body").html(data).show();
								});
								});
								
								$(document).on( "click", '.foto',function(e) {
								//idAlat = 0;
								var id = $(this).data('id');							
								var url = "app/foto/foto_form_view_modal.php";
								$("#myModalLabel").html("Detail Foto");			
								$.post(url, {id: id } ,function(data) {
								// tampilkan detailAyat.php ke dalam <div class="modal-body"></div>
								$(".modal-body").html(data).show();
								});
								});
								
								$(document).on( "click", '.download',function(e) {
								//idAlat = 0;
								var id = $(this).data('id');							
								var url = "app/download/download_form_view_modal.php";
								$("#myModalLabel").html("List Download");			
								$.post(url, {id: id } ,function(data) {
								// tampilkan detailAyat.php ke dalam <div class="modal-body"></div>
								$(".modal-body").html(data).show();
								});
								});
								
								</script>	
							
				
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
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