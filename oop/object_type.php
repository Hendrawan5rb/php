<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/img/app/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/img/app/favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="/css/style.css">
    <title>Object Type</title>
</head>

<body>

    <?php include '../sidebar.php' ?>

    <div class="main">

        <h1>Object Type</h1>
        <hr>

        <?php
        class Komik
        {
            public $judul, $author, $sinopsis;

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

        class CetakInfo
        {

            // Objek sebagai tipe data
            public function cetak(Komik $k)
            {
                $str = "$k->sinopsis | {$k->getData()}";
                return $str;
            }
        }

        $komik = new Komik();
        $komik->sinopsis = "Lorem ipsum dolor sit amet consectetur adipisicing elit.";

        $komik2 = new Komik('Magic & Trick', 'Katana2');

        $infoKomik = new CetakInfo();
        echo $infoKomik->cetak($komik) . "<br><br>";
        echo $infoKomik->cetak($komik2);
        ?>

    </div>

</body>

</html>