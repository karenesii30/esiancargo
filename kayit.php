<?php
require_once 'inc/fonksiyonlar.php';
$hata = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrfDogrula($_POST['csrf'] ?? '')) die('CSRF hatası.');
    $ad = trim($_POST['ad'] ?? '');
    $soyad = trim($_POST['soyad'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $telefon = trim($_POST['telefon'] ?? '');
    $sifre = $_POST['sifre'] ?? '';
    $sifre_tekrar = $_POST['sifre_tekrar'] ?? '';
    $dogum = $_POST['dogum'] ?? '';
    $ulke = $_POST['ulke'] ?? '';
    $onay = isset($_POST['onay']) ? true : false;
    if ($ad && $soyad && $email && $telefon && $sifre && $sifre_tekrar && $dogum && $ulke && $onay) {
        if ($sifre !== $sifre_tekrar) {
            $hata = 'Şifreler eşleşmiyor.';
        } elseif (kullaniciVarMi($email)) {
            $hata = 'Bu e-posta zaten kayıtlı.';
        } else {
            kullaniciEkle($ad . ' ' . $soyad, $email, $sifre);
            logYaz("Yeni kayıt: $email");
            header('Location: login.php');
            exit;
        }
    } else {
        $hata = 'Tüm alanları doldur ve onay ver.';
    }
}
include 'inc/header.php';
?>
<section class="min-h-screen flex flex-col justify-center items-center px-4 pt-20 relative overflow-hidden">
    <i class="fas fa-user-plus absolute top-20 left-10 text-8xl opacity-5 turuncu"></i>
    <i class="fas fa-ship absolute bottom-20 right-10 text-8xl opacity-5 turuncu"></i>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl w-full relative z-10">
        <div class="glass p-8 rounded-2xl" data-aos="fade-right">
            <h2 class="text-3xl turuncu mb-2"><i class="fas fa-user-plus"></i> <?php echo dil('kayit'); ?></h2>
            <p class="text-gray-400 text-sm mb-6"><?php echo dil('kayit_desc'); ?></p>
            <?php if ($hata): ?><p class="text-red-400 mb-4"><?php echo $hata; ?></p><?php endif; ?>
            <div class="flex space-x-3 mb-6">
                <a href="#" class="glass px-4 py-2 rounded-full text-sm hover:bg-orange-500 hover:text-black transition flex-1 text-center"><i class="fab fa-google"></i> Google</a>
                <a href="#" class="glass px-4 py-2 rounded-full text-sm hover:bg-orange-500 hover:text-black transition flex-1 text-center"><i class="fab fa-apple"></i> Apple</a>
            </div>
            <div class="flex items-center mb-6">
                <div class="flex-1 h-px bg-gray-600"></div>
                <span class="px-3 text-gray-500 text-sm"><?php echo dil('veya'); ?></span>
                <div class="flex-1 h-px bg-gray-600"></div>
            </div>
            <form method="POST">
                <input type="hidden" name="csrf" value="<?php echo csrfToken(); ?>">
                <div class="grid grid-cols-2 gap-3 mb-3">
                    <div>
                        <label class="block text-gray-300 text-xs mb-1"><?php echo dil('name'); ?></label>
                        <input type="text" name="ad" placeholder="John" class="w-full p-3 rounded bg-gray-800 text-white" required>
                    </div>
                    <div>
                        <label class="block text-gray-300 text-xs mb-1"><?php echo dil('soyad'); ?></label>
                        <input type="text" name="soyad" placeholder="Doe" class="w-full p-3 rounded bg-gray-800 text-white" required>
                    </div>
                </div>
                <label class="block text-gray-300 text-xs mb-1"><?php echo dil('email'); ?></label>
                <input type="email" name="email" placeholder="john@example.com" class="w-full p-3 rounded bg-gray-800 text-white mb-3" required>
                <label class="block text-gray-300 text-xs mb-1"><?php echo dil('telefon'); ?></label>
                <input type="tel" name="telefon" placeholder="+90 5xx xxx xx xx" class="w-full p-3 rounded bg-gray-800 text-white mb-3" required>
                <label class="block text-gray-300 text-xs mb-1"><?php echo dil('dogum_tarihi'); ?></label>
                <input type="date" name="dogum" class="w-full p-3 rounded bg-gray-800 text-white mb-3" required>
                <label class="block text-gray-300 text-xs mb-1"><?php echo dil('ulke'); ?></label>
                <select name="ulke" class="w-full p-3 rounded bg-gray-800 text-white mb-3" required>
    <option value=""><?php echo dil('ulke_sec'); ?></option>
                <?php foreach (tumUlkeler() as $kod => $isim): ?>
                    <option value="<?php echo $kod; ?>"><?php echo $isim; ?></option>
                <?php endforeach; ?>
</select>
                <label class="block text-gray-300 text-xs mb-1"><?php echo dil('password'); ?></label>
                <input type="password" name="sifre" placeholder="********" class="w-full p-3 rounded bg-gray-800 text-white mb-3" required>
                <label class="block text-gray-300 text-xs mb-1"><?php echo dil('sifre_tekrar'); ?></label>
                <input type="password" name="sifre_tekrar" placeholder="********" class="w-full p-3 rounded bg-gray-800 text-white mb-4" required>
                <label class="flex items-start mb-4">
                    <input type="checkbox" name="onay" class="mt-1 mr-2" required>
                    <span class="text-gray-400 text-xs">Kullanım Şartları ve Gizlilik Politikasını okudum, kabul ediyorum. <a href="#" onclick="termsAc()" class="turuncu">Kullanım Şartları</a> | <a href="#" onclick="privacyAc()" class="turuncu">Gizlilik Politikası</a></span>
                </label>
                <button type="submit" class="w-full turuncu-bg p-3 rounded-full hover:bg-orange-400 transition turuncu-border">
                    <i class="fas fa-user-plus"></i> <?php echo dil('kayit'); ?>
                </button>
                <p class="text-gray-400 text-sm mt-4 text-center">Zaten hesabın var mı? <a href="login.php" class="turuncu"><?php echo dil('giris'); ?></a></p>
            </form>
        </div>
        <div class="glass p-8 rounded-2xl" data-aos="fade-left">
            <h3 class="text-2xl turuncu mb-6"><?php echo dil('neden_kayit'); ?></h3>
            <div class="flex items-start space-x-3 mb-4"><i class="fas fa-check-circle turuncu mt-1"></i><div><p class="font-bold text-sm"><?php echo dil('avantaj1'); ?></p><p class="text-gray-400 text-xs"><?php echo dil('avantaj1_desc'); ?></p></div></div>
            <div class="flex items-start space-x-3 mb-4"><i class="fas fa-check-circle turuncu mt-1"></i><div><p class="font-bold text-sm"><?php echo dil('avantaj2'); ?></p><p class="text-gray-400 text-xs"><?php echo dil('avantaj2_desc'); ?></p></div></div>
            <div class="flex items-start space-x-3 mb-4"><i class="fas fa-check-circle turuncu mt-1"></i><div><p class="font-bold text-sm"><?php echo dil('avantaj3'); ?></p><p class="text-gray-400 text-xs"><?php echo dil('avantaj3_desc'); ?></p></div></div>
            <div class="flex items-start space-x-3 mb-4"><i class="fas fa-check-circle turuncu mt-1"></i><div><p class="font-bold text-sm"><?php echo dil('avantaj4'); ?></p><p class="text-gray-400 text-xs"><?php echo dil('avantaj4_desc'); ?></p></div></div>
            <div class="glass p-4 rounded-xl mt-6 text-center">
                <p class="text-gray-400 text-xs"><?php echo dil('guven_mesaji'); ?></p>
                <div class="flex justify-center space-x-4 mt-3"><i class="fas fa-lock turuncu"></i><i class="fas fa-shield-alt turuncu"></i><i class="fas fa-user-check turuncu"></i></div>
            </div>
        </div>
    </div>
</section>
<div id="termsModal" class="fixed inset-0 bg-black bg-opacity-80 z-50 hidden flex items-center justify-center p-4">
    <div class="glass p-8 rounded-2xl max-w-lg w-full relative">
        <i class="fas fa-times absolute top-4 right-4 text-2xl turuncu cursor-pointer" onclick="document.getElementById('termsModal').classList.add('hidden')"></i>
        <h3 class="text-2xl turuncu mb-4"><?php echo dil('terms_title'); ?></h3>
        <p class="text-gray-300 text-sm whitespace-pre-line max-h-96 overflow-y-auto"><?php echo dil('terms_text'); ?></p>
    </div>
</div>
<div id="privacyModal" class="fixed inset-0 bg-black bg-opacity-80 z-50 hidden flex items-center justify-center p-4">
    <div class="glass p-8 rounded-2xl max-w-lg w-full relative">
        <i class="fas fa-times absolute top-4 right-4 text-2xl turuncu cursor-pointer" onclick="document.getElementById('privacyModal').classList.add('hidden')"></i>
        <h3 class="text-2xl turuncu mb-4"><?php echo dil('privacy_title'); ?></h3>
        <p class="text-gray-300 text-sm whitespace-pre-line max-h-96 overflow-y-auto"><?php echo dil('privacy_text'); ?></p>
    </div>
</div>
<script>
function termsAc() { document.getElementById('termsModal').classList.remove('hidden'); }
function privacyAc() { document.getElementById('privacyModal').classList.remove('hidden'); }
</script>
<?php include 'inc/footer.php'; ?>
