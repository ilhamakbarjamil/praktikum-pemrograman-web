<?php
// File: App/TokoParfum/ParfumLokal.php

namespace App\TokoParfum;

// Use untuk mengimpor parent class
use App\TokoParfum\Parfum;

// Inheritance: ParfumLokal mewarisi dari Parfum
class ParfumLokal extends Parfum {
    private $sertifikatHalal;
    private $produsenLokal;
    
    // Override __construct() dengan parameter tambahan
    public function __construct($nama, $merek, $harga, $stok, $sertifikatHalal, $produsenLokal) {
        // Memanggil constructor parent
        parent::__construct($nama, $merek, $harga, $stok);
        $this->sertifikatHalal = $sertifikatHalal;
        $this->produsenLokal = $produsenLokal;
    }
    
    // Method 7: Info lengkap parfum lokal
    public function getInfoLengkap() {
        // Menggunakan Object Operator (->) untuk mengakses property dan method
        $info = $this->getInfo();
        $info .= "Produsen: {$this->produsenLokal}\n";
        $info .= "Sertifikat Halal: " . ($this->sertifikatHalal ? "Ya ✓" : "Tidak") . "\n";
        return $info;
    }
    
    // Method 8: Diskon produk lokal
    public function hitungDiskon($persenDiskon) {
        $harga = $this->getHarga();
        $diskon = $harga * ($persenDiskon / 100);
        $hargaSetelahDiskon = $harga - $diskon;
        return "Diskon {$persenDiskon}%: Rp " . number_format($diskon, 0, ',', '.') . 
               "\nHarga setelah diskon: Rp " . number_format($hargaSetelahDiskon, 0, ',', '.') . "\n";
    }
    
    // Method untuk cek sertifikat halal
    public function cekHalal() {
        if ($this->sertifikatHalal) {
            return "{$this->nama} memiliki sertifikat halal MUI.";
        } else {
            return "{$this->nama} belum memiliki sertifikat halal.";
        }
    }
}
?>