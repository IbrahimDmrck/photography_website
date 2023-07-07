<?php 
error_reporting(0);
use PHPMailer\PHPMailer\PHPMailer;


require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin | Giriş</title>

    <link href="back/css/bootstrap.min.css" rel="stylesheet">
    <link href="back/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="back/css/animate.css" rel="stylesheet">
    <link href="back/css/style.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body class="gray-bg">

    <p style="font-size:4em;" class="text-center mt-4">Yönetim Paneline Giriş Yap</p>
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
       <?php
       ob_start();
       session_start();
       unset($_SESSION["username"]);
       require '../database/db_conn.php';

       if (isset($_POST['login'])) {
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
            $query = $db->prepare('SELECT * FROM admin WHERE email = ? and password = ?');
           $query->execute([$email,md5($password)]);

           $admin_exist = $query->rowCount();

            if ($admin_exist == 1) {
            $_SESSION['username'] = $email;
             
            echo '<script>' . $swal . '("Giriş İşlemi Başarılı !", "Admin Paneline Yönlediriliyorsunuz...", "success");</script>';
            header('Refresh:2;url=index.php');

            } else {
            echo '<script>' . $swal . '("Lütfen bilgilerinizi kontrol edip tekrar deneyin !", "", "error");</script>';
            }
          }

       }
       ?>
            <form class="m-t" role="form" action="" method="POST">
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="E-posta Adresi" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Şifre" required="">
                </div>
                <button type="submit" name="login" class="btn btn-primary block full-width m-b">Giriş Yap</button>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><small>Şifreni Mi Unurrun?</small></button>
                <!-- <p class="text-muted text-center"><small>Bir Hesabın Yok Mu?</small></p> -->
                <!-- <a class="btn btn-sm btn-white btn-block" href="register.php">Kayıt Ol</a> -->
            </form>
            
        </div>
    </div>
    <?php

function generateRandomPassword($length = 8) {
  $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
  $password = '';
  
  for ($i = 0; $i < $length; $i++) {
      $index = rand(0, strlen($chars) - 1);
      $password .= $chars[$index];
  }
  
  return $password;
}

// 8 karakterli rastgele şifre üretme örneği


    if (isset($_POST['resetPassword'])) {
      $email=$_POST['email'];
      $swal = 'swal';
      if (!preg_match('/^\\S+@\\S+\\.\\S+$/', $email)) {
        echo '<script>' . $swal . '("Lütfen geçerli bir e-mail adresi giriniz !", "", "error");</script>';
      }else {
        $query = $db->prepare('SELECT * FROM admin WHERE email = ? ');
        $query->execute([$email]);

        $admin_exist = $query->rowCount();
        if ($admin_exist == 1) {
          $randomPassword = generateRandomPassword();

          $updatePswrd = $db->prepare("UPDATE admin SET password=? WHERE email LIKE '%$email%' ");
         $save=$updatePswrd->execute([md5($randomPassword)]);

          if ($save) {

            $mail=new PHPMailer();
            $mail->isSMTP();
            $mail->SMTPAuth=true;
            $mail->SMTPSecure="tls"; 
            $mail->Port=587;
            $mail->Host="smtp.gmail.com";
            $mail->Username="ibrahimdmrck@gmail.com";
            $mail->Password="*****";//google hesabınızda bir şifre oluşturmalısınız detaylarını internetten araştırarak öğrenin
            $mail->addAddress("ibrahimdmrck@gmail.com");//alıcı adres
            $mail->isHTML(true);
            $mail->Subject="Sifre Yenileme Islemi";
            $mail->Body='<html lang="tr">
            <head>
              <meta charset="utf-8">
              <meta name="viewport" content="width=device-width, initial-scale=1">
              <title>Bootstrap demo</title>
              <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
            </head>
            <body>
            <div class="card text-bg-info mb-3">
            <div class="card-header"><h2>Şifre Yenileme İsteği Aldık</h2></div>
            <div class="card-body">
                <h3 class="card-title">Yeni Şifreniz Aşağıdaki Gibidir</h3>
                <p class="card-text">'.$randomPassword.'</p>
            </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
            </body>
          </html>
            ';

            if ($mail->send()) {
                echo '<div class="container alert alert-success alert-dismissible fade show" role="alert">
                Yeni Şifrenizi E-posta olarak gönderdik , Lütfen E-postanızı Kontrol Ediniz !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>';
            }else {
                echo '<div class="container alert alert-success alert-dismissible fade show" role="alert">
               Şifre Yenileme İşlemi Başarısız Oldu , Lütfen Tekrar Deneyin !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>';
            }                       
          } else {
            echo '<div class="container alert alert-success alert-dismissible fade show" role="alert">
            Şifre Yenileme İşlemi Başarısız Oldu , Lütfen Tekrar Deneyin !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>';
          }

        }else{
          echo '<script>' . $swal . '("Girmiş Olduğunuz E-mail Bilgisi Sistemde Bulunamadı !", "", "error");</script>';
        }
      }
    }
    ?>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Şifre Yenile</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post">
      <div class="modal-body">
          <label for="email">Lütfen Sistemde Kayıtlı E-mail Adresinizi Girin</label>
          <input type="text" name="email" id="email" class="form-control" placeholder="example@example.com">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
          <button type="sumbit" name="resetPassword" class="btn btn-primary">Gönder</button>
        </form>
      </div>
    </div>
  </div>
</div>
    <!-- Mainly scripts -->
    <script src="back/js/jquery-3.1.1.min.js"></script>
    <script src="back/js/popper.min.js"></script>
    <script src="back/js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
