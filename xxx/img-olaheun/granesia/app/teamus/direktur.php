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
						<?php include "menudata2.php";?>
					</div>
				
					<div class="col-lg-9">
						<div class="panel panel-primary col-lg-12">
							<h3 class="page-header">DEWAN DIREKSI</h3>
							<img src="img/Direktur(1).jpg" width="400" height="450"></br>
							</br>
							<p>Mengucapkan terima kasih kepada para pelanggan yang telah memberikan kepercayaan dan kerjasamanya kepada kami.
							Kami berkomitmen memberikan pelayanan yang jauh lebih baik di masa yang akan datang, dengan kemampuan teknologi dan sumber daya manusia yang siap menjawab tantangan persaingan mutu dan kualitas cetak yang sesuai dengan harapan pelanggan.
							Harapan kami PT. Granesia bisa menjadi salah satu perusahaan berskala internasional.</p>
							</br>
							<p>Wassalam.</p>
							</br>
							</br>
							</br>
							</br>
							<p>Gatot Riyadi, ST. MM</p>
							<p>Direktur</p>
						</div>	
					</div>	
				</div>	
			</div>	
	</div>	
</div>					
<?php
	} 
?>