<?php 
if($_SESSION["role"] == ""){
    echo "<script>
    alert('role atau jabatan tidak ditemukan.');
    document.location.href = '../auth/index.php';
    </script>";
    die;
    exit;    
}
?>

<?php 
if($_SESSION["role"] == "keamanan"){
?>
<!-- ======= Header ======= -->

<header id="header" class="header fixed-top d-flex align-items-center" style="position:fixed">
    <div class="d-flex align-items-center justify-content-between">
        <a href="" role="button" class="logo d-flex align-items-center fs-6 fst-normal fw-semibold">
            <img src="../../../assets/icon-128.jpg" alt="">
            Pondok Pesantren Al - Dairah
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto mx-3">
        <ul>
            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" role="button"
                    data-bs-toggle="dropdown" aria-controls="dropdown">
                    <i class="fa fa-user-alt"></i>
                    <span class="d-none d-md-block dropdown-toggle ps-2"></span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <div class="text-start">username : <?php echo $_SESSION['username'] ?></div>
                        <div class="mb-1"></div>
                        <div class="text-start">Jabatan : <?php echo $_SESSION['role'] ?></div>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="dropdown-header">
                        <a class="dropdown-item d-flex align-items-center"
                            onclick="return confirm('Apakah anda ingin ganti password akun anda ?')"
                            href="?page=pengguna&id=<?=$_SESSION['id_pengguna']?>">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Edit Account</span>
                        </a>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header>
<!-- ======= Header ======= -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link" href="?page=beranda" aria-current="page">
                <i class="fa fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="?page=keamanan" aria-current="page">
                        <i class="bi bi-circle"></i><span>Keamanan</span>
                    </a>
                </li>
                <li>
                    <a href="?page=ketua" aria-current="page">
                        <i class="bi bi-circle"></i><span>ketua</span>
                    </a>
                </li>
                <li>
                    <a href="?page=pelanggaran" aria-current="page">
                        <i class="bi bi-circle"></i><span>Pelanggaran</span>
                    </a>
                </li>
                <li>
                    <a href="?page=sanksi" aria-current="page">
                        <i class="bi bi-circle"></i><span>Sanksi</span>
                    </a>
                </li>
                <li>
                    <a href="?page=santri" aria-current="page">
                        <i class="bi bi-circle"></i><span>Santri</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" aria-current="page" href="?page=lihat-keamanan">
                <i class="fa fa-lock"></i>
                <span>Data Keamanan</span>
            </a>
        </li><!-- End Blank Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" aria-current="page" href="?page=lihat-ketua">
                <i class="fa fa-user-alt"></i>
                <span>Data Ketua</span>
            </a>
        </li><!-- End Blank Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" aria-current="page" href="?page=lihat-pelanggaran">
                <i class="fa fa-book"></i>
                <span>Data Pelanggaran</span>
            </a>
        </li><!-- End Blank Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" aria-current="page" href="?page=lihat-sanksi">
                <i class="fa fa-book"></i>
                <span>Data Sanksi</span>
            </a>
        </li><!-- End Blank Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" aria-current="page" href="?page=lihat-santri">
                <i class="fa fa-user-graduate"></i>
                <span>Data Santri</span>
            </a>
        </li><!-- End Blank Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" aria-current="page" href="?page=keluar"
                onclick="return confirm('Apakah anda ingin logout ?')">
                <i class="fa fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </li><!-- End Blank Page Nav -->
    </ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                </div>

            </div><!-- End Right side columns -->

        </div>
    </section>

    <?php
}else if($_SESSION["role"] == "ketua"){
?>
    <header id="header" class="header fixed-top d-flex align-items-center" style="position:fixed">
        <div class="d-flex align-items-center justify-content-between">
            <a href="" role="button" class="logo d-flex align-items-center fs-6 fst-normal fw-semibold">
                <img src="../../../assets/icon-128.jpg" alt="">
                Pondok Pesantren Al - Dairah
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto mx-3">
            <ul>
                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" role="button"
                        data-bs-toggle="dropdown" aria-controls="dropdown">
                        <i class="fa fa-user-alt"></i>
                        <span class="d-none d-md-block dropdown-toggle ps-2"></span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <div class="text-start">username : <?php echo $_SESSION['username'] ?></div>
                            <div class="mb-1"></div>
                            <div class="text-start">Jabatan : <?php echo $_SESSION['role'] ?></div>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="dropdown-header">
                            <a class="dropdown-item d-flex align-items-center"
                                onclick="return confirm('Apakah anda ingin ganti password akun anda ?')"
                                href="?page=pengguna&id=<?=$_SESSION['id_pengguna']?>">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Edit Account</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header>
    <!-- ======= Header ======= -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link" href="?page=beranda" aria-current="page">
                    <i class="fa fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Data Laporan</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="?page=laporan-pelanggaran" aria-current="page">
                            <i class="bi bi-circle"></i><span>Laporan Pelanggaran</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=laporan-diskusi" aria-current="page">
                            <i class="bi bi-circle"></i><span>Laporan Hasil Diskusi</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->


            <li class="nav-item">
                <a class="nav-link collapsed" aria-current="page" href="?page=lihat-ketua">
                    <i class="fa fa-user-alt"></i>
                    <span>Data Ketua</span>
                </a>
            </li><!-- End Blank Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" aria-current="page" href="?page=keluar"
                    onclick="return confirm('Apakah anda ingin logout ?')">
                    <i class="fa fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li><!-- End Blank Page Nav -->
        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">
        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">

                    </div>

                </div><!-- End Right side columns -->

            </div>
        </section>
        <?php
}else{
    echo "<script>
    document.location.href = '../auth/index.php';
    </script>";
    die;
    exit;
}
?>

        <a href="" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>