<?php
header("Access-Control-Allow-Origin: *"); // Mengizinkan akses dari domain lain
header("Content-Type: text/plain");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Login berhasil!";
    } else {
        echo "Username atau password salah!";
    }
}

$conn->close();
?>
