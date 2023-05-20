<?php
ob_start();

require '../database/db_conn.php';

if (isset($_POST['checking_edit_btn'])) {
    $id = $_POST['category_id'];
    $result_array = [];

    $getir = $db->prepare("SELECT * FROM categories  WHERE id = :id");
    $getir->execute([":id" => $id]);

    if ($getir->rowCount() > 0) {
        foreach ($getir as $row) {
            array_push($result_array, $row);
            header('Content-type: application/json');
            echo json_encode($result_array);
        }
    } else {
        echo $return = "<h5> Kayıt Bulunamadı</h5>";
    }

}

?>