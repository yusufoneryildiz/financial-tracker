<?php
include 'config.php'; // Veritabanı bağlantısı

// Kullanıcıdan hesap ID'sini al
$hesapID = $_GET['hesap_id']; 

// Gelir ve giderleri listelemek için SQL sorgusu
$sql = "SELECT * FROM Islemler WHERE HesapID = ? ORDER BY Tarih DESC";
$params = array($hesapID);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

// İşlemleri listele
echo "<h2>Gelir ve Gider İşlemleri</h2>";
echo "<table border='1'>
        <tr>
            <th>İşlem ID</th>
            <th>Tutar</th>
            <th>Kategori</th>
            <th>Tür</th>
            <th>Tarih</th>
            <th>Açıklama</th>
            <th>İşlemler</th>
        </tr>";

while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    echo "<tr>
            <td>" . $row['IslemID'] . "</td>
            <td>" . $row['Tutar'] . "</td>
            <td>" . $row['Kategori'] . "</td>
            <td>" . $row['Tur'] . "</td>
            <td>" . $row['Tarih']->format('Y-m-d') . "</td>
            <td>" . $row['Aciklama'] . "</td>
            <td>
                <a href='edit_transaction.php?islem_id=" . $row['IslemID'] . "&hesap_id=" . $row['HesapID'] . "'>Düzenle</a> |
                <a href='delete_transaction.php?islem_id=" . $row['IslemID'] . "&hesap_id=" . $row['HesapID'] . "'>Sil</a>
            </td>
        </tr>";
}
echo "</table>";
?>
