<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<?php
error_reporting(0);
ob_start();
session_start();
require 'database/db_conn.php';

?>
<!doctype html>
<html lang="tr">

<head>
    <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php
    if (isset($_GET['page'])) {
        $page_slug = $_GET['page'];

        $site_settings = $db->query("SELECT * FROM pages WHERE slug='$page_slug'", PDO::FETCH_ASSOC);
    }
    foreach ($site_settings as $value) { ?>
    
    
        <title><?= $value['seoTitle']; ?></title>
        <meta name="description" content="<?= $value['seoDescription'] ?>">
        <meta name="keywords" content="<?= $value['seoKeyword'] ?>">
    
        <meta property="og:title" content="<?= $value['seoTitle']; ?>" />
        <meta property="og:description" content="<?= $value['seoDescription'] ?>" />
        <link rel="canonical" href="http://localhost/portfolio/<?= $value['slug'] ?>" />
    <?php } ?>
    <meta property="og:image" content="favicon.png" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="" />
 
    
    <meta name="robots" content="index,follow"/><meta name="googlebot" content="index,follow"/>
    <meta name="author" content="Yasin Yilmaz">
    <!-- google-fonts -->
    <link href="//fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800;900&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- //google-fonts -->
    <!-- Template CSS Style link -->
    <link rel="stylesheet" href="front/assets/css/style-starter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- chosen-select -->
    <link href="admin/back/css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
       <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.css">

  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
<!-- sweet alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style>
        /*swiper start */
    
    .swiper {
      width: 100%;
      height: 100%;
    }

    .swiper-slide {
      background-position: center;
      background-size: cover;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
    }
    /*swiper end */
        
        * {
        box-sizing: border-box;
        }

        .header {
        text-align: center;
        padding: 32px;
        }

        .photos {
        display: -ms-flexbox; /* IE10 */
        display: flex;
        -ms-flex-wrap: wrap; /* IE10 */
        flex-wrap: wrap;
        padding: 0 4px;
        }

        /* Create four equal columns that sits next to each other */
        .column {
        -ms-flex: 25%; /* IE10 */
        flex: 25%;
        max-width: 25%;
        padding: 0 4px;
        }

        .column img {
        margin-top: 8px;
        vertical-align: middle;
        width: 100%;
        }


        @media screen and (max-width: 992px) {
            #categories {
                margin-bottom: 20px;
            }
            }

        /* Responsive layout - makes a two column-layout instead of four columns */
            @media screen and (max-width: 800px) {
            .column {
                -ms-flex: 50%;
                flex: 50%;
                max-width: 50%;
            }
            }

            /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
            @media screen and (max-width: 600px) {
            .column {
                -ms-flex: 100%;
                flex: 100%;
                max-width: 100%;
            }
            }


        .about-single{
            width: 400px;
            height: 170px;
        }
        .owl-dots{
            display: none;
        }

        .w3l-content-4 .content4-icon.icon-clr1 {
            opacity: 1;
            background: rgb(253 92 99 / 100%);
        }
        .w3l-content-4 .content4-icon.icon-clr2 {
            opacity: 1;
            background: rgb(255 200 69 / 100%);
        }
        .w3l-content-4 .content4-icon.icon-clr3 {
            opacity: 1;
            background: rgb(57 195 164 / 100%);
        }
        
      
    .lb-details{
    margin: 1rem auto 0px auto !important; 
    float: none !important;
}
 
@media screen and (max-width: 992px) {
  .about-single .about-icon  {
    display: none;
  }

  .about-content p{
 word-wrap: break-word;
  }
}
        
       
    </style>
</head>

<body>
    <!--header-->
    <header id="site-header" class="fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg stroke">
                <h1>
                    <a class="navbar-brand" href="ana-sayfa">
                        Phot<i class="fas fa-camera"></i>genic
                    </a>
                </h1>
                <!-- if logo is image enable this   
    <a class="navbar-brand" href="#index.html">
        <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
    </a> -->
                <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
                    data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                    <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav mx-lg-auto">
                        <?php
                        $menus=$db->query("SELECT * FROM menus WHERE position='Header'",PDO::FETCH_ASSOC);
                        ?>
                        <?php foreach ($menus as $value) { ?>

                       
                        <li class="nav-item ">
                            <a class="nav-link" href="http://localhost/portfolio/<?= $value['slug'] ?>"><?= $value['menuName'] ?> <span class="sr-only">(current)</span></a>
                        </li>
                       
                        <?php } ?>
                    </ul>
                </div>
                <!-- search button -->
                <div class="search-right ml-lg-3">
                            <?php
                            if (isset($_POST['logout'])) {
                              session_destroy();
                              header('Refresh:0;');
                            }
                            ?>
                          <?php if(!isset($_SESSION['name'])){?>
                            
                             <button type="button" name="login" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModalLong">Giriş Yap</button>
                           
                          <?php } ?>
                          <?php if(isset($_SESSION['name'])){?>
                            <form action="" method="post">
                            <button type="submit" name="logout" class="btn btn-outline-primary" >Çıkış Yap</button>
                            </form>
                            <?php } ?>
                </div>
                <!-- //search button -->
                <!-- toggle switch for light and dark theme -->
                <div class="cont-ser-position">
                    <nav class="navigation">
                        <div class="theme-switch-wrapper">
                            <label class="theme-switch" for="checkbox">
                                <input type="checkbox" id="checkbox">
                                <div class="mode-container">
                                    <i class="gg-sun"></i>
                                    <i class="gg-moon"></i>
                                </div>
                            </label>
                        </div>
                    </nav>
                </div>
                <!-- //toggle switch for light and dark theme -->
            </nav>
        </div>
    </header>
    <!--//header-->
<?php
if (isset($_POST['user_register'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
 $password = $_POST['password'];
 $swal = 'swal';

 if (!$name) {

  echo '<script>' . $swal . '("Adınızı girin !", "", "error");</script>';

} elseif (!preg_match("/^[a-zA-ZŞşÇçİÜüĞğÖöı ']*$/", $name)) {

  echo '<script>' . $swal . '(" Ad sadece harflerden oluşabilir !", "", "error");</script>';

}elseif (!$email) {
  echo '<script>' . $swal . '("E-posta adresinizi girin !", "", "error");</script>';
}elseif (!preg_match('/^\\S+@\\S+\\.\\S+$/', $email)) {
  echo '<script>' . $swal . '("E-posta adresinizi doğru girin !", "", "error");</script>';
}elseif (!$password || strlen($password) < 8) {

  echo '<script>' . $swal . '("Lütfen şifrenizi girin en az 8 karakter olmalı !", "", "error");</script>';

}else {

  $query = $db->prepare('INSERT INTO users SET name = ?, email = ? ,password = ?');
  $save = $query->execute([$name,$email,md5($password)]);

  if ($save) {
     
    echo '<script>' . $swal . '("Kayıt İşlemi Başarılı !", "Aramıza Hoşgelidiniz", "success");</script>';
    header('Refresh:2;');

  } else {
    echo '<script>' . $swal . '("Lütfen bilgilerinizi kontrol edip tekrar deneyin !", "", "error");</script>';
  }
}

}


if (isset($_POST['user_login'])) {
 $email = $_POST['email'];
 $password = $_POST['password'];
 $swal = 'swal';
 if (!$email) {
     echo '<script>' . $swal . '("E-posta adresinizi girin !", "", "error");</script>';
   }elseif (!preg_match('/^\\S+@\\S+\\.\\S+$/', $email)) {
     echo '<script>' . $swal . '("E-posta adresinizi doğru girin !", "", "error");</script>';
   }elseif (!$password || strlen($password) < 8) {
 
     echo '<script>' . $swal . '("Şifrenizi eksik girdiniz en az 8 karakter olmalı !", "", "error");</script>';
 
   }else {
     $query = $db->prepare('SELECT * FROM users WHERE email = ? and password = ?');
    $query->execute([$email,md5($password)]);

    $admin_exist = $query->rowCount();

     if ($admin_exist == 1) {
     $_SESSION['name'] = $email;
      
     echo '<script>' . $swal . '("Giriş İşlemi Başarılı !", "", "success");</script>';
     header('Refresh:2;');

     } else {
     echo '<script>' . $swal . '("Lütfen bilgilerinizi kontrol edip tekrar deneyin !", "", "error");</script>';
     }
   }

}

?>


<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLongTitle">Giriş Yap</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
        <form action="" method="POST">
       <label for="email">E-mail :</label>
       <input type="text" name="email" id="email" class="form-control mb-1">
       <label for="sifre">Şifre :</label>
       <input type="password" name="password" id="sifre" class="form-control">
       <button type="submit" name="user_login" class="btn btn-success mt-2">Giriş Yap</button>
        </form>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button> -->
        <small>Bir hesabın yoksa </small><button type="button" data-toggle="modal" data-target="#exampleModalLong2" class="btn btn-primary">Kayıt Ol</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModalLong2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLong2Title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLong2Title">Kayıt Ol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
        <form action="" method="POST">
        <label for="name">Ad-Soyad :</label>
       <input type="text" name="name" id="name" class="form-control mb-1">
       <label for="email">E-mail :</label>
       <input type="text" name="email" id="email" class="form-control mb-1">
       <label for="sifre">Şifre :</label>
       <input type="password" name="password" id="sifre" class="form-control">
       <button type="submit" name="user_register" class="btn btn-success mt-2">Kayıt Ol</button>
        </form>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button> -->
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
      </div>
    </div>
  </div>
</div>
