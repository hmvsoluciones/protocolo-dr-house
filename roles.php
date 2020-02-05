<?php
    session_start();


if (!empty(filter_input(INPUT_GET, 'currentRole'))) {
    $_SESSION['currentRole'] = filter_input(INPUT_GET, 'currentRole');


    header("Location: dashboard.php");
}
if (!isset($_SESSION['user']) && !isset($_SESSION['roles'])) {

    header("Location: index.php");
}
/* if ($_SESSION['language'] == "ES") {
  require_once '../app/src/constants/constants.php';
  } else {
  require_once '../app/src/constants/constantsEN.php';
  } */
require_once 'src/constants/constants.php';



//echo "<pre>";
//var_dump($_SESSION);
//echo "</pre>";
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

    </head>

    <body style="background:#E1E1FF">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h2><?php echo SYSTEM_NAME; ?></h2>
            <hr style="color: #2A3F54;background-color: #2A3F54;height: 3px;"/>
        </div>
        

        <?php foreach ($_SESSION['roles'] as $key => $value) { ?>

            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="x_panel tile fixed_height_200" align="center" style="cursor: pointer">
                    <div class="x_title">
                        <h2><?php
            if ($_SESSION['language'] == "ES") {
                echo $value['NAME'];
            } else {
                echo (isset($value['NAMEEN'])) ? $value['NAMEEN'] : $value['NAME'];
            }
            ?></h2>                                                                                                            
                        <div class="clearfix"></div>
                    </div>                    
                    <?php if (file_exists("images/roles/{$value['NAME']}.png")) { ?>
                        <img src="images/roles/<?php echo $value['NAME']; ?>.png" onclick="window.location = 'roles.php?currentRole=<?php echo $value['IDROLE']; ?>'"/>
                    <?php } else { ?>
                        <img src="images/roles/ROLE.png"onclick="setRole(<?php echo $value['IDROLE']; ?>)"/>
                    <?php } ?>

                </div>
            </div>
        <?php } ?>

        <script src="js/app/roles.js"></script>
    </body>
</html>