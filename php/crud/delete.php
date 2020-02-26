<?php

require_once "./db-wrapper.php";

$id = isset($_GET["id"]) ? $_GET["id"] : '';

if ($id) {
    $db = new DB();
    $db->openConnection();

    $db->run("DELETE FROM people
    WHERE id =" .$_GET["id"]);

    $db->closeConnection();
}

header("Location: /livaraita.github.io/php/crud/index.php")
?>