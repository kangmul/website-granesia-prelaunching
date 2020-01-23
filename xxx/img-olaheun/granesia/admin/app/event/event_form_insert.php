<?php 
// koneksi database -------------------------------------------->
//include('db.php');
//<--------------------------------------------------------------

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
			<h3 class="page-header"><label>Halaman Resensi Product</label></h3>


		
				<a class="btn btn-success" href="index.php?p=event&f=event_form_view"> <i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>

				
				<h3>Input Gambar</h3>
					<div class="panel panel-info">
		 <div class="panel-body">
				<form action="index.php?t=data&p=event&f=event_act_insert" method="post" id="form_insert" name="form_insert" enctype="multipart/form-data" >
					
					<div class="control-group">
					
						 <tr>
                            <td><label>Gambar : </label></td>
							</br>
                            <td>
								<input type="file" name="gambar" id="gambar" maxlength="100" required /></td>
                          </tr>
						  
						  <tr>
						  </br>
                            <td><label>Nama Event : </label></td>
							</br>
                            <td>
								<input type="text" name="keterangan" class="form-control" style=" width:400px;" 
								id="keterangan" placeholder="Judul" maxlength="100" required/>							
							</td>
                          </tr>
						  </br>
						  <tr>
						  
                            <td><label>Uraian : </label></td></br>
							
                           <td width="80%" height="250"><font face="Times New Roman" size="2">
    <textarea name="uraian" rows="15" cols="80"  id='elm2'></textarea></font></td>
                          </tr>
						 
						  
						  
					</div>
</br>
					<div class="control-group">
						<button type="submit" class="btn btn-primary">
							<i class="glyphicon glyphicon-saved"></i> Simpan
						</button>
						<button type="reset" class="btn btn-warning">
							<i class="glyphicon glyphicon-refresh"></i> Batal
						</button>
					</div>
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