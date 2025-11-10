<?php
// --- MEMBUAT CONSTANT menggunakan define ---
// Define memerlukan 2 parameter
// Parameter: nama variable dan nilai nya
// Ketika membuat constant, nama variable nya KAPITAL

define("NAMA", "Raihan Helmawan");

// --- Membuat Constant menggunakan 'const' ---
// Sama seperti define nama variable KAPITAL
const NRP = "233040135";

// Untuk mengaksesnya sama seperti akses variable biasa
echo NAMA;
echo "<br>";
echo NRP;

class CobaConstant {
    // define ('COBA', 'BEBAS'); //ERROR  
    const JURUSAN  = "Teknik Informatika";
}

// Cara mengakses constant sama seperti static
echo CobaConstant::JURUSAN;

?>