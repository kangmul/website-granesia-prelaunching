<?php
include ('db.php');
include($_SERVER['DOCUMENT_ROOT'].'/granesia2/config.php');
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