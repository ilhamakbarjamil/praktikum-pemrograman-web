<?php
// File: App/TokoParfum/ParfumImport.php

namespace App\TokoParfum;

// Use untuk mengimpor parent class
use App\TokoParfum\Parfum;

// Inheritance: ParfumImport mewarisi dari Parfum
class ParfumImport extends Parfum {
    private $negaraAsal;
    private $beaCukai;
    
    // Override __construct() dengan parameter tambahan
    public function __construct($nama, $merek, $harga, $stok, $negaraAsal, $beaCukai) {
        // Memanggil constructor parent
        parent::__construct($nama, $merek, $harga, $stok);
        $this->negaraAsal = $negaraAsal;
        $this->beaCukai = $beaCukai;
    }
    
    // Method 5: Info lengkap parfum import
    public function getInfoLengkap() {
        // Menggunakan Object Operator (->) untuk mengakses method parent
        $info = $this->getInfo();
        $info .= "Negara Asal: {$this->negaraAsal}\n";
        $info .= "Bea Cukai: Rp " . number_format($this->beaCukai, 0, ',', '.') . "\n";
        $hargaTotal = $this->getHarga() + $this->beaCukai;
        $info .= "Harga Total (+ Bea Cukai): Rp " . number_format($hargaTotal, 0, ',', '.') . "\n";
        return $info;
    }
    
    // Method 6: Hitung harga jual final
    public function hitungHargaJual() {
        $hargaTotal = $this->getHarga() + $this->beaCukai;
        $markup = $hargaTotal * 0.3; // Markup 30%
        return $hargaTotal + $markup;
    }
    
    // Method untuk mengakses protected property dari parent
    public function getMerek() {
        // Bisa akses protected property karena ini child class
        return $this->merek;
    }
}
?>