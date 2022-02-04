<section class="content-header">
	<h1>
		Unit
		<small>Satuan Barang</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i></a></li>
		<li class="active">Unit</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title"><?= ucfirst($page) ?> Unit</h3>
			<div class="pull-right">
				<a href="<?= site_url('unit'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-undo"></i> Back</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<!-- <?php echo validation_errors(); ?> -->
					<form action="<?= site_url('unit/proccess') ?>" method="POST">
						<input type="hidden" name="unit_id" value="<?= $unit->unit_id ?>">

						<div class="form-group <?= form_error('name') ? 'has-error' : null ?>">
							<label for="name">Name *</label>
							<input type="text" name="name" value="<?= $unit->name ?>" class="form-control" id="name" autofocus required>
							<?= form_error('name') ?>
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
