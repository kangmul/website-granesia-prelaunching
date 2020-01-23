<script>
	$(function() {
		
		$( "#ktp" ).autocomplete({
			source: 'app/karyawan/auto_complete_ktp.php'
		});
	});
	
	$(function() {
		
		$( "#name" ).autocomplete({
			source: 'app/karyawan/auto_complete_nama.php'
		});
	});
	
	$(function() {
		
		$( "#nm_pekerjaan" ).autocomplete({
			source: 'app/karyawan/auto_complete_pekerjaan.php'
		});
	});
	/*
	$(function() {
		
		$( "#usia" ).autocomplete({
			source: 'app/karyawan/auto_complete_usia.php'
		});
	});
		*/
	
	$(function() {
		
		$( "#klasifikasi" ).combobox();
		$( "#toggle" ).click(function() {
			$( "#combobox" ).toggle();
		});
	});
	
	$(function() {
		
		$( "#pekerjaan" ).combobox();
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
		
		$( "#pemegang_kontrak" ).combobox();
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
	
	$(function() {
		
		$( "#perusahaan" ).combobox();
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
	include('db.php');
	// koneksi database -------------------------------------------->
	//<--------------------------------------------------------------
	empty( $file ) ? header('location:../../index.php') : '' ;
	
	$id_perusahaan = $_POST['id_perusahaan'];
		
		
	if(isset($_SESSION['role_id'])){
?>
		
		<form id="form_insert" action="<?php echo $_SERVER[PHP_SELF]."?tab=datakaryawan&folder=$folder&file=$file";?>" method="post"> 
		<label class="badge badge-info"> PENCARIAN </label></br>
			
			    <div class="form-inline">
    
			<input type="text" name="ktp" placeholder="NO KTP / No JAMSOSTEK" id="ktp" onchange="this.form.submit();"/>
			<input type="text" name="nama" placeholder="Nama / Pekerjaan" id="name" onchange="this.form.submit();"/>
			
			<a href='index.php?tab=datakaryawan&folder=karyawan&file=karyawan_form_view' class="btn btn-primary"><i class='icon-list'></i>All</a></br>
			</div>
			</br>
		<label class="badge badge-info"> FILTERISASI </label></br>
			<table class="span8">
				<tr>
				  <td>Field<?php echo $_POST['id_field'];?></td>
				  <td><select name='id_field' id="field" onchange="this.form.submit();">
                    <?php
						//$id_field = $_POST['id_field'];
						if(isset($_POST['id_field'])){
							$id_field = $_POST['id_field'];
						 }else if(isset($_GET['id_field'])){
							$id_field = $_GET['id_field'];
						 }
						
						
						if($id_field =='0' || $id_field ==''){
							echo "<option value='0' selected>All</option>";
							$sql = mysql_query("SELECT * FROM field");
							while ($data=mysql_fetch_array($sql)){
								echo "<option value=$data[id_field]>$data[nm_field]</option>";
							}
						}else if($id_field !='0'){
						
							$sql = mysql_query("SELECT * FROM field");
										while ($data2=mysql_fetch_array($sql))
											if($id_field == $data2['id_field'])
												echo "<option value=$data2[id_field] selected>$data2[nm_field]</option>";
												
						}
					?>
                  </select></td>
				  <?php/*
				  <td>Pekerjaan</td>
				  <td><select name='nm_pekerjaan' id="pekerjaan" onchange="this.form.submit();">
                      <?
						//$nm_pekerjaan = $_POST['nm_pekerjaan'];
						if(isset($_POST['nm_pekerjaan'])){
							$nm_pekerjaan = $_POST['nm_pekerjaan'];
						 }else if(isset($_GET['nm_pekerjaan'])){
							$nm_pekerjaan = $_GET['nm_pekerjaan'];
						 }
						
						
						if($nm_pekerjaan =='0' || $nm_pekerjaan ==''){
							echo "<option value='0' selected>All</option>";
							$sql = mysql_query("SELECT * FROM pekerjaan");
							while ($data=mysql_fetch_array($sql)){
								echo "<option value=$data[nm_pekerjaan]>$data[nm_pekerjaan]</option>";
							}
						}else if($nm_pekerjaan !='0'){
							echo "<option value='0'>All</option>";
							$sql = mysql_query("SELECT * FROM pekerjaan");
							while ($data=mysql_fetch_array($sql)){
								if($nm_pekerjaan == $data['nm_pekerjaan'])
									echo "<option value=$data[nm_pekerjaan] selected>$data[nm_pekerjaan]</option>";
								else
									echo "<option value=$data[nm_pekerjaan]>$data[nm_pekerjaan]</option>";
							}
						}
					?>
                  </select></td>
				  */ ?>
				  
				  <td>No PO </td>
				  <td><select name='id_no_po' id="no_po" onchange="this.form.submit();">
                      <?php
						//$id_lks_kerja = $_POST['id_lks_kerja'];
						if(isset($_POST['id_no_po'])){
							$id_no_po = $_POST['id_no_po'];
						 }else if(isset($_GET['id_no_po'])){
							$id_no_po = $_GET['id_no_po'];
						 }
						
						if($id_no_po =='0' || $id_no_po ==''){
							echo "<option value='0' selected>All</option>";
							$sql = mysql_query("SELECT * FROM no_po");
							while ($data=mysql_fetch_array($sql)){
								echo "<option value=$data[id_no_po]>$data[no_po]</option>";
							}
						}else if($id_no_po !='0'){
							echo "<option value='0'>All</option>";
							$sql = mysql_query("SELECT * FROM no_po");
							while ($data=mysql_fetch_array($sql)){
								if($id_no_po == $data['id_no_po'])
									echo "<option value=$data[id_no_po] selected>$data[no_po]</option>";
								else
									echo "<option value=$data[id_no_po]>$data[no_po]</option>";
							}
						}
					?>
                  </select></td>
				  
				</tr>
				<tr>
				  <td>Pemegang kontrak </td>
				  <td><select name='id_fpemegang_kontrak' id="pemegang_kontrak" onchange="this.form.submit();">
                      <?php
						//$id_fpemegang_kontrak = $_POST['id_fpemegang_kontrak'];
						if(isset($_POST['id_fpemegang_kontrak'])){
							$id_fpemegang_kontrak = $_POST['id_fpemegang_kontrak'];
						 }else if(isset($_GET['id_fpemegang_kontrak'])){
							$id_fpemegang_kontrak = $_GET['id_fpemegang_kontrak'];
						 }
						
						if($id_fpemegang_kontrak =='0' || $id_fpemegang_kontrak ==''){
						
							echo "<option value='0' selected>All</option>";
							$sql = mysql_query("SELECT * FROM fpemegang_kontrak where id_field = $id_field");
							while ($data=mysql_fetch_array($sql)){
								echo "<option value=$data[id]>$data[fungsi]</option>";
							}
						}else if($id_fpemegang_kontrak !='0'){
							$sql = mysql_query("SELECT * FROM fpemegang_kontrak where id ='$id_fpemegang_kontrak'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id]>$data2[fungsi]</option>";
										}
						}
						
					?>
                    </select>
                    </td>
				  <td>Sistem Kerja </td>
				  <td><select name='id_sistem_kerja' id="sistem_kerja" onchange="this.form.submit();">
                      <?php
						//$id_sistem_kerja = $_POST['id_sistem_kerja'];
						if(isset($_POST['id_sistem_kerja'])){
							$id_sistem_kerja = $_POST['id_sistem_kerja'];
						 }else if(isset($_GET['id_sistem_kerja'])){
							$id_sistem_kerja = $_GET['id_sistem_kerja'];
						 }
						
						if($id_sistem_kerja =='0' || $id_sistem_kerja ==''){
							echo "<option value='0' selected>All</option>";
							$sql = mysql_query("SELECT * FROM sistem_kerja");
							while ($data=mysql_fetch_array($sql)){
								echo "<option value=$data[id]>$data[waktu]</option>";
							}
						}else if($id_sistem_kerja !='0'){
							echo "<option value='0'>All</option>";
							$sql = mysql_query("SELECT * FROM sistem_kerja");
							while ($data=mysql_fetch_array($sql)){
								if($id_sistem_kerja == $data['id'])
									echo "<option value=$data[id] selected>$data[waktu]</option>";
								else
									echo "<option value=$data[id]>$data[waktu]</option>";
							}
						}
					?>
                  </select></td>
				</tr>
				<tr>
				  <td>Fungsi Kerja </td>
				  <td><select name='id_fkerja' id="fungsi_kerja" onchange="this.form.submit();">
                      <?php
						//$id_fkerja = $_POST['id_fkerja'];
						if(isset($_POST['id_fkerja'])){
							$id_fkerja = $_POST['id_fkerja'];
						 }else if(isset($_GET['id_fkerja'])){
							$id_fkerja = $_GET['id_fkerja'];
						 }
						
						if($id_fkerja =='0' || $id_fkerja ==''){
							echo "<option value='0' selected>All</option>";
							$sql = mysql_query("SELECT * FROM fungsi_kerja where id_fpemegang_kontrak = $id_fpemegang_kontrak");
							while ($data=mysql_fetch_array($sql)){
								echo "<option value=$data[id_fkerja]>$data[fkerja]</option>";
							}
						}else if($id_fkerja !='0'){
							$sql = mysql_query("SELECT * FROM fungsi_kerja where id_fkerja ='$id_fkerja'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_fkerja]>$data2[fkerja]</option>";
										}
						}
					?>
                  </select></td>
				  <td>Klasifikasi</td>
				  <td><select name='id_klasifikasi' id="klasifikasi" placeholder="Klasifikasi" onchange="this.form.submit();">
                      <?php
						//$id_klasifikasi = $_POST['id_klasifikasi'];
							if(isset($_POST['id_klasifikasi'])){
							$id_klasifikasi = $_POST['id_klasifikasi'];
						 }else if(isset($_GET['id_klasifikasi'])){
							$id_klasifikasi = $_GET['id_klasifikasi'];
						 }
						 
						
						if($id_klasifikasi =='0' || $id_klasifikasi ==''){
							echo "<option value='0' selected>All</option>";
							$sql = mysql_query("SELECT * FROM klasifikasi");
							while ($data=mysql_fetch_array($sql)){
								echo "<option value=$data[id_klasifikasi]>$data[klasifikasi]</option>";
							}
						}else if($id_klasifikasi !='0'){
							echo "<option value='0'>All</option>";
							$sql = mysql_query("SELECT * FROM klasifikasi");
							while ($data=mysql_fetch_array($sql)){
								if($id_klasifikasi == $data['id_klasifikasi'])
									echo "<option value=$data[id_klasifikasi] selected>$data[klasifikasi]</option>";
								else
									echo "<option value=$data[id_klasifikasi]>$data[klasifikasi]</option>";
							}
						}
					?>
                  </select></td>
			  </tr>
				<tr>
				  <td>Lokasi Kerja</td>
				  <td><select name='id_lks_kerja' id="lokasi_kerja" onchange="this.form.submit();">
                      <?php
						//$id_lks_kerja = $_POST['id_lks_kerja'];
						if(isset($_POST['id_lks_kerja'])){
							$id_lks_kerja = $_POST['id_lks_kerja'];
						 }else if(isset($_GET['id_lks_kerja'])){
							$id_lks_kerja = $_GET['id_lks_kerja'];
						 }
						
						if($id_lks_kerja =='0' || $id_lks_kerja ==''){
							echo "<option value='0' selected>All</option>";
							$sql = mysql_query("SELECT * FROM lokasi_kerja where id_fkerja=$id_fkerja");
							while ($data=mysql_fetch_array($sql)){
								echo "<option value=$data[id_lokasi]>$data[lokasi]</option>";
							}
						}else if($id_lks_kerja !='0'){
							$sql = mysql_query("SELECT * FROM lokasi_kerja where id_lokasi ='$id_lks_kerja'");
										while ($data2=mysql_fetch_array($sql))
										{
											echo "<option value=$data2[id_lokasi]>$data2[lokasi]</option>";
										}
						}
					?>
                  </select></td>
				  <td>Perusahaan</td>
				  <td><select name='id_perusahaan' id="perusahaan" onchange="this.form.submit();">
                      <?php
						//$id_perusahaan = $_POST['id_perusahaan'];
						if(isset($_POST['id_perusahaan'])){
							$id_perusahaan = $_POST['id_perusahaan'];
						 }else if(isset($_GET['id_perusahaan'])){
							$id_perusahaan = $_GET['id_perusahaan'];
						 }
						
						if($id_perusahaan =='0' || $id_perusahaan ==''){
							echo "<option value='0' selected>All</option>";
							$sql = mysql_query("SELECT * FROM perusahaan");
							while ($data=mysql_fetch_array($sql)){
								echo "<option value=$data[id_perusahaan]>$data[nm_perusahaan] / $data[no_po]</option>";
							}
						}else if($id_perusahaan !='0'){
							echo "<option value='0'>All</option>";
							$sql = mysql_query("SELECT * FROM perusahaan");
							while ($data=mysql_fetch_array($sql)){
								if($id_perusahaan == $data['id_perusahaan'])
									echo "<option value=$data[id_perusahaan] selected>$data[nm_perusahaan]</option>";
								else
									echo "<option value=$data[id_perusahaan]>$data[nm_perusahaan]</option>";
							}
						}
					?>
                  </select></td>
				</tr>
				<tr>
				 
				  
			  </tr>
				<tr>
				  <td></td>
				  <td></td>
				  <td>Filter Usia </td>
				  <td><select name='usia' id='usia'  onchange="this.form.submit();">
                      <?php
						
						if(isset($_POST['usia'])){
							$usia = $_POST['usia'];
						 }else if(isset($_GET['usia'])){
							$usia = $_GET['usia'];
						 }
						 
						 $tua = 'tua';
						 $muda = 'muda';
						  if($usia != ''){
										if($usia == 'tua'){					
												echo "<option value=$tua selected> > 55</option>";
												$no_selected = "<option value=$muda> <= 55</option>";
											}else if($usia == 'muda'){
												echo "<option value=$muda selected> <= 55</option>";
												$no_selected = "<option value=$tua> > 55</option>";
											}	
											
						  				echo $no_selected;
										echo "<option value=>  All</option>";
									}
										else {
										?>
                      <option value='' selected="selected">All</option>
                      <option value='tua'> &gt; 55</option>
                      <option value='muda'> &lt;= 55</option>
                      <?php	}?>
                  </select></td>
			  </tr>
			  <tr>
					<td></td>
			  </tr>
			  <tr>
					<td></td>
			  </tr>
			</table>
	
		<?php
					if(isset($_SESSION['pesan'])){
						echo $_SESSION['pesan'];
						unset($_SESSION['pesan']);
					}
				?>
				<?php
					//BATAS PAGING DEFAULT
					$batasan = 5;
				?>	
				</br>
				</br>
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
								</select> Records per Page
  </form>
								<div class="btn-group pull-right">
								<?php
									if(empty($nm_pekerjaan)&&empty($id_field)&&empty($id_no_po)&&empty($id_lks_kerja)&&empty($id_sistem_kerja)&&empty($id_klasifikasi)&&empty($id_perusahaan)&&empty($id_fpemegang_kontrak)&&empty($id_fkerja)){
										$nm_pekerjaan = '0';
										$id_field = '0';
										$id_no_po = '0';
										$id_lks_kerja = '0';
										$id_sistem_kerja = '0';
										$id_klasifikasi = '0';
										$id_perusahaan = '0';
										$id_fpemegang_kontrak = '0';
										$id_fkerja = '0';
									}
									?>
									<?php if(isset($_POST['nama']))
											$namapdf= $_POST['nama'];
										else if(isset($_GET['nama']))
											$namapdf= $_GET['nama'];
											
											?>
											
									<?php if(isset($_POST['ktp']))
											$ktppdf= $_POST['ktp'];
										else if(isset($_GET['ktp']))
											$ktppdf= $_GET['ktp'];
											
											?>
											
								<a href="pdfKaryawan.php?usia=<?php echo $usia;?>
											&ktp=<?php echo $ktppdf; ?>
											&nama=<?php echo $namapdf; ?>
											&nm_pekerjaan=<?php echo $nm_pekerjaan; ?>
											&id_no_po=<?php echo $id_no_po; ?>
											&id_lks_kerja=<?php echo $id_lks_kerja; ?>
											&id_sistem_kerja=<?php echo $id_sistem_kerja; ?>
											&id_field=<?php echo $id_field; ?>
											&id_klasifikasi=<?php echo $id_klasifikasi; ?>
											&id_fpemegang_kontrak=<?php echo $id_fpemegang_kontrak;?>
											&id_fkerja=<?php echo $id_fkerja;?>
											&id_perusahaan=<?php echo $id_perusahaan;?>" target="_blank" class="btn-small btn-info btn">
									<i class="icon icon-print"></i> PDF</a>

									<?php if($_SESSION['role_id']=='1') {?>
									<a href="csv.php?usia=<?php echo $usia;?>
											&ktp=<?php echo$ktppdf; ?>
											&nama=<?php echo$namapdf; ?>
											&nm_pekerjaan=<?php echo$nm_pekerjaan; ?>
											&id_lks_kerja=<?php echo $id_lks_kerja; ?>
											&id_no_po=<?php echo $id_no_po; ?>
											&id_sistem_kerja=<?php echo $id_sistem_kerja; ?>
											&id_field=<?php echo $id_field; ?>
											&id_klasifikasi=<?php echo $id_klasifikasi; ?>
											&id_fpemegang_kontrak=<?php echo $id_fpemegang_kontrak;?>
											&id_fkerja=<?php echo $id_fkerja;?>
											&id_perusahaan=<?php echo $id_perusahaan;?>" class="btn-small btn  btn-primary">
									<i class="icon icon-print"></i> CSV</a>
									
									<a href="index.php?tab=datakaryawan&folder=karyawan&file=karyawan_form_insert" class="btn-small btn  btn-success">
									<i class="icon icon-plus"></i> Tambah TKJP</a>
									  
										  <?php } ?>
								</div>	
								
							</td>
						</tr>
						<tr>
							<th>No</th>
							<th>No KTP</th>
							<th>Nama</th>
							<th>Usia</th>
							<th>No Jamsostek</th>
							<th>Field</th>
							<th>Pemegang Kontrak</th>
							<th>Fungsi</th>
							<th>Lokasi</th>
							<th>No PO</th>
							<th>Perusahaan</th>
							<th>Pekerjaan</th>
							<th>Sistem Kerja</th>
							<th>Klasifikasi</th>
							<th>Aksi</th>
						</tr>
						<?php
							if(isset($_POST['batas']))
								$batas= $_POST['batas'];
							else if(isset($_GET['batas']))
								$batas= $_GET['batas'];
							else
								$batas= $batasan;
								
							$halaman=$_GET['halaman'];
							$posisi=null;
							if(empty($halaman)){
							$posisi=0;
							$halaman=1;
							}else{
							$posisi=($halaman-1)* $batas;
							}
							
							$query="SELECT *
											FROM tkjp
											LEFT JOIN klasifikasi ON tkjp.id_klasifikasi = klasifikasi.id_klasifikasi
											LEFT JOIN fpemegang_kontrak ON tkjp.id_fpemegang_kontrak = fpemegang_kontrak.id
											LEFT JOIN fungsi_kerja ON tkjp.id_fkerja = fungsi_kerja.id_fkerja
											LEFT JOIN field ON tkjp.id_field = field.id_field
											LEFT JOIN lokasi_kerja ON tkjp.id_lks_kerja = lokasi_kerja.id_lokasi
											LEFT JOIN sistem_kerja ON tkjp.id_sistem_kerja = sistem_kerja.id
											LEFT JOIN no_po ON tkjp.id_no_po = no_po.id_no_po
											LEFT JOIN perusahaan ON no_po.id_perusahaan = perusahaan.id_perusahaan
											
											WHERE tkjp.status = 'aktif'
											LIMIT $posisi,$batas ";
											 
								$query_page="SELECT *
											FROM tkjp
											LEFT JOIN klasifikasi ON tkjp.id_klasifikasi = klasifikasi.id_klasifikasi
											LEFT JOIN fpemegang_kontrak ON tkjp.id_fpemegang_kontrak = fpemegang_kontrak.id
											LEFT JOIN fungsi_kerja ON tkjp.id_fkerja = fungsi_kerja.id_fkerja
											LEFT JOIN field ON tkjp.id_field = field.id_field
											LEFT JOIN lokasi_kerja ON tkjp.id_lks_kerja = lokasi_kerja.id_lokasi
											LEFT JOIN sistem_kerja ON tkjp.id_sistem_kerja = sistem_kerja.id
											LEFT JOIN no_po ON tkjp.id_no_po = no_po.id_no_po
											LEFT JOIN perusahaan ON no_po.id_perusahaan = perusahaan.id_perusahaan
											
											WHERE tkjp.status = 'aktif' ";
						 
							if(	isset($_POST['ktp']) || isset($_POST['nama']) ||  
							    isset($_POST['usia']) || isset($_GET['usia']) || isset($_POST['nm_pekerjaan']) ||
								isset($_POST['id_field']) || isset($_POST['id_lks_kerja']) || 
								isset($_POST['id_sistem_kerja']) ||isset($_POST['id_no_po']) ||
								isset($_POST['id_klasifikasi']) || isset($_POST['id_fpemegang_kontrak']) || 
								isset($_POST['id_perusahaan']) || isset($_POST['id_fkerja'])){
							
								$limit = " LIMIT $posisi,$batas ";
								$sql = "SELECT *
											FROM tkjp
											LEFT JOIN klasifikasi ON tkjp.id_klasifikasi = klasifikasi.id_klasifikasi
											LEFT JOIN fpemegang_kontrak ON tkjp.id_fpemegang_kontrak = fpemegang_kontrak.id
											LEFT JOIN fungsi_kerja ON tkjp.id_fkerja = fungsi_kerja.id_fkerja
											LEFT JOIN field ON tkjp.id_field = field.id_field
											LEFT JOIN lokasi_kerja ON tkjp.id_lks_kerja = lokasi_kerja.id_lokasi
											LEFT JOIN sistem_kerja ON tkjp.id_sistem_kerja = sistem_kerja.id
											LEFT JOIN no_po ON tkjp.id_no_po = no_po.id_no_po
											LEFT JOIN perusahaan ON no_po.id_perusahaan = perusahaan.id_perusahaan
											
											WHERE status = 'aktif' ";
										
										isset ($_POST['ktp']) ? $ktp = $_POST['ktp'] : $ktp = $_GET['ktp']; 
										if($ktp != ''){
											$kondisi_ktp = " no_ktp LIKE '%$ktp%' || no_jamsostek LIKE '%$ktp%' ";
											$sql = $sql." AND ".$kondisi_ktp ;
										}

										isset ($_POST['nama']) ? $nama = $_POST['nama'] : $nama = $_GET['nama']; 
										if($nama != ''){
											$kondisi_nama = " nm_lengkap LIKE '%$nama%' || nm_pekerjaan LIKE '%$nama%' ";
											$sql = $sql." AND ".$kondisi_nama ;
										}
										/*
										isset ($_POST['nm_pekerjaan']) ? $nm_pekerjaan = $_POST['nm_pekerjaan'] : $nm_pekerjaan = $_GET['nm_pekerjaan']; 							
										if($nm_pekerjaan != '0'){
											$kondisi_pekerjaan = " tkjp.nm_pekerjaan = '$nm_pekerjaan' ";
											$sql = $sql." AND ".$kondisi_pekerjaan;
										}
										*/
										
										if($_POST['usia'] != '' || $_GET['usia'] != ''){
											
											$tanggal_sekarang = date('Y-m-d');
											isset ($_POST['usia']) ? $usia = $_POST['usia'] : $usia = $_GET['usia'];
											
											if($usia == 'tua'){
											{					
												$kondisi_usia = "  YEAR( curdate( ) ) - YEAR( tgl_lahir ) >'55' ";
											}
											}else if($usia == 'muda')
												$kondisi_usia = " YEAR( curdate( ) ) - YEAR( tgl_lahir ) <='55' ";
												
											$sql = $sql." AND ".$kondisi_usia;
										}
										/*
									    isset ($_POST['nm_pekerjaan']) ? $nm_pekerjaan = $_POST['nm_pekerjaan'] : $nm_pekerjaan = $_GET['nm_pekerjaan']; 							
										if($nm_pekerjaan != '0'){
											$kondisi_pekerjaan = " tkjp.nm_pekerjaan = '$nm_pekerjaan' ";
											$sql = $sql." AND ".$kondisi_pekerjaan;
										}
										*/
										
										isset ($_POST['id_field']) ? $id_field = $_POST['id_field'] : $id_field = $_GET['id_field']; 
										if($id_field != '0'){
											$kondisi_field = " tkjp.id_field = '$id_field' ";
											$sql = $sql." AND ".$kondisi_field;
										}
										
										
										isset ($_POST['id_no_po']) ? $id_no_po = $_POST['id_no_po'] : $id_no_po = $_GET['id_no_po']; 
										if($id_no_po != '0'){
											$kondisi_no_po = " tkjp.id_no_po = '$id_no_po' ";
											$sql = $sql." AND ".$kondisi_no_po;
										}
										
										isset ($_POST['id_lks_kerja']) ? $id_lks_kerja = $_POST['id_lks_kerja'] : $id_lks_kerja = $_GET['id_lks_kerja'];
										if($id_lks_kerja != '0'){
											$kondisi_lokasi = " tkjp.id_lks_kerja = '$id_lks_kerja' ";
											$sql = $sql." AND ".$kondisi_lokasi;
										}
										
										isset ($_POST['id_sistem_kerja']) ? $id_sistem_kerja = $_POST['id_sistem_kerja'] : $id_sistem_kerja = $_GET['id_sistem_kerja'];
										if($id_sistem_kerja != '0'){
											$kondisi_sistem_kerja = " tkjp.id_sistem_kerja = '$id_sistem_kerja' ";
											$sql = $sql." AND ".$kondisi_sistem_kerja;
										}

										isset ($_POST['id_klasifikasi']) ? $id_klasifikasi = $_POST['id_klasifikasi'] : $id_klasifikasi = $_GET['id_klasifikasi'];
										if($id_klasifikasi != '0'){
											$kondisi_klasifikasi = " tkjp.id_klasifikasi = '$id_klasifikasi' ";
											$sql =$sql." AND ". $kondisi_klasifikasi;
										}

										isset ($_POST['id_fpemegang_kontrak']) ? $id_fpemegang_kontrak = $_POST['id_fpemegang_kontrak'] : $id_fpemegang_kontrak = $_GET['id_fpemegang_kontrak'];
										if($id_fpemegang_kontrak != '0'){
											$kondisi_pemegang_kontrak = " tkjp.id_fpemegang_kontrak = '$id_fpemegang_kontrak' ";
											$sql = $sql." AND ".$kondisi_pemegang_kontrak;
										}
										
										isset ($_POST['id_fkerja']) ? $id_fkerja = $_POST['id_fkerja'] : $id_fkerja = $_GET['id_fkerja'];
										if($id_fkerja != '0'){
											$kondisi_fungsi_kerja = " tkjp.id_fkerja = '$id_fkerja' ";
											$sql = $sql." AND ".$kondisi_fungsi_kerja;
										}
										
										isset ($_POST['id_perusahaan']) ? $id_perusahaan = $_POST['id_perusahaan'] : $id_perusahaan = $_GET['id_perusahaan'];
										if($id_perusahaan != '0'){
											$kondisi_perusahaan = "  no_po.id_perusahaan = '$id_perusahaan' ";
											$sql =$sql." AND ". $kondisi_perusahaan;
										}
									$query= $sql."".$limit;
									$query_page= $sql;
							}
							
							$result=mysql_query($query) or die(mysql_error());
							$no=0;
							//proses menampilkan data
							while($rows=mysql_fetch_array($result)){
						?>
						<tr class="success">
							<!-- <td><?php echo $no++; ?></td> -->
							<td><?php echo $no+$posisi; ?></td>
							<td>
								<?php echo $rows['no_ktp']; ?>						  
							</td>
							<td><?php echo $rows['nm_lengkap']; ?></a></td>
							<td><center>
							<?php
								$tgllahir = $rows['tgl_lahir'];
								$tglsekarang = date("y-m-d");
							
								$query = "SELECT datediff('$tglsekarang', '$tgllahir') as selisih";
								//echo $query;
								$hasil = mysql_query($query);
								$data = mysql_fetch_array($hasil);
								$tahun = floor($data['selisih']/365);
								$bulan = floor(($data['selisih'] - ($tahun * 365))/30);
								$hari = $data['selisih'] - $bulan * 30 - $tahun * 365;
								if($tahun > '55')
									echo "<span class='badge badge-important'>".$tahun."</span>";
								else if($tahun <= '54')
									echo $tahun;
							?>							
							</center>
							</td>
							<td><?php echo $rows['no_jamsostek']; ?></td>
							<td><?php echo $rows['nm_field']; ?></td>
							<td><?php echo $rows['fungsi']; ?></td>
							<td><?php echo $rows['fkerja']; ?></td>
							<td><?php echo $rows['lokasi']; ?></td>
							<td><?php echo $rows['no_po']; ?></td>
							<td><?php echo $rows['nm_perusahaan']; ?></td>
							<td><?php echo $rows['nm_pekerjaan']; ?></td>
							<td><?php echo $rows['waktu']; ?></td>
							<td><?php echo $rows['klasifikasi']; ?></td>
							<td align="center">
							<div class="btn-group">
								<a href="index.php?tab=datakaryawan&folder=karyawan&file=profil&index=<?php echo $rows['index']; ?>" class="btn-mini btn btn-info">
									<i class="icon icon-search"></i> Detail</a>
		
								<?php if(check_user("karyawan","cetak_id_card",$_SESSION['index'],$_SESSION['role_id']) == TRUE){ ?>
									<a href="pdfidCard.php?&index=<?php echo $rows['index']; ?>" target="_blank" class="btn-mini btn btn-primary">
									<i class="icon icon-print"></i> idCard</a>
								<?php } ?>			
							</div></td>
						</tr>
						
						<?php
							}
						?>
				
					</table>
					
				
					<?php
					$result_page = mysql_query($query_page);
					$jmldata = mysql_num_rows($result_page);
					$jmlhalaman = ceil($jmldata / $batas);
					
					
									if(empty($nama)&&empty($nm_pekerjaan)&&empty($id_field)&&empty($id_no_po)&&empty($id_lks_kerja)&&empty($id_sistem_kerja)&&empty($id_klasifikasi)&&empty($id_perusahaan)&&empty($id_fpemegang_kontrak)&&empty($id_fkerja)){
										$nama = '0';
										$nm_pekerjaan = '0';
										$id_field = '0';
										$id_no_po = '0';
										$id_lks_kerja = '0';
										$id_sistem_kerja = '0';
										$id_klasifikasi = '0';
										$id_perusahaan = '0';
										$id_fpemegang_kontrak = '0';
										$id_fkerja = '0';
									}
					echo "<div class='pagination'><ul>"; 
					if ($halaman > 1) echo  "<li><a href=$_SERVER[PHP_SELF]?tab=$tab&folder=$folder&file=$file&ktp=$ktp&nama=$nama&usia=$usia&id_no_po=$id_no_po&nm_pekerjaan=$nm_pekerjaan&id_klasifikasi=$id_klasifikasi&id_fpemegang_kontrak=$id_fpemegang_kontrak&id_fkerja=$id_fkerja&id_lks_kerja=$id_lks_kerja&id_sistem_kerja=$id_sistem_kerja&id_field=$id_field&id_perusahaan=$id_perusahaan&batas=$batas&halaman=".($halaman-1)."'><< Prev</a></li>";

					
					for($i=1;$i<=$jmlhalaman;$i++){
						if ((($i >= $halaman - 3) && ($i <= $halaman + 3)) || ($i == 1) || ($i == $jmlhalaman))
							{
								if (($showPage == 1) && ($i != 2))  echo "<li class='disabled'><a href='#'>...</a></li>";
								if (($showPage != ($jmlhalaman - 1)) && ($i == $jmlhalaman))  echo "<li class='disabled'><a href='#'>...</a></li>";
								if ($i == $halaman) echo "<li class='active'><a href='#'>".$i."</a></li>";
									else echo "<li><a href=$_SERVER[PHP_SELF]?tab=$tab&folder=$folder&file=$file&ktp=$ktp&nama=$nama&usia=$usia&id_no_po=$id_no_po&nm_pekerjaan=$nm_pekerjaan&id_klasifikasi=$id_klasifikasi&id_fpemegang_kontrak=$id_fpemegang_kontrak&id_fkerja=$id_fkerja&id_lks_kerja=$id_lks_kerja&id_sistem_kerja=$id_sistem_kerja&id_field=$id_field&id_perusahaan=$id_perusahaan&batas=$batas&halaman=".$i."'>".$i."</a></li>";
								$showPage = $i;
							}
					
					}					
					if ($halaman < $jmlhalaman) echo "<li><a href=$_SERVER[PHP_SELF]?tab=$tab&folder=$folder&file=$file&ktp=$ktp&nama=$nama&usia=$usia&id_no_po=$id_no_po&nm_pekerjaan=$nm_pekerjaan&id_klasifikasi=$id_klasifikasi&id_fpemegang_kontrak=$id_fpemegang_kontrak&id_fkerja=$id_fkerja&id_lks_kerja=$id_lks_kerja&id_sistem_kerja=$id_sistem_kerja&id_field=$id_field&id_perusahaan=$id_perusahaan&batas=$batas&halaman=".($halaman+1)."'>Next >></a></li>";
				echo "</ul>";
				
					?>		
								
				</div>
				<!-- MENAMPILKAN JUMLAH DATA -->
					<div class="well">
					<?php
					echo "Jumlah Data : $jmldata";	
	
							
				?>
					
					</div>
				<!-- END OF MENAMPILKAN JUMLAH DATA -->

<?php
	} else {
		echo '<div class="alert alert-error"> Maaf Anda Harus Login terlebih dahulu untuk mengakses halaman ini </div>';
	}
?>