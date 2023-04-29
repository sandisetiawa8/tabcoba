
	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?=  base_url() ?>assets/img/background.png');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
            <span class="login100-form-title p-b-49">
					<h6 style="font-family: 'Silkscreen', cursive; ">LUPA PASSWORD?</h6>
					
				</span>

				<form class="user" method="post" action="<?= base_url('auth/forgetpassword'); ?>">
					<div class="wrap-input100 validate-input m-b-23">
						<span class="label-input100">Masukan Email anda</span>
						<input class="input100" type="text" name="email" placeholder="Email..." value="<?= set_value('email'); ?>" >
						<span class="focus-input100" data-symbol="&#xf206;"></span>
						<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
                
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn mb-5">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" name="submit_email" class="login100-form-btn">
								RESET PASSWORD
							</button>
						</div>
					</div>      
					<br> 
                    <div class="text-center mt-5">
                        <a href="<?= base_url(); ?>auth" style="text-decoration: none; font-size: 16px">Kembali ke halaman login</a>
                    </div>
				</form>


			</div>
		</div>
	</div>


	

	
