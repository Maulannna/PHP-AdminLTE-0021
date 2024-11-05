<?php
require_once 'app/models/userTransaksi.php';

class transaksiController {
    private $userModel;

    public function __construct($dbConnection) {
        $this->userModel = new transaksiUser($dbConnection);
    }

    public function index() {
        $transaksi = $this->userModel->getAllTransaksi();
        require_once 'app/views/transaksi.php';
    }

    public function tambah() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_plg = $_POST['id_plg'];
            $kd_barang = $_POST['kd_barang'];
            $jumlah = $_POST['jumlah'];
            $total_harga = $_POST['total_harga'];

            try {
                $this->userModel->tambahTransaksi($id_plg, $kd_barang, $jumlah, $total_harga);
                header('Location: index.php?page=transaksi');
                exit();
            } catch (Exception $e) {
                echo "Terjadi kesalahan: " . $e->getMessage();
            }
        }

        require_once 'app/views/tambah_transaksi.php';
    }

    public function delete($id_transaksi) {
        $this->userModel->deleteTransaksi($id_transaksi);
        header('Location: index.php?page=transaksi');
        exit();
    }
}
?>