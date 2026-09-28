<?php
require_once 'inc/fonksiyonlar.php';
$hata = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrfDogrula($_POST['csrf'] ?? '')) die('CSRF hatası.');
    if (!rateLimit($_SERVER['REMOTE_ADDR'])) die('Çok fazla deneme. Bekle.');
    $email = trim($_POST['email'] ?? '');
    $sifre = $_POST['sifre'] ?? '';
    if ($email === 'admin@esiancargo.com' && $sifre === 'admin123') {
        $_SESSION['admin'] = true;
        logYaz("Admin girişi: $email");
        header('Location: admin.php');
        exit;
    }
    $kullanici = kullaniciBul($email);
    if ($kullanici && password_verify($sifre, $kullanici['sifre'])) {
        $_SESSION['kullanici_id'] = $kullanici['id'];
        $_SESSION['kullanici_ad'] = $kullanici['ad'];
        logYaz("Kullanıcı girişi: $email");
        header('Location: panel.php');
        exit;
    } else {
        $hata = 'E-posta veya şifre yanlış.';
    }
}
include 'inc/header.php';
?>
<div class="h-screen flex flex-col justify-center items-center px-4 relative overflow-hidden">
    <i class="fas fa-anchor absolute top-10 right-10 text-6xl opacity-5 turuncu"></i>
    <i class="fas fa-ship absolute bottom-10 left-10 text-6xl opacity-5 turuncu"></i>
    <h2 class="text-4xl turuncu mb-8 relative z-10" data-aos="fade-down"><i class="fas fa-sign-in-alt"></i> <?php echo dil('giris'); ?></h2>
    <?php if ($hata): ?><p class="text-red-400 mb-4 relative z-10"><?php echo $hata; ?></p><?php endif; ?>
    <form method="POST" class="glass p-8 rounded-2xl w-full max-w-md relative z-10" data-aos="zoom-in">
        <input type="hidden" name="csrf" value="<?php echo csrfToken(); ?>">
        <input type="email" name="email" placeholder="E-posta" class="w-full p-3 rounded bg-gray-800 text-white mb-4" required>
        <input type="password" name="sifre" placeholder="Şifre" class="w-full p-3 rounded bg-gray-800 text-white mb-6" required>
        <button type="submit" class="w-full turuncu-bg p-3 rounded-full hover:bg-orange-400 transition turuncu-border">
            <i class="fas fa-sign-in-alt"></i> <?php echo dil('giris'); ?>
        </button>
        <p class="text-gray-400 text-sm mt-4 text-center"><?php echo dil('kayit'); ?>? <a href="kayit.php" class="turuncu"><?php echo dil('kayit'); ?></a></p>
    </form>
</div>
<?php include 'inc/footer.php'; ?>
