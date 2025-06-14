<?php
include 'config.php'; // Veritabanı bağlantısı

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kullaniciID = $_POST['kullanici_id'];
    $hesapAdi = $_POST['hesap_adi'];
    $bakiye = $_POST['bakiye'];
    $tur = $_POST['tur'];

    $sql = "INSERT INTO Hesaplar (KullaniciID, HesapAdi, Bakiye, Tur) VALUES (?, ?, ?, ?)";
    $params = array($kullaniciID, $hesapAdi, $bakiye, $tur);

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo "Hesap başarıyla eklendi!<br><a href='index.php'>Ana Sayfaya Dön</a>";
    } else {
        echo "Hata: ";
        print_r(sqlsrv_errors());
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hesap Ekle</title>
    <style>
        body { font-family: Arial, sans-serif; }
        form { width: 300px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; }
        label { display: block; margin: 10px 0 5px; }
        input[type="text"], input[type="number"], input[type="submit"] { width: 100%; padding: 8px; margin-bottom: 10px; }
    </style>
</head>
<body>

    <h2>Hesap Ekle</h2>
    <form action="add_account.php" method="POST">
        <label for="kullanici_id">Kullanıcı ID:</label>
        <input type="number" id="kullanici_id" name="kullanici_id" required><br>

        <label for="hesap_adi">Hesap Adı:</label>
        <input type="text" id="hesap_adi" name="hesap_adi" required><br>

        <label for="bakiye">Başlangıç Bakiyesi:</label>
        <input type="number" id="bakiye" name="bakiye" step="0.01" required><br>

        <label for="tur">Hesap Türü:</label>
        <input type="text" id="tur" name="tur" required><br>

        <input type="submit" value="Hesap Ekle">
    </form>

</body>
</html>
