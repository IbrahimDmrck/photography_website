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
                        <h5>Hizmet Ekle</h5>
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
                        if (isset($_POST['serviceAdd'])) {
                            $serviceName = $_POST['serviceName'];
                            $serviceDescription = $_POST['serviceDescription'];
                            // $serviceImg = $_POST['serviceImg'];
                       
                            $swal = 'swal';

                            if (!$serviceName) {
                                echo '<script>' . $swal . '("Lütfen formu eksiksiz doldurun !", "", "warning");</script>';
                            } elseif (!$serviceDescription) {
                                echo '<script>' . $swal . '("Lütfen formu eksiksiz doldurun !", "", "warning");</script>';
                            }else {
                                $query = $db->prepare('INSERT INTO services SET serviceName = ?, serviceDescription = ?, serviceImg ="yok"');
                                $save = $query->execute([$serviceName, $serviceDescription]);

                                if ($save) {

                                    echo '<script>' . $swal . '("Hizmet başarıyla eklendi", "", "success");</script>';
                                    header('Refresh:3;url=ourService.php');

                                } else {
                                    echo '<script>' . $swal . '("Beklenmedik Bir Hata Oldu!", "Lütfen Tekrar Deneyin", "error");</script>';
                                }
                            }
                        }
                        //echo "<div class='alert alert-danger'>".$menuName ." ".$orderNumber." ".$position."</div>";
                        ?>
                        <form class="mx-5" method="post">

                            <div class="form-group row"><label class="col-lg-2 col-form-label">Hizmet Adı</label>

                                <div class="col-lg-6"><input type="text" name="serviceName" placeholder="Sayfa Adı"
                                        class="form-control">
                                </div>
                            </div>
                  
                            <div class="form-group row"><label class="col-lg-2 col-form-label">Hizmet Açıklama</label>

                                <div class="col-lg-6">
                                    <textarea class="summernote form-control" name="serviceDescription" id="" cols="30"
                                        rows="10"></textarea>
                                </div>
                            </div>


                            <div class="form-group"><label class="col-lg-2 col-form-label">Hizmet Fotoğrafı</label>
                                <div class="col-lg-6 custom-file">
                                    <input id="logo" type="file" class="custom-file-input">
                                    <label for="logo" class="custom-file-label">Choose file...</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-offset-2 col-lg-10 d-flex justify-content-center">
                                    <button name="serviceAdd" class="btn btn-primary w-25" type="submit">Ekle</button>
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