<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/img/app/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/img/app/favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="/css/style.css">
    <title>Visibility</title>
</head>

<body>

    <?php include '../sidebar.php' ?>

    <div class="main">

        <h1>Visibility</h1>
        <hr>

        <?php
        // Visibility / Access Modifier
        // Public =  Bisa di akses di mana saja, bahkan di luar kelas
        // Protected = Hanya bisa diakses dalam kelas dan turunannya
        // Private = Hanya dapat digunakan dalam kelas tertentu saja

        // WHY!?
        // 1. Hanya memperlihatkan aspek dari class yang dibutuhkan oleh 'client' atau misal saat kolaborasi
        // 2. Menentukan kebutuhan yang jelas untuk objek
        // 3. Memberikan kendali pada kode untuk menghindari bug

        class Produk
        {
            public $judul, $penerbit;
            protected $diskon = 0;
            private $harga;

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

        // Misal harga bisa di ubah kalo public
        // $produk2->harga = 5000;
        // $produk2->diskon = 90;
        // echo $produk2->harga;

        $produk2->setDiskon(50);
        echo $produk2->getHarga();
        ?>

    </div>

</body>

</html>