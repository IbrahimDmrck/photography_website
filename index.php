

    <!-- banner section -->
    <div class="slider-container">
        <div class="left-slide">
            <div style="background-color: #242424">
                <h3 class="mt-5 mb-3">Best Photo Studio</h3>
                <h4>A high quality photography</h4>
                <p class="mt-4">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                    commodo.</p>
                <a href="about.html" class="btn btn-style mt-5">Read More</a>
            </div>
        </div>
        <div class="right-slide">
        <div class=" swiper mySwiper swiper-fade swiper-initialized swiper-horizontal swiper-watch-progress swiper-backface-hidden">
    <div class="swiper-wrapper" id="swiper-wrapper-a50fc51f996a5fda" aria-live="polite" style="transition-duration: 0ms;">
    <?php  $sliders = $db->query("SELECT * FROM sliders ")->fetchAll();


 foreach ($sliders as  $value) {?>
      <div class="swiper-slide" style="width: 1366px; opacity: 1; transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;" role="group" aria-label="1 / 4">
        <img src="../../public/uploads/<?=$value['slide']?>" class="img-fluid rounded-0">
      </div>
  <?php } ?>
      
     
    </div>
    <div class="swiper-button-next swiper-button-disabled" tabindex="-1" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-a50fc51f996a5fda" aria-disabled="true"></div>
    <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-a50fc51f996a5fda" aria-disabled="false"></div>
    <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal"><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 4" aria-current="true"></span></div>
  <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
</div>
      
        </div>
    </div>
    <!-- //banner section -->

    <!-- gallery section -->
    <section class="w3l-gallery py-2" id="gallery">
        <div class="container-fluid py-md-2 py-2">
            <div class="header title-heading-w3 text-center mx-auto mb-sm-2 mb-2" style="max-width:700px">
                 <h4 class="title-style mb-5">Fotoğraf Ara</h4>
                <!--<p class="lead mt-2">Nostrud exercitation ullamco laboris nisi
                    ut aliquip ex ea commodo consequat sunt in culpa qui official.</p> -->
                   <?php  $categories = $db->query("SELECT * FROM categories", PDO::FETCH_ASSOC); 
                   
                 
                   ?>
                    <form action="" method="POST">
                        <div class="row form-group">
                    <label class="font-normal col-3"><b>Kategori Seçin</b></label>

                      <div  class="col-lg-6 mb-3">
                      <select name="categories[]"  multiple="multiple" data-placeholder="Lütfen en az bir kategori seçiniz">
                            <?php if (isset($categories)) {
                                foreach ($categories as $categoryValue) { ?>


                                    <option value="<?= $categoryValue['name'] ?>">
                                        <?= $categoryValue['name'] ?>
                                    </option>

                                <?php }
                            } ?>
                      </select>
                      </div>
                      
                        <button name="filtre" class="btn btn-outline-primary col-lg-3" type="submit">Listele</button>
                        </div>
                       
                    </form>
            </div>
            <a href="" class="btn btn-lg btn-primary" <?php if(!isset($_POST['filtre'])){echo 'hidden';} ?> >Geri Dön</a>
            <div class="photos" <?php if(isset($_POST['filtre'])){ echo "hidden"; } ?>>
                                  
                <div class="column">
                <?php  $photos = $db->query("SELECT * FROM photos ORDER BY view_count DESC")->fetchAll();

               // shuffle($photos);
                $randomPhotos1=array_slice($photos,0,5);
                $randomPhotos2=array_slice($photos,5,5);
                $randomPhotos3=array_slice($photos,10,5);
                $randomPhotos4=array_slice($photos,15,5);
                foreach ($randomPhotos1 as  $value) {?>
                    <div class=" item">
                        
                        <a href="../../public/uploads/<?=$value['photoName']?>" data-lightbox="example-set" data-title="<a href='comment.php?photo=<?=$value['id']?>'  class='text-white  w-100  btn btn-success'>Yorum Yap</a>"
                            class="zoom d-block">
                            <img class="" src="../../public/uploads/<?=$value['photoName']?>" alt="Fotoğraf yok" style="width:100%">
                            <span class="overlay__hover"></span>
                            <span class="hover-content">
                                <span class="title"><?=$value['name']?></span>
                                <span class="content"><?=$value['categories']?></span>
                                <span class="content"><i class="fas fa-eye pl-3 pr-3 pt-2"></i><?=$value['view_count']?></span>
                            </span>
                        </a>
                    </div>

                    <?php }?>
                </div>

                    
                <div class="column">
                 <?php     
                foreach ($randomPhotos2 as  $value) {?>
                    <div class=" item">
                        <a href="../../public/uploads/<?=$value['photoName']?>" data-lightbox="example-set" data-title="<a href='comment.php?photo=<?=$value['id']?>'  class='text-white  w-100  btn btn-success'>Yorum Yap</a>"
                            class="zoom d-block">
                            <img class="" src="../../public/uploads/<?=$value['photoName']?>" alt="Fotoğraf yok" style="width:100%">
                            <span class="overlay__hover"></span>
                            <span class="hover-content">
                                <span class="title"><?=$value['name']?></span>
                                <span class="content"><?=$value['categories']?></span>
                                <span class="content"><i class="fas fa-eye pl-3 pr-3 pt-2"></i><?=$value['view_count']?></span>
                            </span>
                        </a>
                    </div>

                    <?php }?>
                </div>

                    

                <div class="column">
                <?php  
               
                foreach ($randomPhotos3 as  $value) {?>
                    <div class=" item">
                        <a href="../../public/uploads/<?=$value['photoName']?>" data-lightbox="example-set" data-title="<a href='comment.php?photo=<?=$value['id']?>'  class='text-white  w-100  btn btn-success'>Yorum Yap</a>"
                            class="zoom d-block">
                            <img class="" src="../../public/uploads/<?=$value['photoName']?>" alt="Fotoğraf yok" style="width:100%">
                            <span class="overlay__hover"></span>
                            <span class="hover-content">
                                <span class="title"><?=$value['name']?></span>
                                <span class="content"><?=$value['categories']?></span>
                                <span class="content"><i class="fas fa-eye pl-3 pr-3 pt-2"></i><?=$value['view_count']?></span>
                            </span>
                        </a>
                    </div>

                    <?php }?>
                </div>

                
                
                
                <div class="column">
                <?php  
                    foreach ($randomPhotos4 as  $value) {?>
                    <div class=" item">
                        <a href="../../public/uploads/<?=$value['photoName']?>" data-lightbox="example-set" data-title="<a href='comment.php?photo=<?=$value['id']?>'  class='text-white  w-100  btn btn-success'>Yorum Yap</a>"
                            class="zoom d-block">
                            <img class="" src="../../public/uploads/<?=$value['photoName']?>" alt="Fotoğraf yok" style="width:100%">
                            <span class="overlay__hover"></span>
                            <span class="hover-content">
                                <span class="title"><?=$value['name']?></span>
                                <span class="content"><?=$value['categories']?></span>
                                <span class="content"><i class="fas fa-eye pl-3 pr-3 pt-2"></i><?=$value['view_count']?></span>
                            </span>
                        </a>
                    </div>

                    <?php }?>
                </div>

   
            </div>
                       <?php
                        if (isset($_POST['filtre'])) {
                            $categories = $_POST['categories'];
                            $ctg="";

                            foreach ($categories as $value) {
                                $ctg .= $value . ',';
                            }
                            if (!$categories) {
                               echo "<script>alert('Lütfen en az bir kategori seçiniz')</script>";
                            }else{
                                   $filterPhoto = $db->query("SELECT * FROM photos WHERE categories LIKE '%$ctg%' ORDER BY view_count DESC")->fetchAll();
                                   
                            }
                           
                        }
                        
                      ?>
                <!-- filtreleme sonuçları -->
            <div class="photos" <?php if(!isset($_POST['filtre'])){ echo "hidden"; } ?>>
                                  
                <?php

                foreach ($filterPhoto as  $value) {
                   if (count($value)>0) {?>
              
                <div class="column">
                    <div class=" item">
                        <a href="../../public/uploads/<?=$value['photoName']?>" data-lightbox="example-set" data-title="<a href='comment.php?photo=<?=$value['id']?>'  class='text-white  w-100  btn btn-success'>Yorum Yap</a>"
                            class="zoom d-block">
                            <img class="" src="../../public/uploads/<?=$value['photoName']?>" alt="Fotoğraf yok" style="width:100%">
                            <span class="overlay__hover"></span>
                            <span class="hover-content">
                                <span class="title"><?=$value['name']?></span>
                                <!-- <span class="content"><?=$value['categories']?></span> -->
                                <span class="content"><i class="fas fa-eye pl-3 pr-3 pt-2"></i><?=$value['view_count']?></span>
                              
                            </span>
                        </a>
                    </div>
   
                </div>
                <?php  }else {
                   echo " <div class='title-style'>Armanızla eşleşen kayıt bulunamadı</div>";
                }}?>
   
            </div>
        </div>
    </section>
    <!-- //gallery section -->

    <!-- stats -->
    <section class="w3-stats pb-5" id="stats">
        <div class="container pb-md-5 pb-4">
            <div class="row text-center pt-lg-4">
                <?php $counter=$db->query("SELECT * FROM settings");
                foreach ($counter as $count) {?>
                    
                
                <div class="col-md-4 col-6">
                    <div class="counter">
                        <i class="far fa-smile-beam"></i>
                        <div class="timer count-title count-number mt-3" data-to="<?=$count['total_comment']?>" data-speed="1500"></div>
                        <p class="count-text">Toplam Yorum</p>
                    </div>
                </div>
                <div class="col-md-4 col-6">
                    <div class="counter">
                        <i class="fas fa-photo-video"></i>
                        <div class="timer count-title count-number mt-3" data-to="<?=$count['total_photo']?>" data-speed="1500"></div>
                        <p class="count-text">Toplam Fotoğraf Sayısı</p>
                    </div>
                </div>
                <div class="col-md-4 col-6 mt-md-0 mt-5">
                    <div class="counter">
                        <i class="fas fa-camera-retro"></i>
                        <div class="timer count-title count-number mt-3" data-to="<?=$count['total_category']?>" data-speed="1500"></div>
                        <p class="count-text">Toplam Kategori Sayısı</p>
                    </div>
                </div>

                <?php } ?>
            </div>
        </div>
    </section>
    <!-- //stats -->

    <!-- progress & faq section -->
    <section class="w3l-progress py-5" id="progress">
        <div class="container py-md-5 py-4">
            <div class="title-heading-w3 text-center mx-auto mb-sm-5 mb-4" style="max-width:700px">
            <?php  $pageService = $db->query("SELECT * FROM pages WHERE slug='hizmetler'", PDO::FETCH_ASSOC);
            foreach ($pageService as $serviceContent) {?>
                <?=$serviceContent['content']?>
            <?php } ?>
            </div>
            <div class="row pt-2">
                <div class="col-lg-6 w3l-faq">
                    <div class="faq-page">
                        <ul>
                        <?php
                      $services = $db->query("SELECT * FROM services")->fetchAll();
                 shuffle($services);
                 $randomServices=array_slice($services,0,4);
                    foreach ($randomServices as  $service) { ?> 
                            <li>
                                <input type="checkbox" checked>
                                <i></i>
                                <h2><?=$service['serviceName']?></h2>
                                <p><?=$service['serviceDescription']?></p>
                            </li>
                         
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 mt-lg-0 mt-5 pl-lg-5">

                      <?php
                      $talents = $db->query("SELECT * FROM talent ")->fetchAll();
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
            </div>
        </div>
    </section>
    <!-- //progress & faq section -->

    <!-- testimonial section -->
    <section id="testimonial-area" class="pt-5 pl-2 pr-2">
        <div class="container pt-md-5 pt-4">
            <div class="title-heading-w3 text-center mx-auto mb-sm-5 mb-4" style="max-width:700px">
                <h3 class="title-style">Yorumlarınız</h3>
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

    <!-- call section -->
    <section class="w3l-call-to-action-6 text-center py-5">
        <div class="container py-md-4 py-3">
            <div class="d-md-flex align-items-center justify-content-center">
                <h3 class="title-big">Looking for <span>Quality Photography?</span></h3>
                <a href="contact.html" class="btn btn-style ml-md-3 mt-md-0 mt-4">Contact Us</a>
            </div>
        </div>
    </section>
    <!-- //call section -->

   
 
