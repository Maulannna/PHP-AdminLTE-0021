<?php
class UserBarang {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function getAllBarang() {
        $stmt = $this->db->prepare("SELECT * FROM barang");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBarangById($kd_barang) {
        $stmt = $this->db->prepare("SELECT * FROM barang WHERE kd_barang = :kd_barang");
        $stmt->bindParam(':kd_barang', $kd_barang);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function tambahBarang($kd_barang, $nama_barang, $harga, $stok) {
        $stmt = $this->db->prepare("INSERT INTO barang (kd_barang, nama_barang, harga, stok) VALUES (:kd_barang, :nama_barang, :harga, :stok)");
        $stmt->bindParam(':kd_barang', $kd_barang);
        $stmt->bindParam(':nama_barang', $nama_barang);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':stok', $stok);
        $stmt->execute();
    }

    public function updateBarang($kd_barang, $nama_barang, $harga, $stok) {
        $stmt = $this->db->prepare("UPDATE barang SET nama_barang = :nama_barang, harga = :harga, stok = :stok WHERE kd_barang = :kd_barang");
        $stmt->bindParam(':kd_barang', $kd_barang);
        $stmt->bindParam(':nama_barang', $nama_barang);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':stok', $stok);
        $stmt->execute();
    }

    public function deleteBarang($kd_barang) {
        $stmt = $this->db->prepare("DELETE FROM barang WHERE kd_barang = :kd_barang");
        $stmt->bindParam(':kd_barang', $kd_barang);
        return $stmt->execute();
    }
}
?>
