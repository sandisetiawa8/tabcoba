<div class="container-fluid">
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        
            <div class="col-lg">
                <?= $this->session->flashdata('message'); ?>
            </div>

    <div class="card" style="padding: 20px;">
                <div class="col-sm-8">
                            <?= form_open_multipart('verifikator/editprofile'); ?>
                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Nama lengkap</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name">
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3" style="display: flex;">
                                <div class="col-sm-2">Picture</div>
                                <div class="col-sm-10">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/img/profile/'). $user['image']; ?>" class="img-thumbnail">
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="costume-file">
                                            <input type="file" accept="image/*" name="image" id="image" class="costume-file-input">
                                            <label for="image" class="costume-file-label"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                </div>

                

    </div>
</div>