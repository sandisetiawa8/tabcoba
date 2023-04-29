<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <style>
    @media screen and (max-width: 991.98px) {
      .title {
        text-align: center;
        font-size: 28px;
      }
    }
    </style>
  </head>
  <body>

    <div class="container">
    <h1 class="h3 mb-4 text-gray-800 col-sm-8 title"><?= $title; ?></h1>

    <div class="col-sm-12 title mt-4 mb-1">
            <a href="tambah_user" class="btn mb-2 ms-1" style="background-color: #9E4784; color: white;">Tambah User</a>
            <button class="btn btn-secondary dropdown-toggle btn mb-2 ms-1" type="button" data-bs-toggle="dropdown" style="background-color: #008080; color: white;">
                Upload File Excel
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?= base_url(); ?>assets/file/dataexcel/template/template.xlsx"><img src="<?= base_url(); ?>assets/img/icon/download.png" alt="" style="width: 25px;" class="me-2">Download Template Excel</a></li>
                <li><a href="#" class="btn mb-2 ms-1" data-bs-toggle="modal" data-bs-target="#uploadexcel"><img src="<?= base_url(); ?>assets/img/icon/upload.png" alt="" style="width: 25px;" class="me-2">Import Excel</a></li>
                
            </ul>
           
        
    </div>

    <div class="card table-responsive-sm table-bordered border-success col-md-12 p-4">
        <div>
        
        </div>
        <table class="table table-hover align-middle" id="example">
                <thead style="text-align: center;">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">NIS</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Image</th>
                        <th class="text-center">Total Tabungan</th>
                        <th class="text-center">Kelas</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php 
                $i=1;
                foreach($hasil as $user) {
                    
                
                    ?>
                    <tr>
                        <th scope="row"  style="text-align: center;"><?= $i++; ?></th>
                        <td><?= $user['nama']; ?></td>
                        <td><?= $user['nis']; ?></td>
                        <td><?= $user['email']; ?></td>
                        <td class="text-center"><img src="<?= base_url('assets/img/profile/'). $user['image']; ?>" width="45px" class="img-fluid" alt="...">
                        </td>
                        <td><?= rupiah($user['setoran'] - $user['penarikan']); ?></td> 
                        <td class="text-center"><?= $user['kelas']; ?></td>
                        <td>
                        <a class="btn btn-sm" href="<?= base_url('admin/detailuser/'.$user['nis']); ?>" role="button" style="background-color: #9E4784; color: white;">Detail</a>
                        <a class="btn btn-danger btn-sm" href="#" role="button" onclick="hapus('<?= base_url('admin/hapususer/'.$user['id']); ?>')">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>



    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function () {
    $('#example').DataTable();
    });
    </script>

   
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Keluar" Untuk keluar</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="uploadexcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content m">
            <?= form_open_multipart('admin/import'); ?>
                        <div class="mb-3 m-3">
                          <label for="alamat" class="form-label">Import File Excel</label>
                          <hr>
                        <input type="file" name="importexcel" id="importexcel" class="form-control-file" accept=".xlsx,.xls">
                        </div>
                        <button type="submit" name="btnsubmit" class="btn btn-primary mt-2 mb-5 m-3 float-right" style="justify-content: center; background-color: #008080;">upload</button>
                      </form>
            </div>
        </div>
    </div>


                <script>
					<?php if($this->session->flashdata('success')) { ?>
						var isi = <?= json_encode($this->session->flashdata('success'))?>;
                        Swal.fire({
                        title: '',
                        text: isi,
                        icon: 'success',
                        // showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            redirect('user');
                        }
                        })
					<?php } ?>


                    <?php if($this->session->flashdata('error')) { ?>
						var isi = <?= json_encode($this->session->flashdata('error'))?>;
                        Swal.fire({
                        title: '',
                        text: isi,
                        icon: 'error',
                        // showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            redirect('user');
                        }
                        })
					<?php } ?>

				</script>


            <script>
                function keluar(href) {
                    Swal.fire({
                        icon: 'info',
                        title: 'Anda Yakin Ingin Keluar ?',
                        text: '',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#eb424a',
                        confirmButtonText: 'Keluar',
                        closeOnConfirm: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = href;
                            // Swal.fire({
                            // position: 'center',
                            // icon: 'success',
                            // title: 'Berhasil',
                            // showConfirmButton: true,
                            // // timer: 15000
                            // })
                        }
                    })
                }
            </script>

            <script>
                function detail(href) {
                    Swal.fire({
                        icon: 'info',
                        title: 'Anda Yakin Ingin Melihat Datail User ini ?',
                        text: '',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#008800',
                        confirmButtonText: 'Lihat',
                        closeOnConfirm: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = href;
                            // Swal.fire({
                            // position: 'center',
                            // icon: 'success',
                            // title: 'Berhasil',
                            // showConfirmButton: true,
                            // // timer: 15000
                            // })
                        }
                    })
                }
            </script>

            <script>
                function hapus(href) {
                    Swal.fire({
                        icon: 'info',
                        title: 'Anda Yakin Ingin Menghapus User ini ?',
                        text: '',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#eb424a',
                        confirmButtonText: 'Hapus',
                        closeOnConfirm: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = href;
                            // Swal.fire({
                            // position: 'center',
                            // icon: 'success',
                            // title: 'Berhasil',
                            // showConfirmButton: true,
                            // // timer: 15000
                            // })
                        }
                    })
                }
            </script>

            <footer class="sticky-footer bg-white" style="margin-top: 15%;">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; TABUNGANKU <?= date('Y'); ?></span>
                    </div>
                </div>
            </footer>
  </body>
</html>