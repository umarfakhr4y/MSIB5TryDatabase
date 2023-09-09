<?php
include_once("conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["snama"];
    $telepon = $_POST["stelepon"];
    $email = $_POST["semail"];

    // Query SQL untuk menambahkan data ke dalam tabel users
    $sql = "INSERT INTO users (id, nama, telepon, email) VALUES (NULL, '$nama', '$telepon', '$email')";
    if (mysqli_query($mysqli, $sql)) {
        echo "Data berhasil ditambahkan.";
    } else {
        $errorMessage = "Error: " . $sql . "<br>" . mysqli_error($mysqli);
        echo $errorMessage;
        echo '<script>showError("' . $errorMessage . '");</script>'; // Memanggil showError dengan pesan kesalahan
    }

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

    <title>Tugas 6 - Umar Fakhriy</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-5">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        Tugas 6 - Umar Fakhriy
                    </div>
                    <div class="card-body">

                        <form method="POST" action="add.php" name="adduser">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" class="form-control" name="snama" aria-describedby="emailHelp"
                                    placeholder="Masukan Nama" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Telepon</label>
                                <input type="text" class="form-control" name="stelepon" aria-describedby="emailHelp"
                                    placeholder="Masukan Nomor Telepon" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" name="semail" aria-describedby="emailHelp"
                                    placeholder="Masukan Email" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                            <br>
                            <br>
                            <a href="index.php" type="submit" class="btn btn-success">Lihat Peserta</a>

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