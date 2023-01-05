<?php
require_once "config/config.php";
if (isset($_GET['nip'])) {
    $nip = $_GET['nip'];

    $result = $mysqli->query("SELECT foto FROM pegawai WHERE nip='$nip'")
                              or die('Hmmm, there is something gone wrong: '.$mysqli->error);
    $data = $result->fetch_assoc();
    $foto = $data['foto'];

    $hapus_file = unlink("foto/$foto");
    if ($hapus_file) {
        $delete = $mysqli->query("DELETE FROM pegawai WHERE nip='$nip'")
                                  or die('There is something wrong with delete query : '.$mysqli->error);
        if ($delete) {
            header("location: index.php?alert=3");
        }
    }
}
$mysqli->close();   
?>