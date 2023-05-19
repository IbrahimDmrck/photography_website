<?php
session_start();
require '../database/db_conn.php';
if (isset($_SESSION['username'])) {
    include('includes/header.php'); ?>
    </div>

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-6">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Hizmetler</h5>
                        <div class="ibox-tools">

                            <a href="serviceAdd.php"
                                class="ladda-button ladda-button-demo-add btn btn-primary text-white btn-sm"
                                data-style="zoom-in" title="menü ekle" style="font-size: 1rem;">
                                Hizmet Ekle
                            </a>

                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="serviceAdd.php" class="dropdown-item">Hizmet Ekle</a>
                                </li>

                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Hizmet Adı</th>
                                        <th>Sil</th>
                                        <th>Güncelle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $services = $db->query("SELECT * FROM services", PDO::FETCH_ASSOC);
                                    if (isset($_GET['service'])) {
                                        $id = $_GET['service'];
                                        $swal = 'swal';


                                        $check = $db->prepare('SELECT * FROM services WHERE id = :id');
                                        $check->execute([":id" => $id]);
                                        $get_service = $check->fetch(PDO::FETCH_ASSOC);
                                        $check_exist = $check->rowCount();

                                        $old_photo = $get_service["serviceImg"];
                                        
                                        if ($old_photo != "" || $old_photo != null) {
                                            unlink("../../public/uploads/" . $old_photo);
                                        }

                                        $deleteServices = $db->query("DELETE FROM services WhERE id=$id", PDO::FETCH_ASSOC);
                                        $delete = $deleteServices->execute();

                                        if ($delete) {

                                            echo '<script>' . $swal . '("Sayfa Başarıyla Silindi", "", "success");</script>';
                                            header('Refresh:2; ourService.php');

                                        } else {
                                            echo '<script>' . $swal . '("Beklenmedik Bir Hata Oldu", "Lütfen Tekrar Deneyin", "error");</script>';
                                        }
                                    }
                                    ?>
                                    <?php if (isset($services)) {

                                        foreach ($services as $serviceValue) {

                                            ?>

                                            <tr>
                                                <td>
                                                    <?= $serviceValue['serviceName'] ?>
                                                </td>

                                                <td><a href="?service=<?= $serviceValue['id'] ?>" name="delete"
                                                        class="ladda-button ladda-button-demo-delete btn btn-danger text-white"
                                                        data-style="zoom-in" title="sil"><i class="fa fa-times"></i></a></td>
                                                <td><a href="serviceUpdate.php?id=<?= $serviceValue['id'] ?>" name="update"
                                                        class="ladda-button ladda-button-demo-update btn btn-warning text-white"
                                                        data-style="zoom-in" title="güncelle"><i class="fa fa-edit"></i></a></td>
                                            </tr>
                                        <?php }
                                    } else { ?>
                                        <td>-----</td>
                                        <td>-----</td>
                                        <td>-----</td>
                                        <td>-----</td>
                                        <td>-----</td>
                                        </tr>
                                    <?php } ?>



                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Hizmet Adı</th>
                                        <th>Sil</th>
                                        <th>Güncelle</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Yetenekler</h5>
                        <div class="ibox-tools">

                            <a href="talentAdd.php"
                                class="ladda-button ladda-button-demo-add btn btn-primary text-white btn-sm"
                                data-style="zoom-in" title="menü ekle" style="font-size: 1rem;">
                                Yetenek Ekle
                            </a>

                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="talentAdd.php" class="dropdown-item">Yetenek Ekle</a>
                                </li>

                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Yetenek Adı</th>
                                        <th>Sil</th>
                                        <th>Güncelle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $talents = $db->query("SELECT * FROM talent", PDO::FETCH_ASSOC);
                                    if (isset($_GET['talent'])) {
                                        $id = $_GET['talent'];
                                        $swal = 'swal';

                                        $check = $db->prepare('SELECT * FROM talent WHERE id = :id');
                                        $check->execute([":id" => $id]);
                                        $get_talent = $check->fetch(PDO::FETCH_ASSOC);
                                        $check_exist = $check->rowCount();

                                        $old_photo = $get_talent["imageR"];
                                        $old_photo1 = $get_talent["imageL"];
                               

                                        if ($old_photo != "" || $old_photo != null) {
                                            unlink("../../public/uploads/" . $old_photo);
                                        }

                                        if ($old_photo1 != "" || $old_photo1 != null) {
                                            unlink("../../public/uploads/" . $old_photo1);
                                        }

                                        $deleteTalent = $db->query("DELETE FROM talent WhERE id=$id", PDO::FETCH_ASSOC);
                                        $delete = $deleteTalent->execute();

                                        if ($delete) {

                                            echo '<script>' . $swal . '("Yetenek Başarıyla Silindi", "", "success");</script>';
                                            header('Refresh:2; ourService.php');

                                        } else {
                                            echo '<script>' . $swal . '("Beklenmedik Bir Hata Oldu", "Lütfen Tekrar Deneyin", "error");</script>';
                                        }
                                    }
                                    ?>
                                    <?php if (isset($talents)) {

                                        foreach ($talents as $talentValue) {

                                            ?>

                                            <tr>
                                                <td>
                                                    <?= $talentValue['talentName'] ?>
                                                </td>

                                                <td><a href="?talent=<?= $talentValue['id'] ?>" name="delete"
                                                        class="ladda-button ladda-button-demo-delete btn btn-danger text-white"
                                                        data-style="zoom-in" title="sil"><i class="fa fa-times"></i></a></td>
                                                <td><a href="talentUpdate.php?id=<?= $talentValue['id'] ?>" name="update"
                                                        class="ladda-button ladda-button-demo-update btn btn-warning text-white"
                                                        data-style="zoom-in" title="güncelle"><i class="fa fa-edit"></i></a></td>
                                            </tr>
                                        <?php }
                                    } else { ?>
                                        <td>-----</td>
                                        <td>-----</td>
                                        <td>-----</td>
                                        <td>-----</td>
                                        <td>-----</td>
                                        </tr>
                                    <?php } ?>



                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Yetenek Adı</th>
                                        <th>Sil</th>
                                        <th>Güncelle</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

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