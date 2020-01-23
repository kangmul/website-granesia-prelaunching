<?php
//koneksi ke MySQL
$koneksi = mysqli_connect("localhost","root","");
mysqli_select_db($koneksi, "test");

$data = mysqli_query($koneksi,"SELECT * FROM galeri");
while($d = mysqli_fetch_array($data)){

    ?>
<table border>
<tr>
<td> <?php  echo "<img src=\"".$d['file_gambar']."\" height='150'' width='150'><br>"; ?> </td>

<td > <?php echo $d['deskripsi']."<p>\n"; ?> </td>


    <?php
}
?>
    </tr>
</table>