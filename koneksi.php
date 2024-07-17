<?php
$host = "localhost"; // Sesuaikan dengan konfigurasi Anda
$user = "root"; // Sesuaikan dengan konfigurasi Anda
$password = ""; // Sesuaikan dengan konfigurasi Anda
$database = "db_perpustakaan"; // Sesuaikan dengan nama database Anda

$koneksi = new mysqli($host, $user, $password, $database);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
