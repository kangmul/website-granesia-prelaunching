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
  `tunjangan`.`id`,
  `tunjangan`.`periode`,
  `tkjp`.`nm_lengkap`,
  `tkjp`.`nik`,
  `tkjp`.`no_rek_payroll`,
  `t_jabatan`.`nm_jabatan`,
  `t_jabatan`.`tunjab`,
  `t_jabatan`.`tunkom`,
  `t_jabatan`.`tuntak`,
  `t_jabatan`.`tunkor`,
  `t_golongan`.`nama_gol`,
  `tkjp`.`id_gol`,
  `tkjp`.`id_gapok`,
  `fungsi_kerja`.`fkerja`,
  Sum(`t_tun_karyawan`.`jumlah`) AS `jml`
  
FROM
  `tunjangan`
  LEFT JOIN `tkjp` ON `tkjp`.`index` = `tunjangan`.`id_karyawan`
  LEFT JOIN `t_jabatan` ON `tkjp`.`id_jabatan` = `t_jabatan`.`id_jabatan`
  LEFT JOIN `t_tun_karyawan` ON `tunjangan`.`id` = `t_tun_karyawan`.`id_tunjangan`
  LEFT JOIN `fungsi_kerja` ON `tkjp`.`id_fkerja` = `fungsi_kerja`.`id_fkerja`
  LEFT JOIN `t_golongan` ON `tkjp`.`id_gol` = `t_golongan`.`id_gol`
  WHERE
  `tunjangan`.`id` = '".$id."'";
$result = mysql_query($query);
$data = mysql_fetch_array($result) or die(mysql_error());

$tunjab = $data['tunjab'];
$tunkom = $data['tunkom'];
$tuntak = $data['tuntak'];
$tunkor = $data['tunkor'];

$jml_tun = $tunjab + $tunkom + $tuntak + $tunkor;

?>
<div class="container">
    <div class="row">
        
        <div class="col-xs-5">
          <h4 align="center">SLIP TUNJANGAN KARYAWAN PT. GRANESIA</h4>
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
                <td>: <?php echo $data['nama_gol']; ?></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Status Marital</td>
                <td>: </td>
                <td>&nbsp;</td>
              </tr>
			  <tr>
                <td>Golongan</td>
                <td>: <?php echo $data['nm_jabatan']; ?></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td align="right" ><strong>Tunjangan Jabatan</strong> : </td>
                <td align="right" ><?php echo number_format ($data['tunjab'],2); ?></td>
              </tr>
			  <tr>
                <td>&nbsp;</td>
                <td align="right" ><strong>Tunjangan Komunikasi</strong> : </td>
                <td align="right" ><?php echo number_format ($data['tunkom'],2); ?></td>
              </tr>
			  <tr>
                <td>&nbsp;</td>
                <td align="right" ><strong>Dana Taktis</strong> : </td>
                <td align="right" ><?php echo number_format ($data['tuntak'],2); ?></td>
              </tr>
			  <tr>
                <td>&nbsp;</td>
                <td align="right" ><strong>Uang Koran</strong> : </td>
                <td align="right" ><?php echo number_format ($data['tunkor'],2); ?></td>
              </tr>
			  <tr>
                <td>&nbsp;</td>
                <td align="right" ><strong>Jumlah Tunjangan</strong> : </td>
                <td align="right" ><?php echo number_format ($data['tunkor'],2); ?></td>
              </tr>
          </table>
      </div>
      <div class="col-xs-6">
        <table class="table">
    <tr>
      <th colspan="4" align="center" ><div align="left">Tunjangan Lain-lainnya</div></th>
      </tr>
    <tr>
        <th width="42" align="center" >No</th>
        <th width="261" align="left" >Nama Tunjangan</th>
		<th width="141" align="left">Keterangan</th>
        <th width="155" align="center" >Jumlah</th>
       </tr>
    <?php
		// display the list of all members in table view
        $sql = "SELECT t_tunjangan.nama_tunjangan,t_tun_karyawan.jumlah,t_tun_karyawan.ket,t_tun_karyawan.id as id_tun FROM `t_tun_karyawan`
  LEFT JOIN `tunjangan` ON `t_tun_karyawan`.`id_tunjangan` = `tunjangan`.`id`
  LEFT JOIN `t_tunjangan` ON `t_tun_karyawan`.`id_tunjangan` = `t_tunjangan`.`id_tunjangan`
   WHERE t_tun_karyawan.id_gaji = '$id'";
       $result=mysql_query($sql) or die(mysql_error());
            $no = 1;
            $total = 0;
            while($rows=mysql_fetch_array($result)){
			$total += $rows['jumlah'];
            ?>
            <tr>
                <td align="center"><?php echo $no++; ?></td>
                <td><?php echo $rows['nama_tunjangan']; ?></td>
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
                <td colspan="4" align="right" ><strong>JUMLAH TUNJANGAN YANG DITERIMA</strong> : </td>
                <td colspan="1" align="right" ><?php echo number_format ($jml_tun + $total,2); ?></td>
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

    