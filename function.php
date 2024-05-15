<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Function</title>
</head>

<body>

    <h1><?= salam("Pagi", "Zee"); ?></h1>

    <?php include "sidebar.php"; ?>

    <?php
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

</body>

</html>