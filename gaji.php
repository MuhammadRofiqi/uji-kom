<?php
error_reporting(0); 
require_once 'koneksi/koneksi.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    </head>
    <?php session_start(); ?>
  <body>
  
    <h1 class="text-center mt-5">Data Daftar Karyawan</h1>

    <div class="container mt-5">
        <!-- Button trigger modal create -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="bi bi-pencil-square"> </i>Tambah Data
        </button>    
    </div>

    <div class="container">
        <table id="example" class="table table-striped" style="width:100%">
            <thead class="table-dark">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Karyawan</th>
                    <th class="text-center">Jabatan</th>
                    <th class="text-center">Gaji</th>
                    <th class="text-center">Tunjangan</th>
                    <th class="text-center">Total Gaji</th>
                    <th class="text-center">Aksi</th>

                </tr>
            </thead>
            <tbody>
            <?php
            // Tampilkan semua data
            $q = $db->query("SELECT * FROM tabel_gaji");
            $no = 1; // nomor urut
            while ($dt = $q->fetch_assoc()) :
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $dt['nama_karyawan'] ?></td>
                    <td><?= $dt['jabatan'] ?></td>
                    <td><?= $dt['gaji'] ?></td>
                    <td><?= $dt['tunjangan'] ?></td>
                    <td><?= $dt['total_gaji'] ?></td>
                    <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update<?= $dt['id_gaji']?>">
                    <svg style="width:20px;height:20px" viewBox="0 0 24 24" class="mb-1">
                    <path fill="#fff" d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12H20A8,8 0 0,1 12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4V2M18.78,3C18.61,3 18.43,3.07 18.3,3.2L17.08,4.41L19.58,6.91L20.8,5.7C21.06,5.44 21.06,5 20.8,4.75L19.25,3.2C19.12,3.07 18.95,3 18.78,3M16.37,5.12L9,12.5V15H11.5L18.87,7.62L16.37,5.12Z" />
                    </svg>Update
                    </button>
                    <a class="btn btn-danger alert_notif" href="control/delete.php?id=<?= $dt['id_gaji'] ?>"><i class="bi bi-trash"> </i>Hapus</a>
                    </td>
                </tr>
            <?php
            endwhile ;
            ?>
            </tbody>    
        </table>
    </div>


    <!-- Create Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="control/create.php" method="POST">
        <div class="mb-3">
            <label for="" class="form-label">Nama</label>
            <input type="text" class="form-control" id="" required name="nama_karyawan">           
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Jabatan</label>
            <select class="form-select" aria-label="Default select example" onchange="create()" name="jabatan" id="jabatan">
            <option value="" disabled selected>--Pilih jabatan--</option>
            <option value="Kepala Lembaga">Kepala Lembaga</option>
            <option value="Kepala Bidang">Kepala Bidang</option>
            <option value="Staf Lembaga">Staf Lembaga</option>            
            </select>           
        </div>
        
        <div class="mb-3">
            <label for="" class="form-label">Gaji</label>
            <input type="number" class="form-control" required name="gaji" id="gaji" readonly>
            
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Tunjangan</label>
            <input type="number" class="form-control"  required name="tunjangan" id="tunjangan" readonly>           
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Total Gaji</label>
            <input type="number" class="form-control"  required name="gj" id="gj" readonly>           
        </div>
        
        <div class="mb-3">
            <input type="submit" name="submit" class="btn btn-success" value="Tambah">            
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
        </form>
        <script>
        function create() {
        let x = document.getElementById("jabatan").value;
        if(x=="Kepala Lembaga"){
        document.getElementById("gaji").value = 2500000;
        document.getElementById("tunjangan").value = 1500000;
        document.getElementById("gj").value = 4000000;
        }else if(x=="Kepala Bidang"){
        document.getElementById("gaji").value = 2000000;
        document.getElementById("tunjangan").value = 1000000;
        document.getElementById("gj").value = 3000000;
        }else{
        document.getElementById("gaji").value = 1500000;
        document.getElementById("tunjangan").value = 500000;
        document.getElementById("gj").value = 2000000;
        }
        }
        </script>
        </div>
        </div>
    </div>
    </div>
    <!-- Akhir Modals Create -->
   
    <!-- Update Modal -->
    <?php
    
    foreach($q as $dt):?>
    <div class="modal fade" id="update<?= $dt['id_gaji']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="control/update.php" method="POST">
        <input type="hidden" class="form-control" name="id_gaji" value="<?= $dt['id_gaji'] ?>" required >
        <div class="mb-3">
            <label for="" class="form-label">Nama</label>
            <input type="text" class="form-control" id="" required name="nama_karyawan" value="<?= $dt['nama_karyawan'] ?>">           
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Jabatan</label> 
            <select class="form-select" aria-label="Default select example" name="jabatan" onchange="update()" id="jbtn"  required>
            <option value="" disabled>--Pilih jabatan--</option>
            <option value="Kepala Lembaga" <?= ($dt['jabatan']=="Kepala Lembaga")?"selected":"" ?>>Kepala Lembaga</option>
            <option value="Kepala Bidang" <?= ($dt['jabatan']=="Kepala Bidang")?"selected":"" ?>>Kepala Bidang</option>
            <option value="Staf Lembaga" <?= ($dt['jabatan']=="Staf Lembaga")?"selected":"" ?>>Staf Lembaga</option>            
            </select>        
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Gaji</label>
            <input type="number" class="form-control" name="gaji" id="gju"  value="<?= ($dt['gaji'])?>" readonly>
            
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Tunjangan</label>
            <input type="number" class="form-control"  name="tunjangan" id="tju" value="<?= ($dt['tunjangan'])?>"  readonly>           
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Total Gaji</label>
            <input type="number" class="form-control"  name="gj" id="tgj" value="<?= ($dt['total_gaji'])?>" readonly>           
        </div>
        <div class="mb-3">
            <input type="submit" name="submit" class="btn btn-success" value="Edit Data">            
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
        
        </form>
        
        </div>
        </div>
        
    </div>
    </div>
    <?php endforeach; ?>
    <script>
      function update() {
        let u = document.getElementById("jbtn").value;
        if(u=="Kepala Lembaga"){
        document.getElementById("gju").value = 2500000;
        document.getElementById("tju").value = 1500000;
        document.getElementById("tgj").value = 4000000;
        }else if(u=="Kepala Bidang"){
        document.getElementById("gju").value = 2000000;
        document.getElementById("tju").value = 1000000;
        document.getElementById("tgj").value = 3000000;
        }else{
        document.getElementById("gju").value = 1500000;
        document.getElementById("tju").value = 500000;
        document.getElementById("tgj").value = 2000000;
        }
      }
    </script>
    <!-- Akhir Modals Update -->
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
        $('#example').DataTable();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>    
    
    <?php 
    if($_SESSION['sukses']){ ?>
        <script>
            setTimeout(function(){
                Swal.fire({
            icon: 'success',
            title: 'Data berhasil di tambahkan',
            showConfirmButton: false,
            timer: 2000
            });});
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['sukses']); } ?>
    
    <?php 
    if($_SESSION['gagal']){ ?>
        <script>
            setTimeout(function(){
                Swal.fire({
            icon: 'error',
            title: 'Data tidak berhasil di tambahkan',
            showConfirmButton: false,
            timer: 2000
            });});
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['gagal']); } ?>
    <script>
            $('.alert_notif').on('click',function(){
                var getLink = $(this).attr('href');
                Swal.fire({
                    title: "Yakin hapus data?",            
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonColor: '#3085d6',
                    cancelButtonText: "Batal"
                
                }).then(result => {
                    //jika klik ya maka arahkan ke control.php
                    if(result.isConfirmed){
                        window.location.href = getLink
                    }
                })
                return false;
            });        
    </script>
</body>
</html>