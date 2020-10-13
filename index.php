<?php
@session_unset();
@session_destroy();

require_once 'src/constants/constants.php';
require_once 'libraries/google-auth/gpClientConfig.php';


if(isset($_GET['code'])){
	$gClient->authenticate($_GET['code']);
	$_SESSION['token'] = $gClient->getAccessToken();
	header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
	$gClient->setAccessToken($_SESSION['token']);
}

?>
<!DOCTYPE html>
<html lang="es">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo SYSTEM_NAME; ?></title>

        <!-- Bootstrap core CSS -->

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
        <link href="css/animate.min.css" rel="stylesheet">

        <!-- Custom styling plus plugins -->
        <link href="css/custom.css" rel="stylesheet">
        <link href="css/icheck/flat/green.css" rel="stylesheet">

        
        
        <script src="js/jquery.min.js"></script>

        <!--[if lt IE 9]>
            <script src="../assets/js/ie8-responsive-file-warning.js"></script>
            <![endif]-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->

        <!--*********** Configuracion PWA ********************-->

        <!-- color de la aplicaiÃ³n -->

        <meta name="theme-color" content="#00CBE5">

        <!-- Optimizacion para movil, optimizar a nivel de anchura y responsive -->

        <meta name="mobileOptimized" content="width">     

        <meta name="handheldFriendly" content="true">

        <!-- Meta etiquetas PWA para dispositivos de Apple-->

        <meta name="apple-mobile-web-app-capable" content="yes">

        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

        <link rel="apple-touch-icon" type="image/png" href="./images/favicon.png">

        <link rel="apple-touch-startup-image" type="image/png" href="./images/favicon.png">



        <!-- Manifiesto, configuracion general de la PWA -->

        <link rel="manifest" href="manifest.json">


        <script src="main.js"></script>
        <!--*********** Fin Configuracion PWA ********************-->

    </head>

    <body style="background:#E1E1FF">

        <div class="">
            <a class="hiddenanchor" id="toregister"></a>
            <a class="hiddenanchor" id="tologin"></a>

            <div id="wrapper">
                <div id="login" class="animate form">
                    <section class="login_content">
                        <form action="src/controller/SessionController.php?op=login" method="post">
                            <h1><?php echo SYSTEM_NAME; ?></h1>
                            <div>
                                <input type="text" name="user" class="form-control" placeholder="Username" required="" />
                            </div>
                            <div>
                                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
                            </div>
                            <div>
                                <select class="form-control" name="language" id="language">                                    
                                    <option value="ES">-Language-</option>
                                    <option value="ES">ES</option>
                                    <option value="EN">EN</option>
                                </select>
                            </div>
                            <div>
                                <br/>
                                <button
                                    type="submit"
                                    class="btn btn-default"
                                    style="width: 350px"
                                >
                                    Login
                                </button>
                                <br />
                                <br />
                                <?php
                                $authUrl = $gClient->createAuthUrl();
                               echo  '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'">ssss<img src="images/glogin.png" alt=""/></a>';
                                ?>
                                <a
                                    type="submit"
                                    class="btn btn-default"
                                    style="color:white; background-color: #F43D25; width: 350px"
                                    href="<?php echo filter_var($authUrl, FILTER_SANITIZE_URL)?>"
                                >
                                    <i class="fa fa-google-plus"></i>
                                    Google
                                </a>
                            </div>
                            <div class="clearfix"></div>
                            <div class="separator">                                                                                  
                                <div>                                
                                    <p>©2015 All Rights Reserved. versi&oacute;n:<?php echo SYSTEM_VERSION; ?></p>
                                </div>
                            </div>
                        </form>
                        <!-- form -->
                    </section>
                    <!-- content -->
                </div>                        
            </div>
        </div>

    </body>

</html>