<?php
require_once 'inc/fonksiyonlar.php';
if (!isset($_SESSION['kullanici_id'])) {
    header('Location: login.php');
    exit;
}
$db = db();
$stmt = $db->prepare("SELECT * FROM kullanicilar WHERE id = ?");
$stmt->execute([$_SESSION['kullanici_id']]);
$kullanici = $stmt->fetch(PDO::FETCH_ASSOC);
include 'inc/header.php';
?>
<div class="min-h-screen flex flex-col justify-center items-center px-4 pt-20 relative overflow-hidden">
    <i class="fas fa-user-circle absolute top-20 left-10 text-8xl opacity-5 turuncu"></i>
    <i class="fas fa-cog absolute bottom-20 right-10 text-8xl opacity-5 turuncu"></i>
    <h2 class="text-4xl turuncu mb-8 relative z-10" data-aos="fade-down"><i class="fas fa-user"></i> <?php echo dil('profile'); ?></h2>
    <div class="glass p-8 rounded-2xl w-full max-w-md relative z-10" data-aos="zoom-in">
        <div class="flex flex-col items-center mb-6">
            <div class="w-32 h-32 rounded-full bg-gray-700 flex items-center justify-center overflow-hidden mb-4">
                <?php if (!empty($kullanici['avatar'])): ?>
                    <img src="<?php echo htmlspecialchars($kullanici['avatar']); ?>" class="w-full h-full object-cover">
                <?php else: ?>
                    <i class="fas fa-user text-6xl turuncu"></i>
                <?php endif; ?>
            </div>
            <form method="POST" action="upload_avatar.php" enctype="multipart/form-data" class="flex flex-col items-center">
                <input type="file" name="avatar" accept="image/*" class="text-sm text-gray-400 mb-2">
                <button type="submit" class="turuncu-bg px-4 py-2 rounded-full text-sm hover:bg-orange-400 transition">
                    <i class="fas fa-upload"></i> <?php echo dil('upload_avatar'); ?>
                </button>
            </form>
        </div>
        <p class="text-gray-300 mb-2"><?php echo dil('name'); ?>: <span class="turuncu"><?php echo htmlspecialchars($kullanici['ad']); ?></span></p>
        <p class="text-gray-300 mb-2"><?php echo dil('email'); ?>: <span class="turuncu"><?php echo htmlspecialchars($kullanici['email']); ?></span></p>
        <p class="text-gray-300 mb-6"><?php echo dil('role'); ?>: <span class="turuncu"><?php echo htmlspecialchars($kullanici['rol'] ?? 'user'); ?></span></p>
        <a href="settings.php" class="inline-block glass px-6 py-2 rounded-full hover:bg-orange-500 hover:text-black transition w-full text-center">
            <i class="fas fa-cog"></i> <?php echo dil('settings'); ?>
        </a>
    </div>
</div>
<?php include 'inc/footer.php'; ?>
