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

                            <a href="menuAdd.php" class="ladda-button ladda-button-demo-add btn btn-primary text-white btn-sm"  data-style="zoom-in" title="menü ekle" style="font-size: 1rem;">
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
                            <table  class="table table-striped table-bordered table-hover dataTables-example">
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
                                    <?php
                                    $menus=$db->query("SELECT * FROM menus",PDO::FETCH_ASSOC);
                                    if (isset($_GET['id'])) {
                                        $id=$_GET['id'];
                                        $swal = 'swal';
                                        $deleteMenu=$db->query("DELETE FROM menus WhERE Id=$id",PDO::FETCH_ASSOC);
                                        $delete= $deleteMenu->execute();

                                        if ($delete) {
       
                                            echo '<script>' . $swal . '("Menü Başarıyla Silindi", "", "success");</script>';
                                            header('Refresh:2; menus.php');
                                      
                                          } else {
                                            echo '<script>' . $swal . '("Beklenmedik Bir Hata Oldu", "Lütfen Tekrar Deneyin", "error");</script>';
                                          }
                                    }
                                    ?>
                                    <?php if (isset($menus)) {
                                        
                                        foreach ($menus as $menuValue) {
                                            
                                        ?>
                                        
                                        <tr>
                                        <td><?= $menuValue['menuName'] ?></td>
                                        <td><?= $menuValue['orderNumber'] ?></td>
                                        <td><?= $menuValue['position'] ?></td>
                                        <td><a href="?id=<?= $menuValue['Id'] ?>" name="delete" class="ladda-button ladda-button-demo-delete btn btn-danger text-white"  data-style="zoom-in" title="sil"><i class="fa fa-times"></i></a></td>
                                        <td><a name="update" class="ladda-button ladda-button-demo-update btn btn-warning text-white"  data-style="zoom-in" title="güncelle"><i class="fa fa-edit"></i></a></td>
                                    </tr>
                                  <?php }} else {?>
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