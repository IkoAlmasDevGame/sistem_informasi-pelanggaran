<?php 
require_once("../ui/header.php");
require_once("../ui/sidebar.php");
?>

<div class="m-5 p-auto">
    <div class="container-fluid p-1">
        <div class="container-fluid py-5">
            <div class="panel panel-default">
                <div class="panel-body bg-body-tertiary">
                    <h4 class="panel-heading fs-1 text-muted display-4">Dashboard</h4>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center flex-wrap gap-5">
                <!-- Total Santri -->
                <div class="card card-width">
                    <div class="card-header">
                        <h4 class="card-title fs-5 fw-normal text-center">Total Santri</h4>
                    </div>
                    <div class="card-body card-height">
                        <div class="card-comments">
                            <div class="d-grid justify-content-center align-items-center">
                                <div class="m-5 p-auto mt-5 mt-lg-5 pt-5
                                 pt-lg-5 fs-2 fst-normal fw-normal">
                                    <?php $hasil = $jumlah->hitung(); echo $hasil['jumlah'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <p class="text-center text-muted fs-6">Total Jumlah Santri</p>
                        <p class="fs-6 text-center">Pondok Pesantren Al - Dairah Cilegon</p>
                    </div>
                </div>
                <?php 
                    require_once("../ui/kalender.php");
                ?>
            </div>
        </div>
    </div>
</div>

<?php 
require_once("../ui/footer.php");
?>