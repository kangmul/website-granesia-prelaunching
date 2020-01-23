<?php

/**
 * Created by PhpStorm.
 * User: iy2
 * Date: 8/25/2015
 * Time: 9:40 PM
 */
class Fungsi
{
    function redirect($url)
    {
        echo '<script type="text/javascript">window.location.href="' . $url . '";</script>';

    }

    function action($page)
    {
        echo "?modul=" . $page[0] . "/act";
    }

    function judul_halaman($page)
    {
        echo '<div class="panel panel-info alert alert-info">
							<button type="button" class="close" data-dismiss="alert">x</button>
							<h4 class="alert-heading  page-header">' . ucwords($page[1]) . ' ' . ucwords($page[0]) . '</h4>
				</div>';
    }

    function urut($table, $field)
    {
        $db = new Database();
        $db = $db->connect();
        $query1 = "SELECT $field FROM $table ORDER BY $field DESC LIMIT 1";
        $result1 = $db->query($query1);
        $row1 = $result1->fetch();

        $query2 = "SELECT COUNT($field) FROM $table ";
        $result2 = $db->query($query2);
        $nrow = $result2->rowCount();

        if ($nrow == 0) {
            $id = 1;
        } else {
            $id = $row1[$field] + 1;
        }
        //echo $id;
        return $id;
    }

    function counter($ket)
    {
        $db = new Database();
        $db = $db->connect();
        $bulan=date('m');
        $tahun=date('Y');

        $query = "SELECT isi FROM counter WHERE ket='$ket' AND bulan='$bulan' AND tahun='$tahun'";
        $result = $db->query($query);
        if($result->rowCount()=='0') {
            $id = '00001';
            $query_tambah="INSERT INTO counter (ket,isi,bulan,tahun) VALUES ('$ket','$id','$bulan','$tahun')";
            $db->query($query_tambah);
        } else {
            $row = $result->fetch();
            $id=$row['isi'] + 1;
            $query_update=" UPDATE counter SET isi='$id'
            WHERE ket='$ket' AND bulan='$bulan' AND tahun='$tahun'";
            $db->query($query_update);
			
			if (($id >= 2)&&($id <= 9)){
			$id = sprintf("%05s", $id);
			}
			if (($id >= 10)&&($id <= 99)){
			$id = sprintf("%05s", $id);
			}
			if (($id >= 100)&&($id <= 999)){
			$id = sprintf("%05s", $id);
			}
        }
        return $id;
    }

    function jumlah_data($query)
    {
        $db = new Database();
        $db = $db->connect();
        $result = $db->query($query);
        $jumlah = $result->rowCount();
        return $jumlah;
    }


    function encrypt($string)
    {
        $encrypt_method = encrypt_method;
        $secret_key = secret_key;
        $secret_iv = secret_iv;
        // hash
        $key = hash('sha256', $secret_key);
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
        return $output;
    }

    function decrypt($string)
    {

        $encrypt_method = encrypt_method;
        $secret_key = secret_key;
        $secret_iv = secret_iv;
        // hash
        $key = hash('sha256', $secret_key);
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        return $output;
    }

    function dropsel($query, $isi)
    {
        $db = new Database();
        $db = $db->connect();
        $result = $db->query($query);
        while ($row = $result->fetch(PDO::FETCH_BOTH)) {
            if ($isi != $row['0']) {
                echo '<option value="' . $row['0'] . '">'
                    . $row['1'] . '</option>';

            } else {
                echo '<option selected="selected" value="' . $row['0'] . '">'
                    . $row['1'] . '</option>';
            }
        }
    }

    function dropsel_array($a, $b, $isi)
    {
        $jumlah = count($a);
        for ($i = 0; $i < $jumlah; $i++) {
            if ($a[$i] == $isi) {
                $pilih = "selected";
            } else {
                $pilih = "";
            }
            echo("<option value=\"$a[$i]\" $pilih>$b[$i]</option>" . "\n");

        }
    }

    function tgl_format($tgl, $sts = 0)
    {
        if ($tgl != '') {
            if ($sts == '0')
                return date('Y-m-d', strtotime($tgl));
            else
                return date('d-m-Y', strtotime($tgl));
        }

    }

	//fungsi format tanggal
	function tgl_format2($data, $modul = '0')
	{
    $tanggal = str_replace("/", "-", $data);
    //$data="05-01-1990";
    if ($modul == '0') {
        $input = date('d/m/Y', strtotime($tanggal));
    }
    if ($modul == '1') {
        $input = date('Y-m-d', strtotime($tanggal));

    }
    return $input;
	}

    function number_format($number, $sts = 0)
    {
        if ($number != '') {
            if ($sts == '0')
                return str_replace(",", "", $number);

            else
                return number_format($number);

        }

    }

    function cari_value($table, $filed, $where, $pr)
    {
        $db = new Database();
        $db = $db->connect();
        $query = "SELECT $filed FROM $table WHERE $where = '$pr'";
        $result = $db->query($query);
        $row = $result->fetch(PDO::FETCH_NUM);
        return $row[0];


    }

    function cari_value_q($query)
    {
        $db = new Database();
        $db = $db->connect();
        //echo $query;
        $result = $db->query($query);
        $row = $result->fetch(PDO::FETCH_NUM);
        return $row[0];
    }

    function upload($folder, $file_type, $max_size, $foto, $file_size, $file_tmp)
    {
        $tp = new Pesan();

        $eror = false;
        $pesan = '';
        $explode = explode('.', $foto);
        $extensi = $explode[count($explode) - 1];
        //check apakah type file sudah sesuai
        if (!in_array($extensi, $file_type)) {
            $eror = true;
            $pesan .= "- Type file yang anda upload tidak sesuai";
        }
        if ($file_size > $max_size) {
            $eror = true;
            $pesan .= "Ukuran file melebihi batas maximum";
        }
        //check ukuran file apakah sudah sesuai
        if ($eror == true) {
            $tp->pesan_danger($pesan);
            return true;
        } else {
            $rnd = rand(000, 999);
            $foto = str_replace($extensi, "", $foto);
            $foto = preg_replace("/[^A-Za-z0-9_]/", "", $foto) . "." . $extensi;
            $foto = $rnd . "-" . $foto;
            /**
             * Root LEtak Skrips PHP
             *
             * define('SITE_ROOT', realpath(dirname(__FILE__)));
             */
            if (move_uploaded_file($file_tmp, PATH . $folder . $foto)) {
                //catat nama file ke database
                $tp->pesan_success('Berhasil mengupload file ' . $foto);
            } else {
                $tp->pesan_success('Proses mengupload file ' . $foto . ' Error / Dir Tidak di temukan');
            }
        }
        return $foto;
    }

    function kirim_email($subject, $konten, $email, $penerima)
    {

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 2;
        $mail->Debugoutput = 'html';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPAuth = true;
        $mail->Username = email; // SMTP username (pakai @gmail.com)
        $mail->Password = pass_email; // SMTP password
        $mail->setFrom(email, pengirim_email);
        $mail->addReplyTo(email, pengirim_email);
        $mail->addAddress($email, $penerima);
        $mail->Subject = $subject;
        $mail->AltBody = 'This is a plain-text message body';
        $mail->Body = $konten;
        $mail->IsHTML(true);
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
            echo $mail->Body;
        } else {
            echo "Message sent!";
        }

    }
	
	function Terbilang($satuan){
	//echo $satuan;
	$huruf = array ("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam",
		"Tujuh", "Delapan", "Sembilan", "Sepuluh","Sebelas");
	if ($satuan < 12)
		return " ".$huruf[$satuan];
	elseif ($satuan < 20)
		return $this->Terbilang($satuan - 10)." Belas ";
	elseif ($satuan < 100)
		return $this->Terbilang($satuan / 10)." Puluh ".

        $this->Terbilang($satuan % 10);
	elseif ($satuan < 200)
		return "Seratus".$this->terbilang($satuan - 100);
	elseif ($satuan < 1000)
		return $this->Terbilang($satuan / 100)." Ratus ".
        $this->Terbilang($satuan % 100);
	elseif ($satuan < 2000)
		return "Seribu ".$this->Terbilang($satuan - 1000);
	elseif ($satuan < 1000000)
		return $this->Terbilang($satuan / 1000)." Ribu ".
        $this->Terbilang($satuan % 1000);
	elseif ($satuan < 1000000000)
		return $this->Terbilang($satuan / 1000000)." Juta ".
        $this->Terbilang($satuan % 1000000);
		elseif ($satuan >= 1000000000)
	echo "Angka terlalu Besar";
	}
	
	function Terbilang2($satuan)
	{
    $satuan = str_replace(",", ".", $satuan);
    $satuan = explode('.', $satuan);
   // echo $satuan[1];
    return (isset($satuan[1])) ? $this->Terbilang($satuan[0])." Rupiah ".$this->Terbilang($satuan[1])." sen "
        : $this->Terbilang($satuan[0])." Rupiah";

	}

	function filter_bulan($bulan, $name)
	{
    echo '<select class ="span11" name=' . $name . ' class="form-control input-sm">';

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
	
	function filter_bulan2($bulan, $name)
	{
    echo '<select name=' . $name . ' class="form-control input-sm" onchange="this.form.submit()">';

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
	
	function filter_tahun($tahun, $name)
	{
    echo '<select name=' . $name . ' class="form-control input-sm" onchange="this.form.submit()">';
    $bln2 = array("2006", "2007", "2008", "2009", "2010", "2011", "2012", "2013", "2014", "2015", "2016", "2017");
    //$now = date('Y');
    for ($a = 0; $a < 12 ; $a++){
		if ($bln2[$a] == $tahun) {
            $pilih = "selected";
        } else {
            $pilih = "";
        }
		echo("<option value=\"$bln2[$a]\" $pilih>$bln2[$a]</option>" . "\n");
     //echo "<option value='$a'>$a</option>";
	}
    echo '</select>';
	}
	
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

}