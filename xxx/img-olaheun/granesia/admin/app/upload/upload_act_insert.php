<?php
include "db.php";


	//$tanggal;
	$keterangan=ucwords($_POST['keterangan']);
	$nama_file=$_FILES['nama_file']['name'];
	$ukuran=$_FILES['nama_file']['size'];
	
	
		//definisikan variabel file dan alamat file
		$uploaddir='./files/';
		$url=$uploaddir.$nama_file;

		//periksa jika proses upload berjalan sukses
		if (move_uploaded_file($_FILES['nama_file']['tmp_name'],$url))
		{
			//jika berhasil
			?><script>alert('Data Anda berhasil diupload');</script><?php
			?><script>document.location.href='index.php?t=data&p=upload&f=upload_data_view';</script><?php
			
			//catat data file yang berhasil di upload
			$query = "INSERT INTO tabel_data(id,nama_file,ukuran,url,keterangan) VALUES('','$nama_file','$ukuran','$url','$keterangan')";
			$result = mysql_query($query);
		}else{
			//jika gagal
			echo "Proses upload gagal, kode error = " . $_FILES['location']['error'];
		}
	


?>
