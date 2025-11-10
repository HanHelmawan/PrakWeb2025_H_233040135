<?php

// Definisi class rumah
class Rumah {

    // --- BAGIAN PROPERTY ---
    // Ini adalah data / keadaaan yang akan dimiliki
    // 'public' adalah 'visibility'

    // 1. Prpoperty kita siapkan (kosongkan nilainya)
    public $warna;
    public $jumlahKamar;
    public $alamat;

    // --- BAGIAN CONSTRUCTOR ---
    // Method ini akan otomatis dijalankan
    // Setiap kali 'new Rumah()' dibuat
    public function __construct($warnaAwal, $kamarAwal, $alamatAwal) {
        // 'this' artinya object ini sendiri
        // Set propserty 'warna' milik object ini
        // Sesuai data '$warnaAwal' yang dikirim saat pembuatan object
        $this->warna = $warnaAwal;
        $this->jumlahKamar = $kamarAwal;
        $this->alamat = $alamatAwal;

    }

    // --- BAGIAN METHOD ---
    // Ini adalah perilaku atau aksi
    // 'public' adalah 'visibility'

    public function kunciPintu() {
        return "Pintu di $this->alamat sudah dikunci!";
    }
}

// --- INTI MATERI OBJECT TYPE ---

    // Kita membuat fungsi terpisah
    // Perhatikan 'Rumah $dataRumah' di parameter
    // Ini adalah 'Type Hinting' atau 'Object Type'
    // Fungsi ini SEKARANG HANYA MAU menerima parameter
    // yang merupakan object dari class 'Rumah' saja
    function pasangListrik(Rumah $dataRumah) {
        return "Listrik sedang di pasang di rumah " . $dataRumah->warna .
        "yang beralamat di" . $dataRumah->alamat;
    }

// --- BAGIAN OBJECT (CARA PAKAI BARU)---
// 2. Sekarang, saat membuat object, kita
// WAJIB menyertakan nilainya di dalam kurung
// Nilai ini akan dikirim ke method __construct

$rumahSaya = new Rumah("Biru", 5, "Jln. Merdeka No. 10");
$rumahTetangga = new Rumah("Kuning", 2, "Jln. Sudirman No. 20");

// --- BUKTI ---
// Property sudah terisi otomatis saat object dibuat
// tanpa perlu set manual lagi
echo "Warna rumah saya: " . $rumahSaya->warna; // Output: Biru
echo "<br>";
echo "Jumlah kamar rumah saya: " . $rumahSaya->jumlahKamar; // Output: 5
echo "<br>";
echo "Alamat rumah tetangga: " . $rumahTetangga->alamat; // Output: Jln. Sudirman No. 20
echo "<br>";
echo $rumahTetangga->kunciPintu(); // Output: Pintu di Jln. Sudirman No. 20 sudah dikunci!
echo "<br>";
// Memanggil fungsi dengan object sebagai parameter
echo pasangListrik($rumahSaya); // Output: Listrik sedang di pasang di rumah Biru yang beralamat di Jln. Merdeka No. 10

// --- CONTOH ERROR ---
// 3. Coba panggil fungsi dengan data string (SALAH)
$teksBiasa = "Ini cuma String";

// Baris di bawah ini akan menimbulkan ERROR
// echo pasangListrik($teksBiasa); // ERROR:
// PHP akan error karena $teksBiasa bukan object dari class Rumah

?>