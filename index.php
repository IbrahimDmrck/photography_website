

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
        <div class="bg-image1"></div>
      
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
                    <label class="font-normal col-3" class="mt-3"><b>Kategori Seçin</b></label>

                      <div  class="col-lg-6">
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
                <?php  $photos = $db->query("SELECT * FROM photos ")->fetchAll();

                shuffle($photos);
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
                               
                            </span>
                        </a>
                    </div>
                    <!-- <div class="item mt-4">
                        <a href="front/assets/images/g2.jpg" data-lightbox="example-set" data-title="Project 2"
                            class="zoom d-block">
                            <img class="card-img-bottom d-block" src="front/assets/images/g2.jpg" alt="Card image cap">
                            <span class="overlay__hover"></span>
                            <span class="hover-content">
                                <span class="title">Wedding Photography</span>
                                <span class="content">Quisque ut lectus, eros et, sed commodo risus.</span>
                            </span>
                        </a>
                    </div> -->
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
                            </span>
                        </a>
                    </div>
                    <!-- <div class="item mt-4">
                        <a href="front/assets/images/g2.jpg" data-lightbox="example-set" data-title="Project 2"
                            class="zoom d-block">
                            <img class="card-img-bottom d-block" src="front/assets/images/g2.jpg" alt="Card image cap">
                            <span class="overlay__hover"></span>
                            <span class="hover-content">
                                <span class="title">Wedding Photography</span>
                                <span class="content">Quisque ut lectus, eros et, sed commodo risus.</span>
                            </span>
                        </a>
                    </div> -->
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
                            </span>
                        </a>
                    </div>
                    <!-- <div class="item mt-4">
                        <a href="front/assets/images/g2.jpg" data-lightbox="example-set" data-title="Project 2"
                            class="zoom d-block">
                            <img class="card-img-bottom d-block" src="front/assets/images/g2.jpg" alt="Card image cap">
                            <span class="overlay__hover"></span>
                            <span class="hover-content">
                                <span class="title">Wedding Photography</span>
                                <span class="content">Quisque ut lectus, eros et, sed commodo risus.</span>
                            </span>
                        </a>
                    </div> -->
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
                            </span>
                        </a>
                    </div>
                    <!-- <div class="item mt-4">
                        <a href="front/assets/images/g2.jpg" data-lightbox="example-set" data-title="Project 2"
                            class="zoom d-block">
                            <img class="card-img-bottom d-block" src="front/assets/images/g2.jpg" alt="Card image cap">
                            <span class="overlay__hover"></span>
                            <span class="hover-content">
                                <span class="title">Wedding Photography</span>
                                <span class="content">Quisque ut lectus, eros et, sed commodo risus.</span>
                            </span>
                        </a>
                    </div> -->
                    <?php }?>
                </div>

                <!-- <div class="col-lg-4 col-sm-6 mt-sm-0 mt-4">
                    <div class="item">
                        <a href="front/assets/images/g3.jpg" data-lightbox="example-set" data-title="Project 3"
                            class="zoom d-block">
                            <img class="card-img-bottom d-block" src="front/assets/images/g3.jpg" alt="Card image cap">
                            <span class="overlay__hover"></span>
                            <span class="hover-content">
                                <span class="title">Fashion Photography</span>
                                <span class="content">Quisque ut lectus, eros et, sed commodo risus.</span>
                            </span>
                        </a>
                    </div>
                </div> -->


                <!-- <div class="col-lg-4 mt-lg-0 mt-4">
                    <div class="row">
                        <div class="col-lg-12 col-sm-6 item">
                            <a href="front/assets/images/g5.jpg" data-lightbox="example-set" data-title="Project 4"
                                class="zoom d-block">
                                <img class="card-img-bottom d-block" src="front/assets/images/g5.jpg" alt="Card image cap">
                                <span class="overlay__hover"></span>
                                <span class="hover-content">
                                    <span class="title">Model Photography</span>
                                    <span class="content">Quisque ut lectus, eros et, sed commodo risus.</span>
                                </span>
                            </a>
                        </div>
                        <div class="col-lg-12 col-sm-6 item mt-lg-4 mt-sm-0 mt-4">
                            <a href="front/assets/images/g4.jpg" data-lightbox="example-set" data-title="Project 5"
                                class="zoom d-block">
                                <img class="card-img-bottom d-block" src="front/assets/images/g4.jpg" alt="Card image cap">
                                <span class="overlay__hover"></span>
                                <span class="hover-content">
                                    <span class="title">Photojournalism</span>
                                    <span class="content">Quisque ut lectus, eros et, sed commodo risus.</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div> -->
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
                                   $filterPhoto = $db->query("SELECT * FROM photos WHERE categories LIKE '%$ctg%'")->fetchAll();
                                   
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
                        <a href="../../public/uploads/<?=$value['photoName']?>" data-lightbox="example-set" data-title="<a href='comment.php?photo=<?=$value['id']?>' class='text-white fw-bol btn btn-outline-primary'>Yorum Yap</a>"
                            class="zoom d-block">
                            <img class="" src="../../public/uploads/<?=$value['photoName']?>" alt="Fotoğraf yok" style="width:100%">
                            <span class="overlay__hover"></span>
                            <span class="hover-content">
                                <span class="title"><?=$value['name']?></span>
                                <span class="content"><?=$value['categories']?></span>
                              
                            </span>
                        </a>
                    </div>
   
                </div>
                <?php  }else {
                   echo " <div class='title-style'>Armanızla eşleşen kayıt bulunamadı</div>";
                }}?>

                    
             

                    

               
                
                
                
             
                <!-- <div class="col-lg-4 col-sm-6 mt-sm-0 mt-4">
                    <div class="item">
                        <a href="front/assets/images/g3.jpg" data-lightbox="example-set" data-title="Project 3"
                            class="zoom d-block">
                            <img class="card-img-bottom d-block" src="front/assets/images/g3.jpg" alt="Card image cap">
                            <span class="overlay__hover"></span>
                            <span class="hover-content">
                                <span class="title">Fashion Photography</span>
                                <span class="content">Quisque ut lectus, eros et, sed commodo risus.</span>
                            </span>
                        </a>
                    </div>
                </div> -->


                <!-- <div class="col-lg-4 mt-lg-0 mt-4">
                    <div class="row">
                        <div class="col-lg-12 col-sm-6 item">
                            <a href="front/assets/images/g5.jpg" data-lightbox="example-set" data-title="Project 4"
                                class="zoom d-block">
                                <img class="card-img-bottom d-block" src="front/assets/images/g5.jpg" alt="Card image cap">
                                <span class="overlay__hover"></span>
                                <span class="hover-content">
                                    <span class="title">Model Photography</span>
                                    <span class="content">Quisque ut lectus, eros et, sed commodo risus.</span>
                                </span>
                            </a>
                        </div>
                        <div class="col-lg-12 col-sm-6 item mt-lg-4 mt-sm-0 mt-4">
                            <a href="front/assets/images/g4.jpg" data-lightbox="example-set" data-title="Project 5"
                                class="zoom d-block">
                                <img class="card-img-bottom d-block" src="front/assets/images/g4.jpg" alt="Card image cap">
                                <span class="overlay__hover"></span>
                                <span class="hover-content">
                                    <span class="title">Photojournalism</span>
                                    <span class="content">Quisque ut lectus, eros et, sed commodo risus.</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div> -->
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
                <!-- <div class="col-md-3 col-6 mt-md-0 mt-5">
                    <div class="counter">
                        <i class="fas fa-medal"></i>
                        <div class="timer count-title count-number mt-3" data-to="7630" data-speed="1500"></div>
                        <p class="count-text">Awards Won</p>
                    </div>
                </div> -->
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
                <!-- <h3 class="title-style">Frequently Asked Questions</h3>
                <p class="lead mt-2">Nostrud exercitation ullamco laboris nisi
                    ut aliquip ex ea commodo consequat sunt in culpa qui official.</p> -->
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
    <section id="testimonial-area" class="pt-5">
        <div class="container pt-md-5 pt-4">
            <div class="title-heading-w3 text-center mx-auto mb-sm-5 mb-4" style="max-width:700px">
                <h3 class="title-style">Yorumlarınız</h3>
                <p class="lead mt-2"></p>
            </div>
            <div class="testi-wrap">
                <?php    $comments = $db->query("SELECT * FROM comment WHERE status='1' ORDER BY RAND() Limit 7")->fetchAll();
                
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
                <!-- <div class="client-single inactive position-2" data-position="position-2">
                    <div class="client-img">
                        <img src="front/assets/images/testi2.jpg" alt="" />
                    </div>
                    <div class="client-info">
                        <h3>Olive Yew</h3>
                        <p>Subtitle goes here</p>
                    </div>
                    <div class="client-comment">
                        <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. </h3>
                        <img src="front/assets/images/quote.png" alt="" />
                    </div>
                </div> -->

                <!-- <div class="client-single inactive position-3" data-position="position-3">
                    <div class="client-img">
                        <img src="front/assets/images/testi1.jpg" alt="" />
                    </div>
                    <div class="client-info">
                        <h3>Maya Didas</h3>
                        <p>Subtitle goes here</p>
                    </div>
                    <div class="client-comment">
                        <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. </h3>
                        <img src="front/assets/images/quote.png" alt="" />
                    </div>
                </div> -->
<!-- 
                <div class="client-single inactive position-4" data-position="position-4">
                    <div class="client-img">
                        <img src="front/assets/images/testi3.jpg" alt="" />
                    </div>
                    <div class="client-info">
                        <h3>Brock Lee</h3>
                        <p>Subtitle goes here</p>
                    </div>
                    <div class="client-comment">
                        <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. </h3>
                        <img src="front/assets/images/quote.png" alt="" />
                    </div>
                </div> -->

                <!-- <div class="client-single inactive position-5" data-position="position-5">
                    <div class="client-img">
                        <img src="front/assets/images/testi5.jpg" alt="" />
                    </div>
                    <div class="client-info">
                        <h3>Shona Leer</h3>
                        <p>Subtitle goes here</p>
                    </div>
                    <div class="client-comment">
                        <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. </h3>
                        <img src="assets/images/quote.png" alt="" />
                    </div>
                </div> -->

                <!-- <div class="client-single inactive position-6" data-position="position-6">
                    <div class="client-img">
                        <img src="front/assets/images/testi6.jpg" alt="" />
                    </div>
                    <div class="client-info">
                        <h3>Dennis Lson</h3>
                        <p>Subtitle goes here</p>
                    </div>
                    <div class="client-comment">
                        <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. </h3>
                        <img src="front/assets/images/quote.png" alt="" />
                    </div>
                </div> -->

                <!-- <div class="client-single inactive position-7" data-position="position-7">
                    <div class="client-img">
                        <img src="front/assets/images/testi7.jpg" alt="" />
                    </div>
                    <div class="client-info">
                        <h3>Jenna John</h3>
                        <p>Subtitle goes here</p>
                    </div>
                    <div class="client-comment">
                        <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. </h3>
                        <img src="front/assets/images/quote.png" alt="" />
                    </div>
                </div> -->

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

    <!-- blog section -->
    <!-- <section class="w3l-grids-block-5 py-5">
        <div class="container py-md-5 py-4">
            <div class="title-heading-w3 text-center mx-auto mb-sm-5 mb-4" style="max-width:700px">
                <h3 class="title-style">Latest Blog Posts</h3>
                <p class="lead mt-2">Nostrud exercitation ullamco laboris nisi
                    ut aliquip ex ea commodo consequat sunt in culpa qui official.</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card-single">
                        <div class="grids5-info">
                            <a href="#blog"><img src="front/assets/images/blog1.jpg" alt="" /></a>
                            <div class="blog-info">
                                <div class="d-flex align-items-center justify-content-between ">
                                    <a class="d-flex align-items-center" href="#blog" title="23k followers">
                                        <img class="img-fluid" src="front/assets/images/testi2.jpg" alt="admin"
                                            style="max-width:40px"> <span class="small ml-2">Eetey Cruis</span>
                                    </a>
                                    <p class="date-text"><i class="far fa-calendar-alt mr-1"></i>April 06, 2021</p>
                                </div>
                                <h5 class="color-1"><a href="#blog">Photography</a></h5>
                                <h4><a href="#blog">You Should Fall In Love With Photography</a>
                                </h4>
                                <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua, sunt inc
                                    officia deserunt.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-md-0 mt-5">
                    <div class="blog-card-single">
                        <div class="grids5-info">
                            <a href="#blog"><img src="front/assets/images/blog2.jpg" alt="" /></a>
                            <div class="blog-info">
                                <div class="d-flex align-items-center justify-content-between ">
                                    <a class="d-flex align-items-center" href="#blog" title="23k followers">
                                        <img class="img-fluid" src="front/assets/images/testi1.jpg" alt="admin"
                                            style="max-width:40px"> <span class="small ml-2">Molive Joe</span>
                                    </a>
                                    <p class="date-text"><i class="far fa-calendar-alt mr-1"></i>April 13, 2021</p>
                                </div>
                                <h5 class="color-2"><a href="#blog">Camera</a></h5>
                                <h4><a href="#blog">Your Camera Manual Portrait Photography</a></h4>
                                <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua, sunt inc
                                    officia deserunt.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-lg-0 mt-5">
                    <div class="blog-card-single">
                        <div class="grids5-info">
                            <a href="#blog"><img src="front/assets/images/blog3.jpg" alt="" /></a>
                            <div class="blog-info">
                                <div class="d-flex align-items-center justify-content-between ">
                                    <a class="d-flex align-items-center" href="#blog" title="23k followers">
                                        <img class="img-fluid" src="front/assets/images/testi3.jpg" alt="admin"
                                            style="max-width:40px"> <span class="small ml-2">Turne Leo
                                        </span>
                                    </a>
                                    <p class="date-text"><i class="far fa-calendar-alt mr-1"></i>April 12, 2021</p>
                                </div>
                                <h5 class="color-3"><a href="#blog">Photo Gallery</a></h5>
                                <h4><a href="#blog">The Best Professional Travel Photos</a></h4>
                                <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua, sunt inc
                                    officia deserunt.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- //blog section -->
 
