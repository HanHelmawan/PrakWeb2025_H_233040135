<?php
// --- KENAPA INI ABSTRACT CLASS? ---
// Konsep umum: Class Animal (Hewan) adalah konsep yang terlau umum
// Kita tidak mungkin membuat object 'new Hewan()'. Kita selalu membuat 'new Kucing()', 'new Anjing()', dll

// 1. Definisi Abstract Class
abstract class Animal {
    public $name = 'Kucing';

    // --- INTI ABSTRACT METHOD ---
    // 2. Abstract Method
    // Method ini HANYA deklarasi, tidak punya isi ({})
    // Ini adalah 'KONTRAK' atau 'ATURAN WAJIB' untuk semua Child Class (turunan)
    // Child Class dipaksa untuk 'override' dan mengisi method ini
    public abstract function run();
}

// 3. Child Class
// Class Cat adalah class yang mewarisi (extends) Animal
class Cat extends Animal {
    // 4. Implementasi wajib
    // Jika method 'run' ini tidak ada, PHP akan error
    // Karena Cat 'berjanji' untuk mengisi kontrak 'run()' dari parent Abstract nya
    public function run() {
        // Di sini kita definisikan perilaku 'run' yang spesifik untuk Cat
        return  "$this->name itu berlari!";
    }
}

// 5. Cara penggunaan
// Kita hanya bisa membuat object dari class turunannya (Cat)
$cat = new Cat();

// Panggil method yang sudah diisi oleh class Cat
echo $cat->run(); // Output: Kucing itu berlari!

?>