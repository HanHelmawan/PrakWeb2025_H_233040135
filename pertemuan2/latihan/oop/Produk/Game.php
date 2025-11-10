<?php
// --- CHILD CLASS KEDUA ---

class Game extends Produk {

    // Property khusus untuk Game
    public $waktuMain;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $waktuMain = 0) {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        // Set property khusus Game
        $this->waktuMain = $waktuMain;
    }

    // Cara mengakses harga dari child class
    public function getHarga() {
        return $this->harga;
    }

    // --- INTI MATERI OVERRIDING ---
    // Method ini 'menimpa' method getInfoProduk() milik parent
    public function getInfoProduk() {
        $infoParent = parent::getInfoProduk();
        return "Game : {$infoParent} ~ {$this->waktuMain} Jam.";
    }
}

// -- BAGIAN OBJECT ---
// Kita buat object dari CHILD CLASS, bukan dari parent
$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 50);

// Menjalankan method 
echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
echo "<hr/>";

// Hasil: 
// Komik: Masashi Kishimoto, Shonen Jump | Rp. 30000 - 100 Halaman.
// Game: Neil Druckmann, Sony Computer | Rp. 250000 ~ 50 Jam

// Sudah tidak bisa mengakses dan mengubah harga karena sudah di protect
// $produk1->harga = 12000;
// echo $produk1->getHarga(); 

// Cara memanggil harga yang benar menggunakan method dari child class
echo $produk2->getHarga();


// ini Setter
// Property private yang awalnya "Naruto" diubah menjadi "Goku"
$produk1->setJudul("Goku");
echo $produk1->getInfoProduk(); // Output: Goku | Masashi Kishimoto, Shonen Jump (Rp. 30000) - 100 Halaman.

// Ini Getter
echo $produk1->getJudul(); // Output: Goku

?>