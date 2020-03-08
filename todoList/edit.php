<?php
require_once "db_connect.php";
if(isset($_GET["id"])){
    $id = $_GET["id"];
    db();
    global $link;
    $query = "SELECT todoDescription FROM todolist WHERE id = '$id'";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result);
        if ($row) {
            $description = $row['todoDescription'];
            echo "<form action='edit.php?id=$id' method='post'><input type='text' name='description' value='$description'><input type='submit' name='submit' value='edit'></form>";
        }
    } else {
        echo "no todo";
    }


    if(isset($_POST["submit"])){
        $title = $_POST["title"];
        $description = $_POST["description"];
        db();
        $query = "UPDATE todolist SET todoDescription = '$description'  WHERE id = '$id'";
        $insertEdited = mysqli_query($link, $query);
        if($insertEdited){
            echo "successfully updated";
        }
        else{
            echo mysqli_error($link);
        }
    }


}


?>