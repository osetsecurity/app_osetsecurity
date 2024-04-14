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
    /**
     * Display scan results in a more human-readable format.
     *
     * @param object $result The scan result object.
     * @return void
     */
    public function displayScanResult($result) {
        if (!isset($result->response_code) || $result->response_code != 1) {
            echo "Invalid scan result.";
            return;
        }

        echo "Scan Date: {$result->scan_date}<br>";
        echo "Scan ID: {$result->scan_id}<br>";
        echo "Resource: {$result->resource}<br>";
        echo "Positives: {$result->positives}<br>";

        echo "<strong>Scans:</strong><br>";
        foreach ($result->scans as $scanner => $scanResult) {
            echo "{$scanner}: ";
            if ($scanResult->detected) {
                echo "Detected as: {$scanResult->result}<br>";
            } else {
                echo "No threat detected<br>";
            }
        }
    }


    ?>
