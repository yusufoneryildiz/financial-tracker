<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ad = $_POST['ad'];
    $email = $_POST['email'];
    $sifre = password_hash($_POST['sifre'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO Kullanicilar (Ad, Email, Sifre) VALUES (?, ?, ?)";
    $params = array($ad, $email, $sifre);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo "Kayıt başarılı!";
    } else {
        echo "Hata: ";
        print_r(sqlsrv_errors());
    }
}
?>
