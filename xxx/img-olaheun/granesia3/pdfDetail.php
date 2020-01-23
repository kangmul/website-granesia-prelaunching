<?php

include ('fpdf/fpdf.php');
include ('db.php');
date_default_timezone_set("Asia/Jakarta");



class PDF extends FPDF
    {
    //Page header
    function Header()
    {
		//Logo
		
		//Arial bold 15
		$this->SetFont('Arial','B',15);
		//pindah ke posisi ke tengah untuk membuat judul
		$this->Cell(80);
		//judul
		$this->Cell(30,20,'DATA PRIBADI KARYAWANA PT. GRANESIA',0,0,'C');
		//pindah baris
		$this->Ln(20);
		//buat garis horisontal
		$this->Line(7,25,200,25);
    }
     
    //Page Content
    function Content()
    {
		
		$index = isset($_GET['index'])? $_GET['index'] : null;
		$sql = "SELECT * from tkjp where tkjp.index='$index'";
		//echo $sql;
		$data=mysql_query($sql) or die (mysql_error());
		
		$row=mysql_fetch_array($data);
		
			$this->SetFont('Arial','',10);

		$this->Cell(0,7,'',0,1,'C');
		$this->Cell(0,40,'',0,1,'L');
		
		$this->Image('app/karyawan/karyawan_foto/'.$row['foto'], 90, 40, 20, 30);
		
		$this->Cell(75,7,"NAMA LENGKAP ",0,0,'l', 0); $this->Cell(0,7,':   '.$row['nm_lengkap'],0,1,'L',0);
		$this->Cell(75,7,"NIK ",0,0,'l', 0); $this->Cell(0,7,':   '.$row['nik'],0,1,'L',0);
		$this->Cell(75,7,"NO KTP ",0,0,'l', 0); $this->Cell(0,7,':   '.$row['no_ktp'],0,1,'L',0);
		$this->Cell(75,7,"NO NPWP ",0,0,'l', 0); $this->Cell(0,7,':   '.$row['no_npwp'],0,1,'L',0);
		$this->Cell(75,7,"NO JAMSOSTEK ",0,0,'l', 0); $this->Cell(0,7,':   '.$row['no_jamsostek'],0,1,'L',0);
		//$this->Cell(75,7,"BANK DPLK ",0,0,'l', 0); $this->Cell(0,7,':   '.$row['bank_dplk'],0,1,'L',0);
		//$this->Cell(75,7,"NO REKENING BANK DPLK ",0,0,'l', 0); $this->Cell(0,7,':   '.$row['no_rek_dplk'],0,1,'L',0);
		//$this->Cell(75,7,"BANK PAYROLL",0,0,'l', 0); $this->Cell(0,7,':   '.$row['bank_payroll'],0,1,'L',0);
		$this->Cell(75,7,"NO REKENING PAYROLL ",0,0,'l', 0); $this->Cell(0,7,':   '.$row['no_rek_payroll'],0,1,'L',0);
		$this->Cell(75,7,"TEMPAT DAN TANGGAL LAHIR",0,0,'l', 0); $this->Cell(0,7,':   '.$row['tmp_lahir'].' , '.$row['tgl_lahir'],0,1,'L',0);
		$this->Cell(75,7,"ALAMAT",0,0,'l', 0); $this->Cell(0,7,':   '.$row['alamat'],0,1,'L',0);
		
		//memanggil klasifikasi
		$idklasifikasi = $row['id_klasifikasi'];
		$sqlklasifikasi = mysql_query("SELECT * FROM klasifikasi WHERE id_klasifikasi='$idklasifikasi'");
		$rowklasifikasi=mysql_fetch_array($sqlklasifikasi) or die (mysql_error());
		$this->Cell(75,7,"STATUS PEKERJAAN ",0,0,'l', 0); $this->Cell(0,7,':   '.$rowklasifikasi['klasifikasi'],0,1,'L',0);
	
		$this->Cell(75,7,"PEKERJAAN ",0,0,'l', 0); $this->Cell(0,7,':   '.$row['nm_pekerjaan'],0,1,'L',0);
	
		//memanggil pemegang Kontrak
		//$idpkontrak = $row['id_fpemegang_kontrak'];
		//$sqlpkontrak = mysql_query("SELECT * FROM fpemegang_kontrak WHERE id='$idpkontrak'") or die (mysql_error());
		//$rowpkontrak=mysql_fetch_array($sqlpkontrak);
		//$this->Cell(75,7,"PEMEGANG KONTRAK",0,0,'l', 0); $this->Cell(0,7,':   '.$rowpkontrak['fungsi'],0,1,'L',0);
	
		//memanggil fungsi kerja
		$idfkerja = $row['id_fkerja'];
		$sqlfkerja = mysql_query("SELECT * FROM fungsi_kerja WHERE id_fkerja='$idfkerja'") or die (mysql_error());
		$rowfkerja=mysql_fetch_array($sqlfkerja);
		$this->Cell(75,7,"FUNGSI KERJA",0,0,'l', 0); $this->Cell(0,7,':   '.$rowfkerja['fkerja'],0,1,'L',0);
		
		//memanggil fungsi kerja
		$idfield = $row['id_field'];
		$sqlfield = mysql_query("SELECT * FROM field WHERE id_field='$idfield'") or die (mysql_error());
		$rowfield=mysql_fetch_array($sqlfield);
		$this->Cell(75,7,"FIELD",0,0,'l', 0); $this->Cell(0,7,':   '.$rowfield['nm_field'],0,1,'L',0);
		
		//memanggil lokasi
		$id_lokasi = $row['id_lks_kerja'];
		$sqllokasi = mysql_query("SELECT * FROM lokasi_kerja WHERE id_lks_kerja='$id_lokasi'") or die (mysql_error());
		$rowlokasi=mysql_fetch_array($sqllokasi);
		$this->Cell(75,7,"LOKASI KERJA",0,0,'l', 0); $this->Cell(0,7,':   '.$rowlokasi['lokasi'],0,1,'L',0);
		
		//memanggil sistem kerja
		$idskerja = $row['id_sistem_kerja'];
		$sqlskerja = mysql_query("SELECT * FROM sistem_kerja WHERE id_sistem_kerja='$idskerja'") or die (mysql_error());
		$rowskerja=mysql_fetch_array($sqlskerja);
		$this->Cell(75,7,"SISTEM KERJA",0,0,'l', 0); $this->Cell(0,7,':   '.$rowskerja['waktu'],0,1,'L',0);
		
		//memanggil perusahaan
		//$idperusahaan = $row['id_perusahaan'];
		//$sqlperusahaan = mysql_query("SELECT * FROM perusahaan WHERE id_perusahaan='$idperusahaan'") or die (mysql_error());
		//$rowperusahaan=mysql_fetch_array($sqlperusahaan);
		//$this->Cell(75,7,"PERUSAHAAN",0,0,'l', 0); $this->Cell(0,7,':   '.$rowperusahaan['nm_perusahaan'],0,1,'L',0);
		
		//$this->Cell(75,7,"NO PO",0,0,'l', 0); $this->Cell(0,7,':   '.$row['no_po'],0,1,'L',0);
		//$this->Cell(75,7,"MASSA KERJA",0,0,'l', 0); $this->Cell(0,7,':   '.$row['awal_kontrak'].' - '.$row['ahir_kontrak'],0,1,'L',0);
		$this->Cell(75,7,"TMT MASA KERJA",0,0,'l', 0); $this->Cell(0,7,':   '.$row['tmt'],0,1,'L',0);
		//$this->Cell(75,7,"JUDUL KONTRAK",0,0,'l', 0); $this->Cell(0,7,':   '.$row['judul_kontrak'],0,1,'L',0);

		if(empty($row['perjanjian_krj'])){
			$status= "Berkas Belum ditambahkan";
		}
		else{
			$status= "Berkas Sudah ada";
		}
		//$this->Cell(75,7,"PERJANJIAN KERJA",0,0,'l', 0); $this->Cell(0,7,':   '.$status,0,1,'L',0);
		
		
		//$idpekerjaan = $row['id_pekerjaan'];
		
		$this->Cell(0,25,'Bandung, '.date("d-m-Y H:i:s"),0,1,'R', 0);
	}
     
    //Page footer
    function Footer()
    {
		//atur posisi 1.5 cm dari bawah
		$this->SetY(-15);
		//buat garis horizontal
		$this->Line(7,$this->GetY(),200,$this->GetY());
		//Arial italic 9
		$this->SetFont('Arial','I',9);
		//nomor halaman
		$this->Cell(0,7,'Halaman '.$this->PageNo().' dari {nb}',0,0,'R');
    }
    }
     
    //contoh pemanggilan class
    //$pdf = new PDF();
	
	$pdf=new PDF('P','mm','A4');

//set margin
//SetMargins(margin kiri,margin atas[,margin kanan])
//$pdf->SetMargins(20,20,20);


    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->Content();
    $pdf->Output();
    ?>
