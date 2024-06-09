<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/img/app/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/img/app/favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="/css/style.css">
    <title>Function</title>
</head>

<body>

    <div class="main">

        <h1>Function</h1>
        <hr>

        <h3><?= salam("Pagi", "Zee"); ?></h3>

        <?php
        include "../sidebar.php";

        // ---Ada Built-in Function PHP---
        echo date("l, d-M-Y") . "<br>";
        echo time() . "<br>";
        echo date("l", time() + 60 * 60 * 24 * 100) . "<br>";
        /* mktime(0,0,0,0,0,0)
        jam, menit, detik, bulan, tanggal, tahun */
        echo date("l", mktime(0, 0, 0, 5, 26, 2002)) . "<br>";
        echo date("l", strtotime("5 may 2002"));

        // ---Ada User Defined Function PHP---
        function salam($waktu = "Datang", $nama = "Admin")
        {
            return "Selamat $waktu, $nama";
        }
        ?>

    </div>

</body>

</html>