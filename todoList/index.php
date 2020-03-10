<?php
    
    require_once("process.php");
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Todos</title>
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <script
  src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
  integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
  crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/521291c984.js" crossorigin="anonymous"></script>
  
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php
        if(isset($_SESSION["message"])):?>

        <div class="alert alert-<?=$_SESSION['msg_type']?>">
            
            <?php
                echo $_SESSION["message"];
                unset($_SESSION["message"]);
                
            ?>
        </div>
        <?php endif ?>


    <div class="container">
        <div class="row">
            <form method="POST" action="process.php">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group">
                    <input name="todoDescription" type="text" class="form-control" value="<?php echo $description; ?>" placeholder="Write a task...">
                </div>
                <div class="form-group">
                <?php
                    if($update == true):
                ?>
                    <button name="update" type="submit" value="submit" class="btn btn-info">Update</button>
                <?php else: ?>
                    <button name="submit" type="submit" value="submit">Add</button>
                <?php endif; ?>
                </div>
                
            </form>

            </div>

            <div class="todo">

                <?php
                    $mysqli = new mysqli("mysql-server-80", "root", "root_password", "todolist") or die(mysqli_error($mysqli));
                    $result = $mysqli->query("SELECT * FROM todolist WHERE checked = 0") or die($mysqli->error);
                ?>
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                            
                                <th>My Todos</th>
                                <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody id="sortable">
                <?php
                    while ($row = $result->fetch_assoc()):?>
                        <tr data-order="">
                            <td>
                                
                                <form method="POST" action="process.php">
                                    <span class="handle"><i class="fas fa-grip-lines"></i></span>
                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                    <input type="hidden" name="checked" value="0">
                                    <input href="index.php?checked=<?php echo $row['id'] ?>" type="checkbox" value="1" name="checked" class="mr-2" <?php echo $row['checked'] ? 'checked': ''?> onchange='this.form.submit()'>
                                    <p><?php echo $row["todoDescription"]?></p>
                                </form>
                            </td>

                                
                            <td>
                                <a name="edit" href="index.php?edit=<?php echo $row['id']?>" class="btn btn-primary">Edit</a>
                                <a name="delete" href="index.php?delete=<?php echo $row['id']?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                <?php endwhile; ?>
                            </tbody>
                        </table>


                    </div>
            </div>

            <div class="done">
            <?php
                    $mysqli = new mysqli("mysql-server-80", "root", "root_password", "todolist") or die(mysqli_error($mysqli));
                    $result = $mysqli->query("SELECT * FROM todolist WHERE checked = 1") or die($mysqli->error);
                ?>
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                            
                                <th>Done</th>
                                <th colspan="2">Action</th>
                                </tr>
                            </thead>
                <?php
                    while ($row = $result->fetch_assoc()):?>
                        <tr>
                            <td>
                                <form method="POST" action="process.php">
                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                    <input type="hidden" name="checked" value="0">
                                    <input href="index.php?checked=<?php echo $row['id'] ?>" type="checkbox" value="1" name="checked" class="mr-2" <?php echo $row['checked'] ? 'checked': ''?> onchange='this.form.submit()'>
                                    <p><?php echo $row["todoDescription"]?></p>
                                </form>
                            </td>

                                
                            <td>
                                
                                <a name="delete" href="index.php?delete=<?php echo $row['id']?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                <?php endwhile; ?>

                        </table>


                    </div>

            </div>




        
        <?php
        //     }
        // }
        ?> 
    </div>
 
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript" src="scripts.js"></script>
</body>
</html>