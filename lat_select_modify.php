<table border="1">
<tr>
    <th> No </th> 
    <th> Nama </th> 
    <th> E-mail </th> 
    <th> Website </th> 
    <th> Comment </th> 
    <th> Gender </th> 
    <th> Modify </th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "banyu");

$databaca = "select * from sija2";
$datres = mysqli_query($conn, $databaca);

while ($datarr = mysqli_fetch_array($datres)) {
    echo "<tr>
            <td>" . $datarr[0] . "</td> 
            <td>" . $datarr[1] . "</td>
            <td>" . $datarr[2] . "</td>
            <td>" . $datarr[3] . "</td>
            <td>" . $datarr[4] . "</td>
            <td>" . $datarr[5] . "</td>
            <td> <a href='lat_delete.php?pilno=" . $datarr[0] . "'> Delete </a> </td>
        </tr>";
}
?>
</table>