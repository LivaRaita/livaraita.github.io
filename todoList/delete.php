<?php
require_once "db_connect.php";
if(isset($_GET["id"])){
    $id = $_GET['id'];
    db();
    global $link;
    $query = "DELETE FROM todolist WHERE id = '$id'";
    $delete = mysqli_query($link, $query);
    if($delete){
        echo 'Todo successfully deleted';
    }

}

?>