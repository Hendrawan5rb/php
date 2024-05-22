<?php
require "../connect.php";

if (!isset($_SESSION['login'])) {
    header("Location: /auth/login.php");
    exit;
}

$id = $_GET['id'];
$gambar = $_GET['gambar'];

if (delete($id, $gambar) > 0) {
    echo "<script>
            alert('Berhasil');
            document.location.href= 'index.php'
        </script>";
} else {
    echo "<script>
            alert('Gagal');
            document.location.href= 'index.php'
        </script>";
}
