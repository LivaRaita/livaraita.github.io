<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Todo List</title>
    <link rel="stylesheet" type="text/css" href="resources/todo.css" />
    <script
      src="https://code.jquery.com/jquery-3.4.1.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <form method="post" action="create.php">
      <input name="description" type="text" />
      <button type="submit" name="submit" value="submit">Add</button>
    </form>
    <ul></ul>
    <script type="text/javascript" src="resources/todo.js"></script>
  </body>
</html>

<?php
  if(isset($_POST["submit"])) 
  {
  $description = $_POST["description"];
  echo $description;
  }
?>

<?php
// require_once("db_connect.php");
// if(isset($_POST["submit"])) {
// $description = $_POST["description"];

// //connect to database
// db();
// global $link;
// $query = "INSERT INTO todo(description) VALUES ('$description')";
// $insertTodo = mysqli_query($link, $query);
// if($insertTodo){
// echo “successfully”;
// }else{
// echo mysqli_error($link);
// }
// mysqli_close($link);
// }
?>

<?php
    if(isset ($_POST["submit"])){
   
    require_once "db-connect.php";
    $description = $_POST["description"];


    // header("Location: todo-list");
}

    
?>
