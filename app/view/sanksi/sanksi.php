<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Master Sanksi</title>
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
                            <h4 class="display-4 panel-heading fs-4 fst-normal">DATA MASTER SANKSI</h4>
                            <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                                <li class="breadcrumb breadcrumb-item">
                                    <a href="?page=beranda" aria-current="page"
                                        class="text-decoration-none text-primary">Beranda</a>
                                </li>
                                <li class="breadcrumb breadcrumb-item">
                                    <a href="?page=lihat-sanksi" aria-current="page"
                                        class="text-decoration-none text-primary">Data Master
                                        Sanksi</a>
                                </li>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title fs-5 display-4 text-start">Data Master Sanksi</h4>
                        </div>
                        <div class="table-responsive">
                            <div class="card-body">
                                <table class="table table-striped" id="example1">
                                    <thead>
                                        <tr>
                                            <th class="text-start fs-6 fw-normal">#</th>
                                            <th class="text-start fs-6 fw-normal">No Sanksi</th>
                                            <th class="text-start fs-6 fw-normal">Nama Sanksi</th>
                                            <th class="text-start fs-6 fw-normal">Jenis Sanksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $no_sanksi = htmlspecialchars($_GET['no_sanksi']);
                                            if(isset($_GET['no_sanksi'])){
                                                if($_GET['no_sanksi'] == $no_sanksi){
                                                    $sql = "SELECT * FROM sanksi WHERE no_sanksi like ? order by id_sanksi asc";
                                                    $row = $configs->prepare($sql);
                                                    $row->execute(array($no_sanksi));
                                                    $hasil = $row->fetchAll();
                                                }
                                            }else{
                                                $hasil = $sanksi->Tabled("SELECT * FROM sanksi order by id_sanksi asc");
                                            }
                                            foreach ($hasil as $isi) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $isi['no_sanksi'] ?></td>
                                            <td><?php echo $isi['nama_sanksi'] ?></td>
                                            <td><?php echo $isi['jenis_sanksi'] ?></td>
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