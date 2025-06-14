<?php
include 'config.php'; // Veritabanı bağlantısı

// Kullanıcı ID'yi al
$kullaniciID = $_GET['kullanici_id'];

// Hesapları listelemek için SQL sorgusu
$sql = "SELECT * FROM Hesaplar WHERE KullaniciID = ?";
$params = array($kullaniciID);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Hesapları listele
echo "<h2>Hesaplar</h2>";
echo "<table border='1'>
        <tr>
            <th>Hesap ID</th>
            <th>Hesap Adı</th>
            <th>Bakiye</th>
            <th>Hesap Türü</th>
            <th>İşlemler</th>
        </tr>";
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    echo "<tr>
            <td>" . $row['HesapID'] . "</td>
            <td>" . $row['HesapAdi'] . "</td>
            <td>" . $row['Bakiye'] . "</td>
            <td>" . $row['Tur'] . "</td>
            <td>
                <a href='edit_account.php?hesap_id=" . $row['HesapID'] . "&kullanici_id=" . $row['KullaniciID'] . "'>Düzenle</a> |
                <a href='delete_account.php?hesap_id=" . $row['HesapID'] . "&kullanici_id=" . $row['KullaniciID'] . "'>Sil</a>
            </td>
        </tr>";
}
echo "</table>";
?>
