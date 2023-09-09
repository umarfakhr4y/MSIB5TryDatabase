<?php
include_once("conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"]; // Ambil ID yang dikirimkan melalui input hidden
    $nama = $_POST["snama"];
    $telepon = $_POST["stelepon"];
    $email = $_POST["semail"];

    // Query SQL untuk memperbarui data berdasarkan ID
    $sql = "UPDATE users SET nama='$nama', telepon='$telepon', email='$email' WHERE id=$id";

    if (mysqli_query($mysqli, $sql)) {
        header("Location: index.php"); // Redirect kembali ke halaman utama setelah pembaruan berhasil
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($mysqli, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $nama = $row['nama'];
        $telepon = $row['telepon'];
        $email = $row['email'];
    } else {
        echo "ID tidak valid.";
    }
} else {
    echo "ID tidak ditemukan.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Edit Data - Umar Fakhriy</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-5">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        Edit Data - Umar Fakhriy
                    </div>
                    <div class="card-body">

                        <form method="POST" action="edit.php">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" class="form-control" name="snama" aria-describedby="emailHelp"
                                    placeholder="Masukan Nama" value="<?php echo $nama; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Telepon</label>
                                <input type="text" class="form-control" name="stelepon" aria-describedby="emailHelp"
                                    placeholder="Masukan Nomor Telepon" value="<?php echo $telepon; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" name="semail" aria-describedby="emailHelp"
                                    placeholder="Masukan Email" value="<?php echo $email; ?>" required>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $id; ?>"> <!-- Sembunyikan ID dalam input hidden -->
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <br>
                            <br>
                            <a href="index.php" type="button" class="btn btn-success">Lihat Peserta</a>

                        </form>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>