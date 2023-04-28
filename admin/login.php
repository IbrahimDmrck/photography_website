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

                <a href="#"><small>Şifreni Mi Unurrun?</small></a>
                <p class="text-muted text-center"><small>Bir Hesabın Yok Mu?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.php">Kayıt Ol</a>
            </form>
            
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="back/js/jquery-3.1.1.min.js"></script>
    <script src="back/js/popper.min.js"></script>
    <script src="back/js/bootstrap.js"></script>

</body>

</html>
