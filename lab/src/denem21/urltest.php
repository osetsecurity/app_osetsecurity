<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>VirusTotal Arayüzü</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+z84Kg1f9G0nqXj7Pv2G+XQygj2e3Cq1tq+78QJ" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            padding-top: 70px; /* Navbar height */
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
        }

        .tab-content {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }

        .nav-link.active {
            background-color: #4CAF50;
            color: #fff;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .btn-primary {
            border-radius: 25px;
            background-color: #4CAF50;
            border: none;
            width: 100%;
            padding: 12px 20px;
            margin-top: 20px;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #45a049;
        }

        .scan-result {
            margin-top: 20px;
        }

        .scan-result h2 {
            color: #4CAF50;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .scan-result table {
            width: 100%;
            border-collapse: collapse;
        }

        .scan-result th,
        .scan-result td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .scan-result th {
            background-color: #f2f2f2;
        }

        .permalink {
            margin-top: 10px;
            text-align: center;
        }

        .permalink a {
            color: #4CAF50;
            text-decoration: none;
        }

        .navbar {
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .navbar-nav {
            margin-left: auto;
        }

        .nav-item {
            margin-right: 15px;
        }
        body {margin:0;}

.icon-bar {
  width: 100%;
  background-color: #555;
  overflow: auto;
}

.icon-bar a {
  float: left;
  width: 20%;
  text-align: center;
  padding: 12px 0;
  transition: all 0.3s ease;
  color: white;
  font-size: 36px;
}

.icon-bar a:hover {
  background-color: #000;
}

.active {
  background-color: #04AA6D;
}
    </style>
</head>
<body>

<div class="icon-bar">
<a class="active" href="../index.php"><i class="fa fa-home"></i></a>
<a href="#"><i class="fa fa-search"></i></a> 
  <a href="#"><i class="fa fa-envelope"></i></a> 
  <a href="#"><i class="fa fa-globe"></i></a>
  <a href="#"><i class="fa fa-trash"></i></a> 

</div>

</body>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#"></a>
            <h2>VirusTotal Arayüzü</h2>

        </div>
        
    </nav>

    <div class="container">
        <div id="url" class="tab-content">
            <h2 class="text-center mb-4">Güvenliğinizi Kontrol Edin</h2>
            <p class="lead text-center mb-4">Bir web sitesinin güvenliğini kontrol etmek için URL'yi girin ve tarama
                işlemine başlayın.</p>
            <form action="" method="post">
                <div class="mb-3">
                    <input type="text" name="url" id="url-input" class="form-control" placeholder="URL Girin">
                </div>
                <input type="submit" name="submit_url" value="URL'yi Tara" class="btn btn-primary">
            </form>
            <div class="scan-result">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_url"])) {
                    require_once('VirusTotalApiV2.php');
                    $api = new VirusTotalAPIV2('09365f9067abc3452983fb37f7f2c9399633b7e4784d6fe334397906ac00d552');
                    $url = $_POST["url"];
                    $result = $api->scanURL($url);
                    $scanId = $api->getScanID($result);
                    $report = $api->getURLReport($url);
                    displayResult($api, $report);
                }
                ?>
            </div>
        </div>
    </div>

    <?php
    function displayResult($api, $result)
    {
        echo "<h2 class='text-center mb-4'>Scan Result</h2>";
        echo "<table class='table'>";
        echo "<thead><tr><th>Antivirüs</th><th>Durum</th></tr></thead>";
        echo "<tbody>";
        foreach ($result->scans as $antivirus => $scan) {
            echo "<tr><td>$antivirus</td><td>$scan->result</td></tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "<div class='permalink'><a href='" . $api->getReportPermalink($result, true) . "'>Rapor Permalinki</a></div>";
    }
    ?>

    <script>
        // URL Tarama sekmesini aktif hale getir
        document.getElementById('url-tab').classList.add('active');
        document.getElementById('url').classList.add('show', 'active');
    </script>

</body>

</html>
