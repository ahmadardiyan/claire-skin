<div class="container">

	<h1 class="text-center">Registrasi</h1>
	<div class="row justify-content-center">
		<div class="col-md-4">
			<form action="" method="post">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" id="username" name="username" value="<?=set_value('username')?>">
					<small name="username" class="form-text text-danger">
						<?=form_error('username')?></small>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" name="password" value="<?=set_value('password')?>">
					<small name="password" class="form-text text-danger">
						<?=form_error('password')?></small>
				</div>
				<div class="form-group">
					<label for="confrimpassword">Konfirmasi Password</label>
					<input type="password" class="form-control" id="confrimpassword" name="confrimpassword" value="<?=set_value('confrimpassword')?>">
					<small name="password" class="form-text text-danger">
						<?=form_error('confrimpassword')?></small>
				</div>
				<button type="submit" name="registrasi" class="btn btn-primary">Daftar</button>
			</form>
		</div>
	</div>

</div>