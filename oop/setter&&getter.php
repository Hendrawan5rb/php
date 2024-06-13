<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/img/app/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/img/app/favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="/css/style.css">
    <title>Setter and Getter</title>
</head>

<body>

    <?php include '../sidebar.php' ?>

    <div class="main">

        <h1>Setter and Getter</h1>
        <hr>

        <?php
        // Setter & Getter / Accessor Method
        // Setter dan Getter juga bisa menggunakan Magic Method __set() dan __get()

        class Produk
        {
            private $judul, $penerbit, $harga;
            protected $diskon = 0;

            public function __construct($judul = "judul", $penerbit = "penerbit", $harga = "harga")
            {
                $this->judul = $judul;
                $this->penerbit = $penerbit;
                $this->harga = $harga;
            }

            // Setter
            public function setJudul($judul)
            {
                if (!is_string($judul)) {
                    throw new Exception("Judul Harus String");
                }
                $this->judul = $judul;
            }

            // Getter
            public function getLabel()
            {
                return "$this->judul, $this->penerbit (Rp. " . number_format($this->harga) . ")";
            }

            public function getJudul()
            {
                return $this->judul;
            }

            public function getHarga()
            {
                return $this->harga - ($this->harga * ($this->diskon / 100));
            }
        }

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

            public function setDiskon($diskon)
            {
                $this->diskon = $diskon;
            }
        }

        $produk = new Komik("Ahonok", "NAAAC", 30000, 20);
        echo $produk->getLabel() . "<br>";

        $produk2 = new Game("Skyrim", "Bethesda", 250000, 35);
        echo $produk2->getLabel();

        echo "<br><br>";

        // echo $produk1->judul;

        $produk3 = new Produk("Tes");

        // $produk3->judul = "Tes2";

        $produk3->setJudul("50");
        echo $produk3->getJudul();
        ?>

    </div>

</body>

</html>