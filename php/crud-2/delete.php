<?php

require_once "./helpers/db-wrapper.php";

$id = isset($_GET["id"]) ? $_GET["id"] : '';

if ($id) {
    $db = new DB();
    $db->openConnection();

    $db->run("DELETE FROM people
    WHERE id =" .$_GET["id"]);

    $db->closeConnection();
}
if(isset($_GET["redirect"]) && !(bool)$_GET["redirect"]) {
    return;
}

header("Location: /livaraita.github.io/php/crud-2")
?>