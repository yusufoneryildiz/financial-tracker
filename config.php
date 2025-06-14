<?php
$serverName = "localhost"; // SQL Server adı veya IP adresi
$connectionOptions = array(
    "Database" => "FinansalHesapTakip", // Veritabanı adı
    "Uid" => "sa", // SQL Server kullanıcı adı
    "PWD" => "sifre123" // SQL Server şifresi
);

// Bağlantıyı başlat
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}
?>

