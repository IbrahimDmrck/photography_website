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
                                    <button class="btn btn-primary text-white btn-sm" data-style="zoom-in" title="menü ekle"
                                        style="font-size: 1rem;" data-toggle="modal" data-target="#photoAddModalCenter"
                                        type="button">
                                        Fotoğraf Ekle
                                    </button>

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
                                    <table class="table table-striped table-bordered table-hover dataTables-example">
                                        <thead>
                                            <tr>
                                            <th hidden>id</th>
                                                <th>#</th>
                                                <th>Fotoğraf Adı</th>
                                                <th>Kategori</th>
                                                <th>Sil</th>
                                                <th>Güncelle</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $photos = $db->query("SELECT * FROM photos", PDO::FETCH_ASSOC);
                                            if (isset($_GET['photo'])) {
                                                $id = $_GET['photo'];
                                                $swal = 'swal';
                                                $deletePhoto = $db->query("DELETE FROM photos WhERE id=$id", PDO::FETCH_ASSOC);
                                                $delete = $deletePhoto->execute();

                                                if ($delete) {

                                                    echo '<script>' . $swal . '("Fotoğraf Başarıyla Silindi", "", "success");</script>';
                                                    header('Refresh:2;gallery.php');

                                                } else {
                                                    echo '<script>' . $swal . '("Beklenmedik Bir Hata Oldu", "Lütfen Tekrar Deneyin", "error");</script>';
                                                }

                                            }
                                            ?>
                                            <?php if (isset($photos)) {
                                                foreach ($photos as $photo) {
                                                    ?>
                                                    <tr class="gradeX">
                                                         <td hidden class="photo_id">
                                                            <?= $photo['id'] ?>
                                                        </td>
                                                        <td><a href="../../public/uploads/<?= $photo['photoName'] ?>"
                                                                target="_blank"><img
                                                                    src="../../public/uploads/<?= $photo['photoName'] ?>"
                                                                    class="img-fluid" width="100" height="100"
                                                                    alt="<?= $photo['name'] ?>" title="<?= $photo['name'] ?>"></a>
                                                        </td>
                                                        <td>
                                                            <?= $photo['name'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $photo['categories'] ?>
                                                        </td>

                                                        <td class="center"><a href="?photo=<?= $photo['id'] ?>" name="delete"
                                                                class="ladda-button ladda-button-demo-delete btn btn-danger text-white"
                                                                data-style="zoom-in" title="sil"><i class="fa fa-times"></i></a>
                                                        </td>
                                                        <td class="center"><button
                                                                name="update"
                                                                class="edit_photo_btn btn btn-warning text-white"
                                                                data-style="zoom-in" title="güncelle" data-toggle="modal" data-target="#photoUpdateModalCenter" type="button"
                                                            ><i class="fa fa-edit"></i></button>
                                                        </td>
                                                    </tr>
                                                <?php }
                                            } ?>

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
                                    <a href="category.php" class=" btn btn-primary text-white btn-sm" data-style="zoom-in"
                                        title="menü ekle" style="font-size: 1rem;" data-toggle="modal"
                                        data-target="#exampleModalCenter" type="button">
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
                                    <table class="table table-striped table-bordered table-hover dataTables-example">
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
                                            if (isset($_GET['category'])) {
                                                $id = $_GET['category'];
                                                $swal = 'swal';
                                                $deletePhoto = $db->query("DELETE FROM categories WhERE id=$id", PDO::FETCH_ASSOC);
                                                $delete = $deletePhoto->execute();

                                                if ($delete) {

                                                    echo '<script>' . $swal . '("Kategori başarıyla Silindi", "", "success");</script>';
                                                    header('Refresh:2;gallery.php');

                                                } else {
                                                    echo '<script>' . $swal . '("Beklenmedik Bir Hata Oldu", "Lütfen Tekrar Deneyin", "error");</script>';
                                                }

                                            }
                                            ?>
                                            <?php if (isset($categories)) {
                                                foreach ($categories as $category) {
                                                    ?>
                                                    <tr class="gradeX">
                                                        <td class="category_id">
                                                            <?= $category['id'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $category['name'] ?>
                                                        </td>
                                                        <td class="center"><a href="?category=<?= $category['id'] ?>" name="delete"
                                                                class="ladda-button ladda-button-demo-delete btn btn-danger text-white"
                                                                data-style="zoom-in" title="sil"><i class="fa fa-times"></i></a>
                                                        </td>
                                                        <td class="center"><button href="" name="update"
                                                                class="edit_btn btn btn-warning text-white" data-style="zoom-in"
                                                                title="güncelle" data-toggle="modal"
                                                                data-target="#categoryUpdateModal" type="button"><i
                                                                    class="fa fa-edit"></i></button></td>
                                                    </tr>

                                                <?php }
                                            } ?>
                                            </tfoot>
                                    </table>
                                </div>

                                <!--Photo Add Modal -->
                                <div class="modal fade" id="photoAddModalCenter" tabindex="-1" role="dialog"
                                    aria-labelledby="photoAddModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="photoAddModalCenterTitle">Fotoğraf Ekle</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <?php
                                            if (isset($_POST['photoAdd'])) {
                                                $name = $_POST['name'];
                                                $categories = $_POST['categories'];
                                                $swal = 'swal';

                                                $foto = $_FILES['photoName']['name'];

                                                if ($foto != null) {

                                                    $tmp_name = $_FILES["photoName"]['tmp_name'];
                                                    $fileName = $_FILES["photoName"]['name'];
                                                    $size = $_FILES["photoName"]['size'];
                                                    $type = $_FILES["photoName"]['type'];

                                                    $extension = substr($fileName, -4, 4);

                                                    $randomNo = rand(10000, 50000);
                                                    $randomNoSec = rand(10000, 50000);

                                                    $photo_name = $randomNo . $randomNoSec . $extension;
                                                    $destinationFolder = "../../public/uploads/";
                                                    move_uploaded_file($tmp_name, "$destinationFolder" . "$photo_name");

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

                                                if (!$name) {
                                                    echo '<script>' . $swal . '("Herhangi bir fotoğraf yüklemediniz!", "", "warning");</script>';
                                                } elseif (!$categories) {
                                                    echo '<script>' . $swal . '("Lütfen en az bir kategori seçiniz!", "", "warning");</script>';
                                                }elseif ($type != 'image/jpeg' && $type != 'image/png' && $type != '.jpg') {
                                                    echo '<script>' . $swal . '("Dosya uzantısı jpeg,jpg veya png olabilir !", "", "warning");</script>';
                                                } else {

                                                    foreach ($categories as $value) {
                                                        $ctg .= $value . ',';
                                                    }

                                                    $query = $db->prepare('INSERT INTO photos SET name = ?, photoName = ?, categories = ?');
                                                    $save = $query->execute([$name, $photo_name, $ctg]);

                                                    if ($save) {
                                                        echo '<script>' . $swal . '("Fotoğraf başarıyla eklendi", "", "success");</script>';
                                                        header('Refresh:3;url=gallery.php');

                                                    } else {
                                                        echo '<script>' . $swal . '("Beklenmedik Bir Hata Oldu!", "Lütfen Tekrar Deneyin", "error");</script>';
                                                    }
                                                }
                                            }
                                            $categories = $db->query("SELECT * FROM categories", PDO::FETCH_ASSOC);
                                            ?>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div class="modal-body">

                                                    <label for="category"><b>Fotoğraf adı :</b></label>
                                                    <input type="text" name="name" id="name" class="form-control mb-3"
                                                        placeholder="Fotoğraf adı">

                                                    <label class="font-normal" class="mt-3"><b>Kategori Seçin</b></label>

                                                    <select 
                                                        name="categories[]"  multiple="multiple" data-placeholder="Lütfen en az bir kategori seçiniz" >
                                                        <?php if (isset($categories)) {
                                                            foreach ($categories as $categoryValue) { ?>


                                                                <option value="<?= $categoryValue['name'] ?>">
                                                                    <?= $categoryValue['name'] ?>
                                                                </option>

                                                            <?php }
                                                        } ?>
                                                    </select>

                                                    <label class="mt-3"><b>Yüklenecek Fotoğraf :</b></label>
                                                    <div class=" custom-file ">
                                                        <input id="photoName" type="file" name="photoName"
                                                            class="custom-file-input">
                                                        <label for="photoName" class="custom-file-label">Fotoğraf
                                                            Seçin</label>

                                                    </div>



                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">İptal</button>
                                                    <button type="submit" name="photoAdd"
                                                        class="btn btn-primary">Kaydet</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!--Photo Update Modal -->
                                <div class="modal fade" id="photoUpdateModalCenter" tabindex="-1" role="dialog"
                                    aria-labelledby="photoUpdateModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="photoUpdateModalCenterTitle">Fotoğraf Güncelle</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <?php
                                            if (isset($_POST['photoUpdate'])) {
                                                $id = $_POST['id'];
                                                $name = $_POST['name'];
                                                $categories = $_POST['categories'];
                                                $swal = 'swal';

                                                $foto = $_FILES['photoName']['name'];

                                                if ($foto != null) {

                                                    $tmp_name = $_FILES["photoName"]['tmp_name'];
                                                    $fileName = $_FILES["photoName"]['name'];
                                                    $size = $_FILES["photoName"]['size'];
                                                    $type = $_FILES["photoName"]['type'];

                                                    $extension = substr($fileName, -4, 4);

                                                    $randomNo = rand(10000, 50000);
                                                    $randomNoSec = rand(10000, 50000);

                                                    $photo_name = $randomNo . $randomNoSec . $extension;
                                                    $destinationFolder = "../../public/uploads/";
                                                    move_uploaded_file($tmp_name, "$destinationFolder" . "$photo_name");
                                                    
                                                    if (!$fileName) {
                                                        echo '<script>' . $swal . '("Herhangi bir değişiklik yapmadınız !", "", "warning");</script>';
                                                    } elseif ($size > (1024 * 1024 * 3)) {
                                                        echo '<script>' . $swal . '("Fotoğraf boyutu çok fazla !", "", "warning");</script>';
                                                    } elseif ($type != 'image/jpeg' && $type != 'image/png' && $type != '.jpg') {
                                                   
                                                            echo '<script>' . $swal . '("Dosya uzantısı jpeg,jpg veya png olabilir !", "", "warning");</script>';
                                                    
                                                    }else{
                                                        $check = $db->prepare('SELECT * FROM photos WHERE id = :id');
                                                        $check->execute([":id" => $id]);
                                                        $get_photo = $check->fetch(PDO::FETCH_ASSOC);
                                                        $check_exist = $check->rowCount();
                        
                                                        $old_photo = $get_photo["photoName"];

                                                        if ($old_photo != "" || $old_photo != null) {
                                                            unlink("../../public/uploads/" . $old_photo);
                                                        }
                                                    }

                                                } else {

                                                    $check = $db->prepare('SELECT * FROM photos WHERE id = :id');
                                                    $check->execute([":id" => $id]);
                                                    $get_photo = $check->fetch(PDO::FETCH_ASSOC);
                                                    $check_exist = $check->rowCount();
                    
                                                    $old_photo = $get_photo["photoName"];
                                                               
                                                    $photo_name =  $old_photo;
                                                   
                                                }

                                                if (!$name) {
                                                    echo '<script>' . $swal . '("Herhangi bir fotoğraf yüklemediniz!", "", "warning");</script>';
                                                } elseif (!$categories) {
                                                    echo '<script>' . $swal . '("Lütfen en az bir kategori seçiniz!", "", "warning");</script>';
                                                }elseif ($type != 'image/jpeg' && $type != 'image/png' && $type != '.jpg') {
                                                    
                                                        echo '<script>' . $swal . '("Dosya uzantısı jpeg,jpg veya png olabilir !", "", "warning");</script>';
                                               
                                                } else {

                                                    foreach ($categories as $value) {
                                                        $ctg .= $value . ',';
                                                    }

                                                    $query = $db->prepare('UPDATE photos SET name = ?, photoName = ?, categories = ? WHERE id = ?');
                                                    $save = $query->execute([$name, $photo_name, $ctg, $id]);

                                                    if ($save) {
                                                        echo '<script>' . $swal . '("Fotoğraf başarıyla güncellendi", "", "success");</script>';
                                                        header('Refresh:3;url=gallery.php');

                                                    } else {
                                                        echo '<script>' . $swal . '("Beklenmedik Bir Hata Oldu!", "Lütfen Tekrar Deneyin", "error");</script>';
                                                    }
                                                }
                                            }
                                            $categories = $db->query("SELECT * FROM categories", PDO::FETCH_ASSOC);
                                            ?>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div class="modal-body">

                                                    <label for="category"><b>Fotoğraf adı :</b></label>
                                                    <input type="hidden" name="id" id="id" class="form-control mb-3">
                                                    <input type="text" name="name" id="name" class="form-control mb-3">

                                                    <label class="font-normal" class="mt-3"><b>Kategori Seçin</b></label>

                                                    <select name="categories[]"  multiple="multiple" data-placeholder="Lütfen en az bir kategori seçiniz">
                                                        <?php if (isset($categories)) {
                                                            foreach ($categories as $categoryValue) { ?>


                                                                <option value="<?= $categoryValue['name'] ?>">
                                                                    <?= $categoryValue['name'] ?>
                                                                </option>

                                                            <?php }
                                                        } ?>
                                                    </select>

                                                    <label class="mt-3"><b>Yüklenecek Fotoğraf :</b></label>
                                                    <div class=" custom-file ">
                                                        <input id="photoName" type="file" name="photoName"
                                                            class="custom-file-input" value="">
                                                        <label for="photoName" class="custom-file-label">Fotoğraf
                                                            Seçin</label>

                                                    </div>



                                                </div>
                                                <div class="modal-footer">
                                                    <span >Fotoğrafı güncelleyebilmek için en az 1 tane kategori seçmelisiniz</span>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">İptal</button>
                                                    <button type="submit" name="photoUpdate"
                                                        class="btn btn-primary">Kaydet</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!--Category Add Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                $name = $_POST['name'];
                                                $swal = 'swal';

                                                if (!$name) {
                                                    echo '<script>' . $swal . '("Lütfen bir kategori adı giriniz!", "", "warning");</script>';
                                                } else {
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
                                                    <input type="text" name="name" id="category" class="form-control"
                                                        placeholder="Kategori adı">

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">İptal</button>
                                                    <button type="submit" name="categoryAdd"
                                                        class="btn btn-primary">Kaydet</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <?php

                                if (isset($_POST['categoryUpdate'])) {
                                    $id = $_POST['iddegeri'];
                                    $name = $_POST['name'];
                                    $swal = 'swal';

                                    $guncelle = $db->prepare("UPDATE categories SET name = :name WHERE id = :id");
                                    $guncelle->execute([":name" => $name, ":id" => $id]);

                                    if ($guncelle) {
                                        echo '<script>' . $swal . '("Kategori başarıyla güncellendi ","", "success");</script>';
                                        header('Refresh:3;');
                                    } else {
                                        echo '<script>' . $swal . '("Beklenmedik bir hata oluştu  !", "", "error");</script>';
                                    }

                                }

                                ?>

                                <!--Category Update Modal -->
                                <div class="modal fade" id="categoryUpdateModal" tabindex="-1" role="dialog"
                                    aria-labelledby="categoryUpdateModalTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="exampleModalCenterTitle">Kategori Güncelle</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <form action="" method="post">
                                                <div class="modal-body">

                                                    <label for="category">Kategori adı :</label>
                                                    <input type="text" name="name" id="name" class="form-control" value="">
                                                    <input type="hidden" id="iddegeri" name="iddegeri" class="form-control"
                                                        value="">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">İptal</button>
                                                    <button type="submit" name="categoryUpdate"
                                                        class="btn btn-primary">Kaydet</button>
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
} else {
    header("location:login.php");
}
?>