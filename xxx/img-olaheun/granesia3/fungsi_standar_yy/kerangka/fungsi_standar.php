<?php
require_once "../../config/koneksi.php";
//fungsi pindah halaman

function lompat_ke($page)
{
   if (!headers_sent()){
      header("Location:$page");
      exit();
   }else{
      echo "<meta http-equiv=refresh content=0;URL=$page>";
      exit();
   }
}
function dropsel($q,$data)
{
	$rst=mysql_query($q);
    echo '<option value=""> -Pilih- </option>';
	while($d = mysql_fetch_array($rst,MYSQL_BOTH)){
		if($data != $d['0']){
			echo '<option value="'.$d['0'].'">'.$d['1'].'</option>';
			} else {
			echo '<option selected="selected" value="'.$d['0'].'">'.$d['1'].'</option>';
			}
	}
	return true;
}

function cari_value($table, $filed, $where, $pr)
{
    $q = "SELECT $filed FROM $table WHERE $where = '$pr'";
    $rst = mysql_query($q);
    $rw = mysql_fetch_row($rst);
    return $rw[0];


}
function cari_value_q($q)
{
    $rst = mysql_query($q);
    $rw = mysql_fetch_row($rst);
    return $rw[0];
}

//fungsi penambahan otomatis
function penambahan($teks1, $teks2)
{
	$id=0;
	$query=mysql_query($teks1);
	$qry=mysql_query($teks2);
	$inc=mysql_fetch_array($qry);
	$nrow=mysql_num_rows($query);

	if ($nrow==0){
		$id=1;
	}else{
		$inc['inc']=$inc['inc']+1;
		$id=$inc['inc'];

	}
	return $id;
}

function counter($teks)
{
	$id=0;
	$bulan=date('m');
	$tahun=date('Y');
	$query="SELECT isi FROM counter WHERE trans='$teks' AND bulan='$bulan' AND tahun='$tahun'";
	$result=mysql_query($query);
	if(mysql_num_rows($result)=='0'){
	$q_insert="INSERT INTO counter (isi, trans, bulan, tahun) VALUES ('1','$teks','$bulan','$tahun')";
	mysql_query($q_insert);
	$id=1;
	}
	else {
		$row=mysql_fetch_array($result);	
		$id=$row['isi']+1;
	$q_update="UPDATE counter SET isi='$id' 
	WHERE trans='$teks' AND bulan='$bulan' AND tahun='$tahun'";
	mysql_query($q_update);
		
	
	}
	return $id;
}
//fungsi format angka
function digit($data,$f='0'){
	if($f=='0'){
		$input=number_format($data,2,',','.');
		}
	if($f=='1'){
		
		$input = str_replace(",", "", $data);
	}
	return $input;
}	

//filter bulan
function filter_bulan($bulan, $name)
{
    echo '<select name=' . $name . ' class="form-control input-sm"
                            onchange="this.form.submit()">';

    /*
    $bln1 = array("- Pilih Bulan -", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
        $bln2 = array("", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");
    */
    $bln1 = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    $bln2 = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");
    for ($y = 0; $y < 12; $y++) {
        if ($bln2[$y] == $bulan) {
            $pilih = "selected";
        } else {
            $pilih = "";
        }
        echo("<option value=\"$bln2[$y]\" $pilih>$bln1[$y]</option>" . "\n");
    }

    echo '</select>';
}

//Funsi terbilang

function terbilang($satuan){
	//echo $satuan;
	$huruf = array ("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam",
		"Tujuh", "Delapan", "Sembilan", "Sepuluh","Sebelas");
	if ($satuan < 12)
		return " ".$huruf[$satuan];
	elseif ($satuan < 20)
		return terbilang($satuan - 10)." Belas ";
	elseif ($satuan < 100)
		return terbilang($satuan / 10)." Puluh ".

	terbilang($satuan % 10);
	elseif ($satuan < 200)
		return "Seratus".terbilang($satuan - 100);
	elseif ($satuan < 1000)
		return terbilang($satuan / 100)." Ratus ".
	terbilang($satuan % 100);
	elseif ($satuan < 2000)
		return "Seribu ".terbilang($satuan - 1000);
	elseif ($satuan < 1000000)
		return terbilang($satuan / 1000)." Ribu ".
	terbilang($satuan % 1000);
	elseif ($satuan < 1000000000)
		return terbilang($satuan / 1000000)." Juta ".
	terbilang($satuan % 1000000);
		elseif ($satuan >= 1000000000)
	echo "Angka terlalu Besar";
}
//fungsi konversi romawi
function romawi($m){
	$BulanR = array("I","II","III","IV","V","VI","VII","VIII","IX","X","XI","XII");
	$bulan = substr($m, 0, 2);
	$result = $BulanR[(int)$bulan-1];
	return $result;

}

//fungsi format tanggal
function tgl_format($data,$f='0'){

	$tanggal=str_replace("/","-",$data);
	//$data="05-01-1990";
	if($f=='0'){
		$input=date('d/m/Y', strtotime($tanggal));
		}
	if($f=='1'){
		$input=date('Y-m-d', strtotime($tanggal));

	}
		return $input;
}

function tgl_format2(){

$bulan = array("January","Pebruary","Maret","April","Mei","Juni","Juli","Agustus","September","Okotober","Nopember","Desember");
 
$month = intval(date('m')) - 1;

}

function ambil_data($DML)
{
	$query=mysql_query($DML);
	$dataArray=mysql_fetch_array($query);
	return $dataArray;
}
//this function created by Sigit Dwi Prasetyo
function pencarian($tabel,$field,$cari)
{
	$sql="SELECT * FROM $tabel WHERE $field LIKE '%$cari%'";
	$query=mysql_query($sql);
	return $query;
}

function Terbilang2($satuan)
	{
    $satuan = str_replace(".", ",", $satuan);
    $satuan = explode(',', $satuan);
    //echo $satuan[1];
    return (isset($satuan[1])) ? $this->Terbilang($satuan[0])." Rupiah ".$this->Terbilang($satuan[1])." sen "
        : $this->Terbilang($satuan[0])." Rupiah";

	}

?>