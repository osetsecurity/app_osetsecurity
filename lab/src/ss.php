<?php

// VirusTotal API anahtarınızı buraya girin
$apiKey = 'YOUR_VIRUSTOTAL_API_KEY';

// Taranacak dosyanın geçici yolunu al
$targetFile = $_FILES['fileToUpload']['tmp_name'];

// VirusTotal API'ye dosya taraması için istek yapma fonksiyonu
function scanFile($apiKey, $targetFile) {
    $url = 'https://www.virustotal.com/vtapi/v2/file/scan';
    $file = curl_file_create($targetFile);
    $postData = array('apikey' => $apiKey, 'file' => $file);
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    
    return $response;
}

// VirusTotal API'ye tarama sonucunu sorgulama fonksiyonu
function getScanResult($apiKey, $resource) {
    $url = 'https://www.virustotal.com/vtapi/v2/file/report';
    $postData = array('apikey' => $apiKey, 'resource' => $resource);
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    
    return $response;
}

// Dosya yüklenmiş mi kontrol et
if (isset($_FILES['fileToUpload'])) {
    // Dosyayı taratma işlemini başlat
    $scanResponse = json_decode(scanFile($apiKey, $targetFile), true);

    // Tarama sonucunu al
    if ($scanResponse && isset($scanResponse['resource'])) {
        $resource = $scanResponse['resource'];
        $scanResult = json_decode(getScanResult($apiKey, $resource), true);
        print_r($scanResult);
    } else {
        echo 'Dosya taraması başlatılamadı.';
    }
} else {
    echo 'Dosya yüklenemedi.';
}
?>
