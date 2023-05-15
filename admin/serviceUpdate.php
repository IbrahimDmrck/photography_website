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

                            }

                        if (isset($_POST['serviceUpdate'])) {
                            $serviceName = $_POST['serviceName'];
                            $serviceDescription = $_POST['serviceDescription'];
                             $serviceImg = $_POST['serviceImg'];
                       
                            $swal = 'swal';

                            if (!$serviceName) {
                                echo '<script>' . $swal . '("Lütfen formu eksiksiz doldurun !", "", "warning");</script>';
                            } elseif (!$serviceDescription) {
                                echo '<script>' . $swal . '("Lütfen formu eksiksiz doldurun !", "", "warning");</script>';
                            }else {
                                $query = $db->prepare('UPDATE services SET serviceName = ?, serviceDescription = ?, serviceImg =? WHERE id='.$id.'');
                                $save = $query->execute([$serviceName, $serviceDescription, $serviceImg]);

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
                        <?php foreach ($service as $value) { ?>
                            <div class="form-group row"><label class="col-lg-2 col-form-label">Hizmet Adı</label>

                                <div class="col-lg-6"><input type="text" name="serviceName" value="<?= $value['serviceName']?>"
                                        class="form-control">
                                </div>
                            </div>
                  
                            <div class="form-group row"><label class="col-lg-2 col-form-label">Hizmet Açıklama</label>

                                <div class="col-lg-6">
                                    <textarea class="summernote form-control" name="serviceDescription"  cols="30"
                                        rows="10"><?= $value['serviceDescription']?></textarea>
                                </div>
                            </div>


                            <div class="form-group"><label class="col-lg-2 col-form-label">Hizmet Fotoğrafı</label>
                                <div class="col-lg-6 custom-file">
                                    <input id="logo" type="file" name="serviceImg" class="custom-file-input">
                                    <label for="logo" class="custom-file-label"><?= $value['serviceImg']?></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-offset-2 col-lg-10 d-flex justify-content-center">
                                    <button name="serviceUpdate" class="btn btn-primary w-25" type="submit">Güncelle</button>
                                </div>
                            </div>
                            <?php } ?>
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