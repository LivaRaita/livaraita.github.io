<?php
require_once("db_connect.php");
if(isset($_POST["submit"])) {
$description = $_POST["todoDescription"];

//connect to database
db();
global $link;
$query = "INSERT INTO todolist(todoDescription, date) VALUES ('$description', now())";
$insertTodo = mysqli_query($link, $query);
if($insertTodo){
echo "successfully";
} else {
echo mysqli_error($link);
}
mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Todo List</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Create Todo List</h1>
    <form method="post" action="create.php">
        <label> Task
        <input name="todoDescription" type="text">
        </label>
        <input name="submit" type="submit" value="submit">
    </form>
    
</body>
</html>

<?php
    if(isset($_POST["submit"])) {
    $description = $_POST["todoDescription"];
    echo "you filled description " . $description;
    }
?>