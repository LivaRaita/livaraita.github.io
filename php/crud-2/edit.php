<?php
require_once "./models/UsersModel.php";
    if(isset ($_POST["submit"])){

        $data = 
        [
            "name" => $_POST["name"],
            "password" => $_POST["password"],
            "id" => $_POST["id"],
        ];

        UserModel::updateUser($data);
        header("Location: /livaraita.github.io/php/crud-2");
 
}

$name = '';
$password = '';
$id = '';


if (isset($_GET["id"])){
   $result = UserModel::getUserById($_GET["id"]);

    while($row = mysqli_fetch_assoc($result)) {
        $name = $row["name"];
        $password =  $row["password"];
        $id = $row["id"];
    }
}

require_once "./views/users-form.php"
?>

