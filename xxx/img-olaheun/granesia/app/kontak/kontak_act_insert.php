<?php
include('db.php');
include "library.php";

$id = isset($_POST['id']) ? $_POST['id'] : null;
$nama = isset($_POST['nama']) ? $_POST['nama'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$pesan = isset($_POST['pesan']) ? $_POST['pesan'] : null;



/*$query_validasi = "SELECT * FROM kontak WHERE id='".$id."'";
$result_validasi = mysql_query($query_validasi);

$query_validasi_final = mysql_fetch_array($result_validasi);

//echo $query_validasi_final['nm_kategori'];

if ($query_validasi_final['id']!="") {
echo "<script>alert('Data sudah ada!');
		location.href='index.php?t=$t&fol=$fol&f=alat_form_insert';
		</script>";
} 

else if ($query_validasi_final['id']=="")*/ {

$query = "INSERT INTO kontak (id,nama,email,pesan,tanggal,jam) VALUES ('','$nama','$email','$pesan','$tgl_sekarang','$jam_sekarang')";
$result = mysql_query($query);

$_SESSION['pesan'] = '<p><div class="alert alert-success">Pesan anda berhasil dikirim</b> </b></div></p>';
$st = '1';
include ('kontak.php');

}


?>