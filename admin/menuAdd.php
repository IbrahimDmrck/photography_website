<?php
ob_start();
session_start();
require '../database/db_conn.php';
if (isset($_SESSION['username'])) {
    include('includes/header.php'); ?>
    </div>

    <div class="wrapper wrapper-content">
        <div class="row ">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Menü Ekle</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#" class="dropdown-item">Config option 1</a>
                                </li>
                                <li><a href="#" class="dropdown-item">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content ">
                        <?php
                        if (isset($_POST['menuAdd'])) {
                            $menuName = $_POST['menuName'];
                            $orderNumber = $_POST['orderNumber'];
                            $position = $_POST['position'];
                            $swal = 'swal';

                            if (!$menuName) {
                                echo '<script>' . $swal . '("Lütfen formu eksiksiz doldurun !", "", "warning");</script>';
                            }elseif (!$orderNumber) {
                                echo '<script>' . $swal . '("Lütfen formu eksiksiz doldurun !", "", "warning");</script>';
                            }elseif (!$position) {
                                echo '<script>' . $swal . '("Lütfen formu eksiksiz doldurun !", "", "warning");</script>';
                            } else {
                                $query = $db->prepare('INSERT INTO menus SET menuName = ?, orderNumber = ?, position = ?');
                                $save = $query->execute([$menuName, $orderNumber, $position]);

                                if ($save) {
       
                                    echo '<script>' . $swal . '("Menü başarıyla eklendi", "", "success");</script>';
                                    header('Refresh:3;url=menus.php');
                              
                                  } else {
                                    echo '<script>' . $swal . '("Beklenmedik Bir Hata Oldu!", "Lütfen Tekrar Deneyin", "error");</script>';
                                  }
                            }
                        }
                        //echo "<div class='alert alert-danger'>".$menuName ." ".$orderNumber." ".$position."</div>";
                        ?>
                        <form class="mx-5" method="post">

                            <div class="form-group row"><label class="col-lg-2 col-form-label">Menü Adı</label>

                                <div class="col-lg-6"><input type="text" name="menuName" placeholder="Menü Adı"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-lg-2 col-form-label">Sıra Numarası</label>

                                <div class="col-lg-6"><input type="number" name="orderNumber" placeholder="Sıra Numarası"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-lg-2 col-form-label">Menü Konumu</label>

                                <div class="col-lg-6">
                                    <select name="position" class="select2_demo_3 form-control">
                                        <option></option>
                                        <option value="Header">Header</option>
                                        <option value="Footer">Footer</option>

                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-lg-offset-2 col-lg-10 d-flex justify-content-center">
                                    <button name="menuAdd" class="btn btn-primary w-25" type="submit">Ekle</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php');
} else {
    header("location:login.php");
}
?>