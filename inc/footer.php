<footer class="glass p-8 mt-auto relative overflow-hidden">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-6xl mx-auto relative z-10">
        <div>
            <h4 class="text-lg font-bold turuncu mb-3"><i class="fas fa-ship"></i> ESIANCARGO</h4>
            <p class="text-gray-400 text-sm"><?php echo dil('slogan'); ?></p>
        </div>
        <div>
            <h4 class="text-lg font-bold turuncu mb-3"><?php echo dil('hizli_linkler'); ?></h4>
            <a href="calculator.php" class="block text-gray-400 text-sm hover:text-orange-400 mb-1"><?php echo dil('calculator'); ?></a>
            <a href="leaderboard.php" class="block text-gray-400 text-sm hover:text-orange-400 mb-1"><?php echo dil('leaderboard'); ?></a>
            <a href="badges.php" class="block text-gray-400 text-sm hover:text-orange-400 mb-1"><?php echo dil('badges'); ?></a>
            <a href="missions.php" class="block text-gray-400 text-sm hover:text-orange-400"><?php echo dil('missions'); ?></a>
        </div>
        <div>
            <h4 class="text-lg font-bold turuncu mb-3"><?php echo dil('iletisim'); ?></h4>
            <a href="contact.php" class="block text-gray-400 text-sm hover:text-orange-400 mb-1"><?php echo dil('iletisim'); ?></a>
            <a href="sss.php" class="block text-gray-400 text-sm hover:text-orange-400"><?php echo dil('sss'); ?></a>
        </div>
    </div>
    <div class="text-center mt-8 relative z-10">
        <i class="fas fa-anchor absolute left-4 bottom-2 text-4xl opacity-10 turuncu"></i>
        <i class="fas fa-ship absolute right-4 bottom-2 text-4xl opacity-10 turuncu"></i>
        <p class="text-gray-400 text-sm">&copy; <?php echo date("Y"); ?> ESIANCARGO. <?php echo dil('haklar'); ?></p>
    </div>
</footer>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init({ duration: 1000, once: true });</script>
</body>
</html>
