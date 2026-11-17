<?php

$host="localhost";
$user="root" ;
$pass="" ;
$database="datasiswamm1";

$link = mysqli_connect("$host", $user, $pass, $database);


if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$sql = "DELETE FROM mm1 WHERE NIS=1001 ";
if(mysqli_query($link, $sql)){
    echo "Records were deleted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


mysqli_close($link);
?>
```[cite: 2]