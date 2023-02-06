<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
        <div class="container-fluid">
                <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            
                <div class="col-lg" style="width: 60%;">
                    <?= $this->session->flashdata('message'); ?>
                </div>

            <div class="card ms-4 me-4" style="padding: 20px; width: 90%;">
                <div class="row" style="display: flex;">
                  <div class="col-6">
                    <?= form_open_multipart('user/formkerjasama'); ?>
                        <div class="mb-3">
                          <label for="Email" class="form-label">Email</label>
                          <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                          <label for="namamedia" class="form-label">Nama Media</label>
                          <input type="text" class="form-control" name="namamedia" id="namamedia" autocomplete="off" />
                        </div>
                        <div class="mb-3">
                          <label for="kabiro" class="form-label">Nama Kabiro</label>
                          <input type="text" class="form-control" name="kabiro" id="kabiro" autocomplete="off" />
                        </div>
                        <div class="mb-3">
                          <label for="pimred" class="form-label" id="1">Nama Pimpinan Redaksi</label>
                          <input type="text" class="form-control" name="pimred" id="pimred" autocomplete="off" />
                        </div>
                        <div class="mb-3">
                          <label for="namaperusahaan" class="form-label">Nama Perusahaan</label>
                          <input type="text" class="form-control" name="namaperusahaan" id="namaperusahaan" autocomplete="off" />
                        </div>
                        <div class="mb-3">
                          <label for="alamat" class="form-label">Alamat</label>
                          <input type="text" class="form-control" name="alamat" id="alamat" autocomplete="off" />
                        </div>
                      </div>
                 
                  
                    <div class="col-6">
                        <div class="mb-3">
                          <label for="npwp" class="form-label">Nomor NPWP</label>
                          <input type="text" class="form-control" name="npwp" id="npwp" autocomplete="off" />
                        </div>

                        <div class="mb-3">
                          <label for="rekening" class="form-label">Bank</label>
                          <select name="bank" id="bank" class="form-control">
                            <option value="">--PILIH--</option>
                            <option value="BANK RAKYAT INDONESIA">BANK RAKYAT INDONESIA</option>
                            <option value="BANK CENTRAL ASIA">BANK CENTRAL ASIA</option>
                            <option value="BANK NEGARA INDONESIA">BANK NEGARA INDONESIA</option>
                            <option value="BANK MANDIRI">BANK MANDIRI</option>
                            <option value="BANK LAMPUNG">BANK LAMPUNG</option>
                            <option value="BANK SYARIAH INDONESIA">BANK SYARIAH INDONESIA</option>
                            <option value="BANK PERMATA">BANK PERMATA</option>
                            <option value="BANK JAGO">BANK JAGO</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="rekening" class="form-label">Nomor Rekening</label>
                          <input type="text" class="form-control" name="rekening" id="rekening" autocomplete="off" />
                        </div>
                        <div class="mb-3">
                          <label for="siup" class="form-label">SIUP/ TDP/ NIB</label>
                          <input type="text" class="form-control" name="siup" id="siup" autocomplete="off" />
                        </div>
                        <div class="mb-3">
                          <label for="keterangan" class="form-label">Keterangan</label>
                          <select name="keterangan" id="keterangan" class="form-control">
                            <option value="">--PILIH--</option>
                            <option value="Media Cetak">Media Cetak</option>
                            <option value="Media Online">Media Online</option>
                            <option value="Media Cetak dan Online">Media Cetak & Online</option>
                          </select>
                        </div>
                        <label for="">Upload Softcopy Proposal</label><br />
                        <div class="input-group mb-3">
                          <input type="file" class="form-control" id="file" name="file" />
                        </div >
                      </div>
                      <button type="submit" name="btnsubmit" class="btn btn-primary mt-2 mb-5">Submit</button>
                    </form>
                      
                    
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  </body>
</html>