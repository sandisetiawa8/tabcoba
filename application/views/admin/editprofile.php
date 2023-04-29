<div class="content-wrapper mt-3">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Ubah Profil</h3>
            </div>
            <?= $this->session->flashdata('message') ?>
            <form action="<?= base_url('admin/editprofile') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
              <div class="card-body">

              

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-6">
                     <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['nama']; ?>">
                  </div>
                </div>

                
                <div class="form-group row">
                <label class="col-sm-2 col-form-label">Upload Foto</label>
                    <div class="costume-file">
                        <input type="file" accept="image/*" name="image" id="image" class="costume-file-input" style="margin-left: 14px;">
                        <label for="image" class="costume-file-label"></label>
                    </div>
                </div>
                

                <div class="row mb-3" style="display: flex;">
                                <div class="col-sm-2">Foto saat ini</div>
                                <div class="col-sm-10">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/img/profile/'). $user['image']; ?>" class="img-thumbnail">
                                    </div>
                                    
                                </div>
                            </div>


                <div class="form-group row">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-6">
                  <button type="submit" class="btn btn-success float-right">Simpan</button>
                  </div>
                </div>

              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section>
</div>