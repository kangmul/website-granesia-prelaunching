<?php

include ('fpdf/fpdf.php');
include ('db.php');
date_default_timezone_set("Asia/Jakarta");

class PDF extends FPDF {

	
	
	public function Header() {

		//Logo
		
		//Arial bold 15
		$this->SetFont('Arial','B',15);
		//pindah ke posisi ke tengah untuk membuat judul
		//$this->Cell(80);
		//judul
		$this->Cell(0,20,'DAFTAR KARYAWAN DI PT. GRANESIA BANDUNG',0,0,'L');
		//pindah baris
		$this->Ln(20);
		//buat garis horisontal
		$this->Line(7,25,410,25);
		
		$this->SetFont('Arial', 'B', 8);
		
		
		//memanggil pemegang Kontrak
		//$idpkontrak = isset($_GET['id_fpemegang_kontrak']) ? $_GET['id_fpemegang_kontrak'] : null;
		//if ($_GET['id_fpemegang_kontrak']!='0'){
		//	$sqlpkontrak = mysql_query("SELECT * FROM fpemegang_kontrak WHERE id='$idpkontrak'");
		//	$rowpkontrak=mysql_fetch_array($sqlpkontrak) or die (mysql_error()); {
		//		$this->Cell(65,5,"PEMEGANG KONTRAK",0,0,'l', 0); $this->Cell(65,5,':   '.$rowpkontrak['fungsi'],0,1,'L',0);
		//	}
		//}
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
		$id_lokasi = isset($_GET['id_lks_kerja']) ? $_GET['id_lks_kerja'] : null;
		if($_GET['id_lks_kerja']!='0'){
			$sqllokasi = mysql_query("SELECT * FROM lokasi_kerja WHERE id_lokasi='$id_lokasi'");
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
		$idskerja = isset($_GET['id_sistem_kerja']) ? $_GET['id_sistem_kerja'] : null;
		if($_GET['id_sistem_kerja']!='0'){
			$sqlskerja = mysql_query("SELECT * FROM sistem_kerja WHERE id='$idskerja'");
			$rowskerja=mysql_fetch_array($sqlskerja) or die (mysql_error());{
				$this->Cell(65,5,"SISTEM KERJA",0,0,'l', 0); $this->Cell(65,5,':   '.$rowskerja['waktu'],0,1,'L',0);
			}
		}
		//memanggil perusahaan
		
		//memanggil No Po
		//$idnopo = isset($_GET['id_no_po']) ? $_GET['id_no_po'] : null;
		//if ($_GET['id_no_po']!='0'){
		//	$sqlnopo = mysql_query("SELECT no_po.no_po,no_po.judul_kontrak, perusahaan.nm_perusahaan,DATE_FORMAT(no_po.awal_kontrak, '%d-%m-%Y') as tanggal1,
		//	DATE_FORMAT(no_po.ahir_kontrak, '%d-%m-%Y') as tanggal2 FROM no_po 
		//	LEFT JOIN perusahaan ON no_po.id_perusahaan = perusahaan.id_perusahaan WHERE id_no_po='$idnopo'");
		//	$rownopo=mysql_fetch_array($sqlnopo) or die (mysql_error());{
		//			$this->Cell(65,5,"NO. PO",0,0,'l', 0); $this->Cell(65,5,':   '.$rownopo['no_po'],0,1,'L',0);
		//			$this->Cell(65,5,"Judul Pekerjaan",0,0,'l', 0); $this->Cell(65,5,':   '.$rownopo['judul_kontrak'],0,1,'L',0);
		//			if ($_GET['id_perusahaan']=='0'){
		//			$this->Cell(65,5,"Nama Perusahaan",0,0,'l', 0); $this->Cell(65,5,':   '.$rownopo['nm_perusahaan'],0,1,'L',0);
		//			}
		//			$this->Cell(65,5,"Masa Kontrak",0,0,'l', 0); $this->Cell(65,5,':   '.$rownopo['tanggal1']." s.d ".$rownopo['tanggal2'],0,1,'L',0);
		//	}
		//}
		
		//$idperusahaan = isset($_GET['id_perusahaan']) ? $_GET['id_perusahaan'] : null;
		//if ($_GET['id_perusahaan']!='0'){
		//	$sqlperusahaan = mysql_query("SELECT * FROM perusahaan WHERE id_perusahaan='$idperusahaan'");
		//	$rowperusahaan=mysql_fetch_array($sqlperusahaan) or die (mysql_error());{
		//			$this->Cell(65,5,"PERUSAHAAN",0,0,'l', 0); $this->Cell(65,5,':   '.$rowperusahaan['nm_perusahaan'],0,1,'L',0);
		//	}
		//}
		if($_GET['usia'] != ''){
			$usia = $_GET['usia'];
			if($usia == 'tua')
				{					
					$this->Cell(65,5,"Usia",0,0,'l', 0); $this->Cell(65,5,":    Diatas 55",0,1,'L',0);
				}
			else if($usia == 'muda'){
					$this->Cell(65,5,"Usia",0,0,'l', 0); $this->Cell(65,5,":    Dibawah 55",0,1,'L',0);
			}
	
		}
		$this->Ln(10);
		
		
	}
		
	public function content() {

		if(!isset($_POST['usia']) || !isset($_GET['usia']))
		$usia = 'semua_umur';
		
		$this->SetFont('Arial','',8);
			 // menentukan warna background tulisan (format RGB)
	    $this->SetFillColor(225,225,225);
	 
	    // menentukan warna drawing line
	    $this->SetDrawColor(205,205,205);
		
		$this->Cell(7,5,"No.",1,0,'C',true);	
		$this->Cell(30,5,"No KTP",1,0,'C',true);
	    $this->Cell(40,5,"Nama Lengkap",1,0,'C',true);
		 $this->Cell(10,5,"Usia",1,0,'C',true);
		
		if ($_GET['id_field']=='0'){
			 $this->Cell(30,5,"Asset/ Field",1,0,'C',true);
		}
		if ($_GET['id_fkerja']=='0'){
			 $this->Cell(30,5,"Fungsi Kerja",1,0,'C',true);
		}
		//if ($_GET['id_fpemegang_kontrak']=='0'){
			 //$this->Cell(27,5,"Pemegang Kontrak",1,0,'C',true);
		//}
		if ($_GET['id_lks_kerja']=='0'){
			 $this->Cell(35,5,"Lokasi Kerja",1,0,'C',true);
		}
		
		$this->Cell(35,5,"Jenis Pekerjaan",1,0,'C',true);
		
		if ($_GET['id_sistem_kerja']=='0'){
			 $this->Cell(30,5,"Sistem Kerja",1,0,'C',true);
		}
		if($_GET['id_klasifikasi'] == '0'){
			 $this->Cell(30,5,"Status Karyawan",1,0,'C',true);
		}
		//if ($_GET['id_perusahaan']=='0' and $_GET['id_no_po']=='0'){
			 //$this->Cell(105,5,"Perusahaan",1,0,'C',true);
		//}
		//if ($_GET['id_no_po']=='0'){
			 //$this->Cell(20,5,"No. PO",1,0,'C',true);
		//}
		
	    // ganti  warna fill untuk membedakan cell
		$this->SetFillColor(245,245,245);
		
		//Mengambil Nilai Usia
		
	    // query ke Myquery_filter database
							
							if(	isset($_GET['ktp']) || isset($_GET['nama']) ||  
							    isset($_GET['usia']) || 
								isset($_GET['id_field']) || isset($_GET['id_lks_kerja']) || 
								isset($_GET['id_sistem_kerja']) ||
								isset($_GET['id_klasifikasi']) || 
								isset($_GET['id_fkerja'])){
								
								$sql = "SELECT tkjp.nm_lengkap,tkjp.no_ktp,
									klasifikasi.klasifikasi,
									tkjp.nm_pekerjaan,
									fungsi_kerja.fkerja,
									field.nm_field,
									lokasi_kerja.lokasi,
									sistem_kerja.waktu,
									YEAR( curdate( ) ) - YEAR( tkjp.tgl_lahir ) as selisih
									
									FROM tkjp
											LEFT JOIN klasifikasi ON tkjp.id_klasifikasi = klasifikasi.id_klasifikasi
											LEFT JOIN fungsi_kerja ON tkjp.id_fkerja = fungsi_kerja.id_fkerja
											LEFT JOIN field ON tkjp.id_field = field.id_field
											LEFT JOIN lokasi_kerja ON tkjp.id_lks_kerja = lokasi_kerja.id_lokasi
											LEFT JOIN sistem_kerja ON tkjp.id_sistem_kerja = sistem_kerja.id
											
											WHERE status = 'aktif' ";
										
										if($_GET['ktp']!= '0'){
											$ktp = $_GET['ktp'];
											$kondisi_ktp = " no_ktp LIKE '%$ktp%' || no_jamsostek LIKE '%$ktp%' ";
											$sql = $sql." AND ".$kondisi_ktp ;
										}
										
										
										if ($_GET['nama'] != '0'){
										$nama = $_GET['nama'];
											$kondisi_nama = " nm_lengkap LIKE '%$nama%' || nm_pekerjaan LIKE '%$nama%' ";
											$sql = $sql." AND ".$kondisi_nama ;
										}
										
											$tanggal_sekarang = date('Y-m-d');
											isset ($_POST['usia']) ? $usia = $_POST['usia'] : $usia = $_GET['usia'];
											
											if($usia == 'tua'){
											{					
												$kondisi_usia = "  YEAR( curdate( ) ) - YEAR( tgl_lahir ) >'55' ";
												$sql = $sql." AND ".$kondisi_usia;
											}
											}else if($usia == 'muda')
											{
												$kondisi_usia = " YEAR( curdate( ) ) - YEAR( tgl_lahir ) <='55' ";
												$sql = $sql." AND ".$kondisi_usia;
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
										
									$query= $sql. " order by nm_lengkap";
									$query_page= $sql;
									
							//echo $query_page;

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
					$this->Cell(30,5,$hasil["no_ktp"],1,0,'R',true);
					$this->Cell(40,5,$hasil["nm_lengkap"],1,0,'L',true);
					 
					//$tahun = floor($hasil['selisih']/365);
					/*
					$hari = $data['selisih'] - $bulan * 30 - $tahun * 365;
								if($tahun > '55')
									echo "<span class='badge badge-important'>".$tahun."</span>";
								else if($tahun <= '55')
									echo $tahun;
					*/	
					$tahun = $hasil['selisih'];
					
					if($tahun > '55'){
					 $this->SetTextColor(220,50,50);
									 $this->Cell(10,5,$tahun." ",1,0,'C',true);
							$this->SetTextColor(0,0,0);
								}
								else if($tahun <= '55')
									//echo $tahun;
					 $this->Cell(10,5,$tahun." ",1,0,'C',true);
		
					if ($_GET['id_field']=='0'){
						$this->Cell(30,5,$hasil["nm_field"],1,0,'L',true);
					}
					if ($_GET['id_fkerja']=='0'){
						$this->Cell(30,5,$hasil["fkerja"],1,0,'L',true);
					}
					
					if ($_GET['id_lks_kerja']=='0'){
						$this->Cell(35,5,$hasil["lokasi"],1,0,'L',true);
					}
					
					$this->Cell(35,5,$hasil["nm_pekerjaan"],1,0,'L',true);
					
					if ($_GET['id_sistem_kerja']=='0'){
						$this->Cell(30,5,$hasil["waktu"],1,0,'L',true);
					}
					if ($_GET['id_klasifikasi']=='0'){
						$this->Cell(30,5,$hasil["klasifikasi"],1,0,'L',true);
					}
					
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
