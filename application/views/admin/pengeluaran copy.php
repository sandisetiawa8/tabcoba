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

        <div class="card table-responsive-sm table-bordered col-md-12 p-4">
        
            <h5>Total Pengeluaran Hari ini adalah <?php if($hari > 0) { ?>
                <?= rupiah($hari); ?>
                <?php }else{ ?>
                <?= rupiah(0); ?> 
                <?php } ?>
            </h5>
       
            <h5>Total Pengeluaran Bulan ini adalah <?= $bulan; ?></h5>

        </div>
        <br>
        <br>

        <div>
            <a href="tambahPengeluaran" class="btn btn-primary mb-2 ms-1" >Tambah Pengeluaran</a>
            <button type="button" class="btn btn-primary mb-2" style="background-color: #008080;" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Cetak Laporan Pengeluaran
            </button>
        </div>

    <div class="card table-responsive-sm table-bordered col-md-12 p-4">
        <table class="table table-hover align-middle" id="example">
                <thead style="text-align: center;">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">kode</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Jumlah Pengeluaran</th>
                        <th class="text-center">Keterangan</th>
                        <th class="text-center">Satuan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php 
                $i=1;
                foreach($hasil as $user) {
                ?>
                    <tr>
                        <th scope="row"  style="text-align: center;"><?= $i++ . '.'; ?></th>
                        <td class="text-center"><?= $user['kode']; ?></td>
                        <td class="text-center"><?php $tgl = $user['tgl']; echo date("d M Y", strtotime($tgl)) ?></td>
                        <td><?= rupiah($user['pengeluaran']); ?></td>
                        <td><?= $user['keterangan']; ?></td>
                        <td><?= $user['satuan']; ?></td>
                        <td style="display: flex;" class="text-center">
                            <a class="btn btn-warning btn-sm" href="#" role="button" style="margin-right: 5px;" onclick="ubah('<?= base_url('admin/ubahPengeluaran/'.$user['id']); ?>')">Ubah</a>
                            <a class="btn btn-danger btn-sm" href="#" role="button" onclick="hapus('<?= base_url('admin/hapus_Pengeluaran/'.$user['kode']); ?>')">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pilih Tanggal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div style="margin: 20px;">
                    <?= form_open_multipart('admin/cetak_pengeluaran'); ?>
                        <div class="mb-3">
                          <label for="date1" class="form-label">Tanggal Awal </label>
                          <input type="date" class="form-control" name="date1" id="date1" value=<?= date("Y-m-d") ?> />
                        </div>
                        <div class="mb-3">
                          <label for="date2" class="form-label">Tanggal Akhir</label>
                          <input type="date" class="form-control" name="date2" id="date2" value=<?= date("Y-m-d") ?>  />
                        </div>                        
                        <button type="submit" name="btnsubmit" class="btn btn-primary mt-2 mb-5" style="justify-items: end; background-color: #008080;">Cetak Pengeluaran</button>
                      </form>
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
                function ubah(href) {
                    Swal.fire({
                        icon: 'info',
                        title: 'Anda Yakin Ingin Mengubah Data ini ?',
                        text: '',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#ffad60',
                        confirmButtonText: 'Ubah',
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
                        title: 'Anda Yakin Ingin Menghapus Data ini ?',
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