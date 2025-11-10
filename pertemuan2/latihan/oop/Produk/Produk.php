<?php
// --- PARENT CLASS (CLASS INDUK) ---
// Class ini berisi semua property dan method umum
// yang akan dimiliki oleh semua produk

class Produk {

    // INI MATERI: SETTER & GETTER
    // Ubah seluruh visibility property menjadi "private"
    // private hanya bisa diakses pada class dimana dia didefinisikan (Produk)

    // Property umum untuk semua produk
    private $judul,
           $penulis,
           $penerbit,
           $harga;

    // Constructor milik parent
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    // Membuat method setter untuk melakukan perubahan pada property protected/private
    public function setJudul($judulBaru) {
        $this->judul = $judulBaru;
    }   

    // Kita sudah menggunakan Getter sebelumnya
    // getJudul adalah contoh Getter
    public function getJudul() {    
        return $this->judul;
    }

    // getHarga adalah contoh Getter
    public function getHarga() {
        return $this->harga;
    }
    
    // Method milik parent
    public function getLabel() {
        return "$this->penulis, $this->penerbit";
    }

    // METHOD YANG AKAN KITA OVERRIDE
    // Ini adalah method 'getInfoProduk' versi parent (umum)
    public function getInfoProduk() {
        return "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
    }    
}


?>