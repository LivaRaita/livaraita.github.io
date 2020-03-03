<?php

session_start();

if ($_SESSION['user_id']) {
    header("location: /livaraita.github.io/php/crud-2/"); // will return to index page (nothing else will be executed in this file)
} 

if (isset($_POST['submit'])) {
    require_once "helpers/db-wrapper.php";
    $name = $_POST["name"];
    $response = DB::run("SELECT * FROM people WHERE name='$name'");
    $password;

    if (!$response->num_rows) {
        echo "User does not exist";
        return;
    } else {
        while($row = mysqli_fetch_assoc($response)) {
            $password = $row["password"];
            $user_id = $row["id"];
        }

        $validPassword = password_verify($_POST["password"], $password);

        if($validPassword) {
            $_SESSION['user_id'] = $user_id;
            header("Location: /livaraita.github.io/php/crud-2/");
        } else {
            echo "Invalid password";
        }

    }

        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Project</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
</head>
<body>
    <div class="container d-flex justify-content-center">
        <form action="/livaraita.github.io/php/crud-2/login.php" method="post">
            <div class="form-group">
                <label>Name
                    <input name="name" class="form-control" type="text" value="<?php echo $name ?>">
                </label>
            </div>
            <div>
                <label>Password
                    <input name="password" class="form-control" type="password" value="<?= $password?>">
                </label>
            </div>
            <button name="submit" type="submit" class="btn btn-primary">Login (PHP)</button>
           
        </form>
    </div>

  


</form>

    
</body>
</html>