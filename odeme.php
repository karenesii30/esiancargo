<?php
require_once 'inc/fonksiyonlar.php';
if (!isset($_SESSION['kullanici_id'])) {
    header('Location: giris.php');
    exit;
}
if (!csrfDogrula($_POST['csrf'] ?? '')) die('CSRF hatası.');
$kripto = $_POST['kripto'] ?? 'BTC';
$miktar = floatval($_POST['miktar'] ?? 0);
if ($miktar > 0) {
    yatirimEkle($_SESSION['kullanici_id'], $kripto, $miktar);
    logYaz("Yatırım: $kripto $miktar");
}
include 'inc/header.php';
?>
<div class="h-screen flex flex-col justify-center items-center px-4 relative overflow-hidden">
    <i class="fas fa-anchor absolute top-20 left-10 text-8xl opacity-5 turuncu"></i>
    <i class="fas fa-ship absolute bottom-20 right-10 text-8xl opacity-5 turuncu"></i>
    <div class="glass p-10 rounded-2xl text-center max-w-md w-full relative z-10" data-aos="zoom-in">
        <i class="fas fa-check-circle fa-5x turuncu mb-6"></i>
        <h2 class="text-3xl font-bold mb-4"><?php echo dil('yatirim_yap'); ?></h2>
        <p class="text-gray-300 mb-2"><?php echo dil('kripto_odeme'); ?>: <span class="turuncu"><?php echo htmlspecialchars($kripto); ?></span></p>
        <p class="text-gray-300 mb-6"><?php echo dil('kar'); ?>: <span class="turuncu"><?php echo htmlspecialchars($miktar); ?></span></p>
        <a href="panel.php" class="glass px-8 py-3 rounded-full hover:bg-orange-500 hover:text-black transition">
            <i class="fas fa-user"></i> <?php echo dil('panel'); ?>
        </a>
    </div>
</div>
<?php include 'inc/footer.php'; ?>
