<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/img/app/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/img/app/favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="/css/style.css">
    <title>Abstract Class</title>
</head>

<body>

    <?php include '../sidebar.php' ?>

    <div class="main">

        <h1>Abstract Class</h1>
        <hr>

        <?php
        // Abstract Class tidak bisa di instansiasi
        // Yang bisa di instansiasi adalah turunannya
        // Mendefinisikan interface untuk kelas turunannya
        // Berperan sebagai kerangka dasar untuk kelas turunannya
        // Mininal memiliki 1 method abstrak (utk kerangka)
        // Digunakan dalam Pewarisan untuk "Memaksakan" implementasi method abstrak yang sana utk semua kelas turunannya (dengan nama method yang sama)

        // Semua Kelas turunannya harus mengimplementasikan method abstract (method template) yang ada di Parentnya
        // Kelas Abstrak boleh memiliki Property/Method reguler
        // Kelas Abstrak boleh juga memiliki Property/Method Static

        // WHY!?
        // 1. Merepresentasikan ide dan konsep dasar yg diimplementasikan di kelas turunannya
        // 2. Composition over Inheritance
        // 3. Salah satu cara implementasi Polimorphism
        // 4. Sentralisasi logic
        // 5. Mempermudah pengerjaan tim (Membuat base Class)

        abstract class Produk
        {
            private $judul, $penerbit, $harga;
            protected $diskon = 0;

            public function __construct($judul = "judul", $penerbit = "penerbit", $harga = "harga")
            {
                $this->judul = $judul;
                $this->penerbit = $penerbit;
                $this->harga = $harga;
            }

            public function setJudul($judul)
            {
                if (!is_string($judul)) {
                    throw new Exception("Judul Harus String");
                }
                $this->judul = $judul;
            }

            abstract public function getLabel();

            public function getInfo()
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
                return $this->getInfo() . " - $this->halaman halaman";
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
                return $this->getInfo() . " - $this->jam jam";
            }

            public function setDiskon($diskon)
            {
                $this->diskon = $diskon;
            }
        }

        class CetakInfoProduk
        {
            public $daftarProduk = [];

            public function tambahProduk(Produk $produk)
            {
                $this->daftarProduk[] = $produk;
            }

            public function cetak()
            {
                $str = "DAFTAR PRODUK : <br>";

                foreach ($this->daftarProduk as $p) {
                    $str .= "- {$p->getLabel()}<br>";
                }

                return $str;
            }
        }

        $produk = new Komik("Ahonok", "NAAAC", 30000, 20);
        $produk2 = new Game("Skyrim", "Bethesda", 250000, 35);

        $cetakProduk = new CetakInfoProduk();
        $cetakProduk->tambahProduk($produk);
        $cetakProduk->tambahProduk($produk2);

        echo $cetakProduk->cetak();


        ?>

    </div>

</body>

</html>