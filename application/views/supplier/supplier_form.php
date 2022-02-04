<section class="content-header">
	<h1>
		supplier
		<small>Pengguna</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i></a></li>
		<li class="active">suppliers</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title"><?= ucfirst($page) ?> supplier</h3>
			<div class="pull-right">
				<a href="<?= site_url('supplier'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-undo"></i> Back</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<!-- <?php echo validation_errors(); ?> -->
					<form action="<?= site_url('supplier/proccess') ?>" method="POST">
						<input type="hidden" name="supplier_id" value="<?= $supplier->supplier_id ?>">

						<div class="form-group <?= form_error('name') ? 'has-error' : null ?>">
							<label for="name">Name *</label>
							<input type="text" name="name" value="<?= $supplier->name ?>" class="form-control" id="name" autofocus required>
							<?= form_error('name') ?>
						</div>
						<div class="form-group <?= form_error('phone') ? 'has-error' : null ?>">
							<label for="phone">Phone *</label>
							<input type="number" name="phone" value="<?= $supplier->phone ?>" class="form-control" id="phone" required>
							<?= form_error('phone') ?>
						</div>
						<div class="form-group <?= form_error('address') ? 'has-error' : null ?>">
							<label for="address">Address *</label>
							<textarea name="address" class="form-control" id="address" cols="30" rows="2" required><?= $supplier->address ?></textarea>
							<?= form_error('address') ?>
						</div>
						<div class="form-group <?= form_error('description') ? 'has-error' : null ?>">
							<label for="description">Description *</label>
							<textarea name="description" class="form-control" id="description" cols="30" rows="2" required><?= $supplier->description ?></textarea>
							<?= form_error('description') ?>
						</div>
						<button type="submit" name="<?= $page ?>" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Save</button>
						<button type="reset" class="btn btn-warning">Reset</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	</div>
</section>
