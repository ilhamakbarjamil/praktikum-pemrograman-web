<?php
// File: App/TokoParfum/Parfum.php

namespace App\TokoParfum;

class Parfum {
    // Access Modifier:
    // public: bisa diakses dari mana saja
    public $nama;
    
    // protected: hanya bisa diakses dari class ini dan turunannya
    protected $merek;
    
    // private: hanya bisa diakses dari class ini saja
    private $harga;
    private $stok;
    
    // Magic Method 1: __construct()
    // Dijalankan otomatis saat object dibuat
    public function __construct($nama, $merek, $harga, $stok) {
        $this->nama = $nama;
        $this->merek = $merek;
        $this->harga = $harga;
        $this->stok = $stok;
        echo "Parfum '{$this->nama}' berhasil ditambahkan ke inventory.\n";
    }
    
    // Method 1: Menampilkan info dasar parfum
    public function getInfo() {
        return "Parfum: {$this->nama}\nMerek: {$this->merek}\nHarga: Rp " . number_format($this->harga, 0, ',', '.') . "\nStok: {$this->stok} botol\n";
    }
    
    // Method 2: Mengambil harga (getter untuk private property)
    public function getHarga() {
        return $this->harga;
    }
    
    // Method 3: Update stok
    public function updateStok($jumlah) {
        $this->stok += $jumlah;
        echo "Stok {$this->nama} diupdate. Stok sekarang: {$this->stok} botol\n";
    }
    
    // Method 4: Cek ketersediaan
    public function cekKetersediaan() {
        if ($this->stok > 0) {
            return "Tersedia";
        } else {
            return "Stok Habis";
        }
    }
    
    // Magic Method 2: __toString()
    // Dijalankan saat object diperlakukan sebagai string
    public function __toString() {
        return "{$this->nama} - {$this->merek} (Rp " . number_format($this->harga, 0, ',', '.') . ")";
    }
    
    // Magic Method 3: __destruct()
    // Dijalankan saat object dihapus/script selesai
    public function __destruct() {
        echo "Object parfum '{$this->nama}' telah dihapus dari memori.\n";
    }
}
?>