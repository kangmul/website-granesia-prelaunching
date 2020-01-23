<?php
/**
 * Created by PhpStorm.
 * User: iy2
 * Date: 11/19/2015
 * Time: 3:01 PM
 */
 $pdo = connect();
 
	
?>


<table class="table">
    <tr>
        <th align="center" >No</th>
        <th align="center" >Nama Tunjangan</th>
		<th align="center" >Keterangan</th>
        <th align="center" >Jumlah</th>
        <th align="center" >Aksi</th>
    </tr>
    <?php
		// display the list of all members in table view
		$id = isset($_GET['id']) ? $_GET['id'] : '';
		 
        $sql = "SELECT t_tunjangan.nama_tunjangan,t_tun_karyawan.jumlah,t_tun_karyawan.ket,t_tun_karyawan.id as id_tun FROM `t_tun_karyawan`
  LEFT JOIN `tunjangan` ON `t_tun_karyawan`.`id_gaji` = `tunjangan`.`id`
  LEFT JOIN `t_tunjangan` ON `t_tun_karyawan`.`id_tunjangan` = `t_tunjangan`.`id_tunjangan`
   WHERE t_tun_karyawan.id_gaji = '$id' OR t_tun_karyawan.id = '$id'";
        $query = $pdo->prepare($sql);
        $query->execute();
        $list = $query->fetchAll();
		$no=1;
		$total = 0;
        //$bg = 'bg_1';
        foreach ($list as $rs) {
		$total += $rs['jumlah'];
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $rs['nama_tunjangan']; ?></td>
				<td><?php echo $rs['ket']; ?></td>
                <td><?php echo number_format($rs['jumlah'],2); ?></td>
                <td><a href="#" class="delete_m" onclick="delete_member2(<?php echo $rs['id_tun']; ?>)"><img src="images/delete.png"> Delete</a></td>
            </tr>
			
			
            <?php
           // if ($bg == 'bg_1') {
           //     $bg = 'bg_2';
            //} else {
           //     $bg = 'bg_1';
           // }
        }
		
    ?>
	<tr>
                <td colspan="3" align="right" ><strong>Jumlah Tunjangan</strong> : </td>
                <td width="160" align="right" ><?php echo number_format($total,2); ?></td>
                <td></td>
          </tr>
</table>