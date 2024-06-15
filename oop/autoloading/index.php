<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/img/app/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/img/app/favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="/css/style.css">
    <title>Autoloading</title>
</head>

<body>

    <?php include '../../sidebar.php' ?>

    <div class="main">

        <h1>Autoloading</h1>
        <hr>

        <?php
        // Autoloading adalah memanggil Class tanpa require
        // Karna biasanya masing-masing Class itu dipisah di masing-masing File

        require_once "App/init.php";

        $produk = new Komik("Ahonok", "NAAAC", 30000, 20);
        $produk2 = new Game("Skyrim", "Bethesda", 250000, 35);

        $cetakProduk = new CetakInfoProduk();
        $cetakProduk->tambahProduk($produk);
        $cetakProduk->tambahProduk($produk2);

        echo $cetakProduk->cetak();

        echo "<br>";

        new Coba();
        ?>

    </div>

</body>

</html>