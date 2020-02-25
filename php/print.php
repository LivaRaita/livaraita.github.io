<?php require_once "./include.php";
echo $testVar;

?>

<br/>

<?php echo "Hi " . $_POST["email"] . ", your age is: " . $_POST["age"] ?>

<br/>

<?php 
$email = $_POST["email"];
$age = $_POST["age"];
echo "Hi, " . $email . " your age is: " . $age; 

?>

<br/>

<?php 
$obj = ["key_1" => 10, "key_2" => 100];
echo $obj["key_2"];

?>

<br/>

<?php 
$file = fopen('test-file.txt', "w");

fwrite($file, "Write this to file");
fclose($file);
?>

