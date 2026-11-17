<?php
$conn = mysqli_connect("localhost", "root", "", "banyu");

if (!$conn) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if (isset($_GET['pilno'])) {
    $pilno = $_GET['pilno'];

    $sql = "DELETE FROM sija2 WHERE no = '$pilno'";

    if (mysqli_query($conn, $sql)) {
        header("Location: lat_insert_valid.php");
        exit();
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>