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
        <th align="center" >Nama Potongan</th>
		<th align="center" >Keterangan</th>
        <th align="center" >Jumlah</th>
        <th align="center" >Aksi</th>
    </tr>
    <?php
		// display the list of all members in table view
		$id = isset($_GET['id']) ? $_GET['id'] : '';
		
        $sql = "SELECT t_potongan.nama_potongan,t_pot_karyawan.jumlah,t_pot_karyawan.ket,t_pot_karyawan.id as id_pot FROM `t_pot_karyawan`
  LEFT JOIN `gaji` ON `t_pot_karyawan`.`id_gaji` = `gaji`.`id`
  LEFT JOIN `t_potongan` ON `t_pot_karyawan`.`id_potongan` = `t_potongan`.`id_potongan`
   WHERE t_pot_karyawan.id_gaji = '$id' OR t_pot_karyawan.id = '$id'";
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
                <td><?php echo $rs['nama_potongan']; ?></td>
				<td><?php echo $rs['ket']; ?></td>
                <td><?php echo number_format($rs['jumlah'],2); ?></td>
                <td><a href="#" class="delete_m" onclick="delete_member(<?php echo $rs['id_pot']; ?>)"><img src="images/delete.png"> Delete</a></td>
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
                <td colspan="3" align="right" ><strong>Jumlah Potongan</strong> : </td>
                <td width="160" align="right" ><?php echo number_format($total,2); ?></td>
                <td></td>
          </tr>
</table>