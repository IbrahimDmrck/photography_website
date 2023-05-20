<?php
ob_start();
require '../database/db_conn.php';
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Admin | Dashboard</title>

    <link href="back/css/bootstrap.min.css" rel="stylesheet">
    <link href="back/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="back/css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <!-- Ladda style -->
    <link href="back/css/plugins/ladda/ladda-themeless.min.css" rel="stylesheet">
    <link href="back/css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <link href="back/css/plugins/select2/select2.min.css" rel="stylesheet">
    <!-- Gritter -->
    <link href="back/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="back/css/animate.css" rel="stylesheet">
    <link href="back/css/style.css" rel="stylesheet">
    <link href="back/css/plugins/summernote/summernote-bs4.css" rel="stylesheet">

    <link href="back/css/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">
      <!-- FooTable -->
      <link href="back/css/plugins/footable/footable.core.css" rel="stylesheet">
      <link href="back/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
<!-- chosen-select -->
      <link href="back/css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
    <style>
        .ui-helper-hidden-accessible {
            display: none;
        }

        div.ui-tooltip-content {
            display: none;
        }
        .ui-tooltip{
            display: none;
        }
      
    </style>



</head>

<body>

    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <?php
                        $admin_name = $_SESSION['username'];
                        $admin = $db->query("SELECT * FROM admin WHERE email  LIKE '%$admin_name%' ", PDO::FETCH_ASSOC);
                        ?>
                        <?php foreach ($admin as $value) { ?>
                            <div class="dropdown profile-element">
                                <img alt="image" class="rounded-circle" src="img/profile_small.jpg" />
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    <span class="block m-t-xs font-bold">
                                        <?= $value['name'] . " " . $value['surName'] ?>
                                    </span>
                                    <span class="text-muted text-xs block">Admin <b class="caret"></b></span>
                                </a>
                                <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                    <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                                    <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                                    <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
                                    <li class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="login.php">Logout</a></li>
                                </ul>
                            </div>
                        <?php } ?>
                    </li>
                    <li class="active">
                        <a href="index.php"><i class="fa fa-th-large"></i> <span class="nav-label">Ana Sayfa</span> </a>
                    </li>
                    <li>
                        <a href="aboutUs.php"><i class="fa fa-user"></i> <span class="nav-label">Hakkımda</span></a>
                    </li>
                    <li>
                        <a href="ourService.php"><i class="fa fa-bar-chart-o"></i> <span
                                class="nav-label">Hizmetler</span></a>

                    </li>
                    <li>
                        <a href="messages.php"><i class="fa fa-envelope"></i> <span class="nav-label">İletişim
                            </span></a>
                    </li>
                    <li>
                        <a href="gallery.php"><i class="fa fa-photo"></i> <span class="nav-label">Galeri</span> </a>
                    </li>
                    <li>
                        <a href="siteSetting.php"><i class="fa fa-gear"></i> <span class="nav-label">Site
                                Ayarları</span></a>
                    </li>
                    <li>
                        <a href="menus.php"><i class="fa fa-list"></i> <span class="nav-label">Menüler</span></a>

                    </li>
                    <li>
                        <a href="pages.php"><i class="fa fa-file"></i> <span class="nav-label">Sayfalar</span></a>

                    </li>
                    <li>
                        <a href="../ana-sayfa" target="_blank"><i class="fa fa-sign-out"></i> <span
                                class="nav-label">Siteye Git</span></a>

                    </li>

                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i
                                class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" action="search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="Search for something..." class="form-control"
                                    name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">

                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-envelope"></i> <span class="label label-warning">16</span>
                            </a>
                            <ul class="dropdown-menu dropdown-messages dropdown-menu-right">
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a class="dropdown-item float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle" src="img/a7.jpg">
                                        </a>
                                        <div class="media-body">
                                            <small class="float-right">46h ago</small>
                                            <strong>Mike Loreipsum</strong> started following <strong>Monica
                                                Smith</strong>. <br>
                                            <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a class="dropdown-item float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle" src="img/a4.jpg">
                                        </a>
                                        <div class="media-body ">
                                            <small class="float-right text-navy">5h ago</small>
                                            <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica
                                                Smith</strong>. <br>
                                            <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a class="dropdown-item float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle" src="img/profile.jpg">
                                        </a>
                                        <div class="media-body ">
                                            <small class="float-right">23h ago</small>
                                            <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                            <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="mailbox.html" class="dropdown-item">
                                            <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell"></i> <span class="label label-primary">8</span>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <a href="mailbox.html" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                            <span class="float-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a href="profile.html" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                            <span class="float-right text-muted small">12 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a href="grid_options.html" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                            <span class="float-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="notifications.html" class="dropdown-item">
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>


                        <li>
                            <a href="login.php">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>

                    </ul>

                </nav>