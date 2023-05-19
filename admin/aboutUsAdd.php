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
                                $tmp_name = $_FILES["content1Img"]['tmp_name'];
                                $fileName = $_FILES["content1Img"]['name'];
                                $size = $_FILES["content1Img"]['size'];
                                $type = $_FILES["content1Img"]['type'];

                                $extension = substr($fileName, -4, 4);

                                $randomNo = rand(10000, 50000);
                                $randomNoSec = rand(10000, 50000);

                                $photo_name = $randomNo . $randomNoSec . $extension;
                                $destinationFolder = "../../public/uploads/";

                                /*----------------- */

                                $tmp_name1 = $_FILES["content2Img"]['tmp_name'];
                                $fileName1 = $_FILES["content2Img"]['name'];
                                $size1 = $_FILES["content2Img"]['size'];
                                $type1 = $_FILES["content2Img"]['type'];

                                $extension1 = substr($fileName, -4, 4);

                                $randomNo1 = rand(10000, 50000);
                                $randomNoSec1 = rand(10000, 50000);

                                $photo_name1 = $randomNo1 . $randomNoSec1 . $extension1;
                                $destinationFolder1 = "../../public/uploads/";

                                /*----------------- */

                                $tmp_name3 = $_FILES["content3Img"]['tmp_name'];
                                $fileName3 = $_FILES["content3Img"]['name'];
                                $size3 = $_FILES["content3Img"]['size'];
                                $type3 = $_FILES["content3Img"]['type'];

                                $extension3 = substr($fileName, -4, 4);

                                $randomNo3 = rand(10000, 50000);
                                $randomNoSec3 = rand(10000, 50000);

                                $photo_name3 = $randomNo3 . $randomNoSec3 . $extension3;
                                $destinationFolder3 = "../../public/uploads/";

                                /*----------------- */

                                $tmp_name4 = $_FILES["leftImg"]['tmp_name'];
                                $fileName4 = $_FILES["leftImg"]['name'];
                                $size4 = $_FILES["leftImg"]['size'];
                                $type4 = $_FILES["leftImg"]['type'];

                                $extension4 = substr($fileName, -4, 4);

                                $randomNo4 = rand(10000, 50000);
                                $randomNoSec4 = rand(10000, 50000);

                                $photo_name4 = $randomNo4 . $randomNoSec4 . $extension4;
                                $destinationFolder4 = "../../public/uploads/";

                                /*----------------- */

                                $tmp_name5 = $_FILES["rightImg"]['tmp_name'];
                                $fileName5 = $_FILES["rightImg"]['name'];
                                $size5 = $_FILES["rightImg"]['size'];
                                $type5 = $_FILES["rightImg"]['type'];

                                $extension5 = substr($fileName, -4, 4);

                                $randomNo5 = rand(10000, 50000);
                                $randomNoSec5 = rand(10000, 50000);

                                $photo_name5 = $randomNo5 . $randomNoSec5 . $extension5;
                                $destinationFolder5 = "../../public/uploads/";

                                /*----------------- */

                                $tmp_name6 = $_FILES["sectionImg"]['tmp_name'];
                                $fileName6 = $_FILES["sectionImg"]['name'];
                                $size6 = $_FILES["sectionImg"]['size'];
                                $type6 = $_FILES["sectionImg"]['type'];

                                $extension6 = substr($fileName, -4, 4);

                                $randomNo6 = rand(10000, 50000);
                                $randomNoSec6 = rand(10000, 50000);

                                $photo_name6 = $randomNo6 . $randomNoSec6 . $extension6;
                                $destinationFolder6 = "../../public/uploads/";

                                if (!$sectionTitle || !$aboutContent1 || !$aboutContent2 || !$aboutContent3) {
                                    echo "<div class='alert alert-danger'>Lütfen formu eksiksiz doldurun</div>";
                                    header('Refresh:3;url=aboutUsAdd.php');
                                } elseif (!$fileName || !$fileName1 || !$fileName3 || !$fileName4 || !$fileName5 || !$fileName6) {
                                    echo '<script>' . $swal . '("Lütfen bir fotoğraf seçiniz !", "", "warning");</script>';
                                } elseif ($size > (1024 * 1024 * 3) || $size1 > (1024 * 1024 * 3) || $size3 > (1024 * 1024 * 3) || $size4 > (1024 * 1024 * 3) || $size5 > (1024 * 1024 * 3) || $size6 > (1024 * 1024 * 3)) {
                                    echo '<script>' . $swal . '("Fotoğraf boyutu çok fazla !", "", "warning");</script>';
                                } elseif (($type != 'image/jpeg' && $type != 'image/png' && $type != '.jpg') || ($type1 != 'image/jpeg' && $type1 != 'image/png' && $type1 != '.jpg') || ($type3 != 'image/jpeg' && $type3 != 'image/png' && $type3 != '.jpg') || ($type4 != 'image/jpeg' && $type4 != 'image/png' && $type4 != '.jpg') || ($type5 != 'image/jpeg' && $type5 != 'image/png' && $type5 != '.jpg') || ($type6 != 'image/jpeg' && $type6 != 'image/png' && $type6 != '.jpg')) {
                                    echo '<script>' . $swal . '("Dosya uzantısı jpeg,jpg veya png olabilir !", "", "warning");</script>';
                                } else {
                                    move_uploaded_file($tmp_name, "$destinationFolder" . "$photo_name");
                                    move_uploaded_file($tmp_name1, "$destinationFolder1" . "$photo_name1");
                                    move_uploaded_file($tmp_name3, "$destinationFolder3" . "$photo_name3");
                                    move_uploaded_file($tmp_name4, "$destinationFolder4" . "$photo_name4");
                                    move_uploaded_file($tmp_name5, "$destinationFolder5" . "$photo_name5");
                                    move_uploaded_file($tmp_name6, "$destinationFolder6" . "$photo_name6");
                                    $query = $db->prepare('INSERT INTO aboutus SET sectionTitle = ?, aboutContent1 = ?, aboutContent2 = ?, aboutContent3 = ?,content1Img=?,content2Img=?,content3Img=?,leftImg=?,rightImg=?,sectionImg=?');
                                    $save = $query->execute([$sectionTitle, $aboutContent1, $aboutContent2, $aboutContent3, $photo_name, $photo_name1, $photo_name3, $photo_name4, $photo_name5, $photo_name6]);

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