<?php
require_once 'inc/fonksiyonlar.php';
$mesaj = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = db();
    $stmt = $db->prepare("INSERT INTO mesajlar (ad, email, mesaj) VALUES (?, ?, ?)");
    $stmt->execute([$_POST['ad'], $_POST['email'], $_POST['mesaj']]);
    $mesaj = 'Mesajınız alındı.';
}
include 'inc/header.php';
?>
<div class="h-screen flex flex-col justify-center items-center px-4 pt-20 relative overflow-hidden">
    <i class="fas fa-envelope absolute top-20 left-10 text-8xl opacity-5 turuncu"></i>
    <i class="fas fa-paper-plane absolute bottom-20 right-10 text-8xl opacity-5 turuncu"></i>
    <h2 class="text-4xl turuncu mb-8 relative z-10" data-aos="fade-down"><i class="fas fa-envelope"></i> <?php echo dil('iletisim'); ?></h2>
    <?php if ($mesaj): ?><p class="text-green-400 mb-4"><?php echo $mesaj; ?></p><?php endif; ?>
    <form method="POST" class="glass p-8 rounded-2xl w-full max-w-md relative z-10" data-aos="zoom-in">
        <input type="text" name="ad" placeholder="Ad" class="w-full p-3 rounded bg-gray-800 text-white mb-4" required>
        <input type="email" name="email" placeholder="E-posta" class="w-full p-3 rounded bg-gray-800 text-white mb-4" required>
        <textarea name="mesaj" placeholder="Mesaj" class="w-full p-3 rounded bg-gray-800 text-white mb-6" rows="4" required></textarea>
        <button type="submit" class="w-full turuncu-bg p-3 rounded-full hover:bg-orange-400 transition turuncu-border">
            <i class="fas fa-paper-plane"></i> <?php echo dil('iletisim'); ?>
        </button>
    </form>
</div>
<?php include 'inc/footer.php'; ?>
