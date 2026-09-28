<?php
require_once 'inc/fonksiyonlar.php';
if (!isset($_SESSION['kullanici_id'])) {
    header('Location: login.php');
    exit;
}
include 'inc/header.php';
?>
<div class="min-h-screen flex flex-col justify-center items-center px-4 pt-20 relative overflow-hidden">
    <i class="fas fa-sliders-h absolute top-20 left-10 text-8xl opacity-5 turuncu"></i>
    <i class="fas fa-palette absolute bottom-20 right-10 text-8xl opacity-5 turuncu"></i>
    <h2 class="text-4xl turuncu mb-8 relative z-10" data-aos="fade-down"><i class="fas fa-cog"></i> <?php echo dil('settings'); ?></h2>
    <div class="glass p-8 rounded-2xl w-full max-w-md relative z-10" data-aos="zoom-in">
        <label class="block mb-2 text-gray-300"><?php echo dil('theme'); ?></label>
        <select class="w-full p-3 rounded bg-gray-800 text-white mb-4" onchange="temaDegistir(this.value)">
            <option value="dark"><?php echo dil('theme_dark'); ?></option>
            <option value="light"><?php echo dil('theme_light'); ?></option>
            <option value="auto"><?php echo dil('theme_auto'); ?></option>
        </select>
        <label class="block mb-2 text-gray-300"><?php echo dil('language'); ?></label>
        <select class="w-full p-3 rounded bg-gray-800 text-white mb-4" onchange="window.location.href='?lang='+this.value">
            <option value="en">English</option>
            <option value="tr">Türkçe</option>
            <option value="de">Deutsch</option>
            <option value="ru">Русский</option>
            <option value="ar">العربية</option>
        </select>
        <label class="block mb-2 text-gray-300"><?php echo dil('notifications'); ?></label>
        <select class="w-full p-3 rounded bg-gray-800 text-white mb-6">
            <option><?php echo dil('on'); ?></option>
            <option><?php echo dil('off'); ?></option>
        </select>
        <button class="w-full turuncu-bg p-3 rounded-full hover:bg-orange-400 transition turuncu-border">
            <i class="fas fa-save"></i> <?php echo dil('save'); ?>
        </button>
    </div>
</div>
<?php include 'inc/footer.php'; ?>
