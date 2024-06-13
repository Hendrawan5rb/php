<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/img/app/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/img/app/favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="/css/style.css">
    <title>Static Keyword</title>
</head>

<body>

    <?php include '../sidebar.php' ?>

    <div class="main">

        <h1>Static Keyword</h1>
        <hr>

        <?php
        // Static Keyword memungkinkan untuk mengakses Property dan Method tanpa Instansisasi Object

        // WHY!?
        // 1. Membuat Member (Property dan Method) yang terikat dengan CLass bukan Object
        // 2. Nilai Static tetap meskipun Object di Instansiasi berulang kali
        // Membuat kode seolah olah menjadi "Procedural"
        // 4. Biasanya digunakan untuk membuat fungsi bantuan/helper
        // 5. Biasanya juga digunakan di Class-Class utility pada framework

        class TidakStatic
        {
            public $angka = 1;

            public function hello()
            {
                return "Halo! " . $this->angka++;
            }
        }

        class ClassStatic
        {
            public static $angka = 1;

            public static function hello()
            {
                return "Halo! " . self::$angka++;
            }
        }

        $tdk = new TidakStatic();
        echo $tdk->hello() . "<br>";
        echo $tdk->hello() . "<br>";
        echo $tdk->hello() . "<br>";

        $tdk2 = new TidakStatic();
        echo $tdk2->hello() . "<br>";
        echo $tdk2->hello() . "<br>";
        echo $tdk2->hello() . "<br>";

        echo "<br>";

        $stc = new ClassStatic();
        echo $stc->hello() . "<br>";
        echo $stc->hello() . "<br>";
        echo $stc->hello() . "<br>";

        $stc2 = new ClassStatic();
        echo $stc2->hello() . "<br>";
        echo $stc2->hello() . "<br>";
        echo $stc2->hello() . "<br>";

        echo "<br>";

        echo ClassStatic::$angka . "<br>";
        echo ClassStatic::hello();
        ?>

    </div>

</body>

</html>