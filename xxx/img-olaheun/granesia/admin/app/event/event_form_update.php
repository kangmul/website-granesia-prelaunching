<?php
include ('db.php');

$id = isset($_GET['id']) ? $_GET['id'] : null;

$query = "SELECT * FROM event WHERE id='".$id."'";
$result = mysql_query($query) or die(mysql_error());
$data = mysql_fetch_array($result) or die(mysql_error());

empty( $f ) ? header('location:../../index.php') : '' ;
	include "app/admin.php";
	
if($_SESSION['level']=='1'){?>

<script type="text/javascript" src="./plugins/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
	mode : "exact",
	elements : "elm2",
	theme : "advanced",
	skin : "o2k7",
	skin_variant : "silver",
	plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups",
	
	theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
	theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,|,insertdate,inserttime,preview,|,forecolor,backcolor",
	theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
	theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_statusbar_location : "bottom",
	theme_advanced_resizing : true,
	
	template_external_list_url : "lists/template_list.js",
	external_link_list_url : "lists/link_list.js",
	external_image_list_url : "lists/image_list.js",
	media_external_list_url : "lists/media_list.js",
	
	template_replace_values : {
		username : "Some User",
		staffid : "991234"
	}
	});
</script>

<div class="col-sm-10 main">
			<h3 class="page-header"><label>Halaman Event Update</label></h3>

				<a class="btn btn-success" href="index.php?t=data&p=event&f=event_form_view"> <i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>

				<h3>Update Gambar</h3>

				<div class="panel panel-info">
		 <div class="panel-body">
				<form action="index.php?t=data&p=event&f=event_act_update" method="post" id="form_update" name="form_update" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
					<input type="hidden" name="gambar" value="<?php echo $data['gambar']; ?>" />
					

					<div class="control-group">
						
						
						                           <tr>
                            <td><label>Gambar : </label></td>
							</br>
                            <td>
							<?php
									if(empty($data['gambar'])){
											echo "<img src=app/event/files/noimage.jpg width=55 height=55 class=img-rounded>";
										}
										else{
											echo "<img src=app/event/files/$data[gambar] width=150 height=150 class=img-rounded>";
										}
								?> 
								<input  type="file" name="gambar" id="gambar"  value="<?php echo $data['gambar'];?>"  />
								</td>
								</br>
                          </tr>

						  
						  
						 </br>
						  <tr></br>
                            <td><label>Nama Event : </label></td></br>
                            <td>
								<input type="text" name="keterangan"  class="form-control" style=" width:400px;" 
								id="keterangan" value="<?php echo $data['keterangan'];?>" required/>							</td>
                          </tr>
						  
						 </br>
						  <tr>
						  <td><label>Uraian : </label></td></br>
                             <td width="100%" height="400"><font face="Times New Roman" size="3">
							
    <textarea name="uraian" rows="15" cols="80"  id='elm2'><?php  echo $data['uraian']; ?></textarea></font></td>
                          </tr>
						  
					</div>

					<?
					if(isset($_SESSION['pesan'])){echo $_SESSION['pesan']; unset($_SESSION['pesan']);}

					?>
</br>
					<div class="control-group">
						<button type="submit" value="update" class="btn btn-primary">
							<i class="glyphicon glyphicon-saved"></i> Update
						</button>
					
					</div>
						</br>
				</form>
			</div>
			</div>
			</div>
		</div>
 

  <?php }  
else {
		echo '<div class="alert alert-error"> Maaf Anda anda tidak punya akses </div>';
	}
?>