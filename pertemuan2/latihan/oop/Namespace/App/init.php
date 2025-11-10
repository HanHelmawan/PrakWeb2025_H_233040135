<?php

// Bisa menggunakan Require
// require_once 'Produk/Animal.php';
// require_once 'Produk/Cat.php';

// Autoloader untuk class di folder produk
spl_autoload_register(function ($class) {
    // $class akan berisi string "App\Produk\NamaClass"
    $class = explode('\\', $class);
    $class = end($class);
    require_once __DIR__ . '/Produk/' . $class . '.php';
});

// Autoloader untuk class di folder service
spl_autoload_register(function ($class) {
    // $class akan berisi string "App\Service\NamaClass"
    $class = explode('\\', $class);
    $class = end($class);
    require_once __DIR__ . '/Service/' . $class . '.php';
});

?>