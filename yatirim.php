<?php
require_once 'inc/fonksiyonlar.php';
if (!isset($_SESSION['kullanici_id'])) {
    header('Location: giris.php');
    exit;
}
include 'inc/header.php';
?>
<div class="h-screen flex flex-col justify-center items-center px-4 pt-20 relative overflow-hidden">
    <i class="fas fa-ship absolute top-20 left-10 text-8xl opacity-5 turuncu"></i>
    <i class="fas fa-anchor absolute bottom-20 right-10 text-8xl opacity-5 turuncu"></i>
    <h2 class="text-4xl turuncu mb-8 relative z-10" data-aos="fade-down"><i class="fas fa-coins"></i> <?php echo dil('yatirim_yap'); ?></h2>
    <form method="POST" action="odeme.php" class="glass p-8 rounded-2xl w-full max-w-md relative z-10" data-aos="zoom-in">
        <input type="hidden" name="csrf" value="<?php echo csrfToken(); ?>">
        <label class="block mb-2 text-gray-300"><?php echo dil('kripto_odeme'); ?></label>
        <select name="kripto" class="w-full p-3 rounded bg-gray-800 text-white mb-4">
            <option value="BTC">Bitcoin (BTC)</option>
            <option value="ETH">Ethereum (ETH)</option>
            <option value="USDT">Tether (USDT)</option>
        </select>
        <label class="block mb-2 text-gray-300"><?php echo dil('kar'); ?></label>
        <input type="number" name="miktar" step="0.0001" placeholder="0.00" class="w-full p-3 rounded bg-gray-800 text-white mb-6" required>
        <button type="submit" class="w-full turuncu-bg p-3 rounded-full hover:bg-orange-400 transition turuncu-border">
            <i class="fas fa-ship"></i> <?php echo dil('yatirim_yap'); ?>
        </button>
    </form>
</div>
<?php include 'inc/footer.php'; ?>
