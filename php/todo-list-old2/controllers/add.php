<?php
    if(isset ($_POST["submit"])){
   
    require_once __DIR__ . "/../models/UsersModel.php";
    
    require_once __DIR__ . "/../entity/User.php";

    $user = new Task();
    $user->setTask($_POST["description"]);
    // $user->setPassword($_POST["password"]);
    
    // $user2 = new User($_POST);

    UserModel::addTask($description);

    header("Location: /livaraita.github.io/php/todo-list");
}

    require_once __DIR__ . "/../views/user-form.php"
?>

