<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
  <div class="page-content">
     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="container-fluid">
    <div class="col-lg">
        <?= $this->session->flashdata('message'); ?>
    </div>



    <div class="col-sm-12 title mt-4">
            <a href="tambahsetoran" class="btn mb-2 ms-1" style="background-color: #9E4784; color: white;" data-bs-toggle="modal" data-bs-target="#exampleModalform">Tambah Setoran</a>
    </div>

    <div class="card table-responsive-sm table-bordered border-success col-md-12 p-4">
        <table class="table table-hover align-middle" id="example">
                <thead style="text-align: center;">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center" style="width: 25%;">Nama</th>
                        <th class="text-center">NIS</th>
                        <!-- <th class="text-center">Terakhir Menabung</th> -->
                        <th class="text-center">Jumlah Setoran</th>
                        <th class="text-center" style="width: 10%;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php 
                $i=1;
                foreach($setoran as $data) {
                ?>
                    <tr>
                        <th scope="row"  style="text-align: center;"><?= $i++ . '.'; ?></th>
                        <td class="text-center"><?= $data['nama']; ?></td>
                        <td class="text-center"><?= $data['nis']; ?></td>
                        <td><?= rupiah($data['setoran']); ?></td>
                        <td style="display: flex; justify-content: center;">
                            <a class="btn  btn-sm" href="<?= base_url('admin/detailsetoran/'.$data['nis']); ?>" role="button" style="margin-right: 5px; background-color: #008080; color: white">Detail</a>
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
                    <?= form_open_multipart('admin/cetak_setoran'); ?>
                        <div class="mb-3">
                          <label for="date1" class="form-label">Tanggal Awal </label>
                          <input type="date" class="form-control" name="date1" id="date1" value=<?= date("Y-m-d") ?> />
                        </div>
                        <div class="mb-3">
                          <label for="date2" class="form-label">Tanggal Akhir</label>
                          <input type="date" class="form-control" name="date2" id="date2" value=<?= date("Y-m-d") ?> />
                        </div>                        
                        <button type="submit" name="btnsubmit" class="btn btn-primary mt-2 mb-5" style="justify-items: end; background-color: #008080;">Cetak Setoran</button>
                      </form>
                 </div>
            </div>
        </div>
    </div>


    
  </div>
  <!-- container-fluid -->
</div>
<!-- End Page-content -->
