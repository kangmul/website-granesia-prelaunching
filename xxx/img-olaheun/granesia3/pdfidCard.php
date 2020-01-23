<?

include ('fpdf/fpdf.php');
include ('db.php');
// buat file pdf
//$pdf = new FPDF();
//$pdf=new FPDF('P','mm','A4');
	$pdf=new FPDF('L','mm',array(160,50));

//set margin
//SetMargins(margin kiri,margin atas[,margin kanan])
//$pdf->SetMargins(40,40,30);



 
// disable oto page break
$pdf->SetAutoPageBreak(false);
$pdf->AddPage();

//$pdf->Image('IDcard.jpg', 0, 0, $pdf->w, $pdf->h);
$pdf->Image('IDcard.jpg', 0, 0, 150, 50);



$index = isset($_GET['index'])? $_GET['index'] : null;
$data=mysql_query("SELECT tkjp.foto,tkjp.nm_lengkap, no_po.id_perusahaan, no_po.ahir_kontrak from tkjp LEFT JOIN no_po ON tkjp.id_no_po = no_po.id_no_po where tkjp.index='$index'") or die (mysql_error());
$row=mysql_fetch_array($data);

$pdf->SetFont('Times','',8);
$pdf->Cell(6,8,'',0,1,'R');

//$pdf->Cell(30,40,''.$row['foto'],1,0,'C');
$pdf->Image('app/karyawan/karyawan_foto/'.$row['foto'], 5, 15, 20,30);
$pdf->Cell(18,12,'',0,0,'l', 0);
$pdf->Cell(45,12,''.$row['nm_lengkap'],0,1,'l', 0);

//Mengambil nama perusahaan
		$idperusahaan = $row['id_perusahaan'];
		$sqlperusahaan = mysql_query("SELECT * FROM perusahaan WHERE id_perusahaan='$idperusahaan'") or die (mysql_error());
		$rowperusahaan=mysql_fetch_array($sqlperusahaan);

//$pdf->SetWidths((100,100));

//$perusahaan = substr($rowperusahaan['nm_perusahaan'],0,36);
$perusahaan = strlen($rowperusahaan['nm_perusahaan']);

//echo $perusahaan;
//echo count_chars ($perusahaan);
if ($perusahaan >= 32 ){
$pdf->SetFont('Times','',6);
$pdf->Cell(18,10,'',0,0,'l', 0);
$pdf->MultiCell(45,3,''.$rowperusahaan['nm_perusahaan'],0,'L', 0);

$pdf->SetFont('Times','',8);
$pdf->Cell(18,9,'',0,0,'l', 0);

if (empty($row['ahir_kontrak']))
	$pdf->Cell(45,9,''.$row['ahir_kontrak'],0,1,'l', 0);
else
	$pdf->Cell(45,9,''.date('d-m-Y',strtotime($row['ahir_kontrak'])),0,1,'l', 0);
}

if($perusahaan < 32 ){
$pdf->SetFont('Times','',8);
$pdf->Cell(18,6,'',0,0,'l', 0);
$pdf->MultiCell(45,6,''.$rowperusahaan['nm_perusahaan'],0,'L', 0);

//$pdf->SetFont('Times','i',8);
$pdf->Cell(18,7,'',0,0,'l', 0);

if (empty($row['ahir_kontrak']))
	$pdf->Cell(45,7,''.$row['ahir_kontrak'],0,1,'l', 0);
else
	$pdf->Cell(45,7,''.date('d-m-Y',strtotime($row['ahir_kontrak'])),0,1,'l', 0);
}
	
$pdf->Output();	
?>