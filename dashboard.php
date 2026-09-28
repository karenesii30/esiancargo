<h3 class="text-2xl turuncu mb-4 mt-8"><?php echo dil('ticket_status'); ?></h3>
<table class="w-full text-left text-sm">
    <thead>
        <tr class="border-b border-gray-700">
            <th class="py-3"><?php echo dil('ticket_subject'); ?></th>
            <th class="py-3"><?php echo dil('ticket_status'); ?></th>
            <th class="py-3">Tarih</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stmt = $db->prepare("SELECT * FROM tickets WHERE kullanici_id = ? ORDER BY tarih DESC");
        $stmt->execute([$_SESSION['kullanici_id']]);
        $tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($tickets as $t): ?>
        <tr class="border-b border-gray-800">
            <td class="py-3"><?php echo htmlspecialchars($t['konu']); ?></td>
            <td class="py-3"><?php echo htmlspecialchars($t['durum']); ?></td>
            <td class="py-3 text-gray-400"><?php echo htmlspecialchars($t['tarih']); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
