<!-- inner banner -->
<?php
error_reporting(0);
  $pageAbout = $db->query("SELECT * FROM pages WHERE slug='hakkimda'", PDO::FETCH_ASSOC);
  $pageAboutBanner = $db->query("SELECT * FROM pages WHERE slug='hakkimda'", PDO::FETCH_ASSOC);
 $aboutus = $db->query("SELECT * FROM aboutus  LIMIT 1", PDO::FETCH_ASSOC);
?>
<section class="inner-banner py-5" style="background: url('../../public/uploads/<?php  foreach ($pageAboutBanner as $aboutBanner){ echo $aboutBanner['banner'];} ?>') no-repeat center;background-size: cover;">
    <div class="w3l-breadcrumb py-lg-5">
        <div class="container pt-sm-5 pt-4 pb-sm-4">
            <h4 class="inner-text-title font-weight-bold pt-5">Hakkımda</h4>
            <ul class="breadcrumbs-custom-path">
                <li><a href="ana-sayfa">Ana Sayfa</a></li>
                <li class="active"><span class="fa fa-chevron-right mx-2" aria-hidden="true"></span>Hakkımda</li>
            </ul>
        </div>
    </div>
</section>
<!-- //inner banner -->

<!-- about section -->
<section class="w3l-about py-5">
    <div class="container py-md-5 py-4">
        <div class="row align-items-center">
           



                <div class="col-lg-6 pr-lg-5">
                <?php
          
            foreach ($pageAbout as $value) { ?>
                    <!-- <h3 class="title-style mb-sm-3 mb-2">Birkaç Kelimede Hakkımda</h3> -->
                    <p> <?=$value['content']?></p>
                    <!-- <ul class="list-about-2 mt-sm-4 mt-3">
                        <li class="py-1"><i class="far fa-check-square mr-2"></i>Ut enim ad minim
                            veniam</li>
                        <li class="py-2"><i class="far fa-check-square mr-2"></i>Quis nostrud
                            exercitation
                            ullamco
                            laboris</li>
                        <li class="py-1"><i class="far fa-check-square mr-2"></i>Nisi ut aliquip ex
                            ea commodo
                            consequat</li>
                    </ul> -->
                    <?php }
            ?>
                    <a class="btn btn-style btn-style-primary-2 mt-lg-5 mt-4" href="hizmetler">Hizmetlerimiz</a>
                </div>
                <div class="col-lg-6 mt-lg-0 mt-5">
                <?php        
            foreach ($aboutus as $about) { ?>
                    <img src="../../public/uploads/<?=$about['rightImg']?>" alt="Fotoğraf bulunamadı" width="640" height="540" class="img-fluid" />
                    <?php }
            ?>
                </div>
           
        </div>
        <!-- <div class="owl-carousel row mt-5 pt-lg-5 pt-sm-2 ">
        <?php
            $talent = $db->query("SELECT * FROM services ORDER BY id DESC ", PDO::FETCH_ASSOC);
            foreach ($talent as $value) { ?>
            <div class="col-lg-4 col-md-6 ">
                <div class="about-single p-md-3 d-flex justify-content-between">
                    <div class="about-icon mr-4">
                        <i class=" fas fa-video"></i>
                    </div>
                    <div class="about-content">
                        <h5 class="mb-3"><?=$value['talentName']?></h5>
                        <p><?=$value['talentContent']?></p>
                    </div>
                </div>
            </div>
           
            <?php } ?>
        </div> -->
        <div class="row mt-5 pt-lg-5 pt-sm-2">
        <?php
            $services = $db->query("SELECT * FROM talent  ORDER BY RAND() LIMIT 3", PDO::FETCH_ASSOC);
            foreach ($services as $value) { ?>
                <div class="col-lg-4 col-md-6">
                    <div class="about-single p-md-3 d-flex justify-content-between">
                        <div class="about-icon w-25 mr-2">
                            <i class="fas fa-star w-25"></i>
                        </div>
                        <div class="about-content">
                            <h5 class="mb-3"><?=$value['talentName']?></h5>
                            <?=$value['talentContent']?>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
    </div>
</section>
<!-- //about section -->

<!-- features section -->
<section class="w3l-content-4 py-5" id="features">
    <div class="container py-md-5 py-4">
        <div class="content-info-in row align-items-center">
            <?php 
             $aboutuscontent = $db->query("SELECT * FROM aboutus WHERE id ORDER BY id DESC LIMIT 1", PDO::FETCH_ASSOC);
            foreach ($aboutuscontent as $value) { ?>
        <div class="content-right col-lg-6 mt-lg-0 mt-5 mb-5">
                <img src="../../public/uploads/<?=$value['leftImg']?>" alt="fotoğraf yok" width="640" height="540" class="img-fluid" />
            </div>
            <div class="content-left col-lg-6 pl-lg-5">
                <div class="row content4-right-grids mb-sm-5 mb-4 pb-3">
                    <div class="col-2 content4-right-icon">
                        <div class="content4-icon icon-clr1 justify-content-center">
                            <img src="../../public/uploads/<?=$value['content1Img']?>" alt="fotoğraf yok" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-10 content4-right-info pl-lg-5">
                        <!-- <h6><a href="#url">A high quality photography</a></h6> -->
                        <?=$value['aboutContent1']?>
                    </div>
                </div>
                <div class="row content4-right-grids mb-sm-5 mb-4 pb-3">
                    <div class="col-2 content4-right-icon">
                        <div class="content4-icon icon-clr2 justify-content-center">
                       <img src="../../public/uploads/<?=$value['content2Img']?>" alt="fotoğraf yok" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-10 content4-right-info pl-lg-5">
                        <!-- <h6><a href="#url">With experience comes trust</a></h6> -->
                        <?=$value['aboutContent2']?>
                    </div>
                </div>
                <div class="row content4-right-grids">
                    <div class="col-2 content4-right-icon">
                        <div class="content4-icon icon-clr3 justify-content-center">
                        <img src="../../public/uploads/<?=$value['content3Img']?>" alt="fotoğraf yok" class="img-fluid" >
                        </div>
                    </div>
                    <div class="col-10 content4-right-info pl-lg-5">
                        <!-- <h6><a href="#url">Making world a better place</a></h6> -->
                        <?=$value['aboutContent3']?>
                    </div>
                </div>
            </div>
           <?php } ?>
        </div>
    </div>
</section>
<!-- //features section -->

<!-- team section -->
<!-- <div class="team-area py-5" id="team">
    <div class="container py-lg-5 py-md-4 py-2">
        <div class="title-heading-w3 text-center mx-auto mb-sm-5 mb-4" style="max-width:700px">
            <h3 class="title-style">Amazing Photographers</h3>
            <p class="lead mt-2">Nostrud exercitation ullamco laboris nisi
                ut aliquip ex ea commodo consequat sunt in culpa qui official.</p>
        </div>
        <div class="row mt-lg-5 mt-4 justify-content-center">
            
            
           
            <div class="col-lg-3 col-sm-6 col-xs-12 mt-lg-0 mt-5">
                <div class="single-team">
                    <div class="img-area">
                        <img src="front/assets/images/team4.jpg" class="img-fluid radius-image" alt="">
                        <div class="social">
                            <ul class="list-inline">
                                <li><a href="#url"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#url"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#url"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="img-text">
                        <h4>Robert Branson</h4>
                        <p>Subtitle goes here</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- //team section -->

<!-- content with bg -->
<?php 
 $aboutusSection = $db->query("SELECT * FROM aboutus WHERE id ORDER BY id DESC LIMIT 1", PDO::FETCH_ASSOC);
foreach ($aboutusSection as $value) { ?>
<section class="w3l-content-bg" style="background: url('../../public/uploads/<?php   echo $value['sectionImg'];?>') no-repeat center fixed;">
    <div class="container py-md-5 py-4">
        <div class="row py-5">
            <div class="col-md-7">
                <div class="left-content-bg">
                    <p class="text-tag"></p>
                    <h4 class="text-head-content"><?= $value['sectionTitle'] ?></h4>
                    <a class="btn btn-style mt-4" href="ana-sayfa">Fotoğraflarımı İncele</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>
<!-- //content with bg -->

<!-- testimonial section -->
<section id="testimonial-area" class="pt-5">
    <div class="container pt-md-5 pt-4">
        <div class="title-heading-w3 text-center mx-auto mb-sm-5 mb-4" style="max-width:700px">
            <h3 class="title-style">Yorumlar</h3>
            <p class="lead mt-2"></p>
        </div>
        <div class="testi-wrap">
            

            <?php    $comments = $db->query("SELECT * FROM comment WHERE status='1' ORDER BY id ASC Limit 7")->fetchAll();
                
                $randomComments=array_slice($comments,0,7);
                $randomComments1=array_slice($comments,1,7);
                   foreach ($randomComments as  $comment) { ?> 
               <div class="client-single active position-<?=$comment['id']?>" data-position="position-<?=$comment['id']?>">
                   <div class="client-img">
                       <img src="front/assets/images/user.jpg" alt="" />
                   </div>
                   <div class="client-info">
                       <h3><?=$comment['name']?></h3>
                       <p><?=$comment['email']?></p>
                   </div>
                   <div class="client-comment">
                       <h3><?=$comment['message']?>. </h3>
                       <img src="front/assets/images/quote.png" alt="" />
                   </div>
               </div>
              
               <?php  break; } ?>

             <?php  foreach ($randomComments1 as  $comment) { ?> 
               <div class="client-single inactive position-<?=$comment['id']?>" data-position="position-<?=$comment['id']?>">
                   <div class="client-img">
                       <img src="front/assets/images/user.jpg" alt="" />
                   </div>
                   <div class="client-info">
                       <h3><?=$comment['name']?></h3>
                       <p><?=$comment['email']?></p>
                   </div>
                   <div class="client-comment">
                       <h3><?=$comment['message']?>. </h3>
                       <img src="front/assets/images/quote.png" alt="" />
                   </div>
               </div>
              
               <?php } ?>

          
            
           
       

        </div>
    </div>
</section>
<!-- //testimonial section -->