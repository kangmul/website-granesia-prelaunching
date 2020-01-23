<script>
	$(function() {
		
		$( "#ktp" ).autocomplete({
			source: 'app/karyawan/auto_complete_ktp.php'
		});
	});
	
	$(function() {
		
		$( "#name" ).autocomplete({
			source: 'app/gaji_karyawan/auto_complete_nama.php'
		});
	});
	
	$(function() {
		
		$( "#klasifikasi" ).combobox();
		$( "#toggle" ).click(function() {
			$( "#combobox" ).toggle();
		});
	});
	
	
	
	$(function() {
		
		$( "#no_po" ).combobox();
		$( "#toggle" ).click(function() {
			$( "#combobox" ).toggle();
		});
	});
	
	$(function() {
		
		$( "#field" ).combobox();
		$( "#toggle" ).click(function() {
			$( "#combobox" ).toggle();
		});
		
	});
	
	$(function() {
		
		$( "#lokasi_kerja" ).combobox();
		$( "#toggle" ).click(function() {
			$( "#combobox" ).toggle();
		});
	});
	
	$(function() {
		
		$( "#sistem_kerja" ).combobox();
		$( "#toggle" ).click(function() {
			$( "#combobox" ).toggle();
		});
	});
	
	
	
	$(function() {
		
		$( "#fungsi_kerja" ).combobox();
		$( "#toggle" ).click(function() {
			$( "#combobox" ).toggle();
		});
	});
	
	$(function() {
		
		$( "#batas" ).combobox();
		$( "#toggle" ).click(function() {
			$( "#combobox" ).toggle();
		});
	});
	
	(function( $ ) {
		$.widget( "custom.combobox", {
			_create: function() {
				this.wrapper = $( "<span>" )
					.addClass( "custom-combobox" )
					.insertAfter( this.element );

				this.element.hide();
				this._createAutocomplete();
				this._createShowAllButton();
			},

			_createAutocomplete: function() {
				var selected = this.element.children( ":selected" ),
					value = selected.val() ? selected.text() : "";

				this.input = $( "<input>" )
					.appendTo( this.wrapper )
					.val( value )
					.attr( "title", "" )
					.addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
					.autocomplete({
						delay: 0,
						minLength: 0,
						source: $.proxy( this, "_source" )
					})
					.tooltip({
						tooltipClass: "ui-state-highlight"
					});

				this._on( this.input, {
					autocompleteselect: function( event, ui ) {
						ui.item.option.selected = true;
						this._trigger( "select", event, {
							item: ui.item.option
						});
						
						$("form").submit();
					},

					autocompletechange: "_removeIfInvalid"
				});
			},

			_createShowAllButton: function() {
				var input = this.input,
					wasOpen = false;

				$( "<a>" )
					.attr( "tabIndex", -1 )
					.attr( "title", "Show All Items" )
					.tooltip()
					.appendTo( this.wrapper )
					.button({
						icons: {
							primary: "ui-icon-triangle-1-s"
						},
						text: false
					})
					.removeClass( "ui-corner-all" )
					.addClass( "custom-combobox-toggle ui-corner-right" )
					.mousedown(function() {
						wasOpen = input.autocomplete( "widget" ).is( ":visible" );
					})
					.click(function() {
						input.focus();

						// Close if already visible
						if ( wasOpen ) {
							return;
						}

						// Pass empty string as value to search for, displaying all results
						input.autocomplete( "search", "" );
					});
			},

			_source: function( request, response ) {
				var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
				response( this.element.children( "option" ).map(function() {
					var text = $( this ).text();
					if ( this.value && ( !request.term || matcher.test(text) ) )
						return {
							label: text,
							value: text,
							option: this
						};
				}) );
			},

			_removeIfInvalid: function( event, ui ) {

				// Selected an item, nothing to do
				if ( ui.item ) {
					return;
				}

				// Search for a match (case-insensitive)
				var value = this.input.val(),
					valueLowerCase = value.toLowerCase(),
					valid = false;
				this.element.children( "option" ).each(function() {
					if ( $( this ).text().toLowerCase() === valueLowerCase ) {
						this.selected = valid = true;
						return false;
					}
				});

				// Found a match, nothing to do
				if ( valid ) {
					return;
				}

				// Remove invalid value
				this.input
					.val( "" )
					.attr( "title", value + " didn't match any item" )
					.tooltip( "open" );
				this.element.val( "" );
				this._delay(function() {
					this.input.tooltip( "close" ).attr( "title", "" );
				}, 2500 );
				this.input.data( "ui-autocomplete" ).term = "";
			},

			_destroy: function() {
				this.wrapper.remove();
				this.element.show();
			}
		});
	})( jQuery );
	
	$(document).ready(function(){
											function showProfileTooltip(e, id){
												var top = e.clientY + 20;
												var left = e.clientX - 10;

												$('.p-tooltip').css({
													'top':top,
													'left':left
												}).show();
												//send id & get info from get_profile.php
												$.ajax({
													url: 'app/karyawan/get_profile.php?id='+id,
													beforeSend: function(){
														$('.p-tooltip').html('Loading..');
													},
													success: function(html){
														$('.p-tooltip').html(html);
													}
												});
											}

											function hideProfileTooltip(){
												$('.p-tooltip').hide();
											}

											$('.profile').mouseover(function(e){
												var id = $(this).attr('data-id');
												showProfileTooltip(e, id);
											});

											$('.p-tooltip').mouseleave(function(){
												hideProfileTooltip();
											});
										});
	</script>
	
	<style>
	.custom-combobox {
	position: relative;
	display: inline-block;
	font-size: 10px;
	font-weight: normal;
	
	
	}
	.custom-combobox-toggle {
		position: absolute;
		top: 0;
		bottom: 0;
		margin-left: -25px;
		padding: 0;
		/* support: IE7 */
		*height: 1.7em;
		*top: 0.1em;
	}
	.custom-combobox-input {
		margin: 0;
		padding: 0.3em;
	}
	</style>


<?php
	//include('db.php');
	// koneksi database -------------------------------------------->
	//<--------------------------------------------------------------
	if(isset($st)){
		include('config.php');
	}
	empty( $file ) ? header('location:../../index.php') : '' ;
	
	
	$bulan = isset($_POST['bulan']) ? $_POST['bulan'] : date ('m');
	$tahun = isset($_POST['tahun']) ? $_POST['tahun'] : date ('Y');
	
	if(empty($nama))
	$nama = '0';
	if(empty($ktp))
	$ktp = '0';
	
	if(!isset($_POST['id_field']) || !isset($_GET['id_field']))
	$id_field = '0';
	
	if(!isset($_POST['id_no_po']) || !isset($_GET['id_no_po']))
	$id_no_po = '0';
	
	if(!isset($_POST['id_lks_kerja']) || !isset($_GET['id_lks_kerja']))
	$id_lks_kerja = '0';
	
	if(!isset($_POST['id_sistem_kerja']) || !isset($_GET['id_sistem_kerja']))
	$id_sistem_kerja = '0';
	
	if(!isset($_POST['id_klasifikasi']) || !isset($_GET['id_klasifikasi']))
	$id_klasifikasi = '0';
	
	if(!isset($_POST['id_perusahaan']) || !isset($_GET['id_perusahaan']))
	$id_perusahaan = '0';
	
	if(!isset($_POST['id_fpemegang_kontrak']) || !isset($_GET['id_fpemegang_kontrak']))
	$id_fpemegang_kontrak = '0';
	
	if(!isset($_POST['id_fkerja']) || !isset($_GET['id_fkerja']))
	$id_fkerja = '0';
	
	//cek status tabel field,pemegang_kontrak,fungsi_kerja,lokasi_kerja
	
		$status_field = '';
		$status_no_po = '';
		$status_klasifikasi = '';
		$status_perusahaan = '';
		$status_sistem_kerja = '';
		$status_pemegang_kontrak = '';
		$status_pemegang_kontrak2 = '';
		$status_fungsi_kerja = '';
		$status_fungsi_kerja2 = '';
		$status_fungsi_kerja3 = '';
		$status_fungsi_kerja4 = '';
		$status_lokasi_kerja = '';
		$status_lokasi_kerja2 = '';
		$status_lokasi_kerja3 = '';
		$status_lokasi_kerja4 = '';
		$status_lokasi_kerja5 = '';
		$status_lokasi_kerja6 = '';
		$status_lokasi_kerja7 = '';
		$status_lokasi_kerja8 = '';
		$filter_field = '';
		$filter_fungsi_kerja = '';
		$filter_lokasi_kerja = '';
		$filter_no_po = '';
		$filter_klasifikasi = '';
		$filter_perusahaan = '';
		$filter_sistem_kerja = '';
	
	
	//cek status tabel field,pemegang_kontrak,fungsi_kerja,lokasi_kerja
	
		
		
		//$id_field = $_POST['id_field'];
		if(isset($_POST['id_field'])){
			$id_field = $_POST['id_field'];
		}else if(isset($_GET['id_field'])){
			$id_field = $_GET['id_field'];
		}
		
		
		
		//$id_fkerja = $_POST['id_fkerja'];
		if(isset($_POST['id_fkerja'])){
			$id_fkerja = $_POST['id_fkerja'];
		}else if(isset($_GET['id_fkerja'])){
			$id_fkerja = $_GET['id_fkerja'];
		}
		
		//$id_lks_kerja = $_POST['id_lks_kerja'];
		if(isset($_POST['id_lks_kerja'])){
			$id_lks_kerja = $_POST['id_lks_kerja'];
		}else if(isset($_GET['id_lks_kerja'])){
			$id_lks_kerja = $_GET['id_lks_kerja'];
		}
		
		
						 
		if(isset($_POST['id_klasifikasi'])){
			$id_klasifikasi = $_POST['id_klasifikasi'];
		}else if(isset($_GET['id_klasifikasi'])){
			$id_klasifikasi = $_GET['id_klasifikasi'];
		}
		
		if(isset($_POST['id_sistem_kerja'])){
			$id_sistem_kerja = $_POST['id_sistem_kerja'];
		}else if(isset($_GET['id_sistem_kerja'])){
			$id_sistem_kerja = $_GET['id_sistem_kerja'];
						 }
		
		
		if($id_klasifikasi != '0'){
			
			$sql=" SELECT * FROM tkjp WHERE tkjp.id_klasifikasi = '$id_klasifikasi' ";
			if ($id_field != '0') {
				$sql =$sql." AND tkjp.id_field ='$id_field' ";
			}
			if ($id_fpemegang_kontrak != '0') {
				$sql =$sql." AND tkjp.id_fpemegang_kontrak ='$id_fpemegang_kontrak' ";
			}
			if ($id_fkerja != '0') {
				$sql =$sql." AND tkjp.id_fkerja ='$id_fkerja' ";
			}
			if ($id_lks_kerja != '0') {
				$sql =$sql." AND tkjp.id_lks_kerja ='$id_lks_kerja' ";
			}
			
			$sql_stat_klasifikasi = $sql;
			$result = mysql_query($sql_stat_klasifikasi);
			$num_rows = mysql_num_rows($result);
			if($num_rows > 0){
				$status_klasifikasi = 'ada';
			}
		}
		
		
		if($id_sistem_kerja != '0'){
			$sql=" SELECT * FROM tkjp WHERE tkjp.id_sistem_kerja = '$id_sistem_kerja'";
			if ($id_field != '0') {
				$sql =$sql." AND tkjp.id_field ='$id_field' ";
			}
			if ($id_fpemegang_kontrak != '0') {
				$sql =$sql." AND tkjp.id_fpemegang_kontrak ='$id_fpemegang_kontrak' ";
			}
			if ($id_fkerja != '0') {
				$sql =$sql." AND tkjp.id_fkerja ='$id_fkerja' ";
			}
			if ($id_lks_kerja != '0') {
				$sql =$sql." AND tkjp.id_lks_kerja ='$id_lks_kerja' ";
			}
			$sql_stat_sistem_kerja = $sql;
			
			
			$result = mysql_query($sql_stat_sistem_kerja);
			$num_rows = mysql_num_rows($result);
			if($num_rows > 0){
				$status_sistem_kerja = 'ada';
			}
		}
		
		if($id_field != '0'){
			$sql_stat_pemegang_kontrak = " SELECT * FROM tkjp WHERE tkjp.id_field = '$id_field'";
			$result = mysql_query($sql_stat_pemegang_kontrak);
			$num_rows = mysql_num_rows($result);
			if($num_rows > 0){
				$status_field = 'ada';
			}
		}
		
		
		
		
		 if($id_fkerja!= '0' && $id_fpemegang_kontrak != '0' && $id_field != '0' ){
			$sql_stat_fungsi_kerja = " SELECT * FROM tkjp 
																WHERE 
																tkjp.id_field = '$id_field' AND
																tkjp.id_fpemegang_kontrak = '$id_fpemegang_kontrak' AND
																tkjp.id_fkerja = '$id_fkerja' ";
			
			$result = mysql_query($sql_stat_fungsi_kerja);
			$num_rows = mysql_num_rows($result);
			if($num_rows > 0){
				$status_fungsi_kerja = 'ada';
			}
			
		}
		
		if($id_fkerja != '0' && $id_fpemegang_kontrak != '0' && $id_field == '0' ){
			$sql_stat_fungsi_kerja = " SELECT * FROM tkjp
																WHERE 
																id_fpemegang_kontrak = '$id_fpemegang_kontrak' AND
																id_fkerja = '$id_fkerja' ";
			
			$result = mysql_query($sql_stat_fungsi_kerja);
			$num_rows = mysql_num_rows($result);
			if($num_rows > 0){
				$status_fungsi_kerja2 = 'ada';
			}
			
		}
		
		if($id_fkerja != '0' && $id_fpemegang_kontrak == '0' && $id_field != '0' ){
			$sql_stat_fungsi_kerja = " SELECT * FROM tkjp
										WHERE 
										id_field = '$id_field' AND
										id_fkerja = '$id_fkerja' ";
										
		
			$result = mysql_query($sql_stat_fungsi_kerja);
			$num_rows = mysql_num_rows($result);
			if($num_rows > 0){
				$status_fungsi_kerja3 = 'ada';
			}
			
		}
		
		if($id_fkerja != '0' && $id_fpemegang_kontrak == '0' && $id_field == '0' ){
			$sql_stat_fungsi_kerja = " SELECT * FROM tkjp
																WHERE 
																tkjp.id_fkerja = '$id_fkerja' ";
			$result = mysql_query($sql_stat_fungsi_kerja);
			$num_rows = mysql_num_rows($result);
		
			if($num_rows > 0){
				$status_fungsi_kerja4 = 'ada';
			}
			
		}
		
		if($id_fkerja != '0' && $id_fpemegang_kontrak != '0' && $id_field != '0'  && $id_lks_kerja != '0'){
			$sql_stat_lokasi_kerja = " SELECT * FROM tkjp
										WHERE 
										id_lks_kerja = '$id_lks_kerja' AND
										id_field = '$id_field' AND
										id_fpemegang_kontrak = '$id_fpemegang_kontrak' AND
										id_fkerja = '$id_fkerja' ";
										
			$result = mysql_query($sql_stat_lokasi_kerja);
			$num_rows = mysql_num_rows($result);
			
			if($num_rows > 0){
				$status_lokasi_kerja = 'ada';
			}
		}
		
		if($id_fkerja != '0' && $id_fpemegang_kontrak != '0' && $id_field == '0'  && $id_lks_kerja != '0'){
			$sql_stat_lokasi_kerja = " SELECT * FROM tkjp
										WHERE 
										id_lks_kerja = '$id_lks_kerja' AND
										id_fpemegang_kontrak = '$id_fpemegang_kontrak' AND
										id_fkerja = '$id_fkerja' ";
									
			$result = mysql_query($sql_stat_lokasi_kerja);
			$num_rows = mysql_num_rows($result);
			
			if($num_rows > 0){
				$status_lokasi_kerja2 = 'ada';
			}
		}
		
		if($id_fkerja != '0' && $id_fpemegang_kontrak == '0' && $id_field != '0'  && $id_lks_kerja != '0'){
			$sql_stat_lokasi_kerja = " SELECT * FROM tkjp
										WHERE 
										id_lks_kerja = '$id_lks_kerja' AND
										id_field = '$id_field' AND
										id_fkerja = '$id_fkerja' ";
									
			$result = mysql_query($sql_stat_lokasi_kerja);
			$num_rows = mysql_num_rows($result);
			
			if($num_rows > 0){
				$status_lokasi_kerja3 = 'ada';
			}
		}
		
		
		if($id_fkerja == '0' && $id_fpemegang_kontrak != '0' && $id_field != '0'  && $id_lks_kerja != '0'){
			$sql_stat_lokasi_kerja = " SELECT * FROM tkjp
										WHERE 
										id_lks_kerja = '$id_lks_kerja' AND
										id_field = '$id_field' AND
										id_fpemegang_kontrak = '$id_fpemegang_kontrak' ";
									
			$result = mysql_query($sql_stat_lokasi_kerja);
			$num_rows = mysql_num_rows($result);
		
			if($num_rows > 0){
				$status_lokasi_kerja4 = 'ada';
			}
		}
		
		if($id_fkerja != '0' && $id_fpemegang_kontrak == '0' && $id_field == '0'  && $id_lks_kerja != '0'){
			$sql_stat_lokasi_kerja = " SELECT * FROM tkjp
										WHERE 
										id_lks_kerja = '$id_lks_kerja' AND
										id_fkerja = '$id_fkerja' ";
									
			$result = mysql_query($sql_stat_lokasi_kerja);
			$num_rows = mysql_num_rows($result);
		
			if($num_rows > 0){
				$status_lokasi_kerja5 = 'ada';
			}
		}
		
		
		if($id_fkerja == '0' && $id_fpemegang_kontrak != '0' && $id_field == '0'  && $id_lks_kerja != '0'){
			$sql_stat_lokasi_kerja = " SELECT * FROM tkjp
										WHERE 
										id_lks_kerja = '$id_lks_kerja' AND
										id_fpemegang_kontrak = '$id_fpemegang_kontrak' ";
									
			$result = mysql_query($sql_stat_lokasi_kerja);
			$num_rows = mysql_num_rows($result);
			if($num_rows > 0){
				$status_lokasi_kerja6 = 'ada';
			}
		}
		
		if($id_fkerja == '0' && $id_fpemegang_kontrak == '0' && $id_field != '0'  && $id_lks_kerja != '0'){
			$sql_stat_lokasi_kerja = " SELECT * FROM tkjp
										WHERE 
										id_lks_kerja = '$id_lks_kerja' AND
										id_field = '$id_field' ";
									
			$result = mysql_query($sql_stat_lokasi_kerja);
			$num_rows = mysql_num_rows($result);
			if($num_rows > 0){
				$status_lokasi_kerja7 = 'ada';
			}
		}
		
		if($id_fkerja == '0' && $id_fpemegang_kontrak == '0' && $id_field == '0'  && $id_lks_kerja != '0'){
			$sql_stat_lokasi_kerja = " SELECT * FROM tkjp
										WHERE 
										id_lks_kerja = '$id_lks_kerja'";
									
			$result = mysql_query($sql_stat_lokasi_kerja);
			$num_rows = mysql_num_rows($result);
			if($num_rows > 0){
				$status_lokasi_kerja8 = 'ada';
			}
		}
		
		if(isset($_POST['nama'])){
					$nama = $_POST['nama'];
				}else if(isset($_GET['nama'])){
					$nama = $_GET['nama'];
				}
		if ($nama ==''){
		$nama = '0';
		}

		if(isset($_POST['ktp'])){
					$ktp = $_POST['ktp'];
				}else if(isset($_GET['ktp'])){
					$ktp = $_GET['ktp'];
		}
		if ($ktp ==''){
		$ktp = '0';
		}
		
		
		
						
		
		
	if (isset($_SESSION['role_id'])){?>
	
		    <?php
						include ('menukaryawan.php');
					?>
		<table width="750px">
				<tr>
		<form id="form_insert" action="<?php echo $_SERVER['PHP_SELF']."?tab=datagaji&folder=$folder&file=$file";?>" method="post"> 
		<label class="badge badge-info"> PENCARIAN </label>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<label class="badge badge-info"> Periode Tahun </label>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<label class="badge badge-info"> Periode Bulan </label></br>
			    <div class="form-inline">
    
			<input type="text" name="ktp" placeholder="NIK" id="ktp" onchange="this.form.submit();"/>
			<input type="text" name="nama" placeholder="Nama" id="name" onchange="this.form.submit();"/>
			<?php echo $fungsi->fungsi->filter_tahun($tahun, "tahun"); ?>
			<?php echo $fungsi->fungsi->filter_bulan2($bulan, "bulan"); ?>
			
			<a href='index.php?tab=datagaji&folder=gaji_karyawan&file=gaji_karyawan_tunjangan_form_view' class="btn btn-primary"><i class='icon-list'></i>All</a></br>
			</div>
			</tr>
			</table>
			
			</br>
			
			<table width="750px">
				<tr>
					<td width="25px">&nbsp;</td><td width="405px"><label class="badge badge-info"> FILTERISASI</label></td><!--<td><label class="badge badge-info"> FILTERISASI II</label></td>-->
				</tr>
			</table>
			<table width="750px">
				<tr>
				  <td>Field</td>
				  <td><select name='id_field' id="field" onchange="this.form.submit();">
                    <?php
						echo "<option value='0' selected>All</option>";
						
						if($id_field =='0'){
							$sql = mysql_query("SELECT * FROM field");
							while ($data=mysql_fetch_array($sql)){
								echo "<option value=$data[id_field]>$data[nm_field]</option>";
							}
						}else if($id_field !='0'){
							//echo "<option value='0' selected>All</option>";
							$sql = mysql_query("SELECT * FROM field");
								while ($data2=mysql_fetch_array($sql))
									if($id_field == $data2['id_field'])
										echo "<option value=$data2[id_field] selected>$data2[nm_field]</option>";
									else
										echo "<option value=$data2[id_field]>$data2[nm_field]</option>";												
						}
					?>
                  </select></td>
				  <td>
				  Sistem Kerja  
				  <?php
				  $sql_sistem_kerja = "SELECT * FROM tkjp 
									LEFT JOIN sistem_kerja ON tkjp.id_sistem_kerja = sistem_kerja.id_sistem_kerja
									LEFT JOIN no_po ON tkjp.id_no_po = no_po.id_no_po
									LEFT JOIN perusahaan ON no_po.id_perusahaan = perusahaan.id_perusahaan
									where status ='aktif' ";
					$group = " GROUP BY tkjp.id_sistem_kerja ";
							
						 if($status_field=='ada' ||
							
							$status_pemegang_kontrak=='ada'||$status_pemegang_kontrak2=='ada'||  
						  
							$status_fungsi_kerja=='ada' ||$status_fungsi_kerja2=='ada' ||$status_fungsi_kerja3=='ada' ||$status_fungsi_kerja4=='ada' || 
							$status_lokasi_kerja=='ada' ||$status_lokasi_kerja2=='ada' || $status_lokasi_kerja3=='ada' ||$status_lokasi_kerja4=='ada' ||
							$status_lokasi_kerja5=='ada' ||$status_lokasi_kerja6=='ada' || $status_lokasi_kerja7=='ada' ||$status_lokasi_kerja8=='ada' ||
						  
							$status_no_po == 'ada' || $status_perusahaan =='ada' || $status_klasifikasi == 'ada') {
							if ($status_field=='ada'){
							$filter_sistem_kerja = " AND tkjp.id_field = $id_field";
							}
							if ($status_pemegang_kontrak=='ada' || $status_pemegang_kontrak2=='ada'){
							$filter_sistem_kerja = $filter_sistem_kerja." AND tkjp.id_fpemegang_kontrak = $id_fpemegang_kontrak";
							}
							if ($status_fungsi_kerja=='ada' ||$status_fungsi_kerja2=='ada' ||$status_fungsi_kerja3=='ada' ||$status_fungsi_kerja4=='ada'){
							$filter_sistem_kerja = $filter_sistem_kerja." AND tkjp.id_fkerja = $id_fkerja";
							}
							if ($status_lokasi_kerja=='ada' ||$status_lokasi_kerja2=='ada' || $status_lokasi_kerja3=='ada' ||$status_lokasi_kerja4=='ada' ||
						  $status_lokasi_kerja5=='ada' ||$status_lokasi_kerja6=='ada' || $status_lokasi_kerja7=='ada' ||$status_lokasi_kerja8=='ada'){
							
							$filter_sistem_kerja = $filter_sistem_kerja." AND tkjp.id_lks_kerja = $id_lks_kerja";
							}
							if ($status_no_po == 'ada'){
							$filter_sistem_kerja = $filter_sistem_kerja." AND tkjp.id_no_po = $id_no_po";
							}
							if ($status_klasifikasi=='ada'){
							$filter_sistem_kerja = $filter_sistem_kerja." AND tkjp.id_klasifikasi = $id_klasifikasi";
							}
							if ($status_perusahaan=='ada'){
							$filter_sistem_kerja = $filter_sistem_kerja." AND no_po.id_perusahaan = $id_perusahaan";
							}
							$sql = $sql_sistem_kerja.$filter_sistem_kerja.$group;
							//echo $sql;
						 }else{
							$sql = $sql_sistem_kerja.$group;
						 }
							$query = mysql_query($sql);
					
				  ?>
				  </td>
				  <td><select name='id_sistem_kerja' id="sistem_kerja" onchange="this.form.submit();">
                      <?php
					  if($status_sistem_kerja=='ada'){
							echo "<option value='0'>All</option>";
							while ($data=mysql_fetch_array($query)){
								if($id_sistem_kerja == $data['id'])
									echo "<option value=$data[id] selected>$data[waktu]</option>";
								else
									echo "<option value=$data[id]>$data[waktu]</option>";
							}
						}else{
							echo "<option value='0' selected>All</option>";
							while ($data=mysql_fetch_array($query)){
									echo "<option value=$data[id]>$data[waktu]</option>";
							}
						}					
					?>
				 
                  </select></td>
				</tr>
				<tr>
				 <!-- <td>Pemegang kontrak 
				  <?php
						 $sql_pemegang_kontrak = "SELECT * FROM tkjp 
											LEFT JOIN fpemegang_kontrak ON tkjp.id_fpemegang_kontrak = fpemegang_kontrak.id ";
						 $group = " GROUP BY tkjp.id_fpemegang_kontrak";
						 if($status_field == 'ada'){
							$filter_field = " WHERE tkjp.id_field = $id_field ";
							$sql = $sql_pemegang_kontrak.$filter_field.$group;
						 }else{
							$sql = $sql_pemegang_kontrak.$group;
						 }
							$query = mysql_query($sql);
				  ?>
				  
				  </td>
				  <td><select name='id_fpemegang_kontrak' id="pemegang_kontrak" onchange="this.form.submit();">
                    <?php
					if($status_pemegang_kontrak=='ada' || $status_pemegang_kontrak2=='ada'){
							echo "<option value='0'>All</option>";
							while ($data=mysql_fetch_array($query)){
								if($id_fpemegang_kontrak == $data['id'])
									echo "<option value=$data[id] selected>$data[fungsi]</option>";
								else	
									echo "<option value=$data[id]>$data[fungsi]</option>";
							}
						}else{
							echo "<option value='0' selected>All</option>";
							while ($data=mysql_fetch_array($query)){
									echo "<option value=$data[id]>$data[fungsi]</option>";
							}
						}
							
						
					?>
                    </select>
                    </td>
					<td>Klasifikasi
					 <?php
				  $sql_klasifikasi = "SELECT * FROM tkjp 
								LEFT JOIN klasifikasi ON tkjp.id_klasifikasi = klasifikasi.id_klasifikasi
								LEFT JOIN no_po ON tkjp.id_no_po = no_po.id_no_po
								LEFT JOIN perusahaan ON no_po.id_perusahaan = perusahaan.id_perusahaan
								where status ='aktif' ";
					$group = " GROUP BY tkjp.id_klasifikasi ";
							
						 if($status_field=='ada' ||
					
							$status_pemegang_kontrak=='ada'||$status_pemegang_kontrak2=='ada'||  
						  
							$status_fungsi_kerja=='ada' ||$status_fungsi_kerja2=='ada' ||$status_fungsi_kerja3=='ada' ||$status_fungsi_kerja4=='ada' || 
							$status_lokasi_kerja=='ada' ||$status_lokasi_kerja2=='ada' || $status_lokasi_kerja3=='ada' ||$status_lokasi_kerja4=='ada' ||
							$status_lokasi_kerja5=='ada' ||$status_lokasi_kerja6=='ada' || $status_lokasi_kerja7=='ada' ||$status_lokasi_kerja8=='ada' ||
						  
							$status_no_po == 'ada' || $status_perusahaan =='ada' || $status_sistem_kerja == 'ada') {
							
							if ($status_field=='ada'){
							$filter_klasifikasi = " AND tkjp.id_field = $id_field";
							}
							if ($status_pemegang_kontrak=='ada' || $status_pemegang_kontrak2=='ada'){
							$filter_klasifikasi = $filter_klasifikasi." AND tkjp.id_fpemegang_kontrak = $id_fpemegang_kontrak";
							}
							if ($status_fungsi_kerja=='ada' ||$status_fungsi_kerja2=='ada' ||$status_fungsi_kerja3=='ada' ||$status_fungsi_kerja4=='ada'){
							$filter_klasifikasi = $filter_klasifikasi." AND tkjp.id_fkerja = $id_fkerja";
							}
							if ($status_lokasi_kerja=='ada' ||$status_lokasi_kerja2=='ada' || $status_lokasi_kerja3=='ada' ||$status_lokasi_kerja4=='ada' ||
						  $status_lokasi_kerja5=='ada' ||$status_lokasi_kerja6=='ada' || $status_lokasi_kerja7=='ada' ||$status_lokasi_kerja8=='ada'){
							
							$filter_klasifikasi = $filter_klasifikasi." AND tkjp.id_lks_kerja = $id_lks_kerja";
							}
							if ($status_no_po == 'ada'){
							$filter_klasifikasi = $filter_klasifikasi." AND tkjp.id_no_po = $id_no_po";
							}
							if ($status_sistem_kerja=='ada'){
							$filter_klasifikasi = $filter_klasifikasi." AND tkjp.id_sistem_kerja = $id_sistem_kerja";
							}
							if ($status_perusahaan=='ada'){
							$filter_klasifikasi = $filter_klasifikasi." AND no_po.id_perusahaan = $id_perusahaan";
							}
							$sql = $sql_klasifikasi.$filter_klasifikasi.$group;
							//echo $sql;
						 }else{
							$sql = $sql_klasifikasi.$group;
						 }
							$query = mysql_query($sql);
					
				  ?>
				  </td>
				  <td><select name='id_klasifikasi' id="klasifikasi" placeholder="Klasifikasi" onchange="this.form.submit();">
                      <?php
					  
					   if($status_klasifikasi=='ada'){
							echo "<option value='0'>All</option>";
							while ($data=mysql_fetch_array($query)){
								if($id_klasifikasi == $data['id_klasifikasi'])
									echo "<option value=$data[id_klasifikasi] selected>$data[klasifikasi]</option>";
								else
									echo "<option value=$data[id_klasifikasi]>$data[klasifikasi]</option>";
							}
						}else{
							echo "<option value='0' selected>All</option>";
							while ($data=mysql_fetch_array($query)){
									echo "<option value=$data[id_klasifikasi]>$data[klasifikasi]</option>";
							}
						}
						
					?>
					
					</td>
				  </select></td>-->
				  
				</tr>
				<tr>
				  <td>Fungsi Kerja <?php
					$sql_fungsi_kerja = "SELECT * FROM tkjp LEFT JOIN fungsi_kerja ON tkjp.id_fkerja = fungsi_kerja.id_fkerja where status ='aktif' ";
						 $group = " GROUP BY tkjp.id_fkerja ";
							
						 if($status_pemegang_kontrak=='ada' || $status_pemegang_kontrak2=='ada'|| $status_field=='ada') {
							if ($status_field=='ada'){
							$filter_fungsi_kerja = " AND tkjp.id_field = $id_field";
							}
							if ($status_pemegang_kontrak=='ada' || $status_pemegang_kontrak2=='ada'){
							$filter_fungsi_kerja = $filter_fungsi_kerja." AND tkjp.id_fpemegang_kontrak = $id_fpemegang_kontrak";
							}
							$sql = $sql_fungsi_kerja.$filter_fungsi_kerja.$group;
							//echo $sql;
						 }else{
							$sql = $sql_fungsi_kerja.$group;
						 }
							$query = mysql_query($sql);
					
				  ?></td>
				  <td><select name='id_fkerja' id="fungsi_kerja" onchange="this.form.submit();">
                      <?php
						if($status_fungsi_kerja=='ada' || $status_fungsi_kerja2=='ada' || $status_fungsi_kerja3 =='ada'|| $status_fungsi_kerja4 =='ada'){
							echo "<option value='0'>All</option>";
							while ($data=mysql_fetch_array($query)){
								if($id_fkerja == $data['id_fkerja'])
									echo "<option value=$data[id_fkerja] selected>$data[fkerja]</option>";
								else	
									echo "<option value=$data[id_fkerja]>$data[fkerja]</option>";
							}
						}else{
							echo "<option value='0' selected>All</option>";
							while ($data=mysql_fetch_array($query)){
									echo "<option value=$data[id_fkerja]>$data[fkerja]</option>";
							}
						}
						
					?>
                  </select></td>
				  
				  
				  <td>Klasifikasi
					 <?php
				  $sql_klasifikasi = "SELECT * FROM tkjp 
								LEFT JOIN klasifikasi ON tkjp.id_klasifikasi = klasifikasi.id_klasifikasi
								LEFT JOIN no_po ON tkjp.id_no_po = no_po.id_no_po
								LEFT JOIN perusahaan ON no_po.id_perusahaan = perusahaan.id_perusahaan
								where status ='aktif' ";
					$group = " GROUP BY tkjp.id_klasifikasi ";
							
						 if($status_field=='ada' ||
					
							$status_pemegang_kontrak=='ada'||$status_pemegang_kontrak2=='ada'||  
						  
							$status_fungsi_kerja=='ada' ||$status_fungsi_kerja2=='ada' ||$status_fungsi_kerja3=='ada' ||$status_fungsi_kerja4=='ada' || 
							$status_lokasi_kerja=='ada' ||$status_lokasi_kerja2=='ada' || $status_lokasi_kerja3=='ada' ||$status_lokasi_kerja4=='ada' ||
							$status_lokasi_kerja5=='ada' ||$status_lokasi_kerja6=='ada' || $status_lokasi_kerja7=='ada' ||$status_lokasi_kerja8=='ada' ||
						  
							$status_no_po == 'ada' || $status_perusahaan =='ada' || $status_sistem_kerja == 'ada') {
							
							if ($status_field=='ada'){
							$filter_klasifikasi = " AND tkjp.id_field = $id_field";
							}
							if ($status_pemegang_kontrak=='ada' || $status_pemegang_kontrak2=='ada'){
							$filter_klasifikasi = $filter_klasifikasi." AND tkjp.id_fpemegang_kontrak = $id_fpemegang_kontrak";
							}
							if ($status_fungsi_kerja=='ada' ||$status_fungsi_kerja2=='ada' ||$status_fungsi_kerja3=='ada' ||$status_fungsi_kerja4=='ada'){
							$filter_klasifikasi = $filter_klasifikasi." AND tkjp.id_fkerja = $id_fkerja";
							}
							if ($status_lokasi_kerja=='ada' ||$status_lokasi_kerja2=='ada' || $status_lokasi_kerja3=='ada' ||$status_lokasi_kerja4=='ada' ||
						  $status_lokasi_kerja5=='ada' ||$status_lokasi_kerja6=='ada' || $status_lokasi_kerja7=='ada' ||$status_lokasi_kerja8=='ada'){
							
							$filter_klasifikasi = $filter_klasifikasi." AND tkjp.id_lks_kerja = $id_lks_kerja";
							}
							if ($status_no_po == 'ada'){
							$filter_klasifikasi = $filter_klasifikasi." AND tkjp.id_no_po = $id_no_po";
							}
							if ($status_sistem_kerja=='ada'){
							$filter_klasifikasi = $filter_klasifikasi." AND tkjp.id_sistem_kerja = $id_sistem_kerja";
							}
							if ($status_perusahaan=='ada'){
							$filter_klasifikasi = $filter_klasifikasi." AND no_po.id_perusahaan = $id_perusahaan";
							}
							$sql = $sql_klasifikasi.$filter_klasifikasi.$group;
							//echo $sql;
						 }else{
							$sql = $sql_klasifikasi.$group;
						 }
							$query = mysql_query($sql);
					
				  ?>
				  </td>
				  <td><select name='id_klasifikasi' id="klasifikasi" placeholder="Klasifikasi" onchange="this.form.submit();">
                      <?php
					  
					   if($status_klasifikasi=='ada'){
							echo "<option value='0'>All</option>";
							while ($data=mysql_fetch_array($query)){
								if($id_klasifikasi == $data['id_klasifikasi'])
									echo "<option value=$data[id_klasifikasi] selected>$data[klasifikasi]</option>";
								else
									echo "<option value=$data[id_klasifikasi]>$data[klasifikasi]</option>";
							}
						}else{
							echo "<option value='0' selected>All</option>";
							while ($data=mysql_fetch_array($query)){
									echo "<option value=$data[id_klasifikasi]>$data[klasifikasi]</option>";
							}
						}
						
					?>
					
					</td>
				  </select></td>
				  
				   <!--<td>Perusahaan
				   
				    <?php
				  $sql_perusahaan = "SELECT * FROM tkjp 
								LEFT JOIN no_po ON tkjp.id_no_po = no_po.id_no_po
								LEFT JOIN perusahaan ON no_po.id_perusahaan = perusahaan.id_perusahaan
								where status ='aktif' ";
					$group = " GROUP BY no_po.id_perusahaan ";
							
						 if($status_field=='ada' ||
							
							$status_pemegang_kontrak=='ada'||$status_pemegang_kontrak2=='ada'||  
						  
							$status_fungsi_kerja=='ada' ||$status_fungsi_kerja2=='ada' ||$status_fungsi_kerja3=='ada' ||$status_fungsi_kerja4=='ada' || 
							$status_lokasi_kerja=='ada' ||$status_lokasi_kerja2=='ada' || $status_lokasi_kerja3=='ada' ||$status_lokasi_kerja4=='ada' ||
							$status_lokasi_kerja5=='ada' ||$status_lokasi_kerja6=='ada' || $status_lokasi_kerja7=='ada' ||$status_lokasi_kerja8=='ada' ||
						  
							$status_no_po == 'ada' || $status_klasifikasi =='ada' || $status_sistem_kerja == 'ada') {
							
							if ($status_field=='ada'){
							$filter_perusahaan = " AND tkjp.id_field = $id_field";
							}
							if ($status_pemegang_kontrak=='ada' || $status_pemegang_kontrak2=='ada'){
							$filter_perusahaan = $filter_perusahaan." AND tkjp.id_fpemegang_kontrak = $id_fpemegang_kontrak";
							}
							if ($status_fungsi_kerja=='ada' ||$status_fungsi_kerja2=='ada' ||$status_fungsi_kerja3=='ada' ||$status_fungsi_kerja4=='ada'){
							$filter_perusahaan = $filter_perusahaan." AND tkjp.id_fkerja = $id_fkerja";
							}
							if ($status_lokasi_kerja=='ada' ||$status_lokasi_kerja2=='ada' || $status_lokasi_kerja3=='ada' ||$status_lokasi_kerja4=='ada' ||
						  $status_lokasi_kerja5=='ada' ||$status_lokasi_kerja6=='ada' || $status_lokasi_kerja7=='ada' ||$status_lokasi_kerja8=='ada'){
							
							$filter_perusahaan = $filter_perusahaan." AND tkjp.id_lks_kerja = $id_lks_kerja";
							}
							if ($status_no_po == 'ada'){
							$filter_perusahaan = $filter_perusahaan." AND tkjp.id_no_po = $id_no_po";
							}
							if ($status_sistem_kerja=='ada'){
							$filter_perusahaan = $filter_perusahaan." AND tkjp.id_sistem_kerja = $id_sistem_kerja";
							}
							if ($status_klasifikasi=='ada'){
							$filter_perusahaan = $filter_perusahaan." AND tkjp.id_klasifikasi = $id_klasifikasi";
							}
							$sql = $sql_perusahaan.$filter_perusahaan.$group;
							//echo $sql;
						 }else{
							$sql = $sql_perusahaan.$group;
						 }
							$query = mysql_query($sql);
					
				  ?>
				  </td>
				  <td><select name='id_perusahaan' id="perusahaan" onchange="this.form.submit();">
                      <?php
					   if($status_perusahaan=='ada'){
							echo "<option value='0'>All</option>";
							while ($data=mysql_fetch_array($query)){
								if($id_perusahaan == $data['id_perusahaan'])
									echo "<option value=$data[id_perusahaan] selected>$data[nm_perusahaan]</option>";
								else
									echo "<option value=$data[id_perusahaan]>$data[nm_perusahaan]</option>";
							}
						}else{
							echo "<option value='0' selected>All</option>";
							while ($data=mysql_fetch_array($query)){
									echo "<option value=$data[id_perusahaan]>$data[nm_perusahaan]</option>";
							}
						}
					?>
					
				   </td>
				  
                  </select></td>-->
				  
			  </tr>
				<tr>
				  <td>Lokasi Kerja
				  
				  <?php
					$sql_lokasi_kerja = "SELECT * FROM tkjp LEFT JOIN lokasi_kerja ON tkjp.id_lks_kerja = lokasi_kerja.id_lks_kerja where status = 'aktif' ";
						 $group = " GROUP BY tkjp.id_lks_kerja ";
						
						 if($status_pemegang_kontrak=='ada' || $status_pemegang_kontrak2=='ada'|| 
							$status_field=='ada'||
							$status_fungsi_kerja=='ada' || $status_fungsi_kerja2=='ada' || $status_fungsi_kerja3=='ada'|| $status_fungsi_kerja4=='ada'){
							
							if ($status_field=='ada'){
								$filter_lokasi_kerja = " AND tkjp.id_field = $id_field ";
							}
							if ($status_pemegang_kontrak=='ada' || $status_pemegang_kontrak2=='ada'){
								$filter_lokasi_kerja = $filter_lokasi_kerja." AND tkjp.id_fpemegang_kontrak = $id_fpemegang_kontrak ";
							}
							if($status_fungsi_kerja=='ada' || $status_fungsi_kerja2=='ada' || $status_fungsi_kerja3=='ada'|| $status_fungsi_kerja4=='ada'){
								$filter_lokasi_kerja = $filter_lokasi_kerja." AND tkjp.id_fkerja = $id_fkerja ";
							}
							$sql = $sql_lokasi_kerja.$filter_lokasi_kerja.$group;
							//echo $sql;
						 }else{
							$sql = $sql_lokasi_kerja.$group;
						 }
							$query = mysql_query($sql);
					
				  ?></td>
				  <td><select name='id_lks_kerja' id="lokasi_kerja" onchange="this.form.submit();">
                       <?php
					   if($status_lokasi_kerja == 'ada' || $status_lokasi_kerja2 == 'ada' || 
										$status_lokasi_kerja3 == 'ada' || $status_lokasi_kerja4 == 'ada'||
										$status_lokasi_kerja5 == 'ada' || $status_lokasi_kerja6 == 'ada' || 
										$status_lokasi_kerja7 == 'ada' || $status_lokasi_kerja8 == 'ada'){
							echo "<option value='0'>All</option>";
							//echo "<option>All2</option>";
							
							while ($data=mysql_fetch_array($query)){
								if($id_lks_kerja == $data['id_lks_kerja'])
									echo "<option value=$data[id_lks_kerja] selected>$data[lokasi]</option>";
								else	
									echo "<option value=$data[id_lks_kerja]>$data[lokasi]</option>";
							}
						}else{
								echo "<option value='0' selected>All</option>";
							while ($data=mysql_fetch_array($query)){
									echo "<option value=$data[id_lks_kerja]>$data[lokasi]</option>";
							}
					   }
					?>
                  </select></td>
				  
				</tr>
				
			</table>
			
		<?php
					if(isset($_SESSION['pesan'])){
						echo $_SESSION['pesan'];
						unset($_SESSION['pesan']);
					}
				
					//BATAS PAGING DEFAULT
					$batasan = 5;
				?>	
				
			<!-- END OF KONFIRMASI UPDATE DATA -->
					<table class="table table-bordered">
						<tr>
						  <td colspan="15">
						   <div class="form-inline">
								 <select class="span1" name='batas' id="batas_hal" onchange="this.form.submit();">
									<?php 
										if(isset($_POST['batas']))
											$batas= $_POST['batas'];
										else if(isset($_GET['batas']))
											$batas= $_GET['batas'];
										else
											$batas= $batasan;
										
										for($i = 1;$i<=10;$i++){
											$angka = $batasan * $i;
											
											if($batas==$angka)
												echo "<option value=$angka selected> $angka  </option>";
											else
												echo "<option value=$angka> $angka </option>";
										}
									?>
								</select> Baris/Halaman
  </form>
								<div class="btn-group pull-right">
		<?php
									if ($status_klasifikasi =='ada'||$nama !='' || $ktp !='')
									$id_klasifikasipdf = $id_klasifikasi;
									else 
									$id_klasifikasipdf ='0';
									
									if ($status_pemegang_kontrak =='ada' ||$status_pemegang_kontrak2 =='ada' ||$nama !='' || $ktp !='')
									$id_fpemegang_kontrakpdf = $id_fpemegang_kontrak;
									else 
									$id_fpemegang_kontrakpdf ='0';
									
									if ($status_no_po =='ada' ||$nama !='' || $ktp !='')
									$id_no_popdf = $id_no_po;
									else 
									$id_no_popdf ='0';
									
									if ($status_lokasi_kerja =='ada'||$status_lokasi_kerja2 =='ada'||$status_lokasi_kerja3 =='ada'||$status_lokasi_kerja4 =='ada'||
										$status_lokasi_kerja8 =='ada'||$status_lokasi_kerja7 =='ada'||$status_lokasi_kerja6 =='ada'||$status_lokasi_kerja5 =='ada'
										||$nama !='' || $ktp !='')
									$id_lks_kerjapdf = $id_lks_kerja;
									else 
									$id_lks_kerjapdf ='0';
									
									if ($status_sistem_kerja =='ada'||$nama !='' || $ktp !='')
									$id_sistem_kerjapdf = $id_sistem_kerja;
									else 
									$id_sistem_kerjapdf ='0';
									
									if ($status_fungsi_kerja =='ada'||$status_fungsi_kerja2 =='ada'||$status_fungsi_kerja3 =='ada'||$status_fungsi_kerja4 =='ada'
									||$nama !='' || $ktp !='')
									$id_fkerjapdf = $id_fkerja;
									else 
									$id_fkerjapdf ='0';
									
									if ($status_perusahaan =='ada'||$nama !='' || $ktp !='')
									$id_perusahaanpdf = $id_perusahaan;
									else 
									$id_perusahaanpdf ='0';
									
									
								?>
								
									<a href="pdfKaryawan_tunjangan.php?nama=<?php echo $nama; ?>
											&bulan=<?php echo $bulan; ?>
											&tahun=<?php echo $tahun; ?>
											&id_lks_kerja=<?php echo $id_lks_kerjapdf; ?>
											&id_sistem_kerja=<?php echo $id_sistem_kerjapdf; ?>
											&id_field=<?php echo $id_field; ?>
											&id_klasifikasi=<?php echo $id_klasifikasipdf; ?>
											&id_fkerja=<?php echo $id_fkerjapdf;?>" target="_blank" class="btn-small btn-info btn">
									<i class="icon icon-print"></i> PDF</a>

									<!--<a href="csv.php?usia=<?php echo $usia;?>
											&ktp=<?php echo $ktp; ?>
											&nama=<?php echo $nama; ?>
											&id_no_po=<?php echo $id_no_popdf; ?>
											&id_lks_kerja=<?php echo $id_lks_kerjapdf; ?>
											&id_sistem_kerja=<?php echo $id_sistem_kerjapdf; ?>
											&id_field=<?php echo $id_field; ?>
											&id_klasifikasi=<?php echo $id_klasifikasipdf; ?>
											&id_fpemegang_kontrak=<?php echo $id_fpemegang_kontrakpdf;?>
											&id_fkerja=<?php echo $id_fkerjapdf;?>
											&id_perusahaan=<?php echo $id_perusahaanpdf;?>" class="btn-small btn  btn-primary">
									<i class="icon icon-print"></i> CSV</a>-->
									
									<?php if($_SESSION['role_id']=='1') {?>
									
									<a href="app/gaji_karyawan/modal_tambah_tunjangan.php" data-toggle="modal" data-target="#myModal" type="button" class="btn-small btn btn-success pilih">
									<i class="icon icon-plus"></i> Tambah Data</a>
									  
										  <?php 
										  } 
										  ?>
										 
								</div>	
								
							</td>
						</tr></br>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>NIK</th>
							
							<th>Jabatan</th>
							<th>Tunjangan Jabatan</th>
							<th>Tunjangan Komunikasi</th>
							<th>Dana Taktis</th>
							<th>Uang Koran</th>
							<th>Tunjangan Makan /hari</th>
							<th>Tunjangan Transportasi /hari</th>
							<th>Periode Bulan</th>
							<th>Tanggal Input</th>
							<th>Aksi</th>
						</tr>
						<?php
							
							if(isset($_POST['batas']))
								$batas= $_POST['batas'];
							else if(isset($_GET['batas']))
								$batas= $_GET['batas'];
							else
								$batas= $batasan;
								
							isset($_GET['halaman']) ? $halaman = $_GET['halaman'] : $halaman ='';	
							//$bulan = $fungsi->fungsi->filter_bulan2($bulan, "bulan");
							
							$posisi=null;
							if(empty($halaman)){
							$posisi=0;
							$halaman=1;
							}else{
							$posisi=($halaman-1)* $batas;
							}
							
							$query="SELECT 
  `tunjangan`.`id`,
  `tunjangan`.`tahun`,
  `tunjangan`.`periode`,
  `tunjangan`.`tgl_input`,
  `tkjp`.`nm_lengkap`,
  `tkjp`.`nik`,
  `tkjp`.`no_rek_payroll`,
  `t_jabatan`.`nm_jabatan`,
  `t_jabatan`.`tunjab`,
  `t_jabatan`.`tunkom`,
  `t_jabatan`.`tuntak`,
  `t_jabatan`.`tunkor`,
  `t_jabatan`.`tum`,
  `t_jabatan`.`tut`,
  `tkjp`.`id_gol`
											FROM tunjangan 
											LEFT JOIN tkjp ON tkjp.index = tunjangan.id_karyawan
											LEFT JOIN `t_jabatan` ON `tkjp`.`id_jabatan` = `t_jabatan`.`id_jabatan`
											
											LEFT JOIN klasifikasi ON tkjp.id_klasifikasi = klasifikasi.id_klasifikasi
											LEFT JOIN fungsi_kerja ON tkjp.id_fkerja = fungsi_kerja.id_fkerja
											LEFT JOIN field ON tkjp.id_field = field.id_field
											LEFT JOIN lokasi_kerja ON tkjp.id_lks_kerja = lokasi_kerja.id_lks_kerja
											LEFT JOIN sistem_kerja ON tkjp.id_sistem_kerja = sistem_kerja.id_sistem_kerja
											WHERE tunjangan.periode = '$bulan' AND tunjangan.tahun = '$tahun' AND tunjangan.hps=0
											LIMIT $posisi,$batas ";
											 
								$query_page="SELECT 
  `tunjangan`.`id`,
  `tunjangan`.`tahun`,
  `tunjangan`.`periode`,
  `tunjangan`.`tgl_input`,
  `tkjp`.`nm_lengkap`,
  `tkjp`.`nik`,
  `tkjp`.`no_rek_payroll`,
  `t_jabatan`.`nm_jabatan`,
  `t_jabatan`.`tunjab`,
  `t_jabatan`.`tunkom`,
  `t_jabatan`.`tuntak`,
  `t_jabatan`.`tunkor`,
  `t_jabatan`.`tum`,
  `t_jabatan`.`tut`,
  `tkjp`.`id_gol`
  
											FROM tunjangan 
											LEFT JOIN tkjp ON tkjp.index = tunjangan.id_karyawan
											LEFT JOIN `t_jabatan` ON `tkjp`.`id_jabatan` = `t_jabatan`.`id_jabatan`
											
											LEFT JOIN klasifikasi ON tkjp.id_klasifikasi = klasifikasi.id_klasifikasi
											LEFT JOIN fungsi_kerja ON tkjp.id_fkerja = fungsi_kerja.id_fkerja
											LEFT JOIN field ON tkjp.id_field = field.id_field
											LEFT JOIN lokasi_kerja ON tkjp.id_lks_kerja = lokasi_kerja.id_lks_kerja
											LEFT JOIN sistem_kerja ON tkjp.id_sistem_kerja = sistem_kerja.id_sistem_kerja
											WHERE tunjangan.periode = '$bulan' AND tunjangan.tahun = '$tahun' AND tunjangan.hps=0";
						 
							
							
								$limit = " LIMIT $posisi,$batas ";
								$sql = "SELECT 
  `tunjangan`.`id`,
  `tunjangan`.`tahun`,
  `tunjangan`.`periode`,
  `tunjangan`.`tgl_input`,
  `tkjp`.`nm_lengkap`,
  `tkjp`.`nik`,
  `tkjp`.`no_rek_payroll`,
  `t_jabatan`.`nm_jabatan`,
  `t_jabatan`.`tunjab`,
  `t_jabatan`.`tunkom`,
  `t_jabatan`.`tuntak`,
  `t_jabatan`.`tunkor`,
  `t_jabatan`.`tum`,
  `t_jabatan`.`tut`,
  `tkjp`.`id_gol`
 
											FROM tunjangan 
											LEFT JOIN tkjp ON tkjp.index = tunjangan.id_karyawan
											LEFT JOIN `t_jabatan` ON `tkjp`.`id_jabatan` = `t_jabatan`.`id_jabatan`
											
											LEFT JOIN klasifikasi ON tkjp.id_klasifikasi = klasifikasi.id_klasifikasi
											LEFT JOIN fungsi_kerja ON tkjp.id_fkerja = fungsi_kerja.id_fkerja
											LEFT JOIN field ON tkjp.id_field = field.id_field
											LEFT JOIN lokasi_kerja ON tkjp.id_lks_kerja = lokasi_kerja.id_lks_kerja
											LEFT JOIN sistem_kerja ON tkjp.id_sistem_kerja = sistem_kerja.id_sistem_kerja
											WHERE tunjangan.periode = '$bulan' AND tunjangan.tahun = '$tahun' AND tunjangan.hps=0";
											
										if(($nama != '0')|| (!empty($nama))){
											$kondisi_nama = " nm_lengkap LIKE '%$nama%' || nm_pekerjaan LIKE '%$nama%' ";
											$sql = $sql." AND ".$kondisi_nama ;
										}
										if($ktp != '0'){
											$kondisi_ktp = " no_ktp LIKE '%$ktp%' || no_jamsostek LIKE '%$ktp%' ";
											$sql = $sql." AND ".$kondisi_ktp ;
										}
										
										$tanggal_sekarang = date('Y-m-d');
										

										if($status_field  == 'ada'){
											$kondisi_field = " tkjp.id_field = '$id_field' ";
											$sql = $sql." AND ".$kondisi_field;
										}
										
										//isset ($_POST['id_fpemegang_kontrak']) ? $id_fpemegang_kontrak = $_POST['id_fpemegang_kontrak'] : $id_fpemegang_kontrak = $_GET['id_fpemegang_kontrak'];
										if($status_pemegang_kontrak == 'ada' || $status_pemegang_kontrak2 == 'ada'){
											$kondisi_pemegang_kontrak = " tkjp.id_fpemegang_kontrak = '$id_fpemegang_kontrak' ";
											$sql = $sql." AND ".$kondisi_pemegang_kontrak;
										}
										
										//isset ($_POST['id_fkerja']) ? $id_fkerja = $_POST['id_fkerja'] : $id_fkerja = $_GET['id_fkerja'];
										
										if($status_fungsi_kerja == 'ada' || $status_fungsi_kerja2 == 'ada' || 
										$status_fungsi_kerja3 == 'ada'|| $status_fungsi_kerja4 == 'ada'){
											$kondisi_fungsi_kerja = " tkjp.id_fkerja = '$id_fkerja' ";
											$sql = $sql." AND ".$kondisi_fungsi_kerja;
										}
										
										//isset ($_POST['id_lks_kerja']) ? $id_lks_kerja = $_POST['id_lks_kerja'] : $id_lks_kerja = $_GET['id_lks_kerja'];
										if($status_lokasi_kerja == 'ada' || $status_lokasi_kerja2 == 'ada' || 
										$status_lokasi_kerja3 == 'ada' || $status_lokasi_kerja4 == 'ada'||
										$status_lokasi_kerja5 == 'ada' || $status_lokasi_kerja6 == 'ada' || 
										$status_lokasi_kerja7 == 'ada' || $status_lokasi_kerja8 == 'ada'){
											$kondisi_lokasi = " tkjp.id_lks_kerja = '$id_lks_kerja' ";
											$sql = $sql." AND ".$kondisi_lokasi;
										}
										
										if($status_no_po  == 'ada'){
										$kondisi_no_po = " tkjp.id_no_po = '$id_no_po' ";
											$sql = $sql." AND ".$kondisi_no_po;
										}
										
										if($status_sistem_kerja == 'ada'){
											$kondisi_sistem_kerja = " tkjp.id_sistem_kerja = '$id_sistem_kerja' ";
											$sql = $sql." AND ".$kondisi_sistem_kerja;
										}

										if($status_klasifikasi == 'ada'){
											$kondisi_klasifikasi = " tkjp.id_klasifikasi = '$id_klasifikasi' ";
											$sql =$sql." AND ". $kondisi_klasifikasi;
										}
									$query= $sql."".$limit;
									$query_page= $sql;
							//echo $sql;
							//die();
							$result=mysql_query($query) or die(mysql_error());
							
							$no=0;
							//proses menampilkan data
							while($rows=mysql_fetch_array($result)){
						?>
						<tr class="success">
							<!-- <td><?php echo $no++; ?></td> -->
							<td><?php echo $no+$posisi; ?></td>
							<td><?php echo $rows['nm_lengkap']; ?></a></td>
							<td><?php echo $rows['nik']; ?></td>
							<td><?php echo $rows['nm_jabatan']; ?></td>
							<td><?php echo $rows['tunjab']; ?></td>
							<td><?php echo $rows['tunkom']; ?></td>
							<td><?php echo $rows['tuntak']; ?></td>
							<td><?php echo $rows['tunkor']; ?></td>
							<td><?php echo $rows['tum']; ?></td>
							<td><?php echo $rows['tut']; ?></td>
							<td><?php echo $fungsi->fungsi->bulan($rows['periode']); ?>&nbsp;<?php echo $rows['tahun'];?></td>
							<td><?php echo $rows['tgl_input']; ?></td>
							<td align="center">
							<div class="btn-group">
								<a href="index.php?tab=datagaji&folder=gaji_karyawan&file=gaji_karyawan_tunjangan_form_insert&id=<?php echo $rows['id']; ?>" class="btn-mini btn btn-warning">
									<i class="icon icon-pencil"></i> Update</a>
									
								<?php if(check_user("karyawan","cetak_id_card",$_SESSION['index'],$_SESSION['role_id']) == TRUE){ ?>
									<a href="index.php?tab=datagaji&folder=gaji_karyawan&file=gaji_karyawan_tunjangan_act_delete&id=<?php echo $rows['id']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn-mini btn btn-danger">
									<i class="icon icon-trash"></i> Delete</a>
								<?php 
								} 
								?>
								<a href="app/gaji_karyawan/gaji_karyawan_tunjangan_form_print.php?id=<?php echo $rows['id']; ?>" target="_blank" class="btn-mini btn btn-info">
									<i class="icon icon-print"></i> Print</a>

							</div>
							</td>
						</tr>
						
						<?php
							}
						?>
				
					</table>
					
				
					<?php
					$result_page = mysql_query($query_page);
					$jmldata = mysql_num_rows($result_page);
					$jmlhalaman = ceil($jmldata / $batas);
					
									//if(empty($nama)&&empty($usia)&&empty($id_pekerjaan)&&empty($id_field)&&empty($id_no_po)&&empty($id_lks_kerja)&&empty($id_sistem_kerja)&&empty($id_klasifikasi)&&empty($id_perusahaan)&&empty($id_fpemegang_kontrak)&&empty($id_fkerja)){
										
									//}
								
					echo "<div class='pagination'><ul>"; 
					if ($halaman > 1) echo  "<li><a href=$_SERVER[PHP_SELF]?tab=$tab&folder=$folder&file=$file&ktp=$ktp&nama=$nama&usia=$usia&id_no_po=$id_no_po&id_klasifikasi=$id_klasifikasi&id_fpemegang_kontrak=$id_fpemegang_kontrak&id_fkerja=$id_fkerja&id_lks_kerja=$id_lks_kerja&id_sistem_kerja=$id_sistem_kerja&id_field=$id_field&id_perusahaan=$id_perusahaan&batas=$batas&halaman=".($halaman-1)."'><< Prev</a></li>";

					
					for($i=1;$i<=$jmlhalaman;$i++){
						if ((($i >= $halaman - 3) && ($i <= $halaman + 3)) || ($i == 1) || ($i == $jmlhalaman))
							{
								isset($_GET['showPage']) ? $showPage =$_GET['showPage'] : $showPage=''; 
								if (($showPage == 1) && ($i != 2))  echo "<li class='disabled'><a href='#'>...</a></li>";
								if (($showPage != ($jmlhalaman - 1)) && ($i == $jmlhalaman))  echo "<li class='disabled'><a href='#'>...</a></li>";
								if ($i == $halaman) echo "<li class='active'><a href='#'>".$i."</a></li>";
									else echo "<li><a href=$_SERVER[PHP_SELF]?tab=$tab&folder=$folder&file=$file&ktp=$ktp&nama=$nama&batas=$batas&halaman=".$i."'>".$i."</a></li>";
								$showPage = $i;
							}
					
					}					
					if ($halaman < $jmlhalaman) echo "<li><a href=$_SERVER[PHP_SELF]?tab=$tab&folder=$folder&file=$file&ktp=$ktp&nama=$nama&batas=$batas&halaman=".($halaman+1)."'>Next >></a></li>";
				echo "</ul>";
				
					?>		
								
				</div>
				<!-- MENAMPILKAN JUMLAH DATA -->
					<div class="well">
					<?php echo "Jumlah Data : $jmldata";?>
					
					</div>
				<!-- END OF MENAMPILKAN JUMLAH DATA -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
        <h4 class="modal-title" id="myModalLabel">Pilih Karyawan</h4>
      </div>
      <div class="modal-body">
	  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
    </div>
  </div>
</div>
<?php

		} else {
				echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
				}
?>