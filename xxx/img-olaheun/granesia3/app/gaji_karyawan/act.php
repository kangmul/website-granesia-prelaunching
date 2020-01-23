<?php
$proses = isset($_POST['proses']) ? $proses = $_POST['proses'] : $_GET['proses'];
$id = isset($_POST['id']) ? $id = $_POST['id'] : $_GET['id'];

$id_gol = isset($_POST['id_gol']) ? $_POST['id_gol'] : '';
$gapok = isset($_POST['gapok']) ? $_POST['gapok'] : '';
$sisa_gaji = isset($_POST['sisa_gaji']) ? $_POST['sisa_gaji'] : '';
$name = isset($_POST['bulan']) ? $_POST['bulan'] : '';
$tgl_input = isset($_POST['tgl_input']) ? $_POST['tgl_input'] : '';

switch ($proses) {

    case 'update':

        $no_njo=$no_njo_array[0]."/".$_POST['kode_njo']."/".$no_njo_array[2]."/".$no_njo_array[3]."/".$_POST['counter'];
        $query = "UPDATE form_njo SET
        no_njo='$no_njo'
        ,tanggal='$tanggal'
        ,tanggal_bukti='$tanggal'
        ,username='$username'
        ,kegiatan='$kegiatan'
        ,ket='$ket'
        ,sts='1'
         WHERE id='$id'";
        $result = $db->query($query);
//echo $query;
//die();
      $url = '?modul=' . $page[0];
        break;

    case 'hapus':
        $query = "UPDATE form_njo SET hps=1 WHERE  id='$id'";
        $db->query($query);

        $url = '?modul=' . $page[0];
        break;
}
$fungsi->fungsi->redirect($url);
?>