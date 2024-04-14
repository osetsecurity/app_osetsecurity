<?php
require_once('VirusTotalApiV2.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // API anahtarınızı buraya yerleştirin veya güvenli bir şekilde saklayın
    $apiKey = '09365f9067abc3452983fb37f7f2c9399633b7e4784d6fe334397906ac00d552';
    $api = new VirusTotalAPIV2($apiKey);

    if (isset($_POST["submit_file"])) {
        if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
            $filePath = $_FILES['file']['tmp_name'];
            $result = $api->scanFile($filePath);
            if (isset($result->response_code) && $result->response_code === 1) {
                $scanId = $api->getScanID($result);
                $report = $api->getFileReport($scanId);
                displayResult($api, $report);
            } else {
                echo "Dosya tarama işlemi başarısız oldu.";
            }
        } else {
            echo "Dosya yükleme hatası: " . $_FILES['file']['error'];
        }
    } elseif (isset($_POST["submit_url"])) {
        $url = $_POST["url"];
        $result = $api->scanURL($url);
        if (isset($result->response_code) && $result->response_code === 1) {
            $scanId = $api->getScanID($result);
            $report = $api->getURLReport($scanId);
            displayResult($api, $report);
        } else {
            echo "URL tarama işlemi başarısız oldu.";
        }
    }
}

function displayResult($api, $result) {
    echo "<h2>Scan Result</h2>";
    echo "<pre>";
    print_r($result);
    echo "</pre>";
    echo "<p>Report Permalink: " . $api->getReportPermalink($result, true) . "</p>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>VirusTotal API Test</title>
</head>
<body>
    <h1>VirusTotal API Test</h1>
    <form method="post" enctype="multipart/form-data">
        <h2>Scan a File</h2>
        <input type="file" name="file" required>
        <button type="submit" name="submit_file">Scan File</button>
    </form>
    <br>
    <form method="post">
        <h2>Scan a URL</h2>
        <input type="text" name="url" placeholder="Enter URL" required>
        <button type="submit" name="submit_url">Scan URL</button>
    </form>
</body>
</html>
