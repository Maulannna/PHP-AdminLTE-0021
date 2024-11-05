<?php
class UserPelanggan {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function getAllplg() {
        $stmt = $this->db->prepare("SELECT * FROM pelanggan");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // public function getplgById($id_plg) {
    //     $stmt = $this->db->prepare("SELECT * FROM pelanggan WHERE id_plg= : id_plg");
    //     $stmt->bindParam(':id_plg', $id_plg);
    //     $stmt->execute();
    //     return $stmt->fetch(PDO::FETCH_ASSOC);
    // }
    public function getplgById($id_plg) {
        $stmt = $this->db->prepare("SELECT * FROM pelanggan WHERE id_plg = :id_plg");
        $stmt->bindParam(':id_plg', $id_plg);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function tambahplg($id_plg, $nama_plg, $alamat) {
        $stmt = $this->db->prepare("INSERT INTO pelanggan (id_plg, nama_plg, alamat) VALUES (:id_plg, :nama_plg, :alamat)");
        $stmt->bindParam(':id_plg', $id_plg);
        $stmt->bindParam(':nama_plg', $nama_plg);
        $stmt->bindParam(':alamat', $alamat);
        $stmt->execute();
    }

    public function updateplg($id_plg, $nama_plg, $alamat) {
        $stmt = $this->db->prepare("UPDATE pelanggan SET nama_plg = :nama_plg, alamat = :alamat WHERE id_plg = :id_plg");
        $stmt->bindParam(':nama_plg', $nama_plg);
        $stmt->bindParam(':alamat', $alamat);
        $stmt->bindParam(':id_plg', $id_plg);
        $stmt->execute();
    }

    public function deleteplg($id_plg) {
        $stmt = $this->db->prepare("DELETE FROM pelanggan WHERE id_plg = :id_plg");
        $stmt->bindParam(':id_plg', $id_plg);
        $stmt->execute();
    }

    
}
?>
