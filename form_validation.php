<?php
$name = $email = $website = $comment = $gender = $File = "";
$nameErr = $emailErr = $websiteErr = $genderErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['name'])) {
        $nameErr = "nama belum di isi";
    } else {
        $name = test_input($_POST['name']);
    }

    if (empty($_POST['email'])) {
        $emailErr = "email belum di isi";
    } else {
        $email = test_input($_POST['email']);
    }

    if (empty($_POST["website"])) {
        $website = "";
    } else {
        $website = test_input($_POST["website"]);
    }

    if (empty($_POST["comment"])) {
        $comment = "";
    } else {
        $comment = test_input($_POST["comment"]);
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }

    if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0) {
        $File = basename($_FILES["fileToUpload"]["name"]);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = strtoupper($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<form action="lat_insert_valid.php" method="POST" enctype="multipart/form-data">

    Name:
    <input type="text" name="name">
    <?php echo $nameErr; ?>
    <span class="error">*</span>

    <br><br>

    E-mail:
    <input type="text" name="email">
    <?php echo $emailErr; ?>
    <span class="error">*</span>

    <br><br>

    Website:
    <input type="text" name="website">
    <span><?php echo $websiteErr; ?></span>

    <br><br>

    Comment:
    <textarea name="comment" rows="5" cols="40"></textarea>

    <br><br>

    Gender:
    <input type="radio" name="gender" value="female">Female
    <input type="radio" name="gender" value="male">Male
    <span><?php echo $genderErr; ?></span>

    <br><br>

    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">

    <br><br>

    <input type="submit" name="submit" value="Submit">

</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
echo "<br>";
echo $File;
?>