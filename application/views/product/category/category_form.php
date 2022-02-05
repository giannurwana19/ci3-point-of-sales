<section class="content-header">
	<h1>
		category
		<small>Pengguna</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i></a></li>
		<li class="active">category</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title"><?= ucfirst($page) ?> category</h3>
			<div class="pull-right">
				<a href="<?= site_url('category'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-undo"></i> Back</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<!-- <?php echo validation_errors(); ?> -->
					<form action="<?= site_url('category/proccess') ?>" method="POST">
						<input type="hidden" name="category_id" value="<?= $category->category_id ?>">

						<div class="form-group <?= form_error('name') ? 'has-error' : null ?>">
							<label for="name">Name *</label>
							<input type="text" name="name" value="<?= $category->name ?>" class="form-control" id="name" autofocus required>
							<?= form_error('name') ?>
						</div>

						<div class="form-group <?= form_error('name') ? 'has-error' : null ?>">
							<label for="name">Name *</label>
							<input type="text" name="name" value="<?= $category->name ?>" class="form-control" id="name" autofocus required>
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
