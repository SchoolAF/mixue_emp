<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {

    $table = 'pegawai';
    $primaryKey = 'nip';

    $columns = array(
        array( 'db' => 'foto', 'dt' => 1 ),
        array( 'db' => 'nip', 'dt' => 2 ),
        array( 'db' => 'nama_pegawai', 'dt' => 3 ),
        array( 'db' => 'tempat_lahir', 'dt' => 4 ),
        array(
            'db' => 'tanggal_lahir',
            'dt' => 5,
            'formatter' => function( $d, $row ) {
                return date('d-m-Y', strtotime($d));
            }
        ),
        array(
            'db' => 'jenis_kelamin',
            'dt' => 6,
            'formatter' => function( $d, $row ) {
                if ($d=='Laki-laki') {
                    $jenis_kelamin = "L";
                } else {
                    $jenis_kelamin = "P";
                }
                return $jenis_kelamin;
            }
        ),
        array( 'db' => 'agama', 'dt' => 7 ),
        array( 'db' => 'alamat', 'dt' => 8 ),
        array( 'db' => 'no_hp', 'dt' => 9 ),
        array( 'db' => 'nip', 'dt' => 10 )
    );

    require_once "config/database.php";
    require 'config/ssp.class.php';

    echo json_encode(
        SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
    );
} else {
    echo '<script>window.location="index.php"</script>';
}
?>