<?php include 'inc/header.php'; ?>
<section class="min-h-screen flex flex-col justify-start items-center px-4 pt-20 relative overflow-hidden">
    <i class="fas fa-info-circle absolute top-20 left-10 text-8xl opacity-5 turuncu"></i>
    <i class="fas fa-ship absolute bottom-20 right-10 text-8xl opacity-5 turuncu"></i>
    <h2 class="text-4xl turuncu mb-4 relative z-10" data-aos="fade-down"><i class="fas fa-info-circle"></i> <?php echo dil('hiw_title'); ?></h2>
    <p class="text-gray-400 mb-10 text-center max-w-2xl relative z-10" data-aos="fade-up"><?php echo dil('hiw_desc'); ?></p>
    <div class="glass p-8 rounded-2xl w-full max-w-3xl relative z-10" data-aos="zoom-in">
        <div class="mb-6"><p class="turuncu font-bold mb-2">1. <?php echo dil('hiw_step1'); ?></p><p class="text-gray-400 text-sm"><?php echo dil('hiw_step1_desc'); ?></p></div>
        <div class="mb-6"><p class="turuncu font-bold mb-2">2. <?php echo dil('hiw_step2'); ?></p><p class="text-gray-400 text-sm"><?php echo dil('hiw_step2_desc'); ?></p></div>
        <div class="mb-6"><p class="turuncu font-bold mb-2">3. <?php echo dil('hiw_step3'); ?></p><p class="text-gray-400 text-sm"><?php echo dil('hiw_step3_desc'); ?></p></div>
        <div class="mb-6"><p class="turuncu font-bold mb-2">4. <?php echo dil('hiw_step4'); ?></p><p class="text-gray-400 text-sm"><?php echo dil('hiw_step4_desc'); ?></p></div>
        <div class="mb-6"><p class="turuncu font-bold mb-2">5. <?php echo dil('hiw_step5'); ?></p><p class="text-gray-400 text-sm"><?php echo dil('hiw_step5_desc'); ?></p></div>
        <div class="mb-6"><p class="turuncu font-bold mb-2">6. <?php echo dil('hiw_step6'); ?></p><p class="text-gray-400 text-sm"><?php echo dil('hiw_step6_desc'); ?></p></div>
    </div>
    <div class="glass max-w-3xl w-full p-8 rounded-2xl mt-8 text-center relative z-10" data-aos="fade-up">
        <h3 class="text-2xl font-bold turuncu mb-4"><?php echo dil('hiw_security'); ?></h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div><i class="fas fa-lock fa-2x turuncu mb-2"></i><p class="text-gray-300 text-sm"><?php echo dil('sifreleme'); ?></p></div>
            <div><i class="fas fa-file-contract fa-2x turuncu mb-2"></i><p class="text-gray-300 text-sm"><?php echo dil('sozlesme'); ?></p></div>
            <div><i class="fas fa-chart-pie fa-2x turuncu mb-2"></i><p class="text-gray-300 text-sm"><?php echo dil('seffaf'); ?></p></div>
        </div>
    </div>

    <div class="glass max-w-3xl w-full p-8 rounded-2xl mt-8 relative z-10" data-aos="fade-up">
        <h3 class="text-2xl font-bold turuncu mb-4"><?php echo dil('hiw_faq'); ?></h3>
        <div class="mb-3"><p class="turuncu font-bold text-sm"><?php echo dil('faq_crypto_q1'); ?></p><p class="text-gray-400 text-sm"><?php echo dil('faq_crypto_a1'); ?></p></div>
        <div class="mb-3"><p class="turuncu font-bold text-sm"><?php echo dil('faq_earn_q1'); ?></p><p class="text-gray-400 text-sm"><?php echo dil('faq_earn_a1'); ?></p></div>
        <div><p class="turuncu font-bold text-sm"><?php echo dil('faq_security_q1'); ?></p><p class="text-gray-400 text-sm"><?php echo dil('faq_security_a1'); ?></p></div>
    </div>

    <div class="glass max-w-3xl w-full p-8 rounded-2xl mt-8 text-center relative z-10 mb-10" data-aos="fade-up">
        <h3 class="text-2xl font-bold turuncu mb-4"><?php echo dil('hiw_ready'); ?></h3>
        <p class="text-gray-400 mb-6"><?php echo dil('hiw_join'); ?></p>
        <a href="kayit.php" class="inline-block turuncu-bg px-8 py-3 rounded-full hover:bg-orange-400 transition">
            <i class="fas fa-ship"></i> <?php echo dil('hiw_get_started'); ?>
        </a>
    </div>
</section>
<?php include 'inc/footer.php'; ?>
