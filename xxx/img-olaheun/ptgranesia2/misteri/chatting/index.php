<!DOCTYPE html>
<html>
 <head>
 <meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1">
<title>PT.Granesia</title>
<link rel="icon" href="../title.jpg" href="#top_content" type="image/jpg">
  <script src="jquery.min.js"></script>
  <script src="chat.js"></script>
  <link href="chat.css" rel="stylesheet"/>
 </head>
 <body>
	<div id="konten">
	<div class="tab" data-dip="chat">PERCAKAPAN</div><div class="tab" data-dip="users">SEDANG ONLINE</div>
   <div class="chat"><div class="kanan">
     <?php 
	 include("config.php");include("login.php");
     if(isset($_SESSION['user'])){
      include("chatbox.php");
     }else{
      $display_case=true;
      include("login.php");
     }
     ?></div>
   </div>
   <div class="users" style='display:none'>
     <?php include("users.php");?>
    </div>
    <div class="kiri">asd
	</div>
 </body>
</html>
