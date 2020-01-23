<link rel="icon" href="title.jpg" href="#top_content" type="image/jpg">
<link href="../../css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="../../css/style.css" rel="stylesheet" type="text/css">
<link href="../../css/linecons.css" rel="stylesheet" type="text/css">
<link href="../../css/font-awesome.css" rel="stylesheet" type="text/css">
<link href="../../css/responsive.css" rel="stylesheet" type="text/css">
<link href="../../css/animate.css" rel="stylesheet" type="text/css"> 

<header id="header_outer">
  <div class="container">
    <div class="header_section">
      <div class="logo"><a href="index.php" target="reload"><img src="../../img/granesia.png" ></a></div>
      <nav class="nav" id="nav">
        <ul class="toggle">

          <li><a href="">Logout</a></li>
        </ul>
        <ul class="">
          <li><?php
session_start();
/**
 * Jika Tidak login atau sudah login tapi bukan sebagai admin
 * maka akan dibawa kembali kehalaman login atau menuju halaman yang seharusnya.
 */
if ( !isset($_SESSION['user_login']) || 
    ( isset($_SESSION['user_login']) && $_SESSION['user_login'] != 'admin' ) ) {

	header('location:./../login.php');
	exit();
}
?>
<i class="fa-user"></i>   Selamat Datang Admin (<?=$_SESSION['nama'];?>)</li>
          <li><a href="./../logout.php"> logout</a></li>
        </ul>
      </nav>
      <a class="res-nav_click animated wobble wow"  href="javascript:void(0)"><i class="fa-bars"></i></a> </div>
  </div>
</header>