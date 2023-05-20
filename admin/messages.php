<?php 
session_start();
require '../database/db_conn.php';
 if (isset($_SESSION['username'])) { 
include('includes/header.php'); ?>
</div>

<div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Mesajlar - Gelen Kutusu</h5>

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
                                    <th>Gönderen</th>
                                    <th>Konu</th>
                                    <th data-hide="all">Mesaj</th>
                               
                                    <th>Durum</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $messages=$db->query("SELECT * FROM messages ORDER BY Id DESC",PDO::FETCH_ASSOC);
                                    foreach ($messages as $value) {?>
                                     
                                    
                                <tr>
                                    <td><span class="badge badge-pill bg-warning font-bold"><?=$value['name']?></span></td>
                                    <td><?=$value['sender']?></td>
                                    <td><?=$value['subject']?></td>
                                    <td><div class="bg-dark text-white p-1 font-bold"><?=$value['message']?></div></td>
                                    
                                    <td >
                                        <?php
                                        if (isset($_POST['sennMessage'])) {
                                           $seen=$_POST['seen'];

                                           if(!$seen){
                                            
                                           }else{
                                            $query = $db->prepare("UPDATE messages SET seen = ? WHERE sender LIKE '%".$value['sender']."%' ");
                                            $save = $query->execute([$seen]);
            
                                            if ($save) {
            
                                                header('Refresh:2;messages.php');
            
                                            } else {
                                                echo '<script>"Beklenmedik Bir Hata Oldu!</script>';
                                            }
                                           }
                                        }
                                        ?>
                                        <form action="" method="post">
                                            <input type="number" name="seen" value="1" hidden>
                                        <button type="submit" name="sennMessage" class="btn <?=$value['seen']==0 ? 'btn-danger':'btn-info' ?> btn-circle "><i class="fa fa-<?=$value['seen']==0 ? 'times':'check' ?> text-white"></i>
                                    </button>
                                    </form>
                                </td>
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