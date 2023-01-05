<?php
require_once "config/config.php";
if (isset($_POST['simpan'])) {
    if (isset($_POST['nip'])) {
        $nip                = $mysqli->real_escape_string(trim($_POST['nip']));
        $nama_pegawai       = $mysqli->real_escape_string(trim($_POST['nama_pegawai']));
        $tempat_lahir       = $mysqli->real_escape_string(trim($_POST['tempat_lahir']));
        $tanggal_lahir      = $mysqli->real_escape_string(trim(date('Y-m-d', strtotime($_POST['tanggal_lahir']))));
        $jenis_kelamin      = $mysqli->real_escape_string(trim($_POST['jenis_kelamin']));
        $agama              = $mysqli->real_escape_string(trim($_POST['agama']));
        $alamat             = $mysqli->real_escape_string(trim($_POST['alamat']));
        $no_hp              = $mysqli->real_escape_string(trim($_POST['no_hp']));
        $nama_file          = $_FILES['foto']['name'];
        $tmp_file           = $_FILES['foto']['tmp_name'];
        $path               = "foto/".$nama_file;

        if (empty($nama_file)) {
            $update = $mysqli->query("UPDATE pegawai SET nama_pegawai   = '$nama_pegawai',
                                                         tempat_lahir   = '$tempat_lahir',
                                                         tanggal_lahir  = '$tanggal_lahir',
                                                         jenis_kelamin  = '$jenis_kelamin',
                                                         agama          = '$agama',
                                                         alamat         = '$alamat',
                                                         no_hp          = '$no_hp'
                                                   WHERE nip            = '$nip'")
                                      or die('Ada kesalahan pada query update : '.$mysqli->error);
            if ($update) {
                header("location: index.php?alert=2");
            }
        }
        else {
            if(move_uploaded_file($tmp_file, $path)) {
                $update = $mysqli->query("UPDATE pegawai SET nama_pegawai   = '$nama_pegawai',
                                                             tempat_lahir   = '$tempat_lahir',
                                                             tanggal_lahir  = '$tanggal_lahir',
                                                             jenis_kelamin  = '$jenis_kelamin',
                                                             agama          = '$agama',
                                                             alamat         = '$alamat',
                                                             no_hp          = '$no_hp',
                                                             foto           = '$nama_file'
                                                       WHERE nip            = '$nip'")
                                          or die('Ada kesalahan pada query update : '.$mysqli->error);
                if ($update) {
                    header("location: index.php?alert=2");
                }   
            }
        }
    }
}
$mysqli->close();   
?>