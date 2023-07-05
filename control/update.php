<?php 
require_once '../koneksi/koneksi.php';
if (isset($_POST['submit'])) {
  $id_gaji = $_POST['id_gaji'];
  $nama_karyawan = $_POST['nama_karyawan'];
  $jabatan = $_POST['jabatan'];
  $gaji = $_POST['gaji'];
  $tunjangan = $_POST['tunjangan'];
  
$q = $db->query("UPDATE tabel_gaji SET nama_karyawan = '$nama_karyawan', jabatan = '$jabatan',gaji = '$gaji', tunjangan = '$tunjangan', total_gaji ='$gaji'+'$tunjangan' WHERE id_gaji = '$id_gaji'");

if ($q) {
    // pesan jika data berubah
    echo "<script>setTimeout(function(){
      Swal.fire({
  icon: 'success',
  title: 'Data berhasil di ubah',
  showConfirmButton: false,
  timer: 1500
  });});
  window.setTimeout(function(){
    window.location.href='../gaji.php';
  },1500);
    </script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data produk gagal diubah'); window.location.href='../gaji.php'</script>";
  }
}else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: ../gaji.php');
}
