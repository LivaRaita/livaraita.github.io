<?php

require_once __DIR__ . "/../../models/UsersModel.php";

$result = UserModel::getAllTodos();

require_once __DIR__ ."/../../views/todo-list.php"

?>

