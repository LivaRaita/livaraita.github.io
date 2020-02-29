<?php
    if(isset ($_POST["submit"])){
    require_once "./models/UsersModel.php";


    $data = [
        "name" => $_POST["name"],
        "password" => $_POST["password"]
    ];

    UserModel::addUser($data);

    header("Location: /livaraita.github.io/php/crud-2");
}
    require_once "./views/users-form.php"
?>

