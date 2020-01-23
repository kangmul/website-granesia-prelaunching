<?php 
	
	include('db.php');
	// koneksi database -------------------------------------------->
	//<--------------------------------------------------------------
	empty( $f ) ? header('location:../../index.php') :
	'' ;
	
if(isset($_GET['t'])){?>
	
<div class="main">
	<div class="container-fluid">
		<div class="row" style="height:8px; background-color:blue;" ></div>
			<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-3">
					<div class="panel panel-primary col-lg-12">
						<h4><p align="center"> CONTACT US</p></h4> 
					</div>
				
			
				<div class="panel panel-primary col-lg-12" style="height:400px;">
					<h4><p align="center"><strong>Download Dokument</strong></p></h4>
						<div class="panel-body">	
							<ul>
						 
								<?php
									$query="SELECT * FROM tabel_data ";
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
				
				<div class="col-lg-9">
					<div class="panel panel-primary col-lg-12">
						<h5 class="page-header"><label>KONTAK DENGAN KAMI</label></h5>
						<?php
											
											if(isset($_SESSION['pesan'])){echo $_SESSION['pesan']; unset($_SESSION['pesan']);}

											?>
						<p>Untuk informasi dan keterangan yang Anda perlukan, bagian pemasaran Kami siap membantu Anda setiap saat.</p>

						<table width="600">
						  <form action="index.php?t=kontak&fol=kontak&f=kontak_act_insert" method="post" id="form_insert" name="form_insert" enctype="multipart/form-data">
							<tr>
							  <td colspan="2"><h5>Kontak Kami</h5></td>
							</tr>
							<tr>
							  <td>Nama :</td>
							  <td><input name="nama" type="text" id="nama" size="30" ></td>
							</tr>
							<tr>
							  <td><p>Email :</p>      </td>
							  <td><input name="email" type="text" id="email" size="30" ></td>
							</tr>
							<tr>
							  <td>Pesan :</td>
							  <td><textarea name="pesan" cols="40" rows="5" id="pesan" ></textarea></td>
							</tr>
							
							<tr>
							  <td>&nbsp;</td>
							  <td><input type="submit" name="btnKirim" value="Kirim" id="btnKirim">
							  <input type="reset" name="btnUlangi" id="button" value="Ulangi"></td>
							</tr>
						  </form>
						</table>
						</br>
						<div class="row">
							<div class="col-lg-12">
								<div class="col-lg-6">
									<h5>Sales & Marketing :</h5>
										<p>Jl. Sekelimus Barat No.6 Bandung 40266</p>
										<p>Telp    : 022-7562929 - 7569339</p>
										<p>Fax     : 022-7562626</p>
										<p>Website    : www.granesia.co.id</p>
										<p>E-mail      : pemasaran@granesia.co.id</p>
								</div>
								<div class="col-lg-6">
									<h5>Management:</h5>
										<p>Jl. Soekarno Hatta No.147 Bandung 40223</p>
										<p>Telp   : 022-6046239, 6046199</p>
										<p>Fax    : 022-6033478</p>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12">
								<div class="col-lg-4">
									
										<h5>PIC Marketing PT.Granesia :</h5>
										<p>Budi Handoko               085722520066</p>
										<p>Hendra Darmawan        0811232463</p>
										<p>Roni Martono                08122171501</p>
										<p>M.Amin Budiman           081394062711</p>
										<p>Irawan Effendi               081322869090</p>
										<p>Hj.Ria Komariah            08122023920</p>
										<p>Shinta Dayawanty          081220808087</p>
								</div>
							
							
								<div class="col-lg-8">
									

									<img src="./img/marketing.jpg" width="550" height="350" class="info" name="gambar"></img>
								</div>
							</div>

										


							
						</div>			
					</div>			
				</div>	
			</div>	
		</div>	
	</div>		
</div>		
<?php
	} 
?>
