<?php include 'inc/header.php'; ?>
<div class="min-h-screen flex flex-col justify-start items-center px-4 pt-20 relative overflow-hidden">
    <i class="fas fa-medal absolute top-20 left-10 text-8xl opacity-5 turuncu"></i>
    <i class="fas fa-star absolute bottom-20 right-10 text-8xl opacity-5 turuncu"></i>
    <h2 class="text-4xl turuncu mb-8 relative z-10" data-aos="fade-down"><i class="fas fa-medal"></i> <?php echo dil('badges'); ?></h2>
    <div class="glass p-8 rounded-2xl w-full max-w-2xl relative z-10" data-aos="zoom-in">
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <div class="glass p-4 rounded-xl text-center border border-orange-300">
                <i class="fas fa-star fa-2x text-orange-300 mb-2"></i>
                <p class="text-sm">First Investment</p>
                <p class="text-xs text-gray-500">Bronze</p>
            </div>
            <div class="glass p-4 rounded-xl text-center border border-orange-300">
                <i class="fas fa-medal fa-2x text-orange-300 mb-2"></i>
                <p class="text-sm">$100 Invested</p>
                <p class="text-xs text-gray-500">Bronze</p>
            </div>
            <div class="glass p-4 rounded-xl text-center border border-orange-300">
                <i class="fas fa-fire fa-2x text-orange-300 mb-2"></i>
                <p class="text-sm">First Referral</p>
                <p class="text-xs text-gray-500">Bronze</p>
            </div>
            <div class="glass p-4 rounded-xl text-center border border-gray-300">
                <i class="fas fa-medal fa-2x text-gray-300 mb-2"></i>
                <p class="text-sm">$1,000 Invested</p>
                <p class="text-xs text-gray-500">Silver</p>
            </div>
            <div class="glass p-4 rounded-xl text-center border border-gray-300">
                <i class="fas fa-chart-line fa-2x text-gray-300 mb-2"></i>
                <p class="text-sm">5 Investments</p>
                <p class="text-xs text-gray-500">Silver</p>
            </div>
            <div class="glass p-4 rounded-xl text-center border border-gray-300">
                <i class="fas fa-users fa-2x text-gray-300 mb-2"></i>
                <p class="text-sm">10 Referrals</p>
                <p class="text-xs text-gray-500">Silver</p>
            </div>
            <div class="glass p-4 rounded-xl text-center border border-yellow-400">
                <i class="fas fa-crown fa-2x text-yellow-400 mb-2"></i>
                <p class="text-sm">$10,000 Invested</p>
                <p class="text-xs text-gray-500">Gold</p>
            </div>
            <div class="glass p-4 rounded-xl text-center border border-yellow-400">
                <i class="fas fa-gem fa-2x text-yellow-400 mb-2"></i>
                <p class="text-sm">VIP Investor</p>
                <p class="text-xs text-gray-500">Gold</p>
            </div>
            <div class="glass p-4 rounded-xl text-center border border-yellow-400">
                <i class="fas fa-rocket fa-2x text-yellow-400 mb-2"></i>
                <p class="text-sm">Early Adopter</p>
                <p class="text-xs text-gray-500">Gold</p>
            </div>
        </div>
    </div>
</div>

<div class="glass max-w-2xl mx-auto p-6 rounded-2xl mt-6 mb-10" data-aos="fade-up">
    <h3 class="text-xl font-bold turuncu mb-3">Levels</h3>
    <div class="flex items-center space-x-4 mb-2">
        <i class="fas fa-star text-orange-300"></i>
        <span class="text-sm text-gray-300">Bronze: 0 - 999 points</span>
    </div>
    <div class="flex items-center space-x-4 mb-2">
        <i class="fas fa-medal text-gray-300"></i>
        <span class="text-sm text-gray-300">Silver: 1,000 - 9,999 points</span>
    </div>
    <div class="flex items-center space-x-4">
        <i class="fas fa-crown text-yellow-400"></i>
        <span class="text-sm text-gray-300">Gold: 10,000+ points</span>
    </div>
</div>
<?php include 'inc/footer.php'; ?>
