
	<div class="limiter">
		<div class="container-login100" style="background-image: url('assets/img/background.png');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
            <span class="login100-form-title p-b-49">
					<h6 style="font-family: 'Silkscreen', cursive;">SELAMAT DATANG</h6>
					<h6 style="margin: 8px; font-family: 'Silkscreen', cursive;">DI TABUNGAN SISWA</h6>
					<h6 style="font-family: 'Silkscreen', cursive;"">SD NEGERI 20 WAYLIMA</h6>
				</span>

				<?= $this->session->flashdata('message'); ?>
                        

				<form class="user mt-3" method="post" action="<?= base_url('auth'); ?>">
					<div class="wrap-input100 validate-input m-b-23">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Email" required value="<?= set_value('email'); ?>">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
						<!-- <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?> -->
					</div>

					<div class="wrap-input100 validate-input">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Password" required>
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					<br></br>
                    

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn">
								LOGIN
							</button>
						</div>
					</div>       
					        
                    <div class="mt-5">
                        <div class="text-center mt-3" style="margin-top: 8px;">
                            <a href="<?= base_url('auth/forgetpassword'); ?>" style="text-decoration: none; font-size: 16px;">Lupa Password?</a>
                        </div>
                        <div class="text-center">
                            <a href="<?= base_url(); ?>auth/registration" style="text-decoration: none; font-size: 16px">Belum punya akun? Daftar</a>
                        </div>
                    </div>
				</form>

				
			</div>
		</div>
	</div>

	
