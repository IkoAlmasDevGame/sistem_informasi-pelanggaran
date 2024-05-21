<?php 
if(isset($_SESSION["status"])){
    if(isset($_SESSION["id_pengguna"])){
        if(isset($_SESSION["email"])){
            if(isset($_SESSION["username"])){
                if(isset($_SESSION["role"])){
                    
                }                              
            }          
        }
    }
}else{
    echo "<script lang='javascript'>
    window.setTimeout(() => {
        alert('Maaf anda gagal masuk ke halaman utama ...'),
        document.location.href='../auth/index.php'
    }, 3000);
    </script>
    ";
    die;
    exit;
}
?>