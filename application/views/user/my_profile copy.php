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
        

            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#ubah">
            Ubah Profile
            </button>

        <div class="card table-responsive-sm table-bordered col-md-12 p-4">
            <div class="row" style="display: flex;">

                <div class="col-md-2">
                    <img src="<?= base_url('assets/img/profile/'). $user['image']; ?>" width="100%" class="img-fluid" alt="...">
                </div>

                <div class="col-md-5">
                    <table class="table table-hover align-middle" id="example">
                        <tr>
                            <th style="width: 30%;">Nama</th>
                            <th>:</th>
                            <td><?= $user['nama']; ?></td>
                        </tr>
                        <tr>
                            <th style="width: 30%;">NIS</th>
                            <th>:</th>
                            <td><?= $user['nis']; ?></td>
                        </tr>
                        <tr>
                            <th style="width: 30%;">Tanggal Lahir</th>
                            <th>:</th>
                            <td><?= $user['tgl_lahir']; ?></td>
                        </tr>
                        <tr>
                            <th style="width: 30%;">Tempat Lahir</th>
                            <th>:</th>
                            <td><?= $user['tmp_lahir']; ?></td>
                        </tr>
                        <tr>
                            <th style="width: 30%;">Jenis Kelamin</th>
                            <th>:</th>
                            <td><?= $user['jk']; ?></td>
                        </tr>
                        <tr>
                            <th style="width: 30%;">Alamat</th>
                            <th>:</th>
                            <td><?= $user['alamat']; ?></td>
                        </tr>   
                        <tr>
                            <th style="width: 30%;">Agama</th>
                            <th>:</th>
                            <td><?= $user['agama']; ?></td>
                        </tr>        
                        <tr>
                            <th style="width: 30%;">Kelas</th>
                            <th>:</th>
                            <td><?= $user['kelas']; ?></td>
                        </tr>
                        

                    </table>
                </div>
            

                <div class="col-md-5">
                    <table class="table table-hover align-middle" id="example">
                        <tr>
                            <th style="width: 30%;">Nama</th>
                            <th>:</th>
                            <td><?= $user['nama']; ?></td>
                        </tr>
                        <tr>
                            <th style="width: 30%;">NIS</th>
                            <th>:</th>
                            <td><?= $user['nis']; ?></td>
                        </tr>
                        <tr>
                            <th style="width: 30%;">Tanggal Lahir</th>
                            <th>:</th>
                            <td><?= $user['tgl_lahir']; ?></td>
                        </tr>
                        <tr>
                            <th style="width: 30%;">Tempat Lahir</th>
                            <th>:</th>
                            <td><?= $user['tmp_lahir']; ?></td>
                        </tr>
                        <tr>
                            <th style="width: 30%;">Jenis Kelamin</th>
                            <th>:</th>
                            <td><?= $user['jk']; ?></td>
                        </tr>
                        <tr>
                            <th style="width: 30%;">Alamat</th>
                            <th>:</th>
                            <td><?= $user['alamat']; ?></td>
                        </tr>   
                        <tr>
                            <th style="width: 30%;">Agama</th>
                            <th>:</th>
                            <td><?= $user['agama']; ?></td>
                        </tr>        
                        <tr>
                            <th style="width: 30%;">Kelas</th>
                            <th>:</th>
                            <td><?= $user['kelas']; ?></td>
                        </tr>
                        

                    </table>
                </div>
            
            
    

            </div>
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


    <div class="modal fade" id="ubah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content m">
            <?= form_open_multipart('user/proses_ubah_profile'); ?>
                        <div class="mb-3 m-3">
                          <label for="nama" class="form-label">Nama</label>
                          <input type="text" class="form-control" name="id" id="id" autocomplete="off" value=<?= $user['id']; ?>  required hidden />
                          <input type="text" class="form-control" name="nama" id="nama" autocomplete="off" value=<?= $user['nama']; ?>  required  />
                        </div>
                        <div class="mb-3 m-3">
                          <label for="nis" class="form-label">NIS</label>
                          <input type="text" class="form-control" name="nis" id="nis" autocomplete="off" value=<?= $user['nis']; ?>  required />
                        </div>
                        <div class="mb-3 m-3">
                          <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                          <input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir" autocomplete="off" value=<?= $user['tgl_lahir']; ?>  required />
                        </div>
                        <div class="mb-3 m-3">
                          <label for="tmp_lahir" class="form-label">Tempat Lahir</label>
                          <input type="text" class="form-control" name="tmp_lahir" id="tmp_lahir" autocomplete="off" value=<?= $user['tmp_lahir']; ?>  required />
                        </div>
                        <div class="mb-3 m-3">
                          <label for="jk" class="form-label">Jenis Kelamin</label>
                          <input type="text" class="form-control" name="jk" id="jk" autocomplete="off" value=<?= $user['jk']; ?>  required />
                        </div>
                        <div class="mb-3 m-3">
                          <label for="alamat" class="form-label">Alamat</label>
                          <input type="text" class="form-control" name="alamat" id="alamat" autocomplete="off" value=<?= $user['alamat']; ?>  required />
                        </div>
                        <div class="mb-3 m-3">
                          <label for="agama" class="form-label">Agama</label>
                          <input type="text" class="form-control" name="agama" id="agama" autocomplete="off" value=<?= $user['agama']; ?>  required />
                        </div>
                        <div class="mb-3 m-3">
                          <label for="kelas" class="form-label">Kelas</label>
                          <input type="text" class="form-control" name="kelas" id="kelas" autocomplete="off" value=<?= $user['kelas']; ?>  required />
                        </div>
                        <button type="submit" name="btnsubmit" class="btn btn-primary mt-2 mb-5 m-3 float-right" style="justify-content: center; background-color: #008080;">Ubah Profile</button>
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
                        <span>Copyright &copy; SIKAM Jejama <?= date('Y'); ?></span>
                    </div>
                </div>
            </footer>
  </body>
</html>