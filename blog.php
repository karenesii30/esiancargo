<?php include 'inc/header.php'; ?>
<div class="min-h-screen flex flex-col justify-center items-center px-4 pt-20 relative overflow-hidden">
    <i class="fas fa-blog absolute top-20 left-10 text-8xl opacity-5 turuncu"></i>
    <i class="fas fa-newspaper absolute bottom-20 right-10 text-8xl opacity-5 turuncu"></i>
    <div class="glass p-10 rounded-2xl max-w-3xl w-full relative z-10" data-aos="fade-up">
        <h2 class="text-4xl turuncu mb-6"><i class="fas fa-blog"></i> <?php echo dil('blog'); ?></h2>
        <div class="mb-6"><h3 class="text-xl font-bold turuncu"><?php echo dil('gercek_gemiler'); ?></h3><p class="text-gray-400"><?php echo dil('slogan'); ?></p></div>
        <div class="mb-6"><h3 class="text-xl font-bold turuncu"><?php echo dil('kripto_odeme'); ?></h3><p class="text-gray-400">BTC, ETH, USDT</p></div>
        <div><h3 class="text-xl font-bold turuncu"><?php echo dil('kar_ortakligi'); ?></h3><p class="text-gray-400"><?php echo dil('vade'); ?></p></div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>
