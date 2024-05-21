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
                                    <a href="?page=pelanggaran" aria-current="page"
                                        class="text-decoration-none text-primary">Data Master
                                        Pelanggaran</a>
                                </li>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a href="" role="button" data-bs-target="#tambahpelanggaran" data-bs-toggle="modal"
                                class="btn btn-warning shadow-sm hover"><i class="fa fa-plus"></i>
                                <span>Tambah Data Pelanggaran</span>
                            </a>
                            <div class="form-group">
                                <div class="modal fade" id="tambahpelanggaran" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title fs-5 fst-normal fw-normal">Tambah Data
                                                    Pelanggaran
                                                </h4>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="?aksi=create-pelanggaran" method="post"
                                                    class="form-group">
                                                    <table class="table table-striped">
                                                        <tr>
                                                            <td>
                                                                <label for="">No Pelanggaran</label>
                                                                <input type="text" class="form-control"
                                                                    name="no_pelanggaran" required maxlength="5"
                                                                    id="no_pelanggaran">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">Nama Pelanggaran</label>
                                                                <input type="text" class="form-control"
                                                                    name="nama_pelanggaran" required maxlength="25"
                                                                    id="nama_pelanggaran">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">No Sanksi</label>
                                                                <select name="no_sanksi" required
                                                                    class="form-select form-control" id="no_sanksi">
                                                                    <option value="">Pilih No Sanksi</option>
                                                                    <?php 
                                                                        $hasil = $sanksi->Tabled("SELECT * FROM sanksi order by id_sanksi asc");
                                                                        foreach ($hasil as $s) {
                                                                    ?>
                                                                    <option value="<?=$s['no_sanksi']?>">
                                                                        <?php echo $s['no_sanksi'].' - '.$s['nama_sanksi'] ?>
                                                                    </option>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">Id Keamanan</label>
                                                                <select name="id_keamanan" required
                                                                    class="form-select form-control" id="id_keamanan">
                                                                    <option value="">Pilih ID Keamanan</option>
                                                                    <?php 
                                                                        $hasil = $keamanan->Tabled("SELECT * FROM keamanan order by id_keamanan asc");
                                                                        foreach ($hasil as $k) {
                                                                    ?>
                                                                    <option value="<?=$k['id_keamanan']?>">
                                                                        <?php echo $k['id_keamanan'].' - '.$k['nama_keamanan'] ?>
                                                                    </option>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                        <button type="button" class="btn btn-default"
                                                            data-bs-dismiss="modal">Batal</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                            <th class="text-start fs-6 fw-normal">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $hasil = $pelanggaran->Tabled("SELECT pelanggaran.*, sanksi.no_sanksi, keamanan.id_keamanan FROM pelanggaran
                                             inner join sanksi on pelanggaran.no_sanksi = sanksi.no_sanksi inner join keamanan on pelanggaran.id_keamanan = keamanan.id_keamanan order by id_pelanggaran asc");
                                            foreach ($hasil as $isi) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $isi['no_pelanggaran'] ?></td>
                                            <td><?php echo $isi['nama_pelanggaran'] ?></td>
                                            <td>
                                                <a href="?page=lihat-sanksi&no_sanksi=<?php echo $isi['no_sanksi'] ?>"
                                                    class="text-primary text-decoration-none" aria-current="page">
                                                    <?php echo $isi['no_sanksi'] ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="?page=lihat-keamanan&id_keamanan=<?php echo $isi['id_keamanan'] ?>"
                                                    class="text-primary text-decoration-none" aria-current="page">
                                                    <?php echo $isi['id_keamanan'] ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="" aria-current="page"
                                                    data-bs-target="#editPelanggaran<?=$isi['id_pelanggaran']?>"
                                                    data-bs-toggle="modal"
                                                    class="btn btn-sm btn-warning shadow-sm hover">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="?aksi=hapus-pelanggaran&id=<?=$isi["id_pelanggaran"]?>"
                                                    aria-current="page" class="btn btn-danger hover shadow-sm btn-sm"
                                                    onclick="return confirm('Apakah data ini ingin anda hapus ?')">
                                                    <i class="fa fa-trash-alt"></i>
                                                </a>
                                                <div class="modal fade" id="editPelanggaran<?=$isi['id_pelanggaran']?>"
                                                    tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title display-4 fs-5 text-start">Edit
                                                                    Pelanggaran</h4>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="?aksi=ubah-pelanggaran" class="form-group"
                                                                    method="post">
                                                                    <input type="hidden" name="id"
                                                                        value="<?=$isi['id_pelanggaran']?>">
                                                                    <table class="table table-striped-columns">
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">No Pelanggaran</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="no_pelanggaran"
                                                                                    value="<?=$isi['no_pelanggaran']?>"
                                                                                    required maxlength="5"
                                                                                    id="no_pelanggaran">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">Nama Pelanggaran</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="nama_pelanggaran"
                                                                                    value="<?=$isi['nama_pelanggaran']?>"
                                                                                    required maxlength="25"
                                                                                    id="nama_pelanggaran">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">No Sanksi</label>
                                                                                <select name="no_sanksi" required
                                                                                    class="form-select form-control"
                                                                                    id="no_sanksi">
                                                                                    <option value="">Pilih No Sanksi
                                                                                    </option>
                                                                                    <?php 
                                                                                        $hasil = $sanksi->Tabled("SELECT * FROM sanksi order by id_sanksi asc");
                                                                                        foreach ($hasil as $s) {
                                                                                    ?>
                                                                                    <option
                                                                                        <?php if($isi['no_sanksi'] == $s['no_sanksi']){?>
                                                                                        selected
                                                                                        value="<?=$s['no_sanksi']?>"
                                                                                        <?php } ?>>
                                                                                        <?php echo $s['no_sanksi'].' - '.$s['nama_sanksi'] ?>
                                                                                    </option>
                                                                                    <?php
                                                                                        }
                                                                                    ?>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">Id Keamanan</label>
                                                                                <select name="id_keamanan" required
                                                                                    class="form-select form-control"
                                                                                    id="id_keamanan">
                                                                                    <option value="">Pilih ID Keamanan
                                                                                    </option>
                                                                                    <?php 
                                                                                        $hasil = $keamanan->Tabled("SELECT * FROM keamanan order by id_keamanan asc");
                                                                                        foreach ($hasil as $k) {
                                                                                    ?>
                                                                                    <option
                                                                                        <?php if($isi['id_keamanan'] == $k['id_keamanan']){?>
                                                                                        selected
                                                                                        value="<?=$k['id_keamanan']?>"
                                                                                        <?php } ?>>
                                                                                        <?php echo $k['id_keamanan'].' - '.$k['nama_keamanan'] ?>
                                                                                    </option>
                                                                                    <?php
                                                                                        }
                                                                                    ?>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                    <div class="modal-footer">
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Update</button>
                                                                        <button type="button" class="btn btn-default"
                                                                            data-bs-dismiss="modal">Batal</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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