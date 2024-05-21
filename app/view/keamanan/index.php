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
                                    <a href="?page=keamanan" aria-current="page"
                                        class="text-decoration-none text-primary">Data Master
                                        Keamanan</a>
                                </li>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a href="" role="button" data-bs-target="#tambahkeamanan" data-bs-toggle="modal"
                                class="btn btn-warning shadow-sm hover"><i class="fa fa-plus"></i>
                                <span>Tambah Data Keamanan</span>
                            </a>
                            <div class="form-group">
                                <div class="modal fade" id="tambahkeamanan" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title fs-5 fst-normal fw-normal">Tambah Data Keamanan
                                                </h4>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="?aksi=create-keamanan" method="post" class="form-group">
                                                    <table class="table table-striped">
                                                        <tr>
                                                            <td>
                                                                <label for="">ID Keamanan</label>
                                                                <input type="text" name="id_keamanan" id="id_keamanan"
                                                                    class="form-control" maxlength="5" required>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">Ketua</label>
                                                                <select name="id_ketua" class="form-select"
                                                                    id="id_ketua">
                                                                    <option value="">Pilih Nama Ketua</option>
                                                                    <?php 
                                                                        $hasil = $ketua->Tabled("SELECT * FROM ketua");
                                                                        foreach ($hasil as $k) {
                                                                    ?>
                                                                    <option value="<?=$k["id_ketua"]?>">
                                                                        <?php echo $k["id_ketua"]." - ".$k["nama_ketua"] ?>
                                                                    </option>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">Nama</label>
                                                                <input type="text" name="nama_keamanan"
                                                                    id="nama_keamanan" class="form-control"
                                                                    maxlength="30" required>
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
                        <div class="table-responsive">
                            <div class="card-body">
                                <table class="table table-striped" id="example1">
                                    <thead>
                                        <tr>
                                            <th class="text-start fs-6 fw-normal">#</th>
                                            <th class="text-start fs-6 fw-normal">ID Keamanan</th>
                                            <th class="text-start fs-6 fw-normal">Nama Keamanan</th>
                                            <th class="text-start fs-6 fw-normal">Alamat</th>
                                            <th class="text-start fs-6 fw-normal">Number Handphone</th>
                                            <th class="text-start fs-6 fw-normal">ID Ketua</th>
                                            <th class="text-start fs-6 fw-normal">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $hasil = $keamanan->Tabled("SELECT keamanan.*, ketua.id_ketua, ketua.nama_ketua FROM keamanan
                                             inner join ketua on keamanan.id_ketua = ketua.id_ketua order by id asc");
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
                                                <a href="?page=lihat-ketua&id_ketua=<?=$isi['id_ketua'] ?>"
                                                    aria-current="page"
                                                    class="text-primary text-decoration-none"><?=$isi['id_ketua'] ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="" role="button" aria-current="page"
                                                    data-bs-target="#editKeamanan<?=$isi['id_keamanan']?>"
                                                    data-bs-toggle="modal"
                                                    class="btn btn-warning hover btn-sm shadow-sm">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="?aksi=hapus-keamanan&id=<?=$isi["id"]?>" aria-current="page"
                                                    class="btn btn-danger hover shadow-sm btn-sm"
                                                    onclick="return confirm('Apakah data ini ingin anda hapus ?')">
                                                    <i class="fa fa-trash-alt"></i>
                                                </a>
                                                <div class="modal fade" id="editKeamanan<?=$isi['id_keamanan']?>"
                                                    tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title display-4 fs-5 text-start">Edit
                                                                    Keamanan</h4>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="?aksi=ubah-keamanan" class="form-group"
                                                                    method="post">
                                                                    <input type="hidden" name="id"
                                                                        value="<?=$isi["id"]?>">
                                                                    <table class="table table-striped-columns">
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">ID Keamanan</label>
                                                                                <input type="text" name="id_keamanan"
                                                                                    id="id_keamanan"
                                                                                    value="<?=$isi['id_keamanan']?>"
                                                                                    class="form-control" maxlength="5"
                                                                                    required>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">Ketua</label>
                                                                                <select name="id_ketua"
                                                                                    class="form-select" id="id_ketua">
                                                                                    <option value="">Pilih Nama Ketua
                                                                                    </option>
                                                                                    <?php 
                                                                                        $hasil = $ketua->Tabled("SELECT * FROM ketua");
                                                                                        foreach ($hasil as $k) {
                                                                                    ?>
                                                                                    <option
                                                                                        <?php if($isi['id_ketua'] == $k["id_ketua"]){?>
                                                                                        selected
                                                                                        value="<?=$k["id_ketua"]?>"
                                                                                        <?php } ?>>
                                                                                        <?php echo $k["id_ketua"]." - ".$k["nama_ketua"] ?>
                                                                                    </option>
                                                                                    <?php
                                                                                        }
                                                                                    ?>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label for="">Nama</label>
                                                                                <input type="text" name="nama_keamanan"
                                                                                    id="nama_keamanan"
                                                                                    value="<?=$isi['nama_keamanan']?>"
                                                                                    class="form-control" maxlength="30"
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
                                                                                    value="<?=$isi['no_hp']?>"
                                                                                    id="no_hp" class="form-control"
                                                                                    maxlength="25" required>
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