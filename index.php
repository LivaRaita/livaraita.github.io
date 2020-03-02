<?php
    switch ($_SERVER["REQUEST_URI"]) {
      case "/livaraita.github.io/php/crud-2/":
        require_once "../crud-2/controllers/users/index.php";
      break;
      case "/livaraita.github.io/php/crud-2/add":
        require_once "../crud-2/controllers/add.php";
      break;
      default:
        echo phpinfo();
      break;
    }
?>