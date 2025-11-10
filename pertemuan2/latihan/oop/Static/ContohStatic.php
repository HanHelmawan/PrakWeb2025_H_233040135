<?php
// Buat sebuah class untuk membuat property dan method static

class ContohStatic {

    // Cara penulisan untuk property
    // Visibility + static + variable
    public static $angka = 1;

    // Cara penulisan untuk method
    // Visibility + static + function + nama function
    // return 'Hallo' . $this->angka; // Tidak bisa menggunakan $this pada static method
    public static function hallo() {
        return "Hallo" . self::$angka;
    }
}

// Mengakses property static
// Perhatikan: Kita tidak perlu 'new ContohStatic()'
// Kita panggil langsung Class nya
echo ContohStatic::$angka; 

// Menjalankan static method
echo ContohStatic::hallo();

?>