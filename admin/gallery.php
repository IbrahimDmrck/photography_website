<?php 
session_start();
require '../database/db_conn.php';
require 'ajax_post.php';
 if (isset($_SESSION['username'])) { 
include('includes/header.php'); ?>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content">
            <div class="row">
                
                <div class="col-lg-7">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h4>Fotoğraflar</h4>
                            <div class="ibox-tools">
                            <a href="photoAdd.php"
                                class="ladda-button ladda-button-demo-add btn btn-primary text-white btn-sm"
                                data-style="zoom-in" title="menü ekle" style="font-size: 1rem;">
                                Fotoğraf Ekle
                            </a>

                                <a class="collapse-link" href="">
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
                                <a class="close-link" href="">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Fotoğraf Başlığı</th>
                        <th>Kategori</th>
                        <th>Sil</th>
                        <th>Güncelle</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="gradeX">
                        <td>Trident</td>
                        <td>Internet
                            Explorer 4.0
                        </td>
                        
                        <td class="center"><a href="?id=<?= $pageValue['Id'] ?>" name="delete"
                                                        class="ladda-button ladda-button-demo-delete btn btn-danger text-white"
                                                        data-style="zoom-in" title="sil"><i class="fa fa-times"></i></a></td>
                        <td class="center"><a href="pageUpdate.php?id=<?= $pageValue['Id'] ?>" name="update"
                                                        class="ladda-button ladda-button-demo-update btn btn-warning text-white"
                                                        data-style="zoom-in" title="güncelle"><i class="fa fa-edit"></i></a></td>
                    </tr>
                  
                   
                    </tfoot>
                    </table>
                        </div>

                        </div>
                    </div>

                </div>
                <div class="col-lg-5">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h4>Kategoriler</h4>
                            <div class="ibox-tools">
                            <a href="category.php"
                                class=" btn btn-primary text-white btn-sm"
                                data-style="zoom-in" title="menü ekle" style="font-size: 1rem;"
                                data-toggle="modal" data-target="#exampleModalCenter" type="button">
                                Kategori Ekle
                            </a>

                                <a class="collapse-link" href="">
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
                                <a class="close-link" href="">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        
                        <div class="ibox-content ">

                         
                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                       
                    <th>#</th>
                        <th>Kategori Adı</th>
                        <th>Sil</th>
                        <th>Güncelle</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $categories = $db->query("SELECT * FROM categories", PDO::FETCH_ASSOC);
                        ?>
                        <?php if (isset($categories)) {
                            foreach ($categories as $category) {
                                ?>
                                <tr class="gradeX">
                                    <td class="category_id" ><?= $category['id'] ?></td>
                                    <td>
                                        <?= $category['name'] ?>
                                    </td>
                                    <td class="center"><a href="?id=<?= $category['id'] ?>" name="delete"
                                            class="ladda-button ladda-button-demo-delete btn btn-danger text-white" data-style="zoom-in" title="sil"><i
                                                class="fa fa-times"></i></a></td>
                                    <td class="center"><a href="" name="update"
                                            class="edit_btn btn btn-warning text-white" data-style="zoom-in"
                                            title="güncelle" data-toggle="modal" data-target="#categoryUpdateModal" type="button"><i class="fa fa-edit"></i></a></td>
                                </tr>
                    
                            <?php }
                        } ?>
                    </tfoot>
                    </table>
                        </div>
                          
                          <!--Add Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalCenterTitle">Kategori Ekle</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php
                            if (isset($_POST['categoryAdd'])) {
                                $name=$_POST['name'];
                                $swal = 'swal';

                                if (!$name) {
                                    echo '<script>' . $swal . '("Lütfen bir kategori adı giriniz!", "", "warning");</script>';
                                }else {
                                    $query = $db->prepare('INSERT INTO categories SET name = ?');
                                    $save = $query->execute([$name]);
    
                                    if ($save) {
                                        echo '<script>' . $swal . '("Kategori başarıyla eklendi", "", "success");</script>';
                                        header('Refresh:3;url=gallery.php');
    
                                    } else {
                                        echo '<script>' . $swal . '("Beklenmedik Bir Hata Oldu!", "Lütfen Tekrar Deneyin", "error");</script>';
                                    }
                                }
                            }
                            ?>
                            <form action="" method="post">
                            <div class="modal-body">
                               
                                    <label for="category">Kategori adı :</label>
                                    <input type="text" name="name" id="category" class="form-control" placeholder="Kategori adı">
                               
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
                                <button type="submit" name="categoryAdd" class="btn btn-primary">Kaydet</button>
                            </div>
                            </form>
                            </div>
                        </div>
                        </div>

                       

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<?php include('includes/footer.php'); 
}else {
    header("location:login.php");
  } 
?>