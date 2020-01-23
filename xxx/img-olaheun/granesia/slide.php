		<script>
										$(document).on( 'click', '.slide-show',function(e) {
											var id = $(this).data('id');
											var url = "admin/app/slide_show/slideshow_form_view.php";
											$("#myModalLabel").html("Detail Berita");
											$.post(url, {id: id, } ,function(data) {
											$(".modal-body").html(data).show();
											});
										});
										</script>
							
	<link rel="stylesheet" type="text/css" href="plugins/wowslider/style.css" />
	<script type="text/javascript" src="plugins/wowslider/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->
	
	<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="css/jcarousel.css" rel="stylesheet" />
<link href="css/flexslider.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />


<!-- Theme skin -->
<link href="skins/default.css" rel="stylesheet" />

</head>
<body style="background-color:white">
	<!-- Start WOWSlider.com BODY section -->
	<div id="wowslider-container1" style="height:360px;">
	<div class="ws_images">
	<ul>
	<?php
		$query="SELECT * FROM tools_gallery";
		$result=mysql_query($query) or die(mysql_error());
							
		while($rows=mysql_fetch_array($result)){
		?>	
		<div class="flex-caption">
				<li>
					<a><img src="admin/app/slide_show/files/<?php echo $rows['gambar'];?>" width="60" height="60" title="<?php echo $rows['keterangan'];?>" >
                    </a>
					
					<?php echo substr ($rows['isi_berita'], 0, 150);?>
									<a href="#myModal" data-id="<?php echo $rows['id']; ?>" class="btn btn-info btn-sm slide-show" data-toggle="modal">read more</a>

				</li> 
		</div>
			   <?php
				}
				?>
								
	</ul>
	</div>
	<div class="ws_bullets">
	<div>
	<?php
		$select=mysql_query("select * from tools_gallery");
		while($row=mysql_fetch_array($select)){
			?><a href="#" ><img src="admin/app/slide_show/files/<?php echo $row['gambar'];?>" width="160" height="120" ></a><?php	
		}
	?>
	</div>
	</div>
<span class="wsl"></span>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="plugins/wowslider/wowslider.js"></script>
	<script type="text/javascript" src="plugins/wowslider/script.js"></script>
	<!-- End WOWSlider.com BODY section -->

