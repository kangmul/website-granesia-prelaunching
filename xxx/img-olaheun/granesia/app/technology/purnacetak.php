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
						<?php include "menudata3.php";?>
					</div>
					
					<div class="col-lg-9">
						<div class="panel panel-primary col-lg-12">
							<h3 class="page-header">PURNA CETAK</h3>
							<img src="img/purna_cetak.jpg">
							</br>
							<p> Proses purna cetak, sebagai akhir dari seluruh rangkaian pekerjaan produksi cetakan, sejumlah perangkat purna cetak pendukung, agar bisa menghasilkan produk cetakan lebih sempurna, mulai dari mesin jilid kawat, blok lem, mesin potong, sampai dengan mesin laminating, spot UV, Foil, serta Embossing.
							Dengan terintegrasinya proses cetak yang dimulai  dari desain, layout, pembuatan film separasi (CTP dan CTCP),proses produksi, dan purna cetak, Kami menjadikan proses produksi begitu cepat dan akurat, yang menjadikan " ONE STOP SOLUTION FOR PRESS & COMMERCIAL PRINTING"
							</p>
						
							<img src="img/produksi_gal.jpg" width="400" height="400" style="float:right;">	
						</div>	
					</div>	
				</div>
			</div>
	</div>	
</div>	
				
<?php
	} 
?>
