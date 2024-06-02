<?php
// Cek apakah form telah di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai yang dikirimkan melalui form
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $username = $_POST['username']; // Tambahkan baris ini untuk mengambil nilai username
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validasi password harus sama dengan konfirmasi password
    if ($password !== $confirm_password) {
        // Redirect kembali ke halaman register dengan pesan error
        header("Location: register.php?error=password_not_match");
        exit();
    }

    // Hash password sebelum disimpan
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Lakukan penyimpanan data ke database (contoh menggunakan mysqli)
    $koneksi = new mysqli("localhost", "root", "", "db_perpustakaan");

    // Periksa koneksi
    if ($koneksi->connect_error) {
        die("Koneksi ke database gagal: " . $koneksi->connect_error);
    }

    // Query untuk menyimpan data pengguna baru
    $sql = "INSERT INTO tb_user (nim, nama, username, password) VALUES ('$nim', '$nama', '$username', '$hashed_password')"; // Tambahkan 'username' ke dalam VALUES

    if ($koneksi->query($sql) === TRUE) {
        // Jika penyimpanan berhasil, redirect ke halaman login
        header("Location: login.php");
        exit();
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }

    $koneksi->close();
}
?>
