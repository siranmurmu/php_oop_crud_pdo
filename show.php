<?php
    require_once('DB.php');
    $obj = new DB();
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
    <h2>Show Data</h2>
    <a href="insert.php">Add</a>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody>
            <?php
                foreach($obj->showData("students") as $value){
            ?>

            <tr>
                <td><?php echo $value['name'] ?></td>
                <td><a href="edit.php?id=<?php echo $value['id'] ?>">Edit</a></td>
                <td><a href="del.php?id=<?php echo $value['id'] ?>">Delete</a></td>
            </tr>

            <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>