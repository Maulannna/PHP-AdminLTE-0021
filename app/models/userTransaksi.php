<?php
class transaksiUser {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function getAllTransaksi() {
        $stmt = $this->db->prepare("SELECT * FROM transaksi");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function tambahTransaksi($id_plg, $kd_barang, $jumlah, $total_harga) {
        try {
            
            $this->db->beginTransaction();

            // Insert data transaksi
            $stmt = $this->db->prepare("INSERT INTO transaksi (id_plg, kd_barang, jumlah, total_harga, tanggal) VALUES (:id_plg, :kd_barang, :jumlah, :total_harga, NOW())");
            $stmt->bindParam(':id_plg', $id_plg);
            $stmt->bindParam(':kd_barang', $kd_barang);
            $stmt->bindParam(':jumlah', $jumlah);
            $stmt->bindParam(':total_harga', $total_harga);
            $stmt->execute();

            // Kurangi stok barang
            $this->kurangiStok($kd_barang, $jumlah);
            $this->db->commit();
        } catch (Exception $e) {
            $this->db->rollBack();
            throw $e;
        }
    }

    public function kurangiStok($kd_barang, $jumlah) {
        $stmt = $this->db->prepare("UPDATE barang SET stok = stok - :jumlah WHERE kd_barang = :kd_barang");
        $stmt->bindParam(':jumlah', $jumlah);
        $stmt->bindParam(':kd_barang', $kd_barang);
        $stmt->execute();
    }

    public function deleteTransaksi($id_transaksi) {
        $stmt = $this->db->prepare("DELETE FROM transaksi WHERE id_transaksi = :id_transaksi");
        $stmt->bindParam(':id_transaksi', $id_transaksi);
        return $stmt->execute();
    }
}
?>