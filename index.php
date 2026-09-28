<?php include 'inc/header.php'; ?>
<section class="h-screen flex flex-col justify-center items-center text-center px-4 hero-bg relative overflow-hidden">
    <i class="fas fa-anchor anchor-icon" style="top: 10%; left: 5%;"></i>
    <i class="fas fa-ship anchor-icon" style="bottom: 20%; right: 5%; font-size: 150px;"></i>
    <div class="absolute w-72 h-72 rounded-full border border-orange-400 opacity-20 float"></div>
    <div class="absolute w-96 h-96 rounded-full border border-orange-400 opacity-10 float" style="animation-delay: 1s;"></div>
    <div class="ship-silhouette"></div>
    <h2 class="text-6xl md:text-8xl font-bold turuncu mb-6 relative z-10" data-aos="fade-down"><i class="fas fa-ship"></i> ESIANCARGO</h2>
    <p class="text-xl md:text-2xl mb-10 text-gray-300 relative z-10" data-aos="fade-up" data-aos-delay="200"><?php echo dil('slogan'); ?></p>
    <a href="kayit.php" class="glass turuncu-border px-10 py-4 rounded-full hover:bg-orange-500 hover:text-black transition pulse relative z-10" data-aos="zoom-in" data-aos-delay="400">
        <i class="fas fa-ship"></i> <?php echo dil('yatirim_yap'); ?>
    </a>
</section>

<section class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6 max-w-6xl mx-auto relative">
    <div class="glass p-6 rounded-2xl text-center" data-aos="fade-right">
        <i class="fas fa-users fa-3x turuncu mb-3"></i>
        <p class="text-2xl md:text-3xl font-bold turuncu" id="stat1">0</p>
        <p class="text-gray-400 text-sm">Active Investors</p>
    </div>
    <div class="glass p-6 rounded-2xl text-center" data-aos="fade-up" data-aos-delay="200">
        <i class="fas fa-dollar-sign fa-3x turuncu mb-3"></i>
        <p class="text-2xl md:text-3xl font-bold turuncu" id="stat2">0</p>
        <p class="text-gray-400 text-sm">Total Invested</p>
    </div>
    <div class="glass p-6 rounded-2xl text-center" data-aos="fade-left" data-aos-delay="400">
        <i class="fas fa-chart-line fa-3x turuncu mb-3"></i>
        <p class="text-2xl md:text-3xl font-bold turuncu" id="stat3">0</p>
        <p class="text-gray-400 text-sm">Avg. Annual Yield</p>
    </div>
</section>
<section class="max-w-6xl mx-auto p-4 md:p-10 relative">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-8 items-center">
        <div class="glass p-6 rounded-2xl relative overflow-hidden group" data-aos="fade-right">
            <div class="relative w-full h-64 md:h-96 rounded-xl overflow-hidden bg-gradient-to-br from-[#1c2541] to-[#0b132b] flex items-center justify-center">
                <div class="absolute inset-0 opacity-10">
                    <i class="fas fa-ship text-[300px] turuncu absolute -bottom-20 -right-20"></i>
                </div>
                <div class="absolute top-4 left-4 flex items-center space-x-2">
                    <span class="bg-green-500 text-white text-xs px-3 py-1 rounded-full animate-pulse">LIVE</span>
                    <span class="bg-orange-500 text-white text-xs px-3 py-1 rounded-full">HADEEL</span>
                </div>
                <div class="absolute bottom-4 left-4 right-4">
                    <div class="flex justify-between items-end">
                        <div>
                            <p class="text-white text-3xl md:text-4xl font-bold">$11.5M</p>
                            <p class="text-gray-400 text-sm">Valuation</p>
                        </div>
                        <div class="text-right">
                            <p class="text-green-400 text-2xl md:text-2xl md:text-3xl font-bold">27%</p>
                            <p class="text-gray-400 text-sm">Annual Yield</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <div class="flex justify-between items-center mb-2">
                    <h3 class="text-2xl font-bold">HADEEL</h3>
                    <span class="bg-green-900 text-green-400 text-xs px-3 py-1 rounded-full">30 days Left</span>
                </div>
                <div class="w-full bg-gray-700 rounded-full h-2 mb-4">
                    <div class="bg-orange-500 h-2 rounded-full" style="width: 86%;"></div>
                </div>
                <div class="grid grid-cols-3 gap-2 text-sm text-gray-400 mb-4">
                    <div>Target: <span class="text-white">$2.3M</span></div>
                    <div>Investors: <span class="text-white">340</span></div>
                    <div>Sold: <span class="text-white">86%</span></div>
                    <div>Avail MAT: <span class="text-white">1.02M</span></div>
                    <div>MAT Price: <span class="text-white">$5.9</span></div>
                    <div>Left: <span class="text-white">665,734</span></div>
                </div>
                <div class="flex space-x-4">
                    <a href="sss.php" class="glass px-6 py-2 rounded-full hover:bg-orange-500 hover:text-black transition flex-1 text-center">VIEW</a>
                    <a href="kayit.php" class="turuncu-bg px-6 py-2 rounded-full hover:bg-orange-400 transition flex-1 text-center">BUY</a>
                </div>
            </div>
        </div>
        <div class="glass p-8 rounded-2xl text-center relative overflow-hidden group" data-aos="fade-left">
            <i class="fas fa-chart-pie absolute top-4 right-4 text-6xl opacity-5 turuncu group-hover:opacity-10 transition"></i>
            <div class="flex items-center justify-center space-x-2 mb-4">
                <i class="fas fa-dollar-sign text-green-400 text-2xl"></i>
                <h3 class="text-2xl font-bold">Portfolio Value</h3>
            </div>
            <p class="text-5xl font-bold turuncu mb-2 portfolio-value">$0.00</p>
            <p class="text-green-400 mb-6 text-lg"><i class="fas fa-arrow-up"></i> 28%</p>
            <div class="w-full bg-gray-700 rounded-full h-2 mb-6">
                <div class="bg-green-500 h-2 rounded-full" style="width: 72%;"></div>
            </div>
            <div class="grid grid-cols-2 gap-4 text-sm text-gray-400 mb-6">
                <div>Invested: <span class="text-white">$850.00</span></div>
                <div>Earned: <span class="text-white">$253.30</span></div>
            </div>
            <a href="kayit.php" class="inline-block glass px-8 py-3 rounded-full hover:bg-orange-500 hover:text-black transition w-full">
                <i class="fas fa-plus"></i> Invest More
            </a>
        </div>
    </div>
</section>
<section class="max-w-6xl mx-auto p-4 md:p-10 relative">
    <h3 class="text-2xl md:text-3xl font-bold turuncu text-center mb-10" data-aos="fade-up"><?php echo dil('gemiler'); ?></h3>
    <div class="flex overflow-x-auto snap-x gap-6 pb-6" style="scrollbar-width: thin; scrollbar-color: #ff8c00 #0b132b;">
        <div class="glass p-6 rounded-2xl text-center min-w-[280px] snap-center hover:scale-105 transition duration-300 relative overflow-hidden" data-aos="fade-right">
            <i class="fas fa-ship fa-4x turuncu mb-4"></i>
            <h4 class="text-xl font-bold mb-2">Golden Horn</h4>
            <p class="text-gray-400 mb-1"><?php echo dil('kapasite'); ?>: 50.000 <?php echo dil('ton'); ?></p>
            <p class="text-gray-400 mb-1"><?php echo dil('kar'); ?>: %12</p>
            <p class="text-gray-400 mb-1"><?php echo dil('vade'); ?>: 7 <?php echo dil('days'); ?></p>
            <p class="text-gray-400 mb-4"><?php echo dil('durum'); ?>: <?php echo dil('aktif'); ?></p>
            <a href="kayit.php" class="inline-block turuncu-bg px-6 py-2 rounded-full hover:bg-orange-400 transition"><?php echo dil('yatirim_yap'); ?></a>
        </div>
        <div class="glass p-6 rounded-2xl text-center min-w-[280px] snap-center hover:scale-105 transition duration-300 relative overflow-hidden" data-aos="fade-up" data-aos-delay="200">
            <i class="fas fa-ship fa-4x turuncu mb-4"></i>
            <h4 class="text-xl font-bold mb-2">Blue Homeland</h4>
            <p class="text-gray-400 mb-1"><?php echo dil('kapasite'); ?>: 75.000 <?php echo dil('ton'); ?></p>
            <p class="text-gray-400 mb-1"><?php echo dil('kar'); ?>: %15</p>
            <p class="text-gray-400 mb-1"><?php echo dil('vade'); ?>: 10 <?php echo dil('days'); ?></p>
            <p class="text-gray-400 mb-4"><?php echo dil('durum'); ?>: <?php echo dil('aktif'); ?></p>
            <a href="kayit.php" class="inline-block turuncu-bg px-6 py-2 rounded-full hover:bg-orange-400 transition"><?php echo dil('yatirim_yap'); ?></a>
        </div>
        <div class="glass p-6 rounded-2xl text-center min-w-[280px] snap-center hover:scale-105 transition duration-300 relative overflow-hidden" data-aos="fade-left" data-aos-delay="400">
            <i class="fas fa-ship fa-4x turuncu mb-4"></i>
            <h4 class="text-xl font-bold mb-2">Black Sea Star</h4>
            <p class="text-gray-400 mb-1"><?php echo dil('kapasite'); ?>: 100.000 <?php echo dil('ton'); ?></p>
            <p class="text-gray-400 mb-1"><?php echo dil('kar'); ?>: %18</p>
            <p class="text-gray-400 mb-1"><?php echo dil('vade'); ?>: 14 <?php echo dil('days'); ?></p>
            <p class="text-gray-400 mb-4"><?php echo dil('durum'); ?>: <?php echo dil('aktif'); ?></p>
            <a href="kayit.php" class="inline-block turuncu-bg px-6 py-2 rounded-full hover:bg-orange-400 transition"><?php echo dil('yatirim_yap'); ?></a>
        </div>
        <div class="glass p-6 rounded-2xl text-center min-w-[280px] snap-center hover:scale-105 transition duration-300 relative overflow-hidden" data-aos="fade-right" data-aos-delay="600">
            <i class="fas fa-ship fa-4x turuncu mb-4"></i>
            <h4 class="text-xl font-bold mb-2">Aegean Pearl</h4>
            <p class="text-gray-400 mb-1"><?php echo dil('kapasite'); ?>: 120.000 <?php echo dil('ton'); ?></p>
            <p class="text-gray-400 mb-1"><?php echo dil('kar'); ?>: %20</p>
            <p class="text-gray-400 mb-1"><?php echo dil('vade'); ?>: 18 <?php echo dil('days'); ?></p>
            <p class="text-gray-400 mb-4"><?php echo dil('durum'); ?>: <?php echo dil('aktif'); ?></p>
            <a href="kayit.php" class="inline-block turuncu-bg px-6 py-2 rounded-full hover:bg-orange-400 transition"><?php echo dil('yatirim_yap'); ?></a>
        </div>
        <div class="glass p-6 rounded-2xl text-center min-w-[280px] snap-center hover:scale-105 transition duration-300 relative overflow-hidden" data-aos="fade-left" data-aos-delay="800">
            <i class="fas fa-ship fa-4x turuncu mb-4"></i>
            <h4 class="text-xl font-bold mb-2">Mediterranean Storm</h4>
            <p class="text-gray-400 mb-1"><?php echo dil('kapasite'); ?>: 150.000 <?php echo dil('ton'); ?></p>
            <p class="text-gray-400 mb-1"><?php echo dil('kar'); ?>: %22</p>
            <p class="text-gray-400 mb-1"><?php echo dil('vade'); ?>: 25 <?php echo dil('days'); ?></p>
            <p class="text-gray-400 mb-4"><?php echo dil('durum'); ?>: <?php echo dil('aktif'); ?></p>
            <a href="kayit.php" class="inline-block turuncu-bg px-6 py-2 rounded-full hover:bg-orange-400 transition"><?php echo dil('yatirim_yap'); ?></a>
        </div>
    </div>
</section>
<div class="fixed bottom-0 left-0 w-full h-48 pointer-events-none z-0 overflow-hidden">
    <div class="ship-bg-1 absolute">
        <i class="fas fa-ship text-6xl turuncu opacity-10"></i>
        <div class="crypto-icons-bg absolute -top-6 left-1/2 transform -translate-x-1/2 flex space-x-1">
            <i class="fab fa-bitcoin text-yellow-400 text-lg crypto-float-bg" style="animation-delay: 0s;"></i>
        </div>
    </div>
    <div class="ship-bg-2 absolute">
        <i class="fas fa-ship text-4xl turuncu opacity-8"></i>
        <div class="crypto-icons-bg absolute -top-6 left-1/2 transform -translate-x-1/2 flex space-x-1">
            <i class="fab fa-ethereum text-blue-400 text-lg crypto-float-bg" style="animation-delay: 0.5s;"></i>
        </div>
    </div>
    <div class="ship-bg-3 absolute">
        <i class="fas fa-ship text-5xl turuncu opacity-12"></i>
        <div class="crypto-icons-bg absolute -top-6 left-1/2 transform -translate-x-1/2 flex space-x-1">
            <i class="fas fa-dollar-sign text-green-400 text-lg crypto-float-bg" style="animation-delay: 1s;"></i>
        </div>
    </div>
</div>
<style>
    .ship-bg-1 { animation: sail1 14s linear infinite; }
    @keyframes sail1 { 0% { transform: translateX(-150px) translateY(0); } 50% { transform: translateX(100vw) translateY(-15px); } 100% { transform: translateX(-150px) translateY(0); } }
    .ship-bg-2 { animation: sail2 18s linear infinite; animation-delay: 3s; }
    @keyframes sail2 { 0% { transform: translateX(100vw) translateY(0); } 50% { transform: translateX(-150px) translateY(-10px); } 100% { transform: translateX(100vw) translateY(0); } }
    .ship-bg-3 { animation: sail3 12s linear infinite; animation-delay: 6s; }
    @keyframes sail3 { 0% { transform: translateX(-200px) translateY(0); } 50% { transform: translateX(100vw) translateY(-20px); } 100% { transform: translateX(-200px) translateY(0); } }
    .crypto-float-bg { animation: floatUpBg 2s ease-in-out infinite; }
    @keyframes floatUpBg { 0% { transform: translateY(0); opacity: 0.5; } 100% { transform: translateY(-30px); opacity: 0; } }
</style>

<section class="relative w-full h-32 overflow-hidden my-10" data-aos="fade-up">
    <div class="absolute inset-0 flex items-center justify-around">
        <div class="route-ship"><i class="fas fa-ship text-2xl turuncu"></i><i class="fab fa-bitcoin text-yellow-400 text-xs crypto-float-route"></i></div>
        <div class="route-ship" style="animation-delay: 2s;"><i class="fas fa-ship text-2xl turuncu"></i><i class="fab fa-ethereum text-blue-400 text-xs crypto-float-route"></i></div>
        <div class="route-ship" style="animation-delay: 4s;"><i class="fas fa-ship text-2xl turuncu"></i><i class="fas fa-dollar-sign text-green-400 text-xs crypto-float-route"></i></div>
    </div>
</section>
<style>
    .route-ship { animation: routeMove 6s linear infinite; }
    @keyframes routeMove { 0% { transform: translateX(-100px); } 100% { transform: translateX(100px); } }
    .crypto-float-route { animation: floatUpRoute 1.5s ease-in-out infinite; }
    @keyframes floatUpRoute { 0% { transform: translateY(0); opacity: 1; } 100% { transform: translateY(-20px); opacity: 0; } }
</style>

<section class="glass max-w-xs mx-auto p-4 rounded-2xl text-center relative overflow-hidden my-6" data-aos="fade-up">
    <i class="fas fa-ship absolute -top-2 -right-2 text-3xl opacity-10 turuncu"></i>
    <i class="fas fa-anchor absolute -bottom-2 -left-2 text-3xl opacity-10 turuncu"></i>
    <div class="flex items-center justify-center space-x-2">
        <i class="fas fa-ship text-turuncu text-lg animate-pulse"></i>
        <p class="text-2xl font-bold turuncu" id="sayac">+0</p>
        <i class="fas fa-ship text-turuncu text-lg animate-pulse"></i>
    </div>
    <p class="text-gray-400 text-xs mt-1"><?php echo dil('aktif_yatirimci'); ?></p>
</section>
<div id="notification" class="fixed bottom-4 right-4 glass p-4 rounded-xl z-50 hidden max-w-xs" data-aos="fade-left">
    <div class="flex items-start space-x-3">
        <div class="w-10 h-10 rounded-full bg-orange-500 flex items-center justify-center">
            <i class="fas fa-user text-white"></i>
        </div>
        <div>
            <p class="text-sm font-bold turuncu" id="notifName">John D.</p>
            <p class="text-xs text-gray-400" id="notifText">Just invested $500 in Golden Horn.</p>
            <p class="text-xs text-gray-500 mt-1" id="notifTime">2 minutes ago</p>
        </div>
    </div>
</div>
<script>
let stat1 = document.getElementById('stat1');
let stat2 = document.getElementById('stat2');
let stat3 = document.getElementById('stat3');
if (stat1) {
    let hedef1 = 1700;
    let mevcut1 = 0;
    let artis1 = Math.ceil(hedef1 / 100);
    let i1 = setInterval(() => {
        mevcut1 += artis1;
        if (mevcut1 >= hedef1) { mevcut1 = hedef1; clearInterval(i1); }
        stat1.innerText = mevcut1 + '+';
    }, 20);

    let hedef2 = 11.5;
    let mevcut2 = 0;
    let artis2 = hedef2 / 100;
    let i2 = setInterval(() => {
        mevcut2 += artis2;
        if (mevcut2 >= hedef2) { mevcut2 = hedef2; clearInterval(i2); }
        stat2.innerText = '$' + mevcut2.toFixed(1) + 'M';
    }, 20);

    let hedef3 = 27;
    let mevcut3 = 0;
    let artis3 = Math.ceil(hedef3 / 100);
    let i3 = setInterval(() => {
        mevcut3 += artis3;
        if (mevcut3 >= hedef3) { mevcut3 = hedef3; clearInterval(i3); }
        stat3.innerText = '%' + mevcut3;
    }, 20);
}

let sayac = document.getElementById('sayac');
if (sayac) {
    let hedefS = 1700;
    let mevcutS = 0;
    let artisS = Math.ceil(hedefS / 100);
    let iS = setInterval(() => {
        mevcutS += artisS;
        if (mevcutS >= hedefS) { mevcutS = hedefS; clearInterval(iS); }
        sayac.innerText = '+' + mevcutS;
    }, 20);
}

let portfolio = document.querySelector('.portfolio-value');
if (portfolio) {
    let hedefP = 1103.30;
    let mevcutP = 0;
    let artisP = hedefP / 100;
    let iP = setInterval(() => {
        mevcutP += artisP;
        if (mevcutP >= hedefP) { mevcutP = hedefP; clearInterval(iP); }
        portfolio.innerText = '$' + mevcutP.toFixed(2);
    }, 20);
}

const notif = document.getElementById('notification');
const notifName = document.getElementById('notifName');
const notifText = document.getElementById('notifText');
const notifTime = document.getElementById('notifTime');

const yorumlar = [
    { isim: 'John D.', metin: 'Just invested $500 in Golden Horn.', zaman: '2 minutes ago' },
    { isim: 'Sarah M.', metin: 'Earned $120 profit this month.', zaman: '5 minutes ago' },
    { isim: 'Michael K.', metin: 'Invested $1,200 in Blue Homeland.', zaman: '8 minutes ago' },
    { isim: 'Emma W.', metin: 'Withdrew $300 successfully.', zaman: '12 minutes ago' },
    { isim: 'David L.', metin: 'Joined with $750 investment.', zaman: '15 minutes ago' },
    { isim: 'Lisa R.', metin: 'Earned $85 profit this week.', zaman: '18 minutes ago' },
    { isim: 'James P.', metin: 'Invested $2,000 in Black Sea Star.', zaman: '22 minutes ago' },
    { isim: 'Anna S.', metin: 'Received monthly profit share.', zaman: '25 minutes ago' },
];

let index = 0;
function goster() {
    if (!notif) return;
    const y = yorumlar[index];
    notifName.innerText = y.isim;
    notifText.innerText = y.metin;
    notifTime.innerText = y.zaman;
    notif.classList.remove('hidden');
    setTimeout(() => {
        notif.classList.add('hidden');
    }, 5000);
    index = (index + 1) % yorumlar.length;
}
setInterval(goster, 15000);
setTimeout(goster, 3000);
</script>
<style>
    #notification {
        transition: all 0.5s ease-in-out;
        box-shadow: 0 4px 20px rgba(255, 140, 0, 0.3);
    }
    #notification.hidden {
        opacity: 0;
        transform: translateX(100%);
        pointer-events: none;
    }
    .float { animation: float 4s ease-in-out infinite; }
    @keyframes float { 0% { transform: translateY(0px); } 50% { transform: translateY(-20px); } 100% { transform: translateY(0px); } }
    .pulse { animation: pulse 2s infinite; }
    @keyframes pulse { 0% { opacity: 0.6; } 50% { opacity: 1; } 100% { opacity: 0.6; } }
</style>

<section class="max-w-6xl mx-auto p-4 md:p-10 relative">
    <h3 class="text-2xl md:text-3xl font-bold turuncu text-center mb-10" data-aos="fade-up"><?php echo dil('tikla_yatir_takip'); ?></h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-8">
        <div class="glass p-8 rounded-2xl text-center" data-aos="fade-right">
            <div class="w-16 h-16 rounded-full bg-orange-500 flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-search text-2xl text-black"></i>
            </div>
            <h4 class="text-xl font-bold mb-2"><?php echo dil('kesfet'); ?></h4>
            <p class="text-gray-400 text-sm"><?php echo dil('kesfet_desc'); ?></p>
        </div>
        <div class="glass p-8 rounded-2xl text-center" data-aos="fade-up" data-aos-delay="200">
            <div class="w-16 h-16 rounded-full bg-orange-500 flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-coins text-2xl text-black"></i>
            </div>
            <h4 class="text-xl font-bold mb-2"><?php echo dil('yatir'); ?></h4>
            <p class="text-gray-400 text-sm"><?php echo dil('yatir_desc'); ?></p>
        </div>
        <div class="glass p-8 rounded-2xl text-center" data-aos="fade-left" data-aos-delay="400">
            <div class="w-16 h-16 rounded-full bg-orange-500 flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-chart-line text-2xl text-black"></i>
            </div>
            <h4 class="text-xl font-bold mb-2"><?php echo dil('takip_et'); ?></h4>
            <p class="text-gray-400 text-sm"><?php echo dil('takip_et_desc'); ?></p>
        </div>
    </div>
</section>
<section class="max-w-6xl mx-auto p-4 md:p-10 relative">
    <h3 class="text-2xl md:text-3xl font-bold turuncu text-center mb-10" data-aos="fade-up"><?php echo dil('uzman_gorusleri'); ?></h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-8">
        <div class="glass p-6 rounded-2xl" data-aos="fade-right">
            <p class="text-gray-300 text-sm italic mb-4">"<?php echo dil('uzman_yorum1'); ?>"</p>
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-orange-500 flex items-center justify-center mr-3"><i class="fas fa-user text-black"></i></div>
                <div><p class="font-bold text-sm">Dr. Michael R.</p><p class="text-gray-500 text-xs"><?php echo dil('deniz_ticareti_uzmani'); ?></p></div>
            </div>
        </div>
        <div class="glass p-6 rounded-2xl" data-aos="fade-up" data-aos-delay="200">
            <p class="text-gray-300 text-sm italic mb-4">"<?php echo dil('uzman_yorum2'); ?>"</p>
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-orange-500 flex items-center justify-center mr-3"><i class="fas fa-user text-black"></i></div>
                <div><p class="font-bold text-sm">Prof. Sarah L.</p><p class="text-gray-500 text-xs"><?php echo dil('fintech_arastirmacisi'); ?></p></div>
            </div>
        </div>
        <div class="glass p-6 rounded-2xl" data-aos="fade-left" data-aos-delay="400">
            <p class="text-gray-300 text-sm italic mb-4">"<?php echo dil('uzman_yorum3'); ?>"</p>
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-orange-500 flex items-center justify-center mr-3"><i class="fas fa-user text-black"></i></div>
                <div><p class="font-bold text-sm">David K.</p><p class="text-gray-500 text-xs"><?php echo dil('kripto_analisti'); ?></p></div>
            </div>
        </div>
    </div>
</section>
<section class="max-w-6xl mx-auto p-4 md:p-10 relative">
    <h3 class="text-2xl md:text-3xl font-bold turuncu text-center mb-10" data-aos="fade-up"><?php echo dil('kullanici_yorumlari'); ?></h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-8 mb-10">
        <div class="glass p-6 rounded-2xl" data-aos="fade-right">
            <div class="flex items-center mb-3"><i class="fas fa-star text-yellow-400"></i><i class="fas fa-star text-yellow-400"></i><i class="fas fa-star text-yellow-400"></i><i class="fas fa-star text-yellow-400"></i><i class="fas fa-star text-yellow-400"></i></div>
            <p class="text-gray-300 text-sm mb-4">"<?php echo dil('kullanici_yorum1'); ?>"</p>
            <p class="text-gray-500 text-xs">- K*** A***</p>
        </div>
        <div class="glass p-6 rounded-2xl" data-aos="fade-up" data-aos-delay="200">
            <div class="flex items-center mb-3"><i class="fas fa-star text-yellow-400"></i><i class="fas fa-star text-yellow-400"></i><i class="fas fa-star text-yellow-400"></i><i class="fas fa-star text-yellow-400"></i><i class="fas fa-star text-yellow-400"></i></div>
            <p class="text-gray-300 text-sm mb-4">"<?php echo dil('kullanici_yorum2'); ?>"</p>
            <p class="text-gray-500 text-xs">- S*** M***</p>
        </div>
        <div class="glass p-6 rounded-2xl" data-aos="fade-left" data-aos-delay="400">
            <div class="flex items-center mb-3"><i class="fas fa-star text-yellow-400"></i><i class="fas fa-star text-yellow-400"></i><i class="fas fa-star text-yellow-400"></i><i class="fas fa-star text-yellow-400"></i><i class="fas fa-star text-yellow-400"></i></div>
            <p class="text-gray-300 text-sm mb-4">"<?php echo dil('kullanici_yorum3'); ?>"</p>
            <p class="text-gray-500 text-xs">- J*** D***</p>
        </div>
    </div>
    <div class="flex justify-center items-center space-x-8" data-aos="fade-up">
        <i class="fas fa-award text-4xl turuncu"></i>
        <i class="fas fa-certificate text-4xl turuncu"></i>
        <i class="fas fa-shield-alt text-4xl turuncu"></i>
        <i class="fas fa-lock text-4xl turuncu"></i>
    </div>
</section>
<?php include 'inc/footer.php'; ?>
