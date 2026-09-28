<?php
require_once 'inc/fonksiyonlar.php';
if (!isset($_SESSION['kullanici_id'])) {
    header('Location: login.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['avatar'])) {
    $dosya = $_FILES['avatar'];
    $hedef = 'uploads/' . uniqid() . '_' . basename($dosya['name']);
    if (!is_dir('uploads')) {
        mkdir('uploads', 0777, true);
    }
    if (move_uploaded_file($dosya['tmp_name'], $hedef)) {
        $db = db();
        $stmt = $db->prepare("UPDATE kullanicilar SET avatar = ? WHERE id = ?");
        $stmt->execute([$hedef, $_SESSION['kullanici_id']]);
        logYaz("Avatar yüklendi: " . $_SESSION['kullanici_id']);
    }
}
header('Location: profile.php');
exit;
?>
