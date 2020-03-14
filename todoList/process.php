<?php

session_start();

$mysqli = new mysqli("mysql-server-80", "root", "root_password", "todolist") or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$description = "";
$checked = 0;

// ### Task submission and status message ###

if(isset($_POST["submit"])) {
    $description = $_POST["todoDescription"];

    $mysqli->query("INSERT INTO todolist (todoDescription, date) VALUES ('$description', now())") or die($mysqli->error);

    $_SESSION["message"] = "A new task has been added";
    $_SESSION["msg_type"] = "success";

    header("location: index.php");
}

// ### Task deletion ###

if(isset($_GET["delete"])) {
    $id = $_GET["delete"];
    $mysqli->query("DELETE FROM todolist WHERE id=$id") or die($mysqli->error());

    $_SESSION["message"] = "A task has been deleted";
    $_SESSION["msg_type"] = "danger";

    session_write_close();
    header("location: index.php");
}

// ### Task edition: this retrieves the task from DB ###

if(isset($_GET["edit"])) {
    $id = $_GET["edit"];
    $update = true;
    $result = $mysqli->query("SELECT todoDescription FROM todolist WHERE id=$id") or die($mysqli->error());
 
    if ($result->num_rows) {
        $row = $result->fetch_array();
        $description = $row["todoDescription"];
    }
}

// ### Task edition: this updates the task in DB and informs which message should be displayed ###

if(isset($_POST["update"])) {
    $id = $_POST["id"];
    $description = $_POST["todoDescription"];

    $mysqli->query("UPDATE todolist SET todoDescription='$description' WHERE id=$id") or die($mysqli->error());

    $_SESSION["message"] = "Task has been updated";
    $_SESSION["msg_type"] = "warning";


    header("location: index.php");
}


// ### This function posts to DB that the task is 'checked' (done) ###

if(isset($_POST["checked"]))
{
    $id = $_POST["id"];
    $checked = $_POST["checked"];

    $mysqli->query("UPDATE todolist SET checked='$checked' WHERE id=$id") or die($mysqli->error());

    header("location: index.php");

}

// ### This function takes the array made by javascript function and updates the order id (index in the array) in the DB according to the values

if(isset($_POST["orderData"])) {

    foreach ($_POST["orderData"] as $value) {
        $id = $value["rowId"];
        $order_id = $value["orderId"];
        $mysqli->query("UPDATE todolist SET order_id='$order_id' WHERE id=$id") or die($mysqli->error());

    }
}



    
    







?>