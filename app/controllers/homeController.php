<?php
require_once 'app/models/UserHome.php';

class HomeController {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function index() {
        // Memuat tampilan halaman index
        include 'app/views/home.php';
    }
}
?>
