<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/img/app/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/img/app/favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="/css/style.css">
    <title>Constant</title>
</head>

<body>

    <?php include '../sidebar.php' ?>

    <div class="main">

        <h1>Constant</h1>
        <hr>

        <?php
        // Constant/Konstanta
        // Nilai Konstanta tidak berubah tidak seperti Variabel
        // Biasakan menamai Konstanta dengan huruf KAPITAL semua supaya membedakan antara Konstanta dan Variabel

        // Tidak bisa masuk dalam Class
        define('NAMA', "Hello");

        // Bisa
        const UMUR = 19;

        class Tes
        {
            // define('NAMA', "Hello");
            const UMUR = 20;
            public $kelas = __CLASS__;
        }

        function coba()
        {
            return __FUNCTION__;
        }

        echo NAMA . "<br>";
        echo UMUR . "<br>";

        echo Tes::UMUR . "<br>";

        // Magic Constant
        echo __LINE__ . "<br>";
        echo __FILE__ . "<br>";
        echo __DIR__ . "<br>";

        echo coba() . "<br>";

        $obj = new Tes();
        echo $obj->kelas;
        ?>

    </div>

</body>

</html>