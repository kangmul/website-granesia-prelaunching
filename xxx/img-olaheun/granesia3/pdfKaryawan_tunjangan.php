<?php

include ('fpdf/fpdf.php');
include ('db.php');
date_default_timezone_set("Asia/Jakarta");

function bulan($bulan)
{
Switch ($bulan){
    case 1 : $bulan="Januari";
        Break;
    case 2 : $bulan="Februari";
        Break;
    case 3 : $bulan="Maret";
        Break;
    case 4 : $bulan="April";
        Break;
    case 5 : $bulan="Mei";
        Break;
    case 6 : $bulan="Juni";
        Break;
    case 7 : $bulan="Juli";
        Break;
    case 8 : $bulan="Agustus";
        Break;
    case 9 : $bulan="September";
        Break;
    case 10 : $bulan="Oktober";
        Break;
    case 11 : $bulan="November";
        Break;
    case 12 : $bulan="Desember";
        Break;
    }
return $bulan;
}

class PDF extends FPDF {

	
	
	public function Header() {

		//Logo
		
		//Arial bold 15
		$this->SetFont('Arial','B',15);
		//pindah ke posisi ke tengah untuk membuat judul
		//$this->Cell(80);
		//judul
		$this->Cell(0,20,'DAFTAR TUNJANGAN KARYAWAN DI PT. GRANESIA BANDUNG',0,0,'C');
		//pindah baris
		$this->Ln(20);
		//buat garis horisontal
		$this->Line(7,25,288,25);
		
		$this->SetFont('Arial', 'B', 8);
		
		
		//memanggil fungsi kerja
		$idfkerja = isset($_GET['id_fkerja']) ? $_GET['id_fkerja'] : null;
		if ($_GET['id_fkerja']!='0'){
			$sqlfkerja = mysql_query("SELECT * FROM fungsi_kerja WHERE id_fkerja='$idfkerja'");
			$rowfkerja=mysql_fetch_array($sqlfkerja) or die (mysql_error());{
				$this->Cell(65,5,"FUNGSI KERJA",0,0,'l', 0); $this->Cell(65,5,':   '.$rowfkerja['fkerja'],0,1,'L',0);
			}
		}
		//memanggil field
		$idfield = isset($_GET['id_field']) ? $_GET['id_field'] : null;
		if ($_GET['id_field']!='0'){
			$sqlfield = mysql_query("SELECT * FROM field WHERE id_field='$idfield'");
			$rowfield=mysql_fetch_array($sqlfield) or die (mysql_error());{
				$this->Cell(65,5,"FIELD",0,0,'l', 0); $this->Cell(65,5,':   '.$rowfield['nm_field'],0,1,'L',0);
			}
		}
		//memanggil lokasi
		$id_lks_kerja = isset($_GET['id_lks_kerja']) ? $_GET['id_lks_kerja'] : null;
		if($_GET['id_lks_kerja']!='0'){
			$sqllokasi = mysql_query("SELECT * FROM lokasi_kerja WHERE id_lks_kerja='$id_lks_kerja'");
			$rowlokasi=mysql_fetch_array($sqllokasi) or die (mysql_error());{
				$this->Cell(65,5,"LOKASI KERJA",0,0,'l', 0); $this->Cell(65,5,':   '.$rowlokasi['lokasi'],0,1,'L',0);
			}
		}
		
		
		$idklasifikasi = isset($_GET['id_klasifikasi']) ? $_GET['id_klasifikasi'] : null;
		if($_GET['id_klasifikasi'] != '0'){
			$sqlklasifikasi = mysql_query("SELECT * FROM klasifikasi WHERE id_klasifikasi='$idklasifikasi'");
			$rowklasifikasi=mysql_fetch_array($sqlklasifikasi) or die (mysql_error());{
				$this->Cell(65,5,"KLASIFIKASI KERJA ",0,0,'l', 0); $this->Cell(65,5,':   '.$rowklasifikasi['klasifikasi'],0,1,'L',0);
			}
		}
		
		//memanggil sistem kerja
		$id_sistem_kerja = isset($_GET['id_sistem_kerja']) ? $_GET['id_sistem_kerja'] : null;
		if($_GET['id_sistem_kerja']!='0'){
			$sqlskerja = mysql_query("SELECT * FROM sistem_kerja WHERE id_sistem_kerja='$id_sistem_kerja'");
			$rowskerja=mysql_fetch_array($sqlskerja) or die (mysql_error());{
				$this->Cell(65,5,"SISTEM KERJA",0,0,'l', 0); $this->Cell(65,5,':   '.$rowskerja['waktu'],0,1,'L',0);
			}
		}
		
		$this->Ln(5);
		
	}
		
	public function content() {

		
		$this->SetFont('Arial','',8);
			 // menentukan warna background tulisan (format RGB)
	    $this->SetFillColor(225,225,225);
	 
	    // menentukan warna drawing line
	    $this->SetDrawColor(205,205,205);
		
		$this->Cell(7,5,"No.",1,0,'C',true);	
		$this->Cell(20,5,"NIK",1,0,'C',true);
	    $this->Cell(40,5,"NAMA LENGKAP",1,0,'C',true);
		 $this->Cell(20,5,"JABATAN",1,0,'C',true);
		
		$this->Cell(23,5,"TUNJ JABATAN",1,0,'C',true);
		
		$this->Cell(23,5,"TUNJ KOM",1,0,'C',true);
		
		
		$this->Cell(23,5,"DANA TAKTIS",1,0,'C',true);
		
		
		$this->Cell(23,5,"UANG KORAN",1,0,'C',true);
		
		$this->Cell(23,5,"TUNJ MAKAN",1,0,'C',true);
		
		$this->Cell(27,5,"TUNJ TRANSPORT",1,0,'C',true);
		$this->Cell(20,5,"PERIODE",1,0,'C',true);
		$this->Cell(30,5,"TGL INPUT",1,0,'C',true);
		
		
		
	    // ganti  warna fill untuk membedakan cell
		$this->SetFillColor(245,245,245);
		
		//Mengambil Nilai Usia
		
	    // query ke Myquery_filter database
							$bulan = isset($_GET['bulan']) ? $_GET['bulan'] : date ('m');
							if(	isset($_GET['nama']) || isset($_GET['bulan']) || 
								isset($_GET['id_field']) || isset($_GET['id_lks_kerja']) || 
								isset($_GET['id_sistem_kerja']) ||
								isset($_GET['id_klasifikasi']) || 
								isset($_GET['id_fkerja'])){
								
								$sql = "SELECT 
  `tunjangan`.`id`,
  `tunjangan`.`periode`,
  `tunjangan`.`tgl_input`,
  `tkjp`.`nm_lengkap`,
  `tkjp`.`nik`,
  `tkjp`.`no_rek_payroll`,
  `t_jabatan`.`nm_jabatan`,
  `t_jabatan`.`tunjab`,
  `t_jabatan`.`tunkom`,
  `t_jabatan`.`tuntak`,
  `t_jabatan`.`tunkor`,
  `t_jabatan`.`tum`,
  `t_jabatan`.`tut`,
  `tkjp`.`id_gol`
 
											FROM tunjangan 
											LEFT JOIN tkjp ON tkjp.index = tunjangan.id_karyawan
											LEFT JOIN `t_jabatan` ON `tkjp`.`id_jabatan` = `t_jabatan`.`id_jabatan`
											
											LEFT JOIN klasifikasi ON tkjp.id_klasifikasi = klasifikasi.id_klasifikasi
											LEFT JOIN fungsi_kerja ON tkjp.id_fkerja = fungsi_kerja.id_fkerja
											LEFT JOIN field ON tkjp.id_field = field.id_field
											LEFT JOIN lokasi_kerja ON tkjp.id_lks_kerja = lokasi_kerja.id_lks_kerja
											LEFT JOIN sistem_kerja ON tkjp.id_sistem_kerja = sistem_kerja.id_sistem_kerja
											WHERE tunjangan.periode = '$bulan' AND tunjangan.hps=0";
										
										
										
										
										if ($_GET['nama'] != '0'){
										$nama = $_GET['nama'];
											$kondisi_nama = " nm_lengkap LIKE '%$nama%' || nm_pekerjaan LIKE '%$nama%' ";
											$sql = $sql." AND ".$kondisi_nama ;
										}
										
										if ($_GET['bulan'] != '0'){
										$bulan = $_GET['bulan'];
											$kondisi_bulan = " tunjangan.periode = '$bulan' ";
											$sql = $sql." AND ".$kondisi_bulan ;
										}
																		
										if($_GET['id_field'] != '0'){
											$id_field = $_GET['id_field'];
											$kondisi_field = " tkjp.id_field = '$id_field' ";
											$sql = $sql." AND ".$kondisi_field;
										}
										
										
										
										if($_GET['id_fkerja'] != '0'){
											$id_fkerja = $_GET['id_fkerja'];
											$kondisi_fungsi_kerja = " tkjp.id_fkerja = '$id_fkerja' ";
											$sql = $sql." AND ".$kondisi_fungsi_kerja;
										}
										
										if($_GET['id_lks_kerja'] != '0'){
											$id_lks_kerja = $_GET['id_lks_kerja'];
											$kondisi_lokasi = " tkjp.id_lks_kerja = '$id_lks_kerja' ";
											$sql = $sql." AND ".$kondisi_lokasi;
										}
										
										
										
										if($_GET['id_sistem_kerja'] != '0'){
											$id_sistem_kerja = $_GET['id_sistem_kerja'];
											$kondisi_sistem_kerja = " tkjp.id_sistem_kerja = '$id_sistem_kerja' ";
											$sql = $sql." AND ".$kondisi_sistem_kerja;
										}

										if($_GET['id_klasifikasi'] != '0'){
											$id_klasifikasi = $_GET['id_klasifikasi'];
											$kondisi_klasifikasi = " tkjp.id_klasifikasi = '$id_klasifikasi' ";
											$sql =$sql." AND ". $kondisi_klasifikasi;
										}
										
									$query= $sql. " order by tkjp.nm_lengkap ASC";
									$query_page= $sql;
									
						//echo $query;

							}
							
							
	    //$hasil_query = mysql_query("SELECT * FROM tkjp");
		
		
		$no=1;
	    // parsing hasil query
	    // tampilkan dengan fungsi FPDF
		$result_page = mysql_query($query_page);
		$jmldata = mysql_num_rows($result_page);
			
		//echo $jmldata;	
		if ($jmldata < 1)
		{
				$this->Cell(0,20,'TIDAK ADA DATA UNTUK FILTER DI ATAS',0,1,'R');
	
		}
		if ($jmldata > 0){
				$result=mysql_query($query) or die(mysql_error());
				while($hasil = mysql_fetch_array($result)){
				
					// ganti baris
					$this->Ln();
			 
					// tampilkan cell
					$this->Cell(7,5,$no,1,0,'C',true);
					$this->Cell(20,5,$hasil["nik"],1,0,'R',true);
					$this->Cell(40,5,$hasil["nm_lengkap"],1,0,'L',true);
					 
					
		
					$this->Cell(20,5,$hasil["nm_jabatan"],1,0,'L',true);
					$this->Cell(23,5,number_format($hasil["tunjab"],2),1,0,'R',true);
					$this->Cell(23,5,number_format($hasil["tunkom"],2),1,0,'R',true);
					
					
					$this->Cell(23,5,number_format($hasil["tuntak"],2),1,0,'R',true);
					
					$this->Cell(23,5,number_format($hasil["tunkor"],2),1,0,'R',true);
					$this->Cell(23,5,number_format($hasil["tum"],2),1,0,'R',true);
					$this->Cell(27,5,number_format($hasil["tut"],2),1,0,'R',true);
					$this->Cell(20,5,bulan($hasil["periode"]),1,0,'L',true);
					$this->Cell(30,5,$hasil["tgl_input"],1,0,'C',true);
					
					
					//$this->Cell(40,5,$hasil["tgl_mulai"]." - ".$hasil["tgl_selesai"],1,0,'L',true);
				$no++;
				}
			}
			
			$this->Cell(-60,20,'Bandung, '.date("d-m-Y H:i:s"),0,0,'R');
	}
	public function Footer() {
		//atur posisi 1.5 cm dari bawah
		$this->SetY(-15);
		//buat garis horizontal
		
		$this->Line(7,$this->GetY(),410,$this->GetY());
		//Arial italic 9
		$this->SetFont('Arial','I',9);
		//nomor halaman
		$this->Cell(0,7,'Halaman '.$this->PageNo().' dari {nb}',0,0,'R');		
	}

}


    
    //contoh pemanggilan class
    //$pdf = new PDF();
	$pdf=new PDF('P','mm',array(450,297));

    $pdf->AliasNbPages();
    $pdf->AddPage();
   $pdf->Content();
    $pdf->Output();
    ?>
