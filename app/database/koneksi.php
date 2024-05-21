<?php 
error_reporting(0);
date_default_timezone_set("Asia/Jakarta");

$dbname = "pelanggaran_santri";

try {
    $configs = new PDO("mysql:host=localhost;dbname=$dbname;", "root", "");
} catch(Exception $e){
    die("Koneksi gagal tersambung ..." . $e->getMessage());
    exit;
}

?>