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
						<h3 class="page-header"><label>VISI DAN MISI</h3>
				
						<p>VISI</p>
						<p>Menjadi Perusahaan Percetakan yang terbesar di Jawa Barat dari sisi kualitas, tata kelola, dan pelayanan</p>
						<p>MISI</p>

						<p>1.  Menjadi Perusahaan Percetakan yang melayani kebutuhan cetak Pikiran Rakyat Grup.</p>
						<p>2.  Menjadi Perusahaan Percetakan & Penerbitan terbaik dari sisi Pelayanan Konsumen dan Kualitas.</p>
						<p>3.  Menjadi perusahaan Percetakan Komersial yang disegani di Bandung, Jawa Barat, & Nasional.</p>
						<p>4.  Menjadi perusahan yang akan mengikuti perkembangan teknologi, khususnya teknologi grafika.</p>
						<p>5.  Menjadi perusahaan yang memiliki Sumber Daya Manusia yang potensial dari sisi pengetahuan & pendidikan, kemampuan,  moral, etika, dan tanggung jawab.</p>
						<p>6.  Memberikan Pelayanan akan kebutuhan cetakan Pikiran Rakyat Grup.</p>
						<p>7.  Memberikan pelayanan yang baik kepada seluruh konsumen, dengan menjaga kualitas dan kuantitas cetakan yang baik dan konsisten.</p>
						<p>8.  Memunculkan Brand Awareness, baik dikalangan internal maupun  eksternal perusahaan.</p>
						<p>9.  Memberikan kesejahteraan kepada seluruh karyawan dan pemilik saham.</p>
						<p>10. Melakukan inovasi di segala bidang secara konsisten dan terus menerus.</p>
						</br>
						<p>GRANESIA CORE VALUES
						<p>1. Bekerja dengan dasar integritas yang tinggi (Integrity).</p>
						<p>2. Bekerja Dengan Rasa Saling Persaudaraan Yang Bertanggung Jawab (Responsibility Relationship).</p>
						<p>3. Selalu siap menghadapi perubahan, baik intern maupun  ekstern (Adaptability).</p>
						<p>4. Selalu Fokus Kepada Konsumen (Customer Focus).</p>
						<p>5. Proses Pembelajaran Yang Berkesinambungan (Continues Learning).</p>
						<p>6. Bekerja Dengan Menjunjung Tinggi Kejujuran (Honesty).</p>
						<p>7. Energik Dan Bersemangat Tinggi Di Dalam Menghadapi Setiap Tantangan (Enthusiasm).</p>
						<p>8. Mampu Memotivasi Diri Sendiri Serta Rekan-Rekan Sekerja dan Lingkungan Untuk   Mencapai Visi PT.Granesia (Influence).</p>
						<p>9. Selalu Fokus Kepada Implementasi, Tindak Lanjut Serta Pencapaian Hasil- Hasil  Guna Memberikan Nilai Tambah dan kontribusi Kepada PT.Granesia (Action).</p></br>
						
						</div>	
					</div>	
				</div>	
			</div>
	</div>	
</div>	
				
<?php
	} 
?>
