<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document Print Laporan Diskusi</title>
        <?php 
            require_once("../../database/koneksi.php");
        ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    </head>

    <body onload="window.print()">
        <div class="container-fluid p-5">
            <div class="container-fluid py-2 border border-1" style="border-radius: 5px;">
                <div class="text-start">
                    <img src="../../../assets/icon-128.jpg" width="64" alt="Logo">
                    <span style="font-size: 16px; font-family: 'Times New Roman';
                         font-weight: bold; text-align: center;">Pondok
                        Pesantren Al - Dairah
                    </span>
                </div>
                <h4 style="font-size: 21px; font-family: 'Times New Roman'; font-weight: normal; text-align: center;">
                    Laporan Hasil Diskusi Pelanggaran Santri
                </h4>
                <h4 style="font-size: 16px; font-family: 'Times New Roman'; font-weight: normal; text-align: center;">
                    Tanggal Hari ini :
                    <?php echo date('D, d/M/Y') ?>
                </h4>
                <div class="border-top border"></div>
                <?php
                    $id = array(htmlspecialchars($_GET['id'])); 
                    $row = $configs->prepare("SELECT laporan_diskusi.*, santri.nis, santri.nama_santri, pelanggaran.no_pelanggaran, pelanggaran.nama_pelanggaran, sanksi.no_sanksi, sanksi.nama_sanksi, keamanan.id_keamanan, keamanan.nama_keamanan, ketua.id_ketua, ketua.nama_ketua FROM laporan_diskusi inner join santri on laporan_diskusi.nama_santri = santri.nama_santri inner join pelanggaran on laporan_diskusi.no_pelanggaran = pelanggaran.no_pelanggaran inner join sanksi on laporan_diskusi.no_sanksi = sanksi.no_sanksi inner join keamanan on laporan_diskusi.id_keamanan = keamanan.id_keamanan inner join ketua on laporan_diskusi.id_ketua = ketua.id_ketua WHERE laporan_diskusi.id = ?");
                    $row -> execute($id);
                    $hasil = $row->fetchAll();
                    foreach($hasil as $isi){ 
                ?>
                <table class="table table-striped-columns">
                    <tbody>
                        <tr>
                            <td>Nomer Induk Santri</td>
                            <td><?php echo $isi['nis'] ?></td>
                        </tr>
                        <tr>
                            <td>Nama Santri</td>
                            <td><?php echo $isi['nama_santri'] ?></td>
                        </tr>
                        <tr>
                            <td>Pelanggaran</td>
                            <td><?php echo $isi['no_pelanggaran']." - ".$isi['nama_pelanggaran'] ?></td>
                        </tr>
                        <tr>
                            <td>Sanksi</td>
                            <td><?php echo $isi['no_sanksi']." - ".$isi['nama_sanksi'] ?></td>
                        </tr>
                        <tr>
                            <td>Ketua</td>
                            <td><?php echo $isi['id_ketua']." - ".$isi['nama_ketua'] ?></td>
                        </tr>
                        <tr>
                            <td>Petugas Keamanan</td>
                            <td><?php echo $isi['id_keamanan']." - ".$isi['nama_keamanan'] ?></td>
                        </tr>
                        <tr>
                            <td>Hasil Diskusi</td>
                            <td style="font-size: 16px; font-family: 'Times New Roman';
                         font-weight: normal; text-align: start;"><?php echo $isi['hasil_diskusi'] ?></td>
                        </tr>
                    </tbody>
                </table>
                <?php 
                    }
                ?>
                <footer class="footer">
                    &copy; Pondok Pesantren Al - Dairah
                </footer>
            </div>
        </div>
    </body>

</html>