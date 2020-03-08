<?php
function db(){
    global $link;
    $link = mysqli_connect("mysql-server-80", "root", "root_password", "todolist") or die("couldn’t connect to database");
    return $link;
}


?>