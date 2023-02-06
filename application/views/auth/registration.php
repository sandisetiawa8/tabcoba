
<div class="limiter">
		<div class="container-login100" style="background-image: url('<?=  base_url() ?>assets/img/galaxy2.jpeg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">

			<div class="container" style="justify-content: center;">

			</div>
				<span class="login100-form-title p-b-49">
					<h6 style="font-family: 'Silkscreen', cursive;"">REGISTRASI</h6>
				</span>

				<div class="col-lg">
                            <?= $this->session->flashdata('message'); ?>
                        </div>

				<form class="user" method="POST" action="<?= base_url('auth/registration'); ?>">
					<div class="wrap-input100 validate-input m-b-23">
						<span class="label-input100">Masukan Nama</span>
						<input class="input100" type="text" id="name" name="name" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>" required>
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input">
						<span class="label-input100">Masukan Email Anda</span>
						<input class="input100" type="text" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>" required>
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					<div class="wrap-input100 validate-input" style="margin-top: 20px;">
						<span class="label-input100">Masukan Password</span>
						<input style="margin-top: 10px;" class="input100" type="password" name="password1" id="password1" placeholder="Password" required>
						<span class="focus-input100" data-symbol="&#xf206;"></span>
						<?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>

					<div class="wrap-input100 validate-input" style="margin-top: 20px;">
						<span class="label-input100">Masukan Kembali Password</span>
						<input style="margin-top: 10px;" class="input100" type="password" name="password2" id="password2" placeholder="Password" required>
						<span class="focus-input100" data-symbol="&#xf206;"></span>
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