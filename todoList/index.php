<?php
    require_once("db_connect.php"); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Todos</title>
</head>
<body>
    <h2>My Todos</h2>
    <p><a href="create.php">Add a Todo</a></p>

<?php
    db();
    global $link;
    $query = "SELECT id, todoDescription, date FROM todolist";
    $result = mysqli_query($link, $query);

    //check if there’s any data inside the table
    if(mysqli_num_rows($result) >= 1){
        while($row = mysqli_fetch_array($result)){
            $id = $row['id'];
            $description = $row['todoDescription'];
            $date = $row['date'];
            ?> 

    <ul>
        <li><a href="detail.php?id=<?php echo $id?>"><?php echo $description ?></a></li><?php echo "[[$date]]";?>
        <button type="button"><a href="edit.php?id=<?php echo $id?>">Edit</a></button>
        <button type="button"><a href="delete.php?id=<?php echo $id?>">Delete</a></button>
    </ul>
<?php
    }
}
 ?> 
    
</body>
</html>