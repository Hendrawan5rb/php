<?php
// Closure = Fungsi tanpa nama
spl_autoload_register(function ($class) {
    require_once "Produk/" . $class . ".php";

    // Sama aja cuma lebih lengkap :
    // require_once __DIR__ . "Produk/" . $class . ".php";
});
