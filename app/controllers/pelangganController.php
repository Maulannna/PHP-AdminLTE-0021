<?php
require_once 'app/models/UserPelanggan.php';

class pelangganController {
    private $userModel;

    public function __construct($dbConnection) {
        $this->userModel = new UserPelanggan($dbConnection);
    }

    public function show($kd_barang) {
        $user = $this->userModel->getplgById($kd_barang);
        require_once 'app/views/pelanggan.php';
    }

     public function index() {
        $Pelanggan = $this->userModel->getAllplg(); // Mendapatkan data pengguna
        include 'app/views/pelanggan.php'; // Memuat view dengan data pengguna
    }
    
    public function tambah() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_plg = $_POST['id_plg'];
            $nama_plg = $_POST['nama_plg'];
            $alamat = $_POST['alamat'];
           
    
            $this->userModel->tambahplg($id_plg, $nama_plg, $alamat, );
            header('Location: index.php?page=pelanggan');
            exit();
        }
    
        require_once 'app/views/tambah_pelanggan.php';
    }

    public function edit($id_plg) {
        // Ambil data barang berdasarkan kd_barang dari model
        $Pelanggan = $this->userModel->getplgById($id_plg);
        if (!$Pelanggan) {
            echo "Barang tidak ditemukan.";
            return;
        }
    
        // Jika form di-submit, lakukan update data
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama_plg = $_POST['nama_plg'];
            $alamat = $_POST['alamat'];
            $this->userModel->updateplg($id_plg, $nama_plg, $alamat);
            header('Location: index.php?page=pelanggan');
            exit();
        }
    
        // Kirim data barang ke view
        require_once 'app/views/edit_pelanggan.php';
    }

    public function delete($id_plg) {
        $this->userModel->deleteplg($id_plg);
        header('Location: index.php?page=pelanggan');
        exit();
    }

    
}
?>
