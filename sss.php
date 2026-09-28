<?php include 'inc/header.php'; ?>
<section class="min-h-screen flex flex-col justify-start items-center px-4 pt-20 relative overflow-hidden">
    <i class="fas fa-question-circle absolute top-20 left-10 text-8xl opacity-5 turuncu"></i>
    <i class="fas fa-comments absolute bottom-20 right-10 text-8xl opacity-5 turuncu"></i>
    <h2 class="text-4xl turuncu mb-8 relative z-10" data-aos="fade-down"><i class="fas fa-question-circle"></i> <?php echo dil('sss'); ?></h2>
    <div class="glass p-8 rounded-2xl w-full max-w-3xl relative z-10" data-aos="zoom-in">
        <h3 class="text-xl font-bold turuncu mb-4"><i class="fas fa-bitcoin"></i> <?php echo dil('faq_crypto_title'); ?></h3>
        <div class="mb-6"><p class="turuncu font-bold mb-2"><?php echo dil('faq_crypto_q1'); ?></p><p class="text-gray-400 text-sm"><?php echo dil('faq_crypto_a1'); ?></p></div>
        <div class="mb-6"><p class="turuncu font-bold mb-2"><?php echo dil('faq_crypto_q2'); ?></p><p class="text-gray-400 text-sm"><?php echo dil('faq_crypto_a2'); ?></p></div>
        <div class="mb-6"><p class="turuncu font-bold mb-2"><?php echo dil('faq_crypto_q3'); ?></p><p class="text-gray-400 text-sm"><?php echo dil('faq_crypto_a3'); ?></p></div>
        <h3 class="text-xl font-bold turuncu mb-4 mt-8"><i class="fas fa-chart-line"></i> <?php echo dil('faq_earn_title'); ?></h3>
        <div class="mb-4"><p class="turuncu font-bold mb-1"><?php echo dil('faq_earn_q1'); ?></p><p class="text-gray-400 text-sm"><?php echo dil('faq_earn_a1'); ?></p></div>
        <div class="mb-4"><p class="turuncu font-bold mb-1"><?php echo dil('faq_earn_q2'); ?></p><p class="text-gray-400 text-sm"><?php echo dil('faq_earn_a2'); ?></p></div>
        <div class="mb-6"><p class="turuncu font-bold mb-1"><?php echo dil('faq_earn_q3'); ?></p><p class="text-gray-400 text-sm"><?php echo dil('faq_earn_a3'); ?></p></div>

        <h3 class="text-xl font-bold turuncu mb-4 mt-8"><i class="fas fa-gift"></i> <?php echo dil('faq_bonus_title'); ?></h3>
        <div class="mb-4"><p class="turuncu font-bold mb-1"><?php echo dil('faq_bonus_q1'); ?></p><p class="text-gray-400 text-sm"><?php echo dil('faq_bonus_a1'); ?></p></div>
        <div class="mb-4"><p class="turuncu font-bold mb-1"><?php echo dil('faq_bonus_q2'); ?></p><p class="text-gray-400 text-sm"><?php echo dil('faq_bonus_a2'); ?></p></div>
        <div class="mb-6"><p class="turuncu font-bold mb-1"><?php echo dil('faq_bonus_q3'); ?></p><p class="text-gray-400 text-sm"><?php echo dil('faq_bonus_a3'); ?></p></div>
        <h3 class="text-xl font-bold turuncu mb-4 mt-8"><i class="fas fa-shield-alt"></i> <?php echo dil('faq_security_title'); ?></h3>
        <div class="mb-4"><p class="turuncu font-bold mb-1"><?php echo dil('faq_security_q1'); ?></p><p class="text-gray-400 text-sm"><?php echo dil('faq_security_a1'); ?></p></div>
        <div class="mb-4"><p class="turuncu font-bold mb-1"><?php echo dil('faq_security_q2'); ?></p><p class="text-gray-400 text-sm"><?php echo dil('faq_security_a2'); ?></p></div>
        <div class="mb-6"><p class="turuncu font-bold mb-1"><?php echo dil('faq_security_q3'); ?></p><p class="text-gray-400 text-sm"><?php echo dil('faq_security_a3'); ?></p></div>

        <h3 class="text-xl font-bold turuncu mb-4 mt-8"><i class="fas fa-money-bill-wave"></i> <?php echo dil('faq_withdraw_title'); ?></h3>
        <div class="mb-4"><p class="turuncu font-bold mb-1"><?php echo dil('faq_withdraw_q1'); ?></p><p class="text-gray-400 text-sm"><?php echo dil('faq_withdraw_a1'); ?></p></div>
        <div class="mb-4"><p class="turuncu font-bold mb-1"><?php echo dil('faq_withdraw_q2'); ?></p><p class="text-gray-400 text-sm"><?php echo dil('faq_withdraw_a2'); ?></p></div>
        <div class="mb-6"><p class="turuncu font-bold mb-1"><?php echo dil('faq_withdraw_q3'); ?></p><p class="text-gray-400 text-sm"><?php echo dil('faq_withdraw_a3'); ?></p></div>
        <h3 class="text-xl font-bold turuncu mb-4 mt-8"><i class="fas fa-rocket"></i> <?php echo dil('faq_start_title'); ?></h3>
        <div class="mb-4"><p class="turuncu font-bold mb-1"><?php echo dil('faq_start_q1'); ?></p><p class="text-gray-400 text-sm"><?php echo dil('faq_start_a1'); ?></p></div>
    </div>

    <div class="glass max-w-3xl w-full p-8 rounded-2xl mt-8 text-center relative z-10" data-aos="fade-up">
        <h3 class="text-2xl font-bold turuncu mb-4"><?php echo dil('faq_still_questions'); ?></h3>
        <p class="text-gray-400 mb-6"><?php echo dil('faq_contact_support'); ?></p>
        <a href="contact.php" class="inline-block turuncu-bg px-8 py-3 rounded-full hover:bg-orange-400 transition">
            <i class="fas fa-envelope"></i> <?php echo dil('iletisim'); ?>
        </a>
    </div>
</section>
<?php include 'inc/footer.php'; ?>
