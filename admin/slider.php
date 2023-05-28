<?php
error_reporting(0);
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

                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h4>Slider</h4>
                                <div class="ibox-tools">
                                    <button class="btn btn-primary text-white btn-sm" data-style="zoom-in" title="menü ekle"
                                        style="font-size: 1rem;" data-toggle="modal" data-target="#photoAddModalCenter"
                                        type="button">
                                        Slide Ekle
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
                                                <th>Slide Adı</th>
                                                <th>Sil</th>
                                                <th>Güncelle</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sliders = $db->query("SELECT * FROM sliders", PDO::FETCH_ASSOC);
                                            if (isset($_GET['slide'])) {
                                                $id = $_GET['slide'];
                                                $swal = 'swal';

                                                $check = $db->prepare('SELECT * FROM sliders WHERE id = :id');
                                                $check->execute([":id" => $id]);
                                                $get_slider = $check->fetch(PDO::FETCH_ASSOC);
                                                $check_exist = $check->rowCount();
        
                                                $old_photo = $get_slider["slide"];
                                              
                                       
        
                                                if ($old_photo != "" || $old_photo != null) {
                                                    unlink("../../public/uploads/" . $old_photo);
                                                }
                                                
                                                $deleteSlide = $db->query("DELETE FROM sliders WhERE id=$id", PDO::FETCH_ASSOC);
                                                $delete = $deleteSlide->execute();

                                                if ($delete) {

                                                    echo '<script>' . $swal . '("Slider Başarıyla Silindi", "", "success");</script>';
                                                    header('Refresh:2');

                                                } else {
                                                    echo '<script>' . $swal . '("Beklenmedik Bir Hata Oldu", "Lütfen Tekrar Deneyin", "error");</script>';
                                                }

                                            }
                                            ?>
                                            <?php if (isset($sliders)) {
                                                foreach ($sliders as $slider_photo) {
                                                    ?>
                                                    <tr class="gradeX">
                                                         <td hidden class="slide_id">
                                                            <?= $slider_photo['id'] ?>
                                                        </td>
                                                        <td><a href="../../public/uploads/<?= $slider_photo['slide'] ?>"
                                                                target="_blank"><img
                                                                    src="../../public/uploads/<?= $slider_photo['slide'] ?>"
                                                                    class="img-fluid" width="100" height="100"
                                                                    alt="<?= $slider_photo['slide_name'] ?>" title="<?= $slider_photo['slide_name'] ?>"></a>
                                                        </td>
                                                        <td>
                                                            <?= $slider_photo['slide_name'] ?>
                                                        </td>
                                                        

                                                        <td class="center"><a href="?slide=<?= $slider_photo['id'] ?>" name="delete"
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
                   

                     <!--Photo Add Modal -->
                     <div class="modal fade" id="photoAddModalCenter" tabindex="-1" role="dialog"
                                    aria-labelledby="photoAddModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="photoAddModalCenterTitle">Slide Ekle</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <?php
                                            if (isset($_POST['photoAdd'])) {
                                                $name = $_POST['name'];                                              
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
                                                } elseif ($type != 'image/jpeg' && $type != 'image/png' && $type != '.jpg') {
                                                    echo '<script>' . $swal . '("Dosya uzantısı jpeg,jpg veya png olabilir !", "", "warning");</script>';
                                                } else {

      
                                                    $query = $db->prepare('INSERT INTO sliders SET slide_name = ?, 	slide = ?');
                                                    $save = $query->execute([$name, $photo_name]);

                                                    if ($save) {
                                                        echo '<script>' . $swal . '("Slider Fotoğrafı başarıyla eklendi", "", "success");</script>';
                                                        header('Refresh:3');

                                                    } else {
                                                        echo '<script>' . $swal . '("Beklenmedik Bir Hata Oldu!", "Lütfen Tekrar Deneyin", "error");</script>';
                                                    }
                                                }
                                            }
                                          
                                            ?>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div class="modal-body">

                                                    <label for="category"><b>Slide adı :</b></label>
                                                    <input type="text" name="name" id="name" class="form-control mb-3"
                                                        placeholder="Slide adı">

                                                    

                          

                                                    <label class="mt-3"><b>Yüklenecek Fotoğraf :</b></label>
                                                    <div class=" custom-file ">
                                                        <input id="photoName" type="file" name="photoName"
                                                            class="custom-file-input">
                                                        <label for="photoName" class="custom-file-label">Fotoğraf
                                                            Seçin</label>

                                                    </div>



                                                </div>
                                                <div class="modal-footer">
                                                <strong>Slider Fotoğrafları " 1500x900 " pixel boyutunda olmalıdır</strong>
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
                                                <h3 class="modal-title" id="photoUpdateModalCenterTitle">Slide Güncelle</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <?php
                                            if (isset($_POST['photoUpdate'])) {
                                                $id = $_POST['id'];
                                                $name = $_POST['name'];
                                              
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
                                                        $check = $db->prepare('SELECT * FROM sliders WHERE id = :id');
                                                        $check->execute([":id" => $id]);
                                                        $get_photo = $check->fetch(PDO::FETCH_ASSOC);
                                                        $check_exist = $check->rowCount();
                        
                                                        $old_photo = $get_photo["slide"];

                                                        if ($old_photo != "" || $old_photo != null) {
                                                            unlink("../../public/uploads/" . $old_photo);
                                                        }
                                                    }

                                                } else {

                                                    $check = $db->prepare('SELECT * FROM sliders WHERE id = :id');
                                                    $check->execute([":id" => $id]);
                                                    $get_photo = $check->fetch(PDO::FETCH_ASSOC);
                                                    $check_exist = $check->rowCount();
                    
                                                    $old_photo = $get_photo["slide"];
                                                               
                                                    $photo_name =  $old_photo;
                                                   
                                                }

                                                if (!$name) {
                                                    echo '<script>' . $swal . '("Herhangi bir fotoğraf yüklemediniz!", "", "warning");</script>';
                                                }elseif ($type != 'image/jpeg' && $type != 'image/png' && $type != '.jpg') {
                                                    
                                                        echo '<script>' . $swal . '("Dosya uzantısı jpeg,jpg veya png olabilir !", "", "warning");</script>';
                                               
                                                } else {

                                                  

                                                    $query = $db->prepare('UPDATE sliders SET slide_name = ?, 	slide = ? WHERE id = ?');
                                                    $save = $query->execute([$name, $photo_name, $id]);

                                                    if ($save) {
                                                        echo '<script>' . $swal . '("Slider Fotoğrafı başarıyla güncellendi", "", "success");</script>';
                                                        header('Refresh:3');

                                                    } else {
                                                        echo '<script>' . $swal . '("Beklenmedik Bir Hata Oldu!", "Lütfen Tekrar Deneyin", "error");</script>';
                                                    }
                                                }
                                            }
                                          
                                            ?>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div class="modal-body">

                                                    <label for="category"><b>Slide adı :</b></label>
                                                    <input type="hidden" name="id" id="id" class="form-control mb-3">
                                                    <input type="text" name="name" id="name" class="form-control mb-3">

                                                   

                                                    <label class="mt-3"><b>Yüklenecek Fotoğraf :</b></label>
                                                    <div class=" custom-file ">
                                                        <input id="photoName" type="file" name="photoName"
                                                            class="custom-file-input" value="">
                                                        <label for="photoName" class="custom-file-label">Fotoğraf
                                                            Seçin</label>

                                                    </div>



                                                </div>
                                                <div class="modal-footer">
                                                    <strong>Slider Fotoğrafları " 1500x900 " pixel boyutunda olmalıdır</strong>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">İptal</button>
                                                    <button type="submit" name="photoUpdate"
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

    <?php include('includes/footer.php');
} else {
    header("location:login.php");
}
?>