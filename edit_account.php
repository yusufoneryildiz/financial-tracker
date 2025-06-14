<?php
include 'config.php'; // Veritabanı bağlantısı

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hesapID = $_POST['hesap_id'];
    $kullaniciID = $_POST['kullanici_id'];
    $hesapAdi = $_POST['hesap_adi'];
    $bakiye = $_POST['bakiye'];
    $tur = $_POST['tur'];

    $sql = "UPDATE Hesaplar SET HesapAdi = ?, Bakiye = ?, Tur = ? WHERE HesapID = ? AND KullaniciID = ?";
    $params = array($hesapAdi, $bakiye, $tur, $hesapID, $kullaniciID);

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo "Hesap başarıyla güncellendi!";
    } else {
        echo "Hata: ";
        print_r(sqlsrv_errors());
    }
}
?>
