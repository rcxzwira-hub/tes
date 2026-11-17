<?php
//upload.php
$uploads_dir="upload";
    $tmp_name = $_FILES["fileToUpload"]["tmp_name"];

    $nm = basename($_FILES["fileToUpload"]["name"] );
echo $tmp_name . "<br>"; //file temporary yang akan di copy

echo $nm;  //informasi nama file disimpan ke database

//    $hasil = move_uploaded_file($tmp_name,$uploads_dir."/". $nm );  //cara1

    move_uploaded_file($tmp_name,$uploads_dir. "/" . $nm );  //cara 2

?>