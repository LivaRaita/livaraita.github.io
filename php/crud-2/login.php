<?php

session_start();

if ($_SESSION['user_id']) {
    header("location: /livaraita.github.io/php/crud-2/"); // will return to index page (nothing else will be executed in this file)
} 

function getToken($length) { 
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomString = ''; 

    for ($i = 0; $i < $length; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 

    return $randomString; 
};

if (isset($_POST['submit'])) {

    if($_SESSION['csrfToken'] !== $_POST['csrfToken']) {
        echo "What a hacker";
        return;
    }
    require_once "helpers/db-wrapper.php";
    require_once "entity/User.php";
    $name = $_POST["name"];
    $response = DB::run("SELECT * FROM people WHERE name='$name'");
    $password;
    $user;

    if (!$response->num_rows) {
        echo "User does not exist";
        return;
    } else {

        while($row = mysqli_fetch_assoc($response)) {
            $user = new User($row);
        }

        
        $saltedPassword = $_POST["password"] . $user::SALT;
        $validPassword = password_verify($saltedPassword, $user->getPassword());

        // echo $saltedPassword;
        // var_dump($user);
        // var_dump($_POST);

        if($validPassword) {
            $_SESSION['user_id'] = $user->getId();
            $_SESSION['user name'] = $_POST["name"];
            header("Location: /livaraita.github.io/php/crud-2/");
        } else {
            echo "Invalid password";
        }

    }

} else {
    $csrfToken = getToken(25);
    $_SESSION['csrfToken'] = $token;

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

            <!-- Add hidden token field -->
            <input name="csrfToken" value="<?= $csrfToken ?>" hidden>
            <!-- ---- -->

            <button name="submit" type="submit" class="btn btn-primary">Login (PHP)</button>
           
        </form>
    </div>

  


</form>

    
</body>
</html>