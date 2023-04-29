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
                    <?= form_open_multipart('admin/proses_ubah_setoran'); ?>
                        <?php  foreach($hasil as $i) { ?>
                      
                        <div class="mb-3">
                          <label for="tgl" class="form-label">Tanggal</label>
                          <input type="text" class="form-control" name="id" id="id" autocomplete="off" value=<?= $i['id']; ?>  required hidden />
                          <input type="date" class="form-control" name="tgl" id="tgl" autocomplete="off" value=<?= $i['tgl']; ?>  required  />
                        </div>
                        <div class="mb-3">
                          <label for="jumlah" class="form-label">Jumlah Setoran</label>
                          <input type="text" class="form-control" name="jumlah" id="jumlah" autocomplete="off" value=<?= $i['setoran']; ?>  required onkeypress="return hanyaAngka(event)" />
                        </div>
                        
                        <?php } ?>
                        
                        <button type="submit" name="btnsubmit" class="btn btn-success mt-2 mb-5">Simpan</button>
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