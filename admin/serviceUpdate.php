<?php
ob_start();
session_start();
require '../database/db_conn.php';
if (isset($_SESSION['username'])) {
    include('includes/header.php');
    ?>
    </div>

    <div class="wrapper wrapper-content">
        <div class="row ">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Hizmet Güncelle</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>

                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content ">
                        <?php
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];

                            $service = $db->query("SELECT * FROM services WHERE id=$id", PDO::FETCH_ASSOC);



                            if (isset($_POST['serviceUpdate'])) {
                                $serviceName = $_POST['serviceName'];
                                $serviceDescription = $_POST['serviceDescription'];

                                $swal = 'swal';

                                if (!$serviceName) {
                                    echo '<script>' . $swal . '("Lütfen formu eksiksiz doldurun !", "", "warning");</script>';
                                } elseif (!$serviceDescription) {
                                    echo '<script>' . $swal . '("Lütfen formu eksiksiz doldurun !", "", "warning");</script>';
                                } else {
                                    $query = $db->prepare('UPDATE services SET serviceName = ?, serviceDescription = ? WHERE id=' . $id . '');
                                    $save = $query->execute([$serviceName, $serviceDescription]);

                                    if ($save) {

                                        echo '<script>' . $swal . '("Hizmet başarıyla eklendi", "", "success");</script>';
                                        header('Refresh:3;url=ourService.php');

                                    } else {
                                        echo '<script>' . $swal . '("Beklenmedik Bir Hata Oldu!", "Lütfen Tekrar Deneyin", "error");</script>';
                                    }
                                }
                            }

                            if (isset($_POST["updateServicePhoto"])) {
                                $id = $_GET['id'];
                                $swal = 'swal';
                                $foto = $_FILES['serviceImg']['name'];
                                if ($foto != null) {


                                    $tmp_name = $_FILES["serviceImg"]['tmp_name'];
                                    $fileName = $_FILES["serviceImg"]['name'];
                                    $size = $_FILES["serviceImg"]['size'];
                                    $type = $_FILES["serviceImg"]['type'];

                                    $extension = substr($fileName, -4, 4);

                                    $randomNo = rand(10000, 50000);
                                    $randomNoSec = rand(10000, 50000);

                                    $photo_name = $randomNo . $randomNoSec . $extension;
                                    $destinationFolder = "../../public/uploads/";

                                    move_uploaded_file($tmp_name, "$destinationFolder" . "$photo_name");
                                } else {
                                    $photo_name = "";
                                }



                                if (!$fileName) {
                                    echo '<script>' . $swal . '("Lütfen bir fotoğraf seçiniz !", "", "warning");</script>';
                                } elseif ($size > (1024 * 1024 * 3)) {
                                    echo '<script>' . $swal . '("Fotoğraf boyutu çok fazla !", "", "warning");</script>';
                                } elseif (($type != 'image/jpeg' && $type != 'image/png' && $type != '.jpg')) {
                                    echo '<script>' . $swal . '("Dosya uzantısı jpeg,jpg veya png olabilir !", "", "warning");</script>';
                                } else {
                                    $check = $db->prepare('SELECT * FROM services WHERE id = :id');
                                    $check->execute([":id" => $id]);
                                    $get_service = $check->fetch(PDO::FETCH_ASSOC);
                                    $check_exist = $check->rowCount();

                                    $old_photo = $get_service["serviceImg"];
                                    if ($old_photo != "" || $old_photo != null) {
                                        unlink("../../public/uploads/" . $old_photo);
                                    }
                                    $query = $db->prepare('UPDATE services SET serviceImg =? WHERE id=' . $id . '');
                                    $save = $query->execute([$photo_name]);




                                    if ($save) {

                                        echo '<script>' . $swal . '("Hizmet fotoğrafı başarıyla güncellendi", "", "success");</script>';
                                        header('Refresh:3;');

                                    } else {
                                        echo '<script>' . $swal . '("Beklenmedik Bir Hata Oldu!", "Lütfen Tekrar Deneyin", "error");</script>';
                                    }
                                }

                            }
                        }

                        ?>
                        <?php foreach ($service as $value) { ?>
                            <form class="mx-5" method="post" enctype="multipart/form-data">
                                <div class="form-group row"><label class="col-lg-2 col-form-label">Hizmet Adı</label>

                                    <div class="col-lg-6"><input type="text" name="serviceName"
                                            value="<?= $value['serviceName'] ?>" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row"><label class="col-lg-2 col-form-label">Hizmet Açıklama</label>

                                    <div class="col-lg-6">
                                        <textarea class="summernote form-control" name="serviceDescription" cols="30"
                                            rows="10"><?= $value['serviceDescription'] ?></textarea>
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <div class="col-lg-offset-2 col-lg-10 d-flex justify-content-center">
                                        <button type="submit" name="serviceUpdate" class="btn btn-primary w-25"
                                            type="submit">Güncelle</button>
                                    </div>
                                </div>
                            </form>

                            <div class="form-group row"><label class="col-lg-2 col-form-label">Hizmet Fotoğrafı</label>
                                <div class="col-lg-6">
                                    <img src="../../public/uploads/<?= $value['serviceImg'] ?>" alt="Bir Fotoğraf Eklemediniz"
                                        class="img-fluid">
                                </div>
                                <div class=" col-lg-3  custom-file ">

                                    <form method="post" enctype="multipart/form-data">
                                        <input id="logo" type="file" name="serviceImg" class="custom-file-input">
                                        <label for="logo" class="custom-file-label">Fotoğraf Seçin</label>


                                        <button name="updateServicePhoto" class="float-right btn btn-secondary mt-2 ">Fotoğrafı
                                            Güncelle</button>
                                    </form>
                                </div>

                            </div>
                        <?php } ?>
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