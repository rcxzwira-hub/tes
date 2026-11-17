<?php 
$conn = mysqli_connect("localhost", "root", "", "banyu");

//echo $_GET['nama'] . $_GET['email'] . $_GET['website'] . $_GET['komen']. $_GET['gender']

if (isset ($_GET['nama']) and isset ($_GET['email']) and isset ($_GET['website']) and isset ($_GET['komen']) and isset ($_GET['gender'])) 
    {
if ($_GET['nama'] and $_GET['email'] and $_GET['website'] and $_GET['komen'] and $_GET['gender'])  {

$simpandb="insert into sija2 (nama,email,website,komen,gender)
           values ('$_GET[nama]','$_GET[email]','$_GET[website]','$_GET[komen]','$_GET[gender]') "; 

 if ($simqr=mysqli_query($conn,$simpandb) ) {
    echo "data sudah tersimpan" ;
    }
    } else { echo " setiap data wajib diisi" ;}

    }  else
    { echo "data wajib diisi jangan langsung liat insert2paandang.php" ;}
?>