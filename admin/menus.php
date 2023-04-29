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
                        <h5>Menüler</h5>
                        <div class="ibox-tools">

                            <a href="menuAdd.php" class="ladda-button ladda-button-demo-add btn btn-primary text-white"  data-style="zoom-in" title="menü ekle" style="font-size: 1rem;">
                                Menü Ekle
                            </a>

                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="menuadd.php" class="dropdown-item">Menü Ekle</a>
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
                                        <th>Menü Adı</th>
                                        <th>Sıra Numarası</th>
                                        <th>Menü Konumu</th>
                                        <th>Sil</th>
                                        <th>Güncelle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Trident</td>
                                        <td>Internet
                                            Explorer 4.0
                                        </td>
                                        <td>Win 95+</td>
                                        <td><a name="delete" class="ladda-button ladda-button-demo-delete btn btn-danger text-white"  data-style="zoom-in" title="sil"><i class="fa fa-times"></i></a></td>
                                        <td><a name="update" class="ladda-button ladda-button-demo-update btn btn-warning text-white"  data-style="zoom-in" title="güncelle"><i class="fa fa-edit"></i></a></td>
                                    </tr>


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Menü Adı</th>
                                        <th>Sıra Numarası</th>
                                        <th>Menü Konumu</th>
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