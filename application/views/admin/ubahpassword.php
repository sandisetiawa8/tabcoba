<div class="container-fluid">
            <h1 class="h3 mb-4 text-gray-800 col-sm-10 title"><?= $title; ?></h1>
        
            <div class="col-lg">
                <?= $this->session->flashdata('message'); ?>
            </div>

    <div class="card" style="padding: 20px;">
                        <div class="col-lg-8">
                            <?= form_open_multipart('admin/ubahpassword'); ?>
                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Password Lama</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="pass_lama" name="pass_lama">
                                <?= form_error('pass_lama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Password Baru</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="pass_baru" name="pass_baru">
                                <?= form_error('pass_baru', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Ulangi Password Baru</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="ulang_pass" name="ulang_pass">
                                <?= form_error('ulang_pass', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success float-right">Simpan</button>
                                </div>
                        
                            </form>
                        </div>
    </div>
</div>