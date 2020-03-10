<?php

session_start();

$mysqli = new mysqli("mysql-server-80", "root", "root_password", "todolist") or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$description = "";
$checked = 0;

if(isset($_POST["submit"])) {
    $description = $_POST["todoDescription"];
    //later I'll have to add a listener for an invisible input field which can be changed (by dragging) and sent to database

    $mysqli->query("INSERT INTO todolist (todoDescription, date) VALUES ('$description', now())") or die($mysqli->error);

    $_SESSION["message"] = "A new task has been added";
    $_SESSION["msg_type"] = "success";

    header("location: index.php");
}

if(isset($_GET["delete"])) {
    $id = $_GET["delete"];
    $mysqli->query("DELETE FROM todolist WHERE id=$id") or die($mysqli->error());

    $_SESSION["message"] = "A task has been deleted";
    $_SESSION["msg_type"] = "danger";

    header("location: index.php");
}

if(isset($_GET["edit"])) {
    $id = $_GET["edit"];
    $update = true;
    $result = $mysqli->query("SELECT todoDescription FROM todolist WHERE id=$id") or die($mysqli->error());
    // if (count($result)==1) {
    if ($result->num_rows) {
        $row = $result->fetch_array();
        $description = $row["todoDescription"];
    }
}

if(isset($_POST["update"])) {
    $id = $_POST["id"];
    $description = $_POST["todoDescription"];

    $mysqli->query("UPDATE todolist SET todoDescription='$description' WHERE id=$id") or die($mysqli->error());

    $_SESSION["message"] = "Task has been updated";
    $_SESSION["msg_type"] = "warning";


    header("location: index.php");
}




// foreach(array("checked") as $checked) 
if(isset($_POST["checked"]))
{
    $id = $_POST["id"];
    $checked = $_POST["checked"];

    // if(isset($_POST["checked"]) && $_POST["checked"] == 1) {
    $mysqli->query("UPDATE todolist SET checked='$checked' WHERE id=$id") or die($mysqli->error());

    header("location: index.php");
// }
}



    
    







?>