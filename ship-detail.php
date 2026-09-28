<?php
require_once 'inc/fonksiyonlar.php';
$gemi = $_GET['gemi'] ?? 'HADEEL';
include 'inc/header.php';
?>
<section class="min-h-screen flex flex-col justify-center items-center text-center px-4 hero-bg relative overflow-hidden">
    <h2 class="text-4xl md:text-6xl font-bold turuncu mb-6 relative z-10" data-aos="fade-down"><i class="fas fa-ship"></i> <?php echo htmlspecialchars($gemi); ?></h2>
    <p class="text-lg md:text-xl mb-8 text-gray-300 relative z-10" data-aos="fade-up" data-aos-delay="200"><?php echo dil('ship_slogan'); ?></p>
    <a href="kayit.php" class="glass turuncu-border px-8 py-3 rounded-full hover:bg-orange-500 hover:text-black transition pulse relative z-10" data-aos="zoom-in" data-aos-delay="400">
        <i class="fas fa-ship"></i> <?php echo dil('invest_now'); ?>
    </a>
</section>
<section class="max-w-6xl mx-auto p-4 md:p-10 relative">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
        <div class="glass p-4 rounded-2xl w-full overflow-hidden" data-aos="fade-right">
            <div class="relative w-full h-48 md:h-64 rounded-xl overflow-hidden bg-gradient-to-br from-[#1c2541] to-[#0b132b] flex items-center justify-center">
                <i class="fas fa-ship text-8xl turuncu opacity-20"></i>
                <div class="absolute top-2 left-2 flex items-center space-x-2">
                    <span class="bg-green-500 text-white text-xs px-2 py-1 rounded-full">LIVE</span>
                    <span class="bg-orange-500 text-white text-xs px-2 py-1 rounded-full"><?php echo htmlspecialchars($gemi); ?></span>
                </div>
                <div class="absolute bottom-2 left-2 right-2">
                    <div class="flex justify-between items-end">
                        <div>
                            <p class="text-white text-2xl font-bold">$11.5M</p>
                            <p class="text-gray-400 text-xs">Valuation</p>
                        </div>
                        <div class="text-right">
                            <p class="text-green-400 text-xl font-bold">27%</p>
                            <p class="text-gray-400 text-xs">Annual Yield</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="glass p-6 rounded-2xl w-full overflow-hidden" data-aos="fade-left">
            <h3 class="text-xl font-bold turuncu mb-4"><?php echo dil('investment_details'); ?></h3>
            <div class="grid grid-cols-2 gap-3 text-xs text-gray-400 mb-4">
                <div><?php echo dil('target'); ?>: <span class="text-white">$2.3M</span></div>
                <div><?php echo dil('investors'); ?>: <span class="text-white">340</span></div>
                <div><?php echo dil('sold'); ?>: <span class="text-white">86%</span></div>
                <div><?php echo dil('avail_mat'); ?>: <span class="text-white">1.02M</span></div>
                <div><?php echo dil('mat_price'); ?>: <span class="text-white">$5.9</span></div>
                <div><?php echo dil('left'); ?>: <span class="text-white">665,734</span></div>
            </div>
            <div class="w-full bg-gray-700 rounded-full h-2 mb-4">
                <div class="bg-orange-500 h-2 rounded-full" style="width: 86%;"></div>
            </div>
            <a href="kayit.php" class="inline-block turuncu-bg px-6 py-2 rounded-full hover:bg-orange-400 transition w-full text-center text-sm">
                <i class="fas fa-ship"></i> <?php echo dil('invest_now'); ?>
            </a>
        </div>
    </div>
</section>
<section class="max-w-4xl mx-auto p-4 md:p-10 relative">
    <div class="glass p-6 rounded-2xl text-center w-full overflow-hidden" data-aos="fade-up">
        <h3 class="text-xl font-bold turuncu mb-4"><?php echo dil('projected_earnings'); ?></h3>
        <div class="overflow-x-auto w-full">
            <div class="flex items-end justify-center space-x-2 h-32 min-w-[300px]">
                <div class="w-8 bg-orange-500 rounded-t" style="height: 20%;"></div>
                <div class="w-8 bg-orange-500 rounded-t" style="height: 35%;"></div>
                <div class="w-8 bg-orange-500 rounded-t" style="height: 50%;"></div>
                <div class="w-8 bg-orange-500 rounded-t" style="height: 65%;"></div>
                <div class="w-8 bg-orange-500 rounded-t" style="height: 80%;"></div>
                <div class="w-8 bg-orange-500 rounded-t" style="height: 95%;"></div>
            </div>
        </div>
        <div class="flex justify-center space-x-4 mt-2 text-xs text-gray-400">
            <span>M1</span><span>M2</span><span>M3</span><span>M4</span><span>M5</span><span>M6</span>
        </div>
    </div>
</section>

<section class="grid grid-cols-1 md:grid-cols-3 gap-4 p-4 md:p-10 max-w-6xl mx-auto relative">
    <div class="glass p-6 rounded-2xl text-center w-full" data-aos="fade-right">
        <i class="fas fa-users fa-3x turuncu mb-3"></i>
        <p class="text-3xl font-bold turuncu">340</p>
        <p class="text-gray-400 text-sm"><?php echo dil('investors'); ?></p>
    </div>
    <div class="glass p-6 rounded-2xl text-center w-full" data-aos="fade-up" data-aos-delay="200">
        <i class="fas fa-dollar-sign fa-3x turuncu mb-3"></i>
        <p class="text-3xl font-bold turuncu">$2.3M</p>
        <p class="text-gray-400 text-sm"><?php echo dil('total_invested'); ?></p>
    </div>
    <div class="glass p-6 rounded-2xl text-center w-full" data-aos="fade-left" data-aos-delay="400">
        <i class="fas fa-chart-line fa-3x turuncu mb-3"></i>
        <p class="text-3xl font-bold turuncu">27%</p>
        <p class="text-gray-400 text-sm"><?php echo dil('avg_annual_yield'); ?></p>
    </div>
</section>
<section class="max-w-4xl mx-auto p-4 md:p-10 relative">
    <div class="glass p-6 rounded-2xl w-full overflow-hidden" data-aos="fade-up">
        <h3 class="text-xl font-bold turuncu mb-4"><?php echo dil('ship_specifications'); ?></h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-sm text-gray-400">
            <div><?php echo dil('type'); ?>: <span class="text-white">Container Ship</span></div>
            <div><?php echo dil('capacity'); ?>: <span class="text-white">150,000 Tons</span></div>
            <div><?php echo dil('year_built'); ?>: <span class="text-white">2020</span></div>
            <div><?php echo dil('flag'); ?>: <span class="text-white">Panama</span></div>
            <div><?php echo dil('length'); ?>: <span class="text-white">300m</span></div>
            <div><?php echo dil('beam'); ?>: <span class="text-white">40m</span></div>
        </div>
    </div>
</section>

<section class="max-w-4xl mx-auto p-4 md:p-10 relative">
    <div class="glass p-6 rounded-2xl w-full overflow-hidden" data-aos="fade-up">
        <h3 class="text-xl font-bold turuncu mb-4"><?php echo dil('profit_distribution_history'); ?></h3>
        <div class="overflow-x-auto w-full">
            <table class="w-full text-left text-sm min-w-[300px]">
                <thead>
                    <tr class="border-b border-gray-700">
                        <th class="py-2"><?php echo dil('month'); ?></th>
                        <th class="py-2"><?php echo dil('profit'); ?></th>
                        <th class="py-2"><?php echo dil('yield'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-gray-800"><td class="py-2">January</td><td class="py-2">$12,500</td><td class="py-2 text-green-400">2.1%</td></tr>
                    <tr class="border-b border-gray-800"><td class="py-2">February</td><td class="py-2">$13,200</td><td class="py-2 text-green-400">2.3%</td></tr>
                    <tr class="border-b border-gray-800"><td class="py-2">March</td><td class="py-2">$14,000</td><td class="py-2 text-green-400">2.5%</td></tr>
                    <tr class="border-b border-gray-800"><td class="py-2">April</td><td class="py-2">$15,100</td><td class="py-2 text-green-400">2.7%</td></tr>
                    <tr class="border-b border-gray-800"><td class="py-2">May</td><td class="py-2">$16,300</td><td class="py-2 text-green-400">2.9%</td></tr>
                    <tr><td class="py-2">June</td><td class="py-2">$17,500</td><td class="py-2 text-green-400">3.1%</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
<section class="glass max-w-4xl mx-auto p-6 md:p-10 rounded-2xl text-center w-full overflow-hidden" data-aos="fade-up">
    <h3 class="text-2xl font-bold turuncu mb-4"><?php echo dil('why_invest'); ?></h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div><i class="fas fa-lock fa-2x turuncu mb-2"></i><p class="text-gray-300 text-sm"><?php echo dil('aes'); ?></p></div>
        <div><i class="fas fa-file-contract fa-2x turuncu mb-2"></i><p class="text-gray-300 text-sm"><?php echo dil('legal'); ?></p></div>
        <div><i class="fas fa-chart-pie fa-2x turuncu mb-2"></i><p class="text-gray-300 text-sm"><?php echo dil('transparent'); ?></p></div>
    </div>
</section>

<section class="max-w-3xl mx-auto p-4 md:p-10 relative">
    <div class="glass p-6 rounded-2xl w-full overflow-hidden" data-aos="fade-up">
        <h3 class="text-xl font-bold turuncu mb-4"><?php echo dil('faq_ship'); ?></h3>
        <div class="mb-3"><p class="turuncu font-bold text-sm"><?php echo dil('faq_q1'); ?></p><p class="text-gray-400 text-sm"><?php echo dil('faq_a1'); ?></p></div>
        <div class="mb-3"><p class="turuncu font-bold text-sm"><?php echo dil('faq_q2'); ?></p><p class="text-gray-400 text-sm"><?php echo dil('faq_a2'); ?></p></div>
        <div><p class="turuncu font-bold text-sm"><?php echo dil('faq_q3'); ?></p><p class="text-gray-400 text-sm"><?php echo dil('faq_a3'); ?></p></div>
    </div>
</section>

<section class="glass max-w-4xl mx-auto p-6 md:p-10 rounded-2xl text-center w-full overflow-hidden my-6" data-aos="fade-up">
    <h3 class="text-2xl font-bold turuncu mb-3"><?php echo dil('ready_invest'); ?></h3>
    <p class="text-gray-400 mb-4 text-sm"><?php echo dil('join_investors'); ?></p>
    <a href="kayit.php" class="inline-block turuncu-bg px-8 py-3 rounded-full hover:bg-orange-400 transition text-sm">
        <i class="fas fa-ship"></i> <?php echo dil('get_started'); ?>
    </a>
</section>

<?php include 'inc/footer.php'; ?>
