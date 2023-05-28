<?php
error_reporting(0);
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
   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.css">
      
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
                            <div class=" profile-element">
                                <!-- <img alt="image" class="rounded-circle" src="img/profile_small.jpg" /> -->
                                <a   href="#">
                                    <span class="block m-t-xs font-bold">
                                        <?= $value['name'] . " " . $value['surName'] ?>
                                    </span>
                                    <span class="text-muted text-xs block">Admin </span>
                                </a>
                              
                            </div>
                        <?php } ?>
                    </li>
                    <li title="Yorumlar">
                        <a href="index.php"><i class="fa fa-comment" title="Yorumlar"></i> <span class="nav-label">Yorumlar</span> </a>
                    </li>
                    <li  title="Hakkımda">
                        <a href="aboutUs.php"><i class="fa fa-user" title="Hakkımda"></i> <span class="nav-label">Hakkımda</span></a>
                    </li>
                    <li title="Hizmetler">
                        <a href="ourService.php" title="Hizmetler"><i class="fa fa-bar-chart-o"></i> <span
                                class="nav-label">Hizmetler</span></a>

                    </li>
                    <li title="Mesajlar">
                        <a href="messages.php" title="Mesajlar"><i class="fa fa-envelope"></i> <span class="nav-label">İletişim
                            </span></a>
                    </li>
                    <li title="Galeri">
                        <a href="gallery.php" title="Galeri"><i class="fa fa-photo"></i> <span class="nav-label">Galeri</span> </a>
                    </li>
                    <li title="Slider">
                        <a href="slider.php" title="Slider"><i class="fa fa-photo"></i> <span class="nav-label">Slider</span> </a>
                    </li>
                    <li title="Site Ayarları">
                        <a href="siteSetting.php" title="Site Ayarları"><i class="fa fa-gear"></i> <span class="nav-label">Site
                                Ayarları</span></a>
                    </li>
                    <li title="Menüler">
                        <a href="menus.php" title="Menüler"><i class="fa fa-list"></i> <span class="nav-label">Menüler</span></a>

                    </li>
                    <li title="Sayfalar">
                        <a href="pages.php" title="Sayfalar"><i class="fa fa-file"></i> <span class="nav-label">Sayfalar</span></a>

                    </li>
                    <li title="Siteye Git">
                        <a href="../ana-sayfa" target="_blank" title="Siteye Git"><i class="fa fa-sign-out"></i> <span
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
                        <!-- <form role="search" class="navbar-form-custom" action="search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="Search for something..." class="form-control"
                                    name="top-search" id="top-search">
                            </div>
                        </form> -->
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                    <?php
                                    $messages=$db->query("SELECT * FROM messages WHERE seen=0 ORDER BY Id DESC")->fetchAll(); 
                                    $comments=$db->query("SELECT * FROM comment  WHERE status=0 ORDER BY id DESC")->fetchAll();
                    ?>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-envelope"></i> <?php if(count($messages)!=0) {?><span class="label label-warning"><?php echo count($messages) ?></span><?php } ?>
                            </a>
                            <ul class="dropdown-menu dropdown-messages dropdown-menu-right">

                            <?php if (isset($messages)) {
                               foreach ($messages as $value) {?>
                               
                              
                                <li>
                                    <div class="dropdown-messages-box">
                                        <!-- <a class="dropdown-item float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle" src="img/a7.jpg">
                                        </a> -->
                                        <div class="media-body border">
                                            <small class="float-right"><?= substr($value['create_date'],11,5 )?></small>
                                           Ad-Soyad : <strong><?= $value['name'] ?></strong><br>
                                           Email : <strong><?= $value['sender'] ?></strong><br>
                                           Konu : <strong><?= $value['subject'] ?></strong>
                                            <small class="float-right"><?= substr($value['create_date'],0,10) ?></small>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <?php }
                            } ?>
                          
                                <li>
                                    <div class="text-center link-block">
                                        <a href="messages.php" class="dropdown-item">
                                            <i class="fa fa-envelope"></i> <strong>Tüm Mesajlar</strong>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-comment"></i> <?php if(count($comments)!=0) {?><span class="label label-primary"><?php echo count($comments) ?></span><?php } ?>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                            <?php if (isset($comments)) {
                               foreach ($comments as $comment) {?>
                                <li>
                                    <a href="../comment.php?photo=<?=$comment['photoId']?>" target="_blank" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-comment"></i> <?=$comment['name']?>
                                            <span class="float-right text-muted small"><?=$comment['create_date']?></span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <?php }
                            } ?>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="index.php" class="dropdown-item">
                                            <strong>Tüm Yorumler</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>


                        <li>
                            <a href="login.php">
                                <i class="fa fa-sign-out"></i> Çıkış Yap
                            </a>
                        </li>

                    </ul>

                </nav>