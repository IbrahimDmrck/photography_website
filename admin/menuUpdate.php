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
                        <h5>Menü Güncelle</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
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

                            $menu = $db->query("SELECT * FROM menus WHERE id=$id", PDO::FETCH_ASSOC);

                        }

                        if (isset($_POST['menuUpdate'])) {
                            $menuName = $_POST['menuName'];
                            $orderNumber = $_POST['orderNumber'];
                            $position = $_POST['position'];
                            $id = $_GET['id'];
                            $swal = 'swal';

                            if (!$menuName) {
                                echo '<script>' . $swal . '("Lütfen formu eksiksiz doldurun !", "", "warning");</script>';
                            } elseif (!$orderNumber) {
                                echo '<script>' . $swal . '("Lütfen formu eksiksiz doldurun !", "", "warning");</script>';
                            } elseif (!$position) {
                                echo '<script>' . $swal . '("Lütfen formu eksiksiz doldurun !", "", "warning");</script>';
                            } else {
                                $query = $db->prepare('UPDATE menus SET menuName = ?, orderNumber = ?, position = ? WHERE id=' . $id);
                                $save = $query->execute([$menuName, $orderNumber, $position]);

                                if ($save) {

                                    echo '<script>' . $swal . '("Menü başarıyla güncellendi", "", "success");</script>';
                                    header('Refresh:3;url=menus.php');

                                } else {
                                    echo '<script>' . $swal . '("Beklenmedik Bir Hata Oldu!", "Lütfen Tekrar Deneyin", "error");</script>';
                                }
                            }
                        }
                        ?>
                        <form class="mx-5" method="post">
                            <?php foreach ($menu as $value) { ?>

                                <div class="form-group row"><label class="col-lg-2 col-form-label">Menü Adı</label>

                                    <div class="col-lg-6"><input type="text" name="menuName" value="<?= $value['menuName'] ?>"
                                            placeholder="Menü Adı" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row"><label class="col-lg-2 col-form-label">Sıra Numarası</label>

                                    <div class="col-lg-6"><input type="number" value="<?= $value['orderNumber'] ?>"
                                            name="orderNumber" placeholder="Sıra Numarası" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row"><label class="col-lg-2 col-form-label">Menü Konumu</label>

                                    <div class="col-lg-6">
                                        <select name="position" class="select2_demo_3 form-control">
                                            <option value="<?= $value['position'] ?>"><?= $value['position'] ?></option>
                                            <option <?php if ($value['position'] == 'Header') {
                                                echo "value='Footer'";
                                            } else {
                                                echo "value='Header'";
                                            } ?>><?php if ($value['position'] == 'Header') {
                                                 echo "Footer";
                                             } else {
                                                 echo "Header";
                                             } ?></option>

                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-lg-offset-2 col-lg-10 d-flex justify-content-center">
                                        <button name="menuUpdate" class="btn btn-primary w-25" type="submit">Güncelle</button>
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