<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../../../assets/icon.jpg" type="image/x-icon">
        <?php

            session_start();
            require_once("../../config/auth.php");
            require_once("../../config/config.php");
            require_once("../../database/koneksi.php");
            require_once("../../controller/controller.php");
            require_once("../../model/model.php");

            $auth = new controller\AuthPengguna($configs);
            $keamanan = new controller\AuthKeamanan($configs);
            $ketua = new controller\AuthKetua($configs);
            $pelanggaran = new controller\AuthPelanggaran($configs);
            $sanksi = new controller\AuthSanksi($configs);
            $santri = new controller\AuthSantri($configs);
            $laporan = new controller\AuthLaporan($configs);
            $diskusi = new controller\AuthDiskusi($configs);
            $jumlah = new model\Santri($configs);
            
            if(!isset($_GET["page"])){
                require_once("../dashboard/index.php");
            }else{
                switch ($_GET["page"]) {
                    case 'beranda':
                        require_once("../dashboard/index.php");
                        break;
                    
                    case 'pengguna':
                        require_once("../pengguna/index.php");
                        break;
                    
                    // Keamanan Page

                    case 'keamanan':
                        require_once("../keamanan/index.php");
                        break;
                        
                    case 'ketua':
                        require_once("../ketua/index.php");
                        break;
                        
                    case 'pelanggaran':
                        require_once("../pelanggaran/index.php");
                        break;

                    case 'sanksi':
                        require_once("../sanksi/index.php");
                        break;
                        
                    case 'santri':
                        require_once("../santri/index.php");
                        break;

                    case 'lihat-keamanan':
                        require_once("../keamanan/keamanan.php");
                        break;
                        
                    case 'lihat-ketua':
                        require_once("../ketua/ketua.php");
                        break;
                        
                    case 'lihat-pelanggaran':
                        require_once("../pelanggaran/pelanggaran.php");
                        break;

                    case 'lihat-sanksi':
                        require_once("../sanksi/sanksi.php");
                        break;
                        
                    case 'lihat-santri':
                        require_once("../santri/santri.php");
                        break;

                    // Keamanan Page

                    // Ketua Page
                    case 'laporan-pelanggaran':
                        require_once("../laporan/index.php");
                        break;

                    case 'print-pelanggaran':
                        require_once("../laporan/print-pelanggaran.php");
                        break;
                    
                    case 'excel-pelanggaran':
                        require_once("../laporan/excel-pelanggaran.php");
                        break;

                    case 'excel-diskusi':
                        require_once("../laporan/excel-diskusi.php");
                        break;

                    case 'print':
                        require_once("../laporan/print.php");
                        break;

                    case 'laporan-diskusi':
                        require_once("../laporan/diskusi.php");
                        break;

                    // Ketua Page

                    case 'keluar':
                        if(isset($_SESSION['status'])){
                            unset($_SESSION['status']);
                            session_unset();
                            session_destroy();
                            $_SESSION = array();
                        }
                        header("location:../auth/index.php");
                        exit(0);
                        break;
                    
                    default:
                        require_once("../dashboard/index.php");
                        break;
                }
            }

            if(!isset($_GET["aksi"])){
                require_once("../../controller/controller.php");
                require_once("../../model/model.php");
            }else{
                switch ($_GET["aksi"]) {
                    // Pengguna new
                    case 'update':
                        $auth->ubah();
                        break;

                    // santri new
                    case 'create-santri':
                        $santri->add();
                        break;
                    case 'ubah-santri':
                        $santri->ubah();
                        break;
                    case 'hapus-santri':
                        $santri->hapus();
                        break;
                    // santri new

                    // ketua new
                    case 'create-ketua':
                        $ketua->add();
                        break;
                    case 'ubah-ketua':
                        $ketua->ubah();
                        break;
                    case 'hapus-ketua':
                        $ketua->hapus();
                        break;
                    // ketua new

                    // Keamanan new
                    case 'create-keamanan':
                        $keamanan->add();
                        break;
                    case 'ubah-keamanan':
                        $keamanan->ubah();
                        break;
                    case 'hapus-keamanan':
                        $keamanan->hapus();
                        break;
                    // Keamanan new

                    // Pelanggaran new
                    case 'create-pelanggaran':
                        $pelanggaran->add();
                        break;
                    case 'ubah-pelanggaran':
                        $pelanggaran->ubah();
                        break;
                    case 'hapus-pelanggaran':
                        $pelanggaran->hapus();
                        break;
                    // Pelanggaran new

                    // Sanksi new
                    case 'create-sanksi':
                        $sanksi->add();
                        break;
                    case 'ubah-sanksi':
                        $sanksi->ubah();
                        break;
                    case 'hapus-sanksi':
                        $sanksi->hapus();
                        break;
                    // Sanksi new

                    // diskusi new
                    case 'tambah-diskusi':
                        $diskusi->tambah();
                        break;
                    // diskusi new

                    default:
                        require_once("../../controller/controller.php");
                        require_once("../../model/model.php");
                        break;
                }
            }
        ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
        <!--  -->
        <link href="../../../dist/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="../../../dist/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="../../../dist/vendor/quill/quill.snow.css" rel="stylesheet">
        <link href="../../../dist/vendor/quill/quill.bubble.css" rel="stylesheet">
        <link href="../../../dist/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="../../../dist/vendor/simple-datatables/style.css" rel="stylesheet">
        <link href="../../../dist/css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css" rel="stylesheet" />
        <style type="text/css">
        .card-width {
            width: 360px;
        }

        .card-height {
            height: 220px;
        }

        @media (max-height: 500px) {
            .card-height {
                max-height: 500px;
            }
        }

        @media (max-width: 720px) {
            .card-width {
                max-width: 720px;
            }
        }

        .fa-refresh {
            animation: rotating 2s linear infinite;
        }

        @keyframes rotating {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }
        </style>
        <title>Sistem Informasi Pelanggaran</title>
    </head>

    <body>