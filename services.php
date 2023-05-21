<?php
  $pageService = $db->query("SELECT * FROM pages WHERE slug='hizmetler'", PDO::FETCH_ASSOC);
  $pageServiceContent = $db->query("SELECT * FROM pages WHERE slug='hizmetler'", PDO::FETCH_ASSOC);
  $pageServiceBanner = $db->query("SELECT * FROM pages WHERE slug='hizmetler'", PDO::FETCH_ASSOC);

  $services = $db->query("SELECT * FROM services ", PDO::FETCH_ASSOC);
  $talents = $db->query("SELECT * FROM talent ")->fetchAll();
?>
 <!-- inner banner -->
 <section class="inner-banner py-5"  style="background: url('../../public/uploads/<?php  foreach ($pageServiceBanner as $serviceBanner){ echo $serviceBanner['banner'];} ?>') no-repeat center;background-size: cover;">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-sm-5 pt-4 pb-sm-4">
                <h4 class="inner-text-title font-weight-bold pt-5">Hizmetler</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="ana-sayfa">Ana Sayfa</a></li>
                    <li class="active"><span class="fa fa-chevron-right mx-2" aria-hidden="true"></span>Hizmetler</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- //inner banner -->

    <!-- service section -->
    <section class="w3l-servicesblock py-5">
        <div class="container py-md-5 py-4">
            <div class="row pb-lg-4">
                <div class="col-lg-6 w3l-progress align-self pr-lg-5">
                    <h3 class="title-style mb-5">A high quality and best photography</h3>
                
                    <?php
                 shuffle($talents);
                 $randomTalents=array_slice($talents,0,4);
                    foreach ($randomTalents as  $talentScore) { ?>                 
                    <div class="progress-info info<?=$talentScore['id']?>">
                        <h6 class="progress-tittle"><?=$talentScore['talentName']?> <span class="float-right"><?=$talentScore['talentScore']?>%</span></h6>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped gradient-<?=$talentScore['id']?>" role="progressbar"
                                style="width: <?=$talentScore['talentScore']?>%;color:yellow;background-color: blue;background-image: linear-gradient(-224deg, red,<?=$talentScore['talentColor']?>);" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                    
                    <?php  } ?>
                </div>
                <?php $servicesphoto= $db->query("SELECT * FROM servicesPhoto", PDO::FETCH_ASSOC); 
                foreach($servicesphoto as $simg){?>

             
                <div class="col-lg-6 left-wthree-img mt-lg-0 mt-5">
                    <img src="../../public/uploads/<?=$simg['imageR']?>" alt="fotoğraf yok" class="img-fluid">
                </div>
            </div>
            <div class="row mt-5 pt-lg-5">
                <div class="col-lg-6 left-wthree-img mt-lg-0 mt-5 order-lg-first order-last">
                    <img src="../../public/uploads/<?=$simg['imageL']?>" alt="fotoğraf yok" class="img-fluid">
                </div>
                <?php  } ?>
                <div class="col-lg-6 about-right-faq align-self pl-lg-5 order-lg-last order-first">
                    <!-- <h3 class="title-style mb-4">Making world a better place</h3>
                    <p>Lorem ipsum viverra feugiat. Tesque libero ut justo,
                        ultrices in ligula. Semper at tempufddfel. Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Excepteur sint occaecat cupidatat non proident, sunt in culpa</p>
                    <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Excepteur sint occaecat cupidatat non proident, sunt in culpa</p> -->

                        <?php foreach ($pageServiceContent as $serviceContent) {?>
                            <?= $serviceContent['shortDescription']?>
                        <?php }?>

                    <a class="btn btn-style btn-style-primary mt-lg-5 mt-4" href="hakkimda">Daha Fazlası </a>
                </div>
            </div>
        </div>
    </section>
    <!-- //service section -->

    <!-- /service page -->
    <section class="w3l-bottom-grids-6 py-5">
        <div class="container py-lg-5 py-md-4">
            <div class="title-heading-w3 text-center mx-auto mb-sm-5 mb-4" style="max-width:700px">
            <?php foreach ($pageService as $pageValue) {?>
                
            
                <!-- <h3 class="title-style">We Provide best services</h3> -->
                <p class="lead mt-2"><?= $pageValue['content'] ?></p>
                    <?php } ?>
            </div>
            <div class="grids-area-hny main-cont-wthree-fea row">
                <?php foreach ($services as $value) { ?>
                    
               
                <div class="col-lg-4 col-md-6 grids-feature mb-3">
                    <div class="area-box">
                       <i> <img src="../../public/uploads/<?= $value['serviceImg'] ?>"  alt="Fotoğraf yok"></i>
                        <h4><a href="#feature" class="title-head"><?= $value['serviceName'] ?></a></h4>
                        <?= $value['serviceDescription'] ?>
                        <!-- <a href="#url" class="more">Read More </a> -->
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- //service page -->

    <!-- content with buttons -->
    <!-- <section class="services-2 py-5">
        <div class="container py-md-5 py-4 text-center">
            <div class="header-section text-center mx-auto" style="max-width:700px">
                <h3 class="title-style mb-3">have you ready to click your beatifull Photography? </h3>
                <p> Estibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                    Nulla mollis dapibus nunc, ut rhoncus
                    turpis sodales quis. Integer sit amet mattis quam.</p>
            </div>
            <div class="buttons mt-5">
                <a href="contact.html" class="btn btn-style btn-style-primary mr-2">Book Now</a>
                <a href="contact.html" class="btn btn-style btn-style-primary-2">Get Started</a>
            </div>
        </div>
    </section> -->
    <!-- //content with buttons -->
