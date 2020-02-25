<?php echo "Submit" ?>
<!-- TODO: Create submit functionality -->

<?php
    var_dump($_POST);

    $email = $_GET["email"];
    $age = $_GET["age"];
    $user_id = $_GET["user_id"];

    // Concatenation using dots:
    $q = "INSERT INTO users (email, age) VALUES (" . $GET["email"]. ", " . $GET['age'] . ")";

    $q = "INSERT INTO users (email, age) VALUES ($email, $age)";

    if ($GET["user_id"]) {
        $q = "UPDATE users SET email=$email, age=$age WHERE user_id=" . $_GET("user_id");
    } else {
        $q = "INSERT INTO users (email, age) VALUES ($email, $age)";
    }

    echo $q;
?>