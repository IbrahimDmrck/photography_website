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
                        <h5>Sayfa Ekle</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
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
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content ">
                        <?php
                        if (isset($_POST['pageAdd'])) {
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
                                $query = $db->prepare('INSERT INTO pages SET pageName = ?, orderNumber = ?, shortDescription = ?, content = ?, seoTitle = ?, seoDescription = ?, seoKeyword = ?, slug = ?');
                                $save = $query->execute([$pageName, $orderNumber, $shortDescription, $content, $seoTitle, $seoDescription, $seoKeyword, $pageSlug]);

                                if ($save) {

                                    echo '<script>' . $swal . '("Sayfa başarıyla eklendi", "", "success");</script>';
                                    header('Refresh:3;url=menus.php');

                                } else {
                                    echo '<script>' . $swal . '("Beklenmedik Bir Hata Oldu!", "Lütfen Tekrar Deneyin", "error");</script>';
                                }
                            }
                        }
                        //echo "<div class='alert alert-danger'>".$menuName ." ".$orderNumber." ".$position."</div>";
                        ?>
                        <form class="mx-5" method="post">

                            <div class="form-group row"><label class="col-lg-2 col-form-label">Sayfa Adı</label>

                                <div class="col-lg-6"><input type="text" name="pageName" placeholder="Sayfa Adı"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-lg-2 col-form-label">Sıra Numarası</label>

                                <div class="col-lg-6"><input type="number" name="orderNumber" placeholder="Sıra Numarası"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-lg-2 col-form-label">Kısa Açıklama</label>

                                <div class="col-lg-6"><input type="text" name="shortDescription" placeholder="Kısa Açıklama"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-lg-2 col-form-label">İçerik</label>

                                <div class="col-lg-6">
                                        <textarea class="summernote form-control" name="content" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-lg-2 col-form-label">Seo Title</label>

                                <div class="col-lg-6"><input type="text" name="seoTitle" placeholder="Seo Title"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-lg-2 col-form-label">Seo Description</label>

                                <div class="col-lg-6"><input type="text" name="seoDescription" placeholder="Seo Description"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-lg-2 col-form-label">Seo Keyword</label>

                                <div class="col-lg-6">
                                <input type="text" name="seoKeyword" placeholder="Seo Keyword"
                                        class="form-control">
                                        <p class="font-bold">Anahtar kelimeleri virgül(,) ile ayırarak yazınız</p>
                                </div>
                                
                            </div>



                            <div class="form-group row">
                                <div class="col-lg-offset-2 col-lg-10 d-flex justify-content-center">
                                    <button name="pageAdd" class="btn btn-primary w-25" type="submit">Ekle</button>
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