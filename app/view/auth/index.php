<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistem Informasi Pelanggaran</title>
        <meta name="description" content="Sistem Informasi Pelanggaran Pondok Pesantren Al-Dairah Cilegon">
        <meta name="description" content="Make Website @copyright 2024">
        <link rel="shortcut icon" href="../../../assets/icon.jpg" type="image/x-icon">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <style type="text/css">
        * {
            box-sizing: border-box;
            font-family: monospace;
            font-style: normal;
        }

        body {
            background-color: gray;
            background-blend-mode: darken;
        }

        .card {
            width: 600px;
        }

        .card-body {
            height: 360px;
        }

        @media (max-height: 500px) {
            .card-body {
                max-height: 500px;
            }
        }

        @media (max-width: 720px) {
            .card {
                max-width: 720px;
            }
        }
        </style>
    </head>

    <body>
        <div class="layout">
            <div class="container-fluid pt-5 mt-5">
                <div class="d-grid justify-content-center align-items-center flex-wrap">
                    <div class="container-fluid bg-body-secondary p-5 m-5 mx-auto rounded-1">
                        <div class="card">
                            <div class="d-flex justify-content-center align-items-center flex-wrap gap-1">
                                <div class="m-4 p-4">
                                    <div class="row">
                                        <div class="img-fluid">
                                            <img src="../../../assets/icon-128.jpg" class="img-responsive ps-5 ms-2"
                                                width="" alt="logo">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h4 class="display-4 fs-6 fw-normal fst-normal
                                 text-center mt-2 mt-lg-0 pt-4 shadow-sm">
                                        Sistem Informasi Pelanggaran</h4>
                                    <h4 class="display-4 fs-6 fw-normal fst-normal
                                 text-center mt-3">
                                        Pondok Pesantren Al-Dairah Cilegon</h4>
                                    <?php 
                                        require_once("../../database/koneksi.php");
                                        require_once("../../controller/controller.php");
                                        require_once("../../model/model.php");

                                        $Auth = new controller\AuthPengguna($configs);
                                        
                                        if(!isset($_GET["act"])){
                                            require_once("../../controller/controller.php");
                                            require_once("../../model/model.php");
                                        }else{
                                            switch ($_GET["act"]) {
                                                case 'signin':
                                                    $Auth->AuthSignIn();
                                                    break;
                                                
                                                default:
                                                    require_once("../../controller/controller.php");
                                                    require_once("../../model/model.php");
                                                    break;
                                            }
                                        }
                                    ?>
                                    <form action="?act=signin" method="post">
                                        <table class="table">
                                            <tr>
                                                <td>
                                                    <label for="userEmail">username / email :</label>
                                                    <input type="text" name="userEmail" id="userEmail"
                                                        class="form-control" required aria-required="true"
                                                        placeholder="masukkan username atau email anda ...">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="password">password :</label>
                                                    <input type="password" name="password" id="password"
                                                        class="form-control" required aria-required="true"
                                                        placeholder="masukkan password anda ...">
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="card-footer text-center">
                                            <a href="register.php" role="button" class="btn btn-link text-decoration-none
                                             hover text-primary">membuat akun baru</a>
                                            <br>
                                            <button type="submit" class="btn btn-secondary hover">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js">
        </script>
    </body>

</html>