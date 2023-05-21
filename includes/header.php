<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<?php
ob_start();
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
    <style>
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
        
      

 

        
       
    </style>
</head>

<body>
    <!--header-->
    <header id="site-header" class="fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg stroke">
                <h1>
                    <a class="navbar-brand" href="index.html">
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
                    <div class="search-container">
                        <form action="/search" method="get">
                            <input class="search expandright" id="searchright" type="search" name="q"
                                placeholder="Search">
                            <label class="button searchbutton" for="searchright"><i class="fas fa-search"></i></label>
                        </form>
                    </div>
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