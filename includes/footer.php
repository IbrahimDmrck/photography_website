<!-- footer -->
<footer class="w3l-footer-29-main">
    <div class="footer-29-w3l py-5">
        <div class="container pt-md-5 pt-4">
            <div class="w3l-footer-text-style">
                <div class="footer-list-cont d-flex align-items-center justify-content-between mb-5">
                    <h6 class="foot-sub-title">İletişim</h6>
                    <?php $social_settings=$db->query("SELECT * FROM settings ")->fetchAll(); ?>
                    <div class="main-social-footer-29">
                        <?php foreach ($social_settings as $value) {?>
                           
                        
                        <a href="<?=$value['Facebook'] ?? '#'?>" target="_blank" class="facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="<?=$value['Twitter'] ?? '#'?>" target="_blank" class="twitter"><i class="fab fa-twitter"></i></a>
                        <a href="<?=$value['Instagram'] ?? '#'?>" target="_blank" class="instagram"><i class="fab fa-instagram"></i></a>
                        <a href="<?=$value['Linkedin'] ?? '#'?>" target="_blank" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
                        <a href="<?=$value['Youtube'] ?? '#'?>" target="_blank" class="youtube"><i class="fab fa-youtube"></i></a>
                        <a href="<?=$value['Pinterest'] ?? '#'?>" target="_blank" class="pinterest"><i class="fab fa-pinterest"></i></a>
                        <a href="<?=$value['Tiktok'] ?? '#'?>" target="_blank" class="tiktok"><i class="fab fa-tiktok"></i></a>
                       
                    </div>
                </div>
            </div>
            <div class="row footer-top-29 pt-lg-2 pt-sm-1">
                <div class="col-lg-4 col-sm-6">
                    <div class="address-grid">
                    <span>Adres :</span>
                        <h5><?=$value['Adres'] ?? '#'?><br></h5>
                        <h5 class="mt-sm-5 mt-4"><span> </span></h5>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mt-sm-0 mt-4 text-center">
                    <div class="address-grid">
                        <h5>Telefon</h5>
                        <h5 class="phone-number-text mt-2"><a href="tel:+1(21) 112 7368"><?=$value['Telefon'] ?? '#'?></a></h5>
                    </div>
                    <div class="address-grid mt-sm-5 mt-4">
                        <h5>E-mail</h5>
                        <h5 class="email-cont-text mt-1"> <a href="mailto:<?=$value['Email'] ?? '#'?>"
                                class="mail"><?=$value['Email'] ?? '#'?></a></h5>
                                <?php } ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-5 footer-list-menu pl-lg-0 mt-lg-0 mt-sm-2 mt-2">
                    <div class="address-grid">
                        <h5 class="mb-1 pb-lg-2 text-center">Bağlantılar</h5>
                        <ul class="text-center">
                        <?php
                        $menus=$db->query("SELECT * FROM menus WHERE position='Header'",PDO::FETCH_ASSOC);
                        ?>
                        <?php foreach ($menus as $value) { ?>

                       
                       
                        <li><a href="http://localhost/portfolio/<?= $value['slug'] ?>"><?= $value['menuName'] ?> </a></li>
                       
                        <?php } ?>

                            
                        </ul>
                    </div>
                </div>
                <!-- <div class="address-grid col-lg-4 col-md-6 col-sm-7 mt-lg-0 mt-sm-5 mt-4 w3l-footer-16-main">
                    <h5>Subscribe Here</h5>
                    <form action="#" class="subscribe d-flex mt-4 pt-lg-2 mb-4" method="post">
                        <input type="email" name="email" placeholder="Email Address" required="">
                        <button><span class="fa fa-paper-plane" aria-hidden="true"></span></button>
                    </form>
                    <p>Subscribe to our mailing list and get updates to your email inbox.</p>
                </div> -->
            </div>
            <!-- copyright -->
            <div class="w3l-copyright text-center mt-lg-5 mt-sm-4 pt-md-4 pt-3">
                <p class="copy-footer-29">© <?php echo date('Y') ?> Portfolio. Tüm Hakları Saklıdır. Tasarlayan <a
                        href="https://www.linkedin.com/in/ibrahim-demircik-01b87b22b/" target="_blank">
                        İbrahim Demircik</a></p>
            </div>
        </div>
    </div>
</footer>
<!-- //footer -->

<!-- Js scripts -->
<!-- move top -->
<button onclick="topFunction()" id="movetop" title="Go to top">
    <span class="fas fa-level-up-alt" aria-hidden="true"></span>
</button>
<script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("movetop").style.display = "block";
        } else {
            document.getElementById("movetop").style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>
<!-- //move top -->

<!-- common jquery plugin -->
<script src="front/assets/js/jquery-3.3.1.min.js"></script>
<!-- //common jquery plugin -->

<!-- theme switch js (light and dark)-->
<script src="front/assets/js/theme-change.js"></script>
<!-- //theme switch js (light and dark)-->

<!-- libhtbox -->
<script src="front/assets/js/lightbox-plus-jquery.min.js"></script>
<!-- libhtbox -->

<!-- counter for stats -->
<script src="front/assets/js/counter.js"></script>
<!-- //counter for stats -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Chosen -->
  <script src="admin/back/js/plugins/chosen/chosen.jquery.js"></script>

<!-- testimonial script -->
<!-- Latest compiled and minified JavaScript -->
<script src="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.js"></script>
<script>
      $(function () {
        $('select').multipleSelect({
            width:'100%',
            filter: true ,
            animate:'slide',
            displayDelimiter: ' | '
        })
      })
    </script>
<script>
    $(document).ready(function () {

        $('.client-single').on('click', function (event) {
            event.preventDefault();

            var active = $(this).hasClass('active');

            var parent = $(this).parents('.testi-wrap');

            if (!active) {
                var activeBlock = parent.find('.client-single.active');

                var currentPos = $(this).attr('data-position');

                var newPos = activeBlock.attr('data-position');

                activeBlock.removeClass('active').removeClass(newPos).addClass('inactive').addClass(
                    currentPos);
                activeBlock.attr('data-position', currentPos);

                $(this).addClass('active').removeClass('inactive').removeClass(currentPos).addClass(
                    newPos);
                $(this).attr('data-position', newPos);

            }
        }
       
        
        );

    }(jQuery));
</script>
<!-- //testimonial script -->

<!-- MENU-JS -->
<script>
    $(window).on("scroll", function () {
        var scroll = $(window).scrollTop();

        if (scroll >= 80) {
            $("#site-header").addClass("nav-fixed");
        } else {
            $("#site-header").removeClass("nav-fixed");
        }
    });

    //Main navigation Active Class Add Remove
    $(".navbar-toggler").on("click", function () {
        $("header").toggleClass("active");
    });
    $(document).on("ready", function () {
        if ($(window).width() > 991) {
            $("header").removeClass("active");
        }
        $(window).on("resize", function () {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
        });
    });
</script>
<!-- //MENU-JS -->

<!-- disable body scroll which navbar is in active -->
<script>
    $(function () {
        $('.navbar-toggler').click(function () {
            $('body').toggleClass('noscroll');
        })
    });
</script>
<!-- //disable body scroll which navbar is in active -->
<script>
    $(document).ready(function(){
  $(".owl-carousel").owlCarousel({
    center: true,
    items:3,
    loop:true,
    margin:0,
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true, responsive:{
        2560:{
            center: false,
            margin:10,
            items:3,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
            loop:true
        },
        1920:{
            center: false,
            items:3,
            loop:true,
            margin:0,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
        },
        768:{
            center: false,
            margin:50,
            loop:true,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
            items:2
        },
        390:{
            loop:true,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
            items:1
        },
        375:{
            margin:40,
            loop:true,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
            items:1
        }, 
        320:{
            margin:100,
            loop:true,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
            items:1
        }
    }
   
  });

  $('.chosen-select').chosen({width: "100%"});
});
</script>

<!--bootstrap-->
<script src="front/assets/js/bootstrap.min.js"></script>


<!-- //bootstrap-->
<!-- //Js scripts -->
</body>

</html>