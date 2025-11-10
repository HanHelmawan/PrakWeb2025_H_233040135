<?php
// 1. DEFINISI INTERFACE (KONTRAK)
// Gunakan keyword 'interface'
interface BisaDimakan {
    // --- ATURAN WAJIB ---
    // 2. METHOD didalam interface selalu 'public' dan TIDAK PUNYA ISI (abstrak)
    // Ini adalah 'KONTRAK' wajib: Setiap class yang mengimplementasi ini harus mengisi method ini
    public function makan();
}

// 3. CLASS PERTAMA: Menerapkan Kontrak
// Apel 'implements' (mengimplementasikan) kontrak BisaDimakan
class Apel implements BisaDimakan {
    // 4. Implementasi wajib
    // Jika method 'makan()' ini tidak ada, PHP akan error
    // Apel mengisi kontrak 'makan()' dengan logikanya sendiri
    public function makan() {
        return "Apel dimakan: Langsug kunyah";
    }
}

// 5. CLASS KEDUA: Menerapkan Kontrak yang sama
// Jeruk juga 'implements' kontrak yang sama
class Jeruk implements BisaDimakan {
    // 6. Implementasi wajib
    // Meskipun nama methodnya sama, logika di dalamnya bisa berbeda
    public function makan() {
        return "Jeruk dimakan: Kupas dulu, baru kunyah";
    }    
}

// 7. Cara Penggunaan 
$apel = new Apel();
$jeruk = new Jeruk();

echo $apel->makan(); // Output: Apel dimakan: Langsug kunyah
echo "<br>";
echo $jeruk->makan(); // Output: Jeruk dimakan: Kupas dulu, baru kunyah



?>