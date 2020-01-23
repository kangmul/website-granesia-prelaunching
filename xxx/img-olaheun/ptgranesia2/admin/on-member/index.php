<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1">
<title>PT.Granesia</title>
<link rel="icon" href="title.jpg"  type="image/jpg">
<link rel="stylesheet" href="css/index.css" type="text/css">
</head>

<body>
<div class="atas">
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
</div>
<div class="kiri">
<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>
	
	<title>Pilihan</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="css/style.css">
	
	<!--[if !IE]><!-->
	
	<!--<![endif]-->

</head>

<body>

	<div id="page-wrap">

	<table>
		<thead>
		<tr>
			<th>PILIHAN</th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td><a href="fitur/pilihan/visimisi.php" >VISI & MISI</a></td>
		</tr>
		<tr>
		  <td><a href="fitur/pilihan/sejarah.php" >SEJARAH</a></td>
		</tr>
		<tr>
		  <td><a href="fitur/pilihan/award.php" >AWARD</a></td>
		</tr>
		<tr>
		  <td><a href="fitur/pilihan/resensi.php" >RESENSI</a></td>
		</tr>
		<tr>
		  <td><a href="fitur/pilihan/promotion.php" >PROMOTION</a></td>	
		</tr>
		<tr>
		  <td><a href="fitur/pilihan/event.php" >EVENT</a></td>
		</tr>
		<tr>
		  <td><a href="fitur/pilihan/email.php">EMAIL</a></td>
		</tr>
		</tbody>

	</table>
	
	</div>
		
</body>

</html>
</div>
<div class="kanan">
KANAN
</div>
</body>
