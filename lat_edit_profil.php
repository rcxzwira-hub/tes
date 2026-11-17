<?php
// Menyembunyikan peringatan (warning) bawaan PHP agar form tidak terdorong ke bawah
error_reporting(0);
include("koneksi.php");

// Variabel kosong untuk mencegah form error jika data belum dimuat
$id_profil = ""; 
$nama = ""; 
$jk = ""; 
$almt = ""; 
$tlp = "";

if (isset($_GET['edit_id']) && $link) {
    // Mengambil dan mengamankan ID dari URL
    $id_edit = mysqli_real_escape_string($link, $_GET['edit_id']);
    
    $sql = "SELECT * FROM mm2 WHERE NIS = '$id_edit'";
    $query = mysqli_query($link, $sql);

    // Memasukkan data ke variabel jika ditemukan
    if ($query && mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_array($query);
        $id_profil = $data["NIS"];
        $nama      = $data["NAMA"];
        $jk        = $data["KELAMIN"];
        $almt      = $data["ALAMAT"];
        $tlp       = $data["NOMERTELEPON"];
    }
}
?>

<form action="update.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_profil" value="<?php echo $id_profil; ?>">
    <table align="center">
        <tr>
            <td colspan="3"><h3>Form Input Profil</h3></td>
        </tr>
        <?php if (!$link) echo "<tr><td colspan='3' style='color:red;'>Error: koneksi.php belum dibuat/gagal terhubung!</td></tr>"; ?>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="text" name="nama" value="<?php echo $nama; ?>"></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>
                <input type="radio" name="jenis_kelamin" value="Laki-laki" <?php if($jk == 'LAKI') echo "checked"; ?>>Laki-laki
                <input type="radio" name="jenis_kelamin" value="Perempuan" <?php if($jk == 'WANITA') echo "checked"; ?>>Perempuan
            </td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><textarea cols="30" rows="5" name="alamat"><?php echo $almt; ?></textarea></td>
        </tr>
        <tr>
            <td>Nomor Telepon</td>
            <td>:</td>
            <td><input type="text" name="tlp" value="<?php echo $tlp; ?>"></td>
        </tr>
        <tr>
            <td colspan="3">
                <input type="submit" name="submit" value="Send">
                <input type="reset" name="reset" value="Clear">
            </td>
        </tr>
    </table>
</form>