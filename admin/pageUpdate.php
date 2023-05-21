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
                        <h5>Sayfa Güncelle</h5>
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

                            $page = $db->query("SELECT * FROM pages WHERE id=$id", PDO::FETCH_ASSOC);

                       

                        if (isset($_POST['pageUpdate'])) {
                            $pageName = $_POST['pageName'];
                            $orderNumber = $_POST['orderNumber'];
                            $shortDescription = $_POST['shortDescription'];
                            $content = $_POST['content'];
                            //$banner = $_POST['banner'];
                            $seoTitle = $_POST['seoTitle'];
                            $seoDescription = $_POST['seoDescription'];
                            $seoKeyword = $_POST['seoKeyword'];
                            
                            $swal = 'swal';

                            $search = array("ı", "ö", "ü", "ç", "ğ", "Ğ", "Ç", "İ", "Ö", "Ü", " ");
                            $replace = array('i', 'o', 'u', 'c', 'g', 'g', 'c', 'i', 'o', 'u', '-');
                            $pageSlug = str_replace($search, $replace, strtolower($pageName));


                            if (!$pageName) {
                                echo '<script>' . $swal . '("Lütfen formu eksiksiz doldurun !", "", "warning");</script>';
                            } elseif (!$orderNumber) {
                                echo '<script>' . $swal . '("Lütfen formu eksiksiz doldurun !", "", "warning");</script>';
                            } elseif (!$shortDescription) {
                                echo '<script>' . $swal . '("Lütfen formu eksiksiz doldurun !", "", "warning");</script>';
                            } elseif (!$content) {
                                echo '<script>' . $swal . '("Lütfen formu eksiksiz doldurun !", "", "warning");</script>';
                            } elseif (!$seoTitle) {
                                echo '<script>' . $swal . '("Lütfen formu eksiksiz doldurun !", "", "warning");</script>';
                            } elseif (!$seoDescription) {
                                echo '<script>' . $swal . '("Lütfen formu eksiksiz doldurun !", "", "warning");</script>';
                            } elseif (!$seoKeyword) {
                                echo '<script>' . $swal . '("Lütfen formu eksiksiz doldurun !", "", "warning");</script>';
                            } else {
                                $query = $db->prepare('UPDATE pages SET pageName = ?, orderNumber = ?, shortDescription = ?, content = ?, seoTitle = ?, seoDescription = ?, seoKeyword = ?, slug = ? WHERE Id = ?');
                                $save = $query->execute([$pageName, $orderNumber, $shortDescription, $content, $seoTitle, $seoDescription, $seoKeyword, $pageSlug, $id]);

                                if ($save) {

                                    echo '<script>' . $swal . '("Sayfa başarıyla güncellendi", "", "success");</script>';
                                    header('Refresh:3;url=pages.php');

                                } else {
                                    echo '<script>' . $swal . '("Beklenmedik Bir Hata Oldu!", "Lütfen Tekrar Deneyin", "error");</script>';
                                }
                            }
                        }

                        if (isset($_POST["updatePageBanner"])) {
                            $id = $_GET['id'];
                            $swal = 'swal';
                            $foto = $_FILES['banner']['name'];

                            if ($foto != null) {

                                $tmp_name = $_FILES["banner"]['tmp_name'];
                                $fileName = $_FILES["banner"]['name'];
                                $size = $_FILES["banner"]['size'];
                                $type = $_FILES["banner"]['type'];
                                
                                $extension = substr($fileName, -4, 4);
                                
                                $randomNo = rand(10000, 50000);
                                $randomNoSec = rand(10000, 50000);
                                
                                $photo_name = $randomNo . $randomNoSec . $extension;
                                $destinationFolder = "../../public/uploads/";
                                move_uploaded_file($tmp_name, "$destinationFolder"."$photo_name");

                                if (!$fileName) {
                                    echo '<script>' . $swal . '("Herhangi bir değişiklik yapmadınız !", "", "warning");</script>';
                                } elseif ($size > (1024 * 1024 * 3)) {
                                    echo '<script>' . $swal . '("Fotoğraf boyutu çok fazla !", "", "warning");</script>';
                                } elseif (($type != 'image/jpeg' && $type != 'image/png' && $type != '.jpg')) {
                                    echo '<script>' . $swal . '("Dosya uzantısı jpeg,jpg veya png olabilir !", "", "warning");</script>';
                                }else{
                                    $check = $db->prepare('SELECT * FROM pages WHERE id = :id');
                                    $check->execute([":id" => $id]);
                                    $get_page = $check->fetch(PDO::FETCH_ASSOC);
                                    $check_exist = $check->rowCount();

                                    $old_photo = $get_page["banner"];
                                    if ($old_photo != "" || $old_photo != null) {
                                        unlink("../../public/uploads/" . $old_photo);
                                    }
                                }

                            } else {   
                                $check = $db->prepare('SELECT * FROM pages WHERE id = :id');
                                $check->execute([":id" => $id]);
                                $get_page = $check->fetch(PDO::FETCH_ASSOC);
                                $check_exist = $check->rowCount();

                                $old_photo = $get_page["banner"];
                                           
                                $photo_name =  $old_photo;
                            }

                            if (($type != 'image/jpeg' && $type != 'image/png' && $type != '.jpg')) {
                                echo '<script>' . $swal . '("Dosya uzantısı jpeg,jpg veya png olabilir !", "", "warning");</script>';
                            }else{
                                $query = $db->prepare('UPDATE pages SET banner =? WHERE id=' . $id . '');
                                $save = $query->execute([$photo_name]);

                                if ($save) {

                                    echo '<script>' . $swal . '("Sayfa banner fotoğrafı başarıyla güncellendi", "", "success");</script>';
                                    header('Refresh:3;');

                                } else {
                                    echo '<script>' . $swal . '("Beklenmedik Bir Hata Oldu!", "Lütfen Tekrar Deneyin", "error");</script>';
                                }
                            }
                        }
                    }
                        ?>
                            <?php foreach ($page as $value) { ?>
                        <form class="mx-5" method="post">

                                <div class="form-group row"><label class="col-lg-2 col-form-label">Sayfa Adı</label>

                                    <div class="col-lg-6"><input type="text" name="pageName" value="<?= $value['pageName'] ?>" placeholder="Sayfa Adı"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row"><label class="col-lg-2 col-form-label">Sıra Numarası</label>

                                    <div class="col-lg-6"><input type="number" name="orderNumber" value="<?= $value['orderNumber'] ?>" placeholder="Sıra Numarası"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row"><label class="col-lg-2 col-form-label">Kısa Açıklama</label>

                                    <div class="col-lg-6">
                                            <textarea class="summernote form-control" name="shortDescription" id="" cols="30"
                                            rows="10"><?= $value['shortDescription'] ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row"><label class="col-lg-2 col-form-label">İçerik</label>

                                    <div class="col-lg-6">
                                        <textarea class="summernote form-control" name="content" id="" cols="30"
                                            rows="10"><?= $value['content'] ?></textarea>
                                    </div>
                                </div>
                                

                                <div class="form-group row"><label class="col-lg-2 col-form-label">Seo Title</label>

                                    <div class="col-lg-6"><input type="text" name="seoTitle" value="<?= $value['seoTitle'] ?>"  placeholder="Seo Title"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row"><label class="col-lg-2 col-form-label">Seo Description</label>

                                    <div class="col-lg-6"><input type="text" name="seoDescription" value="<?= $value['seoDescription'] ?>" placeholder="Seo Description"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row"><label class="col-lg-2 col-form-label">Seo Keyword</label>

                                    <div class="col-lg-6">
                                        <input type="text" name="seoKeyword" value="<?= $value['seoKeyword'] ?>" placeholder="Seo Keyword" class="form-control">
                                        <p class="font-bold">Anahtar kelimeleri virgül(,) ile ayırarak yazınız</p>
                                    </div>

                                </div>

                                

                                <div class="form-group row">
                                    <div class="col-lg-offset-2 col-lg-10 d-flex justify-content-center">
                                        <button name="pageUpdate" class="btn btn-primary w-25" type="submit">Güncelle</button>
                                    </div>
                                </div>
                            </form>
                            
                            <div class="form-group row"><label class="col-lg-2 col-form-label">Banner Fotoğrafı</label>
                                <div class="col-lg-6">
                                    <img src="../../public/uploads/<?= $value['banner'] ?>" alt="Bir Fotoğraf Eklemediniz"
                                        class="img-fluid">
                                </div>
                                <div class=" col-lg-3  custom-file ">

                                    <form method="post" enctype="multipart/form-data">
                                        <input id="banner" type="file" name="banner" class="custom-file-input">
                                        <label for="banner" class="custom-file-label">Fotoğraf Seçin</label>


                                        <button name="updatePageBanner" class="float-right btn btn-secondary mt-2 ">Fotoğrafı
                                            Güncelle</button>
                                    </form>
                                </div>

                            </div>
                            <?php } ?>
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