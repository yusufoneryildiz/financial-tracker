<?php
include 'config.php'; // Veritabanı bağlantısı

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hesapID = $_POST['hesap_id'];
    $tutar = $_POST['tutar'];
    $kategori = $_POST['kategori'];
    $tur = $_POST['tur']; // Gelir veya Gider
    $aciklama = $_POST['aciklama'];
    $tarih = $_POST['tarih']; // İsteğe bağlı, aksi takdirde default alır

    $sql = "INSERT INTO Islemler (HesapID, Tutar, Kategori, Tur, Tarih, Aciklama)
            VALUES (?, ?, ?, ?, ?, ?)";
    $params = array($hesapID, $tutar, $kategori, $tur, $tarih, $aciklama);

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo "İşlem başarıyla eklendi!<br><a href='index.php'>Ana Sayfaya Dön</a>";
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
    <title>Gelir/Gider Ekle</title>
    <style>
        body { font-family: Arial, sans-serif; }
        form { width: 300px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; }
        label { display: block; margin: 10px 0 5px; }
        input[type="text"], input[type="number"], input[type="date"], input[type="submit"] { width: 100%; padding: 8px; margin-bottom: 10px; }
    </style>
</head>
<body>

    <h2>Gelir/Gider Ekle</h2>
    <form action="add_transaction.php" method="POST">
        <label for="hesap_id">Hesap ID:</label>
        <input type="number" id="hesap_id" name="hesap_id" required><br>

        <label for="tutar">Tutar:</label>
        <input type="number" id="tutar" name="tutar" step="0.01" required><br>

        <label for="kategori">Kategori:</label>
        <input type="text" id="kategori" name="kategori"><br>

        <label for="tur">Tür:</label>
        <select id="tur" name="tur" required>
            <option value="Gelir">Gelir</option>
            <option value="Gider">Gider</option>
        </select><br>

        <label for="tarih">Tarih:</label>
        <input type="date" id="tarih" name="tarih"><br>

        <label for="aciklama">Açıklama:</label>
        <input type="text" id="aciklama" name="aciklama"><br>

        <input type="submit" value="İşlem Ekle">
    </form>

</body>
</html>
