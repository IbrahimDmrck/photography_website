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
                            // $talentColor = $_POST['talentColor'];
                            // $talentColor = $_POST['talentColor'];
                       
                            $swal = 'swal';

                            if (!$talentName) {
                                echo '<script>' . $swal . '("Lütfen formu eksiksiz doldurun !", "", "warning");</script>';
                            } elseif (!$talentScore) {
                                echo '<script>' . $swal . '("Lütfen formu eksiksiz doldurun !", "", "warning");</script>';
                            } elseif (!$talentColor) {
                                echo '<script>' . $swal . '("Lütfen formu eksiksiz doldurun !", "", "warning");</script>';
                            }else {
                                $query = $db->prepare('INSERT INTO talent SET talentName = ?, talentScore = ?, talentColor =?,talentTitle=?,talentContent=?');
                                $save = $query->execute([$talentName, $talentScore, $talentColor, $talentTitle, $talentContent]);

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
                        <form class="mx-5" method="post">

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
                                    <input id="logo" type="file" name="imageR" class="custom-file-input">
                                    <label for="logo" class="custom-file-label">Choose file...</label>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-lg-2 col-form-label">Yetenek Sol Fotoğrafı</label>
                                <div class="col-lg-6 custom-file">
                                    <input id="logo" type="file" name="imageL" class="custom-file-input">
                                    <label for="logo" class="custom-file-label">Choose file...</label>
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