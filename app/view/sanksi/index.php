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
                                    <a href="?page=sanksi" aria-current="page"
                                        class="text-decoration-none text-primary">Data Master
                                        Sanksi</a>
                                </li>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a href="" role="button" data-bs-target="#tambahsanksi" data-bs-toggle="modal"
                                class="btn btn-warning shadow-sm hover"><i class="fa fa-plus"></i>
                                <span>Tambah Data Sanksi</span>
                            </a>
                            <div class="form-group">
                                <div class="modal fade" id="tambahsanksi" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title fs-5 fst-normal fw-normal">Tambah Data
                                                    Sanksi
                                                </h4>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="?aksi=create-sanksi" method="post" class="form-group">
                                                    <table class="table table-striped">
                                                        <tr>
                                                            <td>
                                                                <label for="">No Sanksi</label>
                                                                <input type="text" name="no_sanksi" id="no_sanksi"
                                                                    class="form-control" maxlength="5" required>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">Nama Sanksi</label>
                                                                <input type="text" name="nama_sanksi" id="nama_sanksi"
                                                                    class="form-control" maxlength="25" required>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">Jenis Sanksi</label>
                                                                <input type="text" name="jenis_sanksi" id="jenis_sanksi"
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
                                            <th class="text-start fs-6 fw-normal">No Sanksi</th>
                                            <th class="text-start fs-6 fw-normal">Nama Sanksi</th>
                                            <th class="text-start fs-6 fw-normal">Jenis Sanksi</th>
                                            <th class="text-start fs-6 fw-normal">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $hasil = $sanksi->Tabled("SELECT * FROM sanksi order by id_sanksi asc");
                                            foreach ($hasil as $isi) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $isi['no_sanksi'] ?></td>
                                            <td><?php echo $isi['nama_sanksi'] ?></td>
                                            <td><?php echo $isi['jenis_sanksi'] ?></td>
                                            <td>
                                                <a href="" aria-current="page"
                                                    data-bs-target="#editSanksi<?=$isi['id_sanksi']?>"
                                                    data-bs-toggle="modal"
                                                    class="btn btn-warning hover btn-sm shadow-sm">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="" aria-current="page"
                                                    class="btn btn-danger hover btn-sm shadow-sm">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <div class="modal fade" id="editSanksi<?=$isi['id_sanksi']?>"
                                                    tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title fs-5 fw-normal display-4">Edit
                                                                    Sanksi</h4>
                                                                <button type='button' class='btn-close'
                                                                    data-bs-dismiss='modal'></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="?aksi=ubah-sanksi" class="form-group"
                                                                    method="post">
                                                                    <input type="hidden" name="id"
                                                                        value="<?=$isi['id_sanksi']?>">
                                                                    <table class="table table-striped-columns">
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">No Sanksi</label>
                                                                                <input type="text" name="no_sanksi"
                                                                                    id="no_sanksi" class="form-control"
                                                                                    maxlength="5"
                                                                                    value="<?=$isi['no_sanksi']?>"
                                                                                    required>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">Nama Sanksi</label>
                                                                                <input type="text" name="nama_sanksi"
                                                                                    id="nama_sanksi"
                                                                                    value="<?=$isi['nama_sanksi']?>"
                                                                                    class="form-control" maxlength="25"
                                                                                    required>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">Jenis Sanksi</label>
                                                                                <input type="text" name="jenis_sanksi"
                                                                                    id="jenis_sanksi"
                                                                                    value="<?=$isi['jenis_sanksi']?>"
                                                                                    class="form-control" maxlength="25"
                                                                                    required>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                    <div class="modal-footer">
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Update</button>
                                                                        <button type='button' class='btn btn-default'
                                                                            data-bs-dismiss='modal'>Batal</button>
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