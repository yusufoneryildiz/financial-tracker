<?php
include 'config.php'; // Veritabanı bağlantısı

// Hesap ID ve Kullanıcı ID'yi al
$hesapID = $_GET['hesap_id'];
$kullaniciID = $_GET['kullanici_id'];

// Hesabı silmek için SQL sorgusu
$sql = "DELETE FROM Hesaplar WHERE HesapID = ? AND KullaniciID = ?";
$params = array($hesapID, $kullaniciID);

$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt) {
    echo "Hesap başarıyla silindi.";
    echo "<br><a href='list_accounts.php?kullanici_id=$kullaniciID'>Hesaplara Geri Dön</a>";
} else {
    echo "Hata: ";
    print_r(sqlsrv_errors());
}
?>
