<?php
session_start();
require '../database/db_conn.php';
 if (isset($_SESSION['username'])) { 
include('includes/header.php'); ?>
</div>
 
<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content">
            <div class="row">
             
                <div class="col-lg-6">
                    <div class="ibox ">
                    <div class="ibox-title">
                            <h5>Sosyal Medya Hesapları</h5>
                            <div class="ibox-tools">
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
<?php
if (isset($_POST['sosyalMedya'])) {
    $swal = 'swal';
    $Facebook=$_POST['Facebook'];
    $Instagram=$_POST['Instagram'];
    $Linkedin=$_POST['Linkedin'];
    $Youtube=$_POST['Youtube'];
    $Pinterest=$_POST['Pinterest'];
    $Tiktok=$_POST['Tiktok'];
    $Twitter=$_POST['Twitter'];



        $query = $db->prepare('UPDATE settings SET Facebook = ?, Instagram = ?, Linkedin = ?, Youtube = ?, Pinterest = ?, Tiktok = ?, Twitter = ? WHERE id=?');
        $save = $query->execute([$Facebook, $Instagram, $Linkedin, $Youtube, $Pinterest, $Tiktok, $Twitter,1]);

        if ($save) {

            echo '<script>' . $swal . '("Bilgiler başarıyla kaydedildi", "", "success");</script>';
            header('Refresh:3;url=siteSetting.php');

        } else {
            echo '<script>' . $swal . '("Beklenmedik Bir Hata Oldu!", "Lütfen Tekrar Deneyin", "error");</script>';
        }
    
}

if (isset($_POST['iletisim'])) {
    $swal = 'swal';
    $Adres=$_POST['Adres'];
    $Telefon=$_POST['Telefon'];
    $Email=$_POST['Email'];




        $query = $db->prepare('UPDATE settings SET Adres = ?, Telefon = ?, Email = ? WHERE id=?');
        $save = $query->execute([$Adres, $Telefon, $Email,1]);

        if ($save) {

            echo '<script>' . $swal . '("Bilgiler başarıyla kaydedildi", "", "success");</script>';
            header('Refresh:3;url=siteSetting.php');

        } else {
            echo '<script>' . $swal . '("Beklenmedik Bir Hata Oldu!", "Lütfen Tekrar Deneyin", "error");</script>';
        }
    
}

$settings=$db->query("SELECT * FROM settings WHERE id=1",PDO::FETCH_ASSOC);
foreach ($settings as $value) {?>
    

                     <form action="" method="post">
                       <div class="row form-group"> <label class="col-2 col-form-label" for="facebook">Facebook:</label>
                            <div class="col-8">
                                <input type="text" name="Facebook" id="facebook" value="<?=$value['Facebook']?>" class="form-control">
                            </div>
                       </div>

                       <div class="row form-group"> <label class="col-2 col-form-label" for="twitter">Twitter:</label>
                            <div class="col-8">
                                <input type="text" name="Twitter" id="twitter" value="<?=$value['Twitter']?>"  class="form-control">
                            </div>
                       </div>

                       <div class="row form-group"> <label class="col-2 col-form-label" for="instagram">Instagram:</label>
                            <div class="col-8">
                                <input type="text" name="Instagram" id="instagram" value="<?=$value['Instagram']?>"  class="form-control">
                            </div>
                       </div>

                       <div class="row form-group"> <label class="col-2 col-form-label" for="linkedin">Linkedin:</label>
                            <div class="col-8">
                                <input type="text" name="Linkedin" id="linkedin" value="<?=$value['Linkedin']?>" class="form-control">
                            </div>
                       </div>

                       <div class="row form-group"> <label class="col-2 col-form-label" for="youtube">Youtube:</label>
                            <div class="col-8">
                                <input type="text" name="Youtube" id="youtube" value="<?=$value['Youtube']?>" class="form-control">
                            </div>
                       </div>

                       <div class="row form-group"> <label class="col-2 col-form-label" for="pinterest">pinterest:</label>
                            <div class="col-8">
                                <input type="text" name="Pinterest" id="pinterest" value="<?=$value['Pinterest']?>"  class="form-control">
                            </div>
                       </div>

                       <div class="row form-group"> <label class="col-2 col-form-label"  for="pinterest">tiktok:</label>
                            <div class="col-8">
                                <input type="text" name="Tiktok" id="tiktok"  value="<?=$value['Tiktok']?>" class="form-control">
                            </div>
                       </div>

                       <div class="row form-group justify-content-center"> 
                            
                               <button type="submit" name="sosyalMedya" class="btn btn-lg btn-secondary w-25">Ekle</button>
                           
                       </div>
                       
                     </form>
                     <?php } ?>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>İletişim Bilgileri</h5>
                            <div class="ibox-tools">
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
                            <?php 
                            $settings=$db->query("SELECT * FROM settings WHERE id=1",PDO::FETCH_ASSOC);
                            foreach ($settings as $value) {?>          
                        <form action="" method="post">
                       <div class="row form-group"> <label class="col-2 col-form-label" for="adres">Adres:</label>
                            <div class="col-8">
                                <input type="text" name="Adres" id="adres"  value="<?=$value['Adres']?>" class="form-control">
                            </div>
                       </div>

                       <div class="row form-group"> <label class="col-2 col-form-label" for="telefon">Telefon:</label>
                            <div class="col-8">
                                <input type="text" name="Telefon" id="telefon" value="<?=$value['Telefon']?>" data-mask="0(999) 999-9999" class="form-control">
                            </div>
                       </div>

                       <div class="row form-group"> <label class="col-2 col-form-label" for="email">E-mail:</label>
                            <div class="col-8">
                                <input type="text" name="Email" id="email" value="<?=$value['Email']?>" class="form-control">
                            </div>
                       </div>


                       <div class="row form-group justify-content-center"> 
                            
                               <button type="submit" name="iletisim" class="btn btn-lg btn-secondary w-25">Ekle</button>
                           
                       </div>
                       
                     </form>
                     <?php } ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<?php include('includes/footer.php');
}else {
    header("location:login.php");
  } 
?>