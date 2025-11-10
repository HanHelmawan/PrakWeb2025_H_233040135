<?php
// --- CHILD CLASS (CLASS ANAK) ---
// Kita buat class 'Komik' yang mewarisi
// semua property dan method dari class 'Produk'

class Komik extends Produk {

    // Property khusus untuk Komik
    public $jmlHalaman;

    // Kita buat constructor untuk child class
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0) {
        // 'parent::' digunakan untuk memanggil
        // constructor milik parent class (produk)
        // Agar property umum dari parent (judul, penulis, dll)
        parent::__construct($judul, $penulis, $penerbit, $harga);

        // Set property khusus Komik
        $this->jmlHalaman = $jmlHalaman;
    }


    // ---- INTI MATERI OVERRIDING ---
    // Method ini 'menimpa' method getInfoProduk() milik parent
    public function getInfoProduk() {
        
        // 1. Kita tetap panggil method ASLI milik parent
        $infoParent = parent::getInfoProduk();

        // 2. Kita tambahkan informasi khusus Komik
        return "Komik : {$infoParent} - {$this->jmlHalaman} Halaman.";
    }

    
}


?>