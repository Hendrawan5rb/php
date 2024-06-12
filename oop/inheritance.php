<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/img/app/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/img/app/favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="/css/style.css">
    <title>Inheritance</title>
</head>

<body>

    <?php include '../sidebar.php' ?>

    <div class="main">

        <h1>Inheritance</h1>
        <hr>

        <?php
        class Produk
        {
            public $judul, $penerbit, $harga;

            public function __construct($judul, $penerbit, $harga)
            {
                $this->judul = $judul;
                $this->penerbit = $penerbit;
                $this->harga = $harga;
            }

            public function getLabel()
            {
                return "$this->judul, $this->penerbit (Rp. " . number_format($this->harga) . ")";
            }
        }

        // :: berarti Method Static
        class Komik extends Produk
        {
            public $halaman;

            public function __construct($judul = "judul", $penerbit = "penerbit", $harga = 0, $halaman = 0)
            {
                parent::__construct($judul, $penerbit, $harga);

                $this->halaman = $halaman;
            }

            public function getLabel()
            {
                return parent::getLabel() . " - $this->halaman halaman";
            }
        }

        class Game extends Produk
        {
            public $jam;

            public function __construct($judul = "judul", $penerbit = "penerbit", $harga = 0, $halaman = 0)
            {
                parent::__construct($judul, $penerbit, $harga);

                $this->jam = $halaman;
            }

            public function getLabel()
            {
                return parent::getLabel() . " - $this->jam jam";
            }
        }

        $komik = new Komik("Ahonok", "NAAAC", 30000, 20);
        echo $komik->getLabel() . "<br>";

        $komik = new Game("Skyrim", "Bethesda", 250000, 35);
        echo $komik->getLabel();
        ?>

    </div>

</body>

</html>