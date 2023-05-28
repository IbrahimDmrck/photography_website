<?php
error_reporting(0);
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
                        <h5>Hakkımda Bilgisi Ekle</h5>
                        <div class="ibox-tools">

                            <a href="aboutUs.php"
                                class="ladda-button ladda-button-demo-add btn btn-primary text-white btn-sm "
                                data-style="zoom-in" title="Hakkımda Bilgisi Ekle" style="font-size: 1rem;">
                                Geri Dön
                            </a>

                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <!-- <ul class="dropdown-menu dropdown-user">
                                <li><a href="pageAdd.php" class="dropdown-item">Hakkımda Bilgisi Ekle</a>
                                </li>

                            </ul> -->
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <form class="mx-5" method="post" enctype="multipart/form-data">
                            <?php
                            if (isset($_POST['aboutInfo'])) {
                                $sectionTitle = $_POST['sectionTitle'];
                                $aboutContent1 = $_POST['aboutContent1'];
                                $aboutContent2 = $_POST['aboutContent2'];
                                $aboutContent3 = $_POST['aboutContent3'];
                                $swal = 'swal';


                                $foto = $_FILES['content1Img']['name'];
                                $foto1 = $_FILES['content2Img']['name'];
                                $foto2 = $_FILES['content3Img']['name'];
                                $foto3 = $_FILES['sectionImg']['name'];
                                $foto4 = $_FILES['rightImg']['name'];
                                $foto5 = $_FILES['leftImg']['name'];

                                if ($foto != null) {


                                    $tmp_name = $_FILES["content1Img"]['tmp_name'];
                                    $fileName = $_FILES["content1Img"]['name'];
                                    $size = $_FILES["content1Img"]['size'];
                                    $type = $_FILES["content1Img"]['type'];

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

                                /*----------------- */

                                if ($foto1 != null) {
                                    /* ---------------------------------- */
                                    $tmp_name1 = $_FILES["content2Img"]['tmp_name'];
                                    $fileName1 = $_FILES["content2Img"]['name'];
                                    $size1 = $_FILES["content2Img"]['size'];
                                    $type1 = $_FILES["content2Img"]['type'];

                                    $extension1 = substr($fileName1, -4, 4);

                                    $randomNo1 = rand(10000, 50000);
                                    $randomNoSec1 = rand(10000, 50000);

                                    $photo_name1 = $randomNo1 . $randomNoSec1 . $extension1;
                                    $destinationFolder1 = "../../public/uploads/";
                                    move_uploaded_file($tmp_name1, "$destinationFolder1" . "$photo_name1");

                                    if (!$fileName1) {
                                        echo '<script>' . $swal . '("Değişiklikler kaydedildi !", "", "warning");</script>';
                                    } elseif ($size1 > (1024 * 1024 * 3)) {
                                        echo '<script>' . $swal . '("Fotoğraf boyutu çok fazla !", "", "warning");</script>';
                                    } elseif (($type1 != 'image/jpeg' && $type1 != 'image/png' && $type1 != '.jpg')) {
                                        echo '<script>' . $swal . '("Dosya uzantısı jpeg,jpg veya png olabilir !", "", "warning");</script>';
                                    } 

                                } else {                         
                                    $photo_name1 ="";
                                }

                                /*----------------- */

                                if ($foto2 != null) {
                                    /*-------------------------------- */
                                    $tmp_name2 = $_FILES["content3Img"]['tmp_name'];
                                    $fileName2 = $_FILES["content3Img"]['name'];
                                    $size2 = $_FILES["content3Img"]['size'];
                                    $type2 = $_FILES["content3Img"]['type'];

                                    $extension2 = substr($fileName2, -4, 4);

                                    $randomNo2 = rand(10000, 50000);
                                    $randomNoSec2 = rand(10000, 50000);

                                    $photo_name2 = $randomNo2 . $randomNoSec2 . $extension2;
                                    $destinationFolder2 = "../../public/uploads/";
                                    move_uploaded_file($tmp_name2, "$destinationFolder2" . "$photo_name2");

                                    if (!$fileName2) {
                                        echo '<script>' . $swal . '("Değişiklikler kaydedildi !", "", "warning");</script>';
                                    } elseif ($size2 > (1024 * 1024 * 3)) {
                                        echo '<script>' . $swal . '("Fotoğraf boyutu çok fazla !", "", "warning");</script>';
                                    } elseif (($type2 != 'image/jpeg' && $type2 != 'image/png' && $type2 != '.jpg')) {
                                        echo '<script>' . $swal . '("Dosya uzantısı jpeg,jpg veya png olabilir !", "", "warning");</script>';
                                    }


                                } else {
                                    $photo_name2 = "";
                                }

                                /*----------------- */
                                if ($foto3 != null) {
                                    /*-------------------------------- */
                                    $tmp_name3 = $_FILES["sectionImg"]['tmp_name'];
                                    $fileName3 = $_FILES["sectionImg"]['name'];
                                    $size3 = $_FILES["sectionImg"]['size'];
                                    $type3 = $_FILES["sectionImg"]['type'];

                                    $extension3 = substr($fileName3, -4, 4);

                                    $randomNo3 = rand(10000, 50000);
                                    $randomNoSec3 = rand(10000, 50000);

                                    $photo_name3 = $randomNo3 . $randomNoSec3 . $extension3;
                                    $destinationFolder3 = "../../public/uploads/";
                                    move_uploaded_file($tmp_name3, "$destinationFolder3" . "$photo_name3");

                                    if (!$fileName3) {
                                        echo '<script>' . $swal . '("Değişiklikler kaydedildi !", "", "warning");</script>';
                                    } elseif ($size3 > (1024 * 1024 * 3)) {
                                        echo '<script>' . $swal . '("Fotoğraf boyutu çok fazla !", "", "warning");</script>';
                                    } elseif (($type3 != 'image/jpeg' && $type3 != 'image/png' && $type3 != '.jpg')) {
                                        echo '<script>' . $swal . '("Dosya uzantısı jpeg,jpg veya png olabilir !", "", "warning");</script>';
                                    }


                                } else {
                                    $photo_name3 = "";
                                }

                                if ($foto4 != null) {
                                    /*-------------------------------- */
                                    $tmp_name4 = $_FILES["rightImg"]['tmp_name'];
                                    $fileName4 = $_FILES["rightImg"]['name'];
                                    $size4 = $_FILES["rightImg"]['size'];
                                    $type4 = $_FILES["rightImg"]['type'];

                                    $extension4 = substr($fileName4, -4, 4);

                                    $randomNo4 = rand(10000, 50000);
                                    $randomNoSec4 = rand(10000, 50000);

                                    $photo_name4 = $randomNo4 . $randomNoSec4 . $extension4;
                                    $destinationFolder4 = "../../public/uploads/";
                                    move_uploaded_file($tmp_name4, "$destinationFolder4" . "$photo_name4");

                                    if (!$fileName4) {
                                        echo '<script>' . $swal . '("Değişiklikler kaydedildi !", "", "warning");</script>';
                                    } elseif ($size4 > (1024 * 1024 * 3)) {
                                        echo '<script>' . $swal . '("Fotoğraf boyutu çok fazla !", "", "warning");</script>';
                                    } elseif (($type4 != 'image/jpeg' && $type4 != 'image/png' && $type4 != '.jpg')) {
                                        echo '<script>' . $swal . '("Dosya uzantısı jpeg,jpg veya png olabilir !", "", "warning");</script>';
                                    }
                                } else {

                                    $photo_name4 ="";
                                }

                                if ($foto5 != null) {
                                    /*-------------------------------- */
                                    $tmp_name5 = $_FILES["leftImg"]['tmp_name'];
                                    $fileName5 = $_FILES["leftImg"]['name'];
                                    $size5 = $_FILES["leftImg"]['size'];
                                    $type5 = $_FILES["leftImg"]['type'];

                                    $extension5 = substr($fileName5, -4, 4);

                                    $randomNo5 = rand(10000, 50000);
                                    $randomNoSec5 = rand(10000, 50000);

                                    $photo_name5 = $randomNo5 . $randomNoSec5 . $extension5;
                                    $destinationFolder5 = "../../public/uploads/";
                                    move_uploaded_file($tmp_name5, "$destinationFolder5" . "$photo_name5");

                                    if (!$fileName5) {
                                        echo '<script>' . $swal . '("Değişiklikler kaydedildi !", "", "warning");</script>';
                                    } elseif ($size5 > (1024 * 1024 * 3)) {
                                        echo '<script>' . $swal . '("Fotoğraf boyutu çok fazla !", "", "warning");</script>';
                                    } elseif (($type5 != 'image/jpeg' && $type5 != 'image/png' && $type5 != '.jpg')) {
                                        echo '<script>' . $swal . '("Dosya uzantısı jpeg,jpg veya png olabilir !", "", "warning");</script>';
                                    }
                                } else {
                                    $photo_name5 = "";
                                }

                                /*----------------- */

                                

                                if (!$sectionTitle || !$aboutContent1 || !$aboutContent2 || !$aboutContent3) {
                                    echo "<div class='alert alert-danger'>Lütfen formu eksiksiz doldurun</div>";
                                    header('Refresh:3;url=aboutUsAdd.php');
                                } else {
                              
                                    $query = $db->prepare('INSERT INTO aboutus SET sectionTitle = ?, aboutContent1 = ?, aboutContent2 = ?, aboutContent3 = ?,content1Img=?,content2Img=?,content3Img=?,sectionImg=?,leftImg=?,rightImg=?');
                                    $save = $query->execute([$sectionTitle, $aboutContent1, $aboutContent2, $aboutContent3, $photo_name, $photo_name1, $photo_name2, $photo_name3, $photo_name5, $photo_name4]);

                                    if ($save) {

                                        echo '<script>' . $swal . '("Hakkımda bilgisi eklendi", "", "success");</script>';
                                        header('Refresh:3;url=aboutUs.php');

                                    } else {
                                        echo '<script>' . $swal . '("Lütfen tekrar deneyin", "", "success");</script>';

                                    }
                                }
                            }
                            ?>
                            <div class="form-group row"><label class="col-1 col-form-label">Section Başlık</label>

                                <div class="col-lg-6"><input type="text" name="sectionTitle" placeholder="Section Başlığı"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-1 col-form-label">içerik-1</label>

                                <div class="col-lg-9">
                                    <textarea name="aboutContent1" class="summernote form-control" id="" cols="10"
                                        rows="10"></textarea>

                                </div>
                            </div>
                            <div class="form-group row"><label class="col-1 col-form-label">İçerik -2</label>

                                <div class="col-lg-9">

                                    <textarea name="aboutContent2" class="summernote form-control" id="" cols="10"
                                        rows="10"></textarea>
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-lg-1 col-form-label">İçerik-3</label>

                                <div class="col-lg-9">

                                    <textarea name="aboutContent3" class="summernote form-control" id="" cols="10"
                                        rows="10"></textarea>

                                </div>
                            </div>
                            <div class="form-group"><label class="col-lg-2 col-form-label">İçerik1-Fotoğrafı</label>
                                <div class="col-lg-6 custom-file">
                                    <input id="content1Img" type="file" name="content1Img" class="custom-file-input">
                                    <label for="content1Img" class="custom-file-label">Choose file...</label>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-lg-2 col-form-label">İçerik2-Fotoğrafı</label>
                                <div class="col-lg-6 custom-file">
                                    <input id="content2Img" type="file" name="content2Img" class="custom-file-input">
                                    <label for="content2Img" class="custom-file-label">Choose file...</label>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-lg-2 col-form-label">İçerik3-Fotoğrafı</label>
                                <div class="col-lg-6 custom-file">
                                    <input id="content3Img" type="file" name="content3Img" class="custom-file-input">
                                    <label for="content3Img" class="custom-file-label">Choose file...</label>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-lg-2 col-form-label">Sol Fotoğraf</label>
                                <div class="col-lg-6 custom-file">
                                    <input id="leftImg" type="file" name="leftImg" class="custom-file-input">
                                    <label for="leftImg" class="custom-file-label">Choose file...</label>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-lg-2 col-form-label">Sağ Fotoğraf</label>
                                <div class="col-lg-6 custom-file">
                                    <input id="rightImg" type="file" name="rightImg" class="custom-file-input">
                                    <label for="rightImg" class="custom-file-label">Choose file...</label>
                                </div>
                            </div>

                            <div class="form-group"><label class="col-lg-2 col-form-label">Section Fotoğrafı</label>
                                <div class="col-lg-6 custom-file">
                                    <input id="sectionImg" type="file" name="sectionImg" class="custom-file-input">
                                    <label for="sectionImg" class="custom-file-label">Choose file...</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-offset-2 col-lg-10 d-flex justify-content-center">
                                    <button name="aboutInfo" class="btn btn-primary w-25" type="submit">Ekle</button>
                                </div>
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