<?php
require_once 'inc/fonksiyonlar.php';
if (!isset($_SESSION['kullanici_id'])) {
    header('Location: giris.php');
    exit;
}
$yatirimlar = kullaniciYatirimlari($_SESSION['kullanici_id']);
include 'inc/header.php';
?>
<div class="h-screen flex flex-col justify-center items-center px-4 pt-20 relative overflow-hidden">
    <i class="fas fa-ship absolute top-20 right-10 text-8xl opacity-5 turuncu"></i>
    <i class="fas fa-anchor absolute bottom-20 left-10 text-8xl opacity-5 turuncu"></i>
    <h2 class="text-4xl turuncu mb-8 relative z-10" data-aos="fade-down"><i class="fas fa-user"></i> <?php echo dil('panel'); ?></h2>
    <div class="glass p-8 rounded-2xl w-full max-w-2xl relative z-10" data-aos="zoom-in">
        <p class="text-gray-300 mb-4"><?php echo dil('anasayfa'); ?>, <span class="turuncu"><?php echo htmlspecialchars($_SESSION['kullanici_ad'] ?? 'Kullanıcı'); ?></span></p>
        <table class="w-full text-left">
            <thead>
                <tr class="border-b border-gray-700">
                    <th class="py-3"><?php echo dil('yatirim'); ?></th>
                    <th class="py-3"><?php echo dil('kar'); ?></th>
                    <th class="py-3"><?php echo dil('vade'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($yatirimlar)): ?>
                <tr><td colspan="3" class="py-3 text-gray-500"><?php echo dil('yatirim'); ?> yok.</td></tr>
                <?php else: foreach ($yatirimlar as $y): ?>
                <tr class="border-b border-gray-800">
                    <td class="py-3"><?php echo htmlspecialchars($y['kripto']); ?></td>
                    <td class="py-3"><?php echo htmlspecialchars($y['miktar']); ?></td>
                    <td class="py-3 text-gray-400"><?php echo htmlspecialchars($y['tarih']); ?></td>
                </tr>
                <?php endforeach; endif; ?>
            </tbody>
        </table>
        <a href="yatirim.php" class="inline-block mt-6 glass px-6 py-2 rounded-full hover:bg-orange-500 hover:text-black transition">
            <i class="fas fa-plus"></i> <?php echo dil('yatirim_yap'); ?>
        </a>
    </div>
</div>
<?php include 'inc/footer.php'; ?>
