<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Master Ketua</title>
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
                            <h4 class="display-4 panel-heading fs-4 fst-normal">DATA MASTER KETUA</h4>
                            <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                                <li class="breadcrumb breadcrumb-item">
                                    <a href="?page=beranda" aria-current="page"
                                        class="text-decoration-none text-primary">Beranda</a>
                                </li>
                                <li class="breadcrumb breadcrumb-item">
                                    <a href="?page=ketua" aria-current="page"
                                        class="text-decoration-none text-primary">Data Master
                                        Ketua</a>
                                </li>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a href="" role="button" data-bs-target="#tambahketua" data-bs-toggle="modal"
                                class="btn btn-warning shadow-sm hover"><i class="fa fa-plus"></i>
                                <span>Tambah Data Ketua</span>
                            </a>
                            <div class="form-group">
                                <div class="modal fade" id="tambahketua" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title fs-5 fst-normal fw-normal">Tambah Data Ketua
                                                </h4>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="?aksi=create-ketua" method="post" class="form-group">
                                                    <table class="table table-striped">
                                                        <tr>
                                                            <td>
                                                                <label for="">ID Ketua</label>
                                                                <input type="text" name="id_ketua" id="id_ketua"
                                                                    class="form-control" maxlength="5" required>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">Nama</label>
                                                                <input type="text" name="nama_ketua" id="nama_ketua"
                                                                    class="form-control" maxlength="40" required>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">Alamat</label>
                                                                <textarea name="alamat" class="form-control" required
                                                                    id="alamat"></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">No Handphone</label>
                                                                <input type="text" name="no_hp" id="no_hp"
                                                                    class="form-control" maxlength="25" required>
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
                                            <th class="text-start fs-6 fw-normal">ID Ketua</th>
                                            <th class="text-start fs-6 fw-normal">Nama</th>
                                            <th class="text-start fs-6 fw-normal">Alamat</th>
                                            <th class="text-start fs-6 fw-normal">Number Handphone</th>
                                            <th class="text-start fs-6 fw-normal">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $hasil = $ketua->Tabled("SELECT * FROM ketua order by id asc");
                                            foreach ($hasil as $isi) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $isi["id_ketua"] ?></td>
                                            <td><?php echo $isi["nama_ketua"] ?></td>
                                            <td><?php echo $isi["alamat"] ?></td>
                                            <td><?php echo $isi["no_hp"] ?></td>
                                            <td>
                                                <a href="" role="button" data-bs-target="#editKetua<?=$isi['id']?>"
                                                    data-bs-toggle="modal" aria-current="page"
                                                    class="btn btn-warning hover shadow-sm btn-sm">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="?aksi=hapus-ketua&id=<?=$isi["id"]?>" aria-current="page"
                                                    class="btn btn-danger hover shadow-sm btn-sm"
                                                    onclick="return confirm('Apakah data ini ingin anda hapus ?')">
                                                    <i class="fa fa-trash-alt"></i>
                                                </a>
                                                <div class="modal fade" id="editKetua<?=$isi['id']?>" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title display-4 fs-5 text-start">Edit
                                                                    Ketua</h4>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="?aksi=ubah-ketua" class="form-group"
                                                                    method="post">
                                                                    <input type="hidden" name="id"
                                                                        value="<?=$isi['id']?>">
                                                                    <table class="table table-striped-columns">
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">ID Ketua</label>
                                                                                <input type="text" name="id_ketua"
                                                                                    id="id_ketua"
                                                                                    value="<?=$isi['id_ketua']?>"
                                                                                    class="form-control" maxlength="5"
                                                                                    required>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">Nama</label>
                                                                                <input type="text" name="nama_ketua"
                                                                                    id="nama_ketua"
                                                                                    value="<?=$isi['nama_ketua']?>"
                                                                                    class="form-control" maxlength="40"
                                                                                    required>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">Alamat</label>
                                                                                <textarea name="alamat"
                                                                                    class="form-control" required
                                                                                    id="alamat"><?=$isi['alamat']?></textarea>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">No Handphone</label>
                                                                                <input type="text" name="no_hp"
                                                                                    id="no_hp"
                                                                                    value="<?=$isi['no_hp']?>"
                                                                                    class="form-control" maxlength="25"
                                                                                    required>
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