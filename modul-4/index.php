<?php
// File: index.php

// Use untuk mengimpor class yang dibutuhkan
use App\TokoParfum\ParfumImport;
use App\TokoParfum\ParfumLokal;

// Autoload sederhana (atau bisa pakai composer autoload)
spl_autoload_register(function ($class) {
    $file = str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

echo "========================================\n";
echo "   SISTEM MANAJEMEN TOKO PARFUM\n";
echo "========================================\n\n";

// ===== PARFUM IMPORT =====
echo "===== PARFUM IMPORT =====\n";

// Membuat object ParfumImport - akan trigger __construct()
$parfumImport = new ParfumImport(
    "Dior Sauvage",
    "Dior",
    1200000,
    15,
    "Prancis",
    300000
);

echo "\n--- Info Lengkap Parfum Import ---\n";
// Menggunakan Object Operator (->) untuk mengakses method
echo $parfumImport->getInfoLengkap();

echo "\n--- Harga Jual Final ---\n";
$hargaJual = $parfumImport->hitungHargaJual();
echo "Harga Jual (dengan markup 30%): Rp " . number_format($hargaJual, 0, ',', '.') . "\n";

echo "\n--- Akses Property Public menggunakan -> ---\n";
// Menggunakan Object Operator untuk akses property public
echo "Nama Parfum: " . $parfumImport->nama . "\n";

echo "\n--- Ketersediaan ---\n";
echo "Status: " . $parfumImport->cekKetersediaan() . "\n";

echo "\n--- Magic Method __toString() ---\n";
// Memperlakukan object sebagai string - trigger __toString()
echo "Display: " . $parfumImport . "\n";

echo "\n\n";

// ===== PARFUM LOKAL =====
echo "===== PARFUM LOKAL =====\n";

// Membuat object ParfumLokal - akan trigger __construct()
$parfumLokal = new ParfumLokal(
    "Eskulin Misk",
    "Eskulin",
    250000,
    50,
    true,
    "PT. Eskulin Indonesia"
);

echo "\n--- Info Lengkap Parfum Lokal ---\n";
// Menggunakan Object Operator (->) untuk mengakses method
echo $parfumLokal->getInfoLengkap();

echo "\n--- Perhitungan Diskon ---\n";
echo $parfumLokal->hitungDiskon(15);

echo "\n--- Cek Sertifikat Halal ---\n";
echo $parfumLokal->cekHalal() . "\n";

echo "\n--- Update Stok ---\n";
$parfumLokal->updateStok(20);

echo "\n--- Magic Method __toString() ---\n";
echo "Display: " . $parfumLokal . "\n";

echo "\n========================================\n";
echo "Program selesai - object akan dihapus\n";
echo "========================================\n";

// Saat script selesai, __destruct() akan dipanggil otomatis
?>