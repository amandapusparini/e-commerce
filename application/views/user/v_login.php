<?php $this->load->view ("user/header") ?>
<div class="login">
        <form action="<?php echo base_url('User/proseslogin') ?>" method="post">
				<h4 class="text-center">Form Login</h4>
				<div class="form-group">
					<label>Username</label>

					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">
								<i class="fas fa-user"></i>
							</div>
						</div>
						<input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username Anda">
					</div>
				</div>

				<div class="form-group">
						<label>Password</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="fas fa-unlock-alt"></i>
								</div>
							</div>
							<input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password Anda">
						</div>
					</div>
				<input type="submit" name="submit" id="submit" value="Login" class="btn btn-primary"> 
				<a href="<?php echo base_url('User/register')?>"class="btn btn-link">Daftar</a>
			</form>
		</div>
	</div> 
</div>
<?php $this->load->view ("user/footer") ?>