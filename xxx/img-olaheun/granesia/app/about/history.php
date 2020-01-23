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
						<?php include "menudata.php";?>
					</div>
					
					<div class="col-lg-9">	
						<div class="panel panel-primary col-lg-12">
						<h3 class="page-header">Sejarah PT. Granesia</h3>
						<img src="img/gedung_jq.jpg"></br>
						</br>
						<p> Bermula dari sebuah unit pendukung produksi penerbitan Harian Umum Pikiran Rakyat, Bandung, PT. GRANESIA telah berkembang menjadi suatu badan usaha bisnis, yang bergerak dalam bidang jasa Percetakan dan Penerbitan.
						Sebagai suatu badan usaha bisnis, PT. GRANESIA tentunya menyadari mengenai kesiapan untuk bersaing dengan perusahaan sejenis, untuk itu Kami senantiasa terus menerus "melihat ke depan" mengikuti sekaligus mengaplikasikan apa yang sedang berkembang di dunia grafika.
						Peningkatan kualitas sumber daya manusia maupun teknologi industri Grafika menjadi bagian tak terpisahkan dari pengembangan PT. GRANESIA selama ini dapat dan akan terus berkesinambungan selama PT. GRANESIA masih berdiri di tengah-tengah masyarakat yang membutuhkan jasa Percetakan dan Penerbitan
						</p>
						</br>
						<img src="img/kantor_granesia2.jpg" style="float:right;"></img>
						<br>
						</div>
						</br>
					</div>	
					</br>
				</div>
			</div>				
	</div>				
</div>				
<?php
	} 
?>
