<?php

require_once "./models/UsersModel.php";

$result = UserModel::getAllUsers();

require_once __DIR__ ."/../views/users-list.php"

?>

