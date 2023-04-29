
<div class="limiter">
		<div class="container-login100" style="background-image: url('<?=  base_url() ?>assets/img/background.png');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-40 p-b-54">

			<div class="container" style="justify-content: center;">

			</div>
				<span class="login100-form-title p-b-49">
					<h6 style="font-family: 'Silkscreen', cursive;">REGISTRASI</h6>
				</span>

				<div style=" display: flex; flex-direction: column; padding: 5px; margin-bottom: 5px; margin-top: -30px;">
					<li style="color: red; font-weight: bolder; margin-bottom: 10px;"><?= form_error('email'); ?></li>
					<li style="color: red; font-weight: bolder; margin-bottom: 10px;"><?= form_error('nis'); ?></li>
				</div>
			
				

				<form class="user" method="POST" action="<?= base_url('auth/registration'); ?>">
					<div class="wrap-input100 validate-input m-b-23">
						<span class="label-input100" style="font-weight: bold;">Masukan Nama</span>
						<input class="input100" type="text" id="name" name="name" placeholder="Masukan Nama Lengkap..." value="<?= set_value('nama'); ?>" autocomplete="off" required>
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input">
						<span class="label-input100" style="font-weight: bold;">Masukan Email Anda</span>
						<input class="input100" type="text" id="email" name="email" placeholder="Masukan Email..." value="<?= set_value('email'); ?>" autocomplete="off" required>
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					<div class="wrap-input100 validate-input" style="margin-top: 20px;">
						<span class="label-input100" style="font-weight: bold;">Masukan NIS Anda</span>
						<input class="input100" type="text" id="nis" name="nis" placeholder="Masukan NIS..." value="<?= set_value('nis'); ?>" onkeypress="return hanyaAngka(event)" autocomplete="off" required>
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					<div class="wrap-input100 validate-input" style="margin-top: 20px;">
						<span class="label-input100" style="font-weight: bold;">Masukan Password</span>
						<input style="margin-top: 10px;" class="input100" type="password" name="password" id="password" placeholder="Masukan Password..." autocomplete="off" required>
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" style="margin-top: 20px;">
						<span class="label-input100" style="font-weight: bold;">Pilih Kelas Anda</span>
						<select style="margin-top: 10px; height: 40px;" class="input100" name="kelas" id="kelas" class="form-control"  required >
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

					<div class="wrap-input100 validate-input" style="margin-top: 20px;">
						<span class="label-input100" style="font-weight: bold;">Pilih Agama Anda</span>
						<select style="margin-top: 10px; height: 40px;" class="input100" name="agama" id="agama" class="form-control"  required >
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

					
					<br>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" name="submit_email" class="login100-form-btn" title="REGISTRASI">
								REGISTRASI
							</button>
						</div>
					</div>

					<div class="mt-5">
                        <div class="text-center mt-3" style="margin-top: 10px;">
                            <a href="<?= base_url(); ?>auth" style="font-size: 16px; text-decoration: none;">Sudah punya akun? Login</a>
                        </div>
                    </div>

				</form>
				</div>

			</div>
		</div>
	</div>

	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>

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
                            redirect('auth/registration');
                        }
                        })
					<?php } ?>

				</script>

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