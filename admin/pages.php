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
                        <h5>Sayfalar</h5>
                        <div class="ibox-tools">

                            <a href="pageAdd.php"
                                class="ladda-button ladda-button-demo-add btn btn-primary text-white btn-sm"
                                data-style="zoom-in" title="menü ekle" style="font-size: 1rem;">
                                Sayfa Ekle
                            </a>

                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="pageAdd.php" class="dropdown-item">Sayfa Ekle</a>
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
                                        <th>Sayfa Adı</th>
                                        <th>Sil</th>
                                        <th>Güncelle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $pages = $db->query("SELECT * FROM pages", PDO::FETCH_ASSOC);
                                    if (isset($_GET['id'])) {
                                        $id = $_GET['id'];
                                        $swal = 'swal';

                                        $check = $db->prepare('SELECT * FROM pages WHERE id = :id');
                                        $check->execute([":id" => $id]);
                                        $get_page = $check->fetch(PDO::FETCH_ASSOC);
                                        $check_exist = $check->rowCount();

                                        $old_photo = $get_page["banner"];
                                        
                                        if ($old_photo != "" || $old_photo != null) {
                                            unlink("../../public/uploads/" . $old_photo);
                                        }
                                        
                                        $deleteMenu = $db->query("DELETE FROM pages WhERE Id=$id", PDO::FETCH_ASSOC);
                                        $delete = $deleteMenu->execute();

                                        if ($delete) {

                                            echo '<script>' . $swal . '("Sayfa Başarıyla Silindi", "", "success");</script>';
                                            header('Refresh:2; pages.php');

                                        } else {
                                            echo '<script>' . $swal . '("Beklenmedik Bir Hata Oldu", "Lütfen Tekrar Deneyin", "error");</script>';
                                        }
                                    }
                                    ?>
                                    <?php if (isset($pages)) {

                                        foreach ($pages as $pageValue) {

                                            ?>

                                            <tr>
                                                <td>
                                                    <?= $pageValue['pageName'] ?>
                                                </td>

                                                <td><a href="?id=<?= $pageValue['Id'] ?>" name="delete"
                                                        class="ladda-button ladda-button-demo-delete btn btn-danger text-white"
                                                        data-style="zoom-in" title="sil"><i class="fa fa-times"></i></a></td>
                                                <td><a href="pageUpdate.php?id=<?= $pageValue['Id'] ?>" name="update"
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
                                        <th>Sayfa Adı</th>
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