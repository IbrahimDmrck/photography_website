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
                            $swal = 'swal';
                            $foto = $_FILES['serviceImage']['name'];

                            if ($foto != null) {

                                $tmp_name = $_FILES["serviceImage"]['tmp_name'];
                                $fileName = $_FILES["serviceImage"]['name'];
                                $size = $_FILES["serviceImage"]['size'];
                                $type = $_FILES["serviceImage"]['type'];
                                
                                $extension = substr($fileName, -4, 4);
                                
                                $randomNo = rand(10000, 50000);
                                $randomNoSec = rand(10000, 50000);
                                
                                $photo_name = $randomNo . $randomNoSec . $extension;
                                $destinationFolder = "../../public/uploads/";
                                move_uploaded_file($tmp_name, "$destinationFolder"."$photo_name");

                                if (!$fileName) {
                                    echo '<script>' . $swal . '("Herhangi bir değişiklik yapmadınız !", "", "warning");</script>';
                                } elseif ($size > (1024 * 1024 * 3)) {
                                    echo '<script>' . $swal . '("Fotoğraf boyutu çok fazla !", "", "warning");</script>';
                                } elseif (($type != 'image/jpeg' && $type != 'image/png' && $type != '.jpg')) {
                                    echo '<script>' . $swal . '("Dosya uzantısı jpeg,jpg veya png olabilir !", "", "warning");</script>';
                                }

                            } else {                 
                                $photo_name = "";
                            }

             
                       
                            

                            if (!$serviceName) {
                                echo '<script>' . $swal . '("Lütfen formu eksiksiz doldurun !", "", "warning");</script>';
                            } elseif (!$serviceDescription) {
                                echo '<script>' . $swal . '("Lütfen formu eksiksiz doldurun !", "", "warning");</script>';
                            }elseif (isset($type)) {
                                if (($type != 'image/jpeg' && $type != 'image/png' && $type != '.jpg')) {
                                    
                               
                                echo '<script>' . $swal . '("Dosya uzantısı jpeg,jpg veya png olabilir !", "", "warning");</script>';
                            }
                            }else {
                               
                                $query = $db->prepare('INSERT INTO services SET serviceName = ?, serviceDescription = ?, serviceImg =?');
                                $save = $query->execute([$serviceName, $serviceDescription,$photo_name]);

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
                        <form class="mx-5" method="post" enctype="multipart/form-data">

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
                                    <input id="serviceImage" type="file" name="serviceImage" class="custom-file-input">
                                    <label for="serviceImage" class="custom-file-label">Choose file...</label>
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