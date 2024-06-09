<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/img/app/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/img/app/favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="/css/style.css">
    <title>Property and MeTHOD</title>
</head>

<body>

    <?php include '../sidebar.php' ?>

    <div class="main">

        <h1>Property and MeTHOD</h1>
        <hr>

        <?php
        // Property/Member Variable == Variabel dalam Object
        // Property merepresentasikan data/keadaan dari sebuah Object
        // Property memiliki visibility yaitu public, private, dan protected

        // MeTHOD == Function dalam Object
        // MeTHOD merepresentasikan perilaku dari sebuah Object
        // MeTHOD juga memiliki visibility seperti Property
        // Jika visibility-nya tidak ditulis maka default nya adalah public

        // Misal studi kasusnya adalah mobil,
        // Maka Property dari mobil adalah : nama, merk, warna, kecepatanMaksimal, dan juga jumlahPenumpang
        // Dan MeTHOD dari mobil adalah : tambahKecepatan, kurangiKecepatan, gantiTransmisi, belokKiri, belokKanan

        class Mobil
        {
            public $nama;
            public $merk;
            public $warna;
            public $kecepatanMaksimal;
            public $jumlahPenumpang;

            public function belokKanan()
            {
            }

            public function belokKiri()
            {
            }
        }

        // Dynamic property is deprecated
        #[\AllowDynamicProperties]
        class Komik
        {
            public $judul = "Ahonok", $author = "Katana", $sinopsis;

            public function getData()
            {
                // $this-> untuk refer Property dari Object yang sedang di akses. Kalo engga bakal error, karena scope variabel dari function cuma untuk function itu saja.
                return "$this->judul, $this->author";
            }
        }

        $komik = new Komik();
        var_dump($komik);

        $komik2 = new Komik();
        $komik2->judul = "Together";
        $komik2->author = "Naaac";
        $komik2->premis = "Lorem, ipsum dolor sit amet consectetur adipisicing elit.";
        var_dump($komik2);

        echo $komik2->judul . "<br><br>";
        echo $komik->getData() . "<br>";
        echo $komik2->getData();
        ?>

    </div>

</body>

</html>