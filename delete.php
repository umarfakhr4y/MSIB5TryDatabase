<?php
include_once("conn.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    // Query SQL untuk menghapus data berdasarkan ID
    $sql = "DELETE FROM users WHERE id=$id";

    if (mysqli_query($mysqli, $sql)) {
        header("Location: index.php"); // Redirect kembali ke halaman utama setelah penghapusan berhasil
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
}
?>
