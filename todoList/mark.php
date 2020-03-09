<?php
    
    require_once("process.php");

    if(isset($_GET['as'], $_GET['row'])) {
        $as = $_GET['as'];
        $row = $_GET['row'];

        switch($as) {
            case "checked":
                $mysqli->query("UPDATE todolist SET checked= 1 WHERE id=$id") or die($mysqli->error());
        }
        header("location: index.php");
    }
  
?>