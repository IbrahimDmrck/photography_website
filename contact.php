<?php include('includes/header.php'); 
use PHPMailer\PHPMailer\PHPMailer;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
?>

<!-- inner banner -->
<section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-sm-5 pt-4 pb-sm-4">
                <h4 class="inner-text-title font-weight-bold pt-5">Contact Us</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="index.html">Home</a></li>
                    <li class="active"><span class="fa fa-chevron-right mx-2" aria-hidden="true"></span>Contact Us</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- //inner banner -->

    <!-- contact -->
    <section class="w3l-contact py-5" id="contact">
        <div class="container py-lg-5 py-md-4 py-2">
            <div class="title-heading-w3 text-center mx-auto mb-sm-5 mb-4" style="max-width:700px">
            <?php
            $contact = $db->query("SELECT * FROM  pages WHERE pageName='iletisim'",PDO::FETCH_ASSOC);

            foreach ($contact as $value) {?>
                <h3 class="title-style"><?= $value['pageName'] ?></h3>
                <p class="lead mt-2"><?= $value['shortDescription'] ?></p>
           <?php } ?>
                
            </div>
            <div class="mx-auto pt-lg-4 pt-md-5 pt-4" style="max-width:1000px">
                <div class="row contact-block">
                    <div class="col-md-5 contact-left">
                        <h3 class="font-weight-bold mb-md-5 mb-4">İletişim Bilgileri</h3>
                        <div class="cont-details">
                            <div class="d-flex contact-grid">
                                <div class="cont-left text-center mr-3">
                                    <span class="fa fa-globe icon-color"></span>
                                </div>
                                <div class="cont-right">
                                    <h6>Company Address</h6>
                                    <p>10001, 5th Avenue, 12202 street, USA.</p>
                                </div>
                            </div>
                            <div class="d-flex contact-grid mt-4 pt-lg-2">
                                <div class="cont-left text-center mr-3">
                                    <span class="fa fa-phone icon-color"></span>
                                </div>
                                <div class="cont-right">
                                    <h6>Call Us</h6>
                                    <p><a href="tel:+1(21) 234 4567">+1(21) 112 7368</a></p>
                                </div>
                            </div>
                            <div class="d-flex contact-grid mt-4 pt-lg-2">
                                <div class="cont-left text-center mr-3">
                                    <span class="fa fa-envelope-open icon-color"></span>
                                </div>
                                <div class="cont-right">
                                    <h6>Email Us</h6>
                                    <p><a href="mailto:example@mail.com" class="mail">example@mail.com</a></p>
                                </div>
                            </div>
                            <div class="d-flex contact-grid mt-4 pt-lg-2">
                                <div class="cont-left text-center mr-3">
                                    <span class="fa fa-headphones icon-color"></span>
                                </div>
                                <div class="cont-right">
                                    <h6>Customer Support</h6>
                                    <p><a href="mailto:info@support.com" class="mail">info@support.com</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 contact-right mt-md-0 mt-4">
                        <?php
                        if(isset($_POST['sendMessage'])){
                            $name=$_POST['name'];
                            $sender=$_POST['sender'];
                            $subject=$_POST['subject'];
                            $message=$_POST['message'];
                            
                          


                            if (!$name || strlen($name)>100) {
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Lütfen adınızı ve soyadınızı giriniz !
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>';
                            }elseif (!$sender || strlen($sender)>60) {
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Lütfen e-postaadresinizi giriniz !
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>';
                            }elseif (!$subject || strlen($subject)>50) {
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Lütfen iletişime geçme konunuzu giriniz !
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>';
                            }elseif (!$message || strlen($message)>300) {
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Lütfen mesajınızı giriniz !
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>';
                            }else {
                                $query = $db->prepare('INSERT INTO messages SET name = ?, sender = ?, subject = ?, message = ?');
                                $save = $query->execute([$name, $sender, $subject, $message]);

                                if ($save) {

                                    $mail=new PHPMailer();
                                    $mail->isSMTP();
                                    $mail->SMTPAuth=true;
                                    $mail->SMTPSecure="tls"; 
                                    $mail->Port=587;
                                    $mail->Host="smtp.example.com";
                                    $mail->Username="user@example.com'";
                                    $mail->Password="*****";
                                    $mail->addAddress("user@example.com'");
                                    $mail->isHTML(true);
                                    $mail->Subject=$subject;
                                    $mail->Body='<html lang="tr">
                                    <head>
                                      <meta charset="utf-8">
                                      <meta name="viewport" content="width=device-width, initial-scale=1">
                                      <title>Bootstrap demo</title>
                                      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
                                    </head>
                                    <body>
                                    <div class="card text-bg-info mb-3">
                                    <div class="card-header"><h3>'.$name.' - '.$sender.'</h3></div>
                                    <div class="card-body">
                                        <h5 class="card-title">'.$subject.'</h5>
                                        <p class="card-text">'.$message.'</p>
                                    </div>
                                    </div>
                                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
                                    </body>
                                  </html>
                                    ';

                                    if ($mail->send()) {
                                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                        Mesajınız iletildi !
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>';
                                    }else {
                                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                        Mesajınız iletilemedi , lütfen tekrar deneyin !
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>';
                                    }                       
                                  } else {
                                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                            Mesajınız iletilemedi , lütfen tekrar deneyin !
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>';
                                  }
                            }
                            
                            

                        }
                        ?>
                        <form action="" method="post" class="signin-form">
                            <div class="input-grids">
                                <input type="text" name="name" id="w3lName" placeholder="Ad Soyad*"
                                    class="contact-input" required="" />
                                <input type="email" name="sender" id="w3lSender" placeholder="Email*"
                                    class="contact-input" required="" />
                                <input type="text" name="subject" id="w3lSubect" placeholder="Konu*"
                                    class="contact-input" required="" />
                            </div>
                            <div class="form-input">
                                <textarea name="message" id="w3lMessage" placeholder="Mesaj*"
                                    required=""></textarea>
                            </div>
                            
                            <button type="submit" name="sendMessage" class="btn btn-style btn-style-primary-2">Mesaj Gönder</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- map -->
    <div class="map-iframe">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d317718.69319292053!2d-0.3817765050863085!3d51.528307984912544!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C+UK!5e0!3m2!1sen!2spl!4v1562654563739!5m2!1sen!2spl"
            width="100%" height="400" frameborder="0" style="border: 0px;" allowfullscreen=""></iframe>
    </div>
    <!-- //contact -->
    <?php include('includes/footer.php'); ?>