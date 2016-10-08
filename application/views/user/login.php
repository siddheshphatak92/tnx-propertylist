<div class="container">
	<div class="row">
		<div class="col-md-2">
			<?php echo form_open('user/login_process'); ?>
			<?php
				if (isset($error_message)) {
					echo $error_message;
				}
			?> 
			<input class="form-group" type="text" name="username" placeholder="Enter Username">
			<input type="password" class="form-group" name="password" placeholder="Enter Password">
			<button type="submit" class="btn btn-primary form-group">Login</button>
			<?php echo form_close();?>
		</div>
	</div>
</div>