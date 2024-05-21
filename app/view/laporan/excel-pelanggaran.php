<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Export To Excel</title>
        <?php 
            if($_SESSION['role'] == "ketua"){
                require_once("../ui/header.php");
                require_once("../../database/koneksi.php");
                
                header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
                header("Content-Disposition: attachment; filename=data-laporan-pelanggaran.xls"); 
                header("Expires: 0");
                header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
                header("Cache-Control: private",false);
            }else{
                header("location:../ui/header.php?page=beranda");
            }
        ?>
    </head>

    <body>
        <div class="container-fluid p-5">
            <div class="container-fluid py-2 border border-1" style="border-radius: 5px;">
                <h4 class="fs-4 fst-normal fw-normal text-start">
                    <?php echo "Laporan Pelanggaran Santri"; ?>
                </h4>
                <h4 class="display-5 fs-5 fst-normal fw-normal text-end">Tanggal Hari ini :
                    <?php echo date('D, d/M/Y') ?>
                </h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="font-size: 14px; font-family: 'Times New Roman'; font-weight: normal;">No</th>
                            <th style="font-size: 14px; font-family: 'Times New Roman'; font-weight: normal;">Nama
                                Santri</th>
                            <th style="font-size: 14px; font-family: 'Times New Roman'; font-weight: normal;">Nama
                                Keamanan</th>
                            <th style="font-size: 14px; font-family: 'Times New Roman'; font-weight: normal;">Nama Ketua
                            </th>
                            <th style="font-size: 14px; font-family: 'Times New Roman'; font-weight: normal;">
                                Pelanggaran</th>
                            <th style="font-size: 14px; font-family: 'Times New Roman'; font-weight: normal;">Sanksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            $row = $configs->prepare("SELECT laporan_diskusi.*, santri.nis, santri.nama_santri, pelanggaran.no_pelanggaran, pelanggaran.nama_pelanggaran, sanksi.no_sanksi, sanksi.nama_sanksi, keamanan.id_keamanan, keamanan.nama_keamanan, ketua.id_ketua, ketua.nama_ketua FROM laporan_diskusi inner join santri on laporan_diskusi.nama_santri = santri.nama_santri inner join pelanggaran on laporan_diskusi.no_pelanggaran = pelanggaran.no_pelanggaran inner join sanksi on laporan_diskusi.no_sanksi = sanksi.no_sanksi left join keamanan on laporan_diskusi.id_keamanan = keamanan.id_keamanan left join ketua on laporan_diskusi.id_ketua = ketua.id_ketua order by id asc");
                            $row->execute();
                            $hasil = $row->fetchAll();
                            foreach($hasil as $isi){
                            ?>
                        <tr>
                            <td style="font-size: 14px; font-family: 'Times New Roman'; font-weight: normal;"
                                class="text-center"><?php echo $no; ?></td>
                            <td style="font-size: 14px; font-family: 'Times New Roman'; font-weight: normal;">
                                <?php echo $isi["nis"]." - ".$isi["nama_santri"] ?></td>
                            <td style="font-size: 14px; font-family: 'Times New Roman'; font-weight: normal;">
                                <?php echo $isi["id_keamanan"]." - ".$isi["nama_keamanan"] ?></td>
                            <td style="font-size: 14px; font-family: 'Times New Roman'; font-weight: normal;">
                                <?php echo $isi["id_ketua"]." - ".$isi["nama_ketua"] ?></td>
                            <td style="font-size: 14px; font-family: 'Times New Roman'; font-weight: normal;">
                                <?php echo $isi["no_pelanggaran"]." - ".$isi["nama_pelanggaran"] ?></td>
                            <td style="font-size: 14px; font-family: 'Times New Roman'; font-weight: normal;">
                                <?php echo $isi["no_sanksi"]." - ".$isi["nama_sanksi"] ?></td>
                        </tr>
                        <?php
                        $no++;
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php 
            require_once("../ui/footer.php");
        ?>

</html>