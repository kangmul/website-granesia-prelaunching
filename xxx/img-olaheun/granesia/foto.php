<!-- css -->
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="css/jcarousel.css" rel="stylesheet" />
<link href="css/flexslider.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />


<!-- Theme skin -->
<link href="skins/default.css" rel="stylesheet" />

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->



<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
		<!-- end divider -->
		<!-- Portfolio Projects -->
		

			<div class="col-lg-12">
				<div class="row">
					<section id="projects">
					<ul id="thumbs" class="portfolio">
						<!-- Item Project and Filter Name -->
						<?php
			
						$select=mysql_query("select * from foto LIMIT 4");
						while($rows=mysql_fetch_array($select)){?>
			
						<li class="col-lg-3 design" data-id="<?php echo $rows['id']; ?>" data-type="web">
						<div class="item-thumbs">
						<!-- Fancybox - Gallery Enabled - Title - Full Image -->
						<a class="hover-wrap fancybox" data-fancybox-group="gallery" title="<?php echo $rows['judul']; ?>" href="admin/app/foto/files/<?php echo $rows['gambar']; ?>">
						<span class="overlay-img"></span>
						<span class="overlay-img-thumb font-icon-plus"></span>
						</a>
						<!-- Thumb Image and Description -->
						<img src="admin/app/foto/files/<?php echo $rows['gambar']; ?>" width="100px" height="190px" alt="<?php echo $rows['keterangan']; ?>">
						</div>
						</li>
						
						<?php			
						}
						?>
			
					</ul>
					</section>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>

<script type="text/javascript" src="js/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="js/jquery.fancybox-media.js"></script>
<script type="text/javascript" src="js/google-code-prettify/prettify.js"></script>
<script type="text/javascript" src="js/portfolio/jquery.quicksand.js"></script>
<script type="text/javascript" src="js/portfolio/setting.js"></script>
<script type="text/javascript" src="js/jquery.flexslider.js"></script>
<script type="text/javascript" src="js/animate.js"></script>
<script type="text/javascript" src="js/custom.js"></script>

