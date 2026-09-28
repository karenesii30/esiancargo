<?php
require_once 'inc/fonksiyonlar.php';
$db = db();
$kontrol = $db->prepare("SELECT id FROM kullanicilar WHERE email = ?");
$kontrol->execute(['admin@esiancargo.com']);
if (!$kontrol->fetch()) {
    $stmt = $db->prepare("INSERT INTO kullanicilar (ad, email, sifre, rol) VALUES (?, ?, ?, ?)");
    $stmt->execute(['Admin', 'admin@esiancargo.com', password_hash('admin123', PASSWORD_DEFAULT), 'admin']);
    echo "Admin kullanıcısı eklendi.";
} else {
    echo "Admin kullanıcısı zaten var.";
}
?>
