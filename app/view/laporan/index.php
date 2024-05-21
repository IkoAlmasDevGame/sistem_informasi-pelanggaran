<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laporan Pelanggaran</title>
        <?php 
            if($_SESSION["role"] == "ketua"){
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
                    <div class="panel bg-body-tertiary">
                        <div class="panel-body">
                            <h4 class="panel-heading fs-4 display-4 text-start">
                                Laporan Pelanggaran
                            </h4>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="form-group">
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <h4 class="card-title fst-normal fw-normal display-4
                                     hover text-primary shadow-sm">
                                        Laporan Pelanggaran
                                    </h4>
                                    <a href="?page=laporan-pelanggaran" aria-current="page"
                                        class="btn btn-default shadow-sm text-primary hover">
                                        <i class="fa fa-refresh"></i>
                                        <span class="ms-2 ms-md-2 hover text-dark">Refresh Page</span>
                                    </a>
                                </div>
                                <div class="text-end">
                                    <a href="?page=print-pelanggaran" aria-current="page"
                                        onclick="return confirm('Apakah kamu ingin print data laporan pelanggaran ini ?')"
                                        class="btn btn-default shadow-sm text-primary hover">
                                        <i class="fa fa-print"></i>
                                    </a>
                                    <a href="header.php?page=excel-pelanggaran" aria-current="page"
                                        class="btn btn-default shadow-sm text-danger hover">
                                        <i class="fa fa-file-excel"></i>
                                        <span class="hover text-dark">export to excel</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <br>
                            <div class="table-responsive">
                                <table class="table table-striped" id="example1">
                                    <thead>
                                        <tr>
                                            <th class="text-start fs-6 fst-normal fw-normal">#</th>
                                            <th class="text-start fs-6 fst-normal fw-normal">Nama Santri</th>
                                            <th class="text-start fs-6 fst-normal fw-normal">Nama Keamanan</th>
                                            <th class="text-start fs-6 fst-normal fw-normal">Nama Ketua</th>
                                            <th class="text-start fs-6 fst-normal fw-normal">Pelanggaran</th>
                                            <th class="text-start fs-6 fst-normal fw-normal">Sanksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $hasil = $laporan->Tabled("SELECT laporan_diskusi.*, santri.nis, santri.nama_santri, pelanggaran.no_pelanggaran, pelanggaran.nama_pelanggaran, sanksi.no_sanksi, sanksi.nama_sanksi, keamanan.id_keamanan, keamanan.nama_keamanan, ketua.id_ketua, ketua.nama_ketua FROM laporan_diskusi inner join santri on laporan_diskusi.nama_santri = santri.nama_santri inner join pelanggaran on laporan_diskusi.no_pelanggaran = pelanggaran.no_pelanggaran inner join sanksi on laporan_diskusi.no_sanksi = sanksi.no_sanksi left join keamanan on laporan_diskusi.id_keamanan = keamanan.id_keamanan left join ketua on laporan_diskusi.id_ketua = ketua.id_ketua");
                                            foreach($hasil as $isi){
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $isi["nis"]." - ".$isi["nama_santri"] ?></td>
                                            <td><?php echo $isi["id_keamanan"]." - ".$isi["nama_keamanan"] ?></td>
                                            <td><?php echo $isi["id_ketua"]." - ".$isi["nama_ketua"] ?></td>
                                            <td><?php echo $isi["no_pelanggaran"]." - ".$isi["nama_pelanggaran"] ?></td>
                                            <td><?php echo $isi["no_sanksi"]." - ".$isi["nama_sanksi"] ?></td>
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