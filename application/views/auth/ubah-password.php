
	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?=  base_url() ?>assets/img/galaxy2.jpeg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
            <span class="login100-form-title p-b-49">
					<h6 style="font-family: 'Silkscreen', cursive; ">UBAH PASSWORD ANDA</h6>
                    <h6 style="font-family: 'Silkscreen', cursive; "><?= $this->session->userdata('reset_email'); ?></h6>
					
				</span>

				<form class="user" method="post" action="<?= base_url('auth/ubahpassword'); ?>">
					<div class="wrap-input100 validate-input m-b-23">
						<span class="label-input100">Masukan password baru</span>
						<input class="input100" type="password" name="password1" placeholder="Masukan password baru">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
						<?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>

                    <div class="wrap-input100 validate-input m-b-23">
						<span class="label-input100">Masukan kembali password baru</span>
						<input class="input100" type="password" name="password2" placeholder="Masukan kembali password baru">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
						<?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
                   

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" name="submit_email" class="login100-form-btn">
								UBAH PASSWORD
							</button>
						</div>
					</div>       
				</form>


			</div>
		</div>
	</div>

	
