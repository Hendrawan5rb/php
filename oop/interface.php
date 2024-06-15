<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/img/app/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/img/app/favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="/css/style.css">
    <title>Interface</title>
</head>

<body>

    <?php include '../sidebar.php' ?>

    <div class="main">

        <h1>Interface</h1>
        <hr>

        <?php
        /*
        1. Interface adalah Kelas Abstrak yang sama sekali tidak memiliki implementasi
        2. Murni merukapan template untuk kelas turunannya
        3. Tidak boleh memiliki Property, hanya deklarasi Method saja
        4. Semua Method harus dideklarasikan dengan Visibility public
        5. Boleh mendeklarasikan __construct()
        6.  Satu kelas (Child) boleh mengimplementasikan banyak interface dipisahkan dengan koma
        5.Dengan menggunakan type-hinting (menggunakan Objek sebagai Tipe Data) dapat melakukan Dependency Injection
        6. Pada akhirnya akan mencapai Polymorphism
        */

        interface InfoProduk
        {
            public function getLabel();
        }

        abstract class Produk
        {
            protected $diskon = 0, $judul, $penerbit, $harga;

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

            abstract public function getInfo();

            public function getJudul()
            {
                return $this->judul;
            }

            public function getHarga()
            {
                return $this->harga - ($this->harga * ($this->diskon / 100));
            }
        }

        class Komik extends Produk implements InfoProduk
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

            public function getInfo()
            {
                return "$this->judul, $this->penerbit (Rp. " . number_format($this->harga) . ")";
            }
        }

        class Game extends Produk implements InfoProduk
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

            public function getInfo()
            {
                return "$this->judul, $this->penerbit (Rp. " . number_format($this->harga) . ")";
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