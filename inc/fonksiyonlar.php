<?php
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
    if (count($veri[$ip]) >= $limit) return false;
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
            'haklar' => 'Tüm hakları saklıdır.',
            'gizlilik' => 'Gizlilik',
            'kullanim' => 'Kullanım Şartları',
            'cerez' => 'Çerez Politikası',
            'profile' => 'Profil',
            'settings' => 'Ayarlar',
            'save' => 'Kaydet',
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
            'hizli_linkler' => 'Hızlı Linkler',
            'kullanici_yorumlari' => 'Kullanıcı Yorumları',
            'kullanici_yorum1' => 'İlk yatırımımı yaptım, aylık kâr payımı aldım. Gerçekten çalışıyor.',
            'kullanici_yorum2' => 'Kripto ile ödeme çok kolay. Panelden her şeyi takip edebiliyorum.',
            'kullanici_yorum3' => 'Güvenli, şeffaf ve kârlı. Herkese tavsiye ederim.',
            'uzman_gorusleri' => 'Uzman Görüşleri',
            'uzman_yorum1' => 'Deniz ticareti dünya ticaretinin %80 ini oluşturuyor.',
            'uzman_yorum2' => 'Tokenizasyon, gemi sahipliğini demokratikleştiriyor.',
            'uzman_yorum3' => 'Kripto ile ödeme ve kâr ortaklığı modeli şeffaf ve güvenli.',
            'deniz_ticareti_uzmani' => 'Deniz Ticareti Uzmanı',
            'fintech_arastirmacisi' => 'Fintech Araştırmacısı',
            'kripto_analisti' => 'Kripto Analisti',
            'tikla_yatir_takip' => 'Tıkla, Yatır, Takip Et',
            'kesfet' => '1. Keşfet',
            'kesfet_desc' => 'Gerçek gemileri incele.',
            'yatir' => '2. Yatır',
            'yatir_desc' => 'Kripto ile öde. Tıkla ve yatırımını yap.',
            'takip_et' => '3. Takip Et',
            'takip_et_desc' => 'Panelinden kârını canlı takip et.',
            'kullanici_yorumlari' => 'Kullanıcı Yorumları',
            'kullanici_yorum1' => 'İlk yatırımımı yaptım, aylık kâr payımı aldım. Gerçekten çalışıyor.',
            'kullanici_yorum2' => 'Kripto ile ödeme çok kolay. Panelden her şeyi takip edebiliyorum.',
            'kullanici_yorum3' => 'Güvenli, şeffaf ve kârlı. Herkese tavsiye ederim.',
            'uzman_gorusleri' => 'Uzman Görüşleri',
            'uzman_yorum1' => 'Deniz ticareti dünya ticaretinin %80 ini oluşturuyor. Bu platform, yatırımcılar için büyük bir fırsat.',
            'uzman_yorum2' => 'Tokenizasyon, gemi sahipliğini demokratikleştiriyor. Bu vizyon geleceğin finansı.',
            'uzman_yorum3' => 'Kripto ile ödeme ve kâr ortaklığı modeli, yatırımcı için şeffaf ve güvenli.',
            'deniz_ticareti_uzmani' => 'Deniz Ticareti Uzmanı',
            'fintech_arastirmacisi' => 'Fintech Araştırmacısı',
            'kripto_analisti' => 'Kripto Analisti',
            'tikla_yatir_takip' => 'Tıkla, Yatır, Takip Et',
            'kesfet' => '1. Keşfet',
            'kesfet_desc' => 'Gerçek gemileri incele. Her biri bağımsız denetimden geçmiş.',
            'yatir' => '2. Yatır',
            'yatir_desc' => 'Kripto ile öde. Karmaşık cüzdanlar yok. Tıkla ve yatırımını yap.',
            'takip_et' => '3. Takip Et',
            'takip_et_desc' => 'Panelinden kârını ve geminin performansını canlı takip et.',
            'terms_title' => 'Kullanım Şartları',
            'terms_text' => '1. Taraflar ve Kabul: Bu Kullanım Şartları, ESIANCARGO platformunu kullanan tüm gerçek ve tüzel kişiler için geçerlidir.
2. Hizmet Tanımı: ESIANCARGO, kullanıcıların kripto para birimleri aracılığıyla global deniz taşımacılığına yatırım yapmasını sağlayan bir platformdur.
3. Yatırım Riskleri: Tüm yatırımlar risk içerir. Geçmiş performans gelecek getirinin garantisi değildir.
4. KYC ve AML: Platforma kayıt olan tüm kullanıcılar, Kimlik Doğrulama (KYC) ve Kara Para Aklamayla Mücadele (AML) süreçlerine tabidir.
5. Kâr Dağıtımı: Kâr payları, geminin operasyonel performansına ve yatırım miktarınıza göre aylık olarak dağıtılır.
6. Hesap Güvenliği: Kullanıcılar, hesap bilgilerinin ve şifrelerinin güvenliğinden kendileri sorumludur.
7. Kötüye Kullanım: Platformda dolandırıcılık, manipülasyon veya yasadışı faaliyet tespit edilmesi durumunda hesabınız askıya alınır.
8. Değişiklikler: ESIANCARGO, bu şartları önceden bildirimde bulunmaksızın değiştirme hakkını saklı tutar.',
            'privacy_title' => 'Gizlilik Politikası',
            'privacy_text' => '1. VERİ SORUMLUSU: ESIANCARGO, 6698 sayılı KVKK kapsamında veri sorumlusu olarak hareket eder.
2. TOPLANAN VERİLER: Ad, soyad, e-posta, telefon, doğum tarihi, ülke, kimlik bilgileri ve yatırım geçmişi toplanır.
3. İŞLEME AMAÇLARI: Verileriniz; hizmet sunumu, KYC/AML, yasal yükümlülükler ve müşteri desteği amacıyla işlenir.
4. VERİ GÜVENLİĞİ: Tüm verileriniz AES-256 şifreleme yöntemiyle korunur.
5. ÜÇÜNCÜ TARAFLARLA PAYLAŞIM: Verileriniz, yasal zorunluluklar haricinde üçüncü taraflarla paylaşılmaz.
6. HAKLARINIZ: KVKK kapsamında verilerinize erişme, düzeltme, silme ve itiraz etme hakkınız vardır.
7. ÇEREZLER: Platform, oturum yönetimi ve analitik amacıyla çerezler kullanır.
8. SAKLAMA SÜRESİ: Verileriniz, yasal zorunluluklar çerçevesinde 5 yıl süreyle saklanır.
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
            'haklar' => 'All rights reserved.',
            'gizlilik' => 'Privacy',
            'kullanim' => 'Terms of Use',
            'cerez' => 'Cookie Policy',
            'profile' => 'Profile',
            'settings' => 'Settings',
            'save' => 'Save',
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
            'hizli_linkler' => 'Quick Links',
            'kullanici_yorumlari' => 'User Reviews',
            'kullanici_yorum1' => 'I made my first investment and received my monthly profit share.',
            'kullanici_yorum2' => 'Paying with crypto is so easy.',
            'kullanici_yorum3' => 'Secure, transparent and profitable.',
            'uzman_gorusleri' => 'Expert Opinions',
            'uzman_yorum1' => 'Maritime trade accounts for 80% of world trade.',
            'uzman_yorum2' => 'Tokenization democratizes ship ownership.',
            'uzman_yorum3' => 'Crypto payment and profit sharing model is transparent.',
            'deniz_ticareti_uzmani' => 'Maritime Trade Expert',
            'fintech_arastirmacisi' => 'Fintech Researcher',
            'kripto_analisti' => 'Crypto Analyst',
            'tikla_yatir_takip' => 'Click, Invest, Track',
            'kesfet' => '1. Discover',
            'kesfet_desc' => 'Browse real ships.',
            'yatir' => '2. Invest',
            'yatir_desc' => 'Pay with crypto. Click and invest.',
            'takip_et' => '3. Track',
            'takip_et_desc' => 'Track your profit live from dashboard.',
            'kullanici_yorumlari' => 'User Reviews',
            'kullanici_yorum1' => 'I made my first investment and received my monthly profit share. It really works.',
            'kullanici_yorum2' => 'Paying with crypto is so easy. I can track everything from the dashboard.',
            'kullanici_yorum3' => 'Secure, transparent and profitable. I recommend it to everyone.',
            'uzman_gorusleri' => 'Expert Opinions',
            'uzman_yorum1' => 'Maritime trade accounts for 80% of world trade. This platform is a great opportunity for investors.',
            'uzman_yorum2' => 'Tokenization democratizes ship ownership. This vision is the future of finance.',
            'uzman_yorum3' => 'Crypto payment and profit sharing model is transparent and secure for investors.',
            'deniz_ticareti_uzmani' => 'Maritime Trade Expert',
            'fintech_arastirmacisi' => 'Fintech Researcher',
            'kripto_analisti' => 'Crypto Analyst',
            'tikla_yatir_takip' => 'Click, Invest, Track',
            'kesfet' => '1. Discover',
            'kesfet_desc' => 'Browse real ships. Each independently audited.',
            'yatir' => '2. Invest',
            'yatir_desc' => 'Pay with crypto. No complex wallets. Click and invest.',
            'takip_et' => '3. Track',
            'takip_et_desc' => 'Track your profit and ship performance live from your dashboard.',
            'terms_title' => 'Terms of Use',
            'terms_text' => '1. Parties and Acceptance: These Terms of Use apply to all individuals and legal entities using the ESIANCARGO platform.
2. Service Description: ESIANCARGO is a platform that enables users to invest in global maritime shipping via cryptocurrencies.
3. Investment Risks: All investments carry risk. Past performance is not a guarantee of future returns.
4. KYC and AML: All users are subject to Know Your Customer (KYC) and Anti-Money Laundering (AML) procedures.
5. Profit Distribution: Profit shares are distributed monthly based on the ship operational performance and your investment amount.
6. Account Security: Users are responsible for the security of their account information and passwords.
7. Misuse: In case of fraud, manipulation, or illegal activity, your account will be suspended.
8. Amendments: ESIANCARGO reserves the right to modify these terms without prior notice.',
            'privacy_title' => 'Privacy Policy',
            'privacy_text' => '1. DATA CONTROLLER: ESIANCARGO acts as the data controller under KVKK No. 6698.
2. DATA COLLECTED: Name, surname, email, phone, date of birth, country, identity information, and investment history are collected.
3. PROCESSING PURPOSES: Your data is processed for service provision, KYC/AML, legal obligations, and customer support.
4. DATA SECURITY: All your data is protected with AES-256 encryption.
5. THIRD-PARTY SHARING: Your data is not shared with third parties except for legal obligations.
6. YOUR RIGHTS: Under KVKK, you have the right to access, correct, delete, and object to the processing of your data.
7. COOKIES: The platform uses cookies for session management and analytics.
8. RETENTION PERIOD: Your data is retained for 5 years in accordance with legal obligations.
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
