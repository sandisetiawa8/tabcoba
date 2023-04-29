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
      .q {
        width: 100%;

      }
    }

    @media screen and (max-width: 1200.98px) {
      
      .q {
        width: 40%;
        display: flex;
      }
    }
    </style>
  </head>
  <body>

    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800 col-sm-12 title"><?= $title. ' '. $hasil['nama']; ?></h1>
        <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-success shadow h-100 py-2">
                <div class="card-body">
                    <!-- <a href="<?= base_url('admin/daftaruser'); ?>" style="text-decoration: none;"> -->
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="col-md-12">
                                    <img src="<?= base_url('assets/img/profile/'). $hasil['image']; ?>" width="100%" class="img-fluid" alt="...">
                                    <h2 style="text-align: center;" class="mt-3"><?= $hasil['nama']; ?></h2>
                                    <h5 style="text-align: center; font-weight: 200;" class="mt-3"><?= $hasil['nis']; ?></h5>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>   

        <div class="col-xl-9 col-md-6 mb-4">
            <div class="card border-success shadow h-100">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#saya"
                                            role="tab">Profile Saya</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#ortu"
                                            role="tab">Orang Tua</a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active p-3" id="saya" role="tabpanel">
                                        <p class="font-size-13 mb-0">
                                            <button type="button" class="btn mt-3" style="background-color: #0EA293; color: white;" data-bs-toggle="modal" data-bs-target="#ubahdatasaya">Ubah data saya</button>
                                            <div class="col-md-10 mt-3">      
                                                <table class="table" border="0" cellspasing="0">
                                                <tr>
                                                    <th style="width: 40%;">Nama Lengkap</th>
                                                    <th style="width: 2px;">:</th>
                                                    <td><?= $user['nama']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>NIS</th>
                                                    <th>:</th>
                                                    <td><?= $user['nis']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Tampat Tanggal Lahir</th>
                                                    <th>:</th>
                                                    <td><?= $user['tmp_lahir']; ?>, <?php $tgl = $user['tgl_lahir']; echo date("d M Y", strtotime($tgl)) ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Jenis Kelamin</th>
                                                    <th>:</th>
                                                    <td><?= $user['jk']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Alamat</th>
                                                    <th>:</th>
                                                    <td><?= $user['alamat']; ?></td>
                                                </tr>   
                                                <tr>
                                                    <th>Agama</th>
                                                    <th>:</th>
                                                    <td><?= $user['agama']; ?></td>
                                                </tr>        
                                                <tr>
                                                    <th>Kelas</th>
                                                    <th>:</th>
                                                    <td><?= $user['kelas']; ?></td>
                                                </tr>
                                                </table>
                                            </div>
                                        </p>
                                    </div>
                                    <div class="tab-pane p-3" id="ortu" role="tabpanel">
                                    <?php if($ortu > 0) { ?> 
                                    <button type="button" class="btn mt-3" style="background-color: #0EA293; color: white;" data-bs-toggle="modal" data-bs-target="#ubahdataortu">Ubah data orang tua</button>
                                        <div class="col-md-10 mt-3">   
                                                <table class="table" border="0" cellspasing="0">
                                                    <tr>
                                                        <th colspan="1">Nama Ayah</th>
                                                        <th>:</th>
                                                        <td><?= $ortu['ayah']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nama Ibu</th>
                                                        <th>:</th>
                                                        <td><?= $ortu['ibu']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th style="width: 40%;">Alamat</th>
                                                        <th style="width: 2px;">:</th>
                                                        <td><?= $ortu['alamat']; ?></td>
                                                    </tr>   
                                                    <tr>
                                                        <th>Pekerjaan ayah</th>
                                                        <th>:</th>
                                                        <td><?= $ortu['pek_ayah']; ?></td>
                                                    </tr>   
                                                    <tr>
                                                            <th>Pekerjaan ibu</th>
                                                            <th>:</th>
                                                            <td><?= $ortu['pek_ibu']; ?></td>
                                                        </tr>   
                                                        <tr>
                                                            <th>No telpon orang tua</th>
                                                            <th>:</th>
                                                            <td><?= $ortu['no_hp']; ?></td>
                                                        </tr>   
                                                    </table>
                                                <?php } else { ?>
                                                    <?= 'Tidak ada data.' ?>
                                                    <br>
                                                    <button type="button" class="btn mt-3" style="background-color: #0EA293; color: white;" data-bs-toggle="modal" data-bs-target="#tambahdataortu">Tambah data orang tua</button>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
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


    <div class="modal fade" id="ubahdatasaya" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content m">
            <?= form_open_multipart('admin/proses_ubah_profile'); ?>
                        <div class="mb-3 m-3">
                          <label for="nama" class="form-label">Nama</label>
                          <input type="text" class="form-control" name="id" id="id" autocomplete="off" value=<?= $hasil['id']; ?>  required hidden />
                          <input type="text" class="form-control" name="nama" id="nama" value="<?= $hasil['nama']; ?>">
                        </div>
                        <div class="mb-3 m-3">
                          <label for="nis" class="form-label">NIS</label>
                          <input type="text" class="form-control" name="nis" id="nis" autocomplete="off" value=<?= $hasil['nis']; ?> readonly required />
                        </div>
                        <div class="mb-3 m-3">
                          <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                          <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?= $hasil['tgl_lahir']; ?>">
                        </div>
                        <div class="mb-3 m-3">
                          <label for="tmp_lahir" class="form-label">Tempat Lahir</label>
                          <input type="text" class="form-control" name="tmp_lahir" id="tmp_lahir" value="<?= $hasil['tmp_lahir']; ?>">
                        </div>
                        <div class="mb-3 m-3">
                          <label for="jk" class="form-label">Jenis Kelamin</label>
                            <select name="jk" id="jk" class="form-control"  required >
                                        <option value="">--PILIH--</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3 m-3">
                          <label for="alamat" class="form-label">Alamat</label>
                          <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $hasil['alamat']; ?>">
                        </div>
                        <div class="mb-3 m-3">
                          <label for="agama" class="form-label">Agama</label>
                            <select name="agama" id="agama" class="form-control"  required >
                                        <option value="">--PILIH--</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Khonghucu">Khonghucu</option>
                            </select>
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                        </div>
                        <div class="mb-3 m-3">
                          <label for="kelas" class="form-label">Kelas</label>
                            <select name="kelas" id="kelas" class="form-control"  required >
                                        <option value="">--PILIH--</option>
                                        <option value="1">Kelas 1</option>
                                        <option value="2">Kelas 2</option>
                                        <option value="3">Kelas 3</option>
                                        <option value="4">Kelas 4</option>
                                        <option value="5">Kelas 5</option>
                                        <option value="6">Kelas 6</option>
                            </select>
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                        </div>
                        <button type="submit" name="btnsubmit" class="btn btn-primary mt-2 mb-5 m-3 float-right" style="justify-content: center; background-color: #008080;">Perbarui</button>
                      </form>
            </div>
        </div>
    </div>

<?php if($ortu) {; ?>
    <div class="modal fade" id="ubahdataortu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content m">
            <?= form_open_multipart('admin/proses_ubah_ortu'); ?>
                        <div class="mb-3 m-3">
                          <label for="ayah" class="form-label">Nama ayah</label>
                          <input type="text" class="form-control" name="id" id="id" autocomplete="off" value=<?= $ortu['id']; ?>  required  />
                          <input type="text" class="form-control" name="ayah" id="ayah" value="<?= $ortu['ayah']; ?>">
                        </div>
                        <div class="mb-3 m-3">
                          <label for="ibu" class="form-label">Nama ibu</label>
                          <input type="text" class="form-control" name="ibu" id="ibu" value="<?= $ortu['ibu']; ?>">
                        </div>
                        <div class="mb-3 m-3">
                          <label for="alamat" class="form-label">Alamat</label>
                          <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $ortu['alamat']; ?>">
                        </div>
                        <div class="mb-3 m-3">
                          <label for="pek_ayah" class="form-label">Pekerjaan ayah</label>
                          <input type="text" class="form-control" name="pek_ayah" id="pek_ayah" value="<?= $ortu['pek_ayah']; ?>">
                        </div>
                        <div class="mb-3 m-3">
                          <label for="pek_ibu" class="form-label">Pekerjaan ibu</label>
                          <input type="text" class="form-control" name="pek_ibu" id="pek_ibu" value="<?= $ortu['pek_ibu']; ?>">
                        </div>
                        <div class="mb-3 m-3">
                          <label for="no_hp" class="form-label">No Handphone</label>
                          <input type="text" class="form-control" name="no_hp" id="no_hp" value="<?= $ortu['no_hp']; ?>">
                        </div>
                        <button type="submit" name="btnsubmit" class="btn btn-primary mt-2 mb-5 m-3 float-right" style="justify-content: center; background-color: #008080;">Perbarui</button>
                      </form>
            </div>
        </div>
    </div>
    <?php } else {; ?>
        
        <?php } ?>

    <div class="modal fade" id="tambahdataortu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content m">
            <?= form_open_multipart('admin/proses_tambah_ortu'); ?>
                        <div class="mb-3 m-3">
                          <label for="ayah" class="form-label">Nama ayah</label>
                          <input type="text" class="form-control" name="nis" id="nis" value="<?= $hasil['nis']; ?>">
                          <input type="text" class="form-control" name="ayah" id="ayah">
                        </div>
                        <div class="mb-3 m-3">
                          <label for="ibu" class="form-label">Nama ibu</label>
                          <input type="text" class="form-control" name="ibu" id="ibu">
                        </div>
                        <div class="mb-3 m-3">
                          <label for="alamat" class="form-label">Alamat</label>
                          <input type="text" class="form-control" name="alamat" id="alamat">
                        </div>
                        <div class="mb-3 m-3">
                          <label for="pek_ayah" class="form-label">Pekerjaan ayah</label>
                          <input type="text" class="form-control" name="pek_ayah" id="pek_ayah">
                        </div>
                        <div class="mb-3 m-3">
                          <label for="pek_ibu" class="form-label">Pekerjaan ibu</label>
                          <input type="text" class="form-control" name="pek_ibu" id="pek_ibu" >
                        </div>
                        <div class="mb-3 m-3">
                          <label for="no_hp" class="form-label">No Handphone</label>
                          <input type="text" class="form-control" name="no_hp" id="no_hp" >
                        </div>
                        <button type="submit" name="btnsubmit" class="btn btn-primary mt-2 mb-5 m-3 float-right" style="justify-content: center; background-color: #008080;">Simpan</button>
                      </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ubahfoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content text-center">
            <?= form_open_multipart('admin/proses_ubah_foto'); ?>
                        <div>
                          <!-- <label for="nis" class="form-label mt-5">NIS</label> -->
                          <input type="text" class="form-control" name="nis" id="nis" autocomplete="off" value=<?= $hasil['nis'].''; ?> hidden required />
                        </div>

                        <div class="row m-4 text-center">
                                <div class="mb-4">Upload Foto</div>
                                <div class="" style="align-items: center;">
                                    <div class="col-sm-7 mb-3">
                                        <img src="<?= base_url('assets/img/profile/'). $user['image']; ?>" class="img-thumbnail float-middle" >
                                    </div>
                                    <div class="col-sm-5 mb-5" style="position: absolute; float: right;">
                                        <div class="costume-file">
                                            <input type="file" accept="image/*" name="image" id="image" class="costume-file-input">
                                            <label for="image" class="costume-file-label"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <button type="submit" name="btnsubmit" class="btn btn-primary mb-5 ms-4 me-4 float-right" style="justify-content: center; background-color: #008080;">Ubah Profile</button>
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

            <!-- <footer class="sticky-footer bg-white" style="margin-top: 15%;">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; TABUNGANKU <?= date('Y'); ?></span>
                    </div>
                </div>
            </footer> -->
  </body>
</html>