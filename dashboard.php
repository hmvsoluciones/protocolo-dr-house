<?php
session_start();
require_once 'src/util/Util.php';
require_once 'src/util/impl/UtilImpl.php';
require_once 'src/connection/Connection.php';
require_once 'src/login/dao/LoginDao.php';
require_once 'src/login/dao/LoginDaoImpl.php';
require_once 'src/login/service/LoginService.php';
require_once 'src/login/service/LoginServiceImpl.php';


if (!isset($_SESSION['user']) && !isset($_SESSION['currentRole'])) {
    header("Location: index.php");
}

var_dump($_SESSION);
require_once 'src/constants/constants.php';

$loginServie = new LoginServiceImpl();

$menuItems = $loginServie->getMenusByRole($_SESSION['currentRole']);
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

        <link href="js/jquery-ui/jquery-ui.min.css" rel="stylesheet">
        
        <!-- Bootstrap core CSS -->

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
        <link href="css/animate.min.css" rel="stylesheet">

        <!-- Custom styling plus plugins -->
        <link href="css/custom.css" rel="stylesheet">
        <link href="css/icheck/flat/green.css" rel="stylesheet">
        <link href="css/validationEngine/validationEngine.jquery.css" rel="stylesheet">


        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />




        <!--[if lt IE 9]>
            <script src="../assets/js/ie8-responsive-file-warning.js"></script>
            <![endif]-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->

    </head>


    <body class="nav-md">

        <div class="container body">


            <div class="main_container">

                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">

                        <div class="navbar nav_title" style="border: 0;">
                            <a href="#" class="site_title"><i class="fa fa-paw"></i> <span><?php echo SYSTEM_NAME; ?></span></a>
                        </div>
                        <div class="clearfix"></div>

                        <!-- menu prile quick info -->
                        <div class="profile">
                            <div class="profile_pic">
                                <img src="images/USER_1.png" alt="..." class="img-circle profile_img">
                            </div>
                            <div class="profile_info">
                                <span><?php echo WELCOME_MESSAGE; ?></span>
                                <h2><?php echo $_SESSION['user']['NAME']; ?></h2>
                            </div>
                        </div>
                        <!-- /menu prile quick info -->

                        <br />

                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                            <div class="menu_section">
                                <h3>                                    
                                    <?php
                                    foreach ($_SESSION['roles'] as $key => $value) {
                                        if ($value['IDROLE'] === $_SESSION['currentRole']) {
                                            echo ($_SESSION['language'] == "EN") ? $value['NAMEEN'] : $value['NAME'];
                                        }
                                    }
                                    ?>
                                </h3>
                                <ul class="nav side-menu">
                                    <?php
                                    foreach ($menuItems as $key => $value) {

                                        $menu = $value['MENU'];

                                        if ($_SESSION['language'] == "EN") {
                                            $menu = (isset($value['MENUEN'])) ? $value['MENUEN'] : $value['MENU'];
                                        }
                                        ?>
                                        <li><a><i class="<?php echo $value['ICONO']; ?>"></i> <?php echo $menu ?> <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu" style="display: none">
                                                <?php
                                                $subMenus = $loginServie->getSubMenusByIdMenu($value['IDMENU']);
                                                ?>

                                                <?php
                                                foreach ($subMenus as $key => $value) {

                                                    $subMenu = $value['NAME'];

                                                    if ($_SESSION['language'] == "EN") {
                                                        $subMenu = (isset($value['NAMEEN'])) ? $value['NAMEEN'] : $value['NAME'];
                                                    }
                                                    ?>
                                                    <li><a class="menuItem" href="<?php echo $value['URL'] ?>"><?php echo $subMenu; ?></a></li>
                                                <?php } ?>                                                
                                            </ul>
                                        </li>
                                    <?php } ?>                                   
                                </ul>
                            </div>                            
                        </div>
                        <!-- /sidebar menu -->

                        <!-- /menu footer buttons -->
                        <div class="sidebar-footer hidden-small">                            
                            <a href="index.php" data-toggle="tooltip" data-placement="top" title="Logout">
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            </a>
                            <a href="#" onclick="modalPW()" data-toggle="tooltip" data-placement="top" title="Password">
                                <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                            </a>
                            <a href="roles.php" data-toggle="tooltip" data-placement="top" title="Roles">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            </a>
                        </div>
                        <!-- /menu footer buttons -->
                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">

                    <div class="nav_menu">
                        <nav class="" role="navigation">
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>

                            <ul class="nav navbar-nav navbar-right">
                                <li class="">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <img src="images/USER_1.png" alt="">
                                        <?php echo $_SESSION['user']['NAME']; ?>
                                        <span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">                                                                                
                                        <li><a href="roles.php"><i class="fa fa-cog pull-right"></i> Roles</a>
                                        </li>
                                        <li><a href="#" onclick="modalPW()"><i class="fa fa-lock pull-right"></i> Password</a>
                                        </li>
                                        <li><a href="index.php"><i class="fa fa-sign-out pull-right"></i> Logout</a>
                                        </li>
                                    </ul>
                                </li>                                

                            </ul>
                        </nav>
                    </div>

                </div>
                <!-- /top navigation -->

                <!-- page content -->
                <div class="right_col" role="main">

                    <div class="clearfix"></div>

                    <div class="" id="mainContainer">                       

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel" style="height:850px;">
                                    <div class="x_title">
                                        <h2><?php echo SYSTEM_NAME; ?></h2>                                        
                                        <div class="clearfix"></div>

                                    </div>
                                    <div align="center">
                                        <img width="80%" class="img-thumbnail img-responsive" src="images/bg.jpg"/>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- footer content -->
                    <footer>
                        <div class="">
                            <p class="pull-right"><?php echo SYSTEM_NAME; ?>
                                <span class="lead"> <i class="fa fa-briefcase"></i> <?php echo SYSTEM_VERSION; ?></span>
                            </p>
                        </div>
                        <div class="clearfix"></div>
                    </footer>
                    <!-- /footer content -->

                </div>
                <!-- /page content -->
            </div>

        </div>

        <div id="custom_notifications" class="custom-notifications dsp_none">
            <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
            </ul>
            <div class="clearfix"></div>
            <div id="notif-group" class="tabbed_notifications"></div>
        </div>

        <div class="modal" id="modalChangePassword" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo USER_MODAL_CHANGE_PASSWORD; ?></h4>
                    </div>
                    <div class="modal-body">                                
                        <form id="frmUpdatePassword" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="current"><?php echo USER_CURRENT_PASSWORD; ?> <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">                                    
                                    <input type="password" id="current" name="current" class="form-control col-md-7 col-xs-12 validate[required]" />                            
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="new"><?php echo USER_NEW_PASSWORD; ?> <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">                                    
                                    <input type="password" id="new" name="new" class="form-control col-md-7 col-xs-12 validate[required]" />                            
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="confirm"><?php echo USER_CONFIRM_NEW_PASSWORD; ?> <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">                                    
                                    <input type="password" id="confirm" name="confirm" class="form-control col-md-7 col-xs-12 validate[required, equals[new]]" />                            
                                </div>
                            </div>
                            <div class="ln_solid"></div>                   
                            <div class="form-group">
                                <div align="center">
                                    <span class="fa fa-save iconPrimary" onclick="updatePassword()"></span>
                                </div>
                            </div>
                        </form>
                    </div>           

                </div>
            </div>
        </div>


        <script src="js/jquery.min.js"></script>
        <script src="js/jquery-ui/jquery-ui.min.js"></script>
        <script src="js/validationEngine/jquery.validationEngine.js"></script>

        <?php if ($_SESSION['language'] == "ES") { ?>
            <script src="js/validationEngine/languages/jquery.validationEngine-es.js"></script>
        <?php } else { ?>
            <script src="js/validationEngine/languages/jquery.validationEngine-en.js"></script>
        <?php } ?>

        <script src="js/bootstrap.min.js"></script>

        <!-- chart js -->
        <script src="js/chartjs/chart.min.js"></script>
        <!-- bootstrap progress js -->
        <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
        <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
        <!-- icheck -->
        <script src="js/icheck/icheck.min.js"></script>

        <script src="js/custom.js"></script>

        <!-- PNotify -->
        <script type="text/javascript" src="js/notify/pnotify.core.js"></script>
        <script type="text/javascript" src="js/notify/pnotify.buttons.js"></script>
        <script type="text/javascript" src="js/notify/pnotify.nonblock.js"></script>


        <script src="js/app/dashboard.js"></script>

        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    </body>

</html>
