<?php
    require_once('DB.php');
    $obj = new DB();

    if(isset($_REQUEST['id'])){
        if($obj->deleteData($_REQUEST['id'],"students")){
            header("location:show.php");
        }
    }
?>