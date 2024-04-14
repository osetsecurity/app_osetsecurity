
?>
<?php
require_once 'VirusTotalAPIV2.php';

// API anahtarınızı buraya girin
$apiKey = '09365f9067abc3452983fb37f7f2c9399633b7e4784d6fe334397906ac00d552';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];

    $virusTotal = new VirusTotalAPIV2($apiKey);
    $result = $virusTotal->scanFile($file['tmp_name']);

    header('Content-Type: application/json');
    echo json_encode($result);
}
?>
