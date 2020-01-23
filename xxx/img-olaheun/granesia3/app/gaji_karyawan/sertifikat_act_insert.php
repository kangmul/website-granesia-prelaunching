<?php

/*
$upload_dir = 'pdf';
// using DIRECTORY_SEPARATOR constant is a good practice, it makes your code portable.
$uploadPath = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . $upload_dir . DIRECTORY_SEPARATOR;
$mainFile = $uploadPath.time().'-'. $_FILES['file']['name'];
$tempFile = $_FILES['file']['tmp_name'];//this is temporary server location

$index = isset($_GET['index']) ? $_GET['index'] : null;
$ket = $_POST['keterangan'];

$pdfDirectory = "pdf";
$sertifikat = $_FILES['file']['name'];
echo $sertifikat; 
$sertifikat = preg_replace("/[^A-Za-z0-9_-]/", "", $sertifikat).".pdf";

move_uploaded_file($tempFile,$mainFile)								
//move_uploaded_file($_FILES['sertifikat']['tmp_name'],$pdfDirectory."/".$sertifikat);
								
$query = "INSERT INTO berkas_sertifikat (id_karyawan,sertifikat) VALUES ('".$index."','".$sertifikat."')";

//$result = mysql_query($query);
								//$_SESSION['pesan'] = '<p><div class="alert alert-success">Data <b>'.$_SESSION['nik'].' Berhasil Di Simpan</b> </b></div></p>';
							
$result = mysql_query($query) or die(mysql_error());
mysql_close();
if ($result > 0) {
$_SESSION['pesan'] = '<p><div class="alert alert-success">Data <b>'.$_SESSION['nik'].' Berhasil Di Update</b> </b></div></p>';

	//echo "location.href='index.php?tab=$tab&folder=$folder&file=berkas&index=$index";
	echo "<script>; 
			location.href='index.php?tab=$tab&folder=$folder&file=berkas&index=$index';
			</script>";
		
} else {
	
	echo "<script>; 
			location.href='index.php?tab=$tab&folder=$folder&file=berkas&index=$index';
			</script>";
	
	}
*/
?>

<?php
include ('db.php');
include($_SERVER['DOCUMENT_ROOT'].'/granesia/config.php');
$upload_dir = 'pdf';

if (!empty($_FILES)) 
{ 	
	$tanggal = date('Y-m-d');
	
	 $index = isset($_GET['index']) ? $_GET['index'] : null;
	 $tempFile = $_FILES['file']['tmp_name'];//this is temporary server location
	 $file_name = getname($_FILES['file']['name'],1);
	 $sertifikat = $tanggal." ".preg_replace("/[^A-Za-z0-9_-]/", "", $file_name).".pdf";
	 $folder = $_SERVER['HTTP_REFERER'];
	 
	 // using DIRECTORY_SEPARATOR constant is a good practice, it makes your code portable.
	 $uploadPath = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . $upload_dir . DIRECTORY_SEPARATOR;
	 
	 // Adding timestamp with image's name so that files with same name can be uploaded easily.
	 $mainFile = $uploadPath.$sertifikat;
	 if(move_uploaded_file($tempFile,$mainFile)){
		$sql = "INSERT INTO berkas_sertifikat(id_sertifikat,id_karyawan,sertifikat,tgl_upload) VALUES (NULL , '".$index."','".$sertifikat."','".$tanggal."')";

		mysql_query($sql) or die(mysql_error());
		
			//echo $sql." berhasil</br>";
		
	 }
}

function getname($string, $word_limit) {
        $words = explode(".", $string);
        return implode(".", array_splice($words, 0, $word_limit));
    }

?>