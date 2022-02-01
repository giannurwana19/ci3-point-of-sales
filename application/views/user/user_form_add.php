<section class="content-header">
	<h1>
		User
		<small>Pengguna</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i></a></li>
		<li class="active">Users</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Add User</h3>
			<div class="pull-right">
				<a href="<?= site_url('user'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-undo"></i> Back</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<!-- <?php echo validation_errors(); ?> -->
					<form action="" method="POST">
						<div class="form-group <?= form_error('name') ? 'has-error' : null ?>">
							<label for="name">Name *</label>
							<input type="text" name="name" value="<?= set_value('name') ?>" class="form-control" id="name" autofocus>
							<?= form_error('name') ?>
						</div>
						<div class="form-group <?= form_error('username') ? 'has-error' : null ?>">
							<label for="username">Username *</label>
							<input type="text" name="username" value="<?= set_value('username') ?>" class="form-control" id="username">
							<?= form_error('username') ?>
						</div>
						<div class="form-group <?= form_error('password') ? 'has-error' : null ?>">
							<label for="password">Password *</label>
							<input type="password" name="password" class="form-control" id="password">
							<?= form_error('password') ?>
						</div>
						<div class="form-group <?= form_error('password_confirmation') ? 'has-error' : null ?>">
							<label for="password_confirmation">Password Confirmation *</label>
							<input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
							<?= form_error('password_confirmation') ?>
						</div>
						<div class="form-group <?= form_error('address') ? 'has-error' : null ?>">
							<label for="address">Address *</label>
							<textarea name="address" class="form-control" id="address" cols="30" rows="2"><?= set_value('address') ?></textarea>
							<?= form_error('address') ?>
						</div>
						<div class="form-group <?= form_error('level') ? 'has-error' : null ?>">
							<label for="level">Level</label>
							<select name="level" class="form-control" id="level">
								<option value="">Pilih</option>
								<option value="1" <?= set_value('level') == '1' ? 'selected' : null ?>>Admin</option>
								<option value="2" <?= set_value('level') == '2' ? 'selected' : null ?>>Kasir</option>
							</select>
							<?= form_error('level') ?>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Save</button>
							<button type="reset" class="btn btn-warning">Reset</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
