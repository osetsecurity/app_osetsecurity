<?php

// VirusTotal API anahtarınızı buraya girin
$apiKey = '09365f9067abc3452983fb37f7f2c9399633b7e4784d6fe334397906ac00d552';

// Dosya yükleme işlemi
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];

    // Dosyayı geçici bir konuma taşı
    $tmpFilePath = $file['tmp_name'];

    // Dosyanın boyutunu kontrol et
    if (filesize($tmpFilePath) > 32000000) { // Maksimum dosya boyutu: 32 MB (VirusTotal kısıtlaması)
        die("Hata: Dosya boyutu 32MB'den büyük olamaz.");
    }

    // Curl ile VirusTotal API'ye dosyayı gönder
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.virustotal.com/vtapi/v2/file/scan');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, [
        'apikey' => $apiKey,
        'file' => new CURLFile($tmpFilePath)
    ]);
    $response = curl_exec($ch);
    curl_close($ch);

    // Gönderilen dosya hakkında bilgi al
    $jsonResponse = json_decode($response, true);

    if (isset($jsonResponse['scan_id'])) {
        // Tarama kimliği alındı, sonuçları sorgula
        $scanId = $jsonResponse['scan_id'];
        $url = "https://www.virustotal.com/vtapi/v2/file/report?apikey={$apiKey}&resource={$scanId}";

        // Virustotal API'den sonuçları al
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $reportResponse = curl_exec($ch);
        curl_close($ch);

        $report = json_decode($reportResponse, true);

        // Sonuçları ekrana yazdır
        echo "<pre>";
        print_r($report);
        echo "</pre>";
    } else {
        // Tarama kimliği alınamadı
        echo "Tarama isteği gönderilirken bir hata oluştu.";
    }
} else {
    // Eğer dosya yüklenmemişse, ana sayfaya yönlendir
    header("Location: index.php");
}
// Gönderilen dosya hakkında bilgi al
$jsonResponse = json_decode($response, true);

if (isset($jsonResponse['scan_id'])) {
    // Tarama kimliği alındı, sonuçları sorgula
    $scanId = $jsonResponse['scan_id'];
    $url = "https://www.virustotal.com/vtapi/v2/file/report?apikey={$apiKey}&resource={$scanId}";

    // Virustotal API'den sonuçları al
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $reportResponse = curl_exec($ch);
    curl_close($ch);

    $report = json_decode($reportResponse, true);

    // Sonuçları kontrol et
    if ($report['response_code'] == 1) {
        // Dosya taraması tamamlandı, sonuçları ekrana yazdır
        echo "<pre>";
        print_r($report);
        echo "</pre>";
    } else {
        // Dosya hala kuyrukta bekliyor
        echo "Dosya hala kuyrukta bekliyor. Lütfen bir süre sonra tekrar kontrol edin.";
    }
} else {
    // Tarama kimliği alınamadı
    echo "Tarama isteği gönderilirken bir hata oluştu.";
}

