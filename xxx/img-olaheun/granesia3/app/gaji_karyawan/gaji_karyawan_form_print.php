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
  `gaji`.`id`,
  `gaji`.`periode`,
  `tkjp`.`index`,
  `tkjp`.`nm_lengkap`,
  `tkjp`.`nik`,
  `tkjp`.`no_rek_payroll`,
  `t_jabatan`.`nm_jabatan`,
  `tkjp`.`id_gol`,
  `tkjp`.`id_gapok`,
  `fungsi_kerja`.`fkerja`,
  `t_golongan`.`nama_gol`,
  `gaji`.`gapok`,
  Sum(`t_pot_karyawan`.`jumlah`) AS `jml`,
  `t_gapok`.`gapok`,
  `t_merital`.`nm_status`,
  `gaji`.`sisa_gaji`
FROM
  `gaji`
  LEFT JOIN `tkjp` ON `tkjp`.`index` = `gaji`.`id_karyawan`
  LEFT JOIN `t_jabatan` ON `tkjp`.`id_jabatan` = `t_jabatan`.`id_jabatan`
  LEFT JOIN `t_pot_karyawan` ON `gaji`.`id` = `t_pot_karyawan`.`id_gaji`
  LEFT JOIN `t_gapok` ON `tkjp`.`id_gapok` = `t_gapok`.`id_gapok`
  LEFT JOIN `fungsi_kerja` ON `tkjp`.`id_fkerja` = `fungsi_kerja`.`id_fkerja`
  LEFT JOIN `t_golongan` ON `gaji`.`golongan` = `t_golongan`.`id_gol`
  LEFT JOIN t_merital ON tkjp.id_merital = t_merital.id_merital
WHERE
  `gaji`.`id` = '".$id."'
GROUP BY
  `t_gapok`.`gapok`";
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
                <td width="430">: <?php echo $data['index']; ?></td>
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
                <td>: <?php echo $data['nama_gol']; ?></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Status Marital</td>
                <td>: <?php echo $data['nm_status']; ?></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td align="right" ><strong>Gaji Pokok</strong> : </td>
                <td align="right" ><?php echo number_format ($data['gapok'],2); ?></td>
              </tr>
          </table>
      </div>
      <div class="col-xs-6">
        <table class="table">
    <tr>
      <th colspan="4" align="center" ><div align="left">Potongan Gaji</div></th>
      </tr>
    <tr>
        <th width="42" align="center" >No</th>
        <th width="142" align="left" >Nama Potongan</th>
		<th width="260" align="left">Keterangan</th>
        <th width="155" align="center" >Jumlah</th>
       </tr>
    <?php
		// display the list of all members in table view
        $sql = "SELECT t_potongan.nama_potongan,t_pot_karyawan.jumlah,t_pot_karyawan.ket,t_pot_karyawan.id as id_pot FROM `t_pot_karyawan`
  LEFT JOIN `gaji` ON `t_pot_karyawan`.`id_gaji` = `gaji`.`id`
  LEFT JOIN `t_potongan` ON `t_pot_karyawan`.`id_potongan` = `t_potongan`.`id_potongan`
   WHERE t_pot_karyawan.id_gaji = '$id'";
       $result=mysql_query($sql) or die(mysql_error());
            $no = 1;
            $total = 0;
            while($rows=mysql_fetch_array($result)){
			$total += $rows['jumlah'];
            ?>
            <tr>
                <td align="center"><?php echo $no++; ?></td>
                <td><?php echo $rows['nama_potongan']; ?></td>
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
                <td colspan="4" align="right" ><strong>Jumlah Potongan</strong> : </td>
                <ins><td width="160" colspan="1" align="right" ><?php echo number_format ($total,2); ?></td></ins>
          </tr>
			<tr colspan="5">
                <td colspan="4" align="right" ><strong>JUMLAH GAJI YANG DITERIMA</strong> : </td>
                <td colspan="1" align="right" ><?php echo number_format ($data['sisa_gaji'],2); ?></td>
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

    