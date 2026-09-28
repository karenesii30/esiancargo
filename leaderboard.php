<?php
require_once 'inc/fonksiyonlar.php';
include 'inc/header.php';
$sahteKullanicilar = [
    ['ad' => 'J*** D***', 'puan' => 15400, 'kazanc' => 27, 'seviye' => 'Gold'],
    ['ad' => 'S*** M***', 'puan' => 12300, 'kazanc' => 24, 'seviye' => 'Gold'],
    ['ad' => 'M*** K***', 'puan' => 10800, 'kazanc' => 21, 'seviye' => 'Gold'],
    ['ad' => 'E*** W***', 'puan' => 9500, 'kazanc' => 19, 'seviye' => 'Silver'],
    ['ad' => 'D*** L***', 'puan' => 8700, 'kazanc' => 17, 'seviye' => 'Silver'],
    ['ad' => 'L*** R***', 'puan' => 7600, 'kazanc' => 15, 'seviye' => 'Silver'],
    ['ad' => 'J*** P***', 'puan' => 6500, 'kazanc' => 13, 'seviye' => 'Silver'],
    ['ad' => 'A*** S***', 'puan' => 5400, 'kazanc' => 11, 'seviye' => 'Bronze'],
    ['ad' => 'R*** T***', 'puan' => 4300, 'kazanc' => 9, 'seviye' => 'Bronze'],
    ['ad' => 'C*** B***', 'puan' => 3200, 'kazanc' => 7, 'seviye' => 'Bronze'],
];
?>
<div class="min-h-screen flex flex-col justify-start items-center px-4 pt-20 relative overflow-hidden">
    <i class="fas fa-trophy absolute top-20 left-10 text-8xl opacity-5 turuncu"></i>
    <i class="fas fa-medal absolute bottom-20 right-10 text-8xl opacity-5 turuncu"></i>
    <h2 class="text-4xl turuncu mb-8 relative z-10" data-aos="fade-down"><i class="fas fa-trophy"></i> <?php echo dil('leaderboard'); ?></h2>
    <div class="glass p-8 rounded-2xl w-full max-w-2xl relative z-10" data-aos="zoom-in">
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="border-b border-gray-700">
                    <th class="py-3">#</th>
                    <th class="py-3"><?php echo dil('name'); ?></th>
                    <th class="py-3"><?php echo dil('points'); ?></th>
                    <th class="py-3"><?php echo dil('profit'); ?> (%)</th>
                    <th class="py-3"><?php echo dil('level'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; foreach ($sahteKullanicilar as $k): ?>
                <tr class="border-b border-gray-800">
                    <td class="py-3"><?php echo $i++; ?></td>
                    <td class="py-3"><?php echo htmlspecialchars($k['ad']); ?></td>
                    <td class="py-3 turuncu"><?php echo $k['puan']; ?> <?php echo dil('points'); ?></td>
                    <td class="py-3"><span class="text-green-400 yuzde" data-yuzde="<?php echo $k['kazanc']; ?>">0%</span></td>
                    <td class="py-3">
                        <?php if ($k['seviye'] === 'Gold'): ?>
                            <span class="text-yellow-400"><i class="fas fa-crown"></i> Gold</span>
                        <?php elseif ($k['seviye'] === 'Silver'): ?>
                            <span class="text-gray-300"><i class="fas fa-medal"></i> Silver</span>
                        <?php else: ?>
                            <span class="text-orange-300"><i class="fas fa-star"></i> Bronze</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script>
document.querySelectorAll('.yuzde').forEach(el => {
    let hedef = parseInt(el.getAttribute('data-yuzde'));
    let mevcut = 0;
    let artis = Math.ceil(hedef / 50);
    let interval = setInterval(() => {
        mevcut += artis;
        if (mevcut >= hedef) {
            mevcut = hedef;
            clearInterval(interval);
        }
        el.innerText = mevcut + '%';
    }, 20);
});
</script>
<?php include 'inc/footer.php'; ?>
