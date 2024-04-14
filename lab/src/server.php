<?php
// SQLite veritabanı bağlantısı
$db = new SQLite3('database.db');

// POST isteğinden kullanıcı adını al
$username = $_POST['username'];

// Kullanıcı adını veritabanında kontrol et
$stmt = $db->prepare('SELECT COUNT(*) as count FROM Kullanicilar WHERE kullaniciAdi = :username');
$stmt->bindValue(':username', $username, SQLITE3_TEXT);
$result = $stmt->execute();
$row = $result->fetchArray(SQLITE3_ASSOC);

// Sonucu JSON formatında döndür
header('Content-Type: application/json');
echo json_encode(array('exists' => $row['count'] > 0, 'message' => $row['count'] > 0 ? 'Username already exists.' : 'Username is available.'));
?>
