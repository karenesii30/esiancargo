<?php require_once 'fonksiyonlar.php'; ?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESIANCARGO</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <style>
        body { background: #0b132b; color: #e0e1dd; overflow-x: hidden; }
        .glass { background: rgba(255,255,255,0.05); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.1); }
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
    </style>
</head>
<body>
<nav class="glass fixed w-full top-0 z-50 px-6 py-4 flex justify-between items-center">
    <h1 class="text-2xl font-bold turuncu"><i class="fas fa-ship"></i> ESIANCARGO</h1>
    <div class="space-x-4 hidden md:flex text-sm">
        <a href="index.php" class="hover:text-orange-400 transition"><i class="fas fa-home"></i> Ana Sayfa</a>
        <a href="yatirim.php" class="hover:text-orange-400 transition"><i class="fas fa-coins"></i> Yatırım</a>
        <a href="panel.php" class="hover:text-orange-400 transition"><i class="fas fa-user"></i> Panel</a>
        <a href="blog.php" class="hover:text-orange-400 transition"><i class="fas fa-blog"></i> Blog</a>
        <a href="sss.php" class="hover:text-orange-400 transition"><i class="fas fa-question-circle"></i> SSS</a>
        <a href="iletisim.php" class="hover:text-orange-400 transition"><i class="fas fa-envelope"></i> İletişim</a>
        <?php if (isset($_SESSION['admin'])): ?>
        <a href="admin.php" class="hover:text-orange-400 transition"><i class="fas fa-crown"></i> Admin</a>
        <?php endif; ?>
        <?php if (isset($_SESSION['kullanici_id'])): ?>
        <a href="profil.php" class="hover:text-orange-400 transition"><i class="fas fa-user-circle"></i> Profil</a>
        <a href="cikis.php" class="hover:text-red-400 transition"><i class="fas fa-sign-out-alt"></i> Çıkış</a>
        <?php else: ?>
        <a href="giris.php" class="hover:text-orange-400 transition"><i class="fas fa-sign-in-alt"></i> Giriş</a>
        <a href="kayit.php" class="hover:text-orange-400 transition"><i class="fas fa-user-plus"></i> Kayıt</a>
        <?php endif; ?>
    </div>
    <i class="fas fa-bars text-2xl md:hidden turuncu"></i>
</nav>
