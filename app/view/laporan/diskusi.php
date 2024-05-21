<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laporan Hasil Diskusi</title>
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
        <div class="m-5 p-auto">
            <div class="container-fluid p-1">
                <div class="container-fluid py-5">
                    <div class="panel bg-body-tertiary">
                        <div class="panel-body">
                            <h4 class="panel-heading fs-4 display-4 text-start">
                                Laporan Hasil Diskusi
                            </h4>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="fs-5 display-4 text-dark hover fw-normal fst-normal">Laporan Hasil Diskusi</h4>
                            <div class="form-group">
                                <div class="text-end">
                                    <a href="?page=laporan-diskusi" aria-current="page"
                                        class="btn btn-default shadow-sm text-primary hover">
                                        <i class="fa fa-refresh"></i>
                                        <span class="hover text-dark">Refresh Page</span>
                                    </a>
                                    <a href="header.php?page=excel-diskusi" aria-current="page"
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
                                <table class="table table-striped" id="example2">
                                    <thead>
                                        <tr>
                                            <th style="color: transparent;">#</th>
                                            <th class="text-start fs-6 fst-normal fw-normal">Nama Santri</th>
                                            <th class="text-start fs-6 fst-normal fw-normal">Pelanggaran</th>
                                            <th class="text-start fs-6 fst-normal fw-normal">Sanksi</th>
                                            <th class="text-start fs-6 fst-normal fw-normal">ID Keamanan</th>
                                            <th class="text-start fs-6 fst-normal fw-normal">ID Ketua</th>
                                            <th class="text-start fs-6 fst-normal fw-normal">Hasil Diskusi</th>
                                            <th class="text-start fs-6 fst-normal fw-normal">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $hasil = $diskusi->Tabled("SELECT laporan_diskusi.*, santri.nis, santri.nama_santri, pelanggaran.no_pelanggaran, pelanggaran.nama_pelanggaran, sanksi.no_sanksi, sanksi.nama_sanksi, keamanan.id_keamanan, keamanan.nama_keamanan, ketua.id_ketua, ketua.nama_ketua FROM laporan_diskusi inner join santri on laporan_diskusi.nama_santri = santri.nama_santri inner join pelanggaran on laporan_diskusi.no_pelanggaran = pelanggaran.no_pelanggaran inner join sanksi on laporan_diskusi.no_sanksi = sanksi.no_sanksi left join keamanan on laporan_diskusi.id_keamanan = keamanan.id_keamanan left join ketua on laporan_diskusi.id_ketua = ketua.id_ketua order by id asc");
                                            $no = 1;
                                            foreach ($hasil as $isi) {
                                        ?>
                                        <tr>
                                            <td style="color: transparent;"><?php echo $no; ?></td>
                                            <td><?php echo $isi["nama_santri"] ?></td>
                                            <td><?php echo $isi["nama_pelanggaran"] ?></td>
                                            <td><?php echo $isi["nama_sanksi"] ?></td>
                                            <td><?php echo $isi['id_keamanan'] ?></td>
                                            <td><?php echo $isi['id_ketua'] ?></td>
                                            <td>
                                                <a href="" role="button" data-bs-target="#hasil<?=$isi['id']?>"
                                                    data-bs-toggle="modal" aria-current="page"
                                                    class="btn btn-default shadow-sm text-primary">
                                                    <span style="font-size: small;">Lihat Hasil Diskusi</span>
                                                </a>
                                                <div class="modal fade" id="hasil<?=$isi['id']?>" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title fs-5 fst-normal fw-normal">Lihat
                                                                    Diskusi</h4>
                                                                <button type='button' class='btn-close'
                                                                    data-bs-dismiss='modal'></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="fs-6 text-start display-4
                                                                     fst-normal fw-medium">
                                                                    <p><?php echo $isi["hasil_diskusi"] ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="" data-bs-target="#tambahdiskusi<?=$isi["id"]?>"
                                                    data-bs-toggle="modal" aria-current="page"
                                                    class="btn btn-default btn-sm hover text-warning shadow-sm">
                                                    <i class="fa fa-pen-alt"></i>
                                                </a>
                                                <a href="?page=print&id=<?=$isi["id"]?>" aria-current="page"
                                                    onclick="return confirm('Apakah anda ingin print data laporan diskusi santri ini ?')"
                                                    class="btn btn-primary btn-sm hover shadow-sm">
                                                    <i class="fa fa-print"></i>
                                                </a>
                                                <div class="modal fade" id="tambahdiskusi<?=$isi["id"]?>" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title fs-5 fw-normal fst-normal">Tambah
                                                                    Hasil Diskusi</h4>
                                                                <button type='button' class='btn-close'
                                                                    data-bs-dismiss='modal'></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="?aksi=tambah-diskusi" method="post">
                                                                    <input type="hidden" name="id"
                                                                        value="<?=$isi['id']?>">
                                                                    <table class="table table-striped">
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">ID Keamanan</label>
                                                                                <select name="id_keamanan"
                                                                                    class="form-control form-select"
                                                                                    id="id_keamanan" required>
                                                                                    <option value="">Pilih ID dan Nama
                                                                                        Keamanan
                                                                                    </option>
                                                                                    <?php 
                                                                                        $hasil = $keamanan->Tabled("SELECT * FROM keamanan");
                                                                                        foreach ($hasil as $i) {
                                                                                    ?>
                                                                                    <option
                                                                                        <?php if($isi['id_keamanan'] == $i['id_keamanan']){?>
                                                                                        value="<?=$i['id_keamanan']?>"
                                                                                        selected <?php } ?>>
                                                                                        <?=$i['id_keamanan']." - ".$i['nama_keamanan']?>
                                                                                    </option>
                                                                                    <?php
                                                                                        }
                                                                                    ?>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">ID Ketua</label>
                                                                                <select name="id_ketua"
                                                                                    class="form-control form-select"
                                                                                    id="id_ketua" required>
                                                                                    <option value="">Pilih ID dan Nama
                                                                                        Ketua
                                                                                    </option>
                                                                                    <?php 
                                                                                        $hasil = $ketua->Tabled("SELECT * FROM ketua");
                                                                                        foreach ($hasil as $k) {
                                                                                    ?>
                                                                                    <option
                                                                                        <?php if($isi['id_ketua'] == $k['id_ketua']){?>
                                                                                        selected
                                                                                        value="<?=$k['id_ketua']?>"
                                                                                        <?php } ?>>
                                                                                        <?=$k['id_ketua']." - ".$k['nama_ketua']?>
                                                                                    </option>
                                                                                    <?php
                                                                                        }
                                                                                    ?>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">Diskusi</label>
                                                                                <textarea name="hasil_diskusi"
                                                                                    id="hasil_diskusi"
                                                                                    class="form-control"
                                                                                    required><?php echo $isi['hasil_diskusi'] ?></textarea>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                    <div class="modal-footer">
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Simpan</button>
                                                                        <button type="submit" class="btn btn-default"
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