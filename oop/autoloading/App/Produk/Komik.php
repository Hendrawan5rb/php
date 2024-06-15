<?php
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
