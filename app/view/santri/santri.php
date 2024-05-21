<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Master Santri</title>
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
                            <h4 class="display-4 panel-heading fs-4 fst-normal">DATA MASTER SANTRI</h4>
                            <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                                <li class="breadcrumb breadcrumb-item">
                                    <a href="?page=beranda" aria-current="page"
                                        class="text-decoration-none text-primary">Beranda</a>
                                </li>
                                <li class="breadcrumb breadcrumb-item">
                                    <a href="?page=lihat-santri" aria-current="page"
                                        class="text-decoration-none text-primary">Data Master
                                        Santri</a>
                                </li>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title fs-5 display-4 text-start">Data Master Santri</h4>
                        </div>
                        <div class="table-responsive">
                            <div class="card-body">
                                <table class="table table-striped" id="example1">
                                    <thead>
                                        <tr>
                                            <th class="text-start fs-6 fw-normal">#</th>
                                            <th class="text-start fs-6 fw-normal">Nis</th>
                                            <th class="text-start fs-6 fw-normal">Nama</th>
                                            <th class="text-start fs-6 fw-normal">Alamat</th>
                                            <th class="text-start fs-6 fw-normal">Jenis Kelamin</th>
                                            <th class="text-start fs-6 fw-normal">No Pelanggaran</th>
                                            <th class="text-start fs-6 fw-normal">No Sanksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $hasil = $santri->Tabled("SELECT santri.*, pelanggaran.no_pelanggaran, sanksi.no_sanksi FROM santri inner join pelanggaran on santri.no_pelanggaran = pelanggaran.no_pelanggaran inner join sanksi on santri.no_sanksi = sanksi.no_sanksi order by id_santri asc");
                                            foreach ($hasil as $isi) {
                                        ?>
                                        <tr>
                                            <td style="font-size: 13px; font-family: 'Times New Roman';
                                             font-weight: normal;"><?php echo $no; ?></td>
                                            <td style="font-size: 13px; font-family: 'Times New Roman';
                                             font-weight: normal;"><?php echo $isi["nis"]; ?></td>
                                            <td style="font-size: 13px; font-family: 'Times New Roman';
                                             font-weight: normal;"><?php echo $isi["nama_santri"]; ?></td>
                                            <td style="font-size: 13px; font-family: 'Times New Roman';
                                             font-weight: normal;"><?php echo $isi["alamat"]; ?></td>
                                            <td style="font-size: 13px; font-family: 'Times New Roman';
                                             font-weight: normal;"><?php echo $isi["jenis_kelamin"]; ?></td>
                                            <td style="font-size: 13px; font-family: 'Times New Roman';
                                             font-weight: normal;"><?php echo $isi["no_pelanggaran"]; ?></td>
                                            <td style="font-size: 13px; font-family: 'Times New Roman';
                                             font-weight: normal;"><?php echo $isi["no_sanksi"]; ?></td>
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