<?php 
error_reporting(0);
session_start();
require '../database/db_conn.php';
 if (isset($_SESSION['username'])) { 
include('includes/header.php'); ?>
</div>

<div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Yorumlar</h5>

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
                        <div class="ibox-content">

                            <table class="footable table table-stripped toggle-arrow-tiny">
                                <thead>
                                <tr>

                                    <th data-toggle="true">Ad-Soyad</th>
                                    <th>Email</th>
                                    
                                    <th data-hide="all">Mesaj</th>
                                    <th>Fotoğraf</th>
                                    <th>Onaylandı </th>
                                    <th>Sil </th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                     if (isset($_GET['id'])) {
                                        $id=$_GET['id'];
                                        $swal = 'swal';
                                        $deleteComment=$db->query("DELETE FROM comment WhERE id=$id",PDO::FETCH_ASSOC);
                                        $delete= $deleteComment->execute();

                                        if ($delete) {
       
                                            echo '<script>' . $swal . '("Yorum Silindi", "", "success");</script>';
                                            header('Refresh:2;index.php');
                                      
                                          } else {
                                            echo '<script>' . $swal . '("Beklenmedik Bir Hata Oldu", "Lütfen Tekrar Deneyin", "error");</script>';
                                          }
                                    }


                                    $messages=$db->query("SELECT * FROM comment ORDER BY id DESC",PDO::FETCH_ASSOC);
                                    foreach ($messages as $value) {
                                        $messages=$db->query("SELECT * FROM photos WHERE id=$value[photoId] ORDER BY id DESC")->fetch();
                                        ?>
                                     
                                    
                                <tr>
                                    <td><span style="font-size: 1rem;" class="badge badge-pill  font-bold"><?=$value['name']?></span></td>
                                    <td><?=$value['email']?></td>
                                    
                                    <td><div class="bg-dark text-white p-1 font-bold"><?=$value['message']?> 
                                    <span style="font-weight:bolder;font-size: 1rem;" class="badge badge-lg bg-success text-white float-right mb-2"><?=$value['create_date']?></span>
                                </div></td>
                                    <td>
                                        <a href="../comment.php?photo=<?=$messages['id']?>" target="_blank"><img src="../../public/uploads/<?=$messages['photoName']?>" width="50" height="50" alt=""></a>
                                    </td>
                                    <td >
                                        <?php
                                        if (isset($_POST['sennMessage'.$value['id'].''])) {
                                           $status=$_POST['status'];
                                            $id=$value['id'];
                                           if(!$status){
                                            
                                           }else{
                                            $query = $db->prepare("UPDATE comment SET status = ? WHERE id='$id' ");
                                            $save = $query->execute([$status]);
            
                                            if ($save) {
            
                                                header('Refresh:0');
            
                                            } else {
                                                echo '<script>"Beklenmedik Bir Hata Oldu!</script>';
                                            }
                                           }
                                        }
                                        ?>
                                        <form action="" method="post">
                                            <input type="number" name="status" value="1" hidden>
                                        <button type="submit" name="sennMessage<?=$value['id']?>" class="btn <?=$value['status']==0 ? 'btn-danger':'btn-info' ?> btn-circle "><i class="fa fa-<?=$value['status']==0 ? 'times':'check' ?> text-white"></i>
                                    </button>
                                    </form>
                                </td>
                                <td><a href="?id=<?= $value['id']?>" name="delete" class="btn btn-danger text-white"   title="sil"><i class="fa fa-times"></i></a></td>
                                </tr>
                                <?php } ?>
                                 
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="5">
                                        <ul class="pagination float-right"></ul>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

<?php include('includes/footer.php'); 
}else {
    header("location:login.php");
  } 
?>