<?php

$host="localhost";
$user="root" ;
$pass="" ;
$database="datasiswamm1";

$link = mysqli_connect("$host", $user, $pass, $database);

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$sql = "UPDATE persons SET NAMA='ZAKY',KELAMIN='WANITA', ALAMAT='DEPOK' WHERE NIS=1001";
if(mysqli_query($link, $sql)){
    echo "Records were updated successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


mysqli_close($link);
?>