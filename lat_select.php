<?php
/* Attempt MySQL server connection */

$host = "localhost";
$user = "root";
$pass = "";
$database = "banyu";

$link = mysqli_connect($host, $user, $pass, $database);

// Check connection
if ($link === false) {
    die("Connection failed: " . mysqli_connect_error());
}

// Attempt select query execution
$sql = "SELECT * FROM sija2";

if ($result = mysqli_query($link, $sql)) {

    if (mysqli_num_rows($result) > 0) {

        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>NO</th>";
        echo "<th>NAME</th>";
        echo "<th>EMAIL</th>";
        echo "<th>WEBSITE</th>";
        echo "<th>COMMENT</th>";
        echo "<th>GENDER</th>";
        echo "</tr>";

        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row[0] . "</td>";
            echo "<td>" . $row[1] . "</td>";
            echo "<td>" . $row[2] . "</td>";
            echo "<td>" . $row[3] . "</td>";
            echo "<td>" . $row[4] . "</td>";
            echo "<td>" . $row[5] . "</td>";
            echo "</tr>";
        }

        echo "</table>";

        // Free result set
        mysqli_free_result($result);

    } else {
        echo "No records matching your query were found.";
    }

} else {
    echo "ERROR: Could not execute query. "
         . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>