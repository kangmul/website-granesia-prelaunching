<?php
$proses = 'tambah';
$id = isset($_GET['id']) ? $id = $_GET['id'] : '';
if ($id == '') {
    $urut = $fungsi->fungsi->urut("form_njo", "id");
    $akronim = "NJO/GRA-ICT-".$_SESSION['login-' . apl]['id'];
    $counter = $fungsi->fungsi->counter($akronim);
    $no_njo = "NJO//".$_SESSION['login-' . apl]['id']."/".date('Y-m')."/".$counter;
	$username = isset($_POST['username']) ? $_POST['username'] : $_SESSION['login-' . apl]['nama'];
	$tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : date('Y-m-d');
	//$tanggal_bukti = isset($_POST['tanggal_bukti']) ? $_POST['tanggal_bukti'] : date('Y-m-d');
    $query = "INSERT INTO form_njo (id,no_njo,tanggal,username) VALUES ('$urut','$no_njo','$tanggal','$username')";
    //echo $query;
	//die();
	$db->query($query);
    $fungsi->fungsi->redirect('?modul=form_njo/form&id=' . $urut);
} else {
    $query = "SELECT * FROM form_njo WHERE id=$id LIMIT 1";
    $result = $db->query($query);
    $row = $result->fetch();
    $proses = 'update';

}

$no_njo = isset($row['no_njo']) ? $no_njo = $row['no_njo'] : $no_njo;
$no_njo_array = explode('/',$no_njo);
$tanggal = isset($row['tanggal']) ? $tanggal = $row['tanggal'] : date('Y-m-d');
$tanggal_bukti = isset($row['tanggal_bukti']) ? $row['tanggal_bukti'] : date('Y-m-d');
$username = isset($row['username']) ? $username = $row['username'] : $_SESSION['login-' . apl]['nama'];
$kegiatan = $fungsi->fungsi->cari_value("users1","bagian","username","$username");
//$kegiatan = isset($row['kegiatan']) ? $row['kegiatan'] : '';
$ket = isset($row['ket']) ? $ket = $row['ket'] : '';
?>
<div ng-app>
    <div class="pull-right">
        <?php
        $fungsi->tombol->kembali();
        ?>
    </div>
    <br><br><br>

    <form action="<?php $fungsi->fungsi->action($page); ?>" method="post">
        <input type="hidden" name="proses" value="<?php echo $proses; ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="no_njo" value="<?php echo $no_njo; ?>">

        <div class="panel panel-default">
            <div class="panel-heading"> Form Isian
                <div class="pull-right">
                    <?php
                    $fungsi->tombol->save();
                    ?>

                </div>
                <br>
                <br>
            </div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>Input no_njo</td>
                        <td>
                            <div class="input-group">
                                    <span class="btn-group input-sm"><input type="text" name="" class="form-control input-sm" value="<?php echo $no_njo_array[0];?>/"></span>
                                    <span class="btn-group input-sm"><select name="kode_njo" class="form-control input-sm">
                                        <option value="">-Kode Njo-</option>
                                        <?php
                                        $query = "SELECT id_njo,concat (id_njo,' - ',nama_njo) as nama FROM njo";
                                        $fungsi->fungsi->dropsel($query, $no_njo_array[1]);
                                        ?>
                                    </select></span>
									<span class="btn-group input-sm"><input type="text" name="" class="form-control input-sm"
                                   value="/<?php echo $no_njo_array[2].'/'.$no_njo_array[3].'/'?>" ></span>
								   <span class="btn-group input-sm"><input type="text" name="counter" class="form-control input-sm"
                                   value="<?php echo $no_njo_array[4];?>" ></span>
                                <!--<span class="input-group-btn"><button class="btn btn-sm">/<?php //echo $no_njo_array[2].'/'.$no_njo_array[3];?></button></span>-->

                            </div>
                        </td>
						<td>tanggal Bukti</td>
                        <td><input type="text" name="tanggal_bukti" class="tgl form-control input-sm"
                                   value="<?php echo $tanggal_bukti; ?>" placeholder="Masukan tanggal">
                        </td>
                        
                    </tr>
                    <tr>
					<td>Input Kegiatan</td>
                        <td><input type="text" name="kegiatan" class="form-control input-sm"
                                   value="<?php echo $kegiatan; ?>" placeholder="Masukan username">
                        </td>
					
						
                        <td>tanggal Input</td>
                        <td><input type="text" name="tanggal" class="tgl form-control input-sm"
                                   value="<?php echo $tanggal; ?>" placeholder="Masukan tanggal">
                        </td>
						
						
                       

                    </tr>
                    <tr>
					<td>Keterangan</td>
                         <td><textarea type="text" name="ket"
                                    placeholder="Masukan ket"><?php echo $ket; ?></textarea>

                        </td>
					
					 <td>Input username</td>
                        <td><input type="text" name="username" class="form-control input-sm"
                                   value="<?php echo $username; ?>" placeholder="Masukan username">
                        </td>
                   
                    </tr>
                </table>
            </div>
        </div>

    </form>

    <?php
    require_once VIEW . 'form_njo/detail-njo-form.php';
    ?>
</div>
