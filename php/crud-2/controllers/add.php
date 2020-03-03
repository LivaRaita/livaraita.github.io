<?php
    if(isset ($_POST["submit"])){
   
    require_once __DIR__ . "/../models/UsersModel.php";
    
    require_once __DIR__ . "/../entity/User.php";

    $user = new User();
    $user->setName($_POST["name"]);
    $user->setPassword($_POST["password"]);
    
    $user2 = new User($_POST);

    UserModel::addUser($user);

    header("Location: /livaraita.github.io/php/crud-2");
}

    require_once __DIR__ . "/../views/user-form.php"
?>

