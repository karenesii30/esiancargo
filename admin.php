<?php
require_once 'inc/fonksiyonlar.php';
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
$db = db();
$yatirimlar = tumYatirimlar();
$toplam = toplamHavuz();
$kullanicilar = $db->query("SELECT * FROM kullanicilar ORDER BY tarih DESC")->fetchAll(PDO::FETCH_ASSOC);
$tickets = $db->query("SELECT t.*, k.ad FROM tickets t JOIN kullanicilar k ON t.kullanici_id = k.id ORDER BY t.tarih DESC")->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['puan_ekle'])) {
    $stmt = $db->prepare("UPDATE kullanicilar SET puan = puan + ? WHERE id = ?");
    $stmt->execute([$_POST['puan'], $_POST['kullanici_id']]);
    logYaz("Puan eklendi: " . $_POST['kullanici_id']);
    header('Location: admin.php');
    exit;
}

if (isset($_GET['onayla'])) {
    $stmt = $db->prepare("UPDATE yatirimlar SET durum = 'onaylandi' WHERE id = ?");
    $stmt->execute([$_GET['onayla']]);
    logYaz("Yatırım onaylandı: " . $_GET['onayla']);
    header('Location: admin.php');
    exit;
}
if (isset($_GET['reddet'])) {
    $stmt = $db->prepare("UPDATE yatirimlar SET durum = 'reddedildi' WHERE id = ?");
    $stmt->execute([$_GET['reddet']]);
    logYaz("Yatırım reddedildi: " . $_GET['reddet']);
    header('Location: admin.php');
    exit;
}
if (isset($_GET['sil'])) {
    $stmt = $db->prepare("DELETE FROM yatirimlar WHERE id = ?");
    $stmt->execute([$_GET['sil']]);
    logYaz("Yatırım silindi: " . $_GET['sil']);
    header('Location: admin.php');
    exit;
}
if (isset($_GET['banla'])) {
    $stmt = $db->prepare("UPDATE kullanicilar SET ban = 1 WHERE id = ?");
    $stmt->execute([$_GET['banla']]);
    logYaz("Kullanıcı banlandı: " . $_GET['banla']);
    header('Location: admin.php');
    exit;
}
if (isset($_GET['ban_kaldir'])) {
    $stmt = $db->prepare("UPDATE kullanicilar SET ban = 0 WHERE id = ?");
    $stmt->execute([$_GET['ban_kaldir']]);
    logYaz("Kullanıcı banı kaldırıldı: " . $_GET['ban_kaldir']);
    header('Location: admin.php');
    exit;
}
if (isset($_GET['kullanici_sil'])) {
    $stmt = $db->prepare("DELETE FROM kullanicilar WHERE id = ?");
    $stmt->execute([$_GET['kullanici_sil']]);
    logYaz("Kullanıcı silindi: " . $_GET['kullanici_sil']);
    header('Location: admin.php');
    exit;
}
if (isset($_GET['ticket_yanitla'])) {
    $stmt = $db->prepare("UPDATE tickets SET durum = 'yanitlandi' WHERE id = ?");
    $stmt->execute([$_GET['ticket_yanitla']]);
    logYaz("Ticket yanıtlandı: " . $_GET['ticket_yanitla']);
    header('Location: admin.php');
    exit;
}
if (isset($_GET['yedekle'])) {
    $yedek = $db->query("SELECT * FROM kullanicilar")->fetchAll(PDO::FETCH_ASSOC);
    file_put_contents('yedek_kullanicilar_' . date('Ymd_His') . '.json', json_encode($yedek, JSON_PRETTY_PRINT));
    $yedek = $db->query("SELECT * FROM yatirimlar")->fetchAll(PDO::FETCH_ASSOC);
    file_put_contents('yedek_yatirimlar_' . date('Ymd_His') . '.json', json_encode($yedek, JSON_PRETTY_PRINT));
    logYaz('Yedek alındı.');
    header('Location: admin.php');
    exit;
}
include 'inc/header.php';
?>
<div class="min-h-screen flex flex-col justify-center items-center px-4 pt-20 w-full overflow-hidden relative overflow-hidden">
    <i class="fas fa-ship absolute top-20 left-10 text-8xl opacity-5 turuncu"></i>
    <i class="fas fa-anchor absolute bottom-20 right-10 text-8xl opacity-5 turuncu"></i>
    <h2 class="text-4xl turuncu mb-8 relative z-10" data-aos="fade-down"><i class="fas fa-crown"></i> Admin Panel</h2>
    <div class="glass p-4 md:p-8 rounded-2xl w-full max-w-6xl overflow-x-auto relative z-10" data-aos="zoom-in">
        <p class="text-gray-300 mb-4">Toplam Havuz: <span class="turuncu"><?php echo number_format($toplam, 4); ?></span></p>
        <a href="?yedekle=1" class="inline-block mb-4 glass px-6 py-2 rounded-full hover:bg-orange-500 hover:text-black transition"><i class="fas fa-download"></i> Yedekle</a>
        <h3 class="text-2xl turuncu mb-4">Kullanıcılar</h3>
        <table class="w-full text-left text-sm mb-8">
            <thead>
                <tr class="border-b border-gray-700">
                    <th class="py-3">ID</th>
                    <th class="py-3">Ad</th>
                    <th class="py-3">E-posta</th>
                    <th class="py-3">Rol</th>
                    <th class="py-3">Puan</th>
                    <th class="py-3">Rozet</th>
                    <th class="py-3">Ban</th>
                    <th class="py-3">Tarih</th>
                    <th class="py-3">İşlem</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($kullanicilar as $k): ?>
                <tr class="border-b border-gray-800">
                    <td class="py-3"><?php echo $k['id']; ?></td>
                    <td class="py-3"><?php echo htmlspecialchars($k['ad']); ?></td>
                    <td class="py-3"><?php echo htmlspecialchars($k['email']); ?></td>
                    <td class="py-3"><?php echo htmlspecialchars($k['rol'] ?? 'user'); ?></td>
                    <td class="py-3"><?php echo $k['puan'] ?? 0; ?></td>
                    <td class="py-3"><?php echo $k['rozet'] ?? '-'; ?></td>
                    <td class="py-3"><?php echo $k['ban'] ? 'Evet' : 'Hayır'; ?></td>
                    <td class="py-3 text-gray-400"><?php echo $k['tarih']; ?></td>
                    <td class="py-3">
                        <?php if ($k['ban']): ?>
                        <a href="?ban_kaldir=<?php echo $k['id']; ?>" class="text-green-400">Ban Kaldır</a> |
                        <?php else: ?>
                        <a href="?banla=<?php echo $k['id']; ?>" class="text-yellow-400">Banla</a> |
                        <?php endif; ?>
                        <a href="?kullanici_sil=<?php echo $k['id']; ?>" class="text-red-400" onclick="return confirm('Emin misin?')">Sil</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h3 class="text-2xl turuncu mb-4">Puan Ekle</h3>
        <form method="POST" class="glass p-4 rounded-xl mb-8">
            <input type="text" name="kullanici_id" placeholder="Kullanıcı ID" class="w-full p-2 rounded bg-gray-800 text-white mb-2">
            <input type="number" name="puan" placeholder="Puan" class="w-full p-2 rounded bg-gray-800 text-white mb-2">
            <button type="submit" name="puan_ekle" class="turuncu-bg px-4 py-2 rounded-full">Ekle</button>
        </form>

        <h3 class="text-2xl turuncu mb-4">Yatırımlar</h3>
        <table class="w-full text-left text-sm mb-8">
            <thead>
                <tr class="border-b border-gray-700">
                    <th class="py-3">Kullanıcı</th>
                    <th class="py-3">Kripto</th>
                    <th class="py-3">Miktar</th>
                    <th class="py-3">Durum</th>
                    <th class="py-3">Tarih</th>
                    <th class="py-3">İşlem</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($yatirimlar)): ?>
                <tr><td colspan="6" class="py-3 text-gray-500">Henüz yatırım yok.</td></tr>
                <?php else: foreach ($yatirimlar as $y): ?>
                <tr class="border-b border-gray-800">
                    <td class="py-3"><?php echo htmlspecialchars($y['ad']); ?></td>
                    <td class="py-3"><?php echo htmlspecialchars($y['kripto']); ?></td>
                    <td class="py-3"><?php echo htmlspecialchars($y['miktar']); ?></td>
                    <td class="py-3"><?php echo htmlspecialchars($y['durum']); ?></td>
                    <td class="py-3 text-gray-400"><?php echo htmlspecialchars($y['tarih']); ?></td>
                    <td class="py-3">
                        <a href="?onayla=<?php echo $y['id']; ?>" class="text-green-400">Onayla</a> |
                        <a href="?reddet=<?php echo $y['id']; ?>" class="text-yellow-400">Reddet</a> |
                        <a href="?sil=<?php echo $y['id']; ?>" class="text-red-400">Sil</a>
                    </td>
                </tr>
                <?php endforeach; endif; ?>
            </tbody>
        </table>
        <h3 class="text-2xl turuncu mb-4">Destek Talepleri</h3>
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="border-b border-gray-700">
                    <th class="py-3">Kullanıcı</th>
                    <th class="py-3"><?php echo dil('ticket_subject'); ?></th>
                    <th class="py-3"><?php echo dil('ticket_message'); ?></th>
                    <th class="py-3"><?php echo dil('ticket_status'); ?></th>
                    <th class="py-3">Tarih</th>
                    <th class="py-3">İşlem</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($tickets)): ?>
                <tr><td colspan="6" class="py-3 text-gray-500">Henüz ticket yok.</td></tr>
                <?php else: foreach ($tickets as $t): ?>
                <tr class="border-b border-gray-800">
                    <td class="py-3"><?php echo htmlspecialchars($t['ad']); ?></td>
                    <td class="py-3"><?php echo htmlspecialchars($t['konu']); ?></td>
                    <td class="py-3"><?php echo htmlspecialchars($t['mesaj']); ?></td>
                    <td class="py-3"><?php echo htmlspecialchars($t['durum']); ?></td>
                    <td class="py-3 text-gray-400"><?php echo htmlspecialchars($t['tarih']); ?></td>
                    <td class="py-3">
                        <?php if ($t['durum'] == 'beklemede'): ?>
                        <a href="?ticket_yanitla=<?php echo $t['id']; ?>" class="text-green-400">Yanıtla</a>
                        <?php else: ?>
                        <span class="text-gray-500">Yanıtlandı</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include 'inc/footer.php'; ?>
