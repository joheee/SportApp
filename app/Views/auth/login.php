
<?= $this->extend('layout', ['title' => 'Sign In | Sport App']) ?>


<?= $this->section('content') ?>
<title>Sign In | Sport App</title>

	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<h2>Login</h2>
				<form method="post" action="">
					<div class="form-group">
						<label for="username">Username:</label>
						<input type="text" class="form-control" id="username" name="username" required>
					</div>
					<div class="form-group">
						<label for="password">Password:</label>
						<input type="password" class="form-control" id="password" name="password" required>
					</div>
					<button type="submit" class="btn btn-primary">Login</button>
				</form>
			</div>
		</div>
	</div>
<?= $this->endSection() ?>
