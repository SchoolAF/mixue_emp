<?php
require_once "config/config.php";
if (isset($_POST['simpan'])) {
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

    $result = $mysqli->query("SELECT nip FROM pegawai WHERE nip='$nip'")
                              or die('Something wrong with NIP: '.$mysqli->error);
    $rows = $result->num_rows;
    if ($rows > 0) {
        header("location: index.php?alert=4&nip=$nip");
    }
    else {  
        if(move_uploaded_file($tmp_file, $path)) {
            $insert = $mysqli->query("INSERT INTO pegawai(nip,nama_pegawai,tempat_lahir,tanggal_lahir,jenis_kelamin,agama,alamat,no_hp,foto)
                                      VALUES('$nip','$nama_pegawai','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$agama','$alamat','$no_hp','$nama_file')")
                                      or die('Uh oh : '.$mysqli->error); 
            if ($insert) {
                header("location: index.php?alert=1");
            }   
        }
    }
}
$mysqli->close();   
?>