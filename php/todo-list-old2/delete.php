<?php

if (isset($_GET["id"])) {
require_once "./models/UsersModel.php";

$id = isset($_GET["id"]) ? $_GET["id"] : '';

}

if ($id) 
{
    UserModel::deleteUserByID($id);
}

if(isset($_GET["redirect"]) && !(bool)$_GET["redirect"]) {
    return;
}

header("Location: /livaraita.github.io/php/todo-list")
?>