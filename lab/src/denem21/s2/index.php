<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VirusTotal Dosya Taraması</title>
</head>
<body>
    <h1>VirusTotal Dosya Taraması</h1>
    <form action="scan.php" method="post" enctype="multipart/form-data">
        <label for="file">Dosya Seçin:</label>
        <input type="file" name="file" id="file">
        <button type="submit">Dosyayı Taramaya Başla</button>
    </form>
</body>
</html>
