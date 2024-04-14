<?php
$servername = "mysql_db";
$username = "root"; // Veritabanı kullanıcı adı
$password = "root"; // Veritabanı şifre
$dbname = "data"; // Veritabanı adı

// Veritabanı bağlantısını oluşturun
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Bağlantıyı kontrol edin
if (!$conn) {
    die("Veritabanı bağlantısı başarısız: " . mysqli_connect_error());
}
?>
