<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/img/app/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/img/app/favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="/css/style.css">
    <title>Constructor METHod</title>
</head>

<body>

    <?php include '../sidebar.php' ?>

    <div class="main">

        <h1>Constructor METHod</h1>
        <hr>

        <?php
        // Constructor METHod adalah METHod yang otomatis dijalankan ketika sebuah Class di Instansiasi/dibuat Objectnya

        class Komik
        {
            public $judul, $author, $sinopsis;

            // __construct merupakan bagian dari Magic METHod milik php. Ditandai dengan : __(unserscore 2x)
            public function __construct($judul = "Ahonok", $author = "Katana")
            {
                $this->judul = $judul;
                $this->author = $author;
            }

            public function getData()
            {
                return "$this->judul, $this->author";
            }
        }

        $komik = new Komik();
        var_dump($komik);

        $komik2 = new Komik('Magic & Trick', 'Katana2');
        var_dump($komik2);
        ?>

    </div>

</body>

</html>