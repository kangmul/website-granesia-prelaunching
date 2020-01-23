<?php
/**
 * Created by PhpStorm.
 * User: iy2
 * Date: 12/16/2015
 * Time: 9:29 AM
 */
$pdo = connect();
?>
<style type="text/css">
.field_container {
	padding: 10px;
	margin: 0 0 10px 0;
	border: 1px solid #cccccc;
	border-radius: 10px;
}
.field_container legend {
	padding: 0 5px 0 5px;
	font-size: 14px;
	font-weight: bold;
}
.input_container {
	height: 30px;
	float: left;
}
.frm_input {
	height: 20px;
	width: 200px;
	padding: 3px;
	border: 1px solid #cccccc;
	border-radius: 5px;
	margin: 0 5px 0 0;
}
.frm_button {
	height: 28px;
	width: 100px;
	padding: 3px;
	border: 1px solid #cccccc;
	border-radius: 5px;
	background: #999999;
	color: #ffffff;
	font-weight: bold;
	cursor: pointer;
}
.frm_button:hover {
	background: #cccccc;
}
.table_list {
	width: 100%;
	border: 0;
}
.table_list td, .table_list th {
	padding: 2px;
}
.delete_m {
	color: #666666;
	text-decoration: none;
	font-weight: bold;
}
.delete_m:hover {
	color: #999999;
}
.delete_m img {
	height: 12px;
}
.bg_h {
	background: #8d8b8b;
	color: #ffffff;
	text-align: center;
}
.bg_1 {
	background: #e3e2e2;
	text-align: center;
}
.bg_2 {
	background: #c0bfbf;
	text-align: center;
}
#list_container {
	text-align: center;
}
</style>


            
                <form action="" method="post" id="form-input">
					<input type="hidden" name="id_gaji" id="id_gaji" value="<?php echo $id; ?>">
					<table class="table">
					<tr>
						<td>
							<select class ="span11" name="id_lembur" id="id_lembur" class="satu form-control input-sm" required>
							<option value="">-Pilih Lembur-</option>
							<?php
							$query = "SELECT id_lembur,nm_lembur FROM t_lembur ";
							$fungsi->fungsi->dropsel($query, "");
							?>
							</select>
						</td>
						<td><input class ="span11" type="text" name="jam_lembur" id="jam_lembur" class="form-control input-sm"
                       placeholder="Jumlah Jam Lembur" required>
						</td>
						<td><input class ="span11" type="text" name="nilai_lembur" id="nilai_lembur" class="form-control input-sm"
                       placeholder="Nominal Lembur Perjam" required>
						</td>
						<td><input class ="span11" type="text" name="ket" id="ket" class="form-control input-sm"
                       placeholder="Masukan Keterangan" required>
						</td>
            <td><input type="button" class="frm_button" value="Tambah" onclick="add_member3()"></td>
        </tr>
    </table>
</form>
            
                
                <div id="list_container">
                    <?php 
                        // including the config file
                        //include('config.php');
                        $pdo = connect();
                        // list_members : this file displays the list of members in a table view
                        include('detail-njo-ss3.php'); 
                    ?>
                </div><!-- list_container -->
           </br>
				