<?php 
namespace controller;

use model\Pengguna;
class AuthPengguna {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new Pengguna($konfig);
    }

    public function EditTable($query,$id){
        $row = $this->konfig->TableEdit($query,$id);
        $row->execute(array($id));
        $hasil = $row->fetchAll();
        return $hasil;
    }

    public function Register(){
        $email = htmlspecialchars($_POST["email"]) ? htmlentities($_POST["email"]) : strip_tags($_POST["email"]);
        $username = htmlspecialchars($_POST["username"]) ? htmlentities($_POST["username"]) : strip_tags($_POST["username"]);
        $password = htmlspecialchars($_POST["password"]) ? htmlentities($_POST["password"]) : strip_tags($_POST["password"]);
        $repassword = htmlspecialchars($_POST["repassword"]) ? htmlentities($_POST["repassword"]) : strip_tags($_POST["repassword"]);
        $role = htmlspecialchars($_POST["role"]) ? htmlentities($_POST["role"]) : strip_tags($_POST["role"]);
        $row = $this->konfig->Registerd($username,$email,$password,$repassword,$role);
        return $row;
    }
    
    public function ubah(){
        $id = htmlspecialchars($_POST["id"]) ? htmlentities($_POST["id"]) : strip_tags($_POST["id"]);
        $email = htmlspecialchars($_POST["email"]) ? htmlentities($_POST["email"]) : strip_tags($_POST["email"]);
        $username = htmlspecialchars($_POST["username"]) ? htmlentities($_POST["username"]) : strip_tags($_POST["username"]);
        $password = htmlspecialchars($_POST["password"]) ? htmlentities($_POST["password"]) : strip_tags($_POST["password"]);
        $repassword = htmlspecialchars($_POST["repassword"]) ? htmlentities($_POST["repassword"]) : strip_tags($_POST["repassword"]);
        $role = htmlspecialchars($_POST["role"]) ? htmlentities($_POST["role"]) : strip_tags($_POST["role"]);
        $row = $this->konfig->update($username,$email,$password,$repassword,$role,$id);
        return $row;
    }

    public function AuthSignIn(){
        session_start();
        $userInput = htmlspecialchars($_POST["userInput"]) ? htmlentities($_POST["userInput"]) : strip_tags($_POST["userInput"]);
        $password = htmlspecialchars($_POST["password"]) ? htmlentities($_POST["password"]) : strip_tags($_POST["password"]);
        $this->konfig->SignIn($userInput,$password);
    }
}

use model\Ketua;
class AuthKetua {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new Ketua($konfig);
    }

    public function Tabled($query){
        $row = $this->konfig->Table($query);
        $hasil = $row->fetchAll();
        return $hasil;
    }

    public function add(){
        $id_ketua = htmlspecialchars($_POST["id_ketua"]) ? htmlentities($_POST["id_ketua"]) : strip_tags($_POST["id_ketua"]);
        $nama_ketua = htmlspecialchars($_POST["nama_ketua"]) ? htmlentities($_POST["nama_ketua"]) : strip_tags($_POST["nama_ketua"]);
        $alamat = htmlspecialchars($_POST["alamat"]) ? htmlentities($_POST["alamat"]) : strip_tags($_POST["alamat"]);
        $no_hp = htmlspecialchars($_POST["no_hp"]) ? htmlentities($_POST["no_hp"]) : strip_tags($_POST["no_hp"]);
        $row = $this->konfig->create($id_ketua, $nama_ketua, $alamat, $no_hp);
        return $row;
    }

    public function ubah(){
        $id = htmlspecialchars($_POST["id"]) ? htmlentities($_POST["id"]) : strip_tags($_POST["id"]);
        $id_ketua = htmlspecialchars($_POST["id_ketua"]) ? htmlentities($_POST["id_ketua"]) : strip_tags($_POST["id_ketua"]);
        $nama_ketua = htmlspecialchars($_POST["nama_ketua"]) ? htmlentities($_POST["nama_ketua"]) : strip_tags($_POST["nama_ketua"]);
        $alamat = htmlspecialchars($_POST["alamat"]) ? htmlentities($_POST["alamat"]) : strip_tags($_POST["alamat"]);
        $no_hp = htmlspecialchars($_POST["no_hp"]) ? htmlentities($_POST["no_hp"]) : strip_tags($_POST["no_hp"]);
        $row = $this->konfig->update($id_ketua, $nama_ketua, $alamat, $no_hp, $id);
        return $row;
    }

    public function hapus(){
        $id = htmlspecialchars($_GET["id"]) ? htmlentities($_GET["id"]) : strip_tags($_GET["id"]);
        $row = $this->konfig->delete($id);
        return $row;
    }
}


use model\Keamanan;
class AuthKeamanan {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new Keamanan($konfig);
    }
    
    public function Tabled($query){
        $row = $this->konfig->Table($query);
        $hasil = $row->fetchAll();
        return $hasil;
    }

    public function EditTable($query,$id){
        $row = $this->konfig->TableEdit($query,$id);
        $row->execute(array($id));
        $hasil = $row->fetchAll();
        return $hasil;
    }

    public function add(){
        $id_keamanan = htmlspecialchars($_POST["id_keamanan"]) ? htmlentities($_POST["id_keamanan"]) : strip_tags($_POST["id_keamanan"]);
        $id_ketua = htmlspecialchars($_POST["id_ketua"]) ? htmlentities($_POST["id_ketua"]) : strip_tags($_POST["id_ketua"]);
        $nama = htmlspecialchars($_POST["nama_keamanan"]) ? htmlentities($_POST["nama_keamanan"]) : strip_tags($_POST["nama_keamanan"]);
        $alamat = htmlspecialchars($_POST["alamat"]) ? htmlentities($_POST["alamat"]) : strip_tags($_POST["alamat"]);
        $no_hp = htmlspecialchars($_POST["no_hp"]) ? htmlentities($_POST["no_hp"]) : strip_tags($_POST["no_hp"]);
        $row = $this->konfig->create($id_keamanan,$id_ketua,$nama,$alamat,$no_hp);
        return $row;
    }

    public function ubah(){
        $id = htmlspecialchars($_POST["id"]) ? htmlentities($_POST["id"]) : strip_tags($_POST["id"]);
        $id_keamanan = htmlspecialchars($_POST["id_keamanan"]) ? htmlentities($_POST["id_keamanan"]) : strip_tags($_POST["id_keamanan"]);
        $id_ketua = htmlspecialchars($_POST["id_ketua"]) ? htmlentities($_POST["id_ketua"]) : strip_tags($_POST["id_ketua"]);
        $nama = htmlspecialchars($_POST["nama_keamanan"]) ? htmlentities($_POST["nama_keamanan"]) : strip_tags($_POST["nama_keamanan"]);
        $alamat = htmlspecialchars($_POST["alamat"]) ? htmlentities($_POST["alamat"]) : strip_tags($_POST["alamat"]);
        $no_hp = htmlspecialchars($_POST["no_hp"]) ? htmlentities($_POST["no_hp"]) : strip_tags($_POST["no_hp"]);
        $row = $this->konfig->update($id_keamanan,$id_ketua,$nama,$alamat,$no_hp,$id);
        return $row;
    }

    public function hapus(){
        $id = htmlspecialchars($_GET["id"]) ? htmlentities($_GET["id"]) : strip_tags($_GET["id"]);
        $row = $this->konfig->delete($id);
        return $row;
    }
}

use model\Pelanggaran;
class AuthPelanggaran {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new Pelanggaran($konfig);
    }
    
    public function Tabled($query){
        $row = $this->konfig->Table($query);
        $hasil = $row->fetchAll();
        return $hasil;
    }

    public function add(){
        $no_pelanggaran = htmlspecialchars($_POST['no_pelanggaran']) ? htmlentities($_POST['no_pelanggaran']) : strip_tags($_POST['no_pelanggaran']);
        $nama = htmlspecialchars($_POST['nama_pelanggaran']) ? htmlentities($_POST['nama_pelanggaran']) : strip_tags($_POST['nama_pelanggaran']);
        $no_sanksi = htmlspecialchars($_POST['no_sanksi']) ? htmlentities($_POST['no_sanksi']) : strip_tags($_POST['no_sanksi']);
        $id_keamanan = htmlspecialchars($_POST['id_keamanan']) ? htmlentities($_POST['id_keamanan']) : strip_tags($_POST['id_keamanan']);
        $row = $this->konfig->create($no_pelanggaran,$nama,$no_sanksi,$id_keamanan);
        return $row;
    }

    public function ubah(){
        $id = htmlspecialchars($_POST['id']) ? htmlentities($_POST['id']) : strip_tags($_POST['id']);
        $no_pelanggaran = htmlspecialchars($_POST['no_pelanggaran']) ? htmlentities($_POST['no_pelanggaran']) : strip_tags($_POST['no_pelanggaran']);
        $nama = htmlspecialchars($_POST['nama_pelanggaran']) ? htmlentities($_POST['nama_pelanggaran']) : strip_tags($_POST['nama_pelanggaran']);
        $no_sanksi = htmlspecialchars($_POST['no_sanksi']) ? htmlentities($_POST['no_sanksi']) : strip_tags($_POST['no_sanksi']);
        $id_keamanan = htmlspecialchars($_POST['id_keamanan']) ? htmlentities($_POST['id_keamanan']) : strip_tags($_POST['id_keamanan']);
        $row = $this->konfig->update($no_pelanggaran,$nama,$no_sanksi,$id_keamanan,$id);
        return $row;
    }

    public function hapus(){
        $id = htmlspecialchars($_GET["id"]) ? htmlentities($_GET["id"]) : strip_tags($_GET["id"]);
        $row = $this->konfig->delete($id);
        return $row;
    }
}

use model\Sanksi;
class AuthSanksi {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new Sanksi($konfig);
    }

    public function Tabled($query){
        $row = $this->konfig->Table($query);
        $hasil = $row->fetchAll();
        return $hasil;
    }

    public function add(){
        $no_sanksi = htmlspecialchars($_POST["no_sanksi"]) ? htmlentities($_POST["no_sanksi"]) : strip_tags($_POST["no_sanksi"]);
        $nama_sanksi = htmlspecialchars($_POST["nama_sanksi"]) ? htmlentities($_POST["nama_sanksi"]) : strip_tags($_POST["nama_sanksi"]);
        $jenis_sanksi = htmlspecialchars($_POST["jenis_sanksi"]) ? htmlentities($_POST["jenis_sanksi"]) : strip_tags($_POST["jenis_sanksi"]);
        $row = $this->konfig->create($no_sanksi,$nama_sanksi,$jenis_sanksi);
        return $row;
    }

    public function ubah(){
        $id = htmlspecialchars($_POST["id"]) ? htmlentities($_POST["id"]) : strip_tags($_POST["id"]);
        $no_sanksi = htmlspecialchars($_POST["no_sanksi"]) ? htmlentities($_POST["no_sanksi"]) : strip_tags($_POST["no_sanksi"]);
        $nama_sanksi = htmlspecialchars($_POST["nama_sanksi"]) ? htmlentities($_POST["nama_sanksi"]) : strip_tags($_POST["nama_sanksi"]);
        $jenis_sanksi = htmlspecialchars($_POST["jenis_sanksi"]) ? htmlentities($_POST["jenis_sanksi"]) : strip_tags($_POST["jenis_sanksi"]);
        $row = $this->konfig->update($no_sanksi,$nama_sanksi,$jenis_sanksi,$id);
        return $row;
    }

    public function hapus(){
        $id = htmlspecialchars($_GET["id"]) ? htmlentities($_GET["id"]) : strip_tags($_GET["id"]);
        $row = $this->konfig->delete($id);
        return $row;
    }
}

use model\Santri;
class AuthSantri {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new Santri($konfig);
    }

    public function Tabled($query){
        $row = $this->konfig->Table($query);
        $hasil = $row->fetchAll();
        return $hasil;
    }

    public function EditTable($query,$id){
        $row = $this->konfig->TableEdit($query,$id);
        $row->execute(array($id));
        $hasil = $row->fetchAll();
        return $hasil;
    }

    public function add(){
        $nis = htmlspecialchars($_POST["nis"]) ? htmlentities($_POST["nis"]) : strip_tags($_POST["nis"]);
        $nama = htmlspecialchars($_POST["nama_santri"]) ? htmlentities($_POST["nama_santri"]) : strip_tags($_POST["nama_santri"]);
        $alamat = htmlspecialchars($_POST["alamat"]) ? htmlentities($_POST["alamat"]) : strip_tags($_POST["alamat"]);
        $jenis_kelamin = htmlspecialchars($_POST["jenis_kelamin"]) ? htmlentities($_POST["jenis_kelamin"]) : strip_tags($_POST["jenis_kelamin"]);
        $no_pelanggaran = htmlspecialchars($_POST["no_pelanggaran"]) ? htmlentities($_POST["no_pelanggaran"]) : strip_tags($_POST["no_pelanggaran"]);
        $no_sanksi = htmlspecialchars($_POST["no_sanksi"]) ? htmlentities($_POST["no_sanksi"]) : strip_tags($_POST["no_sanksi"]);
        $row = $this->konfig->create($nis,$nama,$alamat,$jenis_kelamin,$no_pelanggaran,$no_sanksi);
        return $row;
    }

    public function ubah(){
        $id = htmlspecialchars($_POST["id"]) ? htmlentities($_POST["id"]) : strip_tags($_POST["id"]);
        $nis = htmlspecialchars($_POST["nis"]) ? htmlentities($_POST["nis"]) : strip_tags($_POST["nis"]);
        $nama = htmlspecialchars($_POST["nama_santri"]) ? htmlentities($_POST["nama_santri"]) : strip_tags($_POST["nama_santri"]);
        $alamat = htmlspecialchars($_POST["alamat"]) ? htmlentities($_POST["alamat"]) : strip_tags($_POST["alamat"]);
        $jenis_kelamin = htmlspecialchars($_POST["jenis_kelamin"]) ? htmlentities($_POST["jenis_kelamin"]) : strip_tags($_POST["jenis_kelamin"]);
        $no_pelanggaran = htmlspecialchars($_POST["no_pelanggaran"]) ? htmlentities($_POST["no_pelanggaran"]) : strip_tags($_POST["no_pelanggaran"]);
        $no_sanksi = htmlspecialchars($_POST["no_sanksi"]) ? htmlentities($_POST["no_sanksi"]) : strip_tags($_POST["no_sanksi"]);
        $row = $this->konfig->update($nis,$nama,$alamat,$jenis_kelamin,$no_pelanggaran,$no_sanksi,$id);
        return $row;
    }

    public function hapus(){
        $id = htmlspecialchars($_GET["id"]) ? htmlentities($_GET["id"]) : strip_tags($_GET["id"]);
        $row = $this->konfig->delete($id);
        return $row;
    }
}

use model\Laporan;
class AuthLaporan {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new Laporan($konfig);
    }

    public function Tabled($query){
        $row = $this->konfig->Table($query);
        $hasil = $row->fetchAll();
        return $hasil;
    }
}

use model\Diskusi;
class AuthDiskusi {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new Diskusi($konfig);
    }

    public function Tabled($query){
        $row = $this->konfig->Table($query);
        $hasil = $row->fetchAll();
        return $hasil;
    }

    public function TabledPrint($query,$id){
        $row = $this->konfig->TableEdit($query,$id);
        $row = $row->fetchAll();
        return $row;
    }

    public function tambah(){
        $id = htmlspecialchars($_POST["id"]) ? htmlentities($_POST["id"]) : strip_tags($_POST["id"]);
        $id_keamanan = htmlspecialchars($_POST["id_keamanan"]) ? htmlentities($_POST["id_keamanan"]) : strip_tags($_POST["id_keamanan"]);
        $id_ketua = htmlspecialchars($_POST["id_ketua"]) ? htmlentities($_POST["id_ketua"]) : strip_tags($_POST["id_ketua"]);
        $hasil_diskusi = htmlspecialchars($_POST["hasil_diskusi"]) ? htmlentities($_POST["hasil_diskusi"]) : strip_tags($_POST["hasil_diskusi"]);
        $row = $this->konfig->update($hasil_diskusi, $id_keamanan, $id_ketua, $id);
        return $row;
    }
}
?>