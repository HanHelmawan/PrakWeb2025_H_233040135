<?php

// Memanggil init untuk menjalankan autoload
require_once 'App/init.php';

// Instance sebuah class
$cat = new Cat();
echo $cat->run(); // Menjalankan method di dalamnya

?>