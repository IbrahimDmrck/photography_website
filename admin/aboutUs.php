<?php
session_start();
require '../database/db_conn.php';
if (isset($_SESSION['username'])) {
    include('includes/header.php'); ?>
    </div>

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Hakkımda</h5>
                        <div class="ibox-tools">

                            <a href="aboutUsAdd.php"
                                class="ladda-button ladda-button-demo-add btn btn-primary text-white btn-sm"
                                data-style="zoom-in" title="Hakkımda Bilgisi Ekle" style="font-size: 1rem;">
                                Hakkımda Bilgisi Ekle
                            </a>

                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="aboutUsAdd.php" class="dropdown-item">Hakkımda Bilgisi Ekle</a>
                                </li>

                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive col-8">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Sil</th>
                                        <th>Güncelle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $aboutus = $db->query("SELECT * FROM aboutus", PDO::FETCH_ASSOC);
                                    if (isset($_GET['id'])) {
                                        $id = $_GET['id'];
                                        $swal = 'swal';

                                        $check = $db->prepare('SELECT * FROM aboutus WHERE id = :id');
                                        $check->execute([":id" => $id]);
                                        $get_service = $check->fetch(PDO::FETCH_ASSOC);
                                        $check_exist = $check->rowCount();

                                        $old_photo = $get_service["content1Img"];
                                        $old_photo1 = $get_service["content2Img"];
                                        $old_photo2 = $get_service["content3Img"];
                                        $old_photo3 = $get_service["sectionImg"];
                                        $old_photo4 = $get_service["rightImg"];
                                        $old_photo5 = $get_service["leftImg"];

                                        if ($old_photo != "" || $old_photo != null) {
                                            unlink("../../public/uploads/" . $old_photo);
                                        }

                                        if ($old_photo1 != "" || $old_photo1 != null) {
                                            unlink("../../public/uploads/" . $old_photo1);
                                        }

                                        if ($old_photo2 != "" || $old_photo2 != null) {
                                            unlink("../../public/uploads/" . $old_photo2);
                                        }

                                        if ($old_photo3 != "" || $old_photo3 != null) {
                                            unlink("../../public/uploads/" . $old_photo3);
                                        }

                                        if ($old_photo4 != "" || $old_photo4 != null) {
                                            unlink("../../public/uploads/" . $old_photo4);
                                        }

                                        if ($old_photo5 != "" || $old_photo5 != null) {
                                            unlink("../../public/uploads/" . $old_photo5);
                                        }

                                        $deleteAboutus = $db->query("DELETE FROM aboutus WhERE id=$id", PDO::FETCH_ASSOC);
                                        $delete = $deleteAboutus->execute();

                                        if ($delete) {

                                            echo '<script>' . $swal . '("Hakkımda Bilgisi Silindi", "", "success");</script>';
                                            header('Refresh:2; aboutUs.php');

                                        } else {
                                            echo '<script>' . $swal . '("Beklenmedik Bir Hata Oldu", "Lütfen Tekrar Deneyin", "error");</script>';
                                        }
                                    }
                                    ?>
                                    <?php if (isset($aboutus)) {

                                        foreach ($aboutus as $value) {

                                            ?>

                                            <tr>
                                                <td>
                                                    <?= $value['id'] ?>
                                                </td>

                                                <td><a href="?id=<?= $value['id'] ?>" name="delete"
                                                        class="ladda-button ladda-button-demo-delete btn btn-danger text-white"
                                                        data-style="zoom-in" title="sil"><i class="fa fa-times"></i></a></td>
                                                <td><a href="aboutUsUpdate.php?id=<?= $value['id'] ?>" name="update"
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
                                        <th>#</th>
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