<?php include 'inc/header.php'; ?>
<section class="min-h-screen flex flex-col justify-center items-center px-4 pt-20 relative overflow-hidden">
    <i class="fas fa-calculator absolute top-20 left-10 text-8xl opacity-5 turuncu"></i>
    <i class="fas fa-chart-line absolute bottom-20 right-10 text-8xl opacity-5 turuncu"></i>
    <h2 class="text-4xl turuncu mb-8 relative z-10" data-aos="fade-down"><i class="fas fa-calculator"></i> <?php echo dil('calculator'); ?></h2>
    <div class="glass p-8 rounded-2xl w-full max-w-md relative z-10" data-aos="zoom-in">
        <label class="block mb-2 text-gray-300"><?php echo dil('investment_amount'); ?> ($)</label>
        <input type="number" id="miktar" value="1000" class="w-full p-3 rounded bg-gray-800 text-white mb-4" oninput="hesapla()">
        <label class="block mb-2 text-gray-300"><?php echo dil('duration'); ?> (<?php echo dil('month'); ?>)</label>
        <select id="vade" class="w-full p-3 rounded bg-gray-800 text-white mb-4" onchange="hesapla()">
            <option value="7">7 <?php echo dil('days'); ?></option>
            <option value="10">10 <?php echo dil('days'); ?></option>
            <option value="14">14 <?php echo dil('days'); ?></option>
            <option value="18">18 <?php echo dil('days'); ?></option>
    <option value="25">25 <?php echo dil('days'); ?></option>
            <option value="21">21 <?php echo dil('days'); ?></option>
        </select>
        <label class="block mb-2 text-gray-300"><?php echo dil('profit_rate'); ?> (%)</label>
        <input type="number" id="oran" value="15" class="w-full p-3 rounded bg-gray-800 text-white mb-6" oninput="hesapla()">
        <div class="glass p-4 rounded-xl text-center">
            <p class="text-gray-400 mb-1"><?php echo dil('estimated_profit'); ?></p>
            <p class="text-3xl font-bold turuncu" id="sonuc">$0.00</p>
        </div>
    </div>
</section>
<script>
function hesapla() {
    let miktar = parseFloat(document.getElementById('miktar').value) || 0;
    let vade = parseInt(document.getElementById('vade').value) || 1;
    let oran = parseFloat(document.getElementById('oran').value) || 0;
    let gunlukOran = oran / 365 / 100;
    let toplam = miktar;
    for (let i = 0; i < vade; i++) {
        toplam += toplam * gunlukOran;
    }
    let kar = toplam - miktar;
    document.getElementById('sonuc').innerText = '$' + kar.toFixed(2);
}
hesapla();
</script>
<?php include 'inc/footer.php'; ?>
