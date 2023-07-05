<?php

$server = "localhost";
$user = "root";
$password = "";
$nama_database = "db_gaji_1921400016";

$db = mysqli_connect($server, $user, $password, $nama_database);

if( !$db ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

?>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>