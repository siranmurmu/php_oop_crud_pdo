<?php
    require_once('DB.php');
        $obj = new DB();
        
        if(isset($_POST['insert'])){
            echo $_POST['name'];
            
            extract($_POST);
            if($obj->insertData($name,"students")){
                header("location:show.php");
            }
        }

    ?>