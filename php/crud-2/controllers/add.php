<?php
    if(isset ($_POST["submit"])){
   
    require_once "/../models/UserModel.php";
    
    require_once "/../../entity/User.php";

    $user = new User();
    $user->setName($_POST["name"]);
    $user->setPassword($_POST["password"]);
    
    $user2 = new User($_POST);

    UserModel::addUser($data);

    header("Location: /livaraita.github.io/php/crud-2");
}
    require_once "./views/users-form.php"
?>

