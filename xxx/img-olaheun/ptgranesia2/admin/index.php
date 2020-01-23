<html>
<head>
<style>
html, body {
  margin: 0;
  height: 100%;
  overflow:hidden;
}

.sky {
  height: 480px;
  background: #007fd5;
  position: relative;
  overflow: hidden;
  -webkit-animation: sky_background 50s ease-out infinite;
  -moz-animation: sky_background 50s ease-out infinite;
  -o-animation: sky_background 50s ease-out infinite;
  -webkit-transform: translate3d(0, 0, 0);
  -moz-transform: translate3d(0, 0, 0);
  -o-transform: translate3d(0, 0, 0)
}

.moon {
  background: url("http://montanaflynn.me/lab/css-clouds/images/moon.png");
  position: absolute;
  left: 0;
  height: 100%;
  width: 300%;
  -webkit-animation: moon 50s linear infinite;
  -moz-animation: moon 50s linear infinite;
  -o-animation: moon 50s linear infinite;
  -webkit-transform: translate3d(0, 0, 0);
  -moz-transform: translate3d(0, 0, 0);
  -o-transform: translate3d(0, 0, 0)
}

.clouds_one {
  background: url("http://montanaflynn.me/lab/css-clouds/images/cloud_one.png");
  position: absolute;
  left: 0;
  top: 0;
  height: 100%;
  width: 300%;
  -webkit-animation: cloud_one 50s linear infinite;
  -moz-animation: cloud_one 50s linear infinite;
  -o-animation: cloud_one 50s linear infinite;
  -webkit-transform: translate3d(0, 0, 0);
  -moz-transform: translate3d(0, 0, 0);
  -o-transform: translate3d(0, 0, 0)
}

.clouds_two {
  background: url("http://montanaflynn.me/lab/css-clouds/images/cloud_two.png");
  position: absolute;
  left: 0;
  top: 0;
  height: 100%;
  width: 300%;
  -webkit-animation: cloud_two 75s linear infinite;
  -moz-animation: cloud_two 75s linear infinite;
  -o-animation: cloud_two 75s linear infinite;
  -webkit-transform: translate3d(0, 0, 0);
  -moz-transform: translate3d(0, 0, 0);
  -o-transform: translate3d(0, 0, 0)
}

.clouds_three {
  background: url("http://montanaflynn.me/lab/css-clouds/images/cloud_three.png");
  position: absolute;
  left: 0;
  top: 0;
  height: 100%;
  width: 300%;
  -webkit-animation: cloud_three 100s linear infinite;
  -moz-animation: cloud_three 100s linear infinite;
  -o-animation: cloud_three 100s linear infinite;
  -webkit-transform: translate3d(0, 0, 0);
  -moz-transform: translate3d(0, 0, 0);
  -o-transform: translate3d(0, 0, 0)
}

@-webkit-keyframes sky_background {
  0% {
    background: #007fd5;
    color: #007fd5
  }
  50% {
    background: #000;
    color: #a3d9ff
  }
  100% {
    background: #007fd5;
    color: #007fd5
  }
}

@-webkit-keyframes moon {
  0% {
    opacity: 0;
    left: -200% -moz-transform: scale(0.5);
    -webkit-transform: scale(0.5);
  }
  50% {
    opacity: 1;
    -moz-transform: scale(1);
    left: 0% bottom: 250px;
    -webkit-transform: scale(1);
  }
  100% {
    opacity: 0;
    bottom: 500px;
    -moz-transform: scale(0.5);
    -webkit-transform: scale(0.5);
  }
}

@-webkit-keyframes cloud_one {
  0% {
    left: 0
  }
  100% {
    left: -200%
  }
}

@-webkit-keyframes cloud_two {
  0% {
    left: 0
  }
  100% {
    left: -200%
  }
}

@-webkit-keyframes cloud_three {
  0% {
    left: 0
  }
  100% {
    left: -200%
  }
}

@-moz-keyframes sky_background {
  0% {
    background: #007fd5;
    color: #007fd5
  }
  50% {
    background: #000;
    color: #a3d9ff
  }
  100% {
    background: #007fd5;
    color: #007fd5
  }
}

@-moz-keyframes moon {
  0% {
    opacity: 0;
    left: -200% -moz-transform: scale(0.5);
    -webkit-transform: scale(0.5);
  }
  50% {
    opacity: 1;
    -moz-transform: scale(1);
    left: 0% bottom: 250px;
    -webkit-transform: scale(1);
  }
  100% {
    opacity: 0;
    bottom: 500px;
    -moz-transform: scale(0.5);
    -webkit-transform: scale(0.5);
  }
}

@-moz-keyframes cloud_one {
  0% {
    left: 0
  }
  100% {
    left: -200%
  }
}

@-moz-keyframes cloud_two {
  0% {
    left: 0
  }
  100% {
    left: -200%
  }
}

@-moz-keyframes cloud_three {
  0% {
    left: 0
  }
  100% {
    left: -200%
  }
}
</style>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1">
<title>PT.Granesia</title>
<link rel="icon" href="title.jpg" href="#top_content" type="image/jpg">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
  </head>
  <body>
   <div class="sky">
    <div class="moon"></div>
    <div class="clouds_one"></div>
    <div class="clouds_two"></div>
    <div class="clouds_three"></div>
       <div class="col-md-4 col-md-offset-4 form-login">
    
    <?php
    /* handle error */
    if (isset($_GET['error'])) : ?>
        <div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>Warning!</strong> <?=base64_decode($_GET['error']);?>
        </div>
    <?php endif;?>

        <div class="outter-form-login">
        <div class="logo-login">
            <em class="glyphicon glyphicon-user"></em>
        </div>
            <form action="check-login.php" class="inner-login" method="post">
            <h3 class="text-center title-login">Login PT. Granesia</h3>
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                
                <input type="submit" class="btn btn-block btn-custom-green" value="LOGIN" />
                
                <div class="text-center forget">
                    <p>Login Khusus Karyawan PT. Granesia</p>
                </div>
            </form>
        </div>
    </div>

  </div>
 <div class="sky">
    <div class="moon"></div>
    <div class="clouds_one"></div>
    <div class="clouds_two"></div>
    <div class="clouds_three"></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
  </body>
</html>