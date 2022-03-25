<?php

//if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == true) {
    require_once('database.php');
    $id = $_GET['id'];

    if (!empty($database)) {
        $res = $database->delete($id);
        if($res){
            header('location: view.php');
        }else{
            echo "Failed to Delete Record";
        }
    }
//} else {
//    header('location: login.php');
//}
