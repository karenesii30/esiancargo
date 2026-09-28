<?php
require_once 'inc/fonksiyonlar.php';
if (!isset($_SESSION['kullanici_id'])) {
    header('Location: login.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = db();
    $stmt = $db->prepare("INSERT INTO tickets (kullanici_id, konu, mesaj, durum) VALUES (?, ?, ?, 'beklemede')");
    $stmt->execute([$_SESSION['kullanici_id'], $_POST['konu'], $_POST['mesaj']]);
    logYaz("Ticket oluşturuldu: " . $_SESSION['kullanici_id']);
    header('Location: dashboard.php');
    exit;
}
?>
