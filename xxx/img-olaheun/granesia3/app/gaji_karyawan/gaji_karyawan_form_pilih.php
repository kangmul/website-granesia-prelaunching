<?php
include ('db.php');

function dropsel($query, $isi)
    {
        $db = new Database();
        $db = $db->connect();
        $result = $db->query($query);
        while ($row = $result->fetch(PDO::FETCH_BOTH)) {
            if ($isi != $row['0']) {
                echo '<option value="' . $row['0'] . '">'
                    . $row['1'] . '</option>';

            } else {
                echo '<option selected="selected" value="' . $row['0'] . '">'
                    . $row['1'] . '</option>';
            }
        }
    }
// $username = $_GET['username'];

//$index = isset($_GET['index']) ? $_GET['index'] : null;
//atau:
//$page = isset($_GET['page']) ? $_GET['page'] : false;
//atau bisa juga dengan:
//$page = isset($_GET['page']) ? $_GET['page'] : "";

//$query = "SELECT * FROM tkjp ";
//$result = mysql_query($query) or die(mysql_error());
//$data = mysql_fetch_array($result) or die(mysql_error());

empty( $file ) ? header('location:../../index.php') : '' ;
	if(isset($_SESSION['level'])){?>

<?php if($_SESSION['level']=='superadmin'){ ?>

<script>
	$(document).ready(function() {
		$("#form_update").validate({
			rules : {
				password : "required",
				passwordc : {
					equalTo : "#password"
				}
			}
		});
	}); 
</script>


<html lang="en">
 <body>
 	<div class="container">
		<div class="row-fluid">
			<div class="span2">
				<?php include "app/menutabel.php";?>
			</div><!--/span-->
			<div class="span9">
				<div class="container">
					<a class="btn btn-success" href="index.php?folder=fungsi_kerja&file=fkerja_form_view"> <i class="icon icon-arrow-left"></i> Back</a>
				<br />
				<br />

					<form action="index.php?folder=fungsi_kerja&file=fkerja_act_update" method="post" id="form_update" name="form_update">
						<div class="control-group">
							<label for="password">Nama Karyawan : </label>
								<div class="controls">
							<select name='id_field' onChange='javascript:dinamis(this)'>
								<?php 
										$query = "SELECT nik,concat(nik,' - ',nama_lengkap) FROM tkjp ";
										$fungsi->fungsi->dropsel($query, "");
								?>
								</select>
							</div>
						</div>
						<?
						if(isset($_SESSION['pesan'])){
								echo $_SESSION['pesan'];
								unset($_SESSION['pesan']);
							}
						?>

						<div class="control-group">
							<button type="submit" value="update" class="btn btn-primary">
								<i class="icon icon-pencil"></i> Update
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
  </body>
</html>
            
<?php } 
}else{
echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
}


?>

