<?php
switch ($_SERVER["REQUEST_URI"]) {
  case "/livaraita.github.io/php/todo-list/":
    require_once "../todo-list/controllers/users/index.php";
  break;
}
?>