                <!-- Begin Page Content -->
                <div class="container-fluid">

                <div class="card" style="margin-left: -25px; margin-top: -25px; width: 100%;">
                    <div class="card-header">
                        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                    </div>
                    <div class="card-body">
                        <div class="col-lg">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                    

                    <div class="card mb-3" style="max-width: 540px; padding: 20px">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="<?= base_url('assets/img/profile/'). $user['image']; ?>" class="img-fluid" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Nama : <?= $user['nama']; ?></h5>
                                    <p class="card-text">Email : <?= $user['email']; ?></p>
                                    <p class="card-text"><small class="text-muted">Bergabung Pada <?= date('d F Y', $user['date_created']); ?></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    

                    
                        

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            