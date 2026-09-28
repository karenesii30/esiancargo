  <select id="dilSec" class="bg-gray-800 text-white text-xs px-2 py-1 rounded hover:bg-gray-700 transition" onchange="dilDegistir(this.value)">
    <option value="tr">TR</option>
    <option value="en">EN</option>
</select>  
</select><?php require_once __DIR__ . '/fonksiyonlar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <title>ESIANCARGO</title>
    <link rel="icon" href="data:,">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <style>
        :root {
            --bg-color: #0b132b;
            --text-color: #e0e1dd;
            --card-bg: rgba(255,255,255,0.05);
            --card-border: rgba(255,255,255,0.1);
        }
        .light-mode {
            --bg-color: #f0f4f8;
            --text-color: #1a202c;
            --card-bg: rgba(0,0,0,0.05);
            --card-border: rgba(0,0,0,0.1);
        }
        body {
            background: var(--bg-color);
            color: var(--text-color);
            transition: background 0.3s, color 0.3s;
            overflow-x: hidden;
        }
        .glass {
            background: var(--card-bg);
            backdrop-filter: blur(12px);
            border: 1px solid var(--card-border);
        }
        .turuncu { color: #ff8c00; text-shadow: 0 0 5px #ff8c00; }
        .turuncu-border { border: 1px solid #ff8c00; box-shadow: 0 0 5px #ff8c00; }
        .turuncu-bg { background: #ff8c00; color: #0b132b; }
        @keyframes float { 0% { transform: translateY(0px); } 50% { transform: translateY(-20px); } 100% { transform: translateY(0px); } }
        .float { animation: float 4s ease-in-out infinite; }
        @keyframes pulse { 0% { opacity: 0.6; } 50% { opacity: 1; } 100% { opacity: 0.6; } }
        .pulse { animation: pulse 2s infinite; }
        .hero-bg { background: radial-gradient(circle at 50% 50%, rgba(255,140,0,0.1), transparent 70%); }
        .ship-silhouette { position: absolute; bottom: 0; left: 0; width: 100%; height: 120px; background: linear-gradient(to top, #0b132b, transparent); }
        .ship-silhouette::before { content: ''; position: absolute; bottom: 20px; left: 10%; width: 80%; height: 40px; background: #ff8c00; opacity: 0.08; border-radius: 50% 50% 0 0; }
        .anchor-icon { position: absolute; opacity: 0.04; font-size: 200px; color: #ff8c00; }
        .dil-dropdown { position: relative; display: inline-block; }
        .dil-icerik { display: none; position: absolute; right: 0; top: 100%; background: #1c2541; min-width: 80px; box-shadow: 0 8px 16px rgba(0,0,0,0.4); z-index: 100; border-radius: 8px; overflow: hidden; }
        .dil-icerik a { color: #e0e1dd; padding: 10px 16px; text-decoration: none; display: block; text-align: center; transition: background 0.2s; }
        .dil-icerik a:hover { background: #ff8c00; color: #0b132b; }
        .dil-dropdown:hover .dil-icerik { display: block; animation: fadeIn 0.3s; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(-5px); } to { opacity: 1; transform: translateY(0); } }
        .menu-toggle { cursor: pointer; z-index: 1001; position: relative; }
        .menu-toggle .bar { display: block; width: 28px; height: 3px; background: #ff8c00; margin: 5px 0; transition: 0.4s; border-radius: 3px; }
        .menu-toggle.active .bar:nth-child(1) { transform: rotate(-45deg) translate(-5px, 6px); }
        .menu-toggle.active .bar:nth-child(2) { opacity: 0; }
        .menu-toggle.active .bar:nth-child(3) { transform: rotate(45deg) translate(-5px, -6px); }
        .fullscreen-menu { position: fixed; top: 0; left: 0; width: 100%; height: 100vh; background: rgba(11, 19, 43, 0.98); backdrop-filter: blur(20px); z-index: 1000; display: flex; flex-direction: column; justify-content: flex-start; align-items: center; opacity: 0; visibility: hidden; transition: opacity 0.5s ease, visibility 0.5s ease; overflow-y: auto; padding-top: 60px; padding-bottom: 30px; padding-left: 20px; padding-right: 20px; }
        .fullscreen-menu.open { opacity: 1; visibility: visible; }
        .fullscreen-menu a { display: block; font-size: 1.1rem; padding: 8px 0; color: #e0e1dd; text-decoration: none; transform: translateY(30px); opacity: 0; transition: all 0.5s ease; }
        .fullscreen-menu.open a { transform: translateY(0); opacity: 1; }
        .fullscreen-menu.open a:nth-child(1) { transition-delay: 0.1s; }
        .fullscreen-menu.open a:nth-child(2) { transition-delay: 0.2s; }
        .fullscreen-menu.open a:nth-child(3) { transition-delay: 0.3s; }
        .fullscreen-menu.open a:nth-child(4) { transition-delay: 0.4s; }
        .fullscreen-menu.open a:nth-child(5) { transition-delay: 0.5s; }
        .fullscreen-menu.open a:nth-child(6) { transition-delay: 0.6s; }
        .fullscreen-menu.open a:nth-child(7) { transition-delay: 0.7s; }
        .fullscreen-menu.open a:nth-child(8) { transition-delay: 0.8s; }
        .fullscreen-menu.open a:nth-child(9) { transition-delay: 0.9s; }
        .fullscreen-menu a:hover { color: #ff8c00; transform: scale(1.05); }
        .fullscreen-menu a i { margin-right: 15px; }
        .menu-close { position: absolute; top: 20px; right: 20px; font-size: 2rem; color: #ff8c00; cursor: pointer; transition: transform 0.3s; }
        .menu-close:hover { transform: rotate(90deg); }
        .light-mode .glass { background: rgba(0,0,0,0.05); border: 1px solid rgba(0,0,0,0.1); }
        .light-mode .turuncu { color: #e67e22; text-shadow: none; }
        .light-mode .text-gray-400 { color: #4a5568; }
        .light-mode .text-gray-300 { color: #2d3748; }
        .light-mode .bg-gray-800 { background: #e2e8f0; color: #1a202c; }
        .light-mode .bg-gray-700 { background: #cbd5e0; }
        .light-mode .ship-silhouette { background: linear-gradient(to top, #f0f4f8, transparent); }
        .light-mode .ship-silhouette::before { background: #e67e22; opacity: 0.1; }
        .light-mode .fullscreen-menu { background: rgba(240, 244, 248, 0.98); }
        .light-mode .fullscreen-menu a { color: #1a202c; }
        .light-mode .dil-icerik { background: #e2e8f0; }
        .light-mode .dil-icerik a { color: #1a202c; }
        .light-mode .bg-gray-800 { background: #e2e8f0; color: #1a202c; }
    </style>
</head>
<body class="min-h-screen flex flex-col">
<script>
if (localStorage.getItem('theme') === 'light') {
    document.body.classList.add('light-mode');
} else if (localStorage.getItem('theme') === 'auto') {
    const saat = new Date().getHours();
    if (saat >= 6 && saat < 18) {
        document.body.classList.add('light-mode');
    }
}
</script>
<nav class="glass fixed w-full top-0 z-50 px-4 md:px-6 py-3 md:py-4 flex justify-between items-center">
    <h1 class="text-2xl font-bold turuncu"><a href="index.php"><i class="fas fa-ship"></i> ESIANCARGO</a></h1>
    <div class="relative flex items-center space-x-4">
        <div class="dil-dropdown">
            <button class="bg-gray-800 text-white text-xs px-2 py-1 rounded hover:bg-gray-700 transition">
                <i class="fas fa-globe"></i> <?php echo dil('dil'); ?>
            </button>
                <a href="?lang=tr">TR</a>
                <a href="?lang=en">EN</a>
</div><div class="dil-icerik">
                <a href="?lang=tr">TR</a>
                <a href="?lang=en">EN</a>
            </div>
        </div>
        <div class="menu-toggle" onclick="menuToggle()">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </div>
</nav>

<div id="fullscreenMenu" class="fullscreen-menu">
    <div class="menu-close" onclick="menuToggle()"><i class="fas fa-times"></i></div>
    <a href="index.php"><i class="fas fa-home"></i> <?php echo dil('anasayfa'); ?></a>
    <a href="how-it-works.php"><i class="fas fa-info-circle"></i> <?php echo dil('how_it_works'); ?></a>
    <a href="calculator.php"><i class="fas fa-calculator"></i> <?php echo dil('calculator'); ?></a>
    <a href="dashboard.php"><i class="fas fa-user"></i> <?php echo dil('panel'); ?></a>
    <a href="sss.php"><i class="fas fa-question-circle"></i> <?php echo dil('sss'); ?></a>
    <a href="contact.php"><i class="fas fa-envelope"></i> <?php echo dil('iletisim'); ?></a>
    <?php if (isset($_SESSION['kullanici_id'])): ?>
    <a href="logout.php"><i class="fas fa-sign-out-alt"></i> <?php echo dil('cikis'); ?></a>
    <?php else: ?>
    <a href="login.php"><i class="fas fa-sign-in-alt"></i> <?php echo dil('giris'); ?></a>
    <a href="kayit.php"><i class="fas fa-user-plus"></i> <?php echo dil('kayit'); ?></a>
    <?php endif; ?>
</div>
<script>
function menuToggle() {
    document.querySelector('.menu-toggle').classList.toggle('active');
    document.getElementById('fullscreenMenu').classList.toggle('open');
}
function temaDegistir(tema) {
    if (tema === 'light') {
        document.body.classList.add('light-mode');
        localStorage.setItem('theme', 'light');
    } else if (tema === 'dark') {
        document.body.classList.remove('light-mode');
        localStorage.setItem('theme', 'dark');
    } else if (tema === 'auto') {
        const saat = new Date().getHours();
        if (saat >= 6 && saat < 18) {
            document.body.classList.add('light-mode');
            localStorage.setItem('theme', 'light');
        } else {
            document.body.classList.remove('light-mode');
            localStorage.setItem('theme', 'dark');
        }
    }
}
</script>
