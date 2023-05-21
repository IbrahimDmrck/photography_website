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

            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Hizmetler Sayfası Fotoğrafları</h5>
                        <div class="ibox-tools">

                        

                            <a  class=" btn btn-primary text-white btn-sm" data-style="zoom-in"
                                        title="menü ekle" style="font-size: 1rem;" data-toggle="modal"
                                        data-target="#servicePhotoAddModal" type="button">
                                        Fotoğraf Ekle
                                    </a>
 
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><button class="dropdown-item"
                                data-toggle="modal"
                                data-target="#servicePhotoAddModal" type="button">Fotoğraf Ekle</button>
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
                                        <th>Fotoğraf</th>
                                        <th>Sil</th>
                                        <th>Güncelle</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php
                                    $servicesPhoto = $db->query("SELECT * FROM servicesPhoto", PDO::FETCH_ASSOC);
                                    if (isset($_GET['servicePhoto'])) {
                                        $id = $_GET['servicePhoto'];
                                        $swal = 'swal';

                                        $check = $db->prepare('SELECT * FROM servicesPhoto WHERE id = :id');
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

                                        $deleteServicePhoto = $db->query("DELETE FROM servicesPhoto WhERE id=$id", PDO::FETCH_ASSOC);
                                        $delete = $deleteServicePhoto->execute();

                                        if ($delete) {

                                            echo '<script>' . $swal . '("Yetenek Başarıyla Silindi", "", "success");</script>';
                                            header('Refresh:2; ourService.php');

                                        } else {
                                            echo '<script>' . $swal . '("Beklenmedik Bir Hata Oldu", "Lütfen Tekrar Deneyin", "error");</script>';
                                        }
                                    }
                                    ?>
                                    <?php if (isset($servicesPhoto)) {

                                        foreach ($servicesPhoto as $SValue) {

                                            ?>

                                            <tr>
                                                <td class="sphoto_id" hidden><?=$SValue['id']?></td>
                                                <td>
                                                    <a href="../../public/uploads/<?=$SValue['imageR']?>" target="_blank"><img src="../../public/uploads/<?=$SValue['imageR']?>" class="img-fluid" width="100" height="100" alt="fotoğraf yok"></a>
                                                    <a href="../../public/uploads/<?=$SValue['imageL']?>" target="_blank"><img src="../../public/uploads/<?=$SValue['imageL']?>" class="img-fluid" width="100" height="100" alt="fotoğraf yok"></a>
                                                </td>

                                                

                                                <td><a href="?servicePhoto=<?= $SValue['id'] ?>" name="delete"
                                                        class="ladda-button ladda-button-demo-delete btn btn-danger text-white"
                                                        data-style="zoom-in" title="sil"><i class="fa fa-times"></i></a></td>
                                                <td><button  name="update"
                                                        class="edit_sphoto btn btn-warning text-white"
                                                         title="güncelle" data-toggle="modal"
                                        data-target="#servicePhotoUpdateModal" type="button"><i class="fa fa-edit"></i></button> </td>
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

              <!--Service Page Photo Add Modal -->
              <div class="modal fade" id="servicePhotoAddModal" tabindex="-1" role="dialog"
                                    aria-labelledby="servicePhotoAddModalTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="servicePhotoAddModalTitle">Hizmetler Sayfası Fotoğraf Ekle</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <?php
                                            if (isset($_POST['servicePhotoAdd'])) {
                                              
                                                $swal = 'swal';
                                                $foto = $_FILES['imageR']['name'];
                                                $foto1 = $_FILES['imageL']['name'];

                                                if ($foto != null) {

                                                    $tmp_name = $_FILES["imageR"]['tmp_name'];
                                                    $fileName = $_FILES["imageR"]['name'];
                                                    $size = $_FILES["imageR"]['size'];
                                                    $type = $_FILES["imageR"]['type'];

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

                                                if ($foto1 != null) {

                                                    $tmp_name1 = $_FILES["imageL"]['tmp_name'];
                                                    $fileName1 = $_FILES["imageL"]['name'];
                                                    $size1 = $_FILES["imageL"]['size'];
                                                    $type1 = $_FILES["imageL"]['type'];

                                                    $extension1 = substr($fileName1, -4, 4);

                                                    $randomNo1 = rand(10000, 50000);
                                                    $randomNoSec1 = rand(10000, 50000);

                                                    $photo_name1 = $randomNo1 . $randomNoSec1 . $extension1;
                                                    $destinationFolder1 = "../../public/uploads/";
                                                    move_uploaded_file($tmp_name1, "$destinationFolder1" . "$photo_name1");

                                                    if (!$fileName1) {
                                                        echo '<script>' . $swal . '("Herhangi bir değişiklik yapmadınız !", "", "warning");</script>';
                                                    } elseif ($size1 > (1024 * 1024 * 3)) {
                                                        echo '<script>' . $swal . '("Fotoğraf boyutu çok fazla !", "", "warning");</script>';
                                                    } elseif (($type1 != 'image/jpeg' && $type1 != 'image/png' && $type1 != '.jpg')) {
                                                        echo '<script>' . $swal . '("Dosya uzantısı jpeg,jpg veya png olabilir !", "", "warning");</script>';
                                                    }

                                                } else {
                                                    $photo_name1 = "";
                                                }

                                                if (($type != 'image/jpeg' && $type != 'image/png' && $type != '.jpg')||($type1 != 'image/jpeg' && $type1 != 'image/png' && $type1 != '.jpg')) {
                                                    echo '<script>' . $swal . '("Dosya uzantısı jpeg,jpg veya png olabilir !", "", "warning");</script>';
                                                } else {

                                                   

                                                    $query = $db->prepare('INSERT INTO servicesphoto SET imageR = ?, imageL = ?');
                                                    $save = $query->execute([$photo_name,$photo_name1]);

                                                    if ($save) {
                                                        echo '<script>' . $swal . '("Fotoğraf başarıyla eklendi", "", "success");</script>';
                                                        header('Refresh:3;url=gallery.php');

                                                    } else {
                                                        echo '<script>' . $swal . '("Beklenmedik Bir Hata Oldu!", "Lütfen Tekrar Deneyin", "error");</script>';
                                                    }
                                                }
                                            }
                                            ?>
                                              <form action="" method="post" enctype="multipart/form-data">
                                                <div class="modal-body">

                                                   
                                                    <label class="mt-3"><b>Fotoğraf-1 :</b></label>
                                                    <div class=" custom-file ">
                                                        <input id="imageR" type="file" name="imageR" class="custom-file-input">
                                                        <label for="imageR" class="custom-file-label">Fotoğraf Seçin</label>
                                                    </div>

                                                    <label class="mt-3"><b>Fotoğraf-2 :</b></label>
                                                    <div class=" custom-file ">
                                                        <input id="imageL" type="file" name="imageL" class="custom-file-input">
                                                        <label for="imageL" class="custom-file-label">Fotoğraf Seçin</label>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
                                                    <button type="submit" name="servicePhotoAdd" class="btn btn-primary">Kaydet</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                  <!--Service Page Photo Update Modal -->
                             <div class="modal fade" id="servicePhotoUpdateModal" tabindex="-1" role="dialog"
                                    aria-labelledby="servicePhotoUpdateModalTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="servicePhotoUpdateModalTitle">Hizmetler Sayfası Fotoğraf Güncelle</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <?php
                                            if (isset($_POST['servicePhotoUpdate'])) {
                                                $id = $_POST['id'];
                                                $swal = 'swal';
                                                $foto = $_FILES['imageR']['name'];
                                                $foto1 = $_FILES['imageL']['name'];

                                                if ($foto != null) {

                                                    $tmp_name = $_FILES["imageR"]['tmp_name'];
                                                    $fileName = $_FILES["imageR"]['name'];
                                                    $size = $_FILES["imageR"]['size'];
                                                    $type = $_FILES["imageR"]['type'];

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
                                                    }else{
                                                        $check = $db->prepare('SELECT * FROM servicesphoto WHERE id = :id');
                                                        $check->execute([":id" => $id]);
                                                        $get_sphoto = $check->fetch(PDO::FETCH_ASSOC);
                                                        $check_exist = $check->rowCount();
                        
                                                        $old_photo = $get_sphoto["imageR"];

                                                        if ($old_photo != "" || $old_photo != null) {
                                                            unlink("../../public/uploads/" . $old_photo);
                                                        }
                                                    }

                                                } else {$check = $db->prepare('SELECT * FROM servicesphoto WHERE id = :id');
                                                    $check->execute([":id" => $id]);
                                                    $get_sphoto = $check->fetch(PDO::FETCH_ASSOC);
                                                    $check_exist = $check->rowCount();
                    
                                                    $old_photo = $get_sphoto["imageR"];
                                                               
                                                    $photo_name =  $old_photo;
                                                }

                                                if ($foto1 != null) {

                                                    $tmp_name1 = $_FILES["imageL"]['tmp_name'];
                                                    $fileName1 = $_FILES["imageL"]['name'];
                                                    $size1 = $_FILES["imageL"]['size'];
                                                    $type1 = $_FILES["imageL"]['type'];

                                                    $extension1 = substr($fileName1, -4, 4);

                                                    $randomNo1 = rand(10000, 50000);
                                                    $randomNoSec1 = rand(10000, 50000);

                                                    $photo_name1 = $randomNo1 . $randomNoSec1 . $extension1;
                                                    $destinationFolder1 = "../../public/uploads/";
                                                    move_uploaded_file($tmp_name1, "$destinationFolder1" . "$photo_name1");

                                                    if (!$fileName1) {
                                                        echo '<script>' . $swal . '("Herhangi bir değişiklik yapmadınız !", "", "warning");</script>';
                                                    } elseif ($size1 > (1024 * 1024 * 3)) {
                                                        echo '<script>' . $swal . '("Fotoğraf boyutu çok fazla !", "", "warning");</script>';
                                                    } elseif (($type1 != 'image/jpeg' && $type1 != 'image/png' && $type1 != '.jpg')) {
                                                        echo '<script>' . $swal . '("Dosya uzantısı jpeg,jpg veya png olabilir !", "", "warning");</script>';
                                                    }else{
                                                        $check = $db->prepare('SELECT * FROM servicesphoto WHERE id = :id');
                                                        $check->execute([":id" => $id]);
                                                        $get_sphoto = $check->fetch(PDO::FETCH_ASSOC);
                                                        $check_exist = $check->rowCount();
                        
                                                        $old_photo1 = $get_sphoto["imageL"];

                                                        if ($old_photo1 != "" || $old_photo1 != null) {
                                                            unlink("../../public/uploads/" . $old_photo);
                                                        }
                                                    }

                                                } else {
                                                    $check = $db->prepare('SELECT * FROM servicesphoto WHERE id = :id');
                                                    $check->execute([":id" => $id]);
                                                    $get_sphoto = $check->fetch(PDO::FETCH_ASSOC);
                                                    $check_exist = $check->rowCount();
                    
                                                    $old_photo1 = $get_sphoto["imageL"];
                                                               
                                                    $photo_name1 =  $old_photo1;
                                                }

                                                if (($type != 'image/jpeg' && $type != 'image/png' && $type != '.jpg')||($type1 != 'image/jpeg' && $type1 != 'image/png' && $type1 != '.jpg')) {
                                                    echo '<script>' . $swal . '("Dosya uzantısı jpeg,jpg veya png olabilir !", "", "warning");</script>';
                                                } else {

                                                    

                                                    $query = $db->prepare('UPDATE servicesphoto SET imageR = ?, imageL = ? WHERE id = ? ');
                                                    $save = $query->execute([$photo_name,$photo_name1,$id]);

                                                    if ($save) {
                                                        echo '<script>' . $swal . '("Fotoğraf başarıyla eklendi", "", "success");</script>';
                                                        header('Refresh:3;url=gallery.php');

                                                    } else {
                                                        echo '<script>' . $swal . '("Beklenmedik Bir Hata Oldu!", "Lütfen Tekrar Deneyin", "error");</script>';
                                                    }
                                                }
                                            }
                                            ?>
                                              <form action="" method="post" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                <input type="hidden" name="id" id="idServiceP" class="form-control mb-3">
                                                   
                                                    <label class="mt-3"><b>Fotoğraf-1 :</b></label>
                                                    <div class=" custom-file ">
                                                        <input id="imageR" type="file" name="imageR" class="custom-file-input">
                                                        <label for="imageR" class="custom-file-label">Fotoğraf Seçin</label>
                                                    </div>

                                                    <label class="mt-3"><b>Fotoğraf-2 :</b></label>
                                                    <div class=" custom-file ">
                                                        <input id="imageL" type="file" name="imageL" class="custom-file-input">
                                                        <label for="imageL" class="custom-file-label">Fotoğraf Seçin</label>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
                                                    <button type="submit" name="servicePhotoUpdate" class="btn btn-primary">Kaydet</button>
                                                </div>
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