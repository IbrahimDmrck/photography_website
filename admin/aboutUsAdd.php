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

                    <form class="mx-5" method="post">
<?php
if (isset($_POST['aboutInfo'])) {
    $sectionTitle=$_POST['sectionTitle'];
    $aboutContent1=$_POST['aboutContent1'];
    $aboutContent2=$_POST['aboutContent2'];
    $aboutContent3=$_POST['aboutContent3'];
    // $content1Img=$_POST['content1Img'];
    // $content2Img=$_POST['content2Img'];
    // $content3Img=$_POST['content3Img'];
    // $leftImg=$_POST['leftImg'];
    // $rightImg=$_POST['rightImg'];
    // $sectionImg=$_POST['sectionImg'];

    if (!$sectionTitle || !$aboutContent1 || !$aboutContent2 || !$aboutContent3) {
       echo "<div class='alert alert-danger'>Lütfen formu eksiksiz doldurun</div>";
       header('Refresh:3;url=aboutUsAdd.php');
    }else {
        $query = $db->prepare('INSERT INTO aboutus SET sectionTitle = ?, aboutContent1 = ?, aboutContent2 = ?, aboutContent3 = ?');
        $save = $query->execute([$sectionTitle, $aboutContent1, $aboutContent2, $aboutContent3]);

        if ($save) {

            echo "<div class='alert alert-success'>İçerik eklendi</div>";
            header('Refresh:3;url=aboutUs.php');

        } else {
            echo "<div class='alert alert-danger'>Lütfen tekrar deneyin</div>";
        }
    }
}
?>
<div class="form-group row"><label class="col-lg-2 col-form-label">Section Başlık</label>

    <div class="col-lg-6"><input type="text" name="sectionTitle" placeholder="Section Başlığı"
            class="form-control">
    </div>
</div>
<div class="form-group row"><label class="col-lg-2 col-form-label">içerik-1</label>

    <div class="col-lg-6"><input type="text" name="aboutContent1" placeholder="İçerik-1"
            class="form-control">
    </div>
</div>
<div class="form-group row"><label class="col-lg-2 col-form-label">İçerik -2</label>

    <div class="col-lg-6"><input type="text" name="aboutContent2" placeholder="İçerik-2"
            class="form-control">
    </div>
</div>
<div class="form-group row"><label class="col-lg-2 col-form-label">İçerik-3</label>

    <div class="col-lg-6">
    <input type="text" name="aboutContent3" placeholder="İçerik-3"
            class="form-control">
    </div>
</div>
<div class="form-group"><label class="col-lg-2 col-form-label">İçerik1-Fotoğrafı</label>
    <div class="col-lg-6 custom-file">
        <input id="logo" type="file" name="content1Img" class="custom-file-input">
        <label for="logo" class="custom-file-label">Choose file...</label>
    </div>
</div>
<div class="form-group"><label class="col-lg-2 col-form-label">İçerik2-Fotoğrafı</label>
    <div class="col-lg-6 custom-file">
        <input id="logo" type="file"  name="content2Img" class="custom-file-input">
        <label for="logo" class="custom-file-label">Choose file...</label>
    </div>
</div>
<div class="form-group"><label class="col-lg-2 col-form-label">İçerik3-Fotoğrafı</label>
    <div class="col-lg-6 custom-file">
        <input id="logo" type="file"  name="content3Img" class="custom-file-input">
        <label for="logo" class="custom-file-label">Choose file...</label>
    </div>
</div>
<div class="form-group"><label class="col-lg-2 col-form-label">Sol Fotoğraf</label>
    <div class="col-lg-6 custom-file">
        <input id="logo" type="file"  name="leftImg" class="custom-file-input">
        <label for="logo" class="custom-file-label">Choose file...</label>
    </div>
</div>
<div class="form-group"><label class="col-lg-2 col-form-label">Sağ Fotoğraf</label>
    <div class="col-lg-6 custom-file">
        <input id="logo" type="file" name="rightImg" class="custom-file-input">
        <label for="logo" class="custom-file-label">Choose file...</label>
    </div>
</div>

<div class="form-group"><label class="col-lg-2 col-form-label">Section Fotoğrafı</label>
    <div class="col-lg-6 custom-file">
        <input id="logo" type="file" name="sectionImg" class="custom-file-input">
        <label for="logo" class="custom-file-label">Choose file...</label>
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