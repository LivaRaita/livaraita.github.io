<?php
    session_start();
    session_destroy();
    header("Location: /livaraita.github.io/php/todo-list/")
?>