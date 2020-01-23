<?	
include "conn.php";

//periksa apakah user telah menekan submit, dengan menggunakan parameter setingan keterangan
if (isset($_POST['keterangan']))
{
	$tanggal;
	$keterangan=ucwords($_POST['keterangan']);
	$nama_file=$_FILES['datafile']['name'];
	$ukuran=$_FILES['datafile']['size'];
	
	//periksa jika data yang dimasukan belum lengkap
	if ($keterangan=="" || $nama_file=="")
	{
		//jika ada inputan yang kosong
		?><script>alert('Data Anda belum lengkap');</script><?
		?><script>document.location.href='index.php';</script><?
		
	}else{
		
		//definisikan variabel file dan alamat file
		$uploaddir='./files/';
		$alamatfile=$uploaddir.$nama_file;

		//periksa jika proses upload berjalan sukses
		if (move_uploaded_file($_FILES['datafile']['tmp_name'],$alamatfile))
		{
			//jika berhasil
			?><script>alert('Data Anda berhasil diupload');</script><?
			?><script>document.location.href='index.php';</script><?
			
			//catat data file yang berhasil di upload
			$upload=mysql_db_query($db,"INSERT INTO tabel_data(nama_file,ukuran,url,tgl_upload,keterangan) VALUES('$nama_file','$ukuran','$alamatfile','$tanggal','$keterangan')");
		
		}else{
			//jika gagal
			echo "Proses upload gagal, kode error = " . $_FILES['location']['error'];
		}
	}
	
}
else
{
	unset($_POST['keterangan']);
}

?>
