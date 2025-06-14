<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $sifre = $_POST['sifre'];

    $sql = "SELECT * FROM Kullanicilar WHERE Email = ?";
    $params = array($email);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt && sqlsrv_has_rows($stmt)) {
        $user = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        if (password_verify($sifre, $user['Sifre'])) {
            echo "Giriş başarılı!";
            // Kullanıcı oturumu başlatabilirsiniz.
        } else {
            echo "Hatalı şifre!";
        }
    } else {
        echo "Böyle bir kullanıcı bulunamadı!";
    }
}
?>
