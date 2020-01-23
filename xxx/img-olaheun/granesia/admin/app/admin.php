
<div class="panel panel-primary col-md-2">
 	<ul class="nav nav-pills nav-stacked">
	</br>
        <li <?php echo $p==''?'class="active"':'';?>>
			<a href="index.php?&f=data"><label>Home</label></a>
		</li>
		<li <?php echo $p=='slide_show'?'class="active"':'';?>>
			<a href="index.php?p=slide_show&f=slide_show_view"><label>Berita</label></a>
		</li>
		<li <?php echo $p=='resensi'?'class="active"':'';?>>
			<a href="index.php?p=resensi&f=resensi_form_view"><label>Resensi Product</label></a>
		</li>
		<li <?php echo $p=='event'?'class="active"':'';?>>
			<a href="index.php?p=event&f=event_form_view"><label>Event</label></a>
		</li>
		<li <?php echo $p=='upload'?'class="active"':'';?>>
			<a href="index.php?p=upload&f=upload_data_view"><label>Upload Files</label></a>
		</li>
		<li <?php echo $p=='promo'?'class="active"':'';?>>
			<a href="index.php?p=promo&f=promo_form_view"><label>Promo Product</label></a>
		</li>
		<li <?php echo $p=='pesan'?'class="active"':'';?>>
			<a href="index.php?p=pesan&f=pesan_form_view"><label>Pesan</label></a>
		</li>
		<li <?php echo $p=='link_terkait'?'class="active"':'';?>>
			<a href="index.php?p=link_terkait&f=linkterkait_data_view"><label>Klient</label></a>
		</li>
		<!--<li <?php echo $p=='picture'?'class="active"':'';?>>
			<a href="index.php?p=picture&f=picture_data_view"><label>Klien</label></a>
		</li>-->
		<li <?php echo $p=='kontak'?'class="active"':'';?>>
			<a href="index.php?p=kontak&f=kontak_form_view"><label>Kontak</label></a>
		</li>
		<li <?php echo $p=='foto'?'class="active"':'';?>>
			<a href="index.php?p=foto&f=foto_data_view"><label>Foto</label></a>
		</li>
		<li <?php echo $p=='polling'?'class="active"':'';?>>
			<a href="index.php?p=polling&f=polling_form_view"><label>Polling</label></a>
		</li>
		<li <?php echo $p=='users'?'class="active"':'';?>>
			<a href="index.php?p=users&f=view_user"><label>User</label></a>
		</li>
		</br>
		
	</ul>

</div>