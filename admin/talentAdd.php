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
                        <h5>Yetenek Ekle</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>

                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content ">
                        <?php
                        if (isset($_POST['talentAdd'])) {
                            $talentName = $_POST['talentName'];
                            $talentScore = $_POST['talentScore'];
                            $talentColor = $_POST['talentColor'];
                            $talentTitle = $_POST['talentTitle'];
                            $talentContent = $_POST['talentContent'];
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
                           
                    
                       
                            /*-------------*/ 

                            if ($foto1 != null) {


                                $tmp_name1 = $_FILES["imageL"]['tmp_name'];
                                $fileName1 = $_FILES["imageL"]['name'];
                                $size1 = $_FILES["imageL"]['size'];
                                $type1 = $_FILES["imageL"]['type'];
                                
                                $extension1 = substr($fileName, -4, 4);
                                
                                $randomNo1 = rand(10000, 50000);
                                $randomNoSec1 = rand(10000, 50000);
                                
                                $photo_name1 = $randomNo1 . $randomNoSec1 . $extension1;
                                $destinationFolder1 = "../../public/uploads/";
                                move_uploaded_file($tmp_name1, "$destinationFolder1"."$photo_name1");

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
                           


                          

                            if (!$talentName) {
                                echo '<script>' . $swal . '("Lütfen formu eksiksiz doldurun !", "", "warning");</script>';
                            } elseif (!$talentScore) {
                                echo '<script>' . $swal . '("Lütfen formu eksiksiz doldurun !", "", "warning");</script>';
                            } elseif (!$talentColor) {
                                echo '<script>' . $swal . '("Lütfen formu eksiksiz doldurun !", "", "warning");</script>';
                            }elseif (isset($type) || isset($type1)) {
                                if (($type != 'image/jpeg' && $type != 'image/png' && $type != '.jpg')||($type1 != 'image/jpeg' && $type1 != 'image/png' && $type1 != '.jpg')) {
                                    
                                    echo '<script>' . $swal . '("Dosya uzantısı jpeg,jpg veya png olabilir !", "", "warning");</script>';
                                }
                            }else {
        
                              
                                $query = $db->prepare('INSERT INTO talent SET talentName = ?, talentScore = ?, talentColor =?,imageR=?,imageL=?,talentTitle=?,talentContent=?');
                                $save = $query->execute([$talentName, $talentScore, $talentColor, $photo_name,$photo_name1, $talentTitle, $talentContent]);

                                if ($save) {

                                    echo '<script>' . $swal . '("Yetenek başarıyla eklendi", "", "success");</script>';
                                    header('Refresh:3;url=ourService.php');

                                } else {
                                    echo '<script>' . $swal . '("Beklenmedik Bir Hata Oldu!", "Lütfen Tekrar Deneyin", "error");</script>';
                                }
                            }
                        }
                        //echo "<div class='alert alert-danger'>".$menuName ." ".$orderNumber." ".$position."</div>";
                        ?>
                        <form class="mx-5" method="post" enctype="multipart/form-data">

                        <div class="form-group row"><label class="col-lg-2 col-form-label">Yetenek Adı</label>

                                <div class="col-lg-6"><input type="text" name="talentName"  
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-lg-2 col-form-label">Yetenek Başlığı</label>

                                <div class="col-lg-6"><input type="text" name="talentTitle"  
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-lg-2 col-form-label">Yetenek Yüzdesi(%)</label>

                                <div class="col-lg-6"><input type="number" name="talentScore" Min="0" 
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-lg-2 col-form-label">Yetenek Rengi</label>

                                <div class="col-lg-6"><input type="text" autocomplete="false" name="talentColor"
                                        class="form-control demo1">
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-lg-2 col-form-label">Yetenek İçerik</label>

                            <div class="col-lg-6">
                                    <textarea class="summernote form-control" name="talentContent" id="" cols="30"
                                        rows="10"></textarea>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-lg-2 col-form-label">Yetenek Sağ Fotoğrafı</label>
                                <div class="col-lg-6 custom-file">
                                    <input id="imageR" type="file" name="imageR" class="custom-file-input">
                                    <label for="imageR" class="custom-file-label">Choose file...</label>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-lg-2 col-form-label">Yetenek Sol Fotoğrafı</label>
                                <div class="col-lg-6 custom-file">
                                    <input id="imageL" type="file" name="imageL" class="custom-file-input">
                                    <label for="imageL" class="custom-file-label">Choose file...</label>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-lg-offset-2 col-lg-10 d-flex justify-content-center">
                                    <button name="talentAdd" class="btn btn-primary w-25" type="submit">Ekle</button>
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