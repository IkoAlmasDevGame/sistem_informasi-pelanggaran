<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Master Keamanan</title>
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
                            <h4 class="display-4 panel-heading fs-4 fst-normal">DATA MASTER KEAMANAN</h4>
                            <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                                <li class="breadcrumb breadcrumb-item">
                                    <a href="?page=beranda" aria-current="page"
                                        class="text-decoration-none text-primary">Beranda</a>
                                </li>
                                <li class="breadcrumb breadcrumb-item">
                                    <a href="?page=lihat-keamanan" aria-current="page"
                                        class="text-decoration-none text-primary">Data Master
                                        Keamanan</a>
                                </li>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title fs-5 text-start">Data Master
                                Keamanan</h4>
                        </div>
                        <div class="table-responsive">
                            <div class="card-body">
                                <table class="table table-striped" id="example1">
                                    <thead>
                                        <tr>
                                            <th class="text-start fs-6 fw-normal">#</th>
                                            <th class="text-start fs-6 fw-normal">ID Keamanan</th>
                                            <th class="text-start fs-6 fw-normal">Nama</th>
                                            <th class="text-start fs-6 fw-normal">Alamat</th>
                                            <th class="text-start fs-6 fw-normal">Number Handphone</th>
                                            <th class="text-start fs-6 fw-normal">Ketua</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $id_kemanan = htmlspecialchars($_GET['id_keamanan']);
                                            if(isset($_GET['id_keamanan'])){
                                                if($_GET['id_keamanan'] == $id_kemanan){
                                                    $sql = "SELECT keamanan.*, ketua.id_ketua, ketua.nama_ketua FROM keamanan 
                                                    inner join ketua on keamanan.id_ketua = ketua.id_ketua WHERE id_keamanan like ? order by id asc";
                                                    $row = $configs->prepare($sql);
                                                    $row->execute(array($id_kemanan));
                                                    $hasil = $row->fetchAll();
                                                }
                                            }else{
                                                $hasil = $keamanan->Tabled("SELECT keamanan.*, ketua.id_ketua, ketua.nama_ketua FROM keamanan 
                                                inner join ketua on keamanan.id_ketua = ketua.id_ketua order by id asc");
                                            }
                                            foreach ($hasil as $isi) {
                                        ?>
                                        <tr>
                                            <td class="fs-6" style="font-weight: normal; font-size: 14px;
                                                 font-family: 'Times New Roman';">
                                                <?php echo $no; ?>
                                            </td>
                                            <td class="fs-6" style="font-weight: normal; font-size: 14px;
                                                 font-family: 'Times New Roman';">
                                                <?php echo $isi["id_keamanan"] ?>
                                            </td>
                                            <td class="fs-6" style="font-weight: normal; font-size: 14px;
                                                 font-family: 'Times New Roman';">
                                                <?php echo $isi['nama_keamanan'] ?>
                                            </td>
                                            <td style="font-weight: normal; font-size: 14px;
                                             font-family: 'Times New Roman';">
                                                <?php echo $isi['alamat'] ?>
                                            </td>
                                            <td class="fs-6" style="font-weight: normal; font-size: 14px;
                                                 font-family: 'Times New Roman';">
                                                <?php echo $isi['no_hp'] ?>
                                            </td>
                                            <td class="fs-6" style="font-weight: normal; font-size: 14px;
                                                 font-family: 'Times New Roman';">
                                                <!-- <a href="?page=lihat-ketua&id_ketua=<?=$isi['id_ketua'] ?>"
                                                    aria-current="page"
                                                    class="text-primary text-decoration-none"><?=$isi['id_ketua'] ?>
                                                </a> -->
                                                <?=$isi['id_ketua'] ?>
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