<?php
// File: index.php
require_once './controllers/controllerMahasiswa.php';

// Inisialisasi controller dan jalankan aplikasi
$controller = new controllerMahasiswa();
$controller->handleRequest();
?>