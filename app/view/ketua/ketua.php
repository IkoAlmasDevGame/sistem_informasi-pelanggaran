<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Master Ketua</title>
        <?php 
            if($_SESSION["role"] == "keamanan"){
                require_once("../ui/header.php");
            }else if($_SESSION["role"] == "ketua"){
                require_once("../ui/header.php");
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
                            <h4 class="display-4 panel-heading fs-4 fst-normal">DATA MASTER KETUA</h4>
                            <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                                <li class="breadcrumb breadcrumb-item">
                                    <a href="?page=beranda" aria-current="page"
                                        class="text-decoration-none text-primary">Beranda</a>
                                </li>
                                <li class="breadcrumb breadcrumb-item">
                                    <a href="?page=lihat-ketua" aria-current="page"
                                        class="text-decoration-none text-primary">Data Master
                                        Ketua</a>
                                </li>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title fs-5 display-4 text-start">Data Master Ketua</h4>
                        </div>
                        <div class="table-responsive">
                            <div class="card-body">
                                <table class="table table-striped" id="example1">
                                    <thead>
                                        <tr>
                                            <th class="text-start fs-6 fw-normal">#</th>
                                            <th class="text-start fs-6 fw-normal">ID Ketua</th>
                                            <th class="text-start fs-6 fw-normal">Nama</th>
                                            <th class="text-start fs-6 fw-normal">Alamat</th>
                                            <th class="text-start fs-6 fw-normal">Number Handphone</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $id_ketua = htmlspecialchars($_GET['id_ketua']);
                                            if(isset($_GET['id_ketua'])){
                                                if($_GET['id_ketua'] == $id_ketua){
                                                $sql = "SELECT * FROM ketua WHERE id_ketua like ? order by id asc";
                                                $row = $configs->prepare($sql);
                                                $row->execute(array($id_ketua));
                                                $hasil = $row->fetchAll();
                                                }
                                            }else{
                                                $hasil = $ketua->Tabled("SELECT * FROM ketua order by id asc");
                                            }
                                            foreach ($hasil as $isi) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $isi["id_ketua"] ?></td>
                                            <td><?php echo $isi["nama_ketua"] ?></td>
                                            <td><?php echo $isi["alamat"] ?></td>
                                            <td><?php echo $isi["no_hp"] ?></td>
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