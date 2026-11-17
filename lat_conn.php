<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$host="localhost";
$user="root";
$pass="";
$database="banyu";

$link = mysqli_connect($host, $user, $pass, $database);

// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}
echo "Connected successfully ";
?>