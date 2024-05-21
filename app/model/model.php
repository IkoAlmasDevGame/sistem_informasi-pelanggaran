<?php 
namespace model;

class Pengguna {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function TableEdit($query,$id){
        $row = $this->db->prepare($query);
        $row->execute(array($id));
        return $row;
    }

    public function update($email,$username,$password,$repassword,$role,$id){
        $id = htmlspecialchars($_POST["id"]) ? htmlentities($_POST["id"]) : strip_tags($_POST["id"]);
        $email = htmlspecialchars($_POST["email"]) ? htmlentities($_POST["email"]) : strip_tags($_POST["email"]);
        $username = htmlspecialchars($_POST["username"]) ? htmlentities($_POST["username"]) : strip_tags($_POST["username"]);
        $password = htmlspecialchars($_POST["password"]) ? htmlentities($_POST["password"]) : strip_tags($_POST["password"]);
        $repassword = htmlspecialchars($_POST["repassword"]) ? htmlentities($_POST["repassword"]) : strip_tags($_POST["repassword"]);
        $role = htmlspecialchars($_POST["role"]) ? htmlentities($_POST["role"]) : strip_tags($_POST["role"]);

        if($email == "" || $username == "" || $password == "" || $repassword == "" || $role == ""){
            echo "<script>
            alert('data tidak boleh kosong ...'); 
            document.location.href = '../ui/header.php?page=beranda';
            </script>";
            die;
            exit;
        }

        $table = "pengguna";
        $sql = "UPDATE $table SET email = ?, username = ?, password = ?, repassword = ?, role = ? WHERE id = ?";
        $row = $this->db->prepare($sql);
        $cRegister = array($email,$username,$password,$repassword,$role,$id);
        if(in_array($row->execute($cRegister), $cRegister) === true){
            echo "<script>alert('berhasil membuat akun baru'); document.location.href = '../ui/header.php?page=beranda';</script>";
            die;
            exit;
            return true;
        }else{
            echo "<script>alert('gagal membuat akun baru'); document.location.href = '../ui/header.php?page=pengguna&id=<?=$id?>'
</script>";
die;
exit;
return false;
}
return $row;
}


public function SignIn($userInput,$password){
$userInput = htmlspecialchars($_POST["userEmail"]) ? htmlentities($_POST["userEmail"]) :
strip_tags($_POST["userEmail"]);
$password = htmlspecialchars($_POST["password"]) ? htmlentities($_POST["password"]) : strip_tags($_POST["password"]);
password_verify($password, PASSWORD_DEFAULT);

$sql = "SELECT * FROM pengguna WHERE email = '$userInput' and password = '$password' || username = '$userInput' and
repassword = '$password'";
$row = $this->db->prepare($sql);
$row->execute();
$cek = $row->rowCount();

if($cek > 0){
$response = array($userInput,$password);
$response["pengguna"] = $response;
if($db = $row->fetch()){
if($db["role"] == "keamanan"){
$_SESSION["status"] = true;
$_SESSION["id_pengguna"] = $db["id"];
$_SESSION["email"] = $db["email"];
$_SESSION["username"] = $db["username"];
$_SESSION["role"] = "keamanan";
echo "<script lang='javascript'>
alert('selamat datang di dashboard sistem informasi pelanggaran pondok pesantren al-dairah cilegon.');
document.location.href = '../ui/header.php?page=beranda';
</script>";
exit(0);
}else if($db["role"] == "ketua"){
$_SESSION["status"] = true;
$_SESSION["id_pengguna"] = $db["id"];
$_SESSION["email"] = $db["email"];
$_SESSION["username"] = $db["username"];
$_SESSION["role"] = "ketua";
echo "<script lang='javascript'>
alert('selamat datang di dashboard sistem informasi pelanggaran pondok pesantren al-dairah cilegon.');
document.location.href = '../ui/header.php?page=beranda';
</script>";
exit(0);
}
array_push($response["pengguna"], $db);
die;
return true;
}
}else{
$_SESSION["status"] = false;
echo "<script lang='javascript'>
document.location.href = '../auth/index.php';
</script>";
die;
return false;
}
}

public function Registerd($username,$email,$password,$repassword,$role){
$email = htmlspecialchars($_POST["email"]) ? htmlentities($_POST["email"]) : strip_tags($_POST["email"]);
$username = htmlspecialchars($_POST["username"]) ? htmlentities($_POST["username"]) : strip_tags($_POST["username"]);
$password = htmlspecialchars($_POST["password"]) ? htmlentities($_POST["password"]) : strip_tags($_POST["password"]);
$repassword = htmlspecialchars($_POST["repassword"]) ? htmlentities($_POST["repassword"]) :
strip_tags($_POST["repassword"]);
$role = htmlspecialchars($_POST["role"]) ? htmlentities($_POST["role"]) : strip_tags($_POST["role"]);

if($email == "" || $username == "" || $password == "" || $repassword == "" || $role == ""){
echo "<script>
alert('data tidak boleh kosong ...');
document.location.href = '../auth/register.php';
</script>";
die;
exit;
}

$table = "pengguna";
$sql = "INSERT INTO $table (username,email,password,repassword,role) VALUES (?,?,?,?,?)";
$row = $this->db->prepare($sql);
$cRegister = array($username,$email,$password,$repassword,$role);
if(in_array($row->execute($cRegister), $cRegister) === true){
echo "<script>
alert('berhasil membuat akun baru');
document.location.href = '../auth/register.php';
</script>";
die;
exit;
return true;
}else{
echo "<script>
alert('gagal membuat akun baru');
document.location.href = '../auth/register.php';
</script>";
die;
exit;
return false;
}
return $row;
}
}


class Santri {
protected $db;
public function __construct($db)
{
$this->db = $db;
}

public function Table($query){
$row = $this->db->prepare($query);
$row->execute();
return $row;
}

public function TableEdit($query,$id){
$row = $this->db->prepare($query);
$row->execute(array($id));
return $row;
}

public function hitung(){
$row = $this->db->prepare("SELECT count(id_santri) as jumlah FROM santri order by id_santri asc");
$row->execute();
$hasil = $row->fetch();
return $hasil;
}

public function create($nis,$nama,$alamat,$jenis_kelamin,$no_pelanggaran,$no_sanksi){
$nis = htmlspecialchars($_POST["nis"]) ? htmlentities($_POST["nis"]) : strip_tags($_POST["nis"]);
$nama = htmlspecialchars($_POST["nama_santri"]) ? htmlentities($_POST["nama_santri"]) :
strip_tags($_POST["nama_santri"]);
$alamat = htmlspecialchars($_POST["alamat"]) ? htmlentities($_POST["alamat"]) : strip_tags($_POST["alamat"]);
$jenis_kelamin = htmlspecialchars($_POST["jenis_kelamin"]) ? htmlentities($_POST["jenis_kelamin"]) :
strip_tags($_POST["jenis_kelamin"]);
$no_pelanggaran = htmlspecialchars($_POST["no_pelanggaran"]) ? htmlentities($_POST["no_pelanggaran"]) :
strip_tags($_POST["no_pelanggaran"]);
$no_sanksi = htmlspecialchars($_POST["no_sanksi"]) ? htmlentities($_POST["no_sanksi"]) :
strip_tags($_POST["no_sanksi"]);

$table = "santri";
$sql = "INSERT INTO $table (nis,nama_santri,alamat,jenis_kelamin,no_pelanggaran,no_sanksi) VALUES (?,?,?,?,?,?)";
$row = $this->db->prepare($sql);
$cSantri = array($nis,$nama,$alamat,$jenis_kelamin,$no_pelanggaran,$no_sanksi);
$aSantri[$table] = $cSantri;
array_push($aSantri[$table], $cSantri);

$this->db->prepare("INSERT INTO laporan_diskusi (nama_santri,no_pelanggaran,no_sanksi) VALUES
(?,?,?)")->execute(array($nama,$no_pelanggaran,$no_sanksi));

if($row->execute($cSantri) === true){
echo "<script>
alert('anda berhasil menambahkan data santri untuk pelanggaran');
document.location.href = '../ui/header.php?page=santri';
</script>";
die;
exit;
}else{
echo "<script>
alert('anda gagal menambahkan data santri untuk pelanggaran');
document.location.href = '../ui/header.php?page=santri';
</script>";
die;
exit;
}
return $row;
}

public function update($nis,$nama,$alamat,$jenis_kelamin,$no_pelanggaran,$no_sanksi,$id){
$id = htmlspecialchars($_POST["id"]) ? htmlentities($_POST["id"]) : strip_tags($_POST["id"]);
$nis = htmlspecialchars($_POST["nis"]) ? htmlentities($_POST["nis"]) : strip_tags($_POST["nis"]);
$nama = htmlspecialchars($_POST["nama_santri"]) ? htmlentities($_POST["nama_santri"]) :
strip_tags($_POST["nama_santri"]);
$alamat = htmlspecialchars($_POST["alamat"]) ? htmlentities($_POST["alamat"]) : strip_tags($_POST["alamat"]);
$jenis_kelamin = htmlspecialchars($_POST["jenis_kelamin"]) ? htmlentities($_POST["jenis_kelamin"]) :
strip_tags($_POST["jenis_kelamin"]);
$no_pelanggaran = htmlspecialchars($_POST["no_pelanggaran"]) ? htmlentities($_POST["no_pelanggaran"]) :
strip_tags($_POST["no_pelanggaran"]);
$no_sanksi = htmlspecialchars($_POST["no_sanksi"]) ? htmlentities($_POST["no_sanksi"]) :
strip_tags($_POST["no_sanksi"]);

$table = "santri";
$sql = "UPDATE $table SET nis = ?, nama_santri = ?, alamat = ?, jenis_kelamin = ?, no_pelanggaran = ?, no_sanksi = ?
WHERE id_santri = ?";
$row = $this->db->prepare($sql);
$cSantri = array($nis,$nama,$alamat,$jenis_kelamin,$no_pelanggaran,$no_sanksi,$id);
$aSantri[$table] = $cSantri;
array_push($aSantri[$table], $cSantri);

if($row->execute($cSantri) === true){
echo "<script>
alert('anda berhasil ubah data santri untuk pelanggaran');
document.location.href = '../ui/header.php?page=santri';
</script>";
die;
exit;
}else{
echo "<script>
alert('anda gagal ubah data santri untuk pelanggaran');
document.location.href = '../ui/header.php?page=santri';
</script>";
die;
exit;
}
return $row;
}

public function delete($id){
$id = htmlspecialchars($_GET["id"]) ? htmlentities($_GET["id"]) : strip_tags($_GET["id"]);

$table = "santri";
$sql = "DELETE FROM $table WHERE id_santri = ?";
$row = $this->db->prepare($sql);
$cSantri = array($id);

if($row->execute($cSantri) === true){
echo "<script>
alert('anda berhasil hapus data santri untuk pelanggaran');
document.location.href = '../ui/header.php?page=santri';
</script>";
die;
exit;
}else{
echo "<script>
alert('anda gagal hapus data santri untuk pelanggaran');
document.location.href = '../ui/header.php?page=santri';
</script>";
die;
exit;
}
uniqid($cSantri."".$id);
return $row;
}
}

class Pelanggaran {
protected $db;
public function __construct($db)
{
$this->db = $db;
}

public function Table($query){
$row = $this->db->prepare($query);
$row->execute();
return $row;
}

public function TableEdit($query,$id){
$row = $this->db->prepare($query);
$row->execute(array($id));
return $row;
}

public function create($no_pelanggaran,$nama,$no_sanksi,$id_keamanan){
$no_pelanggaran = htmlspecialchars($_POST['no_pelanggaran']) ? htmlentities($_POST['no_pelanggaran']) :
strip_tags($_POST['no_pelanggaran']);
$nama = htmlspecialchars($_POST['nama_pelanggaran']) ? htmlentities($_POST['nama_pelanggaran']) :
strip_tags($_POST['nama_pelanggaran']);
$no_sanksi = htmlspecialchars($_POST['no_sanksi']) ? htmlentities($_POST['no_sanksi']) :
strip_tags($_POST['no_sanksi']);
$id_keamanan = htmlspecialchars($_POST['id_keamanan']) ? htmlentities($_POST['id_keamanan']) :
strip_tags($_POST['id_keamanan']);

$table = "pelanggaran";
$sql = "INSERT INTO $table (no_pelanggaran,nama_pelanggaran,no_sanksi,id_keamanan) VALUES (?,?,?,?)";
$row = $this->db->prepare($sql);
$cpelanggaran = array($no_pelanggaran,$nama,$no_sanksi,$id_keamanan);
$apelanggaran[$table] = $cpelanggaran;
array_push($apelanggaran[$table], $cpelanggaran);

if($row->execute($cpelanggaran) === true){
echo "<script>
alert('anda berhasil menambahkan data pelanggaran untuk pelanggaran');
document.location.href = '../ui/header.php?page=pelanggaran';
</script>";
die;
exit;
}else{
echo "<script>
alert('anda gagal menambahkan data pelanggaran untuk pelanggaran');
document.location.href = '../ui/header.php?page=pelanggaran';
</script>";
die;
exit;
}
return $row;
}

public function update($no_pelanggaran,$nama,$no_sanksi,$id_keamanan,$id){
$id = htmlspecialchars($_POST['id']) ? htmlentities($_POST['id']) : strip_tags($_POST['id']);
$no_pelanggaran = htmlspecialchars($_POST['no_pelanggaran']) ? htmlentities($_POST['no_pelanggaran']) :
strip_tags($_POST['no_pelanggaran']);
$nama = htmlspecialchars($_POST['nama_pelanggaran']) ? htmlentities($_POST['nama_pelanggaran']) :
strip_tags($_POST['nama_pelanggaran']);
$no_sanksi = htmlspecialchars($_POST['no_sanksi']) ? htmlentities($_POST['no_sanksi']) :
strip_tags($_POST['no_sanksi']);
$id_keamanan = htmlspecialchars($_POST['id_keamanan']) ? htmlentities($_POST['id_keamanan']) :
strip_tags($_POST['id_keamanan']);

$table = "pelanggaran";
$sql = "UPDATE $table SET no_pelanggaran = ?, nama_pelanggaran = ?, no_sanksi = ?, id_keamanan = ? WHERE id_pelanggaran
= ?";
$row = $this->db->prepare($sql);
$cpelanggaran = array($no_pelanggaran,$nama,$no_sanksi,$id_keamanan,$id);
$apelanggaran[$table] = $cpelanggaran;
array_push($apelanggaran[$table], $cpelanggaran);

if($row->execute($cpelanggaran) === true){
echo "<script>
alert('anda berhasil ubah data pelanggaran untuk pelanggaran');
document.location.href = '../ui/header.php?page=pelanggaran';
</script>";
die;
exit;
}else{
echo "<script>
alert('anda gagal ubah data pelanggaran untuk pelanggaran');
document.location.href = '../ui/header.php?page=pelanggaran';
</script>";
die;
exit;
}
return $row;
}

public function delete($id){
$id = htmlspecialchars($_GET["id"]) ? htmlentities($_GET["id"]) : strip_tags($_GET["id"]);

$table = "pelanggaran";
$sql = "DELETE FROM $table WHERE id_pelanggaran = ?";
$row = $this->db->prepare($sql);
$cpelanggaran = array($id);

if($row->execute($cpelanggaran) === true){
echo "<script>
alert('anda berhasil hapus data pelanggaran untuk pelanggaran');
document.location.href = '../ui/header.php?page=pelanggaran';
</script>";
die;
exit;
}else{
echo "<script>
alert('anda gagal hapus data pelanggaran untuk pelanggaran');
document.location.href = '../ui/header.php?page=pelanggaran';
</script>";
die;
exit;
}
uniqid($cpelanggaran."".$id);
return $row;
}
}

class Ketua {
protected $db;
public function __construct($db)
{
$this->db = $db;
}

public function Table($query){
$row = $this->db->prepare($query);
$row->execute();
return $row;
}

public function TableEdit($query,$id){
$row = $this->db->prepare($query);
$row->execute(array($id));
return $row;
}

public function create($id_ketua, $nama_ketua, $alamat, $no_hp){
$id_ketua = htmlspecialchars($_POST["id_ketua"]) ? htmlentities($_POST["id_ketua"]) : strip_tags($_POST["id_ketua"]);
$nama_ketua = htmlspecialchars($_POST["nama_ketua"]) ? htmlentities($_POST["nama_ketua"]) :
strip_tags($_POST["nama_ketua"]);
$alamat = htmlspecialchars($_POST["alamat"]) ? htmlentities($_POST["alamat"]) : strip_tags($_POST["alamat"]);
$no_hp = htmlspecialchars($_POST["no_hp"]) ? htmlentities($_POST["no_hp"]) : strip_tags($_POST["no_hp"]);

$table = "ketua";
$sql = "INSERT INTO $table (id_ketua,nama_ketua,alamat,no_hp) VALUES (?,?,?,?)";
$row = $this->db->prepare($sql);
$cKetua = array($id_ketua, $nama_ketua, $alamat, $no_hp);
$aKetua[$table] = $cKetua;
array_push($aKetua[$table],$cKetua);

if($row->execute($cKetua) === true){
echo "<script>
alert('anda berhasil menambahkan data ketua untuk pelanggaran');
document.location.href = '../ui/header.php?page=ketua';
</script>";
die;
exit;
}else{
echo "<script>
alert('anda gagal menambahkan data ketua untuk pelanggaran');
document.location.href = '../ui/header.php?page=ketua';
</script>";
die;
exit;
}
return $row;
}

public function update($id_ketua, $nama_ketua, $alamat, $no_hp, $id){
$id = htmlspecialchars($_POST["id"]) ? htmlentities($_POST["id"]) : strip_tags($_POST["id"]);
$id_ketua = htmlspecialchars($_POST["id_ketua"]) ? htmlentities($_POST["id_ketua"]) : strip_tags($_POST["id_ketua"]);
$nama_ketua = htmlspecialchars($_POST["nama_ketua"]) ? htmlentities($_POST["nama_ketua"]) :
strip_tags($_POST["nama_ketua"]);
$alamat = htmlspecialchars($_POST["alamat"]) ? htmlentities($_POST["alamat"]) : strip_tags($_POST["alamat"]);
$no_hp = htmlspecialchars($_POST["no_hp"]) ? htmlentities($_POST["no_hp"]) : strip_tags($_POST["no_hp"]);

$table = "ketua";
$sql = "UPDATE $table SET id_ketua = ?, nama_ketua = ?, alamat = ?, no_hp = ? WHERE id = ?";
$row = $this->db->prepare($sql);
$cKetua = array($id_ketua, $nama_ketua, $alamat, $no_hp, $id);
$aKetua[$table] = $cKetua;
array_push($aKetua[$table],$cKetua);

if($row->execute($cKetua) === true){
echo "<script>
alert('anda berhasil ubah data ketua untuk pelanggaran');
document.location.href = '../ui/header.php?page=ketua';
</script>";
die;
exit;
}else{
echo "<script>
alert('anda gagal ubah data ketua untuk pelanggaran');
document.location.href = '../ui/header.php?page=ketua';
</script>";
die;
exit;
}
return $row;
}

public function delete($id){
$id = htmlspecialchars($_GET["id"]) ? htmlentities($_GET["id"]) : strip_tags($_GET["id"]);

$table = "ketua";
$sql = "DELETE FROM $table WHERE id = ?";
$row = $this->db->prepare($sql);
$cKetua = array($id);

if($row->execute($cKetua) === true){
echo "<script>
alert('anda berhasil hapus data ketua untuk pelanggaran');
document.location.href = '../ui/header.php?page=ketua';
</script>";
die;
exit;
}else{
echo "<script>
alert('anda gagal hapus data ketua untuk pelanggaran');
document.location.href = '../ui/header.php?page=ketua';
</script>";
die;
exit;
}
uniqid($cKetua."".$id);
return $row;
}
}

class Keamanan {
protected $db;
public function __construct($db)
{
$this->db = $db;
}

public function Table($query){
$row = $this->db->prepare($query);
$row->execute();
return $row;
}

public function TableEdit($query,$id){
$row = $this->db->prepare($query);
$row->execute(array($id));
return $row;
}

public function create($id_keamanan,$id_ketua,$nama,$alamat,$no_hp){
$id_keamanan = htmlspecialchars($_POST["id_keamanan"]) ? htmlentities($_POST["id_keamanan"]) :
strip_tags($_POST["id_keamanan"]);
$id_ketua = htmlspecialchars($_POST["id_ketua"]) ? htmlentities($_POST["id_ketua"]) : strip_tags($_POST["id_ketua"]);
$nama = htmlspecialchars($_POST["nama_keamanan"]) ? htmlentities($_POST["nama_keamanan"]) :
strip_tags($_POST["nama_keamanan"]);
$alamat = htmlspecialchars($_POST["alamat"]) ? htmlentities($_POST["alamat"]) : strip_tags($_POST["alamat"]);
$no_hp = htmlspecialchars($_POST["no_hp"]) ? htmlentities($_POST["no_hp"]) : strip_tags($_POST["no_hp"]);

$table = "keamanan";
$sql = "INSERT INTO $table (id_keamanan,id_ketua,nama_keamanan,alamat,no_hp) VALUES (?,?,?,?,?)";
$row = $this->db->prepare($sql);
$cKeamanan = array($id_keamanan,$id_ketua,$nama,$alamat,$no_hp);
$aKeamanan[$table] = $cKeamanan;
array_push($aKeamanan[$table], $cKeamanan);

if($row->execute($cKeamanan) === true){
echo "<script>
alert('anda berhasil menambahkan data keamanan untuk pelanggaran');
document.location.href = '../ui/header.php?page=keamanan';
</script>";
die;
exit;
}else{
echo "<script>
alert('anda gagal menambahkan data keamanan untuk pelanggaran');
document.location.href = '../ui/header.php?page=keamanan';
</script>";
die;
exit;
}
return $row;
}

public function update($id_keamanan,$id_ketua,$nama,$alamat,$no_hp,$id){
$id = htmlspecialchars($_POST["id"]) ? htmlentities($_POST["id"]) : strip_tags($_POST["id"]);
$id_keamanan = htmlspecialchars($_POST["id_keamanan"]) ? htmlentities($_POST["id_keamanan"]) :
strip_tags($_POST["id_keamanan"]);
$id_ketua = htmlspecialchars($_POST["id_ketua"]) ? htmlentities($_POST["id_ketua"]) : strip_tags($_POST["id_ketua"]);
$nama = htmlspecialchars($_POST["nama_keamanan"]) ? htmlentities($_POST["nama_keamanan"]) :
strip_tags($_POST["nama_keamanan"]);
$alamat = htmlspecialchars($_POST["alamat"]) ? htmlentities($_POST["alamat"]) : strip_tags($_POST["alamat"]);
$no_hp = htmlspecialchars($_POST["no_hp"]) ? htmlentities($_POST["no_hp"]) : strip_tags($_POST["no_hp"]);

$table = "keamanan";
$sql = "UPDATE $table SET id_keamanan = ?, id_ketua = ?, nama_keamanan = ?, alamat = ?, no_hp = ? WHERE id = ?";
$row = $this->db->prepare($sql);
$cKeamanan = array($id_keamanan,$id_ketua,$nama,$alamat,$no_hp,$id);
$aKeamanan[$table] = $cKeamanan;
array_push($aKeamanan[$table], $cKeamanan);

if($row->execute($cKeamanan) === true){
echo "<script>
alert('anda berhasil ubah data keamanan untuk pelanggaran');
document.location.href = '../ui/header.php?page=keamanan';
</script>";
die;
exit;
}else{
echo "<script>
alert('anda gagal ubah data keamanan untuk pelanggaran');
document.location.href = '../ui/header.php?page=keamanan';
</script>";
die;
exit;
}
return $row;
}

public function delete($id){
$id = htmlspecialchars($_GET["id"]) ? htmlentities($_GET["id"]) : strip_tags($_GET["id"]);

$table = "keamanan";
$sql = "DELETE FROM $table WHERE id = ?";
$row = $this->db->prepare($sql);
$cKeamanan = array($id);

if($row->execute($cKeamanan) === true){
echo "<script>
alert('anda berhasil hapus data keamanan untuk pelanggaran');
document.location.href = '../ui/header.php?page=keamanan';
</script>";
die;
exit;
}else{
echo "<script>
alert('anda gagal hapus data keamanan untuk pelanggaran');
document.location.href = '../ui/header.php?page=keamanan';
</script>";
die;
exit;
}
uniqid($cKeamanan."".$id);
return $row;
}
}

class Sanksi {
protected $db;
public function __construct($db)
{
$this->db = $db;
}

public function Table($query){
$row = $this->db->prepare($query);
$row->execute();
return $row;
}

public function TableEdit($query,$id){
$row = $this->db->prepare($query);
$row->execute(array($id));
return $row;
}

public function create($no_sanksi,$nama_sanksi,$jenis_sanksi){
$no_sanksi = htmlspecialchars($_POST["no_sanksi"]) ? htmlentities($_POST["no_sanksi"]) :
strip_tags($_POST["no_sanksi"]);
$nama_sanksi = htmlspecialchars($_POST["nama_sanksi"]) ? htmlentities($_POST["nama_sanksi"]) :
strip_tags($_POST["nama_sanksi"]);
$jenis_sanksi = htmlspecialchars($_POST["jenis_sanksi"]) ? htmlentities($_POST["jenis_sanksi"]) :
strip_tags($_POST["jenis_sanksi"]);

$table = "sanksi";
$sql = "INSERT INTO $table (no_sanksi,nama_sanksi,jenis_sanksi) VALUES (?,?,?)";
$row = $this->db->prepare($sql);
$csanksi = array($no_sanksi,$nama_sanksi,$jenis_sanksi);
$asanksi[$table] = $csanksi;
array_push($asanksi[$table], $csanksi);

if($row->execute($csanksi) === true){
echo "<script>
alert('anda berhasil menambahkan data sanksi untuk pelanggaran');
document.location.href = '../ui/header.php?page=sanksi';
</script>";
die;
exit;
}else{
echo "<script>
alert('anda gagal menambahkan data sanksi untuk pelanggaran');
document.location.href = '../ui/header.php?page=sanksi';
</script>";
die;
exit;
}
return $row;
}

public function update($no_sanksi,$nama_sanksi,$jenis_sanksi,$id){
$id = htmlspecialchars($_POST["id"]) ? htmlentities($_POST["id"]) : strip_tags($_POST["id"]);
$no_sanksi = htmlspecialchars($_POST["no_sanksi"]) ? htmlentities($_POST["no_sanksi"]) :
strip_tags($_POST["no_sanksi"]);
$nama_sanksi = htmlspecialchars($_POST["nama_sanksi"]) ? htmlentities($_POST["nama_sanksi"]) :
strip_tags($_POST["nama_sanksi"]);
$jenis_sanksi = htmlspecialchars($_POST["jenis_sanksi"]) ? htmlentities($_POST["jenis_sanksi"]) :
strip_tags($_POST["jenis_sanksi"]);

$table = "sanksi";
$sql = "UPDATE $table SET no_sanksi = ?, nama_sanksi = ?, jenis_sanksi = ? WHERE id_sanksi = ?";
$row = $this->db->prepare($sql);
$csanksi = array($no_sanksi,$nama_sanksi,$jenis_sanksi,$id);
$asanksi[$table] = $csanksi;
array_push($asanksi[$table], $csanksi);

if($row->execute($csanksi) === true){
echo "<script>
alert('anda berhasil ubah data sanksi untuk pelanggaran');
document.location.href = '../ui/header.php?page=sanksi';
</script>";
die;
exit;
}else{
echo "<script>
alert('anda gagal ubah data sanksi untuk pelanggaran');
document.location.href = '../ui/header.php?page=sanksi';
</script>";
die;
exit;
}
return $row;
}

public function delete(){
$id = htmlspecialchars($_GET["id"]) ? htmlentities($_GET["id"]) : strip_tags($_GET["id"]);

$table = "sanksi";
$sql = "DELETE FROM $table WHERE id_sanksi = ?";
$row = $this->db->prepare($sql);
$csanksi = array($id);

if($row->execute($csanksi) === true){
echo "<script>
alert('anda berhasil hapus data sanksi untuk pelanggaran');
document.location.href = '../ui/header.php?page=sanksi';
</script>";
die;
exit;
}else{
echo "<script>
alert('anda gagal hapus data sanksi untuk pelanggaran');
document.location.href = '../ui/header.php?page=sanksi';
</script>";
die;
exit;
}
uniqid($csanksi."".$id);
return $row;
}
}

class Laporan {
protected $db;
public function __construct($db)
{
$this->db = $db;
}

public function Table($query){
$row = $this->db->prepare($query);
$row->execute();
return $row;
}
}

class Diskusi {
protected $db;
public function __construct($db)
{
$this->db = $db;
}

public function Table($query){
$row = $this->db->prepare($query);
$row->execute();
return $row;
}

public function TableEdit($query,$id){
$row = $this->db->prepare($query);
$row->execute(array($id));
return $row;
}

public function update($hasil_diskusi, $id_keamanan, $id_ketua, $id){
$id = htmlspecialchars($_POST["id"]) ? htmlentities($_POST["id"]) : strip_tags($_POST["id"]);
$id_keamanan = htmlspecialchars($_POST["id_keamanan"]) ? htmlentities($_POST["id_keamanan"]) :
strip_tags($_POST["id_keamanan"]);
$id_ketua = htmlspecialchars($_POST["id_ketua"]) ? htmlentities($_POST["id_ketua"]) : strip_tags($_POST["id_ketua"]);
$hasil_diskusi = htmlspecialchars($_POST["hasil_diskusi"]) ? htmlentities($_POST["hasil_diskusi"]) :
strip_tags($_POST["hasil_diskusi"]);

$table = "laporan_diskusi";
$sql = "UPDATE $table SET hasil_diskusi = ?, id_keamanan = ?, id_ketua = ? WHERE id = ?";
$row = $this->db->prepare($sql);
$cDiskusi = array($hasil_diskusi, $id_keamanan, $id_ketua, $id);
$aDiskusi[$table] = $cDiskusi;
array_push($aDiskusi[$table],$cDiskusi);

if($row->execute($cDiskusi) === true){
echo "<script>
document.location.href = '../ui/header.php?page=laporan-diskusi'
</script>";
die;
exit;
}else{
echo "<script>
document.location.href = '../ui/header.php?page=laporan-diskusi'
</script>";
die;
exit;
}
return $row;
}
}
?>