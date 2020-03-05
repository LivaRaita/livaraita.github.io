<?php

session_start();

function getToken($length) { 
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomString = ''; 

    for ($i = 0; $i < $length; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 

    return $randomString; 
};

$_SESSION["edit_access_token"] = getToken(25);

header("Location: /livaraita.github.io/php/crud-2/edit.php?token=" . $_SESSION["edit_access_token"]);
?>