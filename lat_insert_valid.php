<?php
$conn = mysqli_connect("localhost", "root", "", "banyu");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Proses simpan data jika ada pengiriman dari form (POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $website = $_POST['website'] ?? '';
    $comment = $_POST['comment'] ?? '';
    $gender = $_POST['gender'] ?? '';

    $uploads_dir = "uploads";
    $file = "";

    if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0) {
        if (!is_dir($uploads_dir)) {
            mkdir($uploads_dir, 0777, true);
        }

        $tmp_name = $_FILES["fileToUpload"]["tmp_name"];
        $nm = basename($_FILES["fileToUpload"]["name"]);
        $file = uniqid() . "_" . $nm;

        if (!move_uploaded_file($tmp_name, $uploads_dir . "/" . $file)) {
            die("File gagal diupload");
        }
    }

    $simdb = "INSERT INTO sija2 (name, `e-mail`, website, comment, gender, file)
              VALUES ('$nama', '$email', '$website', '$comment', '$gender', '$file')";

    if (mysqli_query($conn, $simdb)) {
        echo "Data sudah tersimpan<br><br>";
    } else {
        echo "Data gagal disimpan: " . mysqli_error($conn) . "<br><br>";
    }
}

// Menampilkan tabel data beserta kolom File
$ambil = mysqli_query($conn, "SELECT * FROM sija2");

echo "<table border='1' cellpadding='4' cellspacing='1'>
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>E-mail</th>
    <th>Website</th>
    <th>Comment</th>
    <th>Gender</th>
    <th>File</th>
    <th>Modify</th>
</tr>";

while ($row = mysqli_fetch_assoc($ambil)) {
    echo "<tr>";
    echo "<td>" . $row['no'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['e-mail'] . "</td>";
    echo "<td>" . $row['website'] . "</td>";
    echo "<td>" . $row['comment'] . "</td>";
    echo "<td>" . $row['gender'] . "</td>";

    // Menampilkan gambar jika kolom file tidak kosong
    echo "<td>";
    if (!empty($row['file'])) {
        echo "<img src='uploads/" . $row['file'] . "' width='80'><br>";
        echo "<small>" . $row['file'] . "</small>";
    } else {
        echo "-";
    }
    echo "</td>";

    echo "<td><a href='lat_delete.php?pilno=" . $row['no'] . "'>Delete</a></td>";
    echo "</tr>";
}

echo "</table>";

mysqli_close($conn);
?>