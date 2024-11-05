<?php
require_once 'app/models/UserBarang.php';

class barangController {
    private $userModel;

    public function __construct($dbConnection) {
        $this->userModel = new UserBarang($dbConnection);
    }

    public function show($kd_barang) {
        $user = $this->userModel->getBarangById($kd_barang);
        require_once 'app/views/barang.php';
    }

     public function index() {
        $Barang = $this->userModel->getAllBarang(); // Mendapatkan data pengguna
        include 'app/views/barang.php'; // Memuat view dengan data pengguna
    }
    
    public function tambah() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $kd_barang = $_POST['kd_barang'];
            $nama_barang = $_POST['nama_barang'];
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];
    
            $this->userModel->tambahBarang($kd_barang, $nama_barang, $harga, $stok);
            header('Location: index.php?page=barang');
            exit();
            
        }
    
        require_once 'app/views/tambah_barang.php';
    }


    public function edit($kd_barang) {
        // Ambil data barang berdasarkan kd_barang dari model
        $barang = $this->userModel->getBarangById($kd_barang);
        if (!$barang) {
            echo "Barang tidak ditemukan.";
            return;
        }
    
        // Jika form di-submit, lakukan update data
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama_barang = $_POST['nama_barang'];
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];
            $this->userModel->updateBarang($kd_barang, $nama_barang, $harga, $stok);
            header('Location: index.php?page=barang');
            exit();
        }
    
        // Kirim data barang ke view
        require_once 'app/views/edit_barang.php';
    }
    public function delete($kd_barang) {
        $this->userModel->deleteBarang($kd_barang);
        header('Location: index.php?page=barang');
        exit();

        
    
    }
    
}
?>
