<?php
// index.php (file utama di root)

require_once 'config/database.php';

require 'app/controllers/homeController.php';

// $controller = new HomeController();
// $controller->index();




// Koneksi ke database
$dbConnection = getDBConnection();


// Route handling
$page = $_GET['page'] ?? 'home'; // Default ke halaman home

switch ($page) {
    case 'barang':
        require_once 'app/controllers/barangController.php';
        $controller = new barangController($dbConnection);
        $controller->index(); // Tampilkan semua barang
        break;

    case 'pelanggan':
        require_once 'app/controllers/pelangganController.php';
        $controller = new pelangganController($dbConnection);
        $controller->index(); // Tampilkan semua pelanggan
        break;

    case 'tambah_brg':
        require_once 'app/controllers/barangController.php';
        $controller = new barangController($dbConnection);
        $controller->tambah(); // Form tambah barang
        break;

    case 'tambah_plg':
        require_once 'app/controllers/pelangganController.php';
        $controller = new pelangganController($dbConnection);
        $controller->tambah(); // Form tambah pelanggan
        break;

    case 'edit_barang':
        require_once 'app/controllers/barangController.php';
        $controller = new barangController($dbConnection);
        $kd_barang = $_GET['kd_barang'] ?? null;
        if ($kd_barang) {
            $controller->edit($kd_barang); // Edit barang
        }
        break;

    case 'delete_barang':
        require_once 'app/controllers/barangController.php';
        $controller = new barangController($dbConnection);
        $kd_barang = $_GET['kd_barang'] ?? null;
        if ($kd_barang) {
            $controller->delete($kd_barang); // Hapus barang
        }
        break;

    case 'edit_plg':
        require_once 'app/controllers/pelangganController.php';
        $controller = new pelangganController($dbConnection);
        $id_plg = $_GET['id_plg'] ?? null;
        if ($id_plg) {
            $controller->edit($id_plg); // Edit pelanggan
        }
        break;

    case 'delete_plg':
        require_once 'app/controllers/pelangganController.php';
        $controller = new pelangganController($dbConnection);
        $id_plg = $_GET['id_plg'] ?? null;
        if ($id_plg) {
            $controller->delete($id_plg); // Hapus pelanggan
        }
        break;
    
        case 'transaksi':
            require_once 'app/controllers/transaksiController.php';
            $controller = new transaksiController($dbConnection);
            $controller->index(); // Tampilkan semua transaksi
            break;
    
        case 'tambah_transaksi':
            require_once 'app/controllers/transaksiController.php';
            $controller = new transaksiController($dbConnection);
            $controller->tambah(); // Form tambah transaksi
            break;
    
        case 'delete_transaksi':
            require_once 'app/controllers/transaksiController.php';
            $controller = new transaksiController($dbConnection);
            $id_transaksi = $_GET['id_transaksi'] ?? null;
            if ($id_transaksi) {
                $controller->delete($id_transaksi); // Hapus transaksi
            }
            break;

    case 'home':
    default:
        require_once 'app/controllers/homeController.php';
        $controller = new HomeController($dbConnection);
        $controller->index(); // Tampilkan home
        break;
}
?>


