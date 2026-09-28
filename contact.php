<?php include 'inc/header.php'; ?>
<section class="min-h-screen flex flex-col justify-start items-center px-4 pt-20 w-full overflow-hidden relative overflow-hidden">
    <i class="fas fa-envelope absolute top-20 left-10 text-8xl opacity-5 turuncu"></i>
    <i class="fas fa-paper-plane absolute bottom-20 right-10 text-8xl opacity-5 turuncu"></i>
    <h2 class="text-4xl turuncu mb-8 relative z-10" data-aos="fade-down"><i class="fas fa-envelope"></i> <?php echo dil('iletisim'); ?></h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl w-full relative z-10">
        <div class="glass p-8 rounded-2xl text-center" data-aos="fade-right">
            <i class="fab fa-telegram fa-4x turuncu mb-4"></i>
            <h3 class="text-xl font-bold mb-2"><?php echo dil('contact_telegram'); ?></h3>
            <p class="text-gray-400 text-sm mb-4"><?php echo dil('contact_telegram_desc'); ?></p>
            <a href="https://t.me/esiancargo" target="_blank" class="inline-block turuncu-bg px-6 py-2 rounded-full hover:bg-orange-400 transition">
                <i class="fab fa-telegram"></i> <?php echo dil('contact_telegram_btn'); ?>
            </a>
        </div>
        <div class="glass p-8 rounded-2xl text-center" data-aos="fade-left">
            <i class="fas fa-ticket-alt fa-4x turuncu mb-4"></i>
            <h3 class="text-xl font-bold mb-2"><?php echo dil('contact_ticket'); ?></h3>
            <p class="text-gray-400 text-sm mb-4"><?php echo dil('contact_ticket_desc'); ?></p>
            <a href="#ticket-form" class="inline-block turuncu-bg px-6 py-2 rounded-full hover:bg-orange-400 transition">
                <i class="fas fa-plus"></i> <?php echo dil('contact_ticket_btn'); ?>
            </a>
        </div>
    </div>

    <div id="ticket-form" class="glass p-8 rounded-2xl max-w-2xl w-full mt-10 relative z-10" data-aos="fade-up">
        <h3 class="text-2xl font-bold turuncu mb-6"><?php echo dil('contact_form_title'); ?></h3>
        <form method="POST" action="ticket_create.php">
            <input type="text" name="konu" placeholder="<?php echo dil('contact_subject'); ?>" class="w-full p-3 rounded bg-gray-800 text-white mb-4" required>
            <textarea name="mesaj" placeholder="<?php echo dil('contact_message'); ?>" class="w-full p-3 rounded bg-gray-800 text-white mb-6" rows="5" required></textarea>
            <button type="submit" class="w-full turuncu-bg p-3 rounded-full hover:bg-orange-400 transition">
                <i class="fas fa-paper-plane"></i> <?php echo dil('contact_submit'); ?>
            </button>
        </form>
    </div>
</section>
<?php include 'inc/footer.php'; ?>
