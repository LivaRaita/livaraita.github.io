<?php
switch ($_SERVER["REQUEST_URI"]) {
  case "/livaraita.github.io/php/crud-2/":
    require_once "./controllers/users/index.php";
  break;
}
?>