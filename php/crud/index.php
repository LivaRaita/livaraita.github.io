<?php require_once "./db-wrapper.php";

$db = new DB();

$db->openConnection();

$response = $db->run("SELECT * FROM people");

?>

<table>
    <tr>
        <th>Name</th>
    </tr>
    <?php
    while($row = mysqli_fetch_assoc($response)) {
        echo "<tr><td>" . $row["name"] . "</td><td><button>Delete</button></td></tr>" ;
    }

    $db->closeConnection();
    ?>
</table>
