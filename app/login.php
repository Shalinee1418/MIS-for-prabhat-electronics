<?php
$email = $_POST['email'];
$password = $_POST['password'];

$credentials = parse_ini_file("../env.ini");

$connection = new mysqli($credentials['server'], $credentials['user'], $credentials['password'], $credentials['database']);
if ($connection->connect_error) {
    die("Error occured - " . $connection->error);
}

$sql = "SELECT * FROM user WHERE email='$email' AND password=SHA1('$password')";

$result = $connection->query($sql);

if($result->num_rows > 0){
session_start();
$_SESSION['email'] = $email;
header("location:../app/pages/dashboard.php");
}
else
    echo "Authentication failed!";
