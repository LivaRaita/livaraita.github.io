<?php
    require_once("process.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Todos</title>
    <link href="https://fonts.googleapis.com/css?family=Inter:500,600,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/521291c984.js" crossorigin="anonymous"></script>
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <script
        src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
        integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
        crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">

        <!-- *** Date display *** -->
        <h1 id="date">Date goes here</h1>
        <div>
            <?php
                $mysqli = new mysqli("mysql-server-80", "root", "root_password", "todolist") or die(mysqli_error($mysqli));
                $completed = $mysqli->query("SELECT COUNT(CASE checked when 1 then 1 else null end) FROM todolist") or die($mysqli->error);
                $incomplete= $mysqli->query("SELECT COUNT(CASE checked when 0 then 1 else null end) FROM todolist") or die($mysqli->error);
            ?>
        </div>

        <!-- *** Incomplete and complete task counter *** -->
        <h3>
            <span><?php echo $incomplete->fetch_row()[0] ?></span> incomplete, 
            <span><?php echo $completed->fetch_row()[0]?></span> completed
        </h3>
        
        <!-- *** Status messages after task addition, edition, and deletion *** -->
        <?php
            if(isset($_SESSION["message"])):?>

            <div class="alert alert-<?=$_SESSION['msg_type']?> fade-in-out">
                
                <?php
                    echo $_SESSION["message"]; 
                    unset($_SESSION["message"]);
                ?>
            </div>
        <?php endif ?>

        <!-- *** Task description form *** -->
        <div>
            <form method="POST" action="process.php" id="task-input-wrapper" class="form-inline form-group form-row">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input name="todoDescription" type="text" class="form-control form-control-lg task-input" value="<?php echo $description; ?>" placeholder="Write a task...">
                
                <?php
                    if($update == true):
                ?>
                <button name="update" type="submit" value="submit" class="btn-submit">Update</button>

                <?php else: ?>

                <button name="submit" type="submit" value="submit" class="btn-submit">Add</button>
                <?php endif; ?>
             
            </form>
        </div>
        
        <!-- *** Table with incomplete tasks *** -->
        <div class="todo">

            <?php
                $mysqli = new mysqli("mysql-server-80", "root", "root_password", "todolist") or die(mysqli_error($mysqli));
                $result = $mysqli->query("SELECT * FROM todolist WHERE checked = 0 ORDER BY order_id ASC, date DESC") or die($mysqli->error);
            ?>

            <div class="row">
                <table class="table">
                    <thead>
                        <tr><th>Incomplete</th></tr>
                    </thead>
                    <tbody id="sortable">
                        <?php
                            while ($row = $result->fetch_assoc()):?>
                            <tr data-row-id="<?php echo $row['id'] ?>" class="todo-item" data-order="" >
                                <td>
                                    <form method="POST" action="process.php">
                                        <span class="handle"><i class="fas fa-grip-lines"></i></span>
                                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                        <input type="hidden" name="checked" value="0">
                                        <label class="custom-checkbox">
                                            <input href="index.php?checked=<?php echo $row['id'] ?>" type="checkbox" value="1" name="checked" class="mr-2" <?php echo $row['checked'] ? 'checked': ''?> onchange='this.form.submit()'>
                                        </label>
                                        <p><?php echo $row["todoDescription"]?></p>
                                    </form>
                            
                                    <div class="button-groups">
                                        <a name="edit" href="index.php?edit=<?php echo $row['id']?>" class="btn"><i class="fas fa-pen"></i></a>
                                        <a name="delete" href="index.php?delete=<?php echo $row['id']?>" class="btn"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- *** Table with completed tasks *** -->
        <div class="done">

            <?php
                $mysqli = new mysqli("mysql-server-80", "root", "root_password", "todolist") or die(mysqli_error($mysqli));
                $result = $mysqli->query("SELECT * FROM todolist WHERE checked = 1") or die($mysqli->error);
            ?>

            <div class="row">
                <table class="table">
                    <thead>
                        <tr><th>Completed</th></tr>
                    </thead>
                    <?php
                        while ($row = $result->fetch_assoc()):?>
                            <tr>
                                <td>
                                    <form method="POST" action="process.php" >
                                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                        <input type="hidden" name="checked" value="0">
                                        <label class="custom-checkbox"><i class="fas fa-check"></i>
                                            <input href="index.php?checked=<?php echo $row['id'] ?>" type="checkbox" value="1" name="checked" class="mr-2" <?php echo $row['checked'] ? 'checked': ''?> onchange='this.form.submit()'>
                                        </label>
                                        <p><?php echo $row["todoDescription"]?></p>
                                    </form>
                                
                                    <div class="button-groups">
                                        <a name="delete" href="index.php?delete=<?php echo $row['id']?>" class="btn"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                </td>
                            </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>
    </div>
 
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="scripts.js"></script>
</body>
</html>