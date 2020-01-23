<style>
.form-container {
   border: 0px solid #7a5454;
   background: #ffffff;
   background: -webkit-gradient(linear, left top, left bottom, from(#000000), to(#ffffff));
   background: -webkit-linear-gradient(top, #000000, #ffffff);
   background: -moz-linear-gradient(top, #000000, #ffffff);
   background: -ms-linear-gradient(top, #000000, #ffffff);
   background: -o-linear-gradient(top, #000000, #ffffff);
   background-image: -ms-linear-gradient(top, #000000 0%, #ffffff 100%);
   -webkit-border-radius: 30px;
   -moz-border-radius: 30px;
   border-radius: 30px;
   -webkit-box-shadow: rgba(000,000,000,0.9) 0 1px 2px, inset rgba(255,255,255,0.4) 0 1px 0;
   -moz-box-shadow: rgba(000,000,000,0.9) 0 1px 2px, inset rgba(255,255,255,0.4) 0 1px 0;
   box-shadow: rgba(000,000,000,0.9) 0 1px 2px, inset rgba(255,255,255,0.4) 0 1px 0;
   font-family: 'Helvetica Neue',Helvetica,sans-serif;
   text-decoration: none;
   vertical-align: middle;
   min-width:300px;
   padding:20px;
   width:300px;
   }
.form-field {
   border: 0px solid #fa8703;
   background: #e4d5c3;
   -webkit-border-radius: 8px;
   -moz-border-radius: 8px;
   border-radius: 8px;
   color: #693c09;
   -webkit-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(000,000,000,0.7) 0 1px 1px;
   -moz-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(000,000,000,0.7) 0 1px 1px;
   box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(000,000,000,0.7) 0 1px 1px;
   padding:8px;
   margin-bottom:20px;
   width:280px;
   }
.form-field:focus {
   background: #000000;
   color: #ffffff;
   }
.form-container h2 {
   text-shadow: #000000 0 1px 0;
   font-size:18px;
   margin: 0 0 10px 0;
   font-weight:bold;
   text-align:center;
    }
.form-title {
   margin-bottom:10px;
   color: #b86200;
   text-shadow: #000000 0 1px 0;
   }
.submit-container {
   margin:8px 0;
   text-align:right;
   }
.submit-button {
   border: 0px solid #447314;
   background: #6aa436;
   background: -webkit-gradient(linear, left top, left bottom, from(#8dc059), to(#6aa436));
   background: -webkit-linear-gradient(top, #8dc059, #6aa436);
   background: -moz-linear-gradient(top, #8dc059, #6aa436);
   background: -ms-linear-gradient(top, #8dc059, #6aa436);
   background: -o-linear-gradient(top, #8dc059, #6aa436);
   background-image: -ms-linear-gradient(top, #8dc059 0%, #6aa436 100%);
   -webkit-border-radius: 30px;
   -moz-border-radius: 30px;
   border-radius: 30px;
   -webkit-box-shadow: rgba(255,255,255,0.4) 0 0px 0, inset rgba(255,255,255,0.4) 0 0px 0;
   -moz-box-shadow: rgba(255,255,255,0.4) 0 0px 0, inset rgba(255,255,255,0.4) 0 0px 0;
   box-shadow: rgba(255,255,255,0.4) 0 0px 0, inset rgba(255,255,255,0.4) 0 0px 0;
   text-shadow: #addc7e 0 1px 0;
   color: #101f00;
   font-family: helvetica, serif;
   padding: 8.5px 18px;
   font-size: 14px;
   text-decoration: none;
   vertical-align: middle;
   }
.submit-button:hover {
   border: 0px solid #447314;
   text-shadow: #31540c 0 1px 0;
   background: #6aa436;
   background: -webkit-gradient(linear, left top, left bottom, from(#8dc059), to(#6aa436));
   background: -webkit-linear-gradient(top, #8dc059, #6aa436);
   background: -moz-linear-gradient(top, #8dc059, #6aa436);
   background: -ms-linear-gradient(top, #8dc059, #6aa436);
   background: -o-linear-gradient(top, #8dc059, #6aa436);
   background-image: -ms-linear-gradient(top, #8dc059 0%, #6aa436 100%);
   color: #fff;
   }
.submit-button:active {
   text-shadow: #31540c 0 1px 0;
   border: 0px solid #447314;
   background: #8dc059;
   background: -webkit-gradient(linear, left top, left bottom, from(#6aa436), to(#6aa436));
   background: -webkit-linear-gradient(top, #6aa436, #8dc059);
   background: -moz-linear-gradient(top, #6aa436, #8dc059);
   background: -ms-linear-gradient(top, #6aa436, #8dc059);
   background: -o-linear-gradient(top, #6aa436, #8dc059);
   background-image: -ms-linear-gradient(top, #6aa436 0%, #8dc059 100%);
   color: #fff;
   }

</style>


<?php 
include "../../../../koneksi.php";
?>  

<?php 
$id = isset($_GET['id']) ? $_GET['id'] : '';;
$query = mysql_query ("select * from produksi2 where id='$id'");
$data= mysql_fetch_array($query);
?>

<form class="form-container" method="post" action="proses_edit.php?id=<?php echo $_GET['id'];?>" >
<div class="form-title"><h2>EDIT DATA</h2></div>
<div class="form-title">foto</div>
<input class="form-field" type="file" name="foto" REQUIRED/><br><?php echo $data['foto']?><br><br>
<div class="form-title">NAMA</div>
<input class="form-field" type="text" name="nama" REQUIRED/><br><?php echo $data['nama']?><br><br>
<div class="form-title">alamat</div>
<input class="form-field" type="text" name="alamat" REQUIRED/><br><?php echo $data['alamat']?><br><br>
<div class="form-title">awal</div>
<input class="form-field" type="date" name="awal" REQUIRED/><br><?php echo $data['awal']?><br><br>
<div class="form-title">status</div>
<input class="form-field" type="text" name="status" REQUIRED/><br><?php echo $data['status']?><br>
<div class="submit-container">
<input class="submit-button" type="submit" value="Submit" />
</div>
</form> 