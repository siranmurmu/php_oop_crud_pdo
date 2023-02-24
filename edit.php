<?php
    require_once("DB.php");
    $obj = new DB();
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $data_id = $obj->getById($id,"students");
    }
    else{
        header("location:show.php");
    }

    if(isset($_POST['update'])){
        $name = $_POST['name'];
        $status_update = $obj->update($id,$name,"students");
        if($status_update){
            header("location:show.php");
        }
    }        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Edit Data</h2>
    <form action="" method="post">
    <input type="hidden" name="id" value="<?php echo $data_id['id'] ?>">
    Name:
    <input type="text" name="name" value="<?php echo $data_id['name'] ?>"><br><br>
    <input type="submit" name="update" value="Update">
    </form>
</body>
</html>


