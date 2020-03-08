<?php
session_start();
if($_GET["token"] !== $_SESSION["edit_access_token"]) {
    header("Location:  /livaraita.github.io/php/todo-list/");
}

require_once "./models/UsersModel.php";
    if(isset ($_POST["submit"])){

        $data = 
        [
            "name" => $_POST["name"],
            "password" => $_POST["password"],
            "id" => $_POST["id"],
        ];

        UserModel::updateUser($data);
        header("Location: /livaraita.github.io/php/todo-list");
 
}

$name = '';
$password = '';
$id = '';
$edit = true;


if (isset($_GET["id"])){
   $result = UserModel::getUserById($_GET["id"]);

    while($row = mysqli_fetch_assoc($result)) {
        $name = $row["name"];
        $password =  $row["password"];
        $id = $row["id"];
    }
}

require_once __DIR__ . "/views/user-form.php"
?>

