<?php
define('PATH', '../../');
require_once PATH . 'path.php';
$fungsi->template->Heading();
$id = $_GET['id'];
$query = "SELECT * FROM form_njo WHERE id='$id' LIMIT 1";
$result = $db->query($query);
$row = $result->fetch();

?>
<div class="container">
    <div class="row">
        <div class="col-xs-3">
            <img src="<?php echo PATH . 'img/logo-granesia.jpg'; ?>" class="img-rounded"
                 alt="">
        </div>
        <div class="col-xs-5"><h4>NOTA JUSTIFIKASI OPERASI</h4></div>
        <div class="col-xs-4">
            <table class="table">
                <tr>
                    <td>Nomor</td>
                    <td><?php echo $row['no_njo']; ?></td>
                </tr>
                <!--<tr>
                    <td>Tanggal Pembuatan</td>
                    <td><?php echo $row['tanggal']; ?></td>
                </tr>
                
                <tr>
                    <td>Kebutuhan</td>
                    <td><?php echo $row['kegiatan']; ?></td>
                </tr>-->
            </table>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-xs-6">
            <h4>Bagian : <?php echo $fungsi->fungsi->cari_value_q("SELECT bagian FROM users1 WHERE nama='".$row['username']."'"); ?></h4>
            <h4>Urusan : <?php echo $fungsi->fungsi->cari_value_q("SELECT bagian FROM users1 WHERE nama='".$row['username']."'"); ?></h4>
            <h4>Seksi  &nbsp;&nbsp;: <?php echo $fungsi->fungsi->cari_value_q("SELECT seksi FROM users1 WHERE nama='".$row['username']."'"); ?></h4>
        </div>
        <div class="col-xs-6">
            <h4>No Kegiatan&nbsp;:</h4>
            <h4>Tanggal&nbsp;: <?php echo $row['tanggal']; ?></h4>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-4">
            <h4>Informasi Umum Kegiatan</h4>
            <h4>Lokasi&nbsp;&nbsp;:</h4>
            <h4>Sarana&nbsp;:</h4>
            <h4>Volume&nbsp;:</h4>
        </div>
        <div class="col-xs-4">
            <h4>Luang Lingkup Pekerjaan</h4>
        </div>
        <div class="col-xs-4">
            <h4>Waktu</h4>
        </div>
    </div>

    <br>
    <h4>Daftar Pos Perkiraan</h4>

    <div class="row">
        <table class="table table-bordered panel panel-default">
            <thead>
            <tr class="active">
                <th>No</th>
                <th>No Akun</th>
                <th>Nama Akun</th>

                <th>Biaya</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $query_detail = "SELECT
  `tabel_master`.`kode_rekening`,
  `tabel_master`.`nama_rekening`,
  `form_transaksi`.`keterangan_transaksi`,
  `form_transaksi`.`debet`

FROM
  `tabel_master`
  INNER JOIN `form_transaksi` ON `tabel_master`.`kode_rekening` =
    `form_transaksi`.`kode_rekening`
    WHERE kode_transaksi='$id' AND sts='1'";

            //$number = 1999.778;
			//echo "Rp. " .number_format($number,2);
            $result_detail = $db->query($query_detail);
            $no = 0;
            $total = 0;
            while ($r_detail = $result_detail->fetch()) {
                $no++;
                $total += $r_detail['debet'];
                ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $r_detail['kode_rekening']; ?></td>
                    <td><?php echo $r_detail['nama_rekening']; ?></td>

                    <td align="right"><?php echo "Rp. " .number_format($r_detail['debet'],2); ?></td>
                </tr>
            <?php }
            ?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3"><span class="pull - right">Total</span></td>
                <td align="right" ><?php echo "Rp. " .number_format($total,2); ?></td>
            </tr>
            </tfoot>
        </table>
    </div>
    <div class="row">
        <table class="table table-bordered panel panel-default">
            <thead>
            <tr class="active">

                <th>Uraian Kegiatan / Rincian Biaya</th>

            </tr>
            </thead>
            <tbody>

            <tr>

                <td><?php echo $row['ket']; ?></td>

            </tr>

            </tbody>

        </table>
    </div>
    <br>

    <div class="row">
        <table class="table table-bordered panel panel-default">
            <thead>
            <tr class="active">
                <th>Analisa Anggaran</th>
                <th>Direncanakan Oleh</th>
                <th>Diperiksa Oleh</th>
                <th>Disetujui Oleh</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><br><br></td>
                <td><br><br></td>
                <td><br><br></td>
                <td><br><br></td>

            </tr>
            <tr>
                <td>Tanggal:</td>
                <td>Tanggal:</td>
                <td>Tanggal:</td>
                <td>Tanggal:</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
