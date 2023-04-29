<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css" />
    <style>
      
    @media screen and (max-width: 991.98px) {
      .title {
        text-align: center;
      }
    }
    </style>
  </head>
  <body>
        <div class="container-fluid">
                <h1 class="h3 mb-4 text-gray-800 title"><?= $title; ?></h1>
            
                <div class="col-lg" style="width: 60%;">
                    <?= $this->session->flashdata('message'); ?>
                </div>

            <div class="card col-lg-8 col-sm-12" style="padding: 20px;">
                <div class="row">
                    <?= form_open_multipart('admin/tambah_user'); ?>
                        <div class="mb-3">
                          <label for="nama" class="form-label">Masukan Nama</label>
                          <input type="text" class="form-control" name="nama" id="nama"  required />
                        </div>
                        <div class="mb-3">
                          <label for="email" class="form-label">Masukan Email</label>
                          <input type="email" class="form-control" name="email" id="email" autocomplete="off"  required  />
                        </div>
                        <div class="mb-3">
                          <label for="nis" class="form-label">Masukan NIS</label>
                          <input type="text" class="form-control" name="nis" id="nis"  required />
                        </div>
                        <div class="mb-3">
                          <label for="password" class="form-label">Masukan Password</label>
                          <input type="text" class="form-control" name="password" id="password" autocomplete="off"  required />
                        </div>
                        <div class="mb-3 m-3">
                          <label for="jk" class="form-label">Jenis Kelamin</label>
                          <select name="jk" id="jk">Jenis Kelamin</select>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </div>
                        <div class="wrap-input100 validate-input" style="margin-top: 20px;">
                        <span class="label-input100" style="font-weight: bold;">Pilih Kelas Anda</span>
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
                        <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>

                      <div class="wrap-input100 validate-input" style="margin-top: 20px;">
                        <span class="label-input100" style="font-weight: bold;">Masukan Agama Anda</span>
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
                        <?= form_error('agama', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                        
                        
                        <button type="submit" name="btnsubmit" class="btn btn-primary mt-5 mb-5 float-right">Submit</button>
                      </form>
                    </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

        <script>
          function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
            return true;
          }
        </script>
  </body>
</html>