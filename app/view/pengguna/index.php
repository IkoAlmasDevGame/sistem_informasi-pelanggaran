<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Pengguna</title>
        <?php 
            if($_SESSION["role"] == "keamanan"){
                require_once("../ui/header.php");
            }else if($_SESSION["role"] == "ketua"){
                require_once("../ui/header.php");                
            }
        ?>
    </head>

    <body>
        <?php 
            require_once("../ui/sidebar.php");
        ?>
        <div class="p-auto m-5">
            <div class="container-fluid p-1">
                <div class="container-fluid py-2">
                    <div class="card">
                        <div class="form-group">
                            <?php 
                                $id = $_SESSION['id'];
                                $row = $configs->prepare("SELECT * FROM pengguna WHERE id = ?");
                                $row->execute(array($id));
                                $hasil = $row->fetchAll();
                                foreach($hasil as $isi){
                            ?>
                            <div class="card-header">
                                <h4 class="card-title fst-normal fw-normal">Edit Pengguna</h4>
                            </div>
                            <form action="?aksi=update" method="post">
                                <input type="hidden" name="id" value="<?=$id?>">
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <tr>
                                            <td>
                                                <label for="email">email :</label>
                                                <input type="email" name="email" id="email" class="form-control"
                                                    required aria-required="true" value="<?=$isi['email']?>"
                                                    placeholder="masukkan email baru anda ...">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="username">username :</label>
                                                <input type="text" name="username" id="username" class="form-control"
                                                    required aria-required="true" value="<?=$isi['username']?>"
                                                    placeholder="masukkan username baru anda ...">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="password">password :</label>
                                                <input type="password" name="password" id="password"
                                                    class="form-control" required aria-required="true"
                                                    placeholder="masukkan password baru anda ...">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="repassword">repassword :</label>
                                                <input type="password" name="repassword" id="repassword"
                                                    class="form-control" required aria-required="true"
                                                    placeholder="masukkan repassword baru anda ...">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="role">role :</label>
                                                <input type="radio" name="role" class="form-check-input" id="inputRadio"
                                                    <?php if($isi['role'] == "ketua"){?> checked value="ketua"
                                                    <?php } ?> required> Ketua
                                                <input type="radio" name="role" class="form-check-input" id="inputRadio"
                                                    <?php if($isi['role'] == "keamanan"){?> checked value="keamanan"
                                                    <?php } ?> required> Keamanan
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary hover">Update</button>
                                    </div>
                                </div>
                            </form>
                            <?php 
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            require_once("../ui/footer.php");
        ?>