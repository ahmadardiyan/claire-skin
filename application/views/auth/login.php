<div class="container">
	<h3 class="text-center " style="margin-top : 150px ; height : auto" >Administrator</h3>
	
	<div class="row justify-content-center mt-4">	
		<div class="col-md-4">
			<form action="" method="post">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" id="username" name="username" value="<?=set_value('username')?>">
					<small id="username" class="form-text text-danger">
						<?=form_error('username')?></small>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" name="password" value="<?=set_value('password')?>">
				</div>
				<small id="password" class="form-text text-danger">
					<?=form_error('password')?></small>
				<button type="submit" name="login" class="btn btn-primary ">Log In</button>
			</form>
		</div>
	</div>

</div>