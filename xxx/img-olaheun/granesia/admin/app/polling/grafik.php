<?php

/**
 * @author aggha
 * @copyright 2013
 */

include "../../../db.php";
include('class/FusionCharts_Gen.php');
  # Buat Object Column3D
  $FC = new FusionCharts("Column3D","450","300");
  # Atur path penyimpanan file swf
  $FC->setSWFPath("FusionCharts/");
    # Atur Atribut Grafik
  $strParam="caption=HASIL POLLING;xAxisName=Jawaban;yAxisName=Jumlah;numberPrefix=;decimalPrecision=0;formatNumberScale=0";
  $FC->setChartParams($strParam);
  $qry=mysql_query("select * from hasil order by jawab;");
  while ($d=mysql_fetch_array($qry)) {
  # Menambah nilai chart dan nama kategori
  $jml=$d['nilai'];
  $jawab=$d['jawab'];
  $FC->addChartData($jml,"name=$jawab");
  }
  echo "<script language='javascript' src='FusionCharts/FusionCharts.js'></script>";
  #menampilkan grafik
  $FC->renderChart();
?>
