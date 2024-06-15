<?php
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
