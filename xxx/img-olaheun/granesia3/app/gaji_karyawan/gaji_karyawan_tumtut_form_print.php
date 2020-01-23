<?php
//define('PATH', '../../');
//require_once PATH . 'path.php';
//$fungsi->template->Heading();

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

include ('../../db.php');
$id = $_GET['id'];
$query = "SELECT
  `lembur`.`id`,
  `lembur`.`periode`,
  `lembur`.`tgl_input`,
  `tkjp`.`nm_lengkap`,
  `tkjp`.`nik`,
  `tkjp`.`nm_pekerjaan`,
  `t_jabatan`.`nm_jabatan`,
 `field`.`nm_field`,
   `fungsi_kerja`.`fkerja`,
   `lokasi_kerja`.`lokasi`,
   `klasifikasi`.`klasifikasi`,
   `t_merital`.`nm_status`,
   Sum(`t_lem_karyawan`.`jumlah`) AS `jml`
FROM
  `lembur`
 LEFT JOIN tkjp ON tkjp.index = lembur.id_karyawan
											LEFT JOIN `t_jabatan` ON `tkjp`.`id_jabatan` = `t_jabatan`.`id_jabatan`
											LEFT JOIN `t_lem_karyawan` ON `lembur`.`id` = `t_lem_karyawan`.`id_gaji`
											
											LEFT JOIN klasifikasi ON tkjp.id_klasifikasi = klasifikasi.id_klasifikasi
											LEFT JOIN fungsi_kerja ON tkjp.id_fkerja = fungsi_kerja.id_fkerja
											LEFT JOIN field ON tkjp.id_field = field.id_field
											LEFT JOIN lokasi_kerja ON tkjp.id_lks_kerja = lokasi_kerja.id_lks_kerja
											LEFT JOIN sistem_kerja ON tkjp.id_sistem_kerja = sistem_kerja.id_sistem_kerja
											LEFT JOIN t_merital ON tkjp.id_merital = t_merital.id_merital
WHERE
  `lembur`.`id` = '".$id."'";
$result = mysql_query($query);
$data = mysql_fetch_array($result) or die(mysql_error());

?>
<div class="container">
    <div class="row">
        
        <div class="col-xs-5"><h4 align="center">SLIP GAJI KARYAWAN PT. GRANESIA</h4>
        </div>
        <div class="col-xs-5"><h4 align="center">BULAN : <?php echo bulan($data['periode']); echo date(" Y");?></h4>
        </div>
        
    </div>
    <hr align="right">
	<hr align="right">
    <div class="row">
        <div class="col-xs-6">
            <table width="754" border="0" bordercolor="#FFFFFF">
              <tr>
                <td width="158">No</td>
                <td width="430">:</td>
                <td width="152">&nbsp;</td>
              </tr>
              <tr>
                <td>Nama</td>
                <td>: <?php echo $data['nm_lengkap']; ?></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Departemen</td>
                <td>: <?php echo $data['fkerja'];?></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Golongan</td>
                <td>: <?php echo $data['nm_jabatan']; ?></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Status Marital</td>
                <td>: <?php echo $data['nm_status']; ?></td>
                <td>&nbsp;</td>
              </tr>
              <!--<tr>
                <td>&nbsp;</td>
                <td align="right" ><strong>Gaji Pokok</strong> : </td>
                <td align="right" ><?php echo number_format ($data['jml'],2); ?></td>
              </tr>-->
          </table>
      </div>
      <div class="col-xs-6">
        <table class="table">
    <tr>
      <th colspan="4" align="center" ><div align="left">Lemburan</div></th>
      </tr>
    <tr>
        <th width="42" align="center" >No</th>
        <th width="236" align="left" >Nama Lembur</th>
        <th width="86" align="left" >Jumlah Jam</th>
		<th width="128" align="left">Nominal Perjam</th>
		 <th width="249" align="center" >Keterangan</th>
        <th width="155" align="center" >Jumlah</th>
       </tr>
    <?php
		// display the list of all members in table view
        $sql = "SELECT t_lembur.nm_lembur,t_lem_karyawan.jam_lembur,t_lem_karyawan.nilai_lembur,t_lem_karyawan.jumlah,
		t_lem_karyawan.ket,t_lem_karyawan.id as id_lem FROM `t_lem_karyawan`
  LEFT JOIN `gaji` ON `t_lem_karyawan`.`id_gaji` = `gaji`.`id`
  LEFT JOIN `t_lembur` ON `t_lem_karyawan`.`id_lembur` = `t_lembur`.`id_lembur`
   WHERE t_lem_karyawan.id_gaji = '$id'";
       $result=mysql_query($sql) or die(mysql_error());
            $no = 1;
            $total = 0;
            while($rows=mysql_fetch_array($result)){
			$total += $rows['jumlah'];
            ?>
            <tr>
                <td align="center"><?php echo $no++; ?></td>
                <td><?php echo $rows['nm_lembur']; ?></td>
				<td align="center"><?php echo $rows['jam_lembur']; ?></td>
				<td align="center"><?php echo $rows['nilai_lembur']; ?></td>
				<td><?php echo $rows['ket']; ?></td>
                <td align="right"><?php echo number_format ($rows['jumlah'],2); ?></td>
			</tr>
			
			<?php
			}
			?>
			<tr colspan="5">
			  <td colspan="4" align="right" >&nbsp;</td>
			  <td colspan="1" align="right" >&nbsp;</td>
		  </tr>
			<tr colspan="5">
                <td colspan="4" align="right" ><strong>Jumlah Lemburan</strong> : </td>
                <ins><td colspan="2" align="right" ><?php echo number_format ($total,2); ?></td>
                </ins>
          </tr>
			
</table>
            <table class="table table-bordered panel panel-default">
            <thead>
            <tr class="active">
              <th width="472">&nbsp;</th>
                <!--<th colspan="2"><p align="center">Pembayaran</p>                </th>-->
              <hr align="right">
                <th width="286">Bandung, <?php echo date("d F Y");?></th>
            </tr>
            </thead>
            <tbody>
            
            <tr>
              <td>&nbsp;</td>
                <td><p>&nbsp;</p>
                <p align="center">Compensation & Benefit Supervisor</p></td>
            </tr>
            </tbody>
  </table>
      </div>
    </div>
</div>

    