<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin | Kayıt-Ol</title>

    <link href="back/css/bootstrap.min.css" rel="stylesheet">
    <link href="back/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="back/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="back/css/animate.css" rel="stylesheet">
    <link href="back/css/style.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>          
<?php
error_reporting(0);
require '../database/db_conn.php';

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $surName = $_POST['surName'];
    $email = $_POST['email'];
   $password = $_POST['password'];
   $swal = 'swal';

   if (!$name) {

    echo '<script>' . $swal . '("Adınızı girin !", "", "error");</script>';

  } elseif (!preg_match("/^[a-zA-ZŞşÇçİÜüĞğÖöı ']*$/", $name)) {

    echo '<script>' . $swal . '(" Ad sadece harflerden oluşabilir !", "", "error");</script>';

  }elseif (!$surName) {
    echo '<script>' . $swal . '("Soyadınızı girin !", "", "error");</script>';
  } elseif (!preg_match("/^[a-zA-ZŞşÇçİÜüĞğÖöı ']*$/", $surName)) {

    echo '<script>' . $swal . '("Soyadı sadece harflerden oluşabilir !", "", "error");</script>';

  }elseif (!$email) {
    echo '<script>' . $swal . '("E-posta adresinizi girin !", "", "error");</script>';
  }elseif (!preg_match('/^\\S+@\\S+\\.\\S+$/', $email)) {
    echo '<script>' . $swal . '("E-posta adresinizi doğru girin !", "", "error");</script>';
  }elseif (!$password || strlen($password) < 8) {

    echo '<script>' . $swal . '("Lütfen şifrenizi girin en az 8 karakter olmalı !", "", "error");</script>';

  }else {

    $query = $db->prepare('INSERT INTO admin SET name = ?, surName = ?, email = ? ,password = ?');
    $save = $query->execute([$name,$surName,$email,md5($password)]);

    if ($save) {
       
      echo '<script>' . $swal . '("Kayıt İşlemi Başarılı !", "Giriş Sayfasına Yönlediriliyorsunuz...", "success");</script>';
      header('Refresh:2; login.php');

    } else {
      echo '<script>' . $swal . '("Lütfen bilgilerinizi kontrol edip tekrar deneyin !", "", "error");</script>';
    }
  }

}
?>
            </div>
            <h2 style="font-size:4em;">Yönetim Paneline Kayıt Ol</h2>
            <p></p>
            <form class="m-t" role="form" action="" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Ad" required="">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="surName" placeholder="Soyad" required="">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Şifre" required="">
                </div>
                
                <button type="submit" name="register" class="btn btn-primary block full-width m-b">Kayıt Ol</button>

                <p class="text-muted text-center"><small>Zaten Bir Hesabın Var Mı?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="login.php">Giriş Yap</a>
            </form>
           
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="back/js/jquery-3.1.1.min.js"></script>
    <script src="back/js/popper.min.js"></script>
    <script src="back/js/bootstrap.js"></script>
    <!-- iCheck -->
    <script src="back/js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
</body>

</html>
