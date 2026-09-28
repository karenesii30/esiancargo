<?php
session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'domain' => '',
    'secure' => false,
    'httponly' => true,
    'samesite' => 'Strict'
]);
session_start();

function db() {
    $db = new PDO('sqlite:esiancargo.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}
function kullaniciVarMi($email) {
    $db = db();
    $stmt = $db->prepare("SELECT id FROM kullanicilar WHERE email = ?");
    $stmt->execute([$email]);
    return $stmt->fetch() ? true : false;
}

function kullaniciEkle($ad, $email, $sifre) {
    $db = db();
    $stmt = $db->prepare("INSERT INTO kullanicilar (ad, email, sifre) VALUES (?, ?, ?)");
    $stmt->execute([$ad, $email, password_hash($sifre, PASSWORD_DEFAULT)]);
}

function kullaniciBul($email) {
    $db = db();
    $stmt = $db->prepare("SELECT * FROM kullanicilar WHERE email = ?");
    $stmt->execute([$email]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function yatirimEkle($kullanici_id, $kripto, $miktar) {
    $db = db();
    $stmt = $db->prepare("INSERT INTO yatirimlar (kullanici_id, kripto, miktar) VALUES (?, ?, ?)");
    $stmt->execute([$kullanici_id, $kripto, $miktar]);
}

function kullaniciYatirimlari($kullanici_id) {
    $db = db();
    $stmt = $db->prepare("SELECT * FROM yatirimlar WHERE kullanici_id = ? ORDER BY tarih DESC");
    $stmt->execute([$kullanici_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function tumYatirimlar() {
    $db = db();
    $stmt = $db->query("SELECT y.*, k.ad FROM yatirimlar y JOIN kullanicilar k ON y.kullanici_id = k.id ORDER BY y.tarih DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function toplamHavuz() {
    $db = db();
    $stmt = $db->query("SELECT SUM(miktar) as toplam FROM yatirimlar WHERE durum = 'onaylandi'");
    return $stmt->fetch(PDO::FETCH_ASSOC)['toplam'] ?? 0;
}
function logYaz($mesaj) {
    $db = db();
    $stmt = $db->prepare("INSERT INTO loglar (mesaj) VALUES (?)");
    $stmt->execute([$mesaj]);
}

function csrfToken() {
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf'];
}

function csrfDogrula($token) {
    return isset($_SESSION['csrf']) && hash_equals($_SESSION['csrf'], $token);
}
function rateLimit($ip, $limit = 5, $sure = 60) {
    $dosya = 'rate_limit.json';
    $veri = file_exists($dosya) ? json_decode(file_get_contents($dosya), true) : [];
    $simdi = time();
    if (!isset($veri[$ip])) $veri[$ip] = [];
    $veri[$ip] = array_filter($veri[$ip], function($t) use ($simdi, $sure) {
        return $t > $simdi - $sure;
    });
    if (count($veri[$ip]) >= $limit) {
        return false;
    }
    $veri[$ip][] = $simdi;
    file_put_contents($dosya, json_encode($veri));
    return true;
}

function sifrele($veri, $anahtar = 'esiancargo_gizli_anahtar') {
    $iv = openssl_random_pseudo_bytes(16);
    $sifreli = openssl_encrypt($veri, 'AES-256-CBC', $anahtar, 0, $iv);
    return base64_encode($iv . $sifreli);
}

function sifreCoz($veri, $anahtar = 'esiancargo_gizli_anahtar') {
    $veri = base64_decode($veri);
    $iv = substr($veri, 0, 16);
    $sifreli = substr($veri, 16);
    return openssl_decrypt($sifreli, 'AES-256-CBC', $anahtar, 0, $iv);
}

function ekstraKar($seviye) {
    if ($seviye === 'Gold') return 5;
    if ($seviye === 'Silver') return 2;
    return 0;
}
function dil($anahtar) {
    $diller = [
        'tr' => [
            'slogan' => 'Küresel deniz taşımacılığına yatırım yapın, kâr ortaklığıyla kazanın.',
            'yatirim_yap' => 'Yatırım Yap',
            'anasayfa' => 'Ana Sayfa',
            'yatirim' => 'Yatırım',
            'panel' => 'Dashboard',
            'blog' => 'Blog',
            'sss' => 'SSS',
            'iletisim' => 'İletişim',
            'giris' => 'Giriş',
            'kayit' => 'Kayıt',
            'cikis' => 'Çıkış',
            'gemiler' => 'Yatırım Yapabileceğin Gemiler',
            'kapasite' => 'Kapasite',
            'kar' => 'Kâr',
            'vade' => 'Vade',
            'durum' => 'Durum',
            'aktif' => 'Aktif',
            'ton' => 'Ton',
            'ay' => 'Ay',
            'gercek_gemiler' => 'Gerçek Gemiler',
            'kripto_odeme' => 'Kripto ile Ödeme',
            'kar_ortakligi' => 'Kâr Ortaklığı',
            'neden' => 'Neden ESIANCARGO?',
            'sifreleme' => 'AES-256 Şifreleme',
            'sozlesme' => 'Yasal Ortaklık Sözleşmesi',
            'seffaf' => 'Şeffaf Kâr Dağıtımı',
            'aktif_yatirimci' => 'Aktif Yatırımcı',
            'haklar' => 'Tüm hakları saklıdır.',
            'gizlilik' => 'Gizlilik',
            'kullanim' => 'Kullanım Şartları',
            'cerez' => 'Çerez Politikası',
            'how_it_works' => 'Nasıl Çalışır?',
            'profile' => 'Profil',
            'upload_avatar' => 'Avatar Yükle',
            'name' => 'Ad',
            'email' => 'E-posta',
            'role' => 'Rol',
            'settings' => 'Ayarlar',
            'theme' => 'Tema',
            'language' => 'Dil',
            'notifications' => 'Bildirimler',
            'on' => 'Açık',
            'off' => 'Kapalı',
            'save' => 'Kaydet',
            'theme_dark' => 'Dark Mode',
            'theme_light' => 'Light Mode',
            'theme_auto' => 'Auto (Saate Göre)',
            'calculator' => 'Yatırım Hesaplayıcı',
            'investment_amount' => 'Yatırım Miktarı',
            'duration' => 'Vade',
            'profit_rate' => 'Kâr Oranı',
            'estimated_profit' => 'Tahmini Kâr',
            'leaderboard' => 'Liderlik Tablosu',
            'badges' => 'Rozetler',
            'missions' => 'Görevler',
            'points' => 'Puan',
            'level' => 'Seviye',
            'contact_telegram' => 'Telegram Destek',
            'contact_telegram_desc' => 'Anında destek için Telegram kanalımıza katılın.',
            'contact_telegram_btn' => 'Telegrama Katıl',
            'contact_ticket' => 'Ticket Desteği',
            'contact_ticket_desc' => 'Destek talebi oluşturun. Ekibimiz 24 saat içinde yanıt verecek.',
            'contact_ticket_btn' => 'Ticket Oluştur',
            'contact_form_title' => 'Destek Talebi Oluştur',
            'contact_subject' => 'Konu',
            'contact_message' => 'Mesajınızı yazın...',
            'contact_submit' => 'Ticket Gönder',
            'ticket_subject' => 'Konu',
            'ticket_message' => 'Mesaj',
            'ticket_submit' => 'Ticket Gönder',
            'ticket_status' => 'Durum',
            'ticket_pending' => 'Beklemede',
            'ticket_answered' => 'Yanıtlandı',
            'password' => 'Şifre',
            'soyad' => 'Soyad',
            'telefon' => 'Telefon Numarası',
            'dogum_tarihi' => 'Doğum Tarihi',
            'ulke' => 'Ülke',
            'ulke_sec' => 'Ülke Seçin',
            'sifre_tekrar' => 'Şifre Tekrar',
            'kayit_onay' => 'Kullanım Şartları ve Gizlilik Politikasını okudum, kabul ediyorum.',
            'kayit_desc' => 'Hesabını oluştur ve yatırıma başla.',
            'veya' => 'veya',
            'zaten_hesap' => 'Zaten hesabın var mı?',
            'neden_kayit' => 'Neden Kayıt Olmalısın?',
            'avantaj1' => 'Kolay Yatırım',
            'avantaj1_desc' => 'Kripto ile saniyeler içinde yatırım yap.',
            'avantaj2' => 'Aylık Kâr Payı',
            'avantaj2_desc' => 'Her ay düzenli kâr payı al.',
            'avantaj3' => 'Güvenli Altyapı',
            'avantaj3_desc' => 'AES-256 şifreleme ve yasal sözleşme.',
            'avantaj4' => 'Canlı Takip',
            'avantaj4_desc' => 'Panelinden gemini ve kazancını izle.',
            'guven_mesaji' => '1700+ yatırımcı bize güveniyor.',
            'terms_title' => 'Kullanım Şartları',
            'terms_text' => '1. Taraflar ve Kabul: Bu Kullanım Şartları, ESIANCARGO platformunu kullanan tüm gerçek ve tüzel kişiler için geçerlidir. Platforma kayıt olarak bu şartları okuduğunuzu, anladığınızı ve kabul ettiğinizi beyan edersiniz.
2. Hizmet Tanımı: ESIANCARGO, kullanıcıların kripto para birimleri aracılığıyla global deniz taşımacılığına yatırım yapmasını sağlayan bir platformdur. Platform, yatırım danışmanlığı hizmeti sunmaz.
3. Yatırım Riskleri: Tüm yatırımlar risk içerir. Geçmiş performans gelecek getirinin garantisi değildir. Kripto paralar yüksek volatiliteye sahiptir ve değer kaybedebilir.
4. KYC ve AML: Platforma kayıt olan tüm kullanıcılar, Kimlik Doğrulama (KYC) ve Kara Para Aklamayla Mücadele (AML) süreçlerine tabidir. Doğrulama tamamlanmadan yatırım işlemi gerçekleştirilemez.
5. Kâr Dağıtımı: Kâr payları, geminin operasyonel performansına ve yatırım miktarınıza göre aylık olarak dağıtılır. Kâr dağıtımı, bağımsız denetim raporlarına dayanır.
6. Hesap Güvenliği: Kullanıcılar, hesap bilgilerinin ve şifrelerinin güvenliğinden kendileri sorumludur. Şüpheli bir durumda derhal ESIANCARGOya bildirilmelidir.
7. Kötüye Kullanım: Platformda dolandırıcılık, manipülasyon veya yasadışı faaliyet tespit edilmesi durumunda hesabınız askıya alınır ve yasal süreç başlatılır.
8. Değişiklikler: ESIANCARGO, bu şartları önceden bildirimde bulunmaksızın değiştirme hakkını saklı tutar.',
            'privacy_title' => 'Gizlilik Politikası',
            'privacy_text' => '1. VERİ SORUMLUSU: ESIANCARGO, 6698 sayılı Kişisel Verilerin Korunması Kanunu (KVKK) kapsamında veri sorumlusu olarak hareket eder. Verileriniz, Avrupa Birliği Genel Veri Koruma Yönetmeliği (GDPR) ile uyumlu olarak işlenir.

2. TOPLANAN VERİLER: Ad, soyad, e-posta adresi, telefon numarası, doğum tarihi, ülke bilgisi, kimlik doğrulama belgeleri, yatırım geçmişi, IP adresi ve cihaz bilgileri toplanır.

3. İŞLEME AMAÇLARI: Verileriniz; hizmet sunumu, kimlik doğrulama (KYC/AML), yasal yükümlülüklerin yerine getirilmesi, müşteri desteği, dolandırıcılık önleme ve platform güvenliği amacıyla işlenir.

4. VERİ GÜVENLİĞİ: Tüm verileriniz AES-256 şifreleme yöntemiyle korunur. Verileriniz güvenli sunucularda saklanır, yetkisiz erişime karşı korunur ve düzenli olarak yedeklenir.

5. ÜÇÜNCÜ TARAFLARLA PAYLAŞIM: Verileriniz, yasal zorunluluklar haricinde üçüncü taraflarla paylaşılmaz. Denetim firmaları, ödeme sağlayıcıları ve yasal otoritelerle yalnızca hizmet sunumu ve yasal uyumluluk kapsamında paylaşılır.

6. HAKLARINIZ: KVKK kapsamında verilerinize erişme, düzeltme, silme, işlenmesine itiraz etme ve verilerinizin taşınmasını talep etme hakkınız vardır.

7. ÇEREZLER: Platform, oturum yönetimi ve analitik amacıyla çerezler kullanır. Çerez tercihlerinizi tarayıcı ayarlarınızdan yönetebilirsiniz.

8. SAKLAMA SÜRESİ: Verileriniz, yasal zorunluluklar çerçevesinde 5 yıl süreyle saklanır. Süre sonunda verileriniz güvenli bir şekilde imha edilir.

9. DEĞİŞİKLİKLER: ESIANCARGO, bu politikayı önceden bildirimde bulunmaksızın güncelleme hakkını saklı tutar.',
        ],
        'en' => [
            'slogan' => 'Invest in global shipping, earn through profit sharing.',
            'yatirim_yap' => 'Invest Now',
            'anasayfa' => 'Home',
            'yatirim' => 'Investment',
            'panel' => 'Dashboard',
            'blog' => 'Blog',
            'sss' => 'FAQ',
            'iletisim' => 'Contact',
            'giris' => 'Login',
            'kayit' => 'Register',
            'cikis' => 'Logout',
            'gemiler' => 'Ships You Can Invest In',
            'kapasite' => 'Capacity',
            'kar' => 'Profit',
            'vade' => 'Maturity',
            'durum' => 'Status',
            'aktif' => 'Active',
            'ton' => 'Tons',
            'ay' => 'Months',
            'gercek_gemiler' => 'Real Ships',
            'kripto_odeme' => 'Crypto Payment',
            'kar_ortakligi' => 'Profit Sharing',
            'neden' => 'Why ESIANCARGO?',
            'sifreleme' => 'AES-256 Encryption',
            'sozlesme' => 'Legal Partnership Agreement',
            'seffaf' => 'Transparent Profit Distribution',
            'aktif_yatirimci' => 'Active Investor',
            'haklar' => 'All rights reserved.',
            'gizlilik' => 'Privacy',
            'kullanim' => 'Terms of Use',
            'cerez' => 'Cookie Policy',
            'how_it_works' => 'How It Works',
            'profile' => 'Profile',
            'upload_avatar' => 'Upload Avatar',
            'name' => 'Name',
            'email' => 'Email',
            'role' => 'Role',
            'settings' => 'Settings',
            'theme' => 'Theme',
            'language' => 'Language',
            'notifications' => 'Notifications',
            'on' => 'On',
            'off' => 'Off',
            'save' => 'Save',
            'theme_dark' => 'Dark Mode',
            'theme_light' => 'Light Mode',
            'theme_auto' => 'Auto (By Time)',
            'calculator' => 'Investment Calculator',
            'investment_amount' => 'Investment Amount',
            'duration' => 'Duration',
            'profit_rate' => 'Profit Rate',
            'estimated_profit' => 'Estimated Profit',
            'leaderboard' => 'Leaderboard',
            'badges' => 'Badges',
            'missions' => 'Missions',
            'points' => 'Points',
            'level' => 'Level',
            'contact_telegram' => 'Telegram Support',
            'contact_telegram_desc' => 'Join our Telegram channel for instant support.',
            'contact_telegram_btn' => 'Join Telegram',
            'contact_ticket' => 'Ticket Support',
            'contact_ticket_desc' => 'Create a support ticket. Our team will respond within 24 hours.',
            'contact_ticket_btn' => 'Create Ticket',
            'contact_form_title' => 'Create Support Ticket',
            'contact_subject' => 'Subject',
            'contact_message' => 'Describe your issue...',
            'contact_submit' => 'Submit Ticket',
            'ticket_subject' => 'Subject',
            'ticket_message' => 'Message',
            'ticket_submit' => 'Submit Ticket',
            'ticket_status' => 'Status',
            'ticket_pending' => 'Pending',
            'ticket_answered' => 'Answered',
            'password' => 'Password',
            'soyad' => 'Last Name',
            'telefon' => 'Phone Number',
            'dogum_tarihi' => 'Date of Birth',
            'ulke' => 'Country',
            'ulke_sec' => 'Select Country',
            'sifre_tekrar' => 'Confirm Password',
            'kayit_onay' => 'I have read and accept the Terms of Use and Privacy Policy.',
            'kayit_desc' => 'Create your account and start investing.',
            'veya' => 'or',
            'zaten_hesap' => 'Already have an account?',
            'neden_kayit' => 'Why Register?',
            'avantaj1' => 'Easy Investment',
            'avantaj1_desc' => 'Invest with crypto in seconds.',
            'avantaj2' => 'Monthly Profit Share',
            'avantaj2_desc' => 'Receive regular monthly profit share.',
            'avantaj3' => 'Secure Infrastructure',
            'avantaj3_desc' => 'AES-256 encryption and legal agreement.',
            'avantaj4' => 'Live Tracking',
            'avantaj4_desc' => 'Track your ship and earnings from dashboard.',
            'guven_mesaji' => '1700+ investors trust us.',
            'terms_title' => 'Terms of Use',
            'terms_text' => '1. Parties and Acceptance: These Terms of Use apply to all individuals and legal entities using the ESIANCARGO platform. By registering, you acknowledge that you have read, understood, and accepted these terms.
2. Service Description: ESIANCARGO is a platform that enables users to invest in global maritime shipping via cryptocurrencies. The platform does not provide investment advisory services.
3. Investment Risks: All investments carry risk. Past performance is not a guarantee of future returns. Cryptocurrencies are highly volatile and may lose value.
4. KYC and AML: All users are subject to Know Your Customer (KYC) and Anti-Money Laundering (AML) procedures. No investment can be made without completed verification.
5. Profit Distribution: Profit shares are distributed monthly based on the ship operational performance and your investment amount. Distribution is based on independent audit reports.
6. Account Security: Users are responsible for the security of their account information and passwords. Any suspicious activity must be reported to ESIANCARGO immediately.
7. Misuse: In case of fraud, manipulation, or illegal activity, your account will be suspended and legal proceedings will be initiated.
8. Amendments: ESIANCARGO reserves the right to modify these terms without prior notice.',
            'privacy_title' => 'Privacy Policy',
            'privacy_text' => '1. DATA CONTROLLER: ESIANCARGO acts as the data controller under the cookie preferences in your Personal Data browser Protection Law (KVKK) No settings. 6698. Your data is processed in compliance with the European Union General Data Protection Regulation (GDPR).

2. DATA COLLECTED: Name, surname, email address, phone number, date of birth, country, identity verification documents, investment history, IP address, and device information are collected.

3. PROCESSING PURPOSES: Your data is processed for service provision, identity verification (KYC/AML), legal obligations, customer support, fraud prevention, and platform security.

4. DATA SECURITY: All your data is protected with AES-256 encryption. Your data is stored on secure servers, protected against unauthorized access, and regularly backed up.

5. THIRD-PARTY SHARING: Your data is not shared with third parties except for legal obligations. It is shared with audit firms, payment providers, and legal authorities only for service provision and legal compliance.

6. YOUR RIGHTS: Under KVKK, you have the right to access, correct, delete, object to the processing of your data, and request data portability.

7. COOKIES: The platform uses cookies for session management and analytics. You can manage.

8. RETENTION PERIOD: Your data is retained for 5 years in accordance with legal obligations. After this period, your data is securely destroyed.

9. AMENDMENTS: ESIANCARGO reserves the right to update this policy without prior notice.',
        ],
    ];
    $dil = $_GET['lang'] ?? 'en';
    return $diller[$dil][$anahtar] ?? $diller['en'][$anahtar] ?? $anahtar;
}
function tumUlkeler() {
    return [
        'TR' => 'Turkey', 'US' => 'United States', 'DE' => 'Germany', 'RU' => 'Russia', 'AE' => 'United Arab Emirates',
        'AF' => 'Afghanistan', 'AL' => 'Albania', 'DZ' => 'Algeria', 'AD' => 'Andorra', 'AO' => 'Angola',
        'AR' => 'Argentina', 'AM' => 'Armenia', 'AU' => 'Australia', 'AT' => 'Austria', 'AZ' => 'Azerbaijan',
        'BS' => 'Bahamas', 'BH' => 'Bahrain', 'BD' => 'Bangladesh', 'BB' => 'Barbados', 'BY' => 'Belarus',
        'BE' => 'Belgium', 'BZ' => 'Belize', 'BJ' => 'Benin', 'BT' => 'Bhutan', 'BO' => 'Bolivia',
        'BA' => 'Bosnia and Herzegovina', 'BW' => 'Botswana', 'BR' => 'Brazil', 'BN' => 'Brunei', 'BG' => 'Bulgaria',
        'BF' => 'Burkina Faso', 'BI' => 'Burundi', 'KH' => 'Cambodia', 'CM' => 'Cameroon', 'CA' => 'Canada',
        'CV' => 'Cape Verde', 'CF' => 'Central African Republic', 'TD' => 'Chad', 'CL' => 'Chile', 'CN' => 'China',
        'CO' => 'Colombia', 'KM' => 'Comoros', 'CG' => 'Congo', 'CD' => 'Congo (DRC)', 'CR' => 'Costa Rica',
        'CI' => 'Cote d Ivoire', 'HR' => 'Croatia', 'CU' => 'Cuba', 'CY' => 'Cyprus', 'CZ' => 'Czech Republic',
        'DK' => 'Denmark', 'DJ' => 'Djibouti', 'DM' => 'Dominica', 'DO' => 'Dominican Republic', 'EC' => 'Ecuador',
        'EG' => 'Egypt', 'SV' => 'El Salvador', 'GQ' => 'Equatorial Guinea', 'ER' => 'Eritrea', 'EE' => 'Estonia',
        'ET' => 'Ethiopia', 'FJ' => 'Fiji', 'FI' => 'Finland', 'FR' => 'France', 'GA' => 'Gabon',
        'GM' => 'Gambia', 'GE' => 'Georgia', 'GH' => 'Ghana', 'GR' => 'Greece', 'GD' => 'Grenada',
        'GT' => 'Guatemala', 'GN' => 'Guinea', 'GW' => 'Guinea-Bissau', 'GY' => 'Guyana', 'HT' => 'Haiti',
        'HN' => 'Honduras', 'HU' => 'Hungary', 'IS' => 'Iceland', 'IN' => 'India', 'ID' => 'Indonesia',
        'IR' => 'Iran', 'IQ' => 'Iraq', 'IE' => 'Ireland', 'IL' => 'Israel', 'IT' => 'Italy',
        'JM' => 'Jamaica', 'JP' => 'Japan', 'JO' => 'Jordan', 'KZ' => 'Kazakhstan', 'KE' => 'Kenya',
        'KI' => 'Kiribati', 'KW' => 'Kuwait', 'KG' => 'Kyrgyzstan', 'LA' => 'Laos', 'LV' => 'Latvia',
        'LB' => 'Lebanon', 'LS' => 'Lesotho', 'LR' => 'Liberia', 'LY' => 'Libya', 'LI' => 'Liechtenstein',
        'LT' => 'Lithuania', 'LU' => 'Luxembourg', 'MG' => 'Madagascar', 'MW' => 'Malawi', 'MY' => 'Malaysia',
        'MV' => 'Maldives', 'ML' => 'Mali', 'MT' => 'Malta', 'MH' => 'Marshall Islands', 'MR' => 'Mauritania',
        'MU' => 'Mauritius', 'MX' => 'Mexico', 'FM' => 'Micronesia', 'MD' => 'Moldova', 'MC' => 'Monaco',
        'MN' => 'Mongolia', 'ME' => 'Montenegro', 'MA' => 'Morocco', 'MZ' => 'Mozambique', 'MM' => 'Myanmar',
        'NA' => 'Namibia', 'NR' => 'Nauru', 'NP' => 'Nepal', 'NL' => 'Netherlands', 'NZ' => 'New Zealand',
        'NI' => 'Nicaragua', 'NE' => 'Niger', 'NG' => 'Nigeria', 'KP' => 'North Korea', 'MK' => 'North Macedonia',
        'NO' => 'Norway', 'OM' => 'Oman', 'PK' => 'Pakistan', 'PW' => 'Palau', 'PA' => 'Panama',
        'PG' => 'Papua New Guinea', 'PY' => 'Paraguay', 'PE' => 'Peru', 'PH' => 'Philippines', 'PL' => 'Poland',
        'PT' => 'Portugal', 'QA' => 'Qatar', 'RO' => 'Romania', 'RW' => 'Rwanda', 'KN' => 'Saint Kitts and Nevis',
        'LC' => 'Saint Lucia', 'VC' => 'Saint Vincent and the Grenadines', 'WS' => 'Samoa', 'SM' => 'San Marino',
        'ST' => 'Sao Tome and Principe', 'SA' => 'Saudi Arabia', 'SN' => 'Senegal', 'RS' => 'Serbia',
        'SC' => 'Seychelles', 'SL' => 'Sierra Leone', 'SG' => 'Singapore', 'SK' => 'Slovakia', 'SI' => 'Slovenia',
        'SB' => 'Solomon Islands', 'SO' => 'Somalia', 'ZA' => 'South Africa', 'KR' => 'South Korea',
        'SS' => 'South Sudan', 'ES' => 'Spain', 'LK' => 'Sri Lanka', 'SD' => 'Sudan', 'SR' => 'Suriname',
        'SE' => 'Sweden', 'CH' => 'Switzerland', 'SY' => 'Syria', 'TW' => 'Taiwan', 'TJ' => 'Tajikistan',
        'TZ' => 'Tanzania', 'TH' => 'Thailand', 'TL' => 'Timor-Leste', 'TG' => 'Togo', 'TO' => 'Tonga',
        'TT' => 'Trinidad and Tobago', 'TN' => 'Tunisia', 'TM' => 'Turkmenistan', 'TV' => 'Tuvalu',
        'UG' => 'Uganda', 'UA' => 'Ukraine', 'GB' => 'United Kingdom', 'UY' => 'Uruguay', 'UZ' => 'Uzbekistan',
        'VU' => 'Vanuatu', 'VA' => 'Vatican City', 'VE' => 'Venezuela', 'VN' => 'Vietnam', 'YE' => 'Yemen',
        'ZM' => 'Zambia', 'ZW' => 'Zimbabwe'
    ];
}
?>
