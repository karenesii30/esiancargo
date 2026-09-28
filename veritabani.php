<?php
$db = new PDO('sqlite:esiancargo.db');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$db->exec("CREATE TABLE IF NOT EXISTS kullanicilar (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    ad TEXT NOT NULL,
    email TEXT UNIQUE NOT NULL,
    sifre TEXT NOT NULL,
    rol TEXT DEFAULT 'kullanici',
    ban INTEGER DEFAULT 0,
    tarih DATETIME DEFAULT CURRENT_TIMESTAMP
)");

$db->exec("CREATE TABLE IF NOT EXISTS yatirimlar (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    kullanici_id INTEGER NOT NULL,
    kripto TEXT NOT NULL,
    miktar REAL NOT NULL,
    durum TEXT DEFAULT 'beklemede',
    tarih DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (kullanici_id) REFERENCES kullanicilar(id)
)");

$db->exec("CREATE TABLE IF NOT EXISTS karlar (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    kullanici_id INTEGER NOT NULL,
    miktar REAL NOT NULL,
    tarih DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (kullanici_id) REFERENCES kullanicilar(id)
)");

$db->exec("CREATE TABLE IF NOT EXISTS loglar (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    mesaj TEXT NOT NULL,
    tarih DATETIME DEFAULT CURRENT_TIMESTAMP
)");

$db->exec("CREATE TABLE IF NOT EXISTS mesajlar (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    ad TEXT NOT NULL,
    email TEXT NOT NULL,
    mesaj TEXT NOT NULL,
    okundu INTEGER DEFAULT 0,
    tarih DATETIME DEFAULT CURRENT_TIMESTAMP
)");

$db->exec("CREATE TABLE IF NOT EXISTS blog (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    baslik TEXT NOT NULL,
    icerik TEXT NOT NULL,
    tarih DATETIME DEFAULT CURRENT_TIMESTAMP
)");

$db->exec("CREATE TABLE IF NOT EXISTS sss (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    soru TEXT NOT NULL,
    cevap TEXT NOT NULL
)");

$db->exec("CREATE TABLE IF NOT EXISTS ayarlar (
    anahtar TEXT PRIMARY KEY,
    deger TEXT
)");

$db->exec("INSERT OR IGNORE INTO ayarlar (anahtar, deger) VALUES ('site_baslik', 'ESIANCARGO')");
$db->exec("INSERT OR IGNORE INTO ayarlar (anahtar, deger) VALUES ('site_aciklama', 'Gemi yatırımları ve kâr ortaklığı')");

echo "Veritabanı oluşturuldu.";
?>
