<?php
require_once '../koneksi/koneksi.php';
if (isset($_GET['id'])) {
  $id = $_GET['id'];
// perintah hapus data berdasarkan id yang dikirimkan
  $q = $db->query("DELETE FROM tabel_gaji WHERE id_gaji= '$id'");
// cek perintah
  if ($q) {
    // pesan apabila hapus berhasil
    echo "<script>setTimeout(function(){
      Swal.fire({
      icon: 'success',
      title: 'Data berhasil di hapus',
      showConfirmButton: false,
      timer: 1500
      });});
      window.setTimeout(function(){
        window.location.href='../gaji.php';
      },1500);
        </script>";
  } else {
    // pesan apabila hapus gagal
    echo "<script>alert('Data berhasil dihapus'); window.location.href='../gaji.php'</script>";
  }
} else {
  // jika mencoba akses langsung ke file ini akan diredirect ke halaman index
  header('Location:../gaji.php');
}