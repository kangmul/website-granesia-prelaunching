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
		$this->SetFont('Arial','B',11);
		//pindah ke posisi ke tengah untuk membuat judul
		$this->Cell(80);
		$this->Image('app/karyawan/karyawan_foto/logo-granesia.jpg',15,10,30,30);
		//judul
		$this->Cell(25,30,'SURAT PERINTAH BAYAR',0,0,'R');
		//$this->Cell(30,20,'Nomor',90,80,'R');
		//pindah baris
		//$this->Ln(20);
		//buat garis horisontal
		//$this->Line(70,25,135,25);
    }
     
    //Page Content
    function Content()
    {
		
		$index = isset($_GET['index'])? $_GET['index'] : null;
		$sql = "SELECT * from tkjp LEFT JOIN no_po ON tkjp.id_no_po= no_po.id_no_po where tkjp.index='$index'";
		//echo $sql;
		$data=mysql_query($sql) or die (mysql_error());
		
		$row=mysql_fetch_array($data);
		
		$this->SetFont('Arial','',10);
		$this->Cell(30,20,'Nomor :',90,80,'R');
		$this->Cell(0,7,'',0,1,'C');
		$this->Cell(0,10,'',0,1,'L');
		//$pdf->Image('logo-granesia.jpg', 0, 0, 150, 50);
		//$this->Image('app/karyawan/karyawan_foto/logo-granesia.jpg', 90, 40, 20, 30);
		
		$this->Cell(26,7,"Kode Lokasi ",0,0,'R',0); $this->Cell(0,7,':   Soekarno Hatta',0,1,'L',0); $this->Cell(145,-7,"Beban Anggaran / Tahun",0,0,'R',0); $this->Cell(0,-7,': '.date("Y"),0,1,'L',0);
		$this->Cell(25,7,"",0,0,'l', 0); $this->Cell(0,7,"",0,1,'L',0);
		//$this->Cell(25,7,"",0,0,'l', 0); $this->Cell(0,7,"",0,1,'L',0);
		$this->Cell(45,7,"Mohon Dibayarkan Uang",0,0,'R', 0); $this->Cell(0,7,"",0,1,'L',0);
		$this->Cell(20,7,"Sebesar ",0,0,'R', 0); $this->Cell(12,7,':   ',0,1,'R',0);
		$this->Cell(21,7,"Terbilang ",0,0,'R', 0); $this->Cell(11,7,':   ',0,1,'R',0);
		$this->Cell(19,7,"Kepada ",0,0,'R', 0); $this->Cell(13,7,':   ',0,1,'R',0);
		//$this->Cell(75,7,"BANK DPLK ",0,0,'l', 0); $this->Cell(0,7,':   '.$row['bank_dplk'],0,1,'L',0);
		//$this->Cell(75,7,"NO REKENING BANK DPLK ",0,0,'l', 0); $this->Cell(0,7,':   '.$row['no_rek_dplk'],0,1,'L',0);
		//$this->Cell(75,7,"BANK PAYROLL",0,0,'l', 0); $this->Cell(0,7,':   '.$row['bank_payroll'],0,1,'L',0);
		//$this->Cell(25,7,"",0,0,'l', 0); $this->Cell(0,7,"",0,1,'L',0);
		$this->Cell(36,7,"Untuk Pembayaran",0,0,'R', 0); $this->Cell(0,7,"",0,1,'L',0);
		//$this->Cell(75,7,"ALAMAT",0,0,'l', 0); $this->Cell(0,7,':   '.$row['alamat'],0,1,'L',0);
		
		
		
		
		//$idpekerjaan = $row['id_pekerjaan'];
		
		$this->Cell(0,25,'Cirebon, '.date("d-m-Y H:i:s"),0,1,'R', 0);
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
