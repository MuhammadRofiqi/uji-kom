<?php
require_once '../koneksi/koneksi.php';
if (isset($_POST['submit'])) {
  $nama_karyawan = $_POST['nama_karyawan'];
  $jabatan = $_POST['jabatan'];
  $gaji = $_POST['gaji'];
  $tunjangan = $_POST['tunjangan'];
  $total_gaji = $gaji+$tunjangan;
  
// id_pendaftar bernilai '' karena kita set auto increment
  $q = $db->query("INSERT INTO tabel_gaji VALUES ('', '$nama_karyawan','$jabatan','$gaji','$tunjangan','$total_gaji')");
  
  if ($q) {
  session_start();
  //set session sukses
  $_SESSION["sukses"] = 'Data Berhasil Disimpan';
  //redirect ke halaman index.php
  header('Location: ../gaji.php');  
//     // pesan jika data tersimpan
  //   echo "<script>setTimeout(function(){
  //     Swal.fire({
  // icon: 'success',
  // title: 'Data berhasil di tambahkan',
  // showConfirmButton: false,
  // timer: 1500
  // });});
  // window.setTimeout(function(){
  //   window.location.href='../gaji.php';
  // },1500);
//   //   </script>";
  } else {
  session_start();
    // pesan jika data gagal disimpan
   //set session sukses
  $_SESSION["gagal"] = 'Data Gagal Disimpan';
  //redirect ke halaman index.php
  header('Location: ../gaji.php');
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: ../gaji.php');
}