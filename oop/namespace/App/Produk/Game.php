<?php

namespace App\Produk;

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
