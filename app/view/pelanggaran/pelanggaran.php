<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Master Pelanggaran</title>
        <?php 
            if($_SESSION["role"] == "keamanan"){
                require_once("../ui/header.php");
            }else{
                header("location:../ui/header.php?page=beranda");
            }
        ?>
    </head>

    <body>
        <?php 
            require_once("../ui/sidebar.php");
        ?>
        <div class="p-auto m-5">
            <div class="container-fluid p-1">
                <div class="container-fluid py-5">
                    <div class="panel panel-default">
                        <div class="panel-body bg-body-tertiary">
                            <h4 class="display-4 panel-heading fs-4 fst-normal">DATA MASTER PELANGGARAN</h4>
                            <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                                <li class="breadcrumb breadcrumb-item">
                                    <a href="?page=beranda" aria-current="page"
                                        class="text-decoration-none text-primary">Beranda</a>
                                </li>
                                <li class="breadcrumb breadcrumb-item">
                                    <a href="?page=lihat-pelanggaran" aria-current="page"
                                        class="text-decoration-none text-primary">Data Master
                                        Pelanggaran</a>
                                </li>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title fs-5 display-4 text-start">Data Master Pelanggaran</h4>
                        </div>
                        <div class="table-responsive">
                            <div class="card-body">
                                <table class="table table-striped" id="example1">
                                    <thead>
                                        <tr>
                                            <th class="text-start fs-6 fw-normal">#</th>
                                            <th class="text-start fs-6 fw-normal">No Pelanggaran</th>
                                            <th class="text-start fs-6 fw-normal">Nama Pelanggaran</th>
                                            <th class="text-start fs-6 fw-normal">No Sanksi</th>
                                            <th class="text-start fs-6 fw-normal">ID Keamanan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $no_pelanggaran = htmlspecialchars($_GET['no_pelanggaran']);
                                            if(isset($_GET['no_pelanggaran'])){
                                                if($_GET['no_pelanggaran'] == $no_pelanggaran){
                                                    $sql = "SELECT pelanggaran.*, sanksi.no_sanksi, keamanan.id_keamanan FROM pelanggaran
                                                     inner join sanksi on pelanggaran.no_sanksi = sanksi.no_sanksi inner join keamanan 
                                                     on pelanggaran.id_keamanan = keamanan.id_keamanan WHERE no_pelanggaran like ? order by id_pelanggaran asc";
                                                    $row = $configs->prepare($sql);
                                                    $row->execute(array($no_pelanggaran));
                                                    $hasil = $row->fetchAll();
                                                }
                                            }else{
                                                $hasil = $pelanggaran->Tabled("SELECT pelanggaran.*, sanksi.no_sanksi, keamanan.id_keamanan FROM pelanggaran
                                                 inner join sanksi on pelanggaran.no_sanksi = sanksi.no_sanksi inner join keamanan 
                                                 on pelanggaran.id_keamanan = keamanan.id_keamanan order by id_pelanggaran asc");
                                            }
                                            foreach ($hasil as $isi) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $isi['no_pelanggaran'] ?></td>
                                            <td><?php echo $isi['nama_pelanggaran'] ?></td>
                                            <td>
                                                <!-- <a href="?page=lihat-sanksi&no_sanksi=<?php echo $isi['no_sanksi'] ?>"
                                                    class="text-primary text-decoration-none" aria-current="page">
                                                    <?php echo $isi['no_sanksi'] ?>
                                                </a> -->
                                                <?php echo $isi['no_sanksi'] ?>
                                            </td>
                                            <td>
                                                <!-- <a href="?page=lihat-keamanan&id_keamanan=<?php echo $isi['id_keamanan'] ?>"
                                                    class="text-primary text-decoration-none" aria-current="page">
                                                    <?php echo $isi['id_keamanan'] ?>
                                                </a> -->
                                                <?php echo $isi['id_keamanan'] ?>
                                            </td>
                                        </tr>
                                        <?php
                                        $no++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            require_once("../ui/footer.php");
        ?>