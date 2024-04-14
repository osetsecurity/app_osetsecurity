<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="favicon.png">
    <title>Subdomain Finder</title>
    <style>
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
            text-align: right;
            /* Yazıyı sağa hizalar */
        }

        .logout-btn {
            display: inline-block;
            /* Çıkış butonunu yazının yanında tutar */
            vertical-align: top;
            /* Çıkış butonunu yazının üstüne hizalar */
        }

        .logout-btn {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 32px;
            /* Icon boyutunu 32 piksel olarak ayarladık */
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
       .mdi--forgot-password {   <!-- Tek satırlı yorum, bu içerik tarayıcıda görüntülenmez. -->




display: inline-block;
width: 24px;
height: 24px;
background-repeat: no-repeat;
background-size: 100% 100%;
background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='black' d='M12 1a5 5 0 0 0-5 5v2H6a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V10a2 2 0 0 0-2-2h-1V6a5 5 0 0 0-5-5m0 1.9c1.71 0 3.1 1.39 3.1 3.1v2H8.9V6c0-1.71 1.39-3.1 3.1-3.1m.19 7.6c.94 0 1.69.21 2.23.62c.54.42.81.98.81 1.68c0 .44-.15.83-.44 1.2c-.29.36-.67.64-1.13.85c-.26.15-.43.3-.52.47c-.09.18-.14.4-.14.68h-2c0-.5.1-.84.29-1.08c.21-.24.55-.52 1.07-.84c.26-.14.47-.32.64-.54c.14-.21.22-.46.22-.74c0-.3-.09-.52-.27-.69c-.18-.18-.45-.26-.76-.26c-.27 0-.49.07-.69.21c-.16.14-.26.35-.26.63H9.27c-.05-.69.23-1.29.78-1.65c.54-.36 1.25-.54 2.14-.54M11 17h2v2h-2z'/%3E%3C/svg%3E");
background-position: 5.5px 0;
margin-right: 9.5px; /* İkon ile metin arasında boşluk bırakmak için */
margin-right: 9px; /* İstediğiniz ölçüde boşluk bırakabilirsiniz */



       
}
.mdi--file-find-outline {   /*file searching  css */
  display: inline-block;
  width: 24px;
  height: 24px;
  --svg: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='%23000' d='M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8zM6 4h7l5 5v8.58l-1.84-1.84a4.97 4.97 0 0 0-.66-6.28A4.921 4.921 0 0 0 12 8c-1.28 0-2.55.5-3.53 1.46c-1.97 1.95-1.97 5.11 0 7.04c.97 1 2.25 1.47 3.53 1.47c.96 0 1.92-.28 2.75-.83L17.6 20H6zm8.11 11.1c-.56.56-1.31.9-2.11.9c-.8 0-1.55-.33-2.11-.9C9.33 14.54 9 13.79 9 13c0-.81.32-1.56.89-2.12c.56-.57 1.31-.88 2.11-.88c.8 0 1.55.31 2.11.88c.56.56.89 1.31.89 2.12c0 .79-.32 1.54-.89 2.1'/%3E%3C/svg%3E");
  background-color: currentColor;
  -webkit-mask-image: var(--svg);
  mask-image: var(--svg);
  -webkit-mask-repeat: no-repeat;
  mask-repeat: no-repeat;
  -webkit-mask-size: 100% 100%;
  mask-size: 100% 100%;
    /* Sağa kaydırma */
    position: relative;
  left: 4px; /* İstediğiniz ölçüde ayarlayabilirsiniz */
  margin-right: 5px; /* İstediğiniz ölçüde boşluk bırakabilirsiniz */

  
}
    </style>
    </style>
</head>

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
    <!-- End of Sidebar -->

    <!-- Main Content -->
    <div class="content">
        <main>
            <div class="header">
                <div class="left">
                    <h1>Subdomain Finder</h1>
                    <p>Enter a domain name to find its subdomains:</p>
                </div>
            </div>

            <form id="domainForm">
                <input type="text" id="domainInput" placeholder="Domain name">
                <button type="submit">Search</button>
            </form>

            <div id="result" class="result-container"></div>
        </main>

    </div>

    <script src="script.js"></script>

    <script>
   const form = document.getElementById('domainForm');
const resultDiv = document.getElementById('result');

form.addEventListener('submit', async function (event) {
    event.preventDefault();

    const domainInput = document.getElementById('domainInput').value;
    const apiKey = 'at_LBtOIAeU3lERWfSYge1qjxVRcLMBF';
    const apiUrl = `https://subdomains.whoisxmlapi.com/api/v1?apiKey=${apiKey}&domainName=${domainInput}`;

    try {
        const response = await fetch(apiUrl);
        const data = await response.json();

        console.log('API response:', data); // Log the API response to console for debugging

        // Clear previous results
        resultDiv.innerHTML = '';

        // Check if result property exists in the response
        if (data.result && data.result.count > 0) {
            // Display the result
            data.result.records.forEach((record, index) => {
                const resultItem = document.createElement('div');
                resultItem.classList.add('result-item');
                resultItem.innerHTML = `<p>${record.domain}</p>`;
                resultDiv.appendChild(resultItem);
            });
        } else {
            resultDiv.innerHTML = '<p>No subdomains found.</p>';
        }
    } catch (error) {
        console.error('Error fetching data:', error);
        resultDiv.innerHTML = '<p>An error occurred while fetching data. Please try again later.</p>';
    }
});

    </script>
</body>

</html>
