?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    

    <link rel="stylesheet" href="style.css">
    <title>Dark Web Report</title>
    
    <style>
        #result {
            color: red;
        }

        #result.exists {
            color: green;
        }
        body {
    margin: 0;
    padding: 0;
    position: relative;
  }
  .welcome-container {
    text-align: right; /* Yazıyı sağa hizalar */
  }
  .logout-btn {
    display: inline-block; /* Çıkış butonunu yazının yanında tutar */
    vertical-align: top; /* Çıkış butonunu yazının üstüne hizalar */
  }
  .logout-btn {
    background: none;
    border: none;
    cursor: pointer;
    font-size: 32px; /* Icon boyutunu 32 piksel olarak ayarladık */
    color: #333;
    margin-left: 10px;
  }
  .streamline--link-chain-solid {
            display: inline-block;
            width: 1em;
            height: 1em;
            background-repeat: no-repeat;
            background-size: 100% 100%;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 14 14'%3E%3Cpath fill='black' fill-rule='evenodd' d='m7.671 2.743l-.964.964a1 1 0 0 1-1.414-1.414l.964-.965a4.536 4.536 0 0 1 6.415 6.415l-.965.964a1 1 0 1 1-1.414-1.414l.964-.965a2.536 2.536 0 0 0-3.585-3.585Zm-3.964 2.55a1 1 0 0 1 0 1.414l-.964.965a2.536 2.536 0 0 0 3.585 3.585l.965-.964a1 1 0 0 1 1.414 1.414l-.964.964a4.536 4.536 0 0 1-6.415-6.414l.965-.964a1 1 0 0 1 1.414 0m5.5.914a1 1 0 0 0-1.414-1.414l-3 3a1 1 0 0 0 1.414 1.414z' clip-rule='evenodd'/%3E%3C/svg%3E");
        }
        .bx--image {
  display: inline-block;
  width: 40px;
  height: 24px;
  background-repeat: no-repeat;
  background-size: 100% 100%;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Ccircle cx='7.499' cy='9.5' r='1.5' fill='black'/%3E%3Cpath fill='black' d='m10.499 14l-1.5-2l-3 4h12l-4.5-6z'/%3E%3Cpath fill='black' d='M19.999 4h-16c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2m-16 14V6h16l.002 12z'/%3E%3C/svg%3E");
}
.streamline--link-chain-solid {
            display: inline-block;
            width: 1em;
            height: 1em;
            background-repeat: no-repeat;
            background-size: 95% 85%;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 14 14'%3E%3Cpath fill='black' fill-rule='evenodd' d='m7.671 2.743l-.964.964a1 1 0 0 1-1.414-1.414l.964-.965a4.536 4.536 0 0 1 6.415 6.415l-.965.964a1 1 0 1 1-1.414-1.414l.964-.965a2.536 2.536 0 0 0-3.585-3.585Zm-3.964 2.55a1 1 0 0 1 0 1.414l-.964.965a2.536 2.536 0 0 0 3.585 3.585l.965-.964a1 1 0 0 1 1.414 1.414l-.964.964a4.536 4.536 0 0 1-6.415-6.414l.965-.964a1 1 0 0 1 1.414 0m5.5.914a1 1 0 0 0-1.414-1.414l-3 3a1 1 0 0 0 1.414 1.414z' clip-rule='evenodd'/%3E%3C/svg%3E");
        }
        
    </style>
    


  

<body>
<div class="sidebar">
        <a href="#" class="logo">
            <i class='bx bx-bullseye'></i>
            <div class="logo-name"><span>OssINT</span>Mixer</div>
        </a>
        <ul class="side-menu">
        <li><a href="index.php"><i class='bx bx-home'></i>Home</a></li>
            <li><a href="http://localhost:5000/"><i class='bx bx-shield-quarter'></i>Dark Web Report</a></li>
            <li><a href="iptest.php"><i class='bx bx-map'></i>Ip - Location</a></li>
            <li><a href="domaincheck.php"><i class='bx bx-globe'></i>Domain</a></li>
            <li><a href="subdomain.php"><i class='bx bx-file-find'></i>Subdomain </a></li>
            <li><a href="reverse_ip.php"><i class='bx bx-layer'></i>Reverse IP</a></li>
            <li><a href="metadata.php"><span class="bx--image"></span>Metadata</a></li>
            <li><a href="denem21/urltest.php"><span class=" bx streamline--link-chain-solid"></span>URL TEST</a></li>
            <li><a href="ss/index.php"><i class='bx bx-user'></i>Username</a></li>
            <li><a href="main.html"><i class='mdi--forgot-password'></i>Password Checker</a></li>
            <li><a href="upload.php"><i class='mdi--file-find-outline'></i>File Searching </a></li>
       
        </ul>
      
    </div>
    <div class="content">
        <!-- Navbar -->
        <nav>
            <i class='bx bx-menu'></i>
            <input type="checkbox" id="theme-toggle" hidden>
            <label for="theme-toggle" class="theme-toggle"></label>
        </nav>
        <!-- End of Navbar -->
    <div>   

        
        
     
    </div>
    <!-- End of Sidebar -->

    <!-- Main Content -->
    <div class="content">
        <main>
            <div class="header">
                <div class="left">
                    <h1>Dark Web Report</h1>
                    <p></p>
                </div>
            </div>

            <form id="darkWebReportForm" action="" method="POST">
                <input type="text" name="target" id="targetInput" placeholder="Hedef kullanıcı adı, e-posta veya IP adresi">
                <button type="submit">Raporu Getir</button>
            </form>
            
            <div id="reportContent" class="report-content">
                <?php
                // Veritabanı bağlantısını içe aktar
                include 'connect.php';

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Formdan gelen hedef bilgisini alın
                    $target = $_POST['target'];
                    
                    // E-posta kontrolü
                    $email_query = "SELECT * FROM databasex WHERE email='$target'";
                    $email_result = mysqli_query($conn, $email_query);
                    
                    // Eğer e-posta bulunduysa
                    if ($email_result && mysqli_num_rows($email_result) > 0) {
                        $row = mysqli_fetch_assoc($email_result);
                        echo "<div id='result' class='exists'>Dark Web raporu için e-posta: " . $target . " mevcut! Eklenme Tarihi: " . $row['eklenme_tarihi'] . "</div>";
                    } else {
                        // Şifre kontrolü
                        $password_query = "SELECT * FROM databasex WHERE sifre='$target'";
                        $password_result = mysqli_query($conn, $password_query);
                        
                        // Eğer şifre bulunduysa
                        if ($password_result && mysqli_num_rows($password_result) > 0) {
                            $row = mysqli_fetch_assoc($password_result);
                            echo "<div id='result' class='exists'>Dark Web raporu için şifre: " . $target . " mevcut! Eklenme Tarihi: " . $row['eklenme_tarihi'] . "</div>";
                        } else {
                            // Kullanıcı adı kontrolü
                            $username_query = "SELECT * FROM databasex WHERE kullanici_adi='$target'";
                            $username_result = mysqli_query($conn, $username_query);
                            
                            // Eğer kullanıcı adı bulunduysa
                            if ($username_result && mysqli_num_rows($username_result) > 0) {
                                $row = mysqli_fetch_assoc($username_result);
                                echo "<div id='result' class='exists'>Dark Web raporu için kullanıcı adı: " . $target . " mevcut! Eklenme Tarihi: " . $row['eklenme_tarihi'] . "</div>";
                            } else {
                                // Hiçbir sonuç bulunamadı
                                echo "<div id='result'>Dark Web raporu için hedef: " . $target . " mevcut değil!</div>";
                            }
                        }
                    }

                    // Veritabanı bağlantısını kapat
                    mysqli_close($conn);
                }
                ?>
            </div>
        </main>
    </div>
    <!-- End of Main Content -->


    

    <script src="script.js"></script>
</body>

</html>
