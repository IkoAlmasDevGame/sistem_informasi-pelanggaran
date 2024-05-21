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
                                    <a href="?page=santri" aria-current="page"
                                        class="text-decoration-none text-primary">Data Master
                                        Santri</a>
                                </li>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a href="" role="button" data-bs-target="#tambahsantri" data-bs-toggle="modal"
                                class="btn btn-warning shadow-sm hover"><i class="fa fa-plus"></i>
                                <span>Tambah Data Santri</span>
                            </a>
                            <div class="form-group">
                                <div class="modal fade" id="tambahsantri" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title fs-5 fst-normal fw-normal">Tambah Data
                                                    Santri
                                                </h4>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="?aksi=create-santri" method="post" class="form-group">
                                                    <table class="table table-striped">
                                                        <tr>
                                                            <td>
                                                                <label for="">Nis Santri</label>
                                                                <input type="text" name="nis" id="nis" required
                                                                    class="form-control" maxlength="10">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">Nama Santri</label>
                                                                <input type="text" name="nama_santri" id="nama_santri"
                                                                    required class="form-control" maxlength="40">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">Alamat</label>
                                                                <textarea name="alamat" class="form-control"
                                                                    maxlength="80" id="alamat"></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">Jenis Kelamin</label>
                                                                <select name="jenis_kelamin"
                                                                    class="form-control form-select" required
                                                                    id="jenis_kelamin">
                                                                    <option value="">Pilih Jenis Kelamin</option>
                                                                    <option value="laki-laki">Laki - Laki</option>
                                                                    <option value="perempuan">Perempuan</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">No Pelanggaran</label>
                                                                <select name="no_pelanggaran"
                                                                    class="form-control form-select" required
                                                                    id="no_pelanggaran">
                                                                    <option value="">Pilih No Pelanggaran</option>
                                                                    <?php 
                                                                        $hasil = $pelanggaran->Tabled("SELECT * FROM pelanggaran order by id_pelanggaran asc");
                                                                        foreach ($hasil as $p) {
                                                                    ?>
                                                                    <option value="<?=$p['no_pelanggaran']?>">
                                                                        <?php echo $p['no_pelanggaran']." - ".$p['nama_pelanggaran'] ?>
                                                                    </option>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">No Sanksi</label>
                                                                <select name="no_sanksi"
                                                                    class="form-control form-select" required
                                                                    id="no_sanksi">
                                                                    <option value="">Pilih No Sanksi</option>
                                                                    <?php 
                                                                        $hasil = $sanksi->Tabled("SELECT * FROM sanksi order by id_sanksi asc");
                                                                        foreach ($hasil as $p) {
                                                                    ?>
                                                                    <option value="<?=$p['no_sanksi']?>">
                                                                        <?php echo $p['no_sanksi']." - ".$p['nama_sanksi'] ?>
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
                                                        <button type="submit" class="btn btn-default"
                                                            data-bs-dismiss="modal">Batal</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
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
                                            <th class="text-start fs-6 fw-normal">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $hasil = $santri->Tabled("SELECT santri.*, pelanggaran.no_pelanggaran, sanksi.no_sanksi FROM santri inner join pelanggaran on santri.no_pelanggaran = pelanggaran.no_pelanggaran inner join sanksi on santri.no_sanksi = sanksi.no_sanksi order by id_santri asc");
                                            foreach ($hasil as $isi) {
                                        ?>
                                        <tr>
                                            <td style="font-size: 13px; font-weight: normal;
                                             font-family: 'Times New Roman'"><?php echo $no; ?></td>
                                            <td style="font-size: 13px; font-weight: normal;
                                             font-family: 'Times New Roman'"><?php echo $isi["nis"]; ?></td>
                                            <td style="font-size: 13px; font-weight: normal;
                                             font-family: 'Times New Roman'"><?php echo $isi["nama_santri"]; ?></td>
                                            <td style="font-size: 13px; font-weight: normal;
                                             font-family: 'Times New Roman'"><?php echo $isi["alamat"]; ?></td>
                                            <td style="font-size: 13px; font-weight: normal;
                                             font-family: 'Times New Roman'"><?php echo $isi["jenis_kelamin"]; ?></td>
                                            <td>
                                                <a href="?page=lihat-pelanggaran&no_pelanggaran=<?php echo $isi["no_pelanggaran"]; ?>"
                                                    aria-current="page" class="text-primary hover text-decoration-none">
                                                    <?php echo $isi["no_pelanggaran"]; ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="?page=lihat-sanksi&no_sanksi=<?php echo $isi["no_sanksi"]; ?>"
                                                    aria-current="page" class="text-primary hover text-decoration-none">
                                                    <?php echo $isi["no_sanksi"]; ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="" data-bs-target="#editSantri<?=$isi['id_santri']?>"
                                                    data-bs-toggle="modal" aria-current="page"
                                                    class="btn btn-warning hover shadow-sm btn-sm">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="?aksi=hapus-santri&id=<?=$isi["id_santri"]?>"
                                                    aria-current="page"
                                                    onclick="return confirm('Apakah data ini ingin anda hapus ?')"
                                                    class="btn btn-danger hover shadow-sm btn-sm">
                                                    <i class="fa fa-trash-alt"></i>
                                                </a>
                                                <div class="modal fade" id="editSantri<?=$isi['id_santri']?>"
                                                    tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title display-4 fs-5 text-start">Edit
                                                                    Data Santri</h4>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="?aksi=ubah-santri" class="form-group"
                                                                    method="post">
                                                                    <input type="hidden" name="id"
                                                                        value="<?=$isi['id_santri']?>">
                                                                    <table class="table table-striped-columns">
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">Nis Santri</label>
                                                                                <input type="text" name="nis" id="nis"
                                                                                    required class="form-control"
                                                                                    maxlength="10"
                                                                                    value="<?=$isi['nis']?>">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">Nama Santri</label>
                                                                                <input type="text" name="nama_santri"
                                                                                    id="nama_santri" required
                                                                                    value="<?=$isi['nama_santri']?>"
                                                                                    class="form-control" maxlength="40">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">Alamat</label>
                                                                                <textarea name="alamat"
                                                                                    class="form-control" maxlength="80"
                                                                                    id="alamat"><?php echo $isi['alamat'] ?></textarea>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">Jenis Kelamin</label>
                                                                                <select name="jenis_kelamin"
                                                                                    class="form-control form-select"
                                                                                    required id="jenis_kelamin">
                                                                                    <option value="">Pilih Jenis Kelamin
                                                                                    </option>
                                                                                    <option
                                                                                        <?php if($isi["jenis_kelamin"] == "laki-laki"){?>
                                                                                        selected value="laki-laki"
                                                                                        <?php } ?>>Laki -
                                                                                        Laki</option>
                                                                                    <option
                                                                                        <?php if($isi["jenis_kelamin"] == "perempuan"){?>
                                                                                        selected value="perempuan"
                                                                                        <?php } ?>>Perempuan
                                                                                    </option>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">No Pelanggaran</label>
                                                                                <select name="no_pelanggaran"
                                                                                    class="form-control form-select"
                                                                                    required id="no_pelanggaran">
                                                                                    <option value="">Pilih No
                                                                                        Pelanggaran</option>
                                                                                    <?php 
                                                                                        $hasil = $pelanggaran->Tabled("SELECT * FROM pelanggaran order by id_pelanggaran asc");
                                                                                        foreach ($hasil as $p) {
                                                                                    ?>
                                                                                    <option
                                                                                        <?php if($isi['no_pelanggaran'] == $p['no_pelanggaran']){?>
                                                                                        selected
                                                                                        value="<?=$p['no_pelanggaran']?>"
                                                                                        <?php } ?>>
                                                                                        <?php echo $p['no_pelanggaran']." - ".$p['nama_pelanggaran'] ?>
                                                                                    </option>
                                                                                    <?php
                                                                                        }
                                                                                    ?>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">No Sanksi</label>
                                                                                <select name="no_sanksi"
                                                                                    class="form-control form-select"
                                                                                    required id="no_sanksi">
                                                                                    <option value="">Pilih No Sanksi
                                                                                    </option>
                                                                                    <?php 
                                                                                        $hasil = $sanksi->Tabled("SELECT * FROM sanksi order by id_sanksi asc");
                                                                                        foreach ($hasil as $p) {
                                                                                    ?>
                                                                                    <option
                                                                                        <?php if($isi['no_sanksi'] == $p['no_sanksi']){?>
                                                                                        selected
                                                                                        value="<?=$p['no_sanksi']?>"
                                                                                        <?php } ?>>
                                                                                        <?php echo $p['no_sanksi']." - ".$p['nama_sanksi'] ?>
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