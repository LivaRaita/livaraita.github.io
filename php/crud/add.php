<?php 

require_once "./db-wrapper.php";

if (isset($_POST["name"])) {
    $name = $_POST["name"];
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

$form_name = '';
$id = '';


if(isset($_POST["name"])) {

    $db = new DB();

    $db->openConnection();

    $name = $_POST["name"];

    if(empty($_POST["id"])) {
        $db->run("INSERT INTO people (name) VALUES ('$name')");
    } else {
        $db->run("UPDATE people SET name='$name' WHERE id=".$_POST["id"]);
    }

    
   

    $db->closeConnection();


}

if ($_GET["id"]) {
    $id = $_GET["id"];
    $db = new DB();
    $db->openConnection();

    $response = $db->run("SELECT * FROM people WHERE id=" .$_GET["id"]);

    while($row = mysqli_fetch_assoc($response)) {
        $form_name = $row["name"];
    }

    $db->closeConnection();
   
}

?>

<form action="./add.php" method="post">
    <input name="name" value="<?php echo $form_name ?>">
    <input hidden name="id" value="<?= $id ?>">
    <button type="submit">Save</button>


</form>