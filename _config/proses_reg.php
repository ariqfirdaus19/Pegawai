<?php

require_once "config.php";

if (isset($_GET['register'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);

    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validasi apakah username sudah ada
    $cek_user = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
    
    if (mysqli_num_rows($cek_user) > 0) {
        echo "
            <script>
                alert('Username sudah digunakan');
                window.location='" . base_url('register') . "';
            </script>
        ";
        exit;
    }


    // Validasi password
    if ($password !== $confirm_password) {
        echo "
            <script>
                alert('Password tidak sama');
                window.location='" . base_url('register') . "';
            </script>
        ";
        exit;
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user ke dalam database
    $insert_user = mysqli_query($koneksi, "INSERT INTO user (username, password) VALUES ('$username', '$hashed_password')");
    
    if ($insert_user) {
        echo "
            <script>
                alert('Registrasi Berhasil, silakan login');
                window.location='" . base_url('login') . "';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Registrasi Gagal, silakan coba lagi');
                window.location='" . base_url('register') . "';
            </script>
        ";
    }
}
?>
