<?php
require_once __DIR__ . '../../vendor/autoload.php';
require "../connect.php";

if (!isset($_SESSION['login'])) {
    header("Location: /auth/login.php");
    exit;
}

$komik = read("SELECT judul FROM komik ORDER BY id DESC");

if ($komik == false) {
    $html = "Data tidak ditemukan";
} else {
    $html = "<h1>Daftar semua data</h1>";
    $html .= "<ol>";

    foreach ($komik as $k) {
        $html .= "<li>" . $k['judul'] . "</li>";
    }

    $html .= "</ol>";
}

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output();
